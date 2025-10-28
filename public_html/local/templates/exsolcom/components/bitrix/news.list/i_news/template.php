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
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    if ($arItem['ACTIVE_FROM']) {
        // Исходная дата
        $originalDate = $arItem['ACTIVE_FROM'];

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
    ?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?php
	$prop = $arItem['PROPERTIES']['I_YOUTUBE_LINK']['~VALUE'];
	$video = is_array($prop) ? $prop['TEXT'] : $prop;
	?>
	<div class="news-item i_detail-modal-item i_modal-footer-hd" id="<?=$this->GetEditAreaId($arItem['ID']);?>"
         data-id="<?=$arItem['ID']?>"
         data_iblock_id="<?=$arParams['IBLOCK_ID']?>"
    >
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div class="news-item-img"
                 data-video="<?=!empty($video) ? htmlspecialchars($video) : ''?>"
            >
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
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
			<div class="news-date-time"><span><?echo $formattedDate ?></span></div>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<div class="news-item-name">
					<b><?echo $arItem['PROPERTIES']["I_NAME_".strtoupper(LANGUAGE_ID)]["VALUE"]?></b>
				</div>
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="i_news-preview">
				<span><?= LANGUAGE_ID === 'ru' ? $arItem["PREVIEW_TEXT"] : $arItem['PROPERTIES']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]["VALUE"];?></span>
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

