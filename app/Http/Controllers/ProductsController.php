<?php

namespace App\Http\Controllers;


use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ProductsModel::all();
        return view('allProducts', compact('allProducts'));
    }

    public function  permalink(ProductsModel $product)
    {
        return view("products.permalink",compact('product'));
    }


    public function saveProduct(Request $request)
    {
        $request->validate([
            "name" => "required|unique:products",
            "description" => "required",
            "amount" => "required|integer|min:0",
            "price" => "required|min:0",
            "image" => "required"
        ]);

        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image")
        ]);

        return redirect()->route("products.all");
    }

    public function delete(ProductsModel $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function singleProduct(ProductsModel $product)
    {
        return view('products.edit', compact('product'));
    }

    public function edit(Request $request, ProductsModel $product)
    {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->amount = $request->get('amount');
        $product->save();

        return redirect()->back();
    }
}
