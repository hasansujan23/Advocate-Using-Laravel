<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function deleteSession(Request $request){
    	$request->session()->forget('authenticateUser');
    	return redirect()->route( 'index' );
    }
}
