<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class SliderController extends Controller
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
	public function beforeAction($action) {
		if (!in_array($this->getId(), Yii::app()->user->role)) {
			Yii::app()->user->loginRequired();
		} else {
			return parent::beforeAction($action);
		}
		
	}
	public function actionIndex() {
		$this->render('index');
	}

	public function getsliderimfoinformation($slider) {
		// $photos = Photos::model()
		// ->find(array(
		// 	'condition'=>'t.status = 1 and t.album_id = '. $slider->id,
		// ));
		//return array_merge($slider->attributes, array(
		//		'account' => $slider->account,
		//		// 'image' => $photos
		//	));
		return $slider;
	}

	public function actionInitSlider() {
		$start = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
		$limit=10;
		$sort='t.id DESC';
		$slider = Slider::model()->findAll();

		header('Content-type: application/json');
	    echo CJSON::encode(array(
	    	'result'=>TRUE,
	    	'record'=>array('slider' => $slider,), 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}

	public function addItem($item) {
		$record = new Slider;
		$record->title = $item['title'];
		$record->description = $item['description'];
		$record->img = $item['img'];
		$record->link = $item['link'];
		$record->date = $item['date'];

		if ($record->save()) {
			header('Content-type: application/json');
			$result = $this->getsliderimfoinformation($record);
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Thêm thông tin thành công!'));
		} else {
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công! Vui lòng đìên đầy đủ tất cả các truờng thông tin.'));
			Yii::app()->end();
		}
	}

	public function updateItem($item) {
		if (!isset($item['id']))
			return $this->addItem($item);

		$record = Slider::model()->findByPk((int) $item['id']);

		$record->title = $item['title'];
		$record->description = $item['description'];
		$record->img = $item['img'];
		$record->link = $item['link'];
		$record->date = $item['date'];

		$update = array( 'title', 'description', 'img', 'link', 'date');

		if ($record->update($update)) {
			header('Content-type: application/json');
			$result = $this->getsliderimfoinformation($record);
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
		} else {
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}
	}

	public function deleteItem($item) {
		if ($record = Slider::model()->deleteByPk((int)$item['id'])) {				
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$record, 'message'=>'Xóa thông tin thành công!'));
		} else {
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}

	public function actionSaveItem(){
		if (isset($_POST)) {
			if 			((int) $_POST['control'] == 0) $this->addItem($_POST);
			else if 	((int) $_POST['control'] == 1) $this->updateItem($_POST);
			else if  	((int) $_POST['control'] == 2) $this->deleteItem($_POST);
	
		} else {
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	

	public function actionCoveralbum() {
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
				$result = $this->getsliderimfoinformation($record);
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
	
	
}
?>