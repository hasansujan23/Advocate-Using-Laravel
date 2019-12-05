<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function index(Request $request){
    	$result=DB::table('t_users')
    					->where('email',$request->email)
    					->where('password',$request->password)
    					->get();

    	$row=$result->count();

    	if($row){
    		$email="";
    		foreach ($result as $data) {
    			$email=$data->email;
    		}

    		$request->session()->put('authenticateUser', $email);
            return redirect()->route( 'home' );
    	}
    	else{
    		return redirect()->route( 'index' )->with( [ 'res' => 3 ] );
    	}
    }
}
