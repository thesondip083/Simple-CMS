<?php

namespace App\Http\Middleware;

use Closure;
use Auth;//added by me as we want to access the autheticated users only
use Session;
class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //autheticated user accessing method Auth::user()

        if(!Auth::user()->admin) 
        {
        Session::flash('info','You dont have the Permission to access this');
        return redirect()->back();
        }
         return $next($request);
    }
}
//admin middleware going to check if the user is autheticated admin or not.If not then its going to flash the session else it will perform task normally