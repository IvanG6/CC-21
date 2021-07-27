<?php

namespace App\Http\Requests\Coach\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'unique:coaches'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
            'first_name' => ['sometimes', 'required', 'string', 'min:2', 'max:256'],
            'last_name' => ['sometimes', 'required', 'string', 'min:2', 'max:256'],
            'currency_id' => ['sometimes', 'integer', Rule::in(array_column(config('select_data.currencies'), 'id'))],
            'timezone_id' => ['sometimes', 'integer', Rule::in(array_column(config('select_data.timezones'), 'id'))]
        ];
    }
}
