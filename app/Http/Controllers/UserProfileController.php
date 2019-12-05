<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;

class UserProfileController extends Controller
{
    public function getProfile(Request $request){
    	$userMail=$request->session()->get('authenticateUser');
        $oData="";
        if(session('data')){
            $oData=session('data');
        }
    	$result=DB::table('t_users')->where('email',$userMail)->get();
    	$associates=DB::table('t_associates')->where('advocate_email',$userMail)->get();

    	return view('user.profile',compact(['result','associates','oData']));

    	//return view('user.profile')->with('result',$result);
    }

    public function getUpdate(Request $request){
    	$name=$request->fullName;
    	$registration=$request->userRegistration;
    	$email=$request->userMail;
    	$phone=$request->userPhone;
    	$address=$request->userAddress;
    	$oldProPic=$request->userOldProfilePicture;

    	if($request->hasFile('profilePicture')){
    		$image=$request->file('profilePicture');
    		$img=$name.time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/profile-picture/' .$img);

    		Image::make($image)->resize(200,200)->save($location);

    		$result=DB::table('t_users')->where('email',$email)
    				->update(["name"=>"$name","registration_number"=>"$registration","address"=>"$address","phone"=>"$phone","profile_picture"=>"$img"]);

    		if(file_exists(public_path('images/profile-picture/'.$oldProPic))){
		      unlink(public_path('images/profile-picture/'.$oldProPic));
		    }
    	}

    	else{
    		$result=DB::table('t_users')->where('email',$email)
    				->update(["name"=>"$name","registration_number"=>"$registration","address"=>"$address","phone"=>"$phone"]);
    	}

        $oData="Update profile successfully";

    	return redirect()->route('userprofile')->with(['data'=>$oData]);
    }

    public function addAssociates(Request $request){
    	$advocateMail=$request->session()->get('authenticateUser');

    	$name=$request->aName;
    	$registration=$request->aRegistration;
    	$email=$request->aMail;
    	$phone=$request->aPhone;
    	$address=$request->aAddress;

    	if($request->hasFile('aProfilePicture')){
    		$image=$request->file('aProfilePicture');
    		$img=$name.time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/associates/' .$img);

    		Image::make($image)->save($location);

    		$result=DB::table('t_associates')
    				->insert(["registration_number"=>"$registration","name"=>"$name","email"=>"$email","phone"=>"$phone","address"=>"$address","profile_picture"=>"$img","advocate_email"=>"$advocateMail"]);
    	}

    	else{
    		$result=DB::table('t_associates')
    				->insert(["registration_number"=>"$registration","name"=>"$name","email"=>"$email","phone"=>"$phone","address"=>"$address","advocate_email"=>"$advocateMail"]);
    	}


        $oData="Add associate successfully";
        return redirect()->route('userprofile')->with(['data'=>$oData]);

    }

    public function updateAssociate(Request $request){
    	if($request->session()->has('authenticateUser')){

    		$regId=$request->input('reg_id');

    		$result=DB::table('t_associates')->where('registration_number',$regId)->get();

    		return view('user.update-associate')->with('result',$result);
    	}
    	return redirect()->route('index');
    }

    public function getUpdateAssociate(Request $request){
    	$name=$request->aName;
    	$registration=$request->aRegistration;
    	$email=$request->aMail;
    	$phone=$request->aPhone;
    	$address=$request->aAddress;

    	if($request->hasFile('aProfilePicture')){
    		$image=$request->file('aProfilePicture');
    		$img=$name.time().'.'.$image->getClientOriginalExtension();
    		$location=public_path('images/associates/' .$img);

    		Image::make($image)->save($location);

    		$result=DB::table('t_associates')->where('registration_number',$registration)
    				->update(["name"=>"$name","email"=>"$email","phone"=>"$phone","address"=>"$address","profile_picture"=>"$img"]);
    	}

    	else{
    		$result=DB::table('t_associates')->where('registration_number',$registration)
    				->update(["name"=>"$name","email"=>"$email","phone"=>"$phone","address"=>"$address"]);
    	}

    	$oData="Update associate successfully";

        return redirect()->route('userprofile')->with(['data'=>$oData]);
    }

    public function getDeleteAssociates(Request $request){
    	$regId=$request->input('reg_id');
    	$pId=$request->input('p_id');
    	$result=DB::table('t_associates')->where('registration_number',$regId)->delete();

    	if(file_exists(public_path('images/associates/'.$pId))){
	      unlink(public_path('images/associates/'.$pId));
	    }

    	$oData="Delete associate successfully";
        return redirect()->route('userprofile')->with(['data'=>$oData]);
    }
}
