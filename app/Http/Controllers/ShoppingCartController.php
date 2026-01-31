<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    public function index()
    {

       $allProducts =[];
       foreach (Session::get('product') as $carItem){
           $allProducts []=$carItem['product_id'];
       }

       $products=ProductsModel::whereIn("id",$allProducts)->get();

       return view("cart" , [
           'cart' =>Session::get('product',[]),
           'products'=>$products

       ]);
    }


    public function addToCart(CartAddRequest $request)
    {
        $product=ProductsModel::where(['id'=>$request->id])->first(); // imamo proizvod taj
        if($product->amount<$request->amount){
            return redirect ()->back();
        }

        Session::push('product', [
            'product_id'=>$request->id,
            'amount'=>$request->amount,

        ]);



        return redirect()->route('cart');
    }
}
