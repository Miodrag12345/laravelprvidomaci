<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Repositories\ProductRepositiry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class ProductsController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo= new ProductRepositiry();

    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }
    public function saveProduct(SaveProductRequest $request){



        $this->productRepo->createNew($request);

        return redirect()->route("Sviproizvodi"); // da posaljemo na rutu i route vezujemo za name koje smo pravili tamo
    }
    public function delete(ProductsModel $product){



       $product>delete(); // ovako smo obrisali uzeli iz baze i obrisali
        return redirect()->back();// admin->all products->delete->back vraca nas na stranicu koju smo dosli kao da smo ostali tu
    }
    public function  singleProduct(ProductsModel $product)
    {
         return view("products.edit",compact ('product'));
    }

    public function edit (EditProductRequest $request,ProductsModel $product){

     $this->productRepo->editProduct($product,$request);

     return redirect()->back();

}}
