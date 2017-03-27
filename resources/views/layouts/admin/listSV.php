<!DOCTYPE html>
<html lang="en" ng-app = "my-app">
<head>
	<meta charset="UTF-8" />
	<meta name="copyright" content="QuocTuan.Info" />
	<meta name="author" content="Vũ Quốc Tuấn" />
	<title>Quản Lý Sinh Viên</title>
	<!-- Load Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="template/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="template/css/style.css" />
</head>
<body>
<div>
	<?php include("menuBar.blade.php");?>
	<br>
	<br>
	<div class="container" ng-controller="SinhVienController" role="main">

		<center><h2>Danh Sách Sinh Viên</h2></center>
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th width="30%">Họ và Tên</th>
					<th>Lớp</th>
					<th>Email</th>
					<th>MSSV</th>
					<th width="10%"><button id="btn-add" class="btn btn-primary btn-xs" ng-click="modal('add')">Thêm Sinh Viên</button></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="sv in sinhviens">
					
					<td>{{sv.hoten}}</td>
					<td>{{sv.lop}}</td>
					<td>{{sv.email}}</td>
					<td>{{sv.mssv}}</td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="modal('edit',sv.id)">Sửa</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="delete(sv.id)">Xóa</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{ frmTitle }}</h4>
			  </div>
			  <div class="modal-body">
				<form name="frmSinhVien" class="form-horizontal" action="posteditSV/{id}">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Họ tên</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="Vui lòng nhập họ tên" ng-model="sinhvien.name" ng-required="true"/>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.name.$error.required">Vui lòng nhập họ tên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Lớp</label>
						<div class="col-sm-9">
							<!-- <input type="text" class="form-control" id="age" name="age" placeholder="Vui lòng nhập tuổi" >
							<span id="helpBlock2" class="help-block">Vui lòng nhập tuổi</span> -->
							
							<span class="form_item">
								<select name="sltCate" class="form-control" ng-model="sinhvien.sltCate" ng-required="true">
									<option value="0">--- Lớp ---</option>
									<option value="LTU11A">LTU11A</option>
									<option value="LTU11B">LTU11B</option>
									<option value="LTU12A">LTU12A</option>
									<option value="LTU13A">LTU13A</option>
									<option value="INPG12">INPG12</option>
									<option value="VUWIT12B">VUWIT12B</option>
									
								</select>
							</span>
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.sltCate.$error.required">Vui lòng chọn lớp</span> 
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">MSSV</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="mssv" name="txtMssv" placeholder="Vui lòng nhập MSSV" ng-model="sinhvien.txtMssv" ng-required="true" />
							<span id="helpBlock2" class="help-block" ng-show="frmSinhVien.txtMssv.$error.required">Vui lòng nhập MSSV</span>
						</div>
					</div>
					
					<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="frmSinhVien.$invalid" ng-click="save(state,id)">Lưu</button>
			  </div>
				</form>
			  </div>
			  
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</div>
	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="template/js/jquery.min.js"></script>
	<script type="text/javascript" src="template/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="app/lib/angular.min.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
	<script type="text/javascript" src="app/controller/SinhVienController.js"></script>

	<script type="text/javascript">
	$(document).ready(function () {
		$("#btn-add,#btn-edit").click(function () {
			$('#myModal').modal('show')
		});
	});
	</script>
</body>
</html>