<?php

namespace App\Http\Controllers;

use App\Events\LanguagecreatedEvent;
use App\Http\Requests\language\LanguageDestroyRequest;
use App\Http\Requests\language\storeRequest;
use App\Http\Requests\language\updateRequest;
use App\Http\Requests\LanguageChangeRequest;
use App\Models\Language;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LanguageController extends Controller
{
    public function index(){

        $this->authorize('Admin');
        
        $languages= Language::all();
        return view('backend.languages.index',compact('languages'));
    }
    public function store(storeRequest $request){

        $fileName = time() . '_' .Str::slug($request->name, '_') . '.' . $request[Language::IMAGE_COLUMN_NAME]->guessExtension();
        $image_path = $request->file('image')->storeAs('Language_flags', $fileName,'public');

        $language = Language::create([
            Language::NAME_COLUMN_NAME=>$request->name,
            Language::KEY_COLUMN_NAME=>$request->key,
            Language::IMAGE_COLUMN_NAME=>$image_path,
            Language::IS_RTL_COLUMN_NAME=>$request->is_RTL ? 1 : 0,
        ]);
        event( new LanguagecreatedEvent($language));
        return redirect()->route('languages.index');
    }

    public function update(updateRequest $request){
        $language=Language::find(decrypt($request->lang_id));

       if($request->image != null){
        $fileName = time() . '_' .Str::slug($request->name, '_') . '.' . $request[Language::IMAGE_COLUMN_NAME]->guessExtension();
        $image_path = $request->file('image')->storeAs('Language_flags', $fileName,'public');
       }else{
        $image_path = $language[Language::IMAGE_COLUMN_NAME];
       }
       
        $language->update([
            Language::NAME_COLUMN_NAME=>$request->name,
            Language::KEY_COLUMN_NAME=>$request->key,
            Language::IMAGE_COLUMN_NAME=>$image_path,
            Language::IS_RTL_COLUMN_NAME=>$request->is_RTL ? 1 : 0,
        ]);
        return redirect()->route('languages.index');
    }
    public function destroy(LanguageDestroyRequest $request){
        $language=Language::find(decrypt($request->lang_id));
        DB::table(Translation::TABLE)->where(Translation::LANG_COLUMN_NAME,$language[Language::KEY_COLUMN_NAME])->delete();
        $language->delete();
        return redirect()->route('languages.index');
    }
    public function change_language(LanguageChangeRequest $request){
        $lang = Language::find($request->language_id);
       
        App::setLocale($lang->getKey());
        $request->session()->put('lang', $lang->getKey());
        $cookie = Cookie::make('user_lang',env('DEFAULT_LANGUAGE'), 60 * 24 * 365);
       $user= Auth::user();
       $old_language = Language::where(Language::KEY_COLUMN_NAME,$user->getlang())->first();
       #update the lang used by the user
       $user->update([
           User::LANG_COLUMN_NAME=>$lang->getKey(),
       ]);
       #update number users of each language
       $lang->update([
           Language::NUMBER_USERS_COLUMN_NAME=>$lang->getNumberUsers() + 1 ,
       ]);
       if($old_language){
           $old_language->update([
               Language::NUMBER_USERS_COLUMN_NAME => $old_language->getNumberUsers()  - 1,
           ]);
       }

        return redirect()->back()->cookie($cookie);
    }

}
