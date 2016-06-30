<?php

class NewsRepository
{
    static function getGroupedByYearAndMonth()
    {
        $sql = "SELECT Year(date) AS year,
                       Month(date) AS month,
                       count(*) AS count
                FROM news
                GROUP BY MONTH(date)
                ORDER BY YEAR DESC";
        $news = Yii::app()->db->createCommand($sql)->queryAll();
        $list=[];
        foreach ($news as $i) {
            $list[$i['year']][]=$i;
        }
        return $list;
    }
}