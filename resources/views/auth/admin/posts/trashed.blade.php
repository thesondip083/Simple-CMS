@extends('layouts.app')




@section('content')


<table class="table table-hover">		
   <thead class="thead-dark">
   	<th>Image</th>
   	<th>Title</th>
   	<th>Restore</th>
   	<th>Destroy</th>
   	<!--permanent delete-->
   </thead>
   <tbody>
   	@if($trashes->count()>0)
    @foreach($trashes as $trash)

       <tr class="table-warning">

       	<td>
       	<img src="{{$trash->featured}}" alt="{{$trash->title}}" width="50px" height="30px">
       	</td>

        <td>{{$trash->title}}</td>
        <td>
        	<a href="{{route('post.restore',['id'=>$trash->id])}}" class="btn btn-xs btn-success">Restore</a>
        </td>
        <td>
        	<a href="{{route('post.kill',['id'=>$trash->id])}}" class="btn btn-xs btn-danger">Delete</a>
        </td>


       </tr>
    @endforeach


    @else
        
                   <tr>
                    <th colspan="5" class="table-warning text-center">No trash!!</th>
                   </tr>
        
    @endif
   </tbody>
</table>







@stop