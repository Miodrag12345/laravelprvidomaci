<?php


namespace App\Http\Controllers;
use App\Http\Requests\SendContactRequest;
use App\Repositories\ContactRepository;
use App\Models\ContactModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo=new contactRepository();
    }
    public function  index()
    {
        return view("contact");

    }

    public function  delete(ContactModel $contact) // mora biti u zagradi ime u zagradama u route sto smo stavili mora biti kao varijabla
    {


     $contact->delete();
     return redirect()->back(); // vraca nas na stranicu odakle smo dosli
    }

    public function getAllContacts(){
        $allContacts= ContactModel::all();// pozvao kontakt model i izvukao podatke kao u query (select *) sve kontakte iz baze


        return view("allContacts", compact('allContacts'));// prosledimo trebamo kontakte iu view ucitavamo blade.php i prosledjujemo varijablu all  contacts
    }

    public function  sendContact(SendContactRequest $request) // svi podaci za nase posete na sajtu i koje imamo u requestu
    {
        $this->contactRepo->createNew($request);


        return redirect("/shop");
    }



}












