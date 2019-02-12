@extends('layouts.app')

@section('content')


   @include('auth.admin.includes.errors')
    


    <div class="panel panel-default">
    	
    	<div class="panel-heading">
    		Edit Post Here
    	</div>


    	<div class="panel-body">
    	 <form action="{{route('post.update',['id'=>$edit_data->id])}}" method="post" enctype="multipart/form-data">

    			{{ csrf_field() }}

    			<div class="form-group">
    				<label for="title">Title</label>
    				<input type="text" name="title" class="form-control" value="{{$edit_data->title}}">
    			</div>

                

                <div class="form-group">
                    <label for="cat_id">Choose a Category</label>
                    <select name="category_id" id="cat_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                               @if ($edit_data->category->id== $category->id)
                                   selected
                               @endif
                                >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- post -category
                one post has only one category  for this we dont need the loop-->

                 
                 <!--Showing the tags-->
                 <div class="form-group">
                     <label for="tags">Choose Tags</label>
                       @foreach($tags as $tag)
                             <div class="checkbox">
                                 <label>
                                    <input type="checkbox" value="{{$tag->id}}" name="tags[]"  
                                    @foreach($edit_data->tags as $t)
                                    

                                       @if($tag->id == $t->id)
                                              checked
                                       @endif

                                    @endforeach
                                    >

                                    {{$tag->tag_name}}
                                </label>
                             </div>
                       @endforeach 
                 </div>
<!--post-tag relationsship.edit_data came from post and one post have many tags
                                    -->
<!-- in the second foreach loop we are taking the edit_data which knows the tags associated with the edit id then we check the tags id with the edit forms check ids...if they are matched it means that they were checked before.so we put checked option there

 $data=Post::find($id);  //from PostController
        return view('auth.admin.posts.edit')->with('edit_data',$data)
                                            ->with('categories',category::all())
                                            ->with('tags',Tag::all());

-->




    			<div class="form-group">
    				<label for="featured">Featured image</label>
    				<input type="file" name="featured" class="form-control">
    			</div>




                <div class="form-group">
                	<label for="content">Text</label>
                    <textarea name="content" id="content" cols="10" rows="5" class="form-control"> {{$edit_data->content}}</textarea>
                </div>




                <div class="form-group">
                	
                   <div class="text-center">
                   	<button class="btn btn-success" type="submit">Update</button>
                   </div>


                </div>
    		</form>
    	</div>
    </div>

@stop

@section('styles')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop
   
@section('scripts')
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
  <script>
      $(document).ready(function() {
      $('#content').summernote();
    });
  </script>
   
@stop