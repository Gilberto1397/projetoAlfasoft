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

    /**
     * Get contact by ID.
     * @param int $id
     * @return Contact|null
     */
    public function getById(int $id): ?Contact
    {
        return Contact::find($id);
    }

    /**
     * Update a contact.
     * @param ContactRequest $request
     * @return bool
     */
    public function updateContact(ContactRequest $request): bool
    {
        $contact = $this->getById($request->contactId);

        if ($contact === null) {
            return false;
        }
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact = $request->contact;
        return $contact->save();
    }
}
