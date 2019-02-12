<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts() 
    //one cat-many post so write posts--- we can give any name
    {
        return $this->hasMany('App\Post');
    }
}
