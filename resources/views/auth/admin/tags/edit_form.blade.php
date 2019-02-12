@extends('layouts.app')

@include('auth.admin.includes.errors')


@section('content')

<form action="{{route('tag.update',['id'=>$edit_data->id])}}" method="post">
	
	{{csrf_field()}}
	<div class="form-group">
		<label for="tag">Tag Name</label>
		<input type="text"  id="tag" class="form-control" value="{{$edit_data->tag_name}}" name="tag_name">
	</div>

	<div class="form-group">
		<div class="text-center">
	       <button class="button button-success" type="submit">Submit</button>
        </div>
	</div>
</form>

@stop