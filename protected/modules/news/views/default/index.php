<?php
/* @var $post News */
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Новости'=>array('index'),
);
?>
<div class="span-5 last">
    <div id="sidebar">
        <?php if(empty($_GET['date'])): ?>
        <?php foreach(NewsRepository::getGroupedByYearAndMonth() as $year => $months):?>
            <ul class="year">
                <li>
                    <?= CHtml::link($year, $this->createUrl($this->id.'/index',['date' => $year])); ?>
                    <ul class="month">
                        <?php foreach ($months as $month):?>
                            <li>
                                <a href="<?= $this->createUrl($this->id.'/index',['date' => $year.'-'.NewsRepository::formatMonth($month['month'])])?>"><?= NewsRepository::RUS_MONTH[$month['month']] ?> (<?= $month['count']?>)</a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if(!empty($_GET['date'])): ?>
            <ul>
                <?php foreach(NewsRepository::getGroupedThemesByYear($_GET['date']) as $theme):?>
                    <li><a href="#"><?= $theme['theme_title']?> (<?= $theme['count']?>)</a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div><!-- sidebar -->
</div>
<div class="span-19">
    <div id="content">
        <?php foreach ($posts->getData() as $post):?>
            <h4><?= $post->title?></h4>
            <p><?= $post->date?>, <?= $post->theme->theme_title?></p>
            <p>
                <?= Shorter::get($post->text, 256) ?><br />
                <?= CHtml::link('читать далее', $this->createUrl($this->id.'/view',['id' => $post->news_id])); ?>
            </p>
        <?php endforeach; ?>
        <?php $this->widget('CLinkPager', array(
            'pages' => $posts->pagination,
        ))?>
    </div><!-- content -->
</div>