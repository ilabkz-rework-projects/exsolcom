<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);



?>
<div class="detail-item">
	<div class="detail-item-img"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['DETAIL_PICTURE']['SRC']?>"></div>

	<div class="detail-item-content">
		<?if($arResult['I_CONTENT']){?>
			<?=$arResult['I_CONTENT']?>
		<?}else{?>
			<span><?=$arResult['PREVIEW_TEXT']?></span>
		<?}?>
	</div>

	<div class="detail-item-footer">
		<div class="detail-item-footer-price"></div>
		<div class="detail-item-footer-btn">
			<button id="form-kp-btn">Запросить коммерческое предложение</button>
		</div>
	</div>
</div>

<?/*
echo '<pre>';
print_r($arResult);
echo '</pre>';
*/?>