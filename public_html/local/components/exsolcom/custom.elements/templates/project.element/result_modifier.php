<?
use \Bitrix\Main\Application;

use Bitrix\Main\Loader;
use Bitrix\Sale\Order;

Loader::includeModule("iblock");

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

// ---------------------------------------------------------------------------------------------------- iLaB

$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri, PHP_URL_PATH);
$code = basename($parsedUrl);
$currentSectionId = 0;

$arSection = \CIBlockSection::GetList(array(), array('CODE' => $code, 'IBLOCK_ID' => 5,));

while($arSec = $arSection->GetNext()) {
	$currentSectionId = $arSec['ID'];
}

$arFilter = array(
	'IBLOCK_ID' => 5,
	'IBLOCK_SECTION_ID' => $currentSectionId
);

$dbRes = \CIBlockElement::GetList(array(), $arFilter, false, array("*", "UF_*"));


while($arRes = $dbRes->GetNext()) {
	$arResult['ELEMENT'][$arRes['ID']] = $arRes;
	$arResult['ELEMENT'][$arRes['ID']]['IMAGES'] = CFile::GetPath($arRes['PREVIEW_PICTURE']);
}




// ---------------------------------------------------------------------------------------------------- iLaB?>





<?/*if($USER->isAdmin()):?>
	<pre class="pre">
		<?print_r($arResult)?>
	</pre>
<?endif*/?>