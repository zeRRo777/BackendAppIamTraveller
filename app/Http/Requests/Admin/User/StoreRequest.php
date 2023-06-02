<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['username' => "string[]", 'email' => "string[]", 'password' => "string[]", 'count_attractions' => "string[]", 'scores' => "string[]"])]
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:30', 'min:5'],
            'email' => ['required', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'max:30', 'min:5'],
            'count_attractions' => ['required', 'integer', 'min:0'],
            'scores' => ['required', 'integer', 'min:0'],
        ];
    }
}
