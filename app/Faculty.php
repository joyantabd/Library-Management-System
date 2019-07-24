<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function borrow()
    {
        return $this->hasMany('App\Borrow');
    }
}
