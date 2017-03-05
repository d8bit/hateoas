<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = array('_links');

    public function cars()
    {
        return $this->hasMany('\App\Models\Car', 'fk_user');
    }

    public function getLinksAttribute()
    {
        return [
            'self' => \URL::to('/users/'.$this->id),
            'cars' => \URL::to('/users/'.$this->id.'/cars')
        ];
    }

}
