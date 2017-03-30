<!-- phancongsinhvien.blade.php -->

@extends('layouts.master')

@section('content')
<div class="col-lg-9">
		<ul class="nav nav-tabs">
  			<li role="presentation" ><a href="{!!url('chitietdetai')!!}">Đăng Kí Đề Tài</a></li>

  			<li role="presentation"><a href="{!!url('chitiethddn')!!}">Đăng Kí Hướng Dẫn Doanh Nghệp</a></li>
  			<li role="presentation"><a href="{!!url('chitietsinhviendacbiet')!!}">Đăng Kí Sinh Viên Trực Tiếp</a></li>
  			<li role="presentation"  class="active"><a href="{!!url('getPhanCongSinhVien')!!}">Phân Công</a></li>
		</ul>

		
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
