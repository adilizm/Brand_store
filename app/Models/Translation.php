<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    
    public const TABLE = 'translations';

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const LANG_COLUMN_NAME = 'lang';
    const KEY_COLUMN_NAME = 'key';
    const VALUE_COLUMN_NAME = 'value';
    const CREATED_AT_COLUMN_NAME = 'created_at';
    const UPDATED_AT_COLUMN_NAME = 'updated_at';
    
    public function getTableName(){
        return self::TABLE;
    }
    public function getid(){
        return $this->getattribute( self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getlang(){
        return $this->getattribute( self::LANG_COLUMN_NAME);
    }
    public function getkey(){
        return $this->getattribute( self::KEY_COLUMN_NAME);
    }
    public function getvalue(){
        return $this->getattribute( self::VALUE_COLUMN_NAME);
    }
    public function getcreatedat(){
        return $this->getattribute( self::CREATED_AT_COLUMN_NAME);
    }
    public function getupdatedat(){
        return $this->getattribute( self::UPDATED_AT_COLUMN_NAME);
    }
}
