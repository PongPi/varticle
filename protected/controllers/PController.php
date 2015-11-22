<?php 
class PController extends Controller {
	public $layout = 'single';

	public $title = '';
	public $tinTucSuKienCatId = 2;
	public $newsEvent = array();
	public $desc = '';

	public function actionIndex() {
		return $this->render('index');
	}

	public function beforeAction() {
		$this->newsEvent = Posts::model()->findAll(array(
			'condition' => 'post_cat = ' . $this->tinTucSuKienCatId,
			'order' => 'id DESC', 
			'limit' => 6,
		));

		return true;
	}

	public function actionContact() {
		$params = array();
		$this->title = 'Contact';

		return $this->render('contact', $params);
	}

	public function actionMaps() {
		$params = array();
		$this->title = 'Maps';

		return $this->render('maps', $params);
	}

	public function actionVideo() {
		$params = array();
		$this->title = 'Phim VNU20';

		return $this->render('video', $params);
	}

	public function actionSlider() {
		$this->layout = 'blank';
		$params = array();

		$params['sliders'] = Slider::model()->findAll();

		return $this->render('slider', $params);
	}
}