<?php

namespace App\Models;

use App\Events\LanguagecreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Language extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public const TABLE = 'languages';
    protected $connection="mysql";

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const NAME_COLUMN_NAME = 'name';
    const KEY_COLUMN_NAME = 'key';
    const IS_RTL_COLUMN_NAME = 'is_RTL';
    const IS_DEFAULT_COLUMN_NAME = 'is_default';
    const NUMBER_USERS_COLUMN_NAME = 'number_users';
    const IMAGE_COLUMN_NAME = 'image';
    const CREATED_AT_COLUMN_NAME = 'created_at';
    const UPDATED_AT_COLUMN_NAME = 'updated_at';
    const DELETED_AT_COLUMN_NAME = 'deleted_at';

    public function getId()
    {
        return  $this->getAttribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getName()
    {
        return  $this->getAttribute(self::NAME_COLUMN_NAME);
    }
    public function getKey()
    {
        return  $this->getAttribute(self::KEY_COLUMN_NAME);
    }
    public function getRtl()
    {
        return  $this->getAttribute(self::IS_RTL_COLUMN_NAME);
    }
    public function getImage()
    {
        return  $this->getAttribute(self::IMAGE_COLUMN_NAME);
    }
    public function getIsdefault()
    {
        return  $this->getAttribute(self::IS_DEFAULT_COLUMN_NAME);
    }
    public function getNumberUsers()
    {
        return  $this->getAttribute(self::NUMBER_USERS_COLUMN_NAME);
    }
    public function getcreatedat(){
        return $this->getattribute( self::CREATED_AT_COLUMN_NAME);
    }
    public function getupdatedat(){
        return $this->getattribute( self::UPDATED_AT_COLUMN_NAME);
    }
    public function getDeleteddAt()
    {
        return  $this->getAttribute(self::DELETED_AT_COLUMN_NAME);
    }

}
