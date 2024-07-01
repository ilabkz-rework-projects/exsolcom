<?php
namespace Ilab\Kernel\General;

use Ilab\Kernel\General\Configs\Iblock;

class Defines
{
	/** Метод устанавливает define константы */
	public static function setDefines()
	{
		/** массив кодов инфоблоков */
		$arIblock = Iblock::getConfig();

		define('ILAB_IBLOCK', $arIblock);
	}
}
