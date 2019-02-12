@extends('layouts.app')

@include('auth.admin.includes.errors')

@section('content')
 <panel class="panel panel-default">
 	
 	<panel class="head">
 		<div class="text-center">
 			<b>Settings</b>
 		</div>
 	</panel>
 	<panel class="body">
 		<form action="{{route('setting.update')}}" method="post">

                     {{csrf_field()}}

 			<div class="form-group">
 				<label for="sn">Site Name</label>
 				<input type="text" id="sn" name='sitename' class="form-control" value="{{$data->site_name}}">
 			</div>

 			<div class="form-group">
 				<label for="ad">Address</label>
 				<input type="text" id="ad" name='address' class="form-control" value="{{$data->address}}">
 			</div>

 			<div class="form-group">
 				<label for="cm">Contact Mail</label>
 				<input type="text" id="cm" name='contactmail' class="form-control" value="{{$data->contact_mail}}">
 			</div>

 			<div class="form-group">
 				<label for="cn">Contact Number</label>
 				<input type="text" id="cn" name='contactnumber' class="form-control" value="{{$data->contact_number}}">
 			</div>

 			<div class="form-group">
 				<div class="text-center">
 					<button class="btn btn-xs btn-success">Update</button>
 				</div>
 				
 			</div>

 		</form>
 	</panel>
 </panel>
@stop