<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


      //24 one to many relationship

       Route::get('/relation12m',function(){
          return App\category::find(1)->posts;
       });

       //25 many to one post->category
       Route::get('/relationm21',function(){
          return App\Post::find(4)->category;
       });


       //26 find posts by tag
       Route::get('/relationm2m',function(){
          return App\Tag::find(2)->posts;
       });

       //27 find tags by post
       Route::get('/relationm2many',function(){
          return App\Post::find(4)->tags;
       });

    //here posts tags category is the name of the public functions when setting relationship between them

       //28 user-profile one to one
       Route::get('/profile121',function(){
         return App\User::find(1)->profile;
       });

       Route::get('/user121',function(){
         return App\profile::find(1)->user;
       });

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){


	   Route::get('/home',[
        'uses'=>'HomeController@index',
        'as'=>'home'

	   ]);

		Route::get('post/create/',[
	   'uses'=>'PostController@create',
	   'as'=>'post.create'
	    ]);

		Route::post('/post/store',[
		'uses'=>'PostController@store',
		'as'=>'post.store'
	    ]);

	    Route::get('/category/create',[
	    	'uses'=>'CategoriesController@create',
	    	'as'=>'category.create'
	    ]);


         Route::post('/category/store',[
	    	'uses'=>'CategoriesController@store',
	    	'as'=>'category.store'
	    ]);  


	    Route::get('/category/index',[
	    	'uses'=>'CategoriesController@index',
	    	'as'=>'category.index'
	    ]);

	    //to edit the category name
        //{id} is not fixed...we can use any name for id but its good to use id 
	    Route::get('/category/edit/{id}',[
             'uses'=>'CategoriesController@edit',
             'as'=>'category.edit'
	    ]);

        //for deleting a specific item

	    Route::get('/category/delete/{id}',[
             'uses'=>'CategoriesController@destroy',
             'as'=>'category.delete'
	    ]);

      //updating starts here
	     Route::post('/category/update/{id}',[ 
	    	'uses'=>'CategoriesController@update',
	    	'as'=>'category.update'
	    ]);  


	  //10->all post showing
	    Route::get('post/index/',[
	   'uses'=>'PostController@index',
	   'as'=>'post.index'
	    ]);

	 //11->delete post
	    route::get('/post/delete/{id}',[
          'uses'=>'PostController@destroy',
          'as'=>'post.delete'
	    ]);

	 //12- show the trashed post

      route::get('/post/trash/',[
          'uses'=>'PostController@show_trashed_posts',
          'as'=>'post.trash'
	    ]);
     //14-permanent delete
       route::get('/post/kill/{id}',[
          'uses'=>'PostController@kill',
          'as'=>'post.kill'
	    ]);
      //15-restoring
       route::get('/post/restore/{id}',[
          'uses'=>'PostController@restore',
          'as'=>'post.restore'
	    ]);

       route::get('/post/edit/{id}',[
       'uses'=>'PostController@edit',
       'as'=>'post.edit'
       ]);

       Route::post('/post/update/{id}',[ 
	    	'uses'=>'PostController@update',
	    	'as'=>'post.update'
	    ]);  



       //18-create tag route
    
       Route::get('/tag/create',[
	    	'uses'=>'TagsController@create',
	    	'as'=>'tag.create'
	    ]);
      
      //19-store tag
         Route::post('/tag/store',[
		'uses'=>'TagsController@store',
		'as'=>'tag.store'
	    ]);


       //20-show tags route

       Route::get('/tag/index',[
	    	'uses'=>'TagsController@index',
	    	'as'=>'tag.index'
	    ]);


       Route::get('/tag/edit/{id}',[
       'uses'=>'TagsController@edit',
       'as'=>'tag.edit'
       ]);



       //22 tag update
       Route::post('/tag/update/{id}',[
       	'uses'=>'TagsController@update',
       	'as'=>'tag.update'
       ]);



       //23 delete tag
       Route::get('/tag/delete/{id}',[
          'uses'=>'TagsController@destroy',
          'as'=>'tag.delete'
	    ]);

      //29 showing all users 
       Route::get('/user/index',[
          'uses'=>'UserController@index',
          'as'=>'user.index'
	    ]);
       //30 add user 
       Route::get('/user/create',[
          'uses'=>'UserController@create',
          'as'=>'user.create'
	    ]);

        Route::post('/user/store',[
		'uses'=>'UserController@store',
		'as'=>'user.store'
	    ]);
       

       //31 make admin/not admin
         Route::get('/user/admin/{id}',[
		'uses'=>'UserController@make_admin',
		'as'=>'user.admin'
	    ]);//->middleware('admin')....can be used for this method only

         Route::get('/user/not_admin/{id}',[
		'uses'=>'UserController@remove_admin',
		'as'=>'user.not_admin'
	    ]);//->middleware('admin');


       //32 edit user profile form

         Route::get('/user/profile',[
         'uses'=>'ProfileController@create',
         'as'=>'user.profile'
         ]);
      
      //33 update user profile
      Route::post('/profile/update',[
         'uses'=>'ProfileController@update',
         'as'=>'profile.update'
         ]);

      //here in update we are not passing the id for updating cause we can access the user as Auth::user() and get the id from there immedietly

   

   //34 user deletion
      Route::get('/user/delete/{id}',[
          'uses'=>'UserController@destroy',
          'as'=>'user.delete'
	    ]);


      Route::get('/setting',[
      'uses'=>'SettingController@index',
      'as'=>'setting'
      ]);

      Route::post('/setting/update',[
         'uses'=>'SettingController@update',
         'as'=>'setting.update'
         ]);

});




