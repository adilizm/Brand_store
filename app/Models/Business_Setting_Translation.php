<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_Setting_Translation extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public const TABLE = 'business__setting__translations';
    protected $connection="mysql";

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const LANG_COLUMN_NAME = 'lang';
    const BUSINESS_SETTING_ID_COLUMN_NAME = 'business_settings_id';
    const VALUE_COLUMN_NAME = 'value';
    const CREATED_AT_COLUMN_NAME = 'created_at';
    const UPDATED_AT_COLUMN_NAME = 'updated_at';

    public function getId()
    {
        return  $this->getAttribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getLang()
    {
        return  $this->getAttribute(self::LANG_COLUMN_NAME);
    }
    public function getBusinessSettingId()
    {
        return  $this->getAttribute(self::BUSINESS_SETTING_ID_COLUMN_NAME);
    }
    public function getValue()
    {
        return  $this->getAttribute(self::VALUE_COLUMN_NAME);
    }
    public function getCreatedAt()
    {
        return  $this->getAttribute(self::CREATED_AT_COLUMN_NAME);
    }
    public function getUpdatedAt()
    {
        return  $this->getAttribute(self::UPDATED_AT_COLUMN_NAME);
    }

    public function Business_Setting(){
        return $this->hasOne(Business_setting::class);
    }
}
