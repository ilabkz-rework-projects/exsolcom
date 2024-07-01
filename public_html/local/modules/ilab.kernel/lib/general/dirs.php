<?php
namespace Ilab\Kernel\General;

use Bitrix\Main\Application;

class Dirs
{
	public static function List(string $path)
	{
		$docRoot = Application::getDocumentRoot();

		if( $path && file_exists($docRoot.$path) )
		{
			// directories
			$root = array_diff(scandir($docRoot.$path), ['..', '.']);

			foreach($root as $f)
				if( is_dir($docRoot.$path.$f) )
					$result[] = $f;

			unset($f);

			return $result;
		}
		else
			return false;
	}
}