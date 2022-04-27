<?php

use App\Enums\UpdatepermissionsEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return UpdatepermissionsEnum::Role_permissions();
    return 'you are in frontend';

})->name('home');

Route::get('/banned-user', function (Request $request) {
    return 'you are not allowd to enter the website !! contact support for more help';

})->name('banned-user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
