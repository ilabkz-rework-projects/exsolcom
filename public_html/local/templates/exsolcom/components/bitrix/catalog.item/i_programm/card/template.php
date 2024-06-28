<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array
 * @var array $actualItem
 * @var array $minOffer
 * @var array Ids
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool HasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */
?>

<?php
//Добавляю дату
if ($item['DATE_ACTIVE_FROM']) {
// Исходная дата
	$originalDate = $item['DATE_ACTIVE_FROM'];

// Создаем объект DateTime из строки
	$date = DateTime::createFromFormat('d.m.Y H:i:s', $originalDate);

// Массив с названиями месяцев на русском
	$months = [
		1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
		5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
		9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
	];

// Получаем день, месяц и год
	$day = $date->format('d');
	$month = $months[(int)$date->format('m')];
	$year = $date->format('Y');

// Формируем строку
	$formattedDate = sprintf('%d %s %d', $day, $month, $year);
}


$arFilter = array(
	'IBLOCK_ID' => 2,
);

$dbRes = \CIBlockSection::GetList(array(), $arFilter, false, array("*")); // UF_* для выбора всех пользовательских свойств);

while ($arRes = $dbRes->GetNext()) {
	$arResult['ELEMENT'][$arRes['ID']] = $arRes;
}


?>
	<div class="product-item" id="<? $item['ID'] ?>">
		<div class="product-item-img">
			<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
		</div>
		<div class="product-item-title">
			<span><?= $item['NAME'] ?></span>
		</div>
		<div class="product-item-detail">
			<div class="product-item-detail-title">
				<span><?= $item['PREVIEW_TEXT'] ?></span>
			</div>
			<div class="product-item-btn">
				<button>Запросить КП</button>
			</div>
		</div>
	</div>


<?php
//echo '<pre>';
//print_r($item);
//echo '</pre>';
?>