@extends('layouts.app')
@include('auth.admin.includes.errors')
@section('content')
   <div class="panel panle-default">
   	<div class="panle-body">
   		<table class="table table-hover">
    	<thead>
    		<th>Image</th>
    		<th>Title</th>
    		<th>Edit</th>
    		<th>Delete</th>
    	</thead>
    	<tbody>
        @if($allposts->count()>0)
    		  @foreach($allposts as $ap)
                  <tr>
                  	
                  	<td> <img src="{{$ap->featured}}" alt="{{$ap->title}}" width="50px" height="50px"></td>

                  	

                  	<!--to get the images we use acessors...goto Post.php
                      here asset method is creating the url for the image
                      https://laravel.com/docs/5.7/helpers
                  	-->
                  	<td>{{$ap->title}}</td>
                  	<td>
                  		<a href="{{route('post.edit',['id'=>$ap->id])}}" class="btn btn-xs btn-success">Update</a>
                  	</td>
                  	<td>
                  		<a href="{{route('post.delete',['id'=>$ap->id])}}" class="btn btn-xs btn-danger">Trash</button>
                  	</td>
                  </tr>
    		   @endforeach

         @else
        
                   <tr>
                    <th colspan="5" class="table-success text-center">There is no Post Yet!</th>
                   </tr>
        
        @endif
    	</tbody>
    </table>
   	</div>
   </div>
    
@stop


