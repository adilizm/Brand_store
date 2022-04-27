<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class Language
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
       
        if ($request->language == null) {
            if (Cookie::get('user_lang') != null) {
                App::setlocale(Cookie::get('user_lang'));
            }else{
                $cookie = Cookie::make('user_lang',env('DEFAULT_LANGUAGE'), 60 * 24 * 365);
                $request->session()->put('lang',env('DEFAULT_LANGUAGE'));

                return redirect()->route('home')->cookie($cookie);
            }
        }
        return $next($request);
    }
}
