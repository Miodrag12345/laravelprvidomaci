<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function saveProduct(FormRequest $request){
        $request->validate([
            "name" => "required|unique:products", // ako postoji ime sa ovim productom  u bazi ispisace nam ovo
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
        return redirect()->route("Sviproizvodi");
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

    public function singleProduct(Request $request, $id)
    {
        $product = ProductsModel::where(['id' => $id])->first(); // nadji mi gde je id jednak varijabli id odnosno
        // SELECT*FROM products where id=$id; da nam nadje tu nasu varijablu id  i sa first da nam nadje prvi upit iz baze
        if($product===null){
            die("Ovaj proizvod ne postoji ");
        }
        return view("products.edit", compact('product')); // prosledjujemo u view ceo product odnosno podatak
    }
    public function  edit(Request $request, $id) // treba nam request za nove cene proizvode podatke generalno
    {
       $products=ProductsModel::where(['id'=>$id])->first(); // izvlacimo iz baze id proizvoda koji imamo id taj u bazi
        if($products===null){
            die("Ovaj proizvod ne postoji");
        }
        $products->name =$request->get("name"); // u ovom polju name upisi name iz request odnosno imenu iz baze request dodeli za name u bazi products
        $products->description =$request->get("description");
        $products->price =$request->get("price");
        $products->amount =$request->get("amount");
        $products->save();
        return redirect()->back(); // da nam vrati iz snimanja podataka u formu
    } // izvukli smo proizvod iz baze

}

