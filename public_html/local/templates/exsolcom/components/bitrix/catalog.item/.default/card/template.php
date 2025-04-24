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
	$date = DateTime::createFromFormat(LANGUAGE_ID === 'en' ? 'm/d/Y h:i:s A' : 'd.m.Y H:i:s', $originalDate);

	// Массив с названиями месяцев
	$months = null;

	if(LANGUAGE_ID === 'en') {
		$months = [
			1 => 'january', 2 => 'february', 3 => 'march', 4 => 'april',
			5 => 'may', 6 => 'june', 7 => 'july', 8 => 'august',
			9 => 'september', 10 => 'october', 11 => 'november', 12 => 'december'
		];
	} else if (LANGUAGE_ID === 'ru') {
		$months = [
			1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
			5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
			9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
		];

	}else{
		$months = [
			1 => 'қаңтар', 2 => 'ақпан', 3 => 'наурыз', 4 => 'сәуір',
			5 => 'мамыр', 6 => 'маусым', 7 => 'шілде', 8 => 'тамыз',
			9 => 'қыркүйек', 10 => 'қазан', 11 => 'қараша', 12 => 'желтоқсан'
		];
	}


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

$dbRes = \CIBlockSection::GetList(array(), $arFilter, false, array("*", "UF_*")); // UF_* для выбора всех пользовательских свойств);

while ($arRes = $dbRes->GetNext()) {
	$arResult['ELEMENT'][$arRes['ID']] = $arRes;
}

unset($arRes, $dbRes);

$arSelectProp = [
    'ID',
    'PROPERTY_I_PREVIEW_TEXT_KZ',
    'PROPERTY_I_PREVIEW_TEXT_EN',
    'PROPERTY_I_NAME_RU',
    'PROPERTY_I_NAME_KZ',
    'PROPERTY_I_NAME_EN'
];

$itemProperty = \CIBlockElement::GetList([], ['IBLOCK_ID' => 2, 'ID' => $item['ID']], false, false, $arSelectProp);

while ($arProp = $itemProperty->GetNext()) {
    $arResult['I_PROPS'][$arProp['ID']]['I_PREVIEW_TEXT_KZ'] = $arProp['PROPERTY_I_PREVIEW_TEXT_KZ_VALUE'];
    $arResult['I_PROPS'][$arProp['ID']]['I_PREVIEW_TEXT_EN'] = $arProp['PROPERTY_I_PREVIEW_TEXT_EN_VALUE'];
    $arResult['I_PROPS'][$arProp['ID']]['I_NAME_RU']         = $arProp['PROPERTY_I_NAME_RU_VALUE'];
    $arResult['I_PROPS'][$arProp['ID']]['I_NAME_KZ']         = $arProp['PROPERTY_I_NAME_KZ_VALUE'];
    $arResult['I_PROPS'][$arProp['ID']]['I_NAME_EN']         = $arProp['PROPERTY_I_NAME_EN_VALUE'];
}

?>

	<div class="product-item i_detail-modal-item i_modal-footer-hd" data_modal_name="blog" data-id="<?=$item['ID']?>" data_iblock_id="2">
		<div class="product-item-left">
			<div class="product-item-img">
				<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
			</div>
		</div>
		<div class="product-item-right">
			<div class="product-item-top">
				<? if ($item['DATE_ACTIVE_FROM']) { ?>
					<div class="product-item-date">
						<span><?= $formattedDate ?></span>
					</div>
				<? } ?>
				<div class="product-item-topic" topic-value="<?= $item['PROPERTIES']['I_TOPIC_NAME']['VALUE'] ?>">
					<span><?= $arResult['ELEMENT'][$item['IBLOCK_SECTION_ID']]['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)] ?></span>
				</div>
			</div>
			<div class="product-item-content">
				<div class="product-item-name">
					<span><?= $arResult['I_PROPS'][$item['ID']]['I_NAME_'.strtoupper(LANGUAGE_ID)] ?></span>
				</div>
				<div class="product-item-title">
                    <span><?=LANGUAGE_ID === 'ru' ? $item['PREVIEW_TEXT'] : $arResult['I_PROPS'][$item['ID']]['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]?></span>
                </div>
			</div>
		</div>
	</div>

	<div class="i_vacantion-item second i_detail-modal-item i_modal-footer-hd" data_modal_name="blog" data-id="<?=$item['ID']?>" data_iblock_id="2">
		<div class="i_vacation-item-top">
			<div class="i_vacantion-item-left">
				<div class="i_vacantion-img">
					<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
				</div>
			</div>
			<div class="i_vacantion-item-right">
                <? if ($item['DATE_ACTIVE_FROM']) { ?>
                    <div class="product-item-date">
                        <span><?= $formattedDate ?></span>
                    </div>
                <? } ?>
				<div class="i_vacantion-item-topic">
                    <span><?= $arResult['ELEMENT'][$item['IBLOCK_SECTION_ID']]['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)] ?></span>
                </div>
				<div class="i_vacantion-item-name">
					<span><?=$item['NAME']?></span>
				</div>
			</div>
		</div>
		<div class="i_vacantion-item-right second">
			<div class="i_vacantion-item-title">
				<span><?=LANGUAGE_ID === 'ru' ? $item['PREVIEW_TEXT'] : $arResult['I_PROPS'][$item['ID']]['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]?></span>
			</div>
		</div>
	</div>


<?php
//echo '<pre>';
//print_r($arResult['ELEMENT']);
//echo '</pre>';
?>