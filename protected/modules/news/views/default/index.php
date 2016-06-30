<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="span-5 last">
    <div id="sidebar">
        <?php foreach(NewsRepository::getGroupedByYearAndMonth() as $year => $months):?>
            <ul class="year">
                <li>
                    <a href="#"><?= $year?></a>
                    <ul class="month">
                        <?php foreach ($months as $month):?>
                            <li><a href="#"><?= $month['month']?> (<?= $month['count']?>)</a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        <?php endforeach; ?>
    </div><!-- sidebar -->
</div>
<div class="span-19">
    <div id="content">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
        )); ?>
    </div><!-- content -->
</div>