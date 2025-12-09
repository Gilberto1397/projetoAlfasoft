<?php

namespace App\Services;

use App\Contracts\ContactRepository;

class DeleteContactService
{
    public function deleteContact(ContactRepository $contactRepository, int $contactId)
    {
        if (empty($contactId) || !filter_var($contactId, FILTER_VALIDATE_INT)) {
            return view('contact.list', ['message' => 'Contact not found.']);
        }
        $returnMsg = 'Contact deleted successfully.';
        $contactSaved = $contactRepository->deleteContact($contactId);
        $contacts = $contactRepository->getAll(['name', 'id']);

        if (!$contactSaved) {
            $returnMsg = 'An error occurred while deleting the contact! Please try again.';
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
