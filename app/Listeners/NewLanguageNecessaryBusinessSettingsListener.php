<?php

namespace App\Listeners;

use App\Models\Business_setting;
use App\Models\Business_Setting_Translation;
use App\Models\Language;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewLanguageNecessaryBusinessSettingsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $default_lang = Language::where(Language::IS_DEFAULT_COLUMN_NAME, '1')->first();
        if ($default_lang == null) {
            $default_lang = $event->language;
        }
        $business_settings = ['website_name', 'website_description', 'website_Logo', 'website_favicon', 'website_default_og_image', 'website_og_description_tag', 'keywords_tags', 'website_og_url_tag', 'website_og_title_tag', 'website_meta_description_tag'];

        foreach ($business_settings as $business_setting) {
            $business_settings = Business_setting::where(Business_setting::KEY_COLUMN_NAME, $business_setting)->first();
            $bst = Business_Setting_Translation::where(Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME, $business_settings->getId())
                ->where(Business_Setting_Translation::LANG_COLUMN_NAME, $event->language[Language::KEY_COLUMN_NAME])
                ->first();

            if ($bst == null) {
                $Default_Business_Setting_Translation= Business_Setting_Translation::where(Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME, $business_settings[Business_setting::PRIMARY_KEY_COLUMN_NAME])->where(Business_Setting_Translation::LANG_COLUMN_NAME, $default_lang[Language::KEY_COLUMN_NAME])->first();
                Business_Setting_Translation::create([
                    Business_Setting_Translation::LANG_COLUMN_NAME => $event->language[Language::KEY_COLUMN_NAME],
                    Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $business_settings[Business_setting::PRIMARY_KEY_COLUMN_NAME],
                    Business_Setting_Translation::VALUE_COLUMN_NAME => $Default_Business_Setting_Translation[Business_Setting_Translation::VALUE_COLUMN_NAME]  ?? $business_setting
                ]);
            }
        }
    }
}
