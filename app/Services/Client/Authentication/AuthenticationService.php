<?php

namespace App\Services\Client\Authentication;

use App\Contracts\Client\Services\Authentication\AuthenticationServiceContract;
use App\Contracts\Common\Services\Code\CodeContract;
use App\Enums\CodeOperationEnum;
use App\Models\User;
use App\Services\Common\Code\CodeService;
use Illuminate\Database\Eloquent\Model;

class AuthenticationService implements AuthenticationServiceContract
{
    /** @var CodeService */
    protected CodeContract $codeService;

    public function __construct(CodeContract $codeService)
    {
        $this->codeService = $codeService;
    }

    public function login(array $data): Model
    {
        $methodName = isset($data['code']) ? 'authenticate' : 'sendCode';

        return $this->{$methodName}($data);
    }

    public function sendCode(array $data): Model
    {
        /** @var User $user */
        $user = User::query()->where('email', '=', $data['email'])->first();
        $this->codeService->generateCode($user, CodeOperationEnum::login());
        $user->load(['codeable' => function ($q) {
            $q->orderBy('created_at', 'desc')
            ->limit(1);
        }]);

        return $user;
    }

    public function authenticate(array $data): Model
    {
        $user = User::query()->where('email', '=', $data['email'])->first();
        $user->response_content = ['access_token' => $user->createToken(env('APP_NAME'))->accessToken];

        $this->codeService->dropCode($data['code'], $user, CodeOperationEnum::login());

        return $user;
    }
}
