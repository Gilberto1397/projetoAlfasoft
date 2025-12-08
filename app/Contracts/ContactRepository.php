<?php

namespace App\Contracts;

use App\Http\Requests\ContactRequest;

interface ContactRepository
{
    /**
     * Create a new contact.
     * @param ContactRequest $request
     * @return bool
     */
    public function createContact(ContactRequest $request): bool;
}
