<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
public function addProduct(FormRequest $request){

$request->validate([
    "name" => "required|string|max:255",
    "description" => "nullable|string",
    "amount" => "required|numeric",
    "price" => "required|integer",

    "image" =>"nullable|image|mimes:jpg,jpeg,png|max:2048"

]);

ProductsModel::create([
"name"=>$request->get("name"),
"description"=>$request->get("description"),
"amount"=>$request->get("amount"),
"price"=>$request->get("price"),
"image"=>$request->get("image")
]);
}
}
