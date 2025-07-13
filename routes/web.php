<?php

Route::view ("/", "welcome");

Route::get("/about", function (){
    return view ("about" ,["ime"=>"Miodrag "],["prezime"=>"Kukric"]);
});

Route::get("/contact", function (){
    return  view ("contact", ["brojtelefona"=>"0640033299"],["email"=>"moj@email.com"]);
});

