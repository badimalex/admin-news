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
		$news = Yii::app()->db->createCommand("select Year(date) as year, Month(date) as month,  count(*) as count from news group by MONTH(date) order by year DESC")->queryAll();
		$list=[];
		echo '<pre>';

		foreach ($news as $i) {
			$list[$i['year']][]=$i;
		}
		foreach ($list as $i=>$year) {
			$list[$i]['months']=[];
			foreach ($year as $item) {
				$list[$i]['months'][]=$item['month'];
			}
		}
		print_r($list);
		die;
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'list'=>$list
		));
	}

	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
