<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        return view('auth.admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password')
        ]);
       //after creating a user he/she have a profile
        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'/uploads/avatars/default.png'
        ]);
      
      Session::flash('msg','OMG!! Successfully Created a User!');
      return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->profile->delete(); //as user is related with profile..so at first we delete the profile and then the user cause if we delete user before deleting the profile the profile could not be found 
        $user->delete();
        Session::flash('info','the user is Successfully deleted');
        return redirect()->route('user.index');

    }


    public function make_admin($id)
    {
       $user=User::find($id);
       $user->admin=1;
       $user->save();
       Session::flash('info','An Admin is Just Created!');
       return redirect()->route('user.index');
    }

    public function remove_admin($id)
    {
       $user=User::find($id);
       $user->admin=0;
       $user->save();
       Session::flash('info','Removed from Admin!');
       return redirect()->route('user.index');
    }
}
