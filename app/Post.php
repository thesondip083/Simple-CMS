<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     //use this to use trashing in DB
	 use SoftDeletes;
    //this protected field allow us to insert those datas...without
    //this fillable field a MassAssignmentException is thorwn
	protected $fillable = [
        'title', 'content', 'featured', 'category_id','slug'
    ];


    //accessors are something that changes our database data in the way we wanted before //displaying it...in this case we want a full path link to show the image to users..
    //thats why we use the asset() method to create the link of the images

    public function getFeaturedAttribute($featured)
    {
       return asset($featured);
    }

    
    protected $dates=['deleted_at'];
    //in post table migration we write a field softDeletes() which will make deleted_at field //and here we are defining that the field will hold timestamp ($dates) data.Basically the value is null but when we delete something the field will filled with the current timestamp value.

    public function category()
    {
    	return $this->belongsTo('App\category');
        //every post belongs to one category
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    //
}
