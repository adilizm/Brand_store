<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsUpdateRequest;
use App\Models\Business_setting;
use App\Models\Business_Setting_Translation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class BusinesssettingController extends Controller
{
    public function index()
    {
        //all business data will be stored in data array 
        $data = [];
        $One_lang_business_settings_Temp = [];
        //get all languages exapt default one
        $languages = Language::where(Language::IS_DEFAULT_COLUMN_NAME, 0)->get();
        // get the default language 
        $default_language = Language::where(Language::IS_DEFAULT_COLUMN_NAME, 1)->first();

        array_push($One_lang_business_settings_Temp, $default_language);

        // all the defirant business setting keys
        $business_settings = ['website_name', 'website_description', 'website_meta_description_tag', 'website_og_title_tag', 'website_og_url_tag', 'keywords_tags', 'website_og_description_tag',  'website_Logo', 'website_favicon', 'website_default_og_image',];

        //get business settings for the default language
        foreach ($business_settings as $business_setting) {
            $website_setting = Business_setting::where('key', $business_setting)->with('Business_Setting_Translations', function ($query) use ($default_language) {
                $query->where('lang', $default_language[Language::KEY_COLUMN_NAME]);
            })->first();
            array_push($One_lang_business_settings_Temp, $website_setting);
        }
        array_push($data, $One_lang_business_settings_Temp);

        $One_lang_business_settings_Temp = [];

        foreach ($languages as $language) {

            array_push($One_lang_business_settings_Temp, $language);

            foreach ($business_settings as $business_setting) {

                $website_setting = Business_setting::where('key', $business_setting)->with('Business_Setting_Translations', function ($query) use ($language) {
                    $query->where('lang', $language[Language::KEY_COLUMN_NAME]);
                })->first();
                array_push($One_lang_business_settings_Temp, $website_setting);
            }
            array_push($data, $One_lang_business_settings_Temp);
            $One_lang_business_settings_Temp = [];
        }
        //  dd($data,$data[0][9][Business_setting::KEY_COLUMN_NAME],$data[0][9]->Business_Setting_Translations[0][Business_Setting_Translation::VALUE_COLUMN_NAME]);
        return view('backend.settings.index', compact('data'));
    }
    public function update(SettingsUpdateRequest $request)
    {

        $default_language = Language::where(Language::IS_DEFAULT_COLUMN_NAME, '1')->first();
        $languages = Language::where(Language::IS_DEFAULT_COLUMN_NAME, '0')->get();

        $business_settings = ['website_name', 'website_description', 'website_og_description_tag', 'keywords_tags', 'website_og_url_tag', 'website_og_title_tag', 'website_meta_description_tag'];
        //update business setting for default language 
        foreach ($business_settings as $business_setting_name) {
            $business_setting = Business_setting::where(Business_setting::KEY_COLUMN_NAME, $business_setting_name)->first();
            Business_Setting_Translation::where([
                Business_Setting_Translation::LANG_COLUMN_NAME => $default_language->getKey(),
                Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $business_setting->getId()
            ])->update([
                Business_Setting_Translation::VALUE_COLUMN_NAME => $request[$business_setting_name],
            ]);
        }
        //update business setting for other languages 
        foreach ($languages as $language) {
            foreach ($business_settings as $business_setting_name) {
                $business_setting = Business_setting::where(Business_setting::KEY_COLUMN_NAME, $business_setting_name)->first();
                Business_Setting_Translation::where([
                    Business_Setting_Translation::LANG_COLUMN_NAME => $language->getKey(),
                    Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $business_setting->getId()
                ])->update([
                    Business_Setting_Translation::VALUE_COLUMN_NAME => $request[$business_setting_name . $language->getKey()],
                ]);
            }
        }
        # update Website Logo 
        Update_BusinessImages($request, 'website_Logo', $default_language, $languages);

        # update favicone
        Update_BusinessImages($request, 'website_favicon', $default_language, $languages);

        # update favicone
        Update_BusinessImages($request, 'website_default_og_image', $default_language, $languages);

        return redirect()->route('settings.index')->with('success', 'setting updated');
    }
}
