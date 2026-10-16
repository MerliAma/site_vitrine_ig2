<?php

namespace App\Http\Middleware;

use Closure;
use App\role;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        $idAdmin=role::where('libelle','Admin')->get();
        if(Auth::check() && Auth::user()->role->id==$idAdmin[0]->id) //role_id==1
        {
            return $next($request);
        }
        else
        {
            redirect()->route('login');
        }
    }
}
