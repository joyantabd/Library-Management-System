<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
