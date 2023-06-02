<?php

namespace App\Http\Requests\Admin\Attraction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class AddImageRequest extends FormRequest
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


    #[ArrayShape(['attraction_id' => "string[]", 'image' => "string[]"])]
    public function rules(): array
    {
        return [
            'attraction_id' => ['required', 'integer', 'exists:attractions,id'],
            'image' => ['required', 'file'],
        ];
    }
}
