<?php

class NewsRepository
{
    const RUS_MONTH = [
        1 => "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"
    ];

    static function getGroupedByYearAndMonth()
    {
        $sql = "SELECT Year(date) AS year,
                       Month(date) AS month,
                       count(*) AS count
                FROM news
                GROUP BY YEAR(date), MONTH(date)
                ORDER BY YEAR DESC";
        $news = Yii::app()->db->createCommand($sql)->queryAll();
        $list = [];
        foreach ($news as $i) {
            $list[$i['year']][] = $i;
        }
        return $list;
    }

    static function getGroupedThemesByYear($year)
    {
        $sql = "SELECT news.theme_id, 
                       theme_title,
					   count(*) as count
				FROM news
				LEFT JOIN themes ON news.theme_id=themes.theme_id
				WHERE date LIKE :date
				GROUP BY news.theme_id";
        $command = Yii::app()->db->createCommand($sql);
        $date = "%" . substr($year, 0, 4) . "%";
        $command->bindParam(":date", $date, PDO::PARAM_STR);
        return $command->queryAll();
    }

    static function formatMonth($month)
    {
        return (strlen($month) > 1) ? $month : '0' . $month;
    }
}