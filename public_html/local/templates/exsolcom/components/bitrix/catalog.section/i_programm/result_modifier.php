<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


if($arResult['ITEMS']){
	foreach ($arResult['ITEMS'] as $key => $item){
		$res = CIBlockElement::GetList([], ['IBLOCK_ID' => 9, 'ID' => $item['ID']], false, false, ['PROPERTY_I_PRICE']);
		$price = 0;

		while($ob = $res->Fetch())
		{
			$price = $ob['PROPERTY_I_PRICE_VALUE'] || 0;
		}

		$arResult['ITEMS'][$key]['PRICE'] = $price;
	}

	// Извлекаем параметр sort из URL
	$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'desc'; // По умолчанию убывание

	// Функция сравнения для сортировки
	usort($arResult['ITEMS'], function($a, $b) use ($sortOrder) {
		if ($sortOrder === 'asc') {
			return $a['PRICE'] <=> $b['PRICE']; // Сортировка по возрастанию
		} else {
			return $b['PRICE'] <=> $a['PRICE']; // Сортировка по убыванию
		}
	});

//	echo '<pre>';
//	print_r($arResult['ITEMS']);
//	echo '</pre>';
}


