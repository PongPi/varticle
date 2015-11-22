function PermissionsController($scope,$http,$location,$filter) { 
	$scope.role = {};
	$scope.group = {};
	$scope.allrole = [];
	$scope.allgroup = [];
	loading('hide');
	$http({method: 'POST', url: url_base + 'admin/permissions/initpermissions', async:false}).success(function(data, status, headers, config) {	 	
	 	console.log(data);
	 	if(data.result == 'true' || data.result == true){
	 		$scope.allrole = data.roles;
	 		$scope.allgroup = data.groups;
	 	}else{
	 		window.alert(data.message);					
	 	}	
	 	loading('hide'); 	
	}).error(function(data, status, headers, config) {   
		console.log(data); 		
		window.alert("Server has experienced a problem. please try again after some time!");
		loading('hide');    		
	});
	$scope.newrole = function () {
		$scope.role = {};
		$scope.role.control = 0;
		$('#index-modal-role').modal('show');
	}
	$scope.editrole = function (role) {
		$scope.role = role;
		$scope.role.control = 1;
		$scope.role.password = '';
		$('#index-modal-role').modal('show');
	}
	$scope.deleterole = function (role) {
		var r = confirm("Khi bạn tiến hành xóa 'Quyền "+role.name+"' thì toàn bộ thông tin liên quan đến 'Quyền "+role.name+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.role = role;
			$scope.role.control = 2;
			$scope.saverole();
		}
	}
	
	$scope.saverole = function (argument) {
		var validation = provide_validation_services($scope.form_role);
		if($scope.role.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				role:$scope.role
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/permissions/saverole', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.role.control == 0){
			 			$scope.allrole.unshift(data.record);		
			 		}else if($scope.role.control == 1){
			 			for (var x in $scope.allrole) {
			 				if($scope.allrole[x].id == $scope.role.id){
			 					$scope.allrole[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.role.control == 2){
			 			for (var x in $scope.allrole) {
			 				if($scope.allrole[x].id == $scope.role.id){
			 					$scope.allrole.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#index-modal-role').modal('hide');
					});
			 	}else{
			 		window.alert(data.message);
					loading('hide');
			 	}	 	
			}).error(function(data, status, headers, config) {   
				console.log(data); 		
				window.alert("Server has experienced a problem. please try again after some time!");
				loading('hide');    		
			});
		}
	}
	$scope.newgroup = function () {
		$scope.group = {};
		$scope.group.control = 0;
		$('#index-modal-group').modal('show');
	}
	$scope.editgroup = function (group) {
		$scope.group = group;
		$scope.group.control = 1;
		$scope.group.password = '';
		$('#index-modal-group').modal('show');
	}
	$scope.deletegroup = function (group) {
		var r = confirm("Khi bạn tiến hành xóa 'Nhóm "+group.group_name+"' thì toàn bộ thông tin liên quan đến 'Nhóm "+group.group_name+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.group = group;
			$scope.group.control = 2;
			$scope.savegroup();
		}
	}
	
	$scope.savegroup = function (argument) {
		var validation = provide_validation_services($scope.form_group);
		if($scope.group.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				group:$scope.group
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/permissions/savegroup', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.group.control == 0){
			 			$scope.allgroup.unshift(data.record);		
			 		}else if($scope.group.control == 1){
			 			for (var x in $scope.allgroup) {
			 				if($scope.allgroup[x].id == $scope.group.id){
			 					$scope.allgroup[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.group.control == 2){
			 			for (var x in $scope.allgroup) {
			 				if($scope.allgroup[x].id == $scope.group.id){
			 					$scope.allgroup.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#index-modal-group').modal('hide');
					});
			 	}else{
			 		window.alert(data.message);
					loading('hide');
			 	}	 	
			}).error(function(data, status, headers, config) {   
				console.log(data); 		
				window.alert("Server has experienced a problem. please try again after some time!");
				loading('hide');    		
			});
		}
	}
	// $scope.permissionsgroup = function () {
	// 	// body...
	// }
	// $scope.permission = {};
	$scope.permissionsgroup = function (group){
		$scope.group = group;
		for (var x in $scope.allrole) {
			// console.log(group.role);
			if(group.role.indexOf($scope.allrole[x].id) > -1){
				$scope.allrole[x].select = true;				
			}else{
				$scope.allrole[x].select = false;
			}
		}
		console.log($scope.allrole);
		$('#index-modal-permission').modal('show');
	};
	$scope.savepermission = function () {
		var data = $.param({
			role:$scope.allrole,
			group:$scope.group.id,
		});
		console.log($scope.allrole);
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/permissions/savepermission', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	if(data.result == 'true' || data.result == true){
		 		$scope.group.role = data.role;
				$('#index-modal-permission').modal('hide');
		 	}else{
		 		window.alert(data.message);				
		 	}	
		 	loading('hide'); 
		 	console.log(data);	
		}).error(function(data, status, headers, config) {    		
			window.alert("Server has experienced a problem. please try again after some time!");
			loading('hide');
			console.log(data);	    		
		});
	};
}