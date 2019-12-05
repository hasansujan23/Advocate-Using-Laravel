<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeController extends Controller
{
    public function home(Request $request){
    	//return view('user.index');
    	if($request->session()->has('authenticateUser')){
    		$userMail=$request->session()->get('authenticateUser');
	    	$result=DB::table('t_users')->where('email',$userMail)->get();
	    	$associates=DB::table('t_associates')->where('advocate_email',$userMail)->get();

    		return view('user.index',compact(['result','associates']));
    	}
    	return redirect()->route('index');
    }
}
