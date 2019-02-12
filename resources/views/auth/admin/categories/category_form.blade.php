@extends('layouts.app')

@section('content')
    <form action="{{route('category.store')}}"  method="post">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="name"><b>Category_name</b></label>
    		<input type="text" id="name" name="cat_name" class="form-control" placeholder="Enter your category name here">
    	</div>

    	<div class="form-group">
    		<div class="text-center">
    			<button class="btn btn-success" type="submit">Submit</button>
    		</div>
    		
    	</div>
    </form> 
@stop