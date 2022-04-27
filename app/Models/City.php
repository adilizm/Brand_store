<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $gouarded= ['id'];

    protected $connection="mysql";

    public const TABLE = 'users';

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const IS_ACTIVE_COLUMN_NAME = 'is_active';

    public function getTablename(){
        return self::TABLE;
    }
    public function getIsactive(){
        return $this->getattribute(self::IS_ACTIVE_COLUMN_NAME);
    }
    
    public function getKey(){
        return $this->getattribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
}

