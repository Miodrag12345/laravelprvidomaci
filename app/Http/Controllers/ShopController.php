<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index (){

        $products=ProductsModel::all(); //selektuje sve proizvode

        return view ('shop', compact('products'));}

}
