<?php
namespace Ilab\Kernel\General;

use Bitrix\Main\{Application, Context, ModuleManager, Loader};

class Main
{
	// Multidimensional arguments for functions
	public static function ma(&$a)
	{
		if( (count($a, COUNT_RECURSIVE)-count($a))==0 )
			$a = [$a];
		elseif( $a )
			$a = array_values($a);
	}

	public static function InDir($strDir)
	{
		$uri = Context::getCurrent()->getServer()->getRequestUri();

		if( substr($uri, -1, 1)=='/' )
			$uri .= 'index.php';

		return (substr($uri, 0, strlen($strDir))==$strDir);
	}

	/**
	 * Метод используется для идентификации административного раздела сайта /bitrix/admin/.
	 * Возвращает true если в этом разделе, и false в остальных случаях
	 */
	public static function isAdminSection()
	{

		return Context::getCurrent()->getRequest()->isAdminSection();
	}

	public static function isPageSection()
	{
		return !Context::getCurrent()->getRequest()->isAdminSection();
	}

	public static function GetDefaultSite()
	{
		$rs = \CSite::GetList($by='sort', $order='desc', ['DEFAULT'=>'Y']);

		if($arSite = $rs->Fetch())
			return $arSite;
		else
			return false;
	}

	/**
	 *  ID сайта по умолчанию
	 */
	public static function GetDefaultSiteID()
	{
		return self::GetDefaultSite()['ID'];
	}

	/**
	 * Путь до текущего файла
	 */
	public static function GetPatch($notDocumentRoot=false)
	{
		$docRoot = Application::getDocumentRoot();

		if( $notDocumentRoot )
			return str_ireplace($docRoot, '', dirname(__DIR__));
		else
			return dirname(__DIR__);
	}

	/**
	 * Проверка версии главного модуля Bitrix на ядро D7
	 */
	public static function isVersionD7()
	{
		return CheckVersion(ModuleManager::getVersion('main'), '14.00.00');// либо константа SM_VERSION
	}

	/** Метод возвращает директорию нахождения модуля /local или /bitrix
	 * @return string
	 */
	public static function dirIs():string
	{
		$str = '';

		if(strpos(__DIR__, '/local/modules/ilab.kernel/'))
			$str = '/local';

		if(strpos(__DIR__, '/bitrix/modules/ilab.kernel/'))
			$str = '/bitrix';

		return $str;
	}
}