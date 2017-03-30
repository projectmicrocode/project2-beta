<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response ;
class GiangVienHuongDanController extends Controller
{
    public function getdanhsachsinhviendangthuctap(){
    	$data = DB::table('users')->where('id_doituong',1)->where('tinhtrang',1)->select('id','name','email')->get();
    	// return $data;
    	return view('layouts/giangvienhuongdan/danhsachsinhviendangthuctap',['data'=>$data]);
    }
    public function postxuatcuoiki($id){

    	$data = DB::table('file')->where('id_user',$id)->where('hinhthuc','Cuối Kì')->select('tenfile')->get();
    	foreach ($data as $value) {
    		$filename= $value->tenfile;
    		$path = storage_path('baocao/'.$filename);
            return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/msword',
            'Content-Disposition' => 'inline; filename="'.$filename.'"']);
    	}
    	return redirect()->back();
    }
     public function postxuatgiuaki($id){

    	$data = DB::table('file')->where('id_user',$id)->where('hinhthuc','Giữa Kì')->select('tenfile')->get();
    	foreach ($data as $value) {
    		$filename= $value->tenfile;
    		$path = storage_path('baocao/'.$filename);
            return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/msword',
            'Content-Disposition' => 'inline; filename="'.$filename.'"']);
    	}
    	return redirect()->back();
    }
}
