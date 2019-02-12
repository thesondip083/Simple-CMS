<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    	//one tag belongs to many posts
    }
}


//one post belongs to many tags...and one tag can belongs to many posts
//so there is a many to many relationship..As post and tag table are different so we need a pivot table to track both of them..

//php artisan make:migration create_posts_tags_table

//read more about relationship here.. https://laravel.com/docs/5.7/eloquent-relationships