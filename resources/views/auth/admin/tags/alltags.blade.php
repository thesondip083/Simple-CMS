@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="text-center text-info">
		<div class="panel-head">
		  <h3>All TAGS<h3>
	    </div>
	</div>
	
	<div class="panel-body">
		<table class="table table-hover">
				<thead class="thead-dark">
					<th>Tag name</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>

				<tbody>
					@foreach($all_tags as $at)
					<tr >
						<td>
							 {{$at->tag_name}}
						</td>
						<td>
							<a href="{{route('tag.edit',['id'=>$at->id])}}" class="btn btn-xs btn-success">Edit</a>
						</td>
						<td>
							<a href="{{route('tag.delete',['id'=>$at->id])}}" class="btn btn-xs btn-danger">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
        </table>
   
	</div>
</div>

    
  
@stop