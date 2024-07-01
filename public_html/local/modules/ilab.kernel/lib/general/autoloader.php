<?php
namespace Ilab\Kernel\General;

use	Bitrix\Main\Application,
	Ilab\Kernel;

class Autoloader
{
	static public $ilab = 'ilab\\';

	static public function ClassLoadDir($n)
	{
		if(stripos($n, self::$ilab) === false)
			return false;

		$name = $n;
		$docRoot = Application::getDocumentRoot();

		$n = strtolower($n);

		$n = substr(strstr($n, '\\'), 1);

		$n = 'class\\'.$n;

		$n = str_replace('\\', '/', $n);

		$file = false;

		if($n)
			foreach(Kernel\Init::$p as $p)
				if(	file_exists( $f = $docRoot.$p.$n.'.php' ) && is_file($f) )
				{
					$file = $f;
					break;
				}

		$file ? include($file) : die('Fatal error: Class \''.str_replace('/', '\\', $name).'\' not found! ilab module');
	}
}