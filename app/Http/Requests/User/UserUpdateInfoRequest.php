<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use function response;

class UserUpdateInfoRequest extends FormRequest
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
    #[ArrayShape(['username' => "string[]"])]
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:30'],
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        return response()->json(['errors' => $validator->errors()], 422);
    }

}
