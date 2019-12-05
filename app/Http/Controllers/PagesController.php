<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function index(){
    	return view('signup');
    }



    public function profile(Request $request){
    	if($request->session()->has('authenticateUser')){
    		//return view('user.profile');
    		return redirect()->route('userprofile');
    	}
    	return redirect()->route('index');
    }

    public function addcase(Request $request){
    	//return view('user.addcase');
    	if($request->session()->has('authenticateUser')){
    		return view('user.addcase');
    	}
    	return redirect()->route('index');

    }

    // public function allcase(Request $request){
    // 	//return view('user.allcase');
    	
    // }

    public function archive(Request $request){
    	//return view('user.archive');
    	if($request->session()->has('authenticateUser')){
            $userMail=$request->session()->get('authenticateUser');
            $result=DB::table('t_archive')->where('advocateMail',$userMail)->get();
    		return view('user.archive',compact(['result']));
    	}
    	return redirect()->route('index');
    }

    public function nextAtd(Request $request){
    	//return view('user.nextAtd');
    	if($request->session()->has('authenticateUser')){
    		return view('user.nextAtd');
    	}
    	return redirect()->route('index');
    }

    public function noc(Request $request){
    	//return view('user.noc');
    	if($request->session()->has('authenticateUser')){
    		return view('user.noc');
    	}
    	return redirect()->route('index');
    }

    public function other(Request $request){
    	//return view('user.other');
    	if($request->session()->has('authenticateUser')){
    		return view('user.other');
    	}
    	return redirect()->route('index');
    }

    public function penitation(Request $request){
    	//return view('user.penitation');
    	if($request->session()->has('authenticateUser')){
    		return view('user.penitation');
    	}
    	return redirect()->route('index');
    }

    public function userCaseDetails(Request $request){

        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

        $caseNo=$request->input('c_no');
        $tmpCaseNo=$request->case_no;
        if($tmpCaseNo!=""){
            $caseNo=$tmpCaseNo;
        }
        $case=DB::table('t_cases')->where('case_no',$caseNo)->get();
        $plaintiff=DB::table('t_plaintiff')->where('case_no',$caseNo)->get();
        $defender=DB::table('t_defender')->where('case_no',$caseNo)->get();
        $witness=DB::table('t_witness')->where('case_no',$caseNo)->get();
        $oponent=DB::table('t_oponent')->where('case_no',$caseNo)->get();
        $dates=DB::table('t_attendence')->where('case_no',$caseNo)->get();
        return view('user.details',compact(['caseNo','case','plaintiff','defender','witness','oponent','dates']));
    }

}
