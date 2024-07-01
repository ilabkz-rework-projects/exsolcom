<?php
namespace Ilab\Kernel\General\Configs;

use Bitrix\Main\{Application, Loader, IO};
use \Bitrix\Iblock\IblockTable;

class Iblock
{

	protected static $config = '/ilab/config/iblocks.json';

	/** Метод возвращает массив информационных блоков типа:

		$result = [
			'CODE' => 'ID',
			...
		]
	*/
	static public function getIblocks()
	{
		if( !Loader::includeModule('iblock') )
			return false;

		$result = [];

		$res = IblockTable::getList([
			'select' => [
				'ID',
				'CODE'
			]
		]);

		while( $object = $res->fetch() )
			$result[ $object['CODE'] ] = $object['ID'];

		unset( $res, $object );

		return $result;
	}

	/** Метод формирования списка информационных блоков в файл json представления
	 * Путь до файла: /ilab/config/iblocks.json
	*/
	static public function updateConfig():void
	{
		$arIblocks = self::getIblocks();

		$fileConfig = new IO\File( Application::getDocumentRoot() . self::$config  );

		$dirConfig = $fileConfig->getDirectoryName();

		if( !IO\Directory::isDirectoryExists( $dirConfig ) )
			IO\Directory::createDirectory( $dirConfig );

		$fileConfig->putContents( json_encode( $arIblocks  ) );
	}

	/** Метод достает из config файла json и возвращает массив */
	static public function getConfig():array
	{
		$fileConfig = new IO\File( Application::getDocumentRoot() . self::$config  );

		if(!$fileConfig->isExists())
			self::updateConfig();

		$arResult = json_decode($fileConfig->getContents(), true);

		return (is_array($arResult)) ? $arResult : [];
	}

}