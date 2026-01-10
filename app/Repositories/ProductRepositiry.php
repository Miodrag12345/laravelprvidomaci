<?php

namespace App\Repositories;

use App\Models\ProductsModel;

class ProductRepositiry{
    private $productModel;

    public function __construct()
    {
       $this->productModel=new ProductsModel();

    }

    public function  createNew($request)
    {
        $this->productModel->create([
            "name"=>$request->get("name"),
            "description"=>$request->get("description"),
            "amount"=>$request->get("amount"),
            "price"=>$request->get("price"),
            "image"=>$request->get("image")
        ]);

    }

    public function getProductById($id){

    return $this->productModel->where(['id' => $id])->first();
    }
    public function editProduct($product,$request)
    {
        $product->name=$request->get("name");
        $product->description=$request->get("description");
        $product->amount=$request->get("amount");
        $product->price=$request->get("price");
        $product->save();

    }
}
