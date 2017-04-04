<!-- danhsachsinhviendacbietchoduyet.blade.php -->
<!-- danhsachsinhvienchoduyet.blade.php -->

@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>

  			<li role="presentation" ><a href="{{url('danhsachsinhvienchoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation" class="active"><a href="{{url('danhsachsinhviendacbietchoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			
		</ul>
		<br>
		<br>

		<div class="content-list" >
			<table class="table table-bordered">
				<tr class="danger">
					<td class="active">Họ và Tên</td>
					<td class="active">Email</td>
					<td class="active">Đề tài</td>
					<td class="active">Công ty</td>
					
				</tr>
				@foreach($datacd as $val)
					
					<tr class="success">
					<td class="">{{$val->hoten}}</td>
					<td class="">{{$val->email}}</td>
					<td class="">{{$val->detai}}</td>
					<td class="">{{$val->name}}</td>
					
				</tr>
					
				@endforeach
			</table>
			<div class="modal-footer">{{$datacd ->render()}}</div>
		</div>
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh sách sinh viên đã được duyệt</h3>
  			</div>
  			<div class="panel-body">
				@foreach($data as $val)
				@if($val->tinhtrang==1)
					<ul class ="list-group">
						<li class ="list-group-item"><span>Họ Tên: </span>{{$val->hoten}}</li>
						<li class ="list-group-item"><span>Đề Tài: </span>{{$val->detai}}</li>
						<li class ="list-group-item"><span>Công Ty: </span>{{$val->name}}</li>

					</ul>
					
  					
  					@endif	
				@endforeach
  				
 
		</div>
		<div class="modal-footer">{{$data ->render()}}</div>
</div>
@endsection
