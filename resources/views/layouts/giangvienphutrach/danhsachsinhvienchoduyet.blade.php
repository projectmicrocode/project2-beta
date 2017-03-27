<!-- danhsachsinhvienchoduyet.blade.php -->

@extends('layouts.master')

@section('content')



<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>

  			<li role="presentation" class="active"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Phân Công</a></li>
		</ul>

		<div class="content-list" >
		
		</div>
		

   		
	</div>
<div class="col-lg-3">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh sách đề tài đã được duyệt</h3>
  			</div>
  			<div class="panel-body">
				
				
				
				
        		
  			</div>
     
        
        
           
		</div>
</div>
@endsection
