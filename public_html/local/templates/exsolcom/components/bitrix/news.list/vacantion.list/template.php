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
<div class="i_vacantion-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="i_vacantion-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="i_vacantion-item-left">
			<div class="i_vacantion-img">
				<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="img">
			</div>
		</div>
		<div class="i_vacantion-item-right">
			<div class="i_vacantion-item-role">
				<span><?=$arItem['PROPERTIES']['I_ROLE']['VALUE']?></span>
			</div>
			<div class="i_vacantion-item-name">
				<span><?=$arItem['NAME']?></span>
			</div>
			<div class="i_vacantion-item-title">
				<span><?=$arItem['PREVIEW_TEXT']?></span>
			</div>
		</div>

	</div>
    <div class="i_vacantion-item second" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="i_vacation-item-top">
            <div class="i_vacantion-item-left">
                <div class="i_vacantion-img">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="img">
                </div>
            </div>
            <div class="i_vacantion-item-right">
                <div class="i_vacantion-item-role">
                    <span><?=$arItem['PROPERTIES']['I_ROLE']['VALUE']?></span>
                </div>
                <div class="i_vacantion-item-name">
                    <span><?=$arItem['NAME']?></span>
                </div>
            </div>
        </div>
        <div class="i_vacantion-item-right second">
            <div class="i_vacantion-item-title">
                <span><?=$arItem['PREVIEW_TEXT']?></span>
            </div>
        </div>
	</div>



<?endforeach;?>

</div>

<?php
//echo '<pre>';
//print_r($arResult["ITEMS"]);
//echo '</pre>';
?>
