<!-- phancongsinhvien.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation" ><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation"><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghệp</a></li>
  			<li role="presentation"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"  class="active"><a href="{!!url('danhsachsinhvienphancong')!!}">Phân Công</a></li>
		</ul>

<table class="table table-bordered" style="padding-top:20px">
        <tr class="danger">
          <td class="active">Họ và Tên</td>
          <td class="active">Email</td>
          
          
          <td class="active" style="width: 100px;">Xuất CV</td>
          
        </tr>
        @foreach($data as $val)
        @if($val->id_doituong==1)
        @if($val->tinhtrang==1)
        <tr class="success">
          <td class="">{{$val->name}}</td>
          <td class="">{{$val->email}}</td>
          
          <td >
            <form action="xuatcv/{{$val->id}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button style="width: 80px" class="btn btn-primary" href="#" id="btnDuyet">Xuất CV</button>
            </form>
          </td>
          
        </tr>
        @endif  
        @endif  
        @endforeach

      </table>
		
	</div>
<div class="col-lg-3">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Trạng Thái</h3>
  			</div>
  			<div class="panel-body">
    		Panel content
  			</div>
		</div>
</div>
@endsection
