<?
use \Bitrix\Main\Application;

use Bitrix\Main\Loader;
use Bitrix\Sale\Order;

Loader::includeModule("iblock");

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

// ---------------------------------------------------------------------------------------------------- iLaB

$arFilter = array(
	'IBLOCK_ID' => 5,
	'ACTIVE' => 'Y',
);

$dbRes = \CIBlockSection::GetList(array(), $arFilter, false, array("*", "UF_*")); // UF_* для выбора всех пользовательских свойств);

while($arRes = $dbRes->GetNext()) {
	$arResult['ELEMENT'][$arRes['ID']] = $arRes;
	$arResult['ELEMENT'][$arRes['ID']]['IMAGES'] = CFile::GetPath($arRes['UF_SVG']);
}




// ---------------------------------------------------------------------------------------------------- iLaB?>





<?/*if($USER->isAdmin()):?>
	<pre class="pre">
		<?print_r($arResult)?>
	</pre>
<?endif*/?>