<?php
namespace Ilab\Kernel\General;

use Ilab\Kernel\General\Configs\Iblock;
use Ilab\Kernel\General\Configs\Highload;

class Handlers
{
	/** Инфоблоки */
	static function OnAfterIBlockUpdate(&$arFields)
	{
		Iblock::updateConfig();
	}
	static function OnIBlockDelete(&$arFields)
	{
		Iblock::updateConfig();
	}
	static function OnAfterIBlockAdd(&$arFields)
	{
		Iblock::updateConfig();
	}

	/** Highload-блоки */
	/*function OnAfterIBlockUpdate(&$arFields)
	{
		Highload::updateConfig();
	}
	function OnIBlockDelete(&$arFields)
	{
		Highload::updateConfig();
	}
	function OnAfterIBlockAdd(&$arFields)
	{
		Highload::updateConfig();
	}*/
}
