<?php

namespace App\Services;

use App\Contracts\ContactRepository;
use Illuminate\View\View;

class GetContactByIdService
{
    /**
     * Get details about a contact by id.
     * @param ContactRepository $contactRepository
     * @param $contactId
     * @return View
     */
    public function getByid(ContactRepository $contactRepository, $contactId): View
    {
        if (empty($contactId) || !filter_var($contactId, FILTER_VALIDATE_INT)) {
            return view('contact.list', ['message' => 'Contact not found.']);
        }
        $contact = $contactRepository->getById($contactId);

        if ($contact === null) {
            return view('contact.list', ['message' => 'Contact not found.']);
        }
        return view('contact.contact-details', ['contact' => $contact]);
    }
}
