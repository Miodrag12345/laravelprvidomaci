<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository{
    private $contactModel;

    public function __construct()
    {
       $this->contactModel=new ContactModel();

    }
    public function createNew($request)
    {
       $this->contactModel->create ([
           "email" => $request->get("email"), // polje email u bazi upisi email iz request
           "subject"=>$request->get("subject"),
           "message"=>$request->get("description")
       ]);
    }

}
