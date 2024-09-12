<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
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


$res = CIBlockElement::GetProperty(9, $item['ID'], array(), array());
$price = 0;

while($ob = $res->Fetch())
{
	$arResult['ELEMENT'][$item['ID']]['PROPERTY'][$ob['CODE']] = $ob['VALUE'];
}

$price = $arResult['ELEMENT'][$item['ID']]['PROPERTY']['I_PRICE'];

?>
	<div class="programm-item"  data-id="<?= $item['CODE'] ?>" >
		<div class="product-item-img">
			<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
		</div>
		<div class="product-item-title" id="modal-kp" data-id="<?= $item['CODE'] ?>">
			<span><?=$arResult['ELEMENT'][$item['ID']]['PROPERTY']['I_NAME_'.strtoupper(LANGUAGE_ID)]?></span>
		</div>
		<div class="product-item-detail">
			<div class="product-item-detail-title">
				<span><?=LANGUAGE_ID === 'ru' ? $item['PREVIEW_TEXT'] : $arResult['ELEMENT'][$item['ID']]['PROPERTY']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)] ?></span>
			</div>
			<div class="product-item-detail-price">
				<?if($price){?>
					<span><span class="color-red"><?= $price ?></span> ₸
						<span class="text"><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_VERSION')?></span>
						<span class="text2"> (эл. версия)</span>
					</span>
				<?}else{?>
					<span><span class="color-red"><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_PRICE')?></span>
                </span>
				<?}?>

			</div>
			<div class="product-item-btn">
				<button id="form-kp-btn"><?=\Bitrix\Main\Localization\Loc::getMessage('I_REQUEST_KP')?></button>
			</div>
		</div>
		<div class="i_item_compare">
            <div class="i_compare_succes j_compare_success hd" data-id="131954">
                <div class="i_bs_close j_cs_close"></div>
                <div class="j_me1" style="display: none;"><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_ADD')?><span class="i_comp_upper"><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_COMPARE')?></span> <?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_TO')?></div>
                <div class="j_me2" style=""><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_ADD')?><span class="i_comp_upper"><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_COMPARE')?></span><?=\Bitrix\Main\Localization\Loc::getMessage('I_TEXT_COMPARE_SEC')?><div class="i_open_compare i_but_ac i_w100per j_open_compare"><?=\Bitrix\Main\Localization\Loc::getMessage('I_BTN_COMPARE')?></div></div>
            </div>
			<a class="i_compare_but j_item_compare" data-iblock_id="<?=9?>" data-id="<?=$item['ID']?>" data-change_text='{"txt_default":"Сравнить","txt_change":"Удалить"}'>
				<span><?=\Bitrix\Main\Localization\Loc::getMessage('I_BTN_COMPARE')?></span>
			</a>
		</div>
	</div>


<?/*
echo '<pre>';
print_r($arResult['ELEMENT'][$item['ID']]);
echo '</pre>';
*/?>