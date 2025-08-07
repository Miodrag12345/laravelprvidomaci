<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role=Auth::user()->role; //od mene koje sam ulogovan uzmi mi podatke iz baze daj mi podatke o meni

        if($role !="admin"){
            return redirect("/"); // ako korisnik nije admin gornji red u ifu != podle nas vrati pristupi glavnoj stranici
        }
        return $next($request);
    }
}
