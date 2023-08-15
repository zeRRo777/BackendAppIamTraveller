<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use function response;

class UserLoginRequest extends FormRequest
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
    #[ArrayShape(['password' => "string[]", 'email' => "string[]", 'deviceName' => "string[]"])]
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email','exists:users,email', 'max:50'],
            'deviceName' => ['required']
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        return response()->json(['errors' => $validator->errors()], 422);
    }

}
