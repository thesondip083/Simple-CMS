<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.users.profile')->with('user',Auth::user());
    }
    //Auth::user() means the current logged authenticated user

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

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
    public function update(Request $request)
    {
        //first we validate the data
       $this->validate($request,[
          'username'=>'required',
          'mail'=>'required|email',
          //'password'=>'required',
          'youtube'=>'required|url',
          'facebook'=>'required|url'
       ]); 

       $user=Auth::user();




      // $user = User::find(Auth::user()->id);

       if($request->hasFile('avatar'))
       {
         $img=$request->avatar;
         $new_img=time().$img->getClientOriginalName();
         $img->move('uploads/avatars',$new_img);
         $user->profile->avatar='uploads/avatars/'.$new_img;

         $user->profile->save();

         //$user->profile()->save()......profile() not worked

       }

       $user->name=$request->username;
       $user->email=$request->mail;

       if($request->has('password'))
       {
          $user->password=bcrypt($request->password);
          $user->save();
       }

       $user->profile->youtube=$request->youtube;
       $user->profile->facebook=$request->facebook;
       $user->profile->about=$request->about;

       $user->save();
       $user->profile->save();
       
       Session::flash('info','Successfully Updated Profile');
       if(!$user->admin){
         return redirect()->route('home');
       }
       return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
