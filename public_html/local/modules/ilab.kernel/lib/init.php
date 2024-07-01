<?php
namespace Ilab\Kernel;

use Bitrix\Main\{Application, Config};
use Ilab\Kernel\{Ilab, General};

class Init
{
	public static $p;
	public static $t = '/local/templates/';

	public function __construct($path = ['/local/ilab/', SITE_TEMPLATE_PATH.'/ilab/'])
	{
		global $USER;

		/**
		 * Если закрыт сайт и Пользователь не имеет полный доступ к главному модулю
		 */
		if(
			Config\Option::get('main', 'site_stopped')=='Y'
			&&
			!$USER->CanDoOperation('edit_other_settings')
		)
			return false;

		if(General\Main::isPageSection())
		{
			// Load SiteSelector
			new General\SiteSelector;

			// Load folder ilab
			self::$p = (array) $path;
			self::Load();
		}
	}

	public static function AutoLoad()
	{
		new Init();
	}

	/** Метод проверят, запущен ли скрипт под cli режимом */
	public static function isCli():bool
	{
		return (PHP_SAPI == 'cli') ? true : false;
	}

	public static function Load()
	{
		$docRoot = Application::getDocumentRoot();

		foreach(self::$p as $p)
			if( is_dir($docRoot.$p) )
			{
				if(!self::isCli())
				{
					// Load css and js
					Ilab\Css::init($p);
					Ilab\Js::init($p);

					// Load modules/css and modules/js
					Ilab\Modules::init($p);
				}

				// Load class ilab/class
				spl_autoload_register('Ilab\Kernel\General\Autoloader::ClassLoadDir');
			}
	}

	// todo Ready and Dump method
	//public static function Ready(){}
	//public static function Dump(){}
}