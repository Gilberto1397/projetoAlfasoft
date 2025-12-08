<?php

namespace App\Contracts;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

interface ContactRepository
{
    /**
     * Create a new contact.
     * @param ContactRequest $request
     * @return bool
     */
    public function createContact(ContactRequest $request): bool;

    /**
     * Get all contacts.
     * @param array $fields
     * Get all contacts.
     * @return array
     */
    public function getAll(array $fields = ['*']): array;

    /**
     * Get contact by ID.
     * @param int $id
     * @return Contact|null
     */
    public function getById(int $id): ?Contact;
}
