<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;


class managment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('lang')){
            $lang = Session::get('lang');
        }
        else{
            $lang = env('DEFAULT_LANGUAGE');
        }

        App::setLocale($lang);
        $request->session()->put('lang', $lang);
        return $next($request);
    }
}
