<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslationUpdateRequest;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function edit_translation(Request $request)
    {

        $language=Language::find(decrypt($request->language_id));

        $translations=Translation::orderBy('updated_at','asc')->where(Translation::LANG_COLUMN_NAME,$language->getKey());

        if($request->has('search')){
            $translations= $translations->where([Translation::LANG_COLUMN_NAME => $language->getKey()])->where(function($query) use ($request) {$query->where(Translation::KEY_COLUMN_NAME,'LIKE','%'.$request->search.'%')->orWhere(Translation::VALUE_COLUMN_NAME,'LIKE','%'.$request->search.'%');});
        }

        $translations = $translations->paginate(10);

        return view('backend.languages.translation',compact('language','translations'));
    }
    public function update_translations(TranslationUpdateRequest $request){
       
        foreach($request->keys as $index => $key){
           
            Translation::where([Translation::LANG_COLUMN_NAME => $request[Translation::LANG_COLUMN_NAME],Translation::KEY_COLUMN_NAME => $key])->update([
                Translation::VALUE_COLUMN_NAME => $request->values[$index]
            ]);
        }
        return back();
    }
    public function search_translations(Request $request){
        $request->validate([
            'search' => 'required',
            'language_id' => 'required',
        ]);
        $language=Language::find($request->language_id);
        return view('backend.languages.translation',compact('language','translations'));
    
    }
}
