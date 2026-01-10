<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

        Route::get("/all-contacts", [ContactController::class, "getAllContacts"]);
        Route::post("/send-contact", [ContactController::class, "sendContact"]);

        // ✅ ADD PRODUCT (GET + POST NA ISTOJ RUTI)
        Route::get("/add-product", function () {
            return view("add-Product");
        });

        Route::post("/add-product", [ProductsController::class, "saveProduct"])
            ->name("Snimanjeoglasa");

        // PRODUCTS
        Route::get("/all-products", [ProductsController::class, "index"])
            ->name("Sviproizvodi");

        Route::get("/delete-product/{product}", [ProductsController::class, "delete"])
            ->name("Obrisi proizvod");

        // CONTACT DELETE
        Route::get("/delete-contact/{contact}", [ContactController::class, "delete"])
            ->name("obrisiKontakt");

        // EDIT PRODUCT
        Route::get("/product/edit/{product}", [ProductController::class, "singleProduct"])
            ->name("product.single");

        Route::post("/product/save/{product}", [ProductController::class, "Edit"])
            ->name("product.save");
    });

// Public pages
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';








