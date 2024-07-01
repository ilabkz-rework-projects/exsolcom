<?php
namespace Ilab\Kernel\Ilab;

use Ilab\Kernel\General;

class Css
{
	protected static $arSort = [
		'START' => [
			0 => 'reset',
			1 => 'normalize',
			2 => 'main',
			3 => 'style',
			4 => 'snippet',
			5 => 'background',
		]
	];

	public static $exclude = null;

	protected static $f = 'css/';

	static public function init(string $p):bool
	{
		$br = '<br>';
		$hr = '----------------------------------------------------------------------------------------------------'.$br;

		// Get
		$res = General\File::GetPath(
			$p.self::$f, 'css', self::$exclude, true, true, true
		);

		if( !$res )
			return false;

		// Sort
		$res = General\Sort::Map($res['css'], self::$arSort);

		// Asset
		General\Asset::Css($res);

		return true;
	}
}