<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $appends = array('_links');

    public function getLinksAttribute()
    {
        return [
            'self' => \URL::to('/cars/'.$this->id),
            'user' => \URL::to('/users/'.$this->fk_user),
            'delete' => \URL::to('/cars/'.$this->id."/delete")
        ];
    }
}
