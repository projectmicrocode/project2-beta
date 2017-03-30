<!-- danhsachsinhviendangthuctap.blade.php -->
@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"  class="active"><a href="{{url('danhsachsinhviendangthuctap')}}">Danh Sách Sinh Viên Đang Thực tập</a></li>
  			<li role="presentation"><a href="{{url('danhsachsinhviendangthuctap')}}">Danh Sách Hướng Dẫn Doanh Nghiệp</a></li>
  			


  			
  			
		</ul>
		<br>
		@include('layouts.error.error')
		<br>

		<div class="content-list" >
		<table class="table table-bordered">
			<tr class="danger">
					<td class="active">Họ và Tên</td>
					<td class="active">Email</td>
					
					
					<td class="active" style="width: 100px;">Xuất Báo Cáo</td>
					<td class="active" style="width: 100px;">Xuất Báo Cáo</td>
					
				</tr>
			@foreach($data as $val)
				<tr class="success">
					<td class="">{{$val->name}}</td>
					<td class="">{{$val->email}}</td>
					
					<td >
						<form action="xuatcuoiki/{{$val->id}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button style="width: 100px" class="btn btn-primary" href="#" >Cuối Kì</button>
						</form>
					</td>
					<td >
						<form action="xuatgiuaki/{{$val->id}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button style="width: 100px" class="btn btn-primary" href="#" >Giữa Kì</button>
						</form>
					</td>
					
				</tr>
			@endforeach
		</table>
			
			
		</div>
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin Đề Cương</h3>
  			</div>
  			<div class="panel-body">
				
  			</div>
		</div>
</div>
@endsection
