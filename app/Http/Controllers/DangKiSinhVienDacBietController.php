<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeTai;
use App\SinhVienDacBiet;
use App\Http\Requests\DangKiSinhVienDacBietRequest;
use DateTime;
use App\SinhVien;

class DangKiSinhVienDacBietController extends Controller
{
	public function getDanhSachDeTaiDacBiet(){
		$data = DeTai::select('tendetai')->where('tinhtrang',1)->get();
		// return $data;
    	return view('layouts/congty/dangkisinhvientructiep',['data'=>$data]);
	}
	public function postDangKiSVTrucTiep(DangKiSinhVienDacBietRequest $request){
		$sinhvien = SinhVien::select('hoten','mssv')->get();
		$count=0;
        foreach ($sinhvien as  $val) {
        	# code...
        	if(($val['hoten'] == $request->txtName) && ($val['mssv'] == $request->txtMssv)){
        	$count++;
        }
        }
         if($count == 1){
            // return redirect()->route('addSinhVienDacBiet');
           $svdb = new SinhVienDacBiet;
			$svdb->hoten = $request->txtName;
			$svdb->mssv = $request->txtMssv;
			$svdb->detai = $request->sltDeTai;
			$svdb->tinhtrang = 0;
			$svdb->created_at = new DateTime();
            $svdb->save();
            	
            return redirect()->route('getChiTietSVDacBiet');

        }
        else{
        	return redirect()->back();
        }


		
}
	public function getChiTietSVDacBiet(){
		$datadetai = DeTai::select('tendetai')->where('tinhtrang',1)->get();
		$datasv = SinhVienDacBiet::select('hoten','mssv','detai')->get();

		
		// return $data;
		return view('layouts/congty/dangkisinhvientructiep',['datasv'=>$datasv,'datadetai'=>$datadetai]);

    }
}
