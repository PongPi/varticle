<?php

class HomepageController extends Controller {
	public $layout = 'homepage';

	public $tinTucSuKienCatId = 2;
	public $hoiNghiHoiThaoId = 3;
	public $tapChiId = 7;

	public $denyHomepagePostCatId = 1;

	public function actionIndex() {
		$params = array();
		
		$params['newsEvent'] = array(); // Tin tuc, su kien
		$params['newsEvent'] = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tinTucSuKienCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		$params['newsPost'] = array(); 
		$params['newsPost'] = Posts::model()->findAll(array(
			'condition' => 'post_status = 1 AND post_cat != ' . $this->denyHomepagePostCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));


		$params['tapChi'] = array(); 
		$params['tapChi'] = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tapChiId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		$this->render('index', $params);
	}
}