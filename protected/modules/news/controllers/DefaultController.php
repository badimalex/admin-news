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
		if(!empty($_GET['date'])) {
			$model->date = $_GET['date'];
		}
		$model = $model->search()->getData();
		$this->render('index', compact('model'));
	}

	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
