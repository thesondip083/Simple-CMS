@extends('layouts.app')

@include('auth.admin.includes.errors')

@section('content')
    <div class="panel panel-default">
    	<div class="panel-head">
    		<div class="text-center">
    			Update Profile
    		</div>
    	</div>
    	<div class="panel-body">
    		<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">

    			{{csrf_field()}}
    			
    			<div class="form-group">
    				<label for="name">Name</label>
    				<input type="text" id="name" name="username" value="{{$user->name}}" class="form-control">
    			</div>


    			<div class="form-group">
    				<label for="email">Email</label>
    				<input type="mail" id="mail" name="mail" value="{{$user->email}}" class="form-control">
    			</div>

    			<div class="form-group">
    				<label for="pass">New Password</label>
    				<input type="password" id="pass" name="password" class="form-control">
    			</div>

    			<div class="form-group">
    				<label for="image">Update Avatar</label>
    				<input type="file" id="image" name="avatar" class="form-control">
    			</div>

    			<div class="form-group">
    				<label for="youtube">Youtube link</label>
    				<input type="text" id="youtube" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
    			</div>
    			<!-- user table dont have the youtube links but profiles table have the column and the relationship between user and profile in User.php is profile so we write user->profile->youtube  -->

    			<div class="form-group">
    				<label for="fb">Facebook link</label>
    				<input type="text" id="fb" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
    			</div>

    			<div class="form-group">
    				<label for="you">About You</label>
    				<textarea name="about" id="you" cols="20" rows="5" class="form-control" >{{$user->profile->about}}</textarea>
    			</div>


    			<div class="form-group">
    				<div class="text-center">
    					<button class="btn btn-xs btn-success" type="submit">Update</button>
    				</div>
    			</div>
    			
    		</form>
    	</div>
    </div>
@stop