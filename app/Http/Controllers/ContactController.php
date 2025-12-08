<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepositoryEloquent;
use App\Services\CreateContactService;
use App\Services\ReturnContactFormService;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function returnContactForm(): View
    {
        return (new ReturnContactFormService())->returnContactForm();
    }

    public function createContact(ContactRequest $request): View
    {
        return (new CreateContactService())->createContact(New ContactRepositoryEloquent(), $request);
    }
}
