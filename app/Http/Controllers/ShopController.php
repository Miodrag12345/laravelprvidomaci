<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index (){


        $products=ProductsModel::all(); //selektuje sve proizvode

        return view ('shop', compact('products'));}

}
