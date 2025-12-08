<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepositoryEloquent;
use App\Services\CreateContactService;
use App\Services\GetAllContactsNamesAndIdsService;
use App\Services\GetContactByIdService;
use App\Services\ReturnContactFormService;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function returnContactForm($contactId = null): View
    {
        return (new ReturnContactFormService())->returnContactForm();
    }

    public function createContact(ContactRequest $request): View
    {
        return (new CreateContactService())->createContact(New ContactRepositoryEloquent(), $request);
    }

    public function getAll(): View
    {
        return (new GetAllContactsNamesAndIdsService())->getAllContactsNamesAndIds(New ContactRepositoryEloquent());
    }

    public function getByid($contactId = null): View
    {
        return (new GetContactByIdService())->getByid(New ContactRepositoryEloquent(), $contactId);
    }

    public function updateContact(ContactRequest $request)
    {

    }
}
