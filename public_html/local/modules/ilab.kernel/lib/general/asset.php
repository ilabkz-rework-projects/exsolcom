<?php
namespace Ilab\Kernel\General;

use	Bitrix\Main\Page\Asset as A;

class Asset
{
	static public function Css($arFiles)
	{
		if($arFiles)
		{
			foreach ($arFiles as $f)
				A::getInstance()->addCss($f);

			return true;
		}
		else
			return false;
	}

	static public function Js($arFiles)
	{
		if($arFiles)
		{
			foreach ($arFiles as $f)
				A::getInstance()->addJs($f);

			return true;
		}
		else
			return false;
	}
}