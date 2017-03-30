<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiHDDNRequest;
use App\HuongDanDoanhNghiep;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Http\Requests\NopDeCuongRequest;
use App\DeCuong;


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
        $user->tinhtrang = 0;
    	$user->created_at =  new DateTime();
    	$user->save();

    	return redirect()->route('getChitiethddn')->with('status', 'Thêm Thành Công!');
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
    public function getchitietdecuong(){
        $id = Auth::id();
        $data =  DB::table('decuong')
                ->join('users','users.id','=','decuong.id_user')
                ->where('users.id',$id)
                ->select('decuong.*','users.name')
                ->get();

        return view('layouts/huongdandoanhnghiep/nopdecuongchitiet',['data'=>$data]);
    }
    public function postnopdecuong(NopDeCuongRequest $request){
        $id = Auth::id();
        $name =$request->file('chondecuong')->getClientOriginalName();
        $request->file('chondecuong')->move('../storage/decuong',$name);
        $decuong = new DeCuong;
        $decuong->tendecuong = $name;
        $decuong->id_user = $id;
        $decuong->created_at =  new DateTime();
        $decuong->save();
        return redirect()->route('getchitietdecuong');
    }
}
