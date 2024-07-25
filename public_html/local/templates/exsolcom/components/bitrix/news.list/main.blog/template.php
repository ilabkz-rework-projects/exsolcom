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
<div class="blog-list">
	<?
	$dbRes = \CIBlockSection::GetList(array(), ['IBLOCK_ID' => $arParams['IBLOCK_ID']], false, array("*")); // UF_* для выбора всех пользовательских свойств);

	while ($arRes = $dbRes->GetNext()) {
		$arResult['SECTIONS'][$arRes['ID']] = $arRes;
	}
	?>
	<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
	<?
	$counter = 0;
	foreach ($arResult["ITEMS"] as $arItem):?>
		<? if ($counter === 3) : break; endif;
		$counter++;
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="blog-item i_detail-modal-item i_modal-footer-hd" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" data-id="<?=$arItem['ID']?>" data_iblock_id="<?=$arParams['IBLOCK_ID']?>">
			<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<div class="blog-item-img">
					<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<img
							class="preview_picture"
							border="0"
							src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
							width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
							height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
							alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
							title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
							style="float:left"
							/>
					<? else:?>
						<img
								class="preview_picture"
								border="0"
								src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
								width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
								height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
								alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
								title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
								style="float:left"
						/>
					<? endif; ?>
				</div>
			<? endif ?>
			<div class="blog-item-info">
				<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="blog-item-info-top">
						<div class="blog-date-time"><span><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></span></div>
						<!-- BLOG STICKER-->
						<div class="i_sticker">
							<? if (is_array($arProperty["DISPLAY_VALUE"])):?>
								<?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
							<? else:?>
								<?= $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]['NAME'] ?>
							<? endif ?>
						</div>
						<!-- BLOG STICKER-->
					</div>
				<? endif ?>
				<? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty):?>
				<? endforeach; ?>
				<div class="blog-name">
					<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]):?>
						<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<b><? echo $arItem["NAME"] ?></b>
						<? else:?>
							<b><? echo $arItem["NAME"] ?></b>
						<? endif; ?>
					<? endif; ?>
				</div>
				<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="i_blog-preview">
						<span><? echo $arItem["PREVIEW_TEXT"]; ?></span>
					</div>
				<? endif; ?>
				<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<div style="clear:both"></div>
				<? endif ?>
				<? foreach ($arItem["FIELDS"] as $code => $value):?>
					<small>
						<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
					</small>
				<? endforeach; ?>
			</div>
			<div class="i_blog-preview_1">
				<span><? echo $arItem["PREVIEW_TEXT"]; ?></span>
			</div>
		</div>
	<? endforeach; ?>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
</div>
