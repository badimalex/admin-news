<?php

class DefaultController extends Controller
{
	public $layout='//layouts/column-left';

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionIndex()
	{
		$model = new News('search');

		$this->setSearchParams(['date', 'theme_id'], $model);

		$posts = $model->search();
		$this->render('index', compact('posts'));
	}

	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	function setSearchParams($params, $model) {
		foreach ($params as $param) {
			if(!empty($_GET[$param])) {
				$model->$param = $_GET[$param];
			}
		}
	}

}
