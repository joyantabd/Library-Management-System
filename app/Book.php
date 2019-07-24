<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function location()
    {
        return $this->hasMany('App\Location');
    }
    public function borrow()
    {
        return $this->hasMany('App\Borrow');
    }
}
