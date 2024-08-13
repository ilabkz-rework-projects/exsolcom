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


$res = CIBlockElement::GetList([], ['IBLOCK_ID' => 9, 'ID' => $item['ID']], false, false, ['PROPERTY_I_PRICE']);
$arResult = [];
$price = 0;

while($ob = $res->Fetch())
{
	$price = $ob['PROPERTY_I_PRICE_VALUE'];
}

?>
	<div class="programm-item"  data-id="<?= $item['ID'] ?>" >
		<div class="product-item-img">
			<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
		</div>
		<div class="product-item-title" id="modal-kp" data-id="<?= $item['ID'] ?>">
			<span><?= $item['NAME'] ?></span>
		</div>
		<div class="product-item-detail">
			<div class="product-item-detail-title">
				<span><?= $item['PREVIEW_TEXT'] ?></span>
			</div>
			<div class="product-item-detail-price">
				<?if($price){?>
					<span><span class="color-red"><?= $price ?></span> ₸
						<span class="text"> (электронная версия)</span>
						<span class="text2"> (эл. версия)</span>
					</span>
				<?}else{?>
					<span><span class="color-red">Цена по запросу</span>
                </span>
				<?}?>

			</div>
			<div class="product-item-btn">
				<button id="form-kp-btn">Запросить КП</button>
			</div>
		</div>
		<div class="i_item_compare">
            <div class="i_compare_succes j_compare_success hd" data-id="131954">
                <div class="i_bs_close j_cs_close"></div>
                <div class="j_me1" style="display: none;">Товар добавлен в <span class="i_comp_upper"> сравнение</span> что бы посмотреть список сравнение, добавьте хотя бы ещё один товар.</div>
                <div class="j_me2" style="">Товар был добавлен в <span class="i_comp_upper">сравнение</span><div class="i_open_compare i_but_ac i_w100per j_open_compare">Сравнить</div></div>
            </div>
			<a class="i_compare_but j_item_compare" data-iblock_id="<?=9?>" data-id="<?=$item['ID']?>" data-change_text='{"txt_default":"Сравнить","txt_change":"Удалить"}'>
				<span>Сравнить</span>
			</a>
		</div>
	</div>


<?php
//echo '<pre>';
//print_r($arResult['ELEMENT'][$item['ID']]);
//echo '</pre>';
?>