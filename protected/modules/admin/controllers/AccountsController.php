<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
class AccountsController extends Controller
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
	public function actionAccountlogin()
	{
		$accounts_model = Accounts::model()->findByPk(Yii::app()->user->id);
		$accounts = array();
		if($accounts_model){
			$accounts = array(
				'role' => Yii::app()->user->role,
				);
		}else{
			$accounts =  array('role' => array());
		}
		header('Content-type: application/json');
	    echo CJSON::encode(array(
	    	'result'=>TRUE,
	    	'record'=>$accounts, 
	    	
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function getaccountgroup($account)
	{
		$accountgroup = array();
		foreach ($account->accountGroups as $groups) {
			if($groups->status == 1){
				array_push($accountgroup,$groups->group_id);
			}
		}
		return $accountgroup;
	}
	public function actionInitaccount()
	{
		$start=0;
		if(isset($_POST['offset'])){
			$start = $_POST['offset'];
		}
		$limit=10;
		$sort='id DESC';
		$accounts_model = Accounts::model()
			->findAll(
				array(
					'condition'=>'t.status <> 2',
					'order' => $sort,
					'offset' => $start,
			    	'limit' => $limit,
				)
			);
		$accounts = array();
		foreach ($accounts_model as $value) {
			// $accountgroup = $this->getaccountgroup($value);//array();
			array_push(
				$accounts, array_merge($value->attributes,
					array(
						'accountgroup' => $this->getaccountgroup($value),
						)
			));
		}
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
			array_push(
				$groups, array_merge($value->attributes,
					array(
						'role' => $permissions_arr,
						)
			));
		}
		header('Content-type: application/json');
	    echo CJSON::encode(array(
	    	'result'=>TRUE,
	    	'record'=>$accounts, 
	    	'roles'=>$roles, 
	    	'groups'=>$groups, 
	    	'message'=>''
	    ));
	    Yii::app()->end(); // equal to die() or exit() function
	}
	public function addaccount($account) {
		$record = new Accounts;
		$record->username = $account['username'];
		$record->name = $account['name'];
		$record->email = $account['email'];
		$record->status = 1;
		$record->password = md5($account['password']);

		$re = $record->save();
		if($re){
			// $this->key = 0;
			// $this->logMessage= 'Thêm thành công Tình trạng "'.($record->name).'"';
			header('Content-type: application/json');
			$result = array_merge($record->attributes,
					array(
						'accountgroup' => $this->getaccountgroup($record),
						));
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Thêm thông tin thành công!'));
		}else{
			// $this->key = 0;
			// $this->logMessage= 'Thêm không thành công Tình trạng "'.($record->name).'"';
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Thêm thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function updateaccount($account) {

		// $this->writeLog = TRUE;
		//var_dump(isset($account['id']));
		if(!isset($account['id'])){
			$this->addaccount($account);
		}else{
		$record = Accounts::model()->findByPk($account['id']);
		$record->username = $account['username'];
		$record->name = $account['name'];
		$record->email = $account['email'];
		// $record->password = md5($account['password']);
		$update = array('username', 'name', 'email');
		if(isset($account['password']) and !empty($account['password'])){
			$record->password = md5($account['password']);	
			array_push($update, 'password');
		}
		$re = $record->update($update);
		if($re){
			header('Content-type: application/json');
			$result = array_merge($record->attributes,
					array(
						'accountgroup' => $this->getaccountgroup($record),
						));
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Cập nhật thông tin không thành công!'));
			Yii::app()->end();
		}}
	}
	public function deleteaccount($account) {
		// $this->writeLog = TRUE;
		$record = Accounts::model()->findByPk($account['id']);
		$record->status = 2;
		$update = array('status');
		$re = $record->update($update);
		// $account = $record;
		// $re = $record->delete();
		if($re){
				
			// $this->key = 0;
			// $this->logMessage= 'Xóa thành công Tình trạng "'.($account['name']).'"';
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

	public function actionSaveaccount(){
		if(isset($_POST['account'])){
			//var_dump(($_POST['account']['control']));
			if($_POST['account']['control'] == '0' || $_POST['account']['control'] == 0){
				$this->addaccount($_POST['account']);
			}else if($_POST['account']['control'] == '1' || $_POST['account']['control'] == 1){
				$this->updateaccount($_POST['account']);
			}else if($_POST['account']['control'] == '2' || $_POST['account']['control'] == 2){
				$this->deleteaccount($_POST['account']);
			}
	
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Quá trình xử lý có một vấn đề. Vui lòng thử lại sau!'));
		}
	}
	public function actionUsesaccount(){
		if(isset($_POST['account'])){	
			$record = Accounts::model()->findByPk($_POST['account']);
			$record->status = $_POST['status'];
			$update = array( 'status');
			$re = $record->update($update);
			if($re){
				header('Content-type: application/json');
				$result = array_merge($record->attributes,
					array(
						'accountgroup' => $this->getaccountgroup($record),
						));
				echo CJSON::encode(array(
				'result'=>TRUE,
				'record'=> $result,//$record, 
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
	public function addgroup($group) {
		$record = new Groups;
		$record->group_name = $group['group_name'];
		$re = $record->save();
		if($re){
			header('Content-type: application/json');
			$result = array_merge($record->attributes, array('role' =>array()));
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Thêm thông tin thành công!'));
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
		$update = array( 'group_name');
		$re = $record->update($update);
		if($re){
			$permissions_arr = array();
			foreach ($record->permissions as $permissions) {
				if($permissions->status == 1){
					array_push($permissions_arr,$permissions->role->id);
				}
			}
			$result = array_merge($record->attributes, array('role' =>$permissions_arr));
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>TRUE,'record'=>$result, 'message'=>'Cập nhật thông tin thành công!'));
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
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Xóa thông tin không thành công!'));
			Yii::app()->end();
		}
	}
	public function actionSavegroup(){
		if(isset($_POST['group'])){
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
	public function actionSaveaccountgroup()
	{
		if(isset($_POST['account'])){
			$group = array();
			if(isset($_POST['accountgroup']) and count($_POST['accountgroup']) > 0){
				foreach ($_POST['accountgroup'] as  $value) {
					$accountgroup = AccountGroup::model()->findByAttributes(array(
						'group_id'=>$value['id'],
						'user_id'=>$_POST['account']
					));
					if($accountgroup == NULL){
						$accountgroup = new AccountGroup;
						$accountgroup->group_id = $value['id'];
						$accountgroup->user_id =$_POST['account'];
						$accountgroup->status = ($value['select'] == 'true') ? 1 : 0;
						$re = $accountgroup->save();
					}else{
						$accountgroup->status = ($value['select'] == 'true') ? 1 : 0;
						$re = $accountgroup->update(array('status'));
					}
					if($re){
						if($accountgroup->status == 1){
							array_push($group, $value['id']);
						}
					}
				}
			}
			header('Content-type: application/json');			
		    echo CJSON::encode(array('result'=>TRUE, 'accountgroup' => $group, 'message'=>'Information have been added successfully!'));
		}else{
			header('Content-type: application/json');
			echo CJSON::encode(array('result'=>FALSE, 'message'=>'Have a problem. please try again after some time!'));
		}
	}
}
?>