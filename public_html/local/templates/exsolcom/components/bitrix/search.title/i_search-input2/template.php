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
$this->setFrameMode(true); ?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if ($INPUT_ID == '')
	$INPUT_ID = "title-search-input2";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if ($CONTAINER_ID == '')
	$CONTAINER_ID = "title-search2";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if ($arParams["SHOW_INPUT"] !== "N"):?>
	<div id="<? echo $CONTAINER_ID ?>">
		<form action="<? echo $arResult["FORM_ACTION"] ?>">
			<div class="i_search-close2"></div>
			<input id="<? echo $INPUT_ID ?>" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off"
			       placeholder=<?=\Bitrix\Main\Localization\Loc::getMessage('SEARCH_KZ')?>/>
			<input name="s" type="submit" value="" class="i_search-submit2"/>
		</form>
	</div>
<? endif ?>
<script>
	BX.ready(function () {
		new JCTitleSearch({
			'AJAX_PAGE': '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>
