<?php

namespace App\Http\Requests;

/*
 * @property int|null $contactId
 * @property string $name
 * @property string $email
 * @property string $contact
 */

use Illuminate\Validation\Rule;

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
            'email' => ['required', 'email', 'max:255', Rule::unique('contacts', 'email')->ignore($this->contactId)],
            'contact' => ['required', 'string', 'min:9', 'max:9', Rule::unique('contacts', 'contact')->ignore($this->contactId)],
        ];
    }

    public function messages()
    {
        return [
            'contactId.integer' => 'Contact invalid.',
            'contactId.exists' => 'The specified contact does not exist.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must not be greater than 255 characters.',
            'name.min' => 'The name field must be at least 5 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email field must be a valid email address.',
            'email.max' => 'The email field must be a valid email address.',
            'email.unique' => 'The email has already been taken.',

            'contact.required' => 'The contact field is required.',
            'contact.string' => 'The contact field must be at least 9 characters.',
            'contact.min' => 'The contact field must be at least 9 characters.',
            'contact.max' => 'The contact field must not be greater than 9 characters.',
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
