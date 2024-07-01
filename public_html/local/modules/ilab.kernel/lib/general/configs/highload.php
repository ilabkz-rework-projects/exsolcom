<?php
namespace Ilab\Kernel\General\Configs;

use Bitrix\Main\{Application, Loader, IO};
use Bitrix\Highloadblock\HighloadBlockTable as HL;

class Highload
{
	protected static $config = '/ilab/config/highloads.json';

	/** Метод возвращает массив highload-блоков типа:

		$result = [
			'NAME' => 'TABLE_NAME',
			...
		]
	*/
	static public function getHighloadBlocks()
	{
		if( !Loader::includeModule('highloadblock') )
			return false;

		$result = [];

		$res = HL::getList();

		while( $object = $res->fetch() )
			$result[ $object['NAME'] ] = $object['TABLE_NAME'];

		unset( $res, $object );

		return $result;
	}

	/**
	 * Метод формирования списка highload-блоков в файл json представления
	 * Путь до файла: /ilab/config/highloads.json
	*/
	static public function updateConfig():void
	{
		$arHighloadBlocks = self::getHighloadBlocks();

		$fileConfig = new IO\File( Application::getDocumentRoot() . self::$config  );

		$dirConfig = $fileConfig->getDirectoryName();

		if( !IO\Directory::isDirectoryExists( $dirConfig ) )
			IO\Directory::createDirectory( $dirConfig );

		$fileConfig->putContents( json_encode( $arHighloadBlocks  ) );
	}
}