<?php

namespace App\Services;

use Illuminate\View\View;

class ReturnContactFormService
{
    public function returnContactForm(): View
    {
        return view('contact.contact-form');
    }
}
