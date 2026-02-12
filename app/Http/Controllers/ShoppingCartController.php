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






        $combined=[];
        foreach (Session::get('product') as $item){
            $product=ProductsModel::firstWhere(['id'=>$item['prduct_id']]);
            if($product){
                $combined[]=[
                    'name'=>$product->name,
                    'amount'=>$item->amount,
                     'price'=>$product->price,
                     'total'=>$item['amount']*$product->price
                ];
            }
        }

       return view("cart" , [
            'combinedItems'=>$combined

       ]);
    }


    public function addToCart(CartAddRequest $request)
    {
        $product=ProductsModel::find(['id'=>$request->id])->first(); // imamo proizvod taj
        if($product->amount<$request->amount){
            return redirect ()->back();
        }

        Session::push('product', [
            'product_id'=>$request->id,
            'amount'=>$request->amount,

        ]);



        return redirect()->route('cart.index');
    }
}
