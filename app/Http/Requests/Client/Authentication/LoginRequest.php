<?php

namespace App\Http\Requests\Client\Authentication;

use App\Enums\CodeOperationEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'exists:users,email'],
            'code' => [
                'nullable', 'string', Rule::exists('codes', 'code')->where(function ($q) {
                    $user = User::query()->where('email', '=', $this->email)->first();
                    $q->where('model_id', '=', $user->id)
                        ->where('model_type', '=', $user->getMorphClass())
                        ->where('operation', '=', CodeOperationEnum::login())
                        ->where('valid_to', '>=', now()->toDateTimeString());
                })
            ]
        ];
    }
}
