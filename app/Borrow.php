<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }



}
