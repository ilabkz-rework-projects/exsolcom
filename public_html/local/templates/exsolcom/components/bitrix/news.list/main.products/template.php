<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="swiper products-swiper">
	<div class="swiper-wrapper">
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<div class="swiper-slide product-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="i_product_item">
                    <div class="swiper-img">
                        <img src="<?=SITE_TEMPLATE_PATH.'/ilab/img/main/products-swiper.png'?>" alt="products-swiper">
                    </div>
                    <div class="swiper-title" id="modal-kp" data-id="<?= $arItem['CODE'] ?>">
                        <span><?=$arItem['PROPERTIES']['I_NAME_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
                    </div>
                    <div class="swiper-detail">
                        <div class="swiper-detail-title">
                            <span><?= LANGUAGE_ID === 'ru' ? $arItem['PREVIEW_TEXT'] : $arItem['PROPERTIES']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
                        </div>
                        <div class="swiper-detail-btn">
                            <button id="form-kp-btn">Запросить КП</button>
                        </div>
                    </div>
                </div>
			</div>

		<? endforeach; ?>
	</div>
</div>

