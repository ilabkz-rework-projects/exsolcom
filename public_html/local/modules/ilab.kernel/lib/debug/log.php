<?php

namespace Ilab\Kernel\Debug;

use Bitrix\Main\Diag\Debug,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\IO\Directory,
	Ilab\Kernel\General\Db\LogTable;

class Log
{
	private static $arDebug = [];


	/** Приватный метод окончания логирования.
	 * Рассчитывает используемую память и время окончания работы скрипта
	 */
	private static function end()
	{
		if(!isset(self::$arDebug['Время окончания']))
		{
			self::$arDebug['Занятая память'] = round(memory_get_usage() / 1048576, 2).' Мб';
			self::$arDebug['Время окончания'] = date("d.m.Y H:i:s");
		}
	}


	/** Метод начала логирования.
	 * Ставит дату начала работы скрипта
	 * Рекомендуется ставить сразу после "use"
	 */
	static function start():void
	{
		if(!isset(self::$arDebug['Время начала']))
		{
			self::$arDebug['Время начала'] = date("d.m.Y H:i:s");
		}
	}


	/** Метод установки метки текущего времени */
	static function setTime():void
	{
		self::$arDebug['Метка времени '.time()] = date("d.m.Y H:i:s");
	}


	/** Метод сбора логов.
	 * Добавляет данные в общий массив логов
	 * @param string $title - заголовок под которым будет сохранен результат лога
	 * @param $data - данные, которые будут сохранены в лог
	 */
	static function add(string $title, $data):void
	{
		self::$arDebug[$title] = $data;
	}


	/** Метод вывода логов
	 * @param bool $toJson - возвращать ответ в виде json. По-умолчанию выводит массив print_r()
	 */
	static function show(bool $toJson = false):void
	{
		self::end();

		if($toJson)
			echo json_encode(self::$arDebug);
		else
		{
			echo '<pre>';
			print_r(self::$arDebug);
			echo '</pre>';
		}
	}


	/** Метод сохранения логов.
	 * Сохраняет лог в файл и очищает лог
	 * @param string $script - скрипт, который вызвал сохранение лога (например __FILE__)
	 * @param string $file - файл от корня сайта "/", куда сохранять результат
	 */
	static function save(string $script, string $file):void
	{
		self::end();

		// проверяем наличие директории
		$dirPath = mb_substr($file, 0, mb_strrpos($file, '/')+1);
		Directory::createDirectory($_SERVER['DOCUMENT_ROOT'].$dirPath);

		Debug::dumpToFile(self::$arDebug, $script, $file);
		self::$arDebug = [];
	}


	/**
	 * Метод сохранения логов в Таблицу ilab_kernel_log.
	 * @param string $script - скрипт, который вызвал сохранение лога, __FILE__
	 * @param string $type - тип лога, для понимания действия например IMPORT CATALOG или EXPORT XML
	 */
	static function saveToDb(string $script, string $type):void
	{
		self::end();

		$data = [
			'DATETIME' => new DateTime(),
			'SCRIPT' => $script,
			'TYPE' => $type,
			'RESULT' => serialize(self::$arDebug)
		];

		LogTable::add($data);

		self::$arDebug = [];
	}


	/** Метод чистит логи из таблицы, которые устарели на $days дней
	 * @param int $days - кол-во дней, старше которых логи удаляются
	 * @return string
	 */
	static function clear(int $days = 30):string
	{
		$arResult = [];
		$count = 0;

		$logs = LogTable::getList([
			'order' => ["ID" => "ASC"],
			'filter' => ['<DATETIME' => \Bitrix\Main\Type\DateTime::createFromUserTime(date("d.m.Y H:s:i", strtotime( "-".$days." day" )))],
			'limit' => 10000,
			'select' => ['ID'],
		]);
		while($arLog = $logs->Fetch())
		{
			LogTable::delete($arLog['ID']);
			$count++;
		}

		$arResult['count'] = $count;

		return json_encode($arResult);
	}
}