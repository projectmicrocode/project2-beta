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
    			<h3 class="panel-title">Thông Tin Chi Tiết Đề Tài</h3>
  			</div>
  			<div class="panel-body">
    		
    		
    		@foreach($data as $val)

				
				<ul class="list-group">
					<li class="list-group-item"><span>Tên Đề Tài: </span><b>{{$val->tendetai}}</b></li>
					<li class="list-group-item"><span>Số Lượng Sinh Viên Nhận: </span><b>{{$val->soluong}}</b></li>
					<li class="list-group-item"><span>Yêu Cầu Ngôn Ngữ: </span><b>{{$val->ngonngu}}</b></li>
					<li class="list-group-item"><span>Nội Dung Công Việc: </span><b>{{$val->noidungcv}}</b></li>
					<li class="list-group-item"><span>Yêu Cầu Ngoại Ngữ: </span><b>{{$val->tienganh}}</b></li>
					<li class="list-group-item"><span>Tên Công Ty Đăng Kí: </span><b>{{$val->name}}</b></li>
				</ul>
			@endforeach
  			</div>
		</div>
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