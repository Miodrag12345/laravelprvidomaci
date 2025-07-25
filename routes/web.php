<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


Route::view("/about", "about");

// kada se dodje na nas sajt http://127.0.0.1:8000/contact->ucitaj contact controler
// iz tog kontrolera pozovi funkciju index koju smo u kontroleru kreirali
Route::get("/contact", [ContactController::class, 'index']);

Route::middleware('auth')->prefix("admin")->group(function (){

    Route::get("/", [HomeController::class, 'index']);

    Route::get("/shop", [ShopController::class, 'index']);
    Route::get("/all-contacts", [ContactController::class, "getAllContacts"]);
    Route::post("/send-contact", [ContactController::class, "sendContact"]);



    Route::get("/all-products", [ProductsController::class, "index"])

        ->name("Sviproizvodi");

    Route::get("/delete-product/{product}",[ProductsController::class, "delete"]) // kada dodjemo do ove rute poziva productController funckiju delete
// nppr admin/delete-product/id5 npr iz product modela brisemo id 5

    ->name("Obrisi proizvod");
    Route::get("/admin/delete-contact/{contact}",[ContactController::class, "delete"])

        ->name("obrisiKontakt");
    Route::view("/add-product", "add-Product");
    Route::post("/save-product", [ProductsController::class, "saveProduct"])

        ->name("Snimanjeoglasa");
    Route::get("/product/edit/{product}", [ProductController::class, "singleProduct"])

        ->name("product.single");
    Route::post("/product/save/{product}",[ProductController::class, "Edit"])

        ->name("product.save");





});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';









