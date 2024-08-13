<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader,
	Bitrix\Currency\CurrencyManager,
	Bitrix\Iblock;

Loader::includeModule('iblock');
Loader::includeModule('currency');
Loader::includeModule('catalog');


if( $arResult['ITEMS'] ):

	foreach($arResult['ITEMS'] as $k=>$e)
		$arResult['I_PRODUCT_ID'][] = $e['ID'];

	$arResult['I_BASE_CURRENCY'] = CurrencyManager::getBaseCurrency();// Код базовой валюты.

	foreach($arResult['ITEMS'] as $k=>$e)
	{
		$productList[] = $e['ID'];
// -------------------------------------------------- PROPERTY
		$arId[$e['ID']] = '';
// -------------------------------------------------- IMG BLock
		unset($img);

		if( $e['PREVIEW_PICTURE'] )
			$img = $e['PREVIEW_PICTURE']['SRC'];
		elseif( $e['DETAIL_PICTURE'] )
			$img = $e['DETAIL_PICTURE']['SRC'];
		/*else
			$img = SITE_TEMPLATE_PATH.'/ilab/modules/compare/img/ini_s.png';*/

		$arResult['ITEMS'][$k]['I_PICTURE'] = $img;
		$arResult['I_PRODUCT_ID'][] = $e['ID'];
	}


//	ИСКЛЮЧЕНИЯ

$ipc = [
	'I_CONTENT_LINK',
];

// -------------------------------------------------- PROPERTY
	$propertyIterator = Iblock\PropertyTable::getList(Array(
		'select'	=> array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE'),
		'filter'	=> array('=IBLOCK_ID'=>$arParams['IBLOCK_ID'], '=ACTIVE'=>'Y', '!=PROPERTY_TYPE'=>Iblock\PropertyTable::TYPE_FILE, '!=CODE'=>$ipc),//'=CODE'=>'I_!%'
		'order'		=> array('SORT'=>'ASC', 'NAME'=>'ASC')
	));
	while($ob = $propertyIterator->fetch())
		$arResult['I_PROPERTY'][$ob['CODE']] = $ob;

	if( $arResult['I_PROPERTY'] )
		foreach($arResult['I_PROPERTY'] as $p)
			foreach($arResult['ITEMS'] as $k=>$e)
				if( $e['PROPERTIES'][$p['CODE']]['VALUE'] )
				{
					if( !$arResult['I_PRO'][$p['NAME']] )
						$arResult['I_PRO'][$p['NAME']] = $arId;

					$arResult['I_PRO'][$p['NAME']][$e['ID']] = $e['PROPERTIES'][$p['CODE']]['VALUE'];
				}

endif;?>


<?/*if($USER->isAdmin()):?>
	<pre class="ipre"><?print_r($arResult)?></pre>
<?endif*/?>