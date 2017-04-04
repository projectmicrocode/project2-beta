<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKiCongTyRequest;
use App\CongTy;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class DangKiCongTyController extends Controller
{
    public function postDangCongTy(DangKiCongTyRequest $request){
    	$congty = new CongTy;
    	$congty->tencongty = $request->name;
    	$congty->email = $request->email;
    	$congty->password = $request->password;
    	$congty->phone = $request->txtPhone;
    	$congty->diachi = $request->txtDiaChi;
    	
    	$congty->created_at =  new DateTime();
    	$congty->save();

    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->id_doituong = 4;
        $user->tinhtrang = 0;
        $user->phancong = 0;
    	$user->created_at =  new DateTime();
    	$user->save();
    	return redirect()->back()->with('status', 'Đăng Kí Thành Công!');
    }
}
