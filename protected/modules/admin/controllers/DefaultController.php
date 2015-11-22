<?php

class DefaultController extends Controller
{
	public $layout='//layouts/admin';

	// public function filters(){
	// 	return array(
	// 		'accessControl', // perform access control for CRUD operations
	// 		'postOnly + delete', // we only allow deletion via POST request
	// 	);
	// }
	
	public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions *
                'actions'=>array('index','login','logout'),
                'users'=>array('*'),
            ),
            // array('deny',  // deny all users
            //     'users'=>array('*'),
            // ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}
	/**
	 * Displays the login page
	 */

	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){				
				// if( strpos(Yii::app()->user->returnUrl, 'default') !== false){
					$this->redirect($this->createAbsoluteUrl('default/index'));	
				// }else{
				// 	$this->redirect(Yii::app()->user->returnUrl);
				// }
			}
		}
		
		// display the login form
		$this->render('login',array('model'=>$model));
		// Yii::app()->end();
		// var_dump(isset($_POST['LoginForm']));
		// die();
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect($this->createAbsoluteUrl('default/login'));
		Yii::app()->end();
	}
	public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
                if(Yii::app()->request->isAjaxRequest)
                        echo $error['message'];
                else
                        $this->render('404', $error);
        }
    }
}