<?php

namespace App;

use App\Rol;
use App\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }


    // acc and mut
    public function getPasswordAttribute($value){
        return $value;
    }

    // acc and mut
    public function setPasswordAttribute($value){
        return $this->attributes['password'] = Hash::make($value);
    }

    // relacion polimorfica
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'Taggable');
    }

}
