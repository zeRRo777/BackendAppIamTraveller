<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\ArrayShape;

class UserRegisterRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    #[ArrayShape(['password' => "string[]", 'email' => "string[]", 'username' => "string[]", 'deviceName' => "string[]"])]
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email','unique:users', 'max:50'],
            'username' => ['required', 'string', 'max:30'],
            'deviceName' => ['required']
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        return response()->json(['errors' => $validator->errors()], 422);
    }

}
