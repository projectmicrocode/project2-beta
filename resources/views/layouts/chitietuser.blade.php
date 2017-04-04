@extends('layouts.master')
@section('content')
<div class="col-lg-9">
		

	<!-- </div>
<div class="col-lg-9"> -->
	<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Thông Tin Người Dùng</h3>
  			</div>
  			<div class="panel-body">
    		<ul>
          <li><span>Tên Người Dùng: </span>{{$data->name}}</li>
          <li><span>Email: </span>{{$data->email}}</li>  
        </ul>
    		
    		

  			</div>
		</div>
</div>


@endsection