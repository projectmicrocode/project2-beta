@extends('layouts.master')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="css/myWeb.css"> -->
<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>

  			<li role="presentation" "><a href="{{url('danhsachsinhvienchoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation"><a href="{{url('danhsachsinhviendacbietchoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			<!-- <li role="presentation"><a href="">Phân Công</a></li> -->
		</ul>

	<!-- </div>
<div class="col-lg-9"> -->
	<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin Chi Tiết Sinh Viên Đã Được Duyệt</h3>
  			</div>
  			<div class="panel-body">
				@foreach($data as $val)
					@if($val->phancong == 1)
						<ul>
							<li><span>Tên Sinh Viên </span>{{$val->name}}</li>
							<li><span>Email: </span>{{$val->email}}</li>
							<li><span>Tình trạng: </span>Đã Được phân Công</li>  
						</ul>
					@else
						<ul>
							<li><span>Tên Sinh Viên </span>{{$val->name}}</li>
							<li><span>Email: </span>{{$val->email}}</li>
							<li><span>Tình trạng: </span>Chưa Được Phân Công</li>  
						</ul>
					@endif
				@endforeach


    		
    		
    		
  			</div>
		</div>
</div>


@endsection