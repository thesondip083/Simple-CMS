<?php

namespace App\Http\Controllers;
use App\Post;
use App\category;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin.posts.allposts')->with('allposts',Post::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if there is no category and users wants to create a new post
        //he cant do it cause each post must have a category

        $category_data=category::all();
        $tag_data=Tag::all();

        if($category_data->count()== 0 || $tag_data->count()==0 ){
          Session::flash('info','You Must have a Category and Tag At first');

          if($category_data->count()== 0){
          return redirect()->route('category.create');
          }

          if($tag_data->count()==0){
             return redirect()->route('tag.create');
          }

        }
       


        return view('auth.admin.posts.create')->with('categories',category::all())->with('tags',Tag::all());

        //as we want to show all the categories and the tags also in the creatr form
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request->all());

       $this->validate($request,[
         'title'=>'required|max:255',
         'content'=>'required',
         'featured'=>'required|image',
         'category_id'=>'required',//.....aita dile error ase
         'tags'=>'required'
         ]);

       // {{$request->category_id}}


       $feature=$request->featured;//taking the image here
       $feature_newname=time().$feature->getClientOriginalName();
       //giving the image a unique name by adding time() function
       $feature->move('uploads/posts',$feature_newname);
       //in the uploads/posts folder the image will be moved
       
     
     //this is the fastest way to insert data in DB
     //this create method is also used in RegisterController in app.http.auth
     $post=Post::create([
      'title'=>$request->title,
      'category_id'=>$request->category_id,
      'content'=>$request->content,
     'featured'=>'uploads/posts/'.$feature_newname,
     'slug'=> str_slug($request->title),
      ]);

      //check out Post.php 
     //when using the create method we must specify the fields in relevant model

      $post->tags()->attach($request->tags);

      //$post->the post we just created 
      //associate it with tags() relationship which is defined in Post.php
      //attach the requested datas with it
      //IMPORTANT: Must give the name of the table as singular of the relationship
      //for example for posts and tags relationship we create post_tag table and also in alphabetic order...awesome!

      //remember the error:SQLSTATE[42S02]: Base table or view not found: 1146 Table 'blog.post_tag' doesn't exist (SQL: insert into `post_tag` (`post_id`, `tag_id`) values (6, 1))"

      //so when creating the pivot table we must ensure the names properly


     
     Session::flash('msg','Successful Post Creation');
     return redirect()->route('post.index');

        //dd($request->all());
/*
        $data= new Post();
        $data->title=$request->title;
        $data->content=$request->content;
        $data->featured=$request->featured;
        $data->category_id=$request->category_id;
        $data->save();
        return redirect()->back();*/
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Post::find($id);
        return view('auth.admin.posts.edit')->with('edit_data',$data)
                                            ->with('categories',category::all())
                                            ->with('tags',Tag::all());

        //we need the categories also to show it in the edit form
    }








    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
         'title'=>'required|max:255',
         'content'=>'required',
         //'featured'=>'required|image',  //users may not want to update image
         'category_id'=>'required'
         ]);
     //   dd($request->all());

      if($request->hasFile('featured'))
      {//if the user upload a new image then we get the featured field to update image
      $feature_name=$request->featured;
      $new_feature_name=time().$feature_name->getClientOriginalName();
      $feature_name->move('/uploads/posts',$new_feature_name);
      $posts->featured='uploads/posts/'.$new_feature_name;
      }

      $posts=Post::find($id);



      
      $posts->title=$request->title;
      $posts->category_id=$request->category_id;
      $posts->content=$request->content;
      //$posts->featured='uploads/posts/'.$new_feature_name;
      //$new_feature_name variable is not defined here
      $posts->slug= str_slug($request->title);
      $posts->save();

      $posts->tags()->sync($request->tags);
      //sync will delete all the related tags and then call the attach method
      //tags() is the relationship name with post

      Session::flash('msg','Post successfully updated');
      return redirect()->route('post.index');

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Post::find($id);
        $data->delete();
        Session::flash('del_msg','Post successfully throw in trash');
        return redirect()->route('post.index');
    }





    public function show_trashed_posts()
    {
        $trased_posts=Post::onlyTrashed()->get();
        //onlyTrashed is a build in method returns the trashed datas only
        return view('auth.admin.posts.trashed')->with('trashes',$trased_posts);
    }





    public function kill($id)
    {//permanent delete
       $data=Post::withTrashed()->where('id',$id)->first();
       //in place of first we can use get() which returns a collection
       $data->forceDelete();
       Session::flash('del_msg','post deleted permanently');
       return redirect()->back();
    }






   public function restore($id)
   {//restoring trashed data again
      $data=Post::withTrashed()->where('id',$id)->first();
      $data->restore();
      Session::flash('msg','Post Restored Successfully');
      return redirect()->route('post.index');
   }

}
