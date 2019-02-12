<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()  //a profile belongs to a user
    {
    	return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'avatar', 'about','youtube','facebook','user_id'
    ];

    //must be added before passing data into DataBase

}
