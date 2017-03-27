<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiHDDNRequest;
use App\HuongDanDoanhNghiep;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;


class HDDNController extends Controller
{
    public function postDangKiHddn(DangKiHDDNRequest $request){
    	$id = Auth::id();      
    	$hddn = new HuongDanDoanhNghiep;
    	$hddn->hoten = $request->txtName;
    	$hddn->email = $request->txtEmail;
    	$hddn->password = $request->txtPass;
    	$hddn->phone = $request->txtPhone;
    	$hddn->id_user = $id;
    	$hddn->created_at =  new DateTime();
    	$hddn->save();

    	$user = new User;
    	$user->name = $request->txtName;
    	$user->email = $request->txtEmail;
    	$user->password = $request->txtPass;
    	$user->id_doituong = 5;
    	$user->created_at =  new DateTime();
    	$user->save();

    	return redirect()->route('getChitiethddn');
    }
    public function getChitiethddn(){
    	$id = Auth::id(); 
        $data = DB::table('huongdandoanhnghiep')
                ->join('users','users.id','=','huongdandoanhnghiep.id_user')
                ->where('huongdandoanhnghiep.id_user','=',$id)
                ->select('huongdandoanhnghiep.*','users.name')
                ->paginate(2);
        // return $data; 
        return view('layouts/congty/dangkihuongdanhdoanhnghiep',['data'=>$data]);
    }
}
