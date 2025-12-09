<?php

namespace App\Services;

use App\Contracts\ContactRepository;
use App\Http\Requests\ContactRequest;
use Illuminate\View\View;

class UpdateContactService
{
    /**
     * Tries to update a contact.
     * @param ContactRepository $repository
     * @param ContactRequest $request
     * @return View
     */
    public function updateContact(ContactRepository $repository, ContactRequest $request): View
    {
        $returnMsg = 'Contact updated successfully.';
        $contactSaved = $repository->updateContact($request);
        $contacts = $repository->getAll(['name', 'id']);

        if (!$contactSaved) {
            $returnMsg = 'An error occurred while update the contact! Please try again.';
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
        return view('contact.list', ['message' => $returnMsg, 'contacts' => $contacts]);
    }
}
