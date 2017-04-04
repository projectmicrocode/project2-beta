<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeTai;
use App\SinhVienDacBiet;
use DateTime;
use App\SinhVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SinhVienDacBietController extends Controller
{
    public function getdanhsachsinhviendacbietchoduyet(){
    	$id = Auth::id();

		$data = DB::table('sinhviendacbiet')
		->join('users','users.id','=','sinhviendacbiet.id_user')
		// ->where('id_user',16)
		->select('sinhviendacbiet.*','users.name')->paginate(2);
		$datacd = DB::table('sinhviendacbiet')
		->join('users','users.id','=','sinhviendacbiet.id_user')
		// ->where('id_user',16)
		->select('sinhviendacbiet.*','users.name')->paginate(5);
		// ->get();
		

		

		
		// return $data;
		
    	return view('layouts/giangvienphutrach/danhsachsinhviendacbietchoduyet',['data'=>$data,'datacd'=>$datacd]);
    }
    public function postduyetsinhviendacbiet($id){
    	 DB::table('sinhviendacbiet')->where('id',$id)->update(['tinhtrang'=>1]);
    	return redirect()->route('getdanhsachsinhviendacbietchoduyet');
    }
}
