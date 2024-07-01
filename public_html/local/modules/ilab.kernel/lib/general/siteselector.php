<?php
namespace Ilab\Kernel\General;

use Bitrix\Main\{Application, Web\Cookie, Context};

class SiteSelector
{
	protected static $name = 'setcity';

	function __construct()
	{
		$request = Context::getCurrent()->getRequest();

		if( $request[self::$name] )
			self::requestSite();
		else
			self::setSite( $request->getCookie('I_CITY_ID') ?? Main::GetDefaultSiteID() );
	}

	public static function requestSite()
	{
		$request = Context::getCurrent()->getRequest();
		$context = Application::getInstance()->getContext();

		$cookie = new Cookie('I_CITY_ID', htmlspecialchars($request[self::$name]));
		$cookie->setDomain($context->getServer()->getServerName());

		$context->getResponse()->addCookie($cookie);

		$context->getResponse()->writeHeaders( '' );

		self::setSite($cookie->getValue());// Bitrix\Main\Context::getCurrent()->getSite(); || Ilab\Kernel\General\SiteSelector::getSite();
	}

	public static function getSite()
	{
		return Context::getCurrent()->getSite();
	}

	public static function setSite($s)
	{
		Context::getCurrent()->setSite($s);
	}
}