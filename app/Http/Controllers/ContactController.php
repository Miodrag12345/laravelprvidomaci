<?php
namespace App\Http\Controllers;
use App\Models\ContactModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\request;

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

    public function  sendContact(FormRequest $request) // svi podaci za nase posete na sajtu i koje imamo u requestu
    {



        $request->validate([
            // name polja =>pravila
            "email"=>"required|string", // dali postoji email kao ISSET u php && is_string("POST['email'])
            "subject"=>"required|string",
            "description"=>"required|string|min:5"


        ]);



     ContactModel::create([
         "email" => $request->get("email"), // polje email u bazi upisi email iz request
         "subject"=>$request->get("subject"),
         "message"=>$request->get("description")

     ]);
     // ovo je kao INSERT u bazi query radimo u php CONTACT ...
        return redirect("/shop"); // posaljemo u shop redirectujemo nase podatke
    }



}






