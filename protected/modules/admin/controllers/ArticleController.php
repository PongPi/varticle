<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class ArticleController extends Controller
{
	public $layout='//layouts/admin';
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function beforeAction($action)
	{
		if(!in_array($this->getId(), Yii::app()->user->role)){
			// $this->redirect($this->createAbsoluteUrl('admin/index'));
			Yii::app()->user->loginRequired();
		}else{
			return parent::beforeAction($action);
		}
		
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionInitarticle()
	{
		// $start=0;
		// if(isset($_POST['offset'])){
		$start = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
		// }
		$limit=10;
		$sort='t.id DESC';
		$catalogue_role = implode('", "',Yii::app()->user->role);

		$variable = Posts::model()
		->with(array(
			'postCat'=>array(
				'condition'=>'postCat.cat_status <> 2 and postCat.cat_key IN ("' . $catalogue_role . '")'
		)))
		->findAll(array(
			'condition'=>'t.post_status <> 2',
			'order' => $sort,
			'offset' => $start,
	    	'limit' => $limit,
		));
		$posts = array();	
		foreach ($variable as $value) {
			array_push($posts, array_merge(
				$value->attributes, 
				array(
					'catalogue' => $value->postCat,
					'account' => $value->account
			)));
		}
		
		// cat_status
		$count_model = Posts::model()
		->with(array(
			'postCat'=>array(
				'condition'=>'postCat.cat_status <> 2 and postCat.cat_key IN ("' . $catalogue_role . '")'
		)))
		->findAll(array(
			'condition'=>'t.post_status <> 2',
		));
		$count = count($count_model);
		$catalogue = Catalogue::model()
		->findAll(array(
			'condition'=>'t.cat_status <> 2 and t.cat_key IN ("' . $catalogue_role . '")',
		));
		header('Content-type: application/json');
	    echo CJSON::encode(array('result'=>TRUE,
	    	'record'=>array(
	    		'catalogue' => $catalogue,
	    		'post' => $posts,
	    		'pagination' => ceil($count/10),
	    		'role' => Yii::app()->user->role,
	    		'user' => implode(", ",Yii::app()->user->role),
	    	), 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function actionCustomizabledata()
	{
		// $start = 0;
		// if(isset($_POST['pagination'])){
		$start = (isset($_POST['pagination'])) ? $_POST['pagination']*10 : 0;
		// }
		$limit=10;
		$sort='t.id DESC';
		$catalogue_role = implode('", "',Yii::app()->user->role);
		$variable = Posts::model()
		->with(array(
			'postCat'=>array(
				'condition'=>'postCat.cat_status <> 2 and postCat.cat_key IN ("' . $catalogue_role . '")'
		)))
		->findAll(
			array(
				'condition'=>'t.post_status <> 2',
				'order' => $sort,
				'offset' => $start,
		    	'limit' => $limit,
			)
		);
		$posts = array();	
		foreach ($variable as $value) {
			array_push($posts, array_merge($value->attributes, array('catalogue' => $value->postCat)));
		}
		header('Content-type: application/json');
	    echo CJSON::encode(array('result'=>TRUE,
	    	'record'=>array(
	    		'post' => $posts,
	    	), 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function addcatalogue($catalogue) {
		$record = new Catalogue;
		$record->cat_name = $catalogue['cat_name'];
		$record->cat_key = $catalogue['cat_key'];
		$record->cat_description = $catalogue['cat_description'];
		$record->cat_status = 1;
		$re = $record->save();
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Thêm thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function updatecatalogue($catalogue) {
		if(!isset($catalogue['id'])){
			$this->addcatalogue($catalogue);
		}else{
		$record = Catalogue::model()->findByPk($catalogue['id']);
		$record->cat_name = $catalogue['cat_name'];
		$record->cat_key = $catalogue['cat_key'];
		$record->cat_description = $catalogue['cat_description'];
		$update = array( 'cat_name', 'cat_key', 'cat_description');
		$re = $record->update($update);
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Cập nhật thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}}
	}
	public function deletecatalogue($catalogue) {
		$record = Catalogue::model()->findByPk($catalogue['id']);
		$record->cat_status = 2;
		$update = array( 'cat_status');
		$re = $record->update($update);
		if($re){				
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Xóa thông tin thành công!'));
		}else{
			// $this->key = 0;
			// $this->logMessage= 'Xóa không thành công Tình trạng "'.($account['name']).'"';
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSavecatalogue(){
		if(isset($_POST['catalogue'])){
			if($_POST['catalogue']['control'] == '0' || $_POST['catalogue']['control'] == 0){
				$this->addcatalogue($_POST['catalogue']);
			}else if($_POST['catalogue']['control'] == '1' || $_POST['catalogue']['control'] == 1){
				$this->updatecatalogue($_POST['catalogue']);
			}else if($_POST['catalogue']['control'] == '2' || $_POST['catalogue']['control'] == 2){
				$this->deletecatalogue($_POST['catalogue']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsescatalogue(){
		if(isset($_POST['catalogue'])){			
			$record = Catalogue::model()->findByPk($_POST['catalogue']);
			$record->cat_status = $_POST['cat_status'];
			$update = array( 'cat_status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Cập nhật thông tin thành công!'));
			}else{
				header('Content-type: application/json');
				echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
				Yii::app()->end();
			}
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function addpost($post) {
		$record = new Posts;
		$record->account_id = (isset(Yii::app()->user->id) and !empty(Yii::app()->user->id)) ? Yii::app()->user->id : 1;
		$record->post_title = $post['post_title'];		
		$record->post_desc = $post['post_desc'];
		$record->post_content = $post['post_content'];
		$record->post_status = 1;//$post['post_status'];
		$record->post_cat = $post['post_cat'];
		$record->post_type = $post['post_type'];
		$re = $record->save();
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array(
				'result'=>TRUE,
				'record'=>array_merge($record->attributes, array('catalogue' => $record->postCat)),//$record, 
				'message'=>'Thêm thông tin thành công!'
			));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function updatepost($post) {
		if(!isset($post['id'])){
			$this->addpost($post);
		}else{
		$record = Posts::model()->findByPk($post['id']);
		$record->post_title = $post['post_title'];		
		$record->post_desc = $post['post_desc'];
		$record->post_content = $post['post_content'];
		$record->post_cat = $post['post_cat'];
		$record->post_type = $post['post_type'];
		$update = array( 'post_title', 'post_desc', 'post_content', 'post_cat', 'post_type');
		$re = $record->update($update);
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array(
				'result'=>TRUE,
				'record'=> array_merge($record->attributes, array('catalogue' => $record->postCat)),//$record, 
				'message'=>'Cập nhật thông tin thành công!'
			));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}}
	}
	public function deletepost($post) {
		$record = Posts::model()->findByPk($post['id']);
		$record->post_status = 2;
		$update = array( 'post_status');
		$re = $record->update($update);
		if($re){				
			header('Content-type: application/json');
			echo CJSON::encode(array(
				'result'=>TRUE,
				'record'=> array_merge($record->attributes, array('catalogue' => $record->postCat)),//$record, 
				'message'=>'Xóa thông tin thành công!'
			));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSavepost(){
		if(isset($_POST['post'])){
			if($_POST['post']['control'] == '0' || $_POST['post']['control'] == 0){
				$this->addpost($_POST['post']);
			}else if($_POST['post']['control'] == '1' || $_POST['post']['control'] == 1){
				$this->updatepost($_POST['post']);
			}else if($_POST['post']['control'] == '2' || $_POST['post']['control'] == 2){
				$this->deletepost($_POST['post']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsespost(){
		if(isset($_POST['post'])){	
			$record = Posts::model()->findByPk($_POST['post']);
			$record->post_status = $_POST['post_status'];
			$update = array( 'post_status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				echo CJSON::encode(array(
				'result'=>TRUE,
				'record'=> array_merge($record->attributes, array('catalogue' => $record->postCat)),//$record, 
				'message'=>'Cập nhật thông tin thành công!'
			));
			}else{
				header('Content-type: application/json');
				echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
				Yii::app()->end();
			}
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function setavatarpost($id, $imagesname)
	{
		$record = Posts::model()->findByPk($id);
		$record->post_img = $imagesname;
		$update = array( 'post_img');
		$re = $record->update($update);	
		return $record;
	}
	public function setavatarcatalogue($id, $imagesname)
	{
		$record = Catalogue::model()->findByPk($id);
		$record->cat_img = $imagesname;
		$update = array( 'cat_img');
		$re = $record->update($update);	
		return $record;
	}
	public function actionAvatarpost()
	{
		if(!empty( $_FILES )){
			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
			if(isset($_REQUEST['key']) and $_REQUEST['key'] == 'avatarpost' ){
				$pathimages = dirname( __FILE__ ). DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR. 'statics/images/article';
			}else{
				$pathimages = dirname( __FILE__ ). DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR. 'statics/images/catalogue';
			}
			$imagesname = 'vnu20_' . $_REQUEST['id']. '_' . date('Y-m-d-H-i-s-B') . $_FILES[ 'file' ][ 'name' ];
			$uploadPath = $pathimages . DIRECTORY_SEPARATOR .  $imagesname;
			
			$re = move_uploaded_file( $tempPath, $uploadPath );
			if($re){
				if(isset($_REQUEST['key']) and $_REQUEST['key'] == 'avatarpost' ){
					$record = $this->setavatarpost($_REQUEST['id'], $imagesname);
				}else{
					$record = $this->setavatarcatalogue($_REQUEST['id'], $imagesname);
				}	
				header('Content-type: application/json');
				echo CJSON::encode(array(
					'result'=>TRUE,
					'key'=> (isset($_REQUEST['key'])) ? $_REQUEST['key'] : NULL,
					'file'=>$imagesname, 
					'id' => $_REQUEST['id'],
					'record' => $record,
					'message'=>'File được tải lên thành công!'
				));
				Yii::app()->end(); // equal to die() or exit() function
			}else{
				header('Content-type: application/json');
				echo CJSON::encode(array(
					'result'=>FALSE , 
					'message'=>'File chưa được tải lên thành công!'
				));
				Yii::app()->end(); // equal to die() or exit() function
			}		
		} else {
		
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE , 'message'=>'Không File!'));
			Yii::app()->end(); // equal to die() or exit() function
		
		}
	}
	public function actionInitmetapost()
	{
		if(isset($_POST['post'])){
			$variable = Meta::model()
			->findAll(array(
				'condition'=>'t.meta_status <> 2 and t.post_id = '. $_POST['post'],
			));
			// $photos = array();	
			// foreach ($variable as $value) {
			// 	array_push($photos, array_merge($value->attributes, array(
			// 		'account' => $value->account
			// 	)));
			// }
			header('Content-type: application/json');
		    echo CJSON::encode(array(
		    	'result'=>TRUE,
		    	'record'=> $variable, 
		    	'message'=>''
		    ));
		    Yii::app()->end();	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
			Yii::app()->end();
		}
	}
	public function addmeta($meta) {
		$record = new Meta;
		$record->post_id = $_POST['post'];
		$record->meta_name = $meta['meta_name'];
		$record->meta_text = $meta['meta_text'];
		$record->meta_link = $meta['meta_link'];
		$record->meta_status = 1;
		$re = $record->save();
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Thêm thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function updatemeta($meta) {
		if(!isset($meta['id'])){
			$this->addmeta($meta);
		}else{
		$record = Meta::model()->findByPk($meta['id']);		
		$record->meta_name = $meta['meta_name'];
		$record->meta_text = $meta['meta_text'];
		$record->meta_link = $meta['meta_link'];
		$update = array( 'meta_name', 'meta_text', 'meta_link');
		$re = $record->update($update);
		if($re){
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Cập nhật thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}}
	}
	public function deletemeta($meta) {
		$record = Meta::model()->findByPk($meta['id']);
		$record->meta_status = 2;
		$update = array( 'meta_status');
		$re = $record->update($update);
		if($re){				
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Xóa thông tin thành công!'));
		}else{
			// $this->key = 0;
			// $this->logMessage= 'Xóa không thành công Tình trạng "'.($account['name']).'"';
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSavemeta(){
		if(isset($_POST['meta'])){
			// var_dump($_POST['meta']);
			// die();
			if($_POST['meta']['control'] == '0' || $_POST['meta']['control'] == 0){
				$this->addmeta($_POST['meta']);
			}else if($_POST['meta']['control'] == '1' || $_POST['meta']['control'] == 1){
				$this->updatemeta($_POST['meta']);
			}else if($_POST['meta']['control'] == '2' || $_POST['meta']['control'] == 2){
				$this->deletemeta($_POST['meta']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsesmeta(){
		if(isset($_POST['meta'])){			
			$record = Meta::model()->findByPk($_POST['meta']);
			$record->meta_status = $_POST['meta_status'];
			$update = array( 'meta_status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Cập nhật thông tin thành công!'));
			}else{
				header('Content-type: application/json');
				echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
				Yii::app()->end();
			}
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
}
?>