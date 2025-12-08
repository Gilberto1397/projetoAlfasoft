<?php

namespace App\Services;

use Illuminate\View\View;

class ReturnContactFormService
{
    public function returnContactForm($contactId = null): View
    {
        return view('contact.contact-form', ['contactId' => $contactId]);
    }
}
