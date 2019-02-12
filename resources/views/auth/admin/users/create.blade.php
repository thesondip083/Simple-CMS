@extends('layouts.app')
@include('auth.admin.includes.errors')

@section('content')
   

   <!--@include('auth.admin.includes.bootstrap')-->
 

 <div class="panel panel-default">

    <div class="panel-head">
        <div class="text-center">
            <b>Add new User</b>
        </div>
        
    </div>
     <div class="panel-body">
            <form action="{{route('user.store')}}" method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="mail" id="email" name="email" class="form-control">
                </div>
                

                <div class="form-group">
                    
                   <div class="text-center">
                    <button class="btn btn-success" type="submit">Store</button>
                   </div>


                </div>
            </form>
        </div>
 </div>

@stop


