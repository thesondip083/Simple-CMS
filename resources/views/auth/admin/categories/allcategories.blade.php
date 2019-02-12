@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	
  <div class="panel-body">
		<table class="table table-hover">
	
			<thead>
				<th>
					Category_name
				</th>
				<th>
					Update
				</th>
				<th>
					Delete
				</th>
			</thead>

			<tbody>
				
				@if($all_category->count()>0)
				
		    	@foreach($all_category as $ac)
		        <!--all info off category table in $ac..we just need the name field-->
		        <tr>

		           <td>
		        	{{$ac->name}}
		           </td>

		           <td>
		           	   <a href="{{route('category.edit',['id'=>$ac->id])}}" class="btn btn-xs btn-info">
		           	   	Update
                        <span class="glyphicon glyphicon-pencil"></span>
		           	   </a>
		           </td>

                    
		           	<td>
		           		<a href="{{route('category.delete',['id'=>$ac->id])}}" class="btn btn-xs btn-danger">
		           			Delete
		           			 <span class="glyphicon glyphicon-trash"></span>
		           		</a>
		           	</td>
                    
	            </tr>
	            
	            @endforeach
				
				@else
				
                   <tr>
                   	<th colspan="5" class="table-success text-center">There is no Category Yet!</th>
                   </tr>
				
				@endif
          </tbody>
       </table>
  </div>
</div>



@stop