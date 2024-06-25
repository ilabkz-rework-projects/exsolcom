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
<div class="blog-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="blog-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="blog-item-left">
			<div class="blog-item-img">
				<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="img">
			</div>
		</div>
		<div class="blog-item-right">
			<div class="blog-item-top">
				<div class="blog-item-date">
					<span><?= $arItem['DISPLAY_ACTIVE_FROM'] ?></span>
				</div>
				<div class="blog-item-topic" topic-value="<?=$arItem['PROPERTIES']['I_TOPIC_NAME']['VALUE']?>">
					<span><?= $arItem['PROPERTIES']['I_TOPIC_NAME']['VALUE'] ?></span>
				</div>
			</div>
			<div class="blog-item-content">
				<div class="blog-item-name">
					<span><?=$arItem['NAME']?></span>
				</div>
				<div class="blog-item-title">
					<span><?=$arItem['PREVIEW_TEXT']?></span>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

