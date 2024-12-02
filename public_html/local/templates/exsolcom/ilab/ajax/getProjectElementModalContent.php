<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader,
	Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);

	$res = CIBlockElement::GetList([], ['IBLOCK_ID' => $getData['iblockId']], false, false,
		['PROPERTY_I_CONTENT_LINK', 'PROPERTY_I_CONTENT_LINK_KZ', 'PROPERTY_I_CONTENT_LINK_EN', 'CODE', 'ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_I_PROGRAMM_LINK']
	);
	$arResult = [];

	while($ob = $res->Fetch())
	{
		if($getData['id'] == $ob['ID']){
			if($getData['language'] === 'ru' ){
				$arResult['PROPERTY'] = $ob['PROPERTY_I_CONTENT_LINK_VALUE'];
				$arResult['CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$ob['PROPERTY_I_CONTENT_LINK_VALUE']);
			}elseif($getData['language'] === 'en' ){
				$arResult['PROPERTY'] = $ob['PROPERTY_I_CONTENT_LINK_EN_VALUE'];
				$arResult['CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$ob['PROPERTY_I_CONTENT_LINK_EN_VALUE']);
			}else{
				$arResult['PROPERTY'] = $ob['PROPERTY_I_CONTENT_LINK_KZ_VALUE'];
				$arResult['CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$ob['PROPERTY_I_CONTENT_LINK_KZ_VALUE']);
			}
			$arResult['NAME'] = $ob['NAME'];
			$arResult['IMAGE'] = CFile::GetPath($ob['PREVIEW_PICTURE']);
			$arResult['PREVIEW_TEXT'] = $ob['PREVIEW_TEXT'];
			$arResult['CODE'] = $ob['CODE'];

			$resProgramm = CIBlockElement::GetList([], ['IBLOCK_ID' => 9, 'ID' => $ob['PROPERTY_I_PROGRAMM_LINK_VALUE']], false, false, ['PROPERTY_I_CONTENT_LINK', 'ID', 'CODE' , 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_I_PRICE']);

			while($programmOb = $resProgramm->Fetch()){
				$arResult['PROGRAMM_LINK'] = $programmOb['CODE'];
			}
		}
	}


	print_r(json_encode($arResult));

} else {
	echo "Ошибка: Недействительный запрос";
}



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");




