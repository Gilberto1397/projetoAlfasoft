<?php

namespace App\Services;

use App\Contracts\ContactRepository;
use Illuminate\View\View;

class GetAllContactsNamesAndIdsService
{
    /**
     * Render the list of contacts
     * @param ContactRepository $contactRepository
     * @return View
     */
    public function getAllContactsNamesAndIds(ContactRepository $contactRepository): View
    {
        $contacts = $contactRepository->getAll(['name', 'id']);
        return view('contact.list', ['contacts' => $contacts]);
    }
}
