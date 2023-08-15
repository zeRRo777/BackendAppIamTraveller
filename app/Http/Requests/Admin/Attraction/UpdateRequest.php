<?php

namespace App\Http\Requests\Admin\Attraction;

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


    #[ArrayShape(['name' => "string[]", 'main_image' => "string[]", 'description' => "string[]", 'content' => "string[]", 'lat' => "string[]", 'long' => "string[]", 'score' => "string[]", 'address' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'main_image' => ['file'],
            'content' => ['required', 'string', 'max:3000', 'min:150'],
            'lat' => ['required', 'numeric', 'max:90', 'min:-90'],
            'long' => ['required', 'numeric', 'max:180', 'min:0'],
            'score' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'string', 'max:100'],
        ];
    }
}
