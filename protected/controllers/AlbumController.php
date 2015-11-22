<?php

class AlbumController extends Controller {
	public $layout = 'single';
	public $title = 'Album';
	public $tinTucSuKienCatId = 2;
	public $newsEvent = array();

	public function beforeAction() {
		$this->newsEvent = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tinTucSuKienCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		return true;
	}

	public function actionIndex($id = 0) {
		$params = array();

		$id = (int) $id;
		if (($params['albumInfo'] = Albums::model()->findByPk($id)) == false) {
			// View list of albums
			$params['albums'] = Albums::model()->findAll();
			return $this->render('index', $params);
		}

		// View album 
		$params['photos'] = Photos::model()->findAll(array(
			'condition' => 'album_id = :album_id',
			'params' => array(':album_id' => $id),
		));

		// shuffle it 
		if (is_array($params['photos'])) 
			@shuffle($params['photos']); 

		$this->render('view', $params);
	}
}