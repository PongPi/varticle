<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class PermissionsController extends Controller
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
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	// public function accessRules(){
	// 	return array(
	// 		array('allow',  // allow all users to perform 'index' and 'view' actions
	// 			'actions'=>array('index'
	// 			),
	// 			'users'=>array('@'),
	// 		),
	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 		),
	// 	);
	// }
	// public function beforeAction($action)
	// {
	// 	if(!in_array($this->getId(), Yii::app()->user->role)){
	// 		$this->redirect($this->createAbsoluteUrl('site/index'));
	// 	}else{
	// 		return parent::beforeAction($action);
	// 	}
		
	// }
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionInitpermissions()
	{
		$start=0;
		if(isset($_POST['offset'])){
			$start = $_POST['offset'];
		}
		$limit=10;
		$sort='id DESC';
		$roles = Roles::model()->findAll();
		$variable = Groups::model()->findAll();
		$groups = array();
		foreach ($variable as $value) {
			$permissions_arr = array();
			foreach ($value->permissions as $permissions) {
				if($permissions->status == 1){
					array_push($permissions_arr,$permissions->role->id);
				}
			}
			$account_arr = array();
			foreach ($value->accountGroups as $accountGroups) {
				array_push($account_arr,$accountGroups->user);
			}
			array_push(
				$groups, array_merge($value->attributes,
					array(
						'role' => $permissions_arr,
						'account' => $account_arr
						)
			));
		}
		header('Content-type: application/json');
	    echo CJSON::encode(array(
	    	'result'=>TRUE,
	    	'roles'=>$roles, 
	    	'groups'=>$groups, 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function addrole($role) {
		$record = new Roles;
		$record->name = $role['name'];
		$record->key = $role['key'];
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
	public function updaterole($role) {
		if(!isset($role['id'])){
			$this->addrole($role);
		}else{
		$record = Roles::model()->findByPk($role['id']);
		$record->name = $role['name'];
		$record->key = $role['key'];
		$update = array( 'name', 'key');
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
	public function deleterole($role) {
		// $this->writeLog = TRUE;
		$record = Roles::model()->findByPk($role['id']);
		$result = $record;
		$re = $record->delete();
		if($re){				
			Permissions::model()->deleteAll(
			    "role_id = :role_id ",
			    array(':role_id' => $role['id'])
			);
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Xóa thông tin thành công!'));
		}else{
			// $this->key = 0;
			// $this->logMessage= 'Xóa không thành công Tình trạng "'.($account['name']).'"';
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSaverole(){
		// $this->writeLog = TRUE;
		// var_dump(($_POST['account']));
		// die();
		if(isset($_POST['role'])){
			//var_dump(($_POST['account']['control']));
			if($_POST['role']['control'] == '0' || $_POST['role']['control'] == 0){
				$this->addrole($_POST['role']);
			}else if($_POST['role']['control'] == '1' || $_POST['role']['control'] == 1){
				$this->updaterole($_POST['role']);
			}else if($_POST['role']['control'] == '2' || $_POST['role']['control'] == 2){
				$this->deleterole($_POST['role']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function addgroup($group) {
		$record = new Groups;
		$record->group_name = $group['group_name'];
		// $record->key = $group['key'];
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
	public function updategroup($group) {
		if(!isset($group['id'])){
			$this->addgroup($group);
		}else{
		$record = Groups::model()->findByPk($group['id']);
		$record->group_name = $group['group_name'];
		// $record->key = $group['key'];
		$update = array( 'group_name');
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
	public function deletegroup($group) {
		// $this->writeLog = TRUE;
		$record = Groups::model()->findByPk($group['id']);
		$result = $record;
		$re = $record->delete();
		if($re){				
			AccountGroup::model()->deleteAll(
			    "group_id = :group_id ",
			    array(':group_id' => $group['id'])
			);
			Permissions::model()->deleteAll(
			    "group_id = :group_id ",
			    array(':group_id' => $group['id'])
			);
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Xóa thông tin thành công!'));
		}else{
			// $this->key = 0;
			// $this->logMessage= 'Xóa không thành công Tình trạng "'.($account['name']).'"';
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSavegroup(){
		// $this->writeLog = TRUE;
		// var_dump(($_POST['account']));
		// die();
		if(isset($_POST['group'])){
			//var_dump(($_POST['account']['control']));
			if($_POST['group']['control'] == '0' || $_POST['group']['control'] == 0){
				$this->addgroup($_POST['group']);
			}else if($_POST['group']['control'] == '1' || $_POST['group']['control'] == 1){
				$this->updategroup($_POST['group']);
			}else if($_POST['group']['control'] == '2' || $_POST['group']['control'] == 2){
				$this->deletegroup($_POST['group']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionSavepermission()
	{
		if(isset($_POST['role'])){
			$role = array();
			if(isset($_POST['role']) and count($_POST['role']) > 0){
				foreach ($_POST['role'] as  $value) {
					$permissions = Permissions::model()->findByAttributes(array(
						'role_id'=>$value['id'],
						'group_id'=>$_POST['group']
					));
					if($permissions == NULL){
						$permissions = new Permissions;
						$permissions->role_id = $value['id'];
						$permissions->group_id =$_POST['group'];
						$permissions->status = ($value['select'] == 'true') ? 1 : 0;
						$re = $permissions->save();
					}else{
						$permissions->status = ($value['select'] == 'true') ? 1 : 0;
						$re = $permissions->update(array('status'));
					}
					if($re){
						if($permissions->status == 1){
							array_push($role, $value['id']);
						}
					}
				}
			}
			header('Content-type: application/json');			
		    echo CJSON::encode(array('result'=>TRUE, 'role' => $role, 'message'=>'Information have been added successfully!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Have a problem. please try again after some time!'));
		}
	}
}
?>