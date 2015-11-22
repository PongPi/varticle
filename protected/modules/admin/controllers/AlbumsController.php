<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class AlbumsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function beforeAction($action)
	{
		if(!in_array($this->getId(), Yii::app()->user->role)){
			Yii::app()->user->loginRequired();
		}else{
			return parent::beforeAction($action);
		}
		
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function getalbumsimfoinformation($albums)
	{
		// $photos = Photos::model()
		// ->find(array(
		// 	'condition'=>'t.status = 1 and t.album_id = '. $albums->id,
		// ));
		return array_merge($albums->attributes, array(
				'account' => $albums->account,
				// 'image' => $photos
			));

	}
	public function actionInitalbums()
	{
		$start = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
		$limit=10;
		$sort='t.id DESC';
		$variable = Albums::model()
		->findAll(array(
			'condition'=>'t.status <> 2',
		));
		$albums = array();	
		foreach ($variable as $value) {
			array_push($albums, $this->getalbumsimfoinformation($value)
			// 	array_merge($value->attributes, array(
			// 	'account' => $value->account
			// ))
				);
		}
		header('Content-type: application/json');
	    echo CJSON::encode(array('result'=>TRUE,
	    	'record'=>array(
	    		'allalbum' => $albums,
	    	), 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function addalbum($album) {
		$record = new Albums;
		$record->title = $album['title'];
		$record->desc = $album['desc'];
		$record->status = 1;
		$record->account_id = (isset(Yii::app()->user->id) and !empty(Yii::app()->user->id)) ? Yii::app()->user->id : 1;
		$re = $record->save();
		if($re){
			header('Content-type: application/json');
			$result = $this->getalbumsimfoinformation($record);
			// array_merge($record->attributes, array(
			// 	'account' => $record->account
			// ));
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Thêm thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function updatealbum($album) {
		if(!isset($album['id'])){
			$this->addalbum($album);
		}else{
		$record = Albums::model()->findByPk($album['id']);
		$record->title = $album['title'];
		$record->desc = $album['desc'];
		$update = array( 'title', 'desc');
		$re = $record->update($update);
		if($re){
			header('Content-type: application/json');
			$result = $this->getalbumsimfoinformation($record);
			// array_merge($record->attributes, array(
			// 	'account' => $record->account
			// ));
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}}
	}
	public function deletealbum($album) {
		$record = Albums::model()->findByPk($album['id']);
		$record->status = 2;
		$update = array( 'status');
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
	public function actionSavealbum(){
		if(isset($_POST['album'])){
			if($_POST['album']['control'] == '0' || $_POST['album']['control'] == 0){
				$this->addalbum($_POST['album']);
			}else if($_POST['album']['control'] == '1' || $_POST['album']['control'] == 1){
				$this->updatealbum($_POST['album']);
			}else if($_POST['album']['control'] == '2' || $_POST['album']['control'] == 2){
				$this->deletealbum($_POST['album']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsesalbum(){
		if(isset($_POST['album'])){			
			$record = Albums::model()->findByPk($_POST['album']);
			$record->status = $_POST['status'];
			$update = array( 'status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				$result = $this->getalbumsimfoinformation($record);
				// array_merge($record->attributes, array(
				// 	'account' => $record->account
				// ));
				echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
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
	public function actionImagesalbum()
	{
		if(!empty( $_FILES )){
			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
			
			$pathimages = dirname( __FILE__ ). DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR. 'statics/images/album';
			
			$imagesname = 'vnu20_' . $_REQUEST['id']. '_' . date('Y-m-d-H-i-s-B') . $_FILES[ 'file' ][ 'name' ];
			$uploadPath = $pathimages . DIRECTORY_SEPARATOR .  $imagesname;
			
			$re = move_uploaded_file( $tempPath, $uploadPath );
			if($re){				
				$record = new Photos;
				$record->album_id = $_REQUEST['id'];
				$record->status = 1;
				$record->image = $imagesname;
				$record->account_id = (isset(Yii::app()->user->id) and !empty(Yii::app()->user->id)) ? Yii::app()->user->id : 1;
				$re = $record->save();
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
	public function actionCoveralbum()
	{
		if(!empty( $_FILES )){
			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
			
			$pathimages = dirname( __FILE__ ). DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR. 'statics/images/album';
			
			$imagesname = 'vnu20_' . $_REQUEST['id']. '_' . date('Y-m-d-H-i-s-B') . $_FILES[ 'file' ][ 'name' ];
			$uploadPath = $pathimages . DIRECTORY_SEPARATOR .  $imagesname;
			
			$re = move_uploaded_file( $tempPath, $uploadPath );
			if($re){				
				$record = Albums::model()->findByPk($_REQUEST['id']);
				$record->cover = $imagesname;
				$update = array( 'cover');
				$re = $record->update($update);
				$result = $this->getalbumsimfoinformation($record);
				header('Content-type: application/json');
				echo CJSON::encode(array(
					'result'=>TRUE,
					'key'=> (isset($_REQUEST['key'])) ? $_REQUEST['key'] : NULL,
					'file'=>$imagesname, 
					'id' => $_REQUEST['id'],
					'record' => $result,
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
	
	public function actionInitimagesalbum()
	{
		if(isset($_POST['album'])){
			// $start = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
			// $limit=10;
			// $sort='t.id DESC';
			$variable = Photos::model()
			->findAll(array(
				'condition'=>'t.status <> 2 and t.album_id = '. $_POST['album'],
			));
			$photos = array();	
			foreach ($variable as $value) {
				array_push($photos, array_merge($value->attributes, array(
					'account' => $value->account
				)));
			}
			header('Content-type: application/json');
		    echo CJSON::encode(array('result'=>TRUE,
		    	'record'=> $photos, 
		    	'message'=>''
		    ));
		    Yii::app()->end(); // equal to die() or exit() function
	    }else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function deleteimage($image) {
		$record = Photos::model()->findByPk($image['id']);
		$record->status = 2;
		$update = array( 'status');
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
	public function actionSaveimage(){
		if(isset($_POST['image'])){
			if($_POST['image']['control'] == '0' || $_POST['image']['control'] == 0){
				// $this->addimage($_POST['image']);
			}else if($_POST['image']['control'] == '1' || $_POST['image']['control'] == 1){
				// $this->updateimage($_POST['image']);
			}else if($_POST['image']['control'] == '2' || $_POST['image']['control'] == 2){
				$this->deleteimage($_POST['image']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsesimage(){
		if(isset($_POST['image'])){			
			$record = Photos::model()->findByPk($_POST['image']);
			$record->status = $_POST['status'];
			$update = array( 'status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				$result = array_merge($record->attributes, array(
					'account' => $record->account
				));
				echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
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