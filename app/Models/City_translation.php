<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_translation extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    protected $connection="mysql";

    public const TABLE = 'city_translations';

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const CITY_ID_KEY_COLUMN_NAME = 'city_id';
    const NAME_KEY_COLUMN_NAME = 'name';
    const LANG_KEY_COLUMN_NAME = 'lang';

    public function getTablename(){
        return self::TABLE;
    }
    
    public function getKey(){
        return $this->getattribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getCityid(){
        return $this->getattribute(self::CITY_ID_KEY_COLUMN_NAME);
    }

    public function getName(){
        return $this->getattribute(self::PRIMARY_KEY_COLUMN_NAME);
    }

    public function getLang(){
        return $this->getattribute(self::LANG_KEY_COLUMN_NAME);
    }
}
