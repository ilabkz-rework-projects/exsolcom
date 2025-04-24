<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader,
	Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);

	$res = CIBlockElement::GetList([], ['IBLOCK_ID' => 10], false, false,
		['PROPERTY_I_CONTENT_LINK', 'PROPERTY_I_PREVIEW_TEXT_KZ', 'PROPERTY_I_PREVIEW_TEXT_EN', 'ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PREVIEW_TEXT', "CODE"]
	);

	$arResult = [];
	$arYear = [];
	$found = false;

	while($ob = $res->Fetch())
	{
		if($getData['id'] == $ob['CODE']){

			$found = true;

			$arResult['NAME'] = $ob['NAME'];
			$arResult['CODE'] = $ob['CODE'];

			if($getData['language'] === 'ru' ){
				$arResult['CONTENT'] = $ob['PREVIEW_TEXT'];
			}elseif($getData['language'] === 'en' ) {
				$arResult['CONTENT'] = $ob['PROPERTY_I_PREVIEW_TEXT_EN_VALUE']['TEXT'];
			}else{
				$arResult['CONTENT'] = $ob['PROPERTY_I_PREVIEW_TEXT_KZ_VALUE']['TEXT'];
			}

			$arResult['status'] = true;
		}
		$arYear[$ob["CODE"]] = $ob;
	}

	file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/test.txt', print_r($arYear[2025], true));


	if($found === false){
		$arResult['status'] = false;
		$arResult['NAME'] = $arYear[2025]['NAME'];
		$arResult['CODE'] = $arYear[2025]['CODE'];

		if($getData['language'] === 'ru' ){
			$arResult['CONTENT'] = $arYear[2025]['PREVIEW_TEXT'];
		}elseif($getData['language'] === 'en' ) {
			$arResult['CONTENT'] = $arYear[2025]['PROPERTY_I_PREVIEW_TEXT_EN_VALUE']['TEXT'];
		}else{
			$arResult['CONTENT'] = $arYear[2025]['PROPERTY_I_PREVIEW_TEXT_KZ_VALUE']['TEXT'];
		}
	}

	print_r(json_encode($arResult));

} else {
	echo "Ошибка: Недействительный запрос";
}



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");




