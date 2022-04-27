<?php

use App\Http\Controllers\BusinesssettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RolesControler;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
   // Auth::user()->givePermissionTo('Admin');
    return view('backend.admin.index');
});

//change language
Route::get('change', [LanguageController::class,'change_language'])->name('language.change');

Route::prefix('language')->middleware('permission:Admin|view-any languages|create languages|Admin|update languages|delete languages')->group( function(){
    Route::get('/', [LanguageController::class,'index'])->name('languages.index');
    Route::post('save', [LanguageController::class,'store'])->name('language.store')->middleware('permission:Admin|create languages');
    Route::put('update', [LanguageController::class,'update'])->name('language.update')->middleware('permission:Admin|update languages');
    Route::delete('destroy', [LanguageController::class,'destroy'])->name('language.destroy')->middleware('permission:Admin|delete languages');
    Route::get('translation/{language_id}', [TranslationController::class,'edit_translation'])->name('language.translation')->middleware('permission:Admin|update languages');
    Route::post('translation/update', [TranslationController::class,'update_translations'])->name('language.translation.update')->middleware('permission:Admin|update languages');

});

Route::prefix('roles')->middleware('permission:Admin|view-any roles|create roles|update roles|delete roles')->group( function(){
    Route::get('/', [RolesControler::class,'index'])->name('roles.index');
    Route::get('create', [RolesControler::class,'create'])->name('role.create')->middleware('permission:Admin|create roles');
    Route::get('edit/{id}', [RolesControler::class,'edit'])->name('role.edit')->middleware('permission:Admin|update roles');
    Route::post('save', [RolesControler::class,'store'])->name('role.store')->middleware('permission:Admin|create roles');
    Route::put('update', [RolesControler::class,'update'])->name('roles.update')->middleware('permission:Admin|update roles');
    Route::delete('destroy', [RolesControler::class,'destroy'])->name('role.destroy')->middleware('permission:Admin|delete roles');
});

Route::prefix('users')->middleware('permission:Admin|view-any users|create users|update users|delete users|ban-unban users|assign user permission|create manager|')->group( function(){
    Route::get('/', [UsersController::class,'index'])->name('users.index');
    Route::get('user/{id}', [UsersController::class,'view'])->name('user.view')->middleware('permission:Admin|view users'); // view a single user
    Route::get('edit/{id}', [UsersController::class,'edit'])->name('user.edit')->middleware('permission:Admin|update users');
    Route::put('update', [UsersController::class,'update'])->name('user.update')->middleware('permission:Admin|update users');
    Route::delete('destroy', [UsersController::class,'destroy'])->name('user.destroy')->middleware('permission:Admin|delete users');
    Route::get('search', [UsersController::class,'Search'])->name('users.search');
    Route::get('filter', [UsersController::class,'Search'])->name('users.filter');
    Route::post('update/password', [UsersController::class,'user_update_email'])->name('user.update.email')->middleware('permission:Admin|update user auth');
    Route::post('update/email', [UsersController::class,'user_update_password'])->name('user.update.password')->middleware('permission:Admin|update user auth');
    Route::put('ban-user', [UsersController::class,'ban_user'])->name('ban.user')->middleware('permission:Admin|ban-unban users');
    Route::put('unban-user', [UsersController::class,'unban_user'])->name('unban.user')->middleware('permission:Admin|ban-unban users');
    Route::get('permissions/{id}', [UsersController::class,'permissions'])->name('permissions.user')->middleware('permission:Admin|assign user permission');

    Route::get('manager/create', [UsersController::class,'create_new_manager'])->name('create.user.manager')->middleware('permission:Admin|create manager');
    Route::post('manager/save', [UsersController::class,'store_new_manager'])->name('store.user.manager')->middleware('permission:Admin|create manager');
    
    Route::get('customer/create', [UsersController::class,'create_new_customer'])->name('create.user.customer')->middleware('permission:Admin|create users');
});

Route::prefix('my-account')->group( function(){
    Route::get('overview', [UsersController::class,'my_Account'])->name('account.overview');
    Route::get('edit', [UsersController::class,'my_Account_edit'])->name('account.edit');
    Route::post('update', [UsersController::class,'my_Account_update'])->name('account.update');
    Route::post('update/password', [UsersController::class,'my_Account_update_password'])->name('account.update.password');
    Route::post('update/email', [UsersController::class,'my_Account_update_email'])->name('account.update.email');
});

Route::prefix('settings')->middleware('permission:Admin|view-any settings|create settings|update settings|delete settings')->group( function(){
    Route::get('/', [BusinesssettingController::class,'index'])->name('settings.index');
    Route::put('update', [BusinesssettingController::class,'update'])->name('settings.update')->middleware('permission:Admin|update settings');
});


