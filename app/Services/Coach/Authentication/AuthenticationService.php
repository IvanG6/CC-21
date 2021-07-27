<?php


namespace App\Services\Coach\Authentication;


use App\Contracts\Coach\Services\Authentication\AuthenticationServiceContract;
use App\Models\Coach;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationService implements AuthenticationServiceContract
{
    /**
     * @param array $data
     * @return Model
     * @throws ValidationException
     */
    public function login(array $data): Model
    {
        $coach = Coach::where('email', $data['email'])->first();

        $auth = Hash::check($data['password'], $coach->password);

        if (!$auth) {
            throw ValidationException::withMessages([
                'password' => 'You have entered wrong credentials.'
            ]);
        }

        $authToken = $coach->createToken(env('APP_NAME'))->accessToken;

        $coach->response_content = ['access_token' => $authToken];

        return $coach;
    }

    /**
     * @param array $data
     * @return array
     */
    public function registrationValidation(array $data): array
    {
        if (isset($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function registration(array $data): Model
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $coach = Coach::create($data);
        $authToken = $coach->createToken(env('APP_NAME'))->accessToken;

        $coach->response_content = ['access_token' => $authToken];

        return $coach;
    }
}
