<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("News");
?>


<div class="i_search">
	<div class="i_container">
        <div class="i_search-page-title">
            <div class="i_search-page-title-icon">
            </div>
            <div class="i_search-page-title-name">
                <span>РЕЗУЛЬТАТЫ <span class="color-red">ПОИСКА</span></span>
            </div>
        </div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:search.page",
			"i_search-page",
			Array(
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_TIME" => "3600",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "N",
				"DEFAULT_SORT" => "rank",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_TOP_PAGER" => "Y",
				"FILTER_NAME" => "",
				"NO_WORD_LOGIC" => "N",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_TITLE" => "Результаты поиска",
				"PAGE_RESULT_COUNT" => "50",
				"RESTART" => "N",
				"SHOW_WHEN" => "N",
				"SHOW_WHERE" => "Y",
				"USE_LANGUAGE_GUESS" => "Y",
				"USE_SUGGEST" => "N",
				"USE_TITLE_RANK" => "N",
				"arrFILTER" => "",
				"arrWHERE" => ""
			)
		);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>