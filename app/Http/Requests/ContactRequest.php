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
            'contactId' => 'integer|exists:contacts,id',
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:255|unique:contacts,email',
            'contact' => 'required|string|min:9|max:9|unique:contacts,contact',
        ];
    }

    public function messages()
    {
        return [
            'contactId.integer' => 'Contact invalid.',
            'contactId.exists' => 'The specified contact does not exist.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name field should be a valid word.',
            'name.max' => 'The name field should not exceed 255 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email field should be a valid email address.',
            'email.max' => 'The email field should not exceed 255 characters.',
            'email.unique' => 'The email has already been taken.',

            'contact.required' => 'The contact field is required.',
            'contact.string' => 'The contact field should be a valid number without spaces or special characters.',
            'contact.min' => 'The contact field should be at least 9 characters.',
            'contact.max' => 'The contact field should not exceed 9 characters.',
            'contact.unique' => 'The contact has already been taken.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strip_tags($this->name),
        ]);
    }
}
