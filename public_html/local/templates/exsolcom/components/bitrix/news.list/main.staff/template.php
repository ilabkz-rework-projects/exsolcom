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
<div class="swiper personal">
	<div class="swiper-wrapper">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<!--PERSONAL SWIPER SLIDE PICTURE-->
				<div class="swiper-slide-picture">
					<div class="i_swiper-slide-image">
						<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="picture-9-Technical-Director">
					</div>
				</div>
				<!--!PERSONAL SWIPER SLIDE PICTURE-->
				<!--PERSONAL SWIPER SLIDE BLOCK-->
				<div class="swiper-slide-block">
					<div class="swiper-slide-group">
						<div class="swiper-slide-name">
							<span><?=$arItem['PROPERTIES']['I_NAME_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
						</div>
						<div class="swiper-slide-title">
							<p><?=$arItem['PROPERTIES']['I_ROLE_'.strtoupper(LANGUAGE_ID)]['VALUE']?></p>
						</div>
						<div class="swiper-slide-desc">
							<p>
								<?=LANGUAGE_ID === 'ru' ? $arItem['PREVIEW_TEXT'] : $arItem['PROPERTIES']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]['VALUE']?>
							</p>
						</div>
					</div>
				</div>
				<!--!PERSONAL SWIPER SLIDE BLOCK-->
			</div>
		<?endforeach;?>
	</div>
</div>
