<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index (){
      $products = [
          "Iphone 14", "Samsung A52", "Samsung A30", "Iphone 13 pro"
          ];
        return view ('shop', compact ('products'));}

}
