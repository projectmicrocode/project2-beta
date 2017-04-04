<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DeadLine;
use DateTime;
use App\User;

class GiangVienPhuTrachController extends Controller
{
    public function postdatdeadline(Request $request){
    	
    	

    	$deadline = new DeadLine;
    	$deadline->thoigian = $request->txtdeadline;
    	$deadline->id_user = 7;
        $deadline->loai = 1;
    	$deadline->created_at = new DateTime();
    	$deadline->save();
    	
    	return redirect()->route('getChiTietDeTaiChoDuyet')->with('status', 'Đặt Thành Công!');
    
    }

    public function postchitietsvdaduyet($id){

        $data = DB::table('users')->where('id',$id)->where('tinhtrang',1)->select("*")->get();
        // return $data;
        return view('layouts/chitietsinhviendaduyet',['data'=>$data]);
    }
}
