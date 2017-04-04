<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeTai;
use App\SinhVienDacBiet;
use App\Http\Requests\DangKiSinhVienDacBietRequest;
use DateTime;
use App\SinhVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class DangKiSinhVienDacBietController extends Controller
{
	public function getDanhSachDeTaiDacBiet(){
		$id = Auth::id();
		$data = DeTai::select('tendetai')->where('tinhtrang',1)->where('id_user',$id)->get();
		// return $data;
    	return view('layouts/congty/dangkisinhvientructiep',['data'=>$data]);
	}
	public function postDangKiSVTrucTiep(DangKiSinhVienDacBietRequest $request){
		$sinhvien = User::select('name','email','tinhtrang')->where('id_doituong',1)->where('tinhtrang',0)->get();
		$count=0;
        foreach ($sinhvien as  $val) {
        	# code...
        	if(($val['name'] == $request->txtName) && ($val['email'] == $request->txtEmail) ){
        	$count++;
        }
        }
         if($count == 1){
            // return redirect()->route('addSinhVienDacBiet');
           
            
            $id = Auth::id();
           	$svdb = new SinhVienDacBiet;
			$svdb->hoten = $request->txtName;
			$svdb->email = $request->txtEmail;
			$svdb->detai = $request->sltDeTai;
			$svdb->tinhtrang = 1;
			$svdb->id_user = $id;
			$svdb->created_at = new DateTime();
            $svdb->save();
            DB::table('users')->where('email',$request->txtEmail)->update(['tinhtrang'=>1]);
            	
            return redirect()->route('getChiTietSVDacBiet')->with('status', 'Thành Công!');

        }
        else{
        	return redirect()->back()->with('status', 'Thêm Thất Bại! Sinh Viên Không Tồn Tại Hoặc Đã Chọn Được Cơ Sở Thực Tập');
        }


		
}
	public function getChiTietSVDacBiet(){
		$id = Auth::id();
		$datadetai = DeTai::select('tendetai')->where('tinhtrang',1)->where('id_user',$id)->get();
		$datasv = DB::table('sinhviendacbiet')->where('id_user',$id)->select('hoten','email','detai')->paginate(2);
		

		
		// return $data;
		return view('layouts/congty/dangkisinhvientructiep',['datasv'=>$datasv,'datadetai'=>$datadetai]);

    }
}
