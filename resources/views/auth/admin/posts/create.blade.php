@extends('layouts.app')

@section('content')
   

   <!--@include('auth.admin.includes.bootstrap')-->

   @include('auth.admin.includes.errors')
    


    <div class="panel panel-default">
    	
    	<div class="panel-heading">
    		Create a new post
    	</div>


    	<div class="panel-body">
    		<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

    			{{ csrf_field() }}

    			<div class="form-group">
    				<label for="title">Title</label>
    				<input type="text" name="title" class="form-control">
    			</div>

                

                <div class="form-group">
                    <label for="cat_id">Choose a Category</label>
                    <select name="category_id" id="cat_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach($tags as $tag)
                     <div class="checkbox">
                        <label>
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]">
                            <!--tags[] is an array cause we are sending many tags in cases-->
                            {{$tag->tag_name}}
                        </label>
                    </div>
                    @endforeach
                    
                </div>

    			<div class="form-group">
    				<label for="featured">Featured image</label>
    				<input type="file" name="featured" class="form-control">
    			</div>
                <div class="form-group">
                	<label for="content">Text</label>
                    <textarea name="content" id="content" cols="10" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                	
                   <div class="text-center">
                   	<button class="btn btn-success" type="submit">Store</button>
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



