<?php

namespace App\Services;

use App\Contracts\ContactRepository;
use Illuminate\View\View;

class ReturnContactFormService
{
    public function returnContactForm(ContactRepository $repository, $contactId = null): View
    {
        return view('contact.contact-form', ['contact' => ($contactId) ? $repository->getById($contactId) : null]);
    }
}
