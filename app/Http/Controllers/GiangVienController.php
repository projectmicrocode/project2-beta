<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiangVien;
use App\User;
use App\Http\Requests;
use DateTime;
use Illuminate\Support\Facades\DB;

class GiangVienController extends Controller
{
    public function getDanhSachGVjson(){
    	return GiangVien::orderBy('id','DESC')->get();
    }
    public function postThemGiangVien(Request $request){
    	$giangvien = new GiangVien;
    	$giangvien->hoten = $request->name;
    	$giangvien->email = $request->txtEmail;
    	$giangvien->password = $request->txtPass;
    	$giangvien->chucvu = $request->sltCate;
    	$giangvien->phone = $request->txtPhone;
    	
    	$giangvien->created_at = new DateTime();
    	$giangvien->save();

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->txtEmail;
    	$user->password = bcrypt($request->password);
    	if($request->sltCate =="Giảng viên hướng dẫn"){
    	$user->id_doituong = 3;
    	}else{
    	$user->id_doituong = 2;
    	}
        $user->tinhtrang = 0;
        $user->phancong = 0;
    	$user->created_at =  new DateTime();
    	$user->save();
    }
     public function getDelete($id){
        $gv = GiangVien::findOrFail($id);
        $gv->delete();
        
        return "Xóa Thành Công";
    }
}
