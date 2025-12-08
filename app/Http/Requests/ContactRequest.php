<?php

namespace App\Http\Requests;

/*
 * @property string $name
 * @property string $email
 * @property string $contact
 */

class ContactRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|min:9|max:9',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field should be a valid word.',
            'name.max' => 'The name field should not exceed 255 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email field should be a valid email address.',
            'email.max' => 'The email field should not exceed 255 characters.',

            'contact.required' => 'The contact field is required.',
            'contact.string' => 'The contact field should be a valid number without spaces or special characters.',
            'contact.min' => 'The contact field should be at least 9 characters.',
            'contact.max' => 'The contact field should not exceed 9 characters.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strip_tags($this->name),
        ]);
    }
}
