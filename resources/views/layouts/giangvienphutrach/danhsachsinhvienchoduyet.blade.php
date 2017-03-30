<!-- danhsachsinhvienchoduyet.blade.php -->

@extends('layouts.master')

@section('content')



<div class="col-lg-8">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>

  			<li role="presentation"  class="active"><a href="{{url('danhsachsinhvienchoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation"><a href="{{url('danhsachsinhviendacbietchoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			
		</ul>

		<div class="content-list" >
			<table class="table table-bordered">
				<tr class="danger">
					<td class="active">Họ và Tên</td>
					<td class="active">Email</td>
					
					
					<td class="active" style="width: 80px;">Duyệt</td>
					
				</tr>
				@foreach($data as $val)
				@if($val->id_doituong==1)
				@if($val->tinhtrang==0)
				<tr class="success">
					<td class="">{{$val->name}}</td>
					<td class="">{{$val->email}}</td>
					
					<td >
						<form action="duyetsinhvien/{{$val->id}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button style="width: 60px" class="btn btn-primary" href="#" id="btnDuyet">Duyệt</button>
						</form>
					</td>
					
				</tr>
				@endif	
				@endif	
				@endforeach

			</table>

			
		</div>
		

   		
	</div>
<div class="col-lg-4">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh sách sinh viên đã được duyệt</h3>
  			</div>
  			<div class="panel-body">
				@foreach($data as $val)
				@if($val->id_doituong==1)
				@if($val->tinhtrang==1)
						<ul class ="list-group">
							<li class ="list-group-item"><span>Họ Tên: </span>{{$val->name}}</li>
							
							
						
						</ul>
						

				@endif	
				@endif	
				@endforeach
				
				
				
        		
  			</div>
     
        
        
           
		</div>
</div>
@endsection
