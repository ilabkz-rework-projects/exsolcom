<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Iblock;
if(!Bitrix\Main\Loader::includeModule('iblock')) return;
if(!Bitrix\Main\Loader::includeModule('currency')) return;
// ---------------------------------------------------------------------------------------------------- iLaB
if( $arResult['ITEMS'] ):

	foreach($arResult['ITEMS'] as $k=>$e)
		$arResult['I_PRODUCT_ID'][] = $e['ID'];

	$arResult['I_BASE_CURRENCY'] = \CCurrency::GetBaseCurrency();// Код базовой валюты.
// -------------------------------------------------- Measure
	$res = \CCatalogMeasure::getList();
		while ($ob = $res->GetNext())
			$arResult['MEASURE'][$ob['ID']] = $ob;

	$res = \CCatalogMeasureRatio::getList(
		array(),
		array('PRODUCT_ID' => $arResult['I_PRODUCT_ID']),
		false,
		false,
		array('PRODUCT_ID', 'RATIO')
	);
	while ($ob = $res->Fetch())
		$arResult['MEASURE_RATIO'][$ob['PRODUCT_ID']] = $ob['RATIO'];

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

		// MEASURE
		$arResult['ITEMS'][$k]['CATALOG_MEASURE_NAME']	= $arResult['MEASURE'][$e['CATALOG_MEASURE']]['SYMBOL_RUS'];
		$arResult['ITEMS'][$k]['~CATALOG_MEASURE_NAME']	= $arResult['MEASURE'][$e['CATALOG_MEASURE']]['~SYMBOL_RUS'];
		$arResult['ITEMS'][$k]['CATALOG_MEASURE_RATIO']	= $arResult['MEASURE_RATIO'][$e['ID']] ?? 1;

		$arResult['ITEMS'][$k]['I_PICTURE'] = $img;
		$arResult['I_PRODUCT_ID'][] = $e['ID'];

		// I_TRADE_OFFERS
		$offersExist = \CCatalogSKU::getExistOffers($productList);
		if( $offersExist[$e['ID']] )
			$arResult['ITEMS'][$k]['I_TRADE_OFFERS'] = 'Y';
	}

	// PRICE MATRIX
	if( $arParams['I_PRICE_MATRIX']=='Y' )
		foreach($arResult['ITEMS'] as $k=>$e)
		{
			$arResult['ITEMS'][$k]['PRICE_MATRIX']					= CatalogGetPriceTableEx($e['ID'], 0, $arResult['PRICES_ALLOW'], 'Y', $arResult['CONVERT_CURRENCY']);
			$arResult['ITEMS'][$k]['PRICE_MATRIX']['I_MULTI_PRICE']	= $e['PROPERTIES']['I_MULTI_PRICE']['VALUE'];
			if (isset($arResult['ITEMS'][$k]['PRICE_MATRIX']['COLS']) && is_array($arResult['ITEMS'][$k]['PRICE_MATRIX']['COLS']))
			{
				foreach($arResult['ITEMS'][$k]['PRICE_MATRIX']['COLS'] as $keyColumn=>$arColumn)
					$arResult['ITEMS'][$k]['PRICE_MATRIX']['COLS'][$keyColumn]['NAME_LANG'] = htmlspecialcharsbx($arColumn['NAME_LANG']);
			}
		}


// -------------------------------------------------- DEFAULT no props

// -------------------------------------------------- PROPERTY
	$propertyIterator = Iblock\PropertyTable::getList(Array(
		'select'	=> array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE'),
		'filter'	=> array('=IBLOCK_ID'=>$arParams['IBLOCK_ID'], '=ACTIVE'=>'Y', '!=PROPERTY_TYPE'=>Iblock\PropertyTable::TYPE_FILE),//'=CODE'=>'I_!%'
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

endif
// ---------------------------------------------------------------------------------------------------- iLaB?>





<?/*if($USER->isAdmin()):?>
	<pre class="ipre"><?print_r($arResult)?></pre>
<?endif*/?>
