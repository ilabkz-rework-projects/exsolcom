<?php
namespace Ilab\Kernel\Ilab;

use Ilab\Kernel\General;

class Js
{
	protected static $arSort = [
		'START' => [
			0 => 'jquery'
		],
		'END' => [
			0 => 'function',
			1 => 'functions',
			2 => 'script',
			3 => 'scripts'
		]
	];

	protected static $f = 'js/';

	static public function init(string $p):bool
	{
		$br = '<br>';
		$hr = '----------------------------------------------------------------------------------------------------'.$br;

		// Get
		$res = General\File::GetPath(
			$p.self::$f, 'js', false, true, true, true
		);

		if( !$res )
			return false;

		// Sort
		$res = General\Sort::Map($res['js'], self::$arSort);

		// Asset
		General\Asset::Js($res);

		return true;
	}
}