<?php


use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;




Route::view("/about", "about");


Route::get("/contact", [ContactController::class, 'index']);

Route::post("/cart/add", [ShoppingCartController::class, 'addToCart'])->name("cart.add");
Route::get("/cart", [ShoppingCartController::class, "index"])->name("cart.index");
Route::get("/cart/finish",[ShoppingCartController::class, 'finishOrder'])->name("cart.finish");

Route::middleware(["auth", AdminCheckMiddleware::class])
    ->prefix("/admin")
    ->group(function () {

        Route::get("/", [HomeController::class, 'index']);
        Route::get("/shop", [ShopController::class, 'index']);
        Route::get("/products/{product}",[ProductsController::class, 'permalink'])->name('products.permalink');

        Route::controller(ContactController::class)->prefix("/contact")->group(function () {
            Route::get("/all", "getAllContacts");
            Route::post("/send", "sendContact")->name("contact.send");
            Route::get("/delete/{contact}", "delete")->name("contact.delete");
        });

        Route::view("/add-product", "add-product");

        Route::controller(ProductsController::class)->prefix("/products")
            ->name('products.')
            ->group(function () {
            Route::get("/all", "index")->name("products.all");
            Route::get("/delete/{product}", "delete")->name("delete");
            Route::post("/save", "saveProduct")->name("create");
            Route::get("/edit/{product}", "singleProduct")->name("single");
            Route::post("/save/{product}", "edit")->name("save");
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


















