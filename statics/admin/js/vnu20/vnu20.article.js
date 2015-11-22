function ArticleController($scope,$http,$location,$filter, FileUploader) { 
	$scope.allcatalogue = [];
	$scope.allpost = [];
	$scope.allpagination = 0;
	$scope.pagination = 0;
	$scope.catalogue = {};
	$scope.post = {};
	$scope.allmeta = [];
	$scope.meta = {};
	$scope.alltype = [							
		{'name':'Liên kết', 'value': 'link'},	
		{'name':'Bài viết', 'value': 'post'},		
	];
	$scope.editorOptions = {
        language: 'vn',
       // uiColor: '#000000'
    };
	loading('loading');
	$scope.role = [];
	$http({method: 'POST', url: url_base + 'admin/accounts/accountlogin', async:false}).success(function(data, status, headers, config) {	 	
		console.log(data); 		
		if(data.result == 'true' || data.result == true){
			$scope.role = data.record.role;
			$http({method: 'POST', url: url_base + 'admin/article/initarticle', async:false}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		$scope.allcatalogue = data.record.catalogue;
			 		$scope.allpost = data.record.post;
			 		$scope.allpagination = data.record.pagination;
			 		$scope.pagination = 0;
			 	}else{
			 		window.alert(data.message);					
			 	}	
			 	loading('hide'); 	
			}).error(function(data, status, headers, config) {   
				console.log(data); 		
				window.alert("Server has experienced a problem. please try again after some time!");
				loading('hide');    		
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
	
	$scope.getNumber = function(num) {
	    return new Array(num);   
	}
	$scope.newcatalogue = function () {
		$scope.catalogue = {};
		$scope.catalogue.control = 0;
		$('#article-catalogue-modal').modal('show');
	}
	$scope.editcatalogue = function (catalogue) {
		$scope.catalogue = catalogue;
		$scope.catalogue.control = 1;
		// $scope.catalogue.password = '';
		$('#article-catalogue-modal').modal('show');
	}
	$scope.deletecatalogue = function (catalogue) {
		var r = confirm("Khi bạn tiến hành xóa 'Danh mục "+catalogue.cat_name+"' thì toàn bộ thông tin liên quan đến 'Danh mục "+catalogue.cat_name+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.catalogue = catalogue;
			$scope.catalogue.control = 2;
			$scope.savecatalogue();
		}
	}
	
	$scope.savecatalogue = function (argument) {
		var validation = provide_validation_services($scope.form_catalogue);
		if($scope.catalogue.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				catalogue:$scope.catalogue
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/article/savecatalogue', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.catalogue.control == 0){
			 			$scope.allcatalogue.unshift(data.record);		
			 		}else if($scope.catalogue.control == 1){
			 			for (var x in $scope.allcatalogue) {
			 				if($scope.allcatalogue[x].id == $scope.catalogue.id){
			 					$scope.allcatalogue[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.catalogue.control == 2){
			 			for (var x in $scope.allcatalogue) {
			 				if($scope.allcatalogue[x].id == $scope.catalogue.id){
			 					$scope.allcatalogue.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#article-catalogue-modal').modal('hide');
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
	$scope.usescatalogue = function(catalogue, cat_status) {
		var data = $.param({
			catalogue : catalogue.id,
			cat_status : cat_status
		});
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/article/usescatalogue', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allcatalogue) {
	 				if($scope.allcatalogue[x].id == catalogue.id){
	 					$scope.allcatalogue[x] = data.record;
	 					break;
	 				}
	 			}			 						 		
				loading('hide', function () {
					// $('#article-catalogue-modal').modal('hide');
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
	$scope.newpost = function () {
		$scope.post = {};
		$scope.post.control = 0;
		var found = $filter('filter')($scope.allcatalogue, {cat_status: '1'}, true);		
		$scope.postcat = found[0];
		$scope.posttype = $scope.alltype[1];
		// found = $filter('filter')($scope.allcatalogue, {alltype: '1'}, true);
		$('#article-post-modal').modal('show');
	}
	$scope.editpost = function (post) {
		$scope.post = post;
		$scope.post.control = 1;
		var found = $filter('filter')($scope.allcatalogue, {id: post.post_cat}, true);		
		$scope.postcat = found[0];		
		console.log($scope.postcat);
		found = $filter('filter')($scope.alltype, {value: post.post_type}, true);
		$scope.posttype = found[0];
		// $scope.post.password = '';
		$('#article-post-modal').modal('show');
	}
	$scope.deletepost = function (post) {
		var r = confirm("Khi bạn tiến hành xóa 'Bài viết "+post.post_title+"' thì toàn bộ thông tin liên quan đến 'Bài viết "+post.post_title+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.post = post;
			$scope.post.control = 2;
			$scope.savepost();
		}
	}
	
	$scope.savepost = function (argument) {
		var validation = provide_validation_services($scope.form_post);
		if($scope.post.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			$scope.post.post_cat = $scope.postcat.id;			
			$scope.post.post_type = $scope.posttype.value;

			var data = $.param({
				post:$scope.post
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/article/savepost', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.post.control == 0){
			 			$scope.allpost.unshift(data.record);		
			 		}else if($scope.post.control == 1){
			 			for (var x in $scope.allpost) {
			 				if($scope.allpost[x].id == $scope.post.id){
			 					$scope.allpost[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.post.control == 2){
			 			for (var x in $scope.allpost) {
			 				if($scope.allpost[x].id == $scope.post.id){
			 					$scope.allpost.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#article-post-modal').modal('hide');
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
	$scope.usespost = function(post, post_status) {
		var data = $.param({
			post : post.id,
			post_status : post_status
		});
		console.log(data);
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/article/usespost', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allpost) {
	 				if($scope.allpost[x].id == post.id){
	 					$scope.allpost[x] = data.record;
	 					break;
	 				}
	 			}			 						 		
				loading('hide', function () {
					// $('#article-catalogue-modal').modal('hide');
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
	$scope.customizablepagination = function (pagination) {
		$scope.pagination = pagination;
		$scope.customizabledata();
	}
	$scope.previouspagination = function () {
		if($scope.pagination <= 0 ){
			$scope.pagination = $scope.allpagination - 1;
		}else{
			$scope.pagination--;
		}
		$scope.customizabledata();
	}
	$scope.nextpagination = function () {
		if($scope.pagination >= $scope.allpagination - 1){
			$scope.pagination = 0;
		}else{
			$scope.pagination++;
		}
		$scope.customizabledata();
	}
	$scope.customizabledata = function () {
		loading('show'); 
		var data = $.param({
			pagination : $scope.pagination,
			// post_status : post_status
		});
		$http({method: 'POST', url: url_base + 'admin/article/customizabledata', async:false, data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
		 		// $scope.allcatalogue = data.record.catalogue;
		 		$scope.allpost = data.record.post;
		 		// $scope.allpagination = data.record.pagination;
		 		// $scope.pagination = 0;
		 	}else{
		 		window.alert(data.message);					
		 	}	
		 	loading('hide'); 	
		}).error(function(data, status, headers, config) {   
			console.log(data); 		
			window.alert("Server has experienced a problem. please try again after some time!");
			loading('hide');    		
		});
	}
	$scope.avatarpost = function (post) {
		$scope.post = post;
		$scope.catalogue = {};
		articleavatar.formData =[{id: post.id,key:'avatarpost',}];
		articleavatar.queue = [];
		$('#article-post-avatar-modal').modal('show');
	}

	var articleavatar = $scope.articleavatar = new FileUploader({
        url: url_base + 'admin/article/avatarpost',
        queueLimit :1,
    });

    // FILTERS

    articleavatar.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });

    // CALLBACKS

    // $scope.uploaderlibrary.queue = [];
	// uploader.formData =[{dh_id: $('div[thegioiinan]').attr('thegioiinan'),key:'fileupload',}];
	articleavatar.onSuccessItem = function(fileItem, response, status, headers) {
        console.info('onSuccessItem', fileItem, response, status, headers);
        if(response.key == 'avatarpost' || response.key == 'avatarcatalogue'){
	        if(response.result == true || response.result == 'true'){
		        if(response.key == 'avatarpost'){
		        	for (var x in $scope.allpost) {
		 				if($scope.allpost[x].id == response.record.id){
		 					$scope.allpost[x] = response.record;
		 					break;
		 				}
		 			}	
		        }else{
		        	for (var x in $scope.allcatalogue) {
		 				if($scope.allcatalogue[x].id == response.record.id){
		 					$scope.allcatalogue[x] = response.record;
		 					break;
		 				}
		 			}	
		        }	        	
	        	
	        	loading('hide', function () {
	        		$('#article-post-avatar-modal').modal('hide');
	        	});    
	        }else{
	        	window.alert(response.message);
	        }
	    }
    };
    articleavatar.onErrorItem = function(fileItem, response, status, headers) {
    	window.alert("Máy chủ đã gặp sự cố. Xin vui lòng thử lại sau!");
        console.info('onErrorItem', fileItem, response, status, headers);
    };
    $scope.avatarcatalogue = function (catalogue) {
		$scope.catalogue = catalogue;
		$scope.post = {};
		articleavatar.formData =[{id: catalogue.id,key:'avatarcatalogue',}];
		articleavatar.queue = [];
		$('#article-post-avatar-modal').modal('show');
	}

	$scope.metapost = function (post) {
		$scope.post = post;
		// images_album.formData =[{id: album.id,key:'images_album',}];
		// images_album.clearQueue();// = [];
		$scope.allmeta = [];
		var data = $.param({
			post : post.id,
		});
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/article/initmetapost', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			$scope.allmeta = data.record;
	 			$scope.newmeta();
	 			$scope.form_meta_active = false;
	 			// $('#article-post-meta-form').hide();	 				 						 		
				loading('hide', function () {
					$('#article-post-meta-modal').modal('show');	
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
	$scope.newmeta = function () {
		$scope.meta = {};
		$scope.meta.control = 0;
		$scope.form_meta_active = true;
		// $('#article-post-meta-form').show();	 
		// $('#article-meta-modal').modal('show');
	}
	$scope.hidemeta = function () {
		$scope.form_meta_active = false;
		// $scope.meta = {};
		// $scope.meta.control = 0;
		// $('#article-post-meta-form').hide();	 
		// $('#article-meta-modal').modal('show');
	}
	$scope.editmeta = function (meta) {
		$scope.meta = meta;
		$scope.meta.control = 1;
		$scope.form_meta_active = true;
		// $('#article-post-meta-form').show();
		// $scope.meta.password = '';
		// $('#article-meta-modal').modal('show');
	}
	$scope.deletemeta = function (meta) {
		var r = confirm("Khi bạn tiến hành xóa 'Meta "+meta.meta_name+"' thì toàn bộ thông tin liên quan đến 'Meta "+meta.meta_name+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.meta = meta;
			$scope.meta.control = 2;
			$scope.savemeta();
		}
	}
	
	$scope.savemeta = function (argument) {
		//var validation = provide_validation_services($scope.form_meta);
		//if($scope.meta.control != 2 && !validation.result){
		//	window.alert(validation.message);
		//}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				meta:$scope.meta,
				post:$scope.post.id
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/article/savemeta', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.meta.control == 0){
			 			$scope.allmeta.unshift(data.record);		
			 		}else if($scope.meta.control == 1){
			 			for (var x in $scope.allmeta) {
			 				if($scope.allmeta[x].id == $scope.meta.id){
			 					$scope.allmeta[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.meta.control == 2){
			 			for (var x in $scope.allmeta) {
			 				if($scope.allmeta[x].id == $scope.meta.id){
			 					$scope.allmeta.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		
			 		$scope.newmeta(); 		
					loading('hide', function () {
						$scope.form_meta_active = false;
						// $('#article-post-meta-form').hide();
						// $('#article-meta-modal').modal('hide');
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
		//}
	}
	$scope.usesmeta = function(meta, meta_status) {
		var data = $.param({
			meta : meta.id,
			meta_status : meta_status
		});
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/article/usesmeta', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allmeta) {
	 				if($scope.allmeta[x].id == meta.id){
	 					$scope.allmeta[x] = data.record;
	 					break;
	 				}
	 			}			 						 		
				loading('hide', function () {
					// $('#article-meta-modal').modal('hide');
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