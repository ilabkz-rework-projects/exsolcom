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
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DEFAULT_SORT" => "rank",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGE_RESULT_COUNT" => "50",
		"RESTART" => "Y",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "N",
		"USE_LANGUAGE_GUESS" => "N",
		"USE_SUGGEST" => "N",
		"USE_TITLE_RANK" => "Y",
		"arrFILTER" => array(
			0 => "no",
		),
		"arrWHERE" => "",
		"COMPONENT_TEMPLATE" => "i_search-page"
	),
	false
);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>