<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_setting extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public const TABLE = 'business_settings';
    protected $connection="mysql";

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const HAS_TRANSLATION_COLUMN_NAME = 'has_translation';
    const KEY_COLUMN_NAME = 'key';
    const VALUE_COLUMN_NAME = 'value';
    const CREATED_AT_COLUMN_NAME = 'created_at';
    const UPDATED_AT_COLUMN_NAME = 'updated_at';

    public function getId()
    {
        return  $this->getAttribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getValue()
    {
        return  $this->getAttribute(self::VALUE_COLUMN_NAME);
    }
    public function getHasTranslation()
    {
        return  $this->getAttribute(self::HAS_TRANSLATION_COLUMN_NAME);
    }
    public function getKey()
    {
        return  $this->getAttribute(self::KEY_COLUMN_NAME);
    }
    public function getCreatedAt()
    {
        return  $this->getAttribute(self::CREATED_AT_COLUMN_NAME);
    }
    public function getUpdatedAt()
    {
        return  $this->getAttribute(self::UPDATED_AT_COLUMN_NAME);
    }

    public function Business_Setting_Translations(){
        return $this->hasMany(Business_Setting_Translation::class,'business_settings_id','id');
    }
}
