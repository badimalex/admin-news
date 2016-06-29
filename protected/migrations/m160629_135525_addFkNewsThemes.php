<?php

class m160629_135525_addFkNewsThemes extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_news_themes', 'news', 'theme_id', 'themes', 'theme_id', 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('FK_news_themes', 'news');
	}
}