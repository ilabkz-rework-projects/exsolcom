<?php
namespace Ilab\Kernel\General\Db;

use Bitrix\Main\Entity;

class LogTable extends Entity\DataManager
{
	public static function getTableName()
	{
		return 'ilab_kernel_log';
	}

	public static function getMap()
	{
		return [
			new Entity\IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true,
			]),
			new Entity\DatetimeField('DATETIME'), // Дата время сохранения лога
			new Entity\StringField('SCRIPT'), // Скрипт, где собирался лог
			new Entity\StringField('TYPE'), // Тип лога или уникальный код
			new Entity\TextField('RESULT'), // Результат выполнения в serialize формате
		];
	}
}