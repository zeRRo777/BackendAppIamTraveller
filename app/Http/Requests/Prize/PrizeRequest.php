<?php

namespace App\Http\Requests\Prize;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use function response;

class PrizeRequest extends FormRequest
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

    #[ArrayShape(['userId' => "string[]", 'attrId' => "string[]"])]
    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer', 'exists:users,id'],
            'attrId' => ['required', 'integer','exists:attractions,id']
        ];
    }

    protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator)
    {
        return response()->json(['errors' => 'Ошибка в программе, извините, скоро исправим'], 422);
    }

}
