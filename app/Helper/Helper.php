<?php

use App\Models\Business_setting;
use App\Models\Business_Setting_Translation;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

function translate($key, $lang = null)
{
    if ($lang == null) {
        $lang = App::getLocale();
    }


    $translation_def = Translation::where(Translation::LANG_COLUMN_NAME, $lang)->where(Translation::KEY_COLUMN_NAME, $key)->first();
    // if not found create it 
    if ($translation_def == null) {
        $translation_def = new Translation();
        $translation_def[Translation::LANG_COLUMN_NAME] = $lang;
        $translation_def[Translation::KEY_COLUMN_NAME] = $key;
        $translation_def[Translation::VALUE_COLUMN_NAME] = $key;
        $translation_def->save();
    }

    //Check for session lang
    $translation_locale = Translation::where(Translation::KEY_COLUMN_NAME, $key)->where(Translation::LANG_COLUMN_NAME, Session::get('lang', env('DEFAULT_LANGUAGE')))->first();
    if ($translation_locale != null && $translation_locale[Translation::VALUE_COLUMN_NAME] != null) {
        return $translation_locale[Translation::VALUE_COLUMN_NAME];
    } elseif ($translation_def[Translation::VALUE_COLUMN_NAME] != null) {
        return $translation_def[Translation::VALUE_COLUMN_NAME];
    } else {
        return $key;
    }
}

# this function is to retrive image from storage 
function Storage($path)
{
    return '/storage/' . $path;
}

# this function is to retrive image from storage 
function public_media($path)
{
    return '/'. $path;
}


#update website Logo
function Update_BusinessImages($request, $name, $default_language,$languages)
{
    //update default lang  Website Logo
    $business_setting_favicon = Business_setting::where(Business_setting::KEY_COLUMN_NAME, $name)->first();
    if ($request->has($name)) {
        //save image 
        $fileName = time() . '.' . $request[$name]->guessExtension();
        $path = $request->file($name)->storeAs('Business_files', $fileName, 'public');
        Business_Setting_Translation::where([
            Business_Setting_Translation::LANG_COLUMN_NAME => $default_language->getKey(),
            Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $business_setting_favicon->getId()
        ])->update([
            Business_Setting_Translation::VALUE_COLUMN_NAME => $path,
        ]);
    }

    //update other languages$name     
    foreach ($languages as $language) {
        if ($request->has($name . $language->getKey())) {
            //save image
            $fileName = time() . '.' . $request[$name . $language->getKey()]->guessExtension();
            $path = $request->file($name . $language->getKey())->storeAs('Business_files', $fileName, 'public');
            Business_Setting_Translation::where([
                Business_Setting_Translation::LANG_COLUMN_NAME => $language->getKey(),
                Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $business_setting_favicon->getId()
            ])->update([
                Business_Setting_Translation::VALUE_COLUMN_NAME => $path,
            ]);
        }
    }
}
