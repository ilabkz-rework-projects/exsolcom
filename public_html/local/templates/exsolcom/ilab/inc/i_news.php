<div class="i_news">

	<div class="i_news-title">
		<div class="i_news-title-icon">
            <svg width="26" height="24" viewBox="0 0 229 229" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M228.7 218.9C228.1 224.6 225.6 227.3 219.9 228.4C219.2 228.5 218.5 228.6 217.7 228.8H11.6C11.1 228.7 10.7 228.6 10.2 228.6C4.50003 228 1.70003 225.5 0.800034 219.8C0.500034 218 0.400024 216.1 0.400024 214.2C0.400024 157.4 0.400024 100.6 0.400024 43.7999C0.400024 42.0999 0.500027 40.2999 0.700027 38.5999C1.30003 33.0999 3.80003 30.2999 9.20003 29.3999C11.2 29.0999 13.3 28.9999 15.4 28.9999C24.3 28.9999 33.2 28.9999 42.1 28.9999C42.6 29.1999 43.2 28.7999 43.3 28.2999C43.4 28.0999 43.4 27.8999 43.3 27.6999C43.2 24.7999 43.2 21.8999 43.3 18.9999C43.4 15.8999 43.3 12.7999 43.6 9.69991C44.1 4.39991 46.8 1.69991 52 0.799911C52.9 0.599911 53.8 0.499902 54.7 0.399902H217.7C218.1 0.499902 218.6 0.599915 219 0.599915C224.7 1.19991 227.5 3.7999 228.5 9.3999C228.6 10.0999 228.7 10.7999 228.9 11.5999V217.7C228.9 218 228.8 218.5 228.7 218.9ZM214.7 28.4999C214.7 25.9999 214.6 23.4999 214.5 21.0999C214.3 16.6999 212.6 15.0999 208.2 14.7999C206.2 14.6999 204.2 14.5999 202.1 14.5999C158.1 14.5999 114.1 14.5999 70.1 14.5999C67.5 14.5999 65 14.6999 62.4 14.9999C59.7 15.2999 58.3 16.5999 58 19.2999C57.7 21.1999 57.6 23.1999 57.6 25.0999C57.6 78.1999 57.6 131.3 57.6 184.3V185.8H43.3V43.0999H41.9C36.5 43.0999 31.1 43.0999 25.7 43.0999C23.6 43.0999 21.6 43.1999 19.6 43.4999C16.8 43.8999 15.5 45.2999 15.2 48.0999C14.9 50.8999 14.8 53.7999 14.8 56.6999C14.8 104.3 14.8 151.9 14.8 199.5C14.8 201 15.2 202.4 15.8 203.7C17.9 207.9 21.3 211.3 25.5 213.4C26.8 214 28.2 214.3 29.6 214.3C87.1 214.3 144.5 214.4 202 214.3C204.6 214.3 207.1 214.2 209.7 213.9C212.4 213.6 213.8 212.2 214.2 209.5C214.5 207.5 214.6 205.4 214.6 203.3C214.7 145.2 214.7 86.7999 214.7 28.4999ZM71.9 114.6H200.3V128.7H71.9V114.6ZM157.7 86.0999H200.4V100.2H157.7V86.0999ZM200.2 71.5999H157.6V57.4999H200.2V71.5999ZM157.6 28.9999H200.2V43.0999H157.6V28.9999ZM71.9 28.8999H143.2V100.1H71.9V28.8999ZM86.2 85.8999H128.9V43.1999H86.2V85.8999ZM200.3 157.3H71.9V143.2H200.3V157.3ZM200.3 185.8H71.9V171.7H200.3V185.8Z" />
            </svg>
        </div>
		<div class="i_news-title-name">
			<span>НАШИ НОВОСТИ</span>
		</div>
	</div>

	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"i_news", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "Content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "i_news"
	),
	false
);?>
    <button class="i_news-btn">Все новости</button>
</div>
