<?php defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Ilab\Kernel\General;

General\Defines::setDefines(); // define константы

// ---------------------------------------------------------------------------------------------------- iLaB kernel

// No thanks, bitrix, we better will use PSR-4 than your class names convention[More http://www.php-fig.org/psr/psr-4/]
/*Bitrix\Main\Loader::registerAutoLoadClasses('ilab.kernel',
	[
		'Ilab\Kernel\Mynamespace' => '/lib/core.php',
		//...
	]
);*/