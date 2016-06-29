<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News',
);

$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h1>News</h1>
<?php
foreach($list as $year => $months)
{
	// Show year
	echo "<ul class='year'><li><a>{$year}</a>";

	// Month container
	echo "<ul class='months'>";

   // Get months
   foreach($months as $month)
   {
	   echo "<li><a>{$month}</a></li>";
   }

   // Close Month/Year containers
   echo("</ul></li></ul>");
}
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
