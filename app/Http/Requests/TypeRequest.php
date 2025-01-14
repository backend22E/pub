<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TypeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [

            "type" => "required|min:3|max:20|unique:types,type|alpha",
        ];
    }

    public function messages() {

        return [

            "type.required" => "Típus elvárt",
            "type.min" => "Túl rövid név",
            "type.max" => "Túl hosszú név",
            "type.alpha" => "Nem lehetnek számok",
            "type.unique" => "Típus már létezik"
        ];
    }

    public function failedValidation( Validator $validator ) {

        throw new HttpResponseException( response()->json([
            "success" => false,
            "error" => $validator->errors(),
            "message" => "Adatbeviteli hiba"
        ]));
    }
}
