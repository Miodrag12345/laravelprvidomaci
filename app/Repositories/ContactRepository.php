<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    public function createNew($request)
    {
        return ContactModel::create([
            'email'   => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description'),
        ]);
    }
}
