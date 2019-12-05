<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function getAssociates(Request $request){
    	$regId=$request->input('reg_id');
    	$result=DB::table('t_associates')->where('registration_number',$regId)->get();
    	return json_encode($result);
    }

    public function getAllPlaintiff(Request $request){
    	$caseNo=$request->input('c_no');
    	$result=DB::table('t_plaintiff')->where('case_no',$caseNo)->get();
    	echo json_encode($result);
    }

    public function getUpdateCase(Request $request){
    	$caseNo=$request->get('case_no');
    	$section=$request->get('section');
    	$courtNo=$request->get('court_no');
    	$category=$request->get('category');
    	$status=$request->get('status');
    	$result=DB::table('t_cases')->where('case_no',$caseNo)->update([
    		"section"=>"$section","court_no"=>"$courtNo","category"=>"$category","status"=>"$status"
    	]);

    	if($result){
    		$success="data update successfully!!";
    		return json_encode($success);
    	}
    }

    public function getAllDefender(Request $request){
    	$caseNo=$request->input('c_no');
    	$result=DB::table('t_defender')->where('case_no',$caseNo)->get();
    	echo json_encode($result);
    }

    public function getAllWitness(Request $request){
    	$caseNo=$request->input('c_no');
    	$result=DB::table('t_witness')->where('case_no',$caseNo)->get();
    	echo json_encode($result);
    }

    public function getAllOponent(Request $request){
    	$caseNo=$request->input('c_no');
    	$result=DB::table('t_oponent')->where('case_no',$caseNo)->get();
    	echo json_encode($result);
    }

    public function getAllDate(Request $request){
    	$caseNo=$request->input('c_no');
    	$result=DB::table('t_attendence')->where('case_no',$caseNo)->get();
    	echo json_encode($result);
    }

    public function deletePlaintiff(Request $request){
    	$pId=$request->input('p_id');
    	$result=DB::table('t_plaintiff')->where('pid',$pId)->delete();
    	$success="data remove successfully!!";

    	return json_encode($success);
    }

    public function deleteDefender(Request $request){
    	$Id=$request->input('id');
    	$result=DB::table('t_defender')->where('did',$Id)->delete();
    	$success="data remove successfully!!";

    	return json_encode($success);
    }

    public function deleteWitness(Request $request){
    	$Id=$request->input('id');
    	$result=DB::table('t_witness')->where('wid',$Id)->delete();
    	$success="data remove successfully!!";

    	return json_encode($success);
    }

    public function deleteOponent(Request $request){
    	$Id=$request->input('id');
    	$result=DB::table('t_oponent')->where('oid',$Id)->delete();
    	$success="data remove successfully!!";

    	return json_encode($success);
    }

    public function deleteDate(Request $request){
    	$Id=$request->input('id');
    	$result=DB::table('t_attendence')->where('id',$Id)->delete();
    	$success="data remove successfully!!";

    	return json_encode($success);
    }

    public function addPlaintiff(Request $request){
    	$caseNo=$request->get('p_caseno');
    	$name=$request->get('p_name');
    	$address=$request->get('p_address');
    	$contact=$request->get('p_contact');
    	$comment=$request->get('p_comment');

    	$result=DB::table('t_plaintiff')->insert(["case_no"=>"$caseNo","name"=>"$name","address"=>"$address","contact"=>"$contact","comment"=>"$comment"]);

    	$success="data insert successfully!!";

    	return json_encode($success);
    }

    public function addDefender(Request $request){
    	$caseNo=$request->get('d_caseno');
    	$name=$request->get('d_name');
    	$address=$request->get('d_address');
    	$contact=$request->get('d_contact');
    	$comment=$request->get('d_comment');

    	$result=DB::table('t_defender')->insert(["case_no"=>"$caseNo","name"=>"$name","address"=>"$address","contact"=>"$contact","comment"=>"$comment"]);

    	$success="data insert successfully!!";

    	return json_encode($success);
    }

    public function addWitness(Request $request){
    	$caseNo=$request->get('w_caseno');
    	$name=$request->get('w_name');
    	$address=$request->get('w_address');
    	$contact=$request->get('w_contact');
    	$status=$request->get('w_status');
    	$comment=$request->get('w_comment');

    	$result=DB::table('t_witness')->insert(["case_no"=>"$caseNo","name"=>"$name","address"=>"$address","contact"=>"$contact","type"=>"$status","comment"=>"$comment"]);

    	$success="data insert successfully!!";

    	return json_encode($success);
    }


    public function addOpponent(Request $request){
    	$caseNo=$request->get('o_caseno');
    	$name=$request->get('o_name');
    	$regNo=$request->get('o_registration');
    	$contact=$request->get('o_contact');

    	$result=DB::table('t_oponent')->insert(["case_no"=>"$caseNo","name"=>"$name","registration_number"=>"$regNo","contact"=>"$contact"]);

    	$success="data insert successfully!!";

    	return json_encode($success);
    }

    public function addDate(Request $request){
    	$caseNo=$request->get('a_caseno');
    	$aDate=$request->get('a_day');
    	$comment=$request->get('a_comment');

    	$result=DB::table('t_attendence')->insert(["case_no"=>"$caseNo","date"=>"$aDate","comment"=>"$comment"]);

    	$success="data insert successfully!!";

    	return json_encode($success);
    }
}
