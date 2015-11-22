function AlbumsController($scope,$http,$location,$filter, FileUploader) {
	$scope.album = {};
	$scope.allalbum = [];
	$scope.allimages = [];
	$scope.image = {};
	loading('loading');
	$http({method: 'POST', url: url_base + 'admin/albums/initalbums', async:false}).success(function(data, status, headers, config) {	 	
	 	console.log(data);
	 	if(data.result == 'true' || data.result == true){
	 		$scope.allalbum = data.record.allalbum;
	 		// $scope.allpost = data.record.post;
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
	$scope.newalbum = function () {
		$scope.album = {};
		$scope.album.control = 0;
		$('#albums-album-modal').modal('show');
	}
	$scope.editalbum = function (album) {
		$scope.album = album;
		$scope.album.control = 1;
		// $scope.album.password = '';
		$('#albums-album-modal').modal('show');
	}
	$scope.deletealbum = function (album) {
		var r = confirm("Khi bạn tiến hành xóa 'Album "+album.title+"' thì toàn bộ thông tin liên quan đến 'Album "+album.title+"' sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.album = album;
			$scope.album.control = 2;
			$scope.savealbum();
		}
	}
	
	$scope.savealbum = function (argument) {
		var validation = provide_validation_services($scope.form_album);
		if($scope.album.control != 2 && !validation.result){
			window.alert(validation.message);
		}else{
			// $scope.cheques.condition = $scope.condition.value;
			var data = $.param({
				album:$scope.album
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/albums/savealbum', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.album.control == 0){
			 			$scope.allalbum.unshift(data.record);		
			 		}else if($scope.album.control == 1){
			 			for (var x in $scope.allalbum) {
			 				if($scope.allalbum[x].id == $scope.album.id){
			 					$scope.allalbum[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.album.control == 2){
			 			for (var x in $scope.allalbum) {
			 				if($scope.allalbum[x].id == $scope.album.id){
			 					$scope.allalbum.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						$('#albums-album-modal').modal('hide');
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
	$scope.usesalbum = function(album, status) {
		var data = $.param({
			album : album.id,
			status : status
		});
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/albums/usesalbum', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allalbum) {
	 				if($scope.allalbum[x].id == album.id){
	 					$scope.allalbum[x] = data.record;
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
	$scope.imagesalbum = function (album) {
		$scope.album = album;
		images_album.formData =[{id: album.id,key:'images_album',}];
		images_album.clearQueue();// = [];
		$scope.allimages = [];
		var data = $.param({
			album : album.id,
		});
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/albums/initimagesalbum', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			$scope.allimages = data.record;	 				 						 		
				loading('hide', function () {
					$('#albums-image-modal').modal('show');	
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
	var images_album = $scope.images_album = new FileUploader({
        url: url_base + 'admin/albums/imagesalbum',
        autoUpload: true,
        queueLimit :6,
    });

    // FILTERS

    images_album.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });

    // CALLBACKS

    // images_album.onAfterAddingFile = function(item) {
        
    // };
    images_album.onSuccessItem = function(fileItem, response, status, headers) {
        console.info('onSuccessItem', fileItem, response, status, headers);
        if(response.key == 'images_album'){
	        if(response.result == true || response.result == 'true'){	
	        	$scope.allimages.unshift(response.record);
	        	if(images_album.queue.length == 6){
		        	images_album.queue = [];
		        }	      
	        }else{
	        	window.alert(response.message);
	        }
	    }
    };
    images_album.onErrorItem = function(fileItem, response, status, headers) {
    	window.alert("Máy chủ đã gặp sự cố. Xin vui lòng thử lại sau!");
        console.info('onErrorItem', fileItem, response, status, headers);
    };
    $scope.deleteimage = function (image) {
		var r = confirm("Khi bạn tiến hành xóa 'Hình ảnh' thì toàn bộ thông tin liên quan đến 'Hình ảnh' này sẽ bị xóa đi. Bạn có chắc là muốn làm điều này không?");
		if (r == true) {
			$scope.image = image;
			$scope.image.control = 2;
			$scope.saveimage();
		}
	}
	
	$scope.saveimage = function (argument) {
		// var validation = provide_validation_services($scope.form_image);
		// if($scope.image.control != 2 && !validation.result){
		// 	window.alert(validation.message);
		// }else{
			var data = $.param({
				image:$scope.image
			});
			loading('show');
			$http({method: 'POST', url: url_base + 'admin/albums/saveimage', async:false,data:data}).success(function(data, status, headers, config) {	 	
			 	console.log(data);
			 	if(data.result == 'true' || data.result == true){
			 		if($scope.image.control == 0){
			 			$scope.allimages.unshift(data.record);		
			 		}else if($scope.image.control == 1){
			 			for (var x in $scope.allimages) {
			 				if($scope.allimages[x].id == $scope.image.id){
			 					$scope.allimages[x] = data.record;
			 					break;
			 				}
			 			}
			 				
			 		}else if($scope.image.control == 2){
			 			for (var x in $scope.allimages) {
			 				if($scope.allimages[x].id == $scope.image.id){
			 					$scope.allimages.splice(x, 1);
			 					break;
			 				}
			 			}
			 				
			 		}		 		
					loading('hide', function () {
						// $('#images-image-modal').modal('hide');
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
		// }
	}
	$scope.usesimage = function(image, status) {
		var data = $.param({
			image : image.id,
			status : status
		});
		console.log(data);
		loading('show');
		$http({method: 'POST', url: url_base + 'admin/albums/usesimage', async:false,data:data}).success(function(data, status, headers, config) {	 	
		 	console.log(data);
		 	if(data.result == 'true' || data.result == true){
	 			for (var x in $scope.allimages) {
	 				if($scope.allimages[x].id == image.id){
	 					$scope.allimages[x] = data.record;
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
	$scope.coveralbum = function (album) {
		$scope.album = album;
		cover_album.formData =[{id: album.id,key:'cover_album',}];
		cover_album.clearQueue();
		// images_album.queue = [];
		$('#albums-cover-modal').modal('show');
	}

	var cover_album = $scope.cover_album = new FileUploader({
        url: url_base + 'admin/albums/coveralbum',
        // autoUpload: true,
        queueLimit :1,
    });

    // FILTERS

    cover_album.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });

    // CALLBACKS

    // images_album.onAfterAddingFile = function(item) {
        
    // };
    cover_album.onSuccessItem = function(fileItem, response, status, headers) {
        console.info('onSuccessItem', fileItem, response, status, headers);
        if(response.key == 'cover_album'){
	        if(response.result == true || response.result == 'true'){	
	        	for (var x in $scope.allalbum) {
	 				if($scope.allalbum[x].id == response.record.id){
	 					$scope.allalbum[x] = response.record;
	 					break;
	 				}
	 			}	
	 			$('#albums-cover-modal').modal('hide');      
	        }else{
	        	window.alert(response.message);
	        }
	    }
    };
    cover_album.onErrorItem = function(fileItem, response, status, headers) {
    	window.alert("Máy chủ đã gặp sự cố. Xin vui lòng thử lại sau!");
        console.info('onErrorItem', fileItem, response, status, headers);
    };
}