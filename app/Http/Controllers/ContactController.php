<?php
namespace App\Http\Controllers;
use App\Models\ContactModel;
use Illuminate\http\request;







class ContactController extends Controller
{
    public function  index()
    {
      return view("contact");
    }

    public function getAllContacts(){
        $allContacts= ContactModel::all();// pozvao kontakt model i izvukao podatke kao u query (select *) sve kontakte iz baze


        return view("allContacts", compact('allContacts'));// prosledimo trebamo kontakte iu view ucitavamo blade.php i prosledjujemo varijablu all  contacts
    }
}
