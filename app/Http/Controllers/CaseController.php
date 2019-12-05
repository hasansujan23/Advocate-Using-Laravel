<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CaseController extends Controller
{
    public function createCase(Request $request)
    {
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

    	$userMail=$request->session()->get('authenticateUser');
    	$caseNo=$request->caseNo;
    	$section=$request->section;
    	$courtNo=$request->courtNo;
    	$category=$request->category;
    	$status=$request->status;

    	$result=DB::table('t_cases')->insert(["case_no"=>"$caseNo","section"=>"$section","court_no"=>"$courtNo","category"=>"$category","status"=>"$status","advocateMail"=>"$userMail"]);

    	if($result){
    		return redirect()->route('update-case')->with(['id'=>$caseNo]);
    	}
    }

    public function updateCase(Request $request){
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

    	$caseNo=$request->session()->get('id');
    	$updateCaseNo="";
    	if($caseNo){
    		$updateCaseNo=$caseNo;
    	}

    	$cNo=$request->input('c_id');
    	if($cNo){
    		$updateCaseNo=$cNo;
    	}

    	$result=DB::table('t_cases')->where('case_no',$updateCaseNo)->get();

    	return view('user.update-case',compact(['result','updateCaseNo']));
    }

    public function getDeleteCase(Request $request){
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

    	$caseNo=$request->input('c_no');

    	$cResult=DB::table('t_cases')->where('case_no',$caseNo)->delete();
    	$pResult=DB::table('t_plaintiff')->where('case_no',$caseNo)->delete();
    	$dResult=DB::table('t_defender')->where('case_no',$caseNo)->delete();
    	$wResult=DB::table('t_witness')->where('case_no',$caseNo)->delete();
    	$oResult=DB::table('t_oponent')->where('case_no',$caseNo)->delete();
    	$aResult=DB::table('t_attendence')->where('case_no',$caseNo)->delete();
    	return redirect()->route('allcase');
    }

    public function getUploadCaseFile(Request $request){
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

        $validatedData = $request->validate([
            'c_caseno' => 'required|unique:t_conclusion,case_no',
            'c_file' => 'required|unique:t_conclusion,url',
        ]);

    	$caseNo=$request->c_caseno;
    	$caseResult=$request->c_result;
    	$fileName = 'Case-'.$caseNo.'.'.request()->c_file->getClientOriginalExtension();
    	//$request->c_file->storeAs('case-files',$fileName);
        $location=public_path('files/final/');
        $request->c_file->move($location,$fileName);

    	$result=DB::table('t_conclusion')->insert([
    		"case_no"=>"$caseNo",
    		"result"=>"$caseResult","url"=>"$fileName"
    	]);

    	$userMail=$request->session()->get('authenticateUser');
    	$result2=DB::table('t_cases')->where('case_no',$caseNo)->get();

    	foreach ($result2 as $row) {
    		$result3=DB::table('t_archive')->insert([
    			"case_no"=>"$caseNo",
    			"section"=>"$row->section",
    			"court_no"=>"$row->court_no",
    			"category"=>"$row->category",
    			"url"=>"$fileName",
    			"advocateMail"=>"$userMail"
    		]);
    	}

    	return redirect()->route('allcase');
    }

    public function getAllCase(Request $request){
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }

    	if($request->session()->has('authenticateUser')){
    		$userMail=$request->session()->get('authenticateUser');
    		$result=DB::table('t_cases')->where('advocateMail',$userMail)->paginate(15);

    		return view('user.allcase',compact(['result']));
    	}
    	return redirect()->route('index');
    }

    public function getDeleteCaseFile(Request $request){
        if(!$request->session()->has('authenticateUser')){
            return redirect()->route('index');
        }
        
        $caseNo=$request->input('c_no');
        $fileName=$request->input('f_name');

        $deleteConclusion=DB::table('t_conclusion')->where('case_no',$caseNo)->delete();
        $deleteArchive=DB::table('t_archive')->where('case_no',$caseNo)->delete();

        if(file_exists(storage_path('app/public/case-files/'.$fileName))){
            unlink(storage_path('app/public/case-files/'.$fileName));
        }

        return redirect()->route('archive');
    }

}
