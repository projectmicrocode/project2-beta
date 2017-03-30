<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DeadLine;
use DateTime;

class GiangVienPhuTrachController extends Controller
{
    public function postdatdeadline(Request $request){
    	
    	$data = DB::table('users')->where('name',$request->sltCongTy)->select('id')->get();
    	// $datadl = DB::table('deadline')->select
    	foreach ($data as $value) {
    		 $id = $value->id;
    	}

    	$deadline = new DeadLine;
    	$deadline->thoigian = $request->txtdeadline;
    	$deadline->id_user = $id;
    	$deadline->created_at = new DateTime();
    	$deadline->save();
    	
    	return "Thêm Thành Công!";
    
    }
}
