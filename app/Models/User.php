<?php

namespace App\Models;

use App\Events\UserCreatedEvent;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guarded = ['id'];

    protected $connection = "mysql";

    public const TABLE = 'users';

    const PRIMARY_KEY_COLUMN_NAME = 'id';
    const FIRST_NAME_COLUMN_NAME = 'firstname';
    const LAST_NAME_COLUMN_NAME = 'lastname';
    const PROFILE_COLUMN_NAME = 'profile_image';
    const EMAIL_COLUMN_NAME = 'email';
    const EMAIL_VERIFIED_AT_COLUMN_NAME = 'email_verified_at';
    const PASSWORD_COLUMN_NAME = 'password';
    const LANG_COLUMN_NAME = 'lang';
    const PHONE_COLUMN_NAME = 'phone';
    const IS_ACTIVE_COLUMN_NAME = 'is_active';
    const LAST_LOGIN_COLUMN_NAME = 'last_login';
    const CITY_ID_COLUMN_NAME = 'city_id';
    const CREATED_AT_COLUMN_NAME = 'created_at';
    const UPDATED_AT_COLUMN_NAME = 'updated_at';

    protected $dispatchesEvents = [
        'created' => UserCreatedEvent::class,
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('avatar')
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('avatar40')
                    ->width(40)
                    ->height(40);
            });
    }

    public function getTablename()
    {
        return self::TABLE;
    }
    public function getKey()
    {
        return $this->getattribute(self::PRIMARY_KEY_COLUMN_NAME);
    }
    public function getFullname()
    {
        return $this->getattribute(self::FIRST_NAME_COLUMN_NAME) . ' ' . $this->getattribute(self::LAST_NAME_COLUMN_NAME);
    }
    public function getFirstname()
    {
        return $this->getattribute(self::FIRST_NAME_COLUMN_NAME);
    }
    public function getLastname()
    {
        return $this->getattribute(self::LAST_NAME_COLUMN_NAME);
    }
    public function getEmail()
    {
        return $this->getattribute(self::EMAIL_COLUMN_NAME);
    }
    public function getImage()
    {
        return $this->getattribute(self::PROFILE_COLUMN_NAME);
    }
    public function getEmailverifiedat()
    {
        return $this->getattribute(self::EMAIL_VERIFIED_AT_COLUMN_NAME);
    }
    public function getPassword()
    {
        return $this->getattribute(self::PASSWORD_COLUMN_NAME);
    }
    public function getLang()
    {
        return $this->getattribute(self::LANG_COLUMN_NAME);
    }
    public function getPhone()
    {
        return $this->getattribute(self::PHONE_COLUMN_NAME);
    }
    public function getIsactive()
    {
        return $this->getattribute(self::IS_ACTIVE_COLUMN_NAME);
    }
    public function getLastlogin()
    {
       return Carbon::parse($this->getattribute(self::LAST_LOGIN_COLUMN_NAME))->format('d-M-Y h:m') ;
    }
    public function getCItyid()
    {
        return $this->getattribute(self::CITY_ID_COLUMN_NAME);
    }
    public function getCreatedat()
    {
        return $this->getattribute(self::CREATED_AT_COLUMN_NAME);
    }
    public function getUpdatedat()
    {
        return $this->getattribute(self::UPDATED_AT_COLUMN_NAME);
    }
    public function avatar_100(){
        return $this->getFirstMediaUrl('avatar','avatar');
    }
    public function avatar_40(){
        return $this->getFirstMediaUrl('avatar','avatar40');
    }
}
