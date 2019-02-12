<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingController extends Controller
{

	public function __construct()
	{
		$this->middleware('admin');
	}
    public function index()
    {
    	return view('auth.admin.Settings.setting')->with('data',Setting::first());
    }

    public function update()
    {
    	$this->validate(request(),[
            'sitename'=>'required',
            'address'=>'required',
            'contactmail'=>'required',
            'contactnumber'=>'required'
    	]);
    	$data=Setting::first();
    	$data->site_name=request()->sitename;
    	$data->address=request()->address;
    	$data->contact_mail=request()->contactmail;
    	$data->contact_number=request()->contactnumber;

    	$data->save();
        Session::flash('info','Successfully Updated');
        return redirect()->back();


    }
}
