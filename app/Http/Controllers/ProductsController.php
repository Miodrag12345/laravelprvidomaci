<?php

namespace App\Http\Controllers;

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
    public function delete($product){


       $singleProduct = $this->productRepo->getProductById($product);

       if($singleProduct===null){
           die("Ovaj proizvod ne postoji"); // ovo je provera ako proizvod ne postoji onda je null i poruku cemo ispisati ako proizvod ne postoji
       }
       $singleProduct->delete(); // ovako smo obrisali uzeli iz baze i obrisali
        return redirect()->back();// admin->all products->delete->back vraca nas na stranicu koju smo dosli kao da smo ostali tu
    }
    public function  singleProduct(Request $request,ProductsModel $product)
    {
         return view("products.edit",compact ('product'));
    }

    public function edit (Request $request,ProductsModel $product){

     $this->productRepo->editProduct($product,$request);

     return redirect()->back();

}}
