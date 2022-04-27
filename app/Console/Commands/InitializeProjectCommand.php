<?php

namespace App\Console\Commands;

use App\Enums\UpdatepermissionsEnum;
use App\Models\Business_setting;
use App\Models\Business_Setting_Translation;
use App\Models\City;
use App\Models\City_translation;
use App\Models\Language;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class InitializeProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this comande create permissions and Admin accound use only in first install after migration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        $this->info('migration done');
        $business_settings = ['website_name', 'website_description', 'website_Logo', 'website_favicon', 'website_default_og_image', 'website_og_description_tag', 'keywords_tags', 'website_og_url_tag', 'website_og_title_tag', 'website_meta_description_tag'];

        //create init business settings
        foreach ($business_settings as $business_setting) {
            Business_setting::create([
                Business_setting::KEY_COLUMN_NAME => $business_setting,
                Business_setting::HAS_TRANSLATION_COLUMN_NAME => '1',
            ]);
        }
        //create business translation for business settings
        foreach ($business_settings as $index => $business_setting) {
            Business_Setting_Translation::create([
                Business_Setting_Translation::LANG_COLUMN_NAME => 'en',
                Business_Setting_Translation::BUSINESS_SETTING_ID_COLUMN_NAME => $index+1,
                Business_Setting_Translation::VALUE_COLUMN_NAME => $business_setting
            ]);
            $this->info($index+1 .' =>');
        }
        #create En as default language
        Language::create([
            Language::NAME_COLUMN_NAME => 'English',
            Language::KEY_COLUMN_NAME => 'en',
            Language::IS_RTL_COLUMN_NAME => '0',
            Language::IS_DEFAULT_COLUMN_NAME => '1',
            Language::IMAGE_COLUMN_NAME => 'en_image'
        ]);
        $this->info('EN language created');    

        #create rolles and permissions
        Artisan::call('update:permissions');
        $this->info('permissions and roles created');

        #create admin of website
        $user = User::create([
            User::FIRST_NAME_COLUMN_NAME => 'Admin',
            User::LAST_NAME_COLUMN_NAME => 'root',
            'email' => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
        ]);
     
        #assign role admin
        $user->assignRole(UpdatepermissionsEnum::ADMIN_ROLE);
        #give permission admin to admin user
        $user->givePermissionTo(UpdatepermissionsEnum::get_Admin_permission());

        $this->info('admin created');

        $this->info('project setup done');
    }
}
