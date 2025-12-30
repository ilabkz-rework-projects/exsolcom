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

<div class="news-page-list">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<?php
		$video = '';
		if (!empty($arItem['DISPLAY_PROPERTIES']['I_YOUTUBE_LINK']['VALUE'])) {
			if (is_array($arItem['DISPLAY_PROPERTIES']['I_YOUTUBE_LINK']['VALUE'])) {
				$video = $arItem['DISPLAY_PROPERTIES']['I_YOUTUBE_LINK']['VALUE']['TEXT'];
			} else {
				$video = $arItem['DISPLAY_PROPERTIES']['I_YOUTUBE_LINK']['VALUE']['TEXT'];
			}
		}
		?>
		<div class="news-page-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-id="<?=$arItem['CODE']?>" data-iblock-id="<?=$arItem['IBLOCK_ID']?>">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<div class="news-item-img" data-video="<?=$video?>">
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
									class="preview_picture"
									border="0"
									src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
									style="float:left"
							/></a>
					<?else:?>
						<img
								class="preview_picture"
								border="0"
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
								style="float:left"
						/>
					<?endif;?>
				</div>
			<?endif?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<div class="news-date-time"><span><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
			<?endif?>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<span><?echo $arItem["NAME"]?></span>
				<?else:?>
					<span><?echo $arItem["NAME"]?></span>
				<?endif;?>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="i_news-preview">
					<span><?echo $arItem["PREVIEW_TEXT"];?></span>
				</div>
			<?endif;?>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>

<div id="videoModal" class="video-modal" style="display:none;">
    <div class="video-modal-content">
        <span class="video-modal-close">&times;</span>
        <iframe width="100%" height="500" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
