@extends('layouts.app')
@include('auth.admin.includes.errors')
@section('content')
   <div class="panel panle-default">
   	<div class="panle-body">
   		<table class="table table-hover">
    	<thead>
    		<th>Image</th>
    		<th>Name</th>
    		<th>Permission</th>
    		<th>Delete</th>
    	</thead>
    	<tbody>
        @if($users->count()>0)
    		  @foreach($users as $user)
                  <tr>
                  	
                  	<td> <img src="{{asset($user->profile->avatar)}}" alt="{{$user->title}}" width="50px" height="50px"></td>
                    
                  	

                  	<!--to get the images we use acessors...goto Post.php
                      here asset method is creating the url for the image
                      https://laravel.com/docs/5.7/helpers

                      user er sathe profile related tai user->profile kaj korbe 
                      and profile theke avatar image ta fetch korbe 
                  	-->
                  	<td>{{$user->name}}</td>
                  	<td>
                      @if($user->admin)
                         <a href="{{route('user.not_admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove admin</a>
                      @else
                         <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make Admin</a>
                      @endif
                  	</td>
                  	<td>
                      @if($user->id !== Auth::id())<!--user nijei nijeke delete korte parbe na  Auth::id is the shortcut method for finding the currently autheticated user-->
                  		<a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Delete</a>
                      @endif
                  	</td>
                  </tr>
    		   @endforeach

         @else
        
                   <tr>
                    <th colspan="5" class="table-success text-center">No User Yet!</th>
                   </tr>
        
        @endif
    	</tbody>
    </table>
   	</div>
   </div>
    
@stop


