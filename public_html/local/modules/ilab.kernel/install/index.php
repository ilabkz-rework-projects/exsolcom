<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\EventManager,
	Bitrix\Main\Loader,
	Ilab\Kernel\General\Main;

Loc::loadMessages(__FILE__);

Class ilab_kernel extends CModule
{
	function __construct()
	{
		$arModuleVersion = [];

		include(__DIR__.'/version.php');

		$this->MODULE_ID = 'ilab.kernel';
		$this->MODULE_VERSION = $arModuleVersion['VERSION'];
		$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
		$this->MODULE_NAME = Loc::getMessage('ILAB_KERNEL_MODULE_NAME');
		$this->MODULE_DESCRIPTION = Loc::getMessage('ILAB_KERNEL_MODULE_DESCRIPTION');

		$this->PARTNER_NAME = Loc::getMessage('ILAB_KERNEL_PARTNER_NAME');
		$this->PARTNER_URI = Loc::getMessage('ILAB_KERNEL_PARTNER_URI');
		$this->MODULE_SORT = 1;
	}

	function InstallDB()
	{
		global $DB;

		$this->errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"].Main::dirIs()."/modules/ilab.kernel/install/db/install.sql");

		return ($this->errors !== false) ? $this->errors : true;
	}

	function UnInstallDB()
	{
		global $DB;

		$this->errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"].Main::dirIs()."/modules/ilab.kernel/install/db/uninstall.sql");

		return ($this->errors !== false) ? $this->errors : true;
	}

	public function InstallEvents()
	{
		EventManager::getInstance()->registerEventHandler(
			'main',
			'OnProlog',
			$this->MODULE_ID,
			'Ilab\Kernel\Init',
			'AutoLoad'
		);
		EventManager::getInstance()->registerEventHandler(
			'iblock',
			'OnAfterIBlockUpdate',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnAfterIBlockUpdate'
		);
		EventManager::getInstance()->registerEventHandler(
			'iblock',
			'OnIBlockDelete',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnIBlockDelete'
		);
		EventManager::getInstance()->registerEventHandler(
			'iblock',
			'OnAfterIBlockAdd',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnAfterIBlockAdd'
		);

		return true;
	}

	public function UnInstallEvents()
	{
		EventManager::getInstance()->unRegisterEventHandler(
			'main',
			'OnProlog',
			$this->MODULE_ID,
			'Ilab\Kernel\Init',
			'AutoLoad'
		);
		EventManager::getInstance()->unRegisterEventHandler(
			'iblock',
			'OnAfterIBlockUpdate',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnAfterIBlockUpdate'
		);
		EventManager::getInstance()->unRegisterEventHandler(
			'iblock',
			'OnIBlockDelete',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnIBlockDelete'
		);
		EventManager::getInstance()->unRegisterEventHandler(
			'iblock',
			'OnAfterIBlockAdd',
			$this->MODULE_ID,
			'Ilab\Kernel\General\Handlers',
			'OnAfterIBlockAdd'
		);

		return true;
	}

	public function DoInstall()
	{
		ModuleManager::registerModule($this->MODULE_ID);
		Loader::includeModule($this->MODULE_ID);

		if($this->InstallDB())
			$this->InstallEvents();
	}

	public function DoUninstall()
	{
		Loader::includeModule($this->MODULE_ID);

		$this->UnInstallDB();
		$this->UnInstallEvents();

		ModuleManager::unRegisterModule($this->MODULE_ID);
	}
}