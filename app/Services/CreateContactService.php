<?php

namespace App\Services;

use App\Contracts\ContactRepository;
use App\Http\Requests\ContactRequest;
use Illuminate\View\View;

class CreateContactService
{
    /**
     * Tries to create a new contact.
     * @param ContactRepository $repository
     * @param ContactRequest $request
     * @return View
     */
    public function createContact(ContactRepository $repository, ContactRequest $request): View
    {
        $returnMsg = 'Contact saved successfully.';
        $contactSaved = $repository->createContact($request);

        if (!$contactSaved) {
            $returnMsg = 'An error occurred while saving the contact! Please try again.';
            return view(
                'contact.contact-form',
                [
                    'message' => $returnMsg,
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact
                ]
            );
        }
        return view('contact.contact-form', ['message' => $returnMsg]);
    }
}
