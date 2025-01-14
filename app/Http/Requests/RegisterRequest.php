<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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

            "name" => "required|min:3|max:10|alpha|unique:users,name",
            "email" => "required|email|unique:users,email",
            "password" => [ "required",
                            "min:8",
                            "regex:/[a-z]/",
                            "regex:/[A-Z]/",
                            "regex:/[0-9]/" ],
            "confirm_password" => "same:password"
        ];
    }

    public function messages() {

        return [
            "name.required" => "Név elvárt.",
            "name.min" => "Túl kevés karakter.",
            "name.max" => "Túl hosszú név.",
            "name.alpha" => "Csak betűk lehetnek.",
            "name.unique" => "Hibás felhasználónév",
            "email.required" => "Email elvárt.",
            "email.email" => "Érvénytelen email.",
            "email.unique" => "Hibás email.",
            "password.required" => "Jelszó elvárt.",
            "password.min" => "Túl rövid jelszó.",
            "password.regex" => "Tartalmaznia kell kis, nagybetűt és számot.",
            "confirm_password.same" => "Nem egyező jelszó."
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
