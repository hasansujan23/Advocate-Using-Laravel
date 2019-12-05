<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegistrationController extends Controller
{
    public function index(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|unique:t_users,email',
            'name' => 'required',
            'password' => 'required|min:6',
            'registration_number' => 'required',
        ]);

    	$result=DB::table('t_users')->insert(
    		["email"=>"$request->email","name"=>"$request->name","password"=>"$request->password","registration_number"=>"$request->registration_number"]
    	);

    	$res=0;

    	if($result){
    		$res=1;
    	}
    	else{
    		$res=2;
    	}

    	return view('signup')->with('res',$res);
    }
}
