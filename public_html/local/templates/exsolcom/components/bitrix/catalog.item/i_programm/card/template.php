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


$res = CIBlockElement::GetList([], ['IBLOCK_ID' => 9, 'ID' => $item['ID']], false, false, ['PROPERTY_I_PRICE']);
$arResult = [];
$price = 0;

while($ob = $res->Fetch())
{
	$price = $ob['PROPERTY_I_PRICE_VALUE'];
}



?>
	<div class="product-item" data-id="<?= $item['ID'] ?>">
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
				<span><span class="color-red"><?= $price ?></span> ₸<span class="text"> (электронная версия)</span></span>
			</div>
			<div class="product-item-btn">
				<button id="form-kp-btn">Запросить КП</button>
			</div>
		</div>
	</div>


<?php
//echo '<pre>';
//print_r($arResult['ELEMENT'][$item['ID']]);
//echo '</pre>';
?>