<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
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
        dd($request->all());
    }
}
