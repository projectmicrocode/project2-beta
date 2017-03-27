<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiDeTaiRequest;
use Illuminate\Support\Facades\Auth;
use App\DeTai;
use App\User;
use DateTime;
use Illuminate\Support\Facades\DB;

class DeTaiController extends Controller
{
    public function postThemDeTai(DangKiDeTaiRequest $request){

    	$id = Auth::id();      
    	$detai = new DeTai;
    	$detai->tendetai = $request->txtName;
    	$detai->soluong = $request->numSV;
    	$detai->ngonngu = $request->txtKiNang;
    	$detai->noidungcv = $request->txtNoiDung;
    	$detai->tienganh = $request->txtTiengAnh;
    	$detai->tinhtrang = 0;
    	$detai->id_user = $id;
    	$detai->created_at =  new DateTime();
    	$detai->save();
        return redirect()->route('getChiTietDeTai');
    	
        
    }
    public function getChiTietDeTai(){
        $id = Auth::id(); 
        $data = DB::table('detai')
                ->join('users','users.id','=','detai.id_user')
                ->where('detai.id_user','=',$id)
                ->select('detai.*','users.name')
                ->paginate(2);
               
        return view('layouts/congty/dangkidetai',['data'=>$data]);
    }
}