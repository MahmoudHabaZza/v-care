<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'first_name' => ['required','min:4','max:50'],
            'last_name' => ['required','min:4','max:50'],
            'phone_number' => ['nullable','max:20'],
            'email' => ['required','email','max:100'],
            'message' => ['required','min:20','max:500']
        ];
    }
}
