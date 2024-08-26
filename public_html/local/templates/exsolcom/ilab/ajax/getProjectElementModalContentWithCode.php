<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader,
	Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);

	$res = CIBlockElement::GetList([], ['IBLOCK_ID' => $getData['iblockId']], false, false, ['PROPERTY_I_CONTENT_LINK', 'CODE', 'ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_I_PROGRAMM_LINK']);
	$arResult = [];

	while($ob = $res->Fetch())
	{
		if($getData['code'] == $ob['CODE']){
			$arResult['PROPERTY'] = $ob['PROPERTY_I_CONTENT_LINK_VALUE'];
			$arResult['CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$ob['PROPERTY_I_CONTENT_LINK_VALUE']);
			$arResult['NAME'] = $ob['NAME'];
			$arResult['IMAGE'] = CFile::GetPath($ob['PREVIEW_PICTURE']);
			$arResult['PREVIEW_TEXT'] = $ob['PREVIEW_TEXT'];
		}
	}


	print_r(json_encode($arResult));

} else {
	echo "Ошибка: Недействительный запрос";
}



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");




