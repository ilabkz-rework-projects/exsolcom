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
		$prop = $arItem['PROPERTIES']['I_YOUTUBE_LINK']['~VALUE'];
		$video = is_array($prop) ? $prop['TEXT'] : $prop;
		?>
		<div class="news-page-item i_detail-modal-item i_modal-footer-hd" id="<?=$this->GetEditAreaId($arItem['ID']);?>"
             data-id="<?=$arItem['ID']?>"
             data_iblock_id="<?=$arParams['IBLOCK_ID']?>">

			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <div class="news-item-img"
                     data-video="<?=!empty($video) ? htmlspecialchars($video) : ''?>">
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
                </div>
			<?endif?>
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<div class="news-date-time"><span><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
			<?endif?>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<span><?echo $arItem["PROPERTIES"]['I_NAME_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
				<?else:?>
					<span><?echo $arItem["NAME"]?></span>
				<?endif;?>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="i_news-preview">
					<span><?echo LANGUAGE_ID === 'ru' ? $arItem["PREVIEW_TEXT"] : $arItem['PROPERTIES']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]['VALUE'];?></span>
				</div>
			<?endif;?>
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<div style="clear:both"></div>
			<?endif?>
			<?foreach($arItem["FIELDS"] as $code=>$value):?>
				<small>
					<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
				</small>
			<?endforeach;?>
<!--			--><?//foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
<!--				<small>-->
<!--					--><?php //=$arProperty["NAME"]?><!--:&nbsp;-->
<!--					--><?//if(is_array($arProperty["DISPLAY_VALUE"])):?>
<!--						--><?php //=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
<!--					--><?//else:?>
<!--						--><?php //=$arProperty["DISPLAY_VALUE"];?>
<!--					--><?//endif?>
<!--				</small>-->
<!--			--><?//endforeach;?>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>

<div id="videoModal" class="video-modal" style="display:none;">
    <div class="video-modal-content">
        <span class="video-modal-close">&times;</span>
        <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>