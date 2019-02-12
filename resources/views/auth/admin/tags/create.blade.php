@extends('layouts.app')

@section('content')

	<form action="{{route('tag.store')}}" method="post">
		{{csrf_field()}}
 	<div class="form-group">
 		<label for="tagname">Tag Name</label>
 		<input type="text" id="tagname" name="tag" placeholder="Enter tag here" class="form-control">
 	</div>

 	<div class="form-group">
 		<div class="text-center">
 			<button type="submit" class="btn btn-success">Submit</button>
 		</div>
 		
 	</div>
    </form>

</div>
 
@stop