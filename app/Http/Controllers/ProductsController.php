<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }
    public function saveProduct(FormRequest $request){
        $request->validate([
           "name" => "required",
            "description" =>"required",
            "amount" =>"int|required|min:0",
            "price"=>"required|min:0",
            "image"=>"required"
        ]);
        ProductsModel::create([
            "name"=>$request->get("name"),
            "description"=>$request->get("description"),
            "amount"=>$request->get("amount"),
            "price"=>$request->get("price"),
            "image"=>$request->get("image")
        ]);
    }
    public function delete($product){
        //SELECT * FROM products WHERE id=$products kada uradimo first samo prvu za product LIMIT 1 GET ispisujemo sve
        $singleProduct=ProductsModel::where(['id'=>$product])->first();
       if($singleProduct===null){
           die("Ovaj proizvod ne postoji"); // ovo je provera ako proizvod ne postoji onda je null i poruku cemo ispisati ako proizvod ne postoji
       }
       $singleProduct->delete(); // ovako smo obrisali uzeli iz baze i obrisali
        return redirect()->back();// admin->all products->delete->back vraca nas na stranicu koju smo dosli kao da smo ostali tu
    }
}
