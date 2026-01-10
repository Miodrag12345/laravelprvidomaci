<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $sat= date("h");

        $products=ProductsModel::orderByDesc("id")->take(6)->get();


        $trenutnoVreme = date("h:i:s");// napravili smo varijablu i stavili da je sat minut ,sekund
        return view('welcome', compact('trenutnoVreme','sat','products')); // ako zelimo  da varijablu trenutno vreme prosledimo bladeu odnosno iz kontrolera prosledimo bladeu kucamo comapct pa ime varijable u view
    }
}


