<?php

class m160629_134345_addNewsTable extends CDbMigration
{
	public function up()
	{
		$this->createTable('news', [
			'news_id' => 'pk',
			'date' => 'date',
			'theme_id' => 'int',
			'text' => 'text',
			'title' => 'varchar(255)',
		]);
	}

	public function down()
	{
		$this->dropTable('news');
	}
}