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
?>

<div class="search-page">
	<form action="" method="get">
		<? if ($arParams["USE_SUGGEST"] === "Y"):
			if (mb_strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
				$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
				$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
				$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
			}
			?>
			<? $APPLICATION->IncludeComponent(
			"bitrix:search.suggest.input",
			"",
			array(
				"NAME" => "q",
				"VALUE" => $arResult["REQUEST"]["~QUERY"],
				"INPUT_SIZE" => 40,
				"DROPDOWN_SIZE" => 10,
				"FILTER_MD5" => $arResult["FILTER_MD5"],
			),
			$component, array("HIDE_ICONS" => "Y")
		); ?>
		<? else: ?>
			<input class="i_search-input-l" type="text" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>" size="40"
			       placeholder="<?= GetMessage("PLACE_HOLDER") ?>"/>
		<? endif; ?>
		<? if ($arParams["SHOW_WHERE"]): ?>
			&nbsp;<select class="i_search-select" name="where">
				<option value=""><?= GetMessage("SEARCH_ALL") ?></option>
				<? foreach ($arResult["DROPDOWN"] as $key => $value): ?>
					<option value="<?= $key ?>"<? if ($arResult["REQUEST"]["WHERE"] == $key) echo " selected" ?>><?= $value ?></option>
				<? endforeach ?>
			</select>
		<? endif; ?>
		&nbsp;<input class="i_search-input-btn" type="submit" value="<?= GetMessage("SEARCH_GO") ?>"/>
		<input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>
		<? if ($arParams["SHOW_WHEN"]): ?>
			<script>
							var switch_search_params = function () {
								var sp = document.getElementById('search_params');
								var flag;
								var i;

								if (sp.style.display == 'none') {
									flag = false;
									sp.style.display = 'block'
								} else {
									flag = true;
									sp.style.display = 'none';
								}

								var from = document.getElementsByName('from');
								for (i = 0; i < from.length; i++)
									if (from[i].type.toLowerCase() == 'text')
										from[i].disabled = flag;

								var to = document.getElementsByName('to');
								for (i = 0; i < to.length; i++)
									if (to[i].type.toLowerCase() == 'text')
										to[i].disabled = flag;

								return false;
							}
			</script>
			<br/><a class="search-page-params" href="#"
			        onclick="return switch_search_params()"><? echo GetMessage('CT_BSP_ADDITIONAL_PARAMS') ?></a>
			<div id="search_params" class="search-page-params"
			     style="display:<? echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"] ? 'block' : 'none' ?>">
				<? $APPLICATION->IncludeComponent(
					'bitrix:main.calendar',
					'',
					array(
						'SHOW_INPUT' => 'Y',
						'INPUT_NAME' => 'from',
						'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
						'INPUT_NAME_FINISH' => 'to',
						'INPUT_VALUE_FINISH' => $arResult["REQUEST"]["~TO"],
						'INPUT_ADDITIONAL_ATTR' => 'size="10"',
					),
					null,
					array('HIDE_ICONS' => 'Y')
				); ?>
			</div>
		<? endif ?>
	</form>
	<br/>

	<? if (isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
		?>
		<div class="search-language-guess">
			<? echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#" => '<a href="' . $arResult["ORIGINAL_QUERY_URL"] . '">' . $arResult["REQUEST"]["ORIGINAL_QUERY"] . '</a>')) ?>
		</div><br/><?
	endif; ?>


	<? if ($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false): ?>
	<? elseif ($arResult["ERROR_CODE"] != 0): ?>
		<div class="i_search-content_page">
			<div class="i_search-fail">
				<p><?= GetMessage("SEARCH_ERROR") ?></p>
				<? ShowError($arResult["ERROR_TEXT"]); ?>
				<p><?= GetMessage("SEARCH_CORRECT_AND_CONTINUE") ?></p>
			</div>

			<p><?= GetMessage("SEARCH_SINTAX") ?><br/><b><?= GetMessage("SEARCH_LOGIC") ?></b></p>
			<table border="0" cellpadding="5">
				<tr>
					<td align="center" valign="top"><?= GetMessage("SEARCH_OPERATOR") ?></td>
					<td valign="top"><?= GetMessage("SEARCH_SYNONIM") ?></td>
					<td><?= GetMessage("SEARCH_DESCRIPTION") ?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?= GetMessage("SEARCH_AND") ?></td>
					<td valign="top">and, &amp;, +</td>
					<td><?= GetMessage("SEARCH_AND_ALT") ?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?= GetMessage("SEARCH_OR") ?></td>
					<td valign="top">or, |</td>
					<td><?= GetMessage("SEARCH_OR_ALT") ?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?= GetMessage("SEARCH_NOT") ?></td>
					<td valign="top">not, ~</td>
					<td><?= GetMessage("SEARCH_NOT_ALT") ?></td>
				</tr>
				<tr>
					<td align="center" valign="top">( )</td>
					<td valign="top">&nbsp;</td>
					<td><?= GetMessage("SEARCH_BRACKETS_ALT") ?></td>
				</tr>
			</table>
		</div>
	<? elseif (count($arResult["SEARCH"]) > 0): ?>
		<div class="i_search-content">
			<? if ($arParams["DISPLAY_TOP_PAGER"] != "N") {
                $navString = $arResult["NAV_STRING"];

                if (LANGUAGE_ID == "en") {
                    $navString = str_replace("Результаты поиска", "Search results", $navString);
                } elseif (LANGUAGE_ID == "kz") {
                    $navString = str_replace("Результаты поиска", "Іздеу нәтижелері", $navString);
                }

                echo $navString;
            }?>

			<div class="i_search-content-separate">
				<p>
					<? if ($arResult["REQUEST"]["HOW"] == "d"): ?>
				<div class="i_search-content-separate-item-a">
					<a href="<?= $arResult["URL"] ?>&amp;how=r<? echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"] : '' ?><? echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"] : '' ?>"><?= GetMessage("SEARCH_SORT_BY_RANK") ?></a>
				</div>
				<div class="i_search-content-separate-item-sort">
					<b><?= GetMessage("SEARCH_SORTED_BY_DATE") ?></b>
				</div>
				<? else: ?>
					<div class="i_search-content-separate-item-sort">
						<b><?= GetMessage("SEARCH_SORTED_BY_RANK") ?></b>&nbsp;
					</div>
					<div class="i_search-content-separate-item-a">
						<a href="<?= $arResult["URL"] ?>&amp;how=d<? echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"] : '' ?><? echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"] : '' ?>"><?= GetMessage("SEARCH_SORT_BY_DATE") ?></a>
					</div>
				<? endif; ?>
				</p>
			</div>
		</div>
		<br/>

		<?


		$arIDS = [];

		foreach ($arResult["SEARCH"] as $item) {
			$arIDS[$item["ID"]] = $item["ITEM_ID"];
		}

		$arSelect = array('ID', 'PROPERTY_I_PREVIEW_TEXT_EN', 'PROPERTY_I_PREVIEW_TEXT_KZ', 'PROPERTY_I_NAME_RU', 'PROPERTY_I_NAME_KZ', 'PROPERTY_I_NAME_EN');

		$arSection = \CIBlockElement::GetList(array(), array('ID' => $arIDS), false, false, $arSelect);
		$arElements = [];

		while ($arSec = $arSection->GetNext()) {
			$arElements[$arSec["ID"]] = $arSec;
		}
		?>

		<div class="i_search-result">
			<? foreach ($arResult["SEARCH"] as $arItem): ?>
				<div class="i_search-result-content">
					<div class="i_search-result-left">
						<a class="color-red" href="<? echo $arItem["URL"] ?>">
							<?=
								LANGUAGE_ID === 'ru' ? $arItem["TITLE_FORMATED"] : $arElements[$arItem['ITEM_ID']]['PROPERTY_I_NAME_' . strtoupper(LANGUAGE_ID) . '_VALUE']
							?></a>
						<p><?=
								LANGUAGE_ID === 'ru' ? $arItem["BODY_FORMATED"] : $arElements[$arItem['ITEM_ID']]['PROPERTY_I_PREVIEW_TEXT_' . strtoupper(LANGUAGE_ID) . '_VALUE']
							?>
						</p>
					</div>
					<? if (
						$arParams["SHOW_RATING"] == "Y"
						&& $arItem["RATING_TYPE_ID"] <> ''
						&& $arItem["RATING_ENTITY_ID"] > 0
					): ?>
						<div class="search-item-rate"><?
							$APPLICATION->IncludeComponent(
								"bitrix:rating.vote", $arParams["RATING_TYPE"],
								array(
									"ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
									"ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
									"OWNER_ID" => $arItem["USER_ID"],
									"USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
									"USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0 ? 'N' : 'Y',
									"TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
									"TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
									"TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
									"TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
									"PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
								),
								$component,
								array("HIDE_ICONS" => "Y")
							); ?>
						</div>
					<? endif; ?>
					<small class="i_search-renamed"><?= GetMessage("SEARCH_MODIFIED") ?> <?= $arItem["DATE_CHANGE"] ?></small><?
					if ($arItem["CHAIN_PATH"]):?>
						<small class="i_search-road"><?= GetMessage("SEARCH_PATH") ?>
						&nbsp;<?= $arItem["CHAIN_PATH"] ?></small><?
					endif;
					?>
					<hr/>
				</div>
			<? endforeach; ?>
		</div>
		<div class="i_search-switching">
			<? if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"] ?>
		</div>
		<br/>

	<? else: ?>
		<? ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND")); ?>
	<? endif; ?>
</div>