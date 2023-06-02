<?php

namespace App\Http\Requests\Admin\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class UpdateRequest extends FormRequest
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
    #[ArrayShape(['name' => "string[]", 'country' => "string[]", 'image' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'country' => ['required', 'string', 'max:50'],
            'image' => ['file'],
        ];
    }
}
