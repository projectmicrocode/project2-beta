<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\User;
use App\Http\Requests;
use DateTime;
use Illuminate\Support\Facades\DB;

class SinhVienController extends Controller
{
    public function getDanhSachSVjson(){
    	return SinhVien::orderBy('id','DESC')->get();
    }
    public function postThemSinhVien(Request $request){

    	$sinhvien = new SinhVien;
    	$sinhvien->hoten = $request->name;
    	$sinhvien->mssv = $request->txtMssv;
    	$sinhvien->email = $request->txtMssv."@student.hust.edu.vn";
    	$sinhvien->lop = $request->sltCate;
    	$sinhvien->created_at = new DateTime();
    	$sinhvien->save();

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->txtMssv."@student.hust.edu.vn";
    	$user->password = bcrypt($request->password);
    	$user->id_doituong = 1;
    	$user->created_at =  new DateTime();
    	$user->save();
    }
     public function getEditSV($id){
        return SinhVien::findOrFail($id);
    }
    public function postEditSV(){
       
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien = new SinhVien;
        $sinhvien->hoten = $request->name;
        $sinhvien->mssv = $request->txtMssv;
        $sinhvien->email = $request->txtMssv."@student.hust.edu.vn";
        $sinhvien->lop = $request->sltCate;
        $sinhvien->updated_at = new DateTime();
        $sinhvien->save();
        return "Sửa Thành Công";

        // DB::table('sinhvien')
        // 	->where('id',$id)
        // 	->update([
        // 			['hoten'=>$request->name]
        // 			// ['updated_ad'=>new DateTime()]
        // 		]);

        return "data";
    }
     public function getDelete($id){
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->delete();

        
        
        return "Xóa Thành Công";
    }
}
