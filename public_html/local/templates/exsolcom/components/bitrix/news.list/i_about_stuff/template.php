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
<div class="i_team-personal">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="i_team-personal-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<!--TEAM PERSONAL BLOCK DEPICTION-->
		<div class="i_team-personal-block-depiction">
			<!--TEAM PERSONAL BLOCK PICTURE-->
			<div class="i_team-personal-block-picture">
				<div class="i_team-personal-block-picture-block">
					<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
					     alt="picture-1-Head">
				</div>
			</div>
			<!--!TEAM PERSONAL BLOCK PICTURE-->
			<!--TEAM PERSONAL BLOCK DEPICTION GROUP-->
			<div class="i_team-personal-block-depiction-group">
				<!--TEAM PERSONAL BLOCK DEPICTION GROUP NAME-->
				<div class="block-depiction-group-name">
					<span><?= $arItem['PROPERTIES']['I_NAME_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
				</div>
				<!--!TEAM PERSONAL BLOCK DEPICTION GROUP NAME-->
				<!--TEAM PERSONAL BLOCK DEPICTION GROUP TITLE-->
				<div class="block-depiction-group-title">
					<p><?= $arItem['PROPERTIES']['I_ROLE_'.strtoupper(LANGUAGE_ID)]['VALUE'] ?></p>
				</div>
				<!--!TEAM PERSONAL BLOCK DEPICTION GROUP TITLE-->
				<!--TEAM PERSONAL BLOCK DEPICTION GROUP DESC-->
				<div class="block-depiction-group-desc">
					<p><?=LANGUAGE_ID === 'ru' ? $arItem['PREVIEW_TEXT'] : $arItem['PROPERTIES']['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]['VALUE']?></p>
				</div>
				<!--!TEAM PERSONAL BLOCK DEPICTION GROUP DESC-->
			</div>
			<!--!TEAM PERSONAL BLOCK DEPICTION GROUP-->
		</div>
		<!--!TEAM PERSONAL BLOCK DEPICTION-->
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

<?php /*
echo '<pre class="pre">';
print_r($arResult["ITEMS"]);
echo '</pre>';
*/?>
