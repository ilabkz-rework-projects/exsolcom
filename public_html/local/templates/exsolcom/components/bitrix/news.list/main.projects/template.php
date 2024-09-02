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
<div class="swiper projects-swiper">
	<div class="swiper-wrapper">
		<?foreach($arResult["ELEMENT"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<div class="swiper-slide swiper-slide-parent" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="<?=$arItem['SECTION_PAGE_URL']?>">
					<!--PERSONAL SWIPER SLIDE PICTURE-->
					<div class="swiper-slide">
						<div class="swiper-slide-icon">
							<img src="<?=$arItem['IMAGES']?>" alt="<?=$arItem['NAME']?>">
						</div>
						<div class="swiper-slide-title">
							<span><?=$arItem['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)]?></span>
						</div>
					</div>
					<!--!PERSONAL SWIPER SLIDE BLOCK-->
				</a>
			</div>
		<?endforeach;?>
	</div>
</div>
