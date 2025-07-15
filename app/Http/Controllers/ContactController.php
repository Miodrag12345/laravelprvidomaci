<?php

namespace App\Http\Controllers; // virtuelna pitanja do samog kontrolera

use Illuminate\Http\Request; // kao require once kao request klasa

class ContactController extends Controller
{
    public function  index()
    {
      return view("contact");
    }
}
