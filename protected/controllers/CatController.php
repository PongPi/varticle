<?php

class CatController extends Controller {
	public $layout = 'single';

	public $title = '';
	public $tinTucSuKienCatId = 2;
	public $newsEvent = array();
	public $desc = '';

	public function beforeAction() {
		return true;
	}

	public function actionIndex($id = 0) {
		$id = (int) $id;
		$params = array();

		if (($params['catInfo'] = Catalogue::model()->findByPk($id)) == NULL) {
			return $this->redirect($this->createUrl('cat/view'));
		}
		
		$params['posts'] = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $id,
			'order' => 'id DESC', 
			'limit' => 6,
		));


		$params['newsEvent'] = array(); // Tin tuc, su kien
		$params['newsEvent'] = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tinTucSuKienCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		$this->title = $params['catInfo']->cat_name;
		$this->newsEvent = $params['newsEvent'];


		foreach($params['newsEvent'] as & $post) {
			$post->post_cat = Catalogue::model()->findByPk($post->id);
		}


		$this->render('index', $params);
	}

	public function actionView() {
		$params = array();

		$params['cats'] = Catalogue::model()->findAll();

		$this->render('view', $params);
	}
}