<?
use \Bitrix\Main\Application;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
// ---------------------------------------------------------------------------------------------------- iLaB

$arFilter = array('');
$by = "curr";
$order = "desc";

$rs = \CCurrencyRates::GetList($by ,$order,$arFilter);

while($ar_rate = $rs->Fetch())
{
	$arResult['CURRENCY_RATES'][$ar_rate['ID']] = $ar_rate;
}

// ---------------------------------------------------------------------------------------------------- iLaB?>





<?/*if($USER->isAdmin()):?>
	<pre class="ipre">
		<?print_r($arResult['CURRENCY_RATES'])?>
	</pre>
<?endif*/?>