<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader;
use Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);
	$IBLOCK_ID = $getData['iblock_id'] ?? 9;

	$res = CIBlockElement::GetList(
		[],
		[
			'IBLOCK_ID' => $IBLOCK_ID,
			'CODE' => $getData['code']
		],
		false,
		false,
		[
			'PROPERTY_I_CONTENT_LINK',
			'PROPERTY_I_CONTENT_LINK_EN',
			'PROPERTY_I_CONTENT_LINK_KZ',
			'ID',
			'CODE',
			'NAME',
			'PREVIEW_PICTURE',
			'DETAIL_PICTURE',
			'PREVIEW_TEXT',
			'PROPERTY_I_PRICE'
		]
	);

	$arResult = [];

	if ($ob = $res->Fetch()) {
		$lang = $getData['language'] ?? 'ru';
		$propKey = 'PROPERTY_I_CONTENT_LINK';
		if ($lang === 'en') $propKey .= '_EN';
		elseif ($lang === 'kz') $propKey .= '_KZ';

		$path = $_SERVER["DOCUMENT_ROOT"] . ($ob[$propKey.'_VALUE'] ?? '');
		$arResult['CONTENT_LINK'] = $ob[$propKey.'_VALUE'] ?? '';
		$arResult['CONTENT'] = file_exists($path) ? file_get_contents($path) : '';
		$arResult['PRICE'] = $ob['PROPERTY_I_PRICE_VALUE'];
		$arResult['NAME'] = $ob['NAME'];
		$arResult['IMAGE'] = CFile::GetPath($ob['PREVIEW_PICTURE']);
		$arResult['PREVIEW_TEXT'] = $ob['PREVIEW_TEXT'];
		$arResult['CODE'] = $ob['CODE'];
	}

	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($arResult);

} else {
	echo "Ошибка: Недействительный запрос";
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
