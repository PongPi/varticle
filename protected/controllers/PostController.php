<?php

class PostController extends Controller {
	public $layout = 'single';

	public $title = '';
	public $tinTucSuKienCatId = 2;
	public $newsEvent = array();
	public $desc = '';

	public function actionIndex($id = 0) {
		$id = (int) $id;
		$params = array();

		$params['post'] = Posts::model()->findByPk($id);
		if ($params['post'] == NULL || $params['post']->post_status != 1) {
			return $this->render('//layouts/404');
		}

		if ($params['post']->post_type == 'link') {
			$url = trim($params['post']->post_content);
			return $this->redirect(urldecode($url));
		}

		$params['newsEvent'] = array(); // Tin tuc, su kien
		$params['newsEvent'] = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tinTucSuKienCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		$params['metas'] = Meta::model()->findAll(array(
			'condition' => 'post_id = ' . $id . ' AND meta_status = 1',
		));

		$this->title = $params['post']->post_title;
		$this->newsEvent = $params['newsEvent'];

		$params['lastedPost'] = Posts::model()->findAll(array(
			'limit'=>5,
			'condition'=>'post_status=1',
		));

		$params['catInfo'] = Catalogue::model()->findByPk($params['post']->post_cat);

		$this->render('index', $params);
	}
}