<?php

namespace App\Repositories;

use App\Contracts\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactRepositoryEloquent implements ContactRepository
{

    /**
     * Create a new contact.
     * @param ContactRequest $request
     * @return bool
     */
    public function createContact(ContactRequest $request): bool
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        return $contact->save();
    }

    /**
     * Get all contacts.
     * @return Contact[]|array
     */
    public function getAll(array $fields = ['*']): array
    {
        return Contact::query()->select($fields)->get()->all();
    }
}
