<!-- phancongsinhvien.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation" ><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation"><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghệp</a></li>
  			<li role="presentation"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"  class="active"><a href="{!!url('danhsachsinhvienphancong')!!}">Phân Công</a></li>
		</ul>

<br>
<br>
<table class="table table-bordered" style="padding-top:20px">
        <tr class="danger">
          <td class="active">Họ và Tên</td>
          <td class="active">Email</td>
          
          <td class="active" style="width: 150px;">Chọn HDDN</td>
          <td class="active" style="width: 100px;">Xuất CV</td>
          
        </tr>
        @foreach($data as $val)
        @if($val->id_doituong==1)
        @if($val->tinhtrang==1)
        <tr class="success">
          <td class="">{{$val->name}}</td>
          <td class="">{{$val->email}}</td>
          <td class="">
          
          
          @if($val->phancong == 1)
            @foreach($dataphancong as $val1)
                @if($val->id==$val1->id_user_sv)
                    {{$val1->hotenhddn}}
                @endif
            @endforeach
           
            
          @else
          <form method="POST" action="chonhddn/{{$val->id}}">
          <input type ="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-2">
                    <select name="sltHddn" class="form-control" >
                    
                    <option value="0">--- Hướng dẫn doanh nghiệp ---</option>
                    @foreach($datahddn as $value)
                    <option value="{{$value->hoten}}">{{$value->hoten}}</option>
                    @endforeach
                    
                    </select>
                    </div> 
          <input class="btn btn-success"  type="submit" name="submit" value="Phân Công">
          </form>
          @endif
            
            
           
            
          </td>
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
		  @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh Sách Sinh Viên Đã Được Phân Công</h3>
  			</div>
  			<div class="panel-body">
    		@foreach($data as $val)
          @if($val->phancong == 1)
                <ul class="list-group">
                  <li style="text-align: center" class="list-group-item"><span></span>{{$val->name}}</li>
                
                </ul>
          @endif
        @endforeach
  			</div>
		</div>
</div>
@endsection
