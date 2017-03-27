app.controller('SinhVienController',function($scope,$http,API){
	$http.get(API+'danhsachSVjson').then(successCallback);
	function successCallback(response){

		
		$scope.sinhviens = response.data;
	}
	$scope.modal = function(state,id){
		$scope.state = state;
		switch (state){
			case "add":
				$scope.frmTitle = "Thêm Sinh Viên";
				break;
			case "edit":
				$scope.frmTitle = "Sửa Sinh Viên";
				$scope.id =id;
				// $http.get(API+'editSV/'+id).then(successCallback);
				// function successCallback(response){
				
				// 	 $scope.frmSinhVien.name = response.data.fullname;
				// 	 $scope.frmSinhVien.sltCate = response.data.class;
				// 	 $scope.frmSinhVien.txtMssv = response.data.mssv;	
				// }
				break;
			default: 
				$scope.frmTitle = "Không Biết";
				break;
		}
		

		$("#myModal").modal('show');
	}
	$scope.save = function(state,id){
		if (state == "add") {
			
			var data = $.param($scope.sinhvien);
			var req = {
			 	method: 'POST',
 				url: API + 'themsinhvien',
 				headers: {
   					'Content-Type': 'application/x-www-form-urlencoded'
 				},
 				data: data
			}

			$http(req).then(function(response){
				console.log(response);
				location.reload();
			}, function(response){
				console.log(response);
				alert('Xảy ra lỗi vui lòng kiểm tra log');
			});
		}
		if (state == "edit") {
			var data = $.param($scope.sinhvien);
			var req = {
			 	method: 'POST',
 				url: API + 'posteditSV/'+ id,
 				headers: {
   					'Content-Type': 'application/x-www-form-urlencoded'
 				},
 				data: data
			}

			$http(req).then(function(response){
				console.log(response);
				location.reload();
			}, function(response){
				console.log(response);
				alert('Xảy ra lỗi vui lòng kiểm tra log');
			});
		}
	}

	$scope.delete = function (id) {
		var isConfirmDelete = confirm('Bạn có chắc muốn xóa Sinh Viên này không');
		if (isConfirmDelete) {
			$http.get(API+'deleteSV/'+id).then(successCallback,errorCallback);
			function successCallback(response){
					console.log(response);
					location.reload();
			}
			function errorCallback(response){
				console.log(response);
				alert("Delete Fail!");
			}
		} else {
			return false;

		}
	}
});