<?php

use Illuminate\Http\Request;





Route::view("/about", "about");

// kada se dodje na nas sajt http://127.0.0.1:8000/contact->ucitaj contact controler
// iz tog kontrolera pozovi funkciju index koju smo u kontroleru kreirali
Route::get("/contact", [\App\Http\Controllers\ContactController::class,  'index'],); // da preko rute gde smo napravili kontroler iscita klasu glavne stranice npr i npr stavimo ime kontrolera tu posle rute
Route::get("/", [\App\Http\Controllers\HomeController::class, 'index']);
Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);




