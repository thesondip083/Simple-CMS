@extends('layouts.app');



@section('content')

   @include('auth.admin.includes.errors')


		<form action="{{route('category.update',['id'=>$data->id])}}" method="post">

                {{csrf_field()}}

			<div class="form-group">
				<label for="updatedname">Update Name</label>
				<input type="text" class="form-control" name="updatedname" id="updatedname" value="{{$data->name}}">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Submit</button>
				
				</div>
				
			</div>
		</form>
@stop