@if(count($errors)>0)
     
     <ul class="list-group">
         @foreach($errors->all() as $error)
           <li class="list-group-item text-danger">
               {{ $error }}
           </li>
         @endforeach
     </ul>
   @endif


   <!--
    MethodNotAllowedHttpException means route is not defined properly....check get /post 
   ->


<!--    419
Sorry, your session has expired. Please refresh and try again.

 GO HOME

check the CSRF token in the form -->


<!-- admin profile which is seeded by php artisan db:seed cannot be updated..i dont know why -->