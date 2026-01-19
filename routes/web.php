<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

// Static page
Route::view("/about", "about");

// Contact page
Route::get("/contact", [ContactController::class, 'index']);

Route::middleware(["auth", AdminCheckMiddleware::class])
    ->prefix("admin")
    ->group(function () {

        Route::get("/", [HomeController::class, 'index']);
        Route::get("/shop", [ShopController::class, 'index']);

        Route::controller(ContactController::class)->group(function () {
            Route::get("/contact/all", "getAllContacts");
            Route::post("/contact/send", "sendContact")->name("sendContact");
            Route::get("/contact/delete/{contact}", "delete")->name("obrisi_kontakt");
        });

        Route::view("/add-product", "add-product");

        Route::controller(ProductController::class)->group(function () {
            Route::get("/all-products", "index")->name("svi_proizvodi");
            Route::get("/delete-product/{product}", "delete")->name("obrisi_proizvod");
            Route::post("/add-product", "saveProduct")->name("snimanje_oglasa");
            Route::get("/product/edit/{product}", "singleProduct")->name("product.single");
            Route::post("/product/save/{product}", "edit")->name("product.save");
        });

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


















