<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader,
	Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);

	$res = CIBlockElement::GetList([], ['IBLOCK_ID' => 3], false, false, ['PROPERTY_I_CONTENT_LINK', 'ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE']);
	$arResult = [];

	while($ob = $res->Fetch())
	{
		if($getData['id'] == $ob['ID']){
			$arResult['PROPERTY'] = $ob['PROPERTY_I_CONTENT_LINK_VALUE'];
			$arResult['CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$ob['PROPERTY_I_CONTENT_LINK_VALUE']);
			$arResult['NAME'] = $ob['NAME'];
			$arResult['IMAGE'] = CFile::GetPath($ob['PREVIEW_PICTURE']);
		}
	}


	print_r(json_encode($arResult));

} else {
	echo "Ошибка: Недействительный запрос";
}



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");




