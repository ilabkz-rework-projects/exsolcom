<?php
namespace Ilab\Kernel\Ilab;

use Ilab\Kernel\{Ilab, General};
use \Bitrix\Main\Page\Asset;

class Modules
{
	protected static $f = 'modules/';
	protected static $i = '/local/modules/ilab.kernel/lib/ilab/modules/jquery.ilab.js';

	static public function init(string $p)
	{
		$br = '<br><br>';
		$hr = '----------------------------------------------------------------------------------------------------'.$br;

		// Get Dirs
		$res = General\Dirs::List(
			$p.self::$f
		);

		if( !$res )
			return false;

// ---------------------------------------------------------------------------------------------------- *TODO - jquery is initialized
		if( true )
			Asset::getInstance()->addJs(self::$i);// Load js plugin ilab
// ---------------------------------------------------------------------------------------------------- *TODO - jquery is initialized

		// Load css and js
		foreach ($res as $k=>$v)
		{
			Ilab\Css::init($p.self::$f.$v.'/');
			Ilab\Js::init($p.self::$f.$v.'/');
		}
	}
}