function AccountsController($scope,$http,$location,$filter) { 
	$scope.account = {};
	$scope.allaccount = [];
	$scope.group = {};
	$scope.allgroup = [];
	$scope.allrole = [];
	loading('loading');
	$http({method: 'POST', url: url_base + 'admin/accounts/initaccount', async:false}).success(function(data, status, headers, config) {	 	
	 	console.log(data);
	 	if(data.result == 'true' || data.result == true){
	 		$scope.allaccount = data.record;
	 		$scope.allgroup = data.groups;
	 		$scope.allrole = data.roles;
	 	}else{
	 		window.alert(data.message);					
	 	}	
	 	loading('hide'); 	
	}).error(function(data, status, headers, config) {   
		console.log(data); 		
		window.alert("Server has experienced a problem. please try again after some time!");
		loading('hide');    		
	});
	$scope.newaccount = function () {
		$scope.account = {};
		$scope.account.control = 0;
		$('#index-modal-accounts').modal('show');
	}
	$scope.editaccount = function (account) {
		$scope.account = account;
		$scope.account.control = 1;
		$scope.account.password = '';
		$('#index-modal-accounts').modal('show');
	}
	$scope.deleteaccount = function (account) {
		var r = confirm("Khi bạn tiến hành xóa 'Tài khoản "+account.username+"' thì toàn bộ thông tin liên quan đến 'Tài khoản "+account.username+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.account = account;
			$scope.account.control = 2;
			$scope.saveaccount();
		}
	}
	$scope.saveaccount = function (argument) {
		var validation = provide_validation_services($scope.form_account);
		if($scope.account.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				account:$scope.account
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/accounts/saveaccount', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.account.control == 0){
			 			$scope.allaccount.unshift(data.record);		
			 		}else if($scope.account.control == 1){
			 			for (var x in $scope.allaccount) {
			 				if($scope.allaccount[x].id == $scope.account.id){
			 					$scope.allaccount[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.account.control == 2){
			 			for (var x in $scope.allaccount) {
			 				if($scope.allaccount[x].id == $scope.account.id){
			 					$scope.allaccount.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#index-modal-accounts').modal('hide');
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
			$http({method: 'POST', url: url_base + 'admin/accounts/savegroup', async:false,data:data}).success(function(data, status, headers, config) {	 	
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
	$scope.usesaccount = function(account, status) {
		var data = $.param({
			account : account.id,
			status : status
		});
		console.log(data);
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/accounts/usesaccount', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allaccount) {
	 				if($scope.allaccount[x].id == account.id){
	 					$scope.allaccount[x] = data.record;
	 					break;
	 				}
	 			}			 						 		
				loading('hide', function () {
					// $('#article-catalogue-model').modal('hide');
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
		$http({method: 'POST', url: url_base + 'admin/accounts/savepermission', async:false,data:data}).success(function(data, status, headers, config) {	 	
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
	$scope.accountgroupshow = function (account) {
		$scope.account = account;
		for (var x in $scope.allgroup) {
			// console.log(group.role);
			if(account.accountgroup.indexOf($scope.allgroup[x].id) > -1){
				$scope.allgroup[x].select = true;				
			}else{
				$scope.allgroup[x].select = false;
			}
		}
		// console.log($scope.allgroup);
		$('#account-accountgroup-modal').modal('show');
	}
	$scope.saveaccountgroup = function () {
		var data = $.param({
			accountgroup:$scope.allgroup,
			account:$scope.account.id,
		});
		console.log($scope.allrole);
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/accounts/saveaccountgroup', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	if(data.result == 'true' || data.result == true){
		 		$scope.account.accountgroup = data.accountgroup;
				$('#account-accountgroup-modal').modal('hide');
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