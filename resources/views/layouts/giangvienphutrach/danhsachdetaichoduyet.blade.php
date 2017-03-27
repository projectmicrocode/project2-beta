<!-- danhsachdetaichoduyet.blade.php -->


@extends('layouts.master')

@section('content')



<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active"><a href="{{url('chitietdetaichoduyet')}}">Danh sách đề tàichờ duyệt</a></li>

  			<li role="presentation" "><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên chờ duyệt</a></li>
  			<li role="presentation"><a href="{{url('chitietdetaichoduyet')}}">Danh sách sinh viên đặc biệt</a></li>
  			<li role="presentation"><a href="">Phân Công</a></li>
		</ul>

		<div class="content-list" >
		@foreach ($data as $retrieve)
        @if($retrieve->tinhtrang == 0)
      
            <ul>
			<li>
				<h4>
					<span>Tên Đề Tài: </span><b><a href="#" id="btnChiTietDeTai">{{$retrieve->tendetai}}</a></b>
					

				</h4>
			</li>
			<li>
			<span>Số Sinh Viên Nhận: </span>{{$retrieve->soluong}}
		
			</li><br>
			<li>
			<span>Công Ty: </span>{{$retrieve->name}}
		
			</li><br>
			<li><span>Thời Gian Tạo: </span>{{$retrieve->created_at}}
			</li>
			<br>
			<div class="col-md-1">
				<form action="duyetDeTai/<?php echo $retrieve->id?>" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-primary" href="#" id="btnDuyet">Duyệt</button>

            </form>
			</div>
			
            <div class="col-md-1">
            	 <form action="chitietdetaichoduyet/<?php echo $retrieve->id?>" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button name="btnChiTietDeTai" class="btn btn-primary"> Chi Tiết</button>
					
			</form>
            </div>
           
			</ul>
			<br>
			<br>

          
        @endif
        @endforeach

			
		</div>
		

   		
	</div>
<div class="col-lg-3">
		<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h3 class="panel-title">Danh sách đề tài đã được duyệt</h3>
  			</div>
  			<div class="panel-body">
				
				@foreach ($data as $retrieve)
       			 @if($retrieve->tinhtrang == 1)
       			 <ul class="list-group">
				<li class="list-group-item"><span></span>{{$retrieve->tendetai}}</li>
				<li class="list-group-item"><span></span>{{$retrieve->name}}</li>
				</ul>
				@endif
        		@endforeach
			
				
				
        		
  			</div>
     
        
        
           
		</div>
</div>



@endsection

