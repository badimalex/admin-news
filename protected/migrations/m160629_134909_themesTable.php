<?php

class m160629_134909_themesTable extends CDbMigration
{
	const M_TABLE_NAME = 'themes';

	public function up()
	{
		$items = [
			'Наука',
			'Спорт',
			'Интернет',
			'Авто',
			'Глямур',
			'Искусство',
		];

		$this->createTable(self::M_TABLE_NAME, array(
			'theme_id' => 'pk',
			'theme_title' => 'string',
		));

		foreach($items as $item) {
			$this->insert(self::M_TABLE_NAME, [ 'theme_title' => $item]);
		}
	}

	public function down()
	{
		$this->dropTable(self::M_TABLE_NAME);
	}
}