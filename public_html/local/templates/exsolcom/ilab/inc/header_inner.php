<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
?>

<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>>">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<head>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowPanel();
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<header class="i_header">
    <div class="i_container">
        <!--HEADER LEFT-->
        <div class="i_header-left">
            <!--HEADER BURGER-->
            <button class="i_header-burger">
                <svg width="14" height="14" viewBox="0 0 125 124" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M117 70H8C3.6 70 0 66.4 0 62C0 57.6 3.6 54 8 54H117C121.4 54 125 57.6 125 62C125 66.4 121.4 70 117 70ZM117 16H8C3.6 16 0 12.4 0 8C0 3.6 3.6 0 8 0H117C121.4 0 125 3.6 125 8C125 12.4 121.4 16 117 16ZM8 108H117C121.4 108 125 111.6 125 116C125 120.4 121.4 124 117 124H8C3.6 124 0 120.4 0 116C0 111.6 3.6 108 8 108Z" />
                </svg>
            </button>
            <!--!HEADER BURGER-->

            <!--HEADER MENU-->
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/ilab/inc/header_menu.php',Array(),Array('MODE'=>'html', 'NAME'=>'Вверхнее меню', 'SHOW_BORDER'=>false))// Menu?>
            <!--!HEADER MENU-->
        </div>
        <!--!HEADER LEFT-->

        <!--HEADER RIGHT-->
        <div class="i_header-right">
            <!--HEADER BURGER-->
            <button class="i_header-burger">
                <svg class="menu-burger" width="14" height="14" viewBox="0 0 125 124" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M117 70H8C3.6 70 0 66.4 0 62C0 57.6 3.6 54 8 54H117C121.4 54 125 57.6 125 62C125 66.4 121.4 70 117 70ZM117 16H8C3.6 16 0 12.4 0 8C0 3.6 3.6 0 8 0H117C121.4 0 125 3.6 125 8C125 12.4 121.4 16 117 16ZM8 108H117C121.4 108 125 111.6 125 116C125 120.4 121.4 124 117 124H8C3.6 124 0 120.4 0 116C0 111.6 3.6 108 8 108Z" />
                </svg>
            </button>
            <!--!HEADER BURGER-->
            <!--HEADER BLOG-->
            <button class="i_header-blog">Блог</button>
            <!--!HEADER BLOG-->

            <!--HEADER MORE-->
            <div class="i_header-more">
                <button id="language" class="i_language-selector">
                    <span id="selectedText">RU</span>
                    <div class="text-container">
                        <div class="text-option" data-value="RU">RU</div>
                        <div class="text-option" data-value="KZ">KZ</div>
                        <div class="text-option" data-value="EN">EN</div>
                    </div>
                </button>
                <button class="i_search-wrapper">
                    <svg class="lupa-icon" width="18" height="18" viewBox="0 0 173 173" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M169.9 170C166.8 173.1 161.7 173.1 158.6 170L110.2 121.6C80.6997 144.8 37.9997 139.8 14.6997 110.3C-8.50034 80.8 -3.50034 38.1 25.9997 14.8C55.4997 -8.4 98.1997 -3.4 121.5 26.1C140.9 50.8 140.9 85.6 121.5 110.3L169.9 158.7C173.1 161.8 173.1 166.8 169.9 170C170 169.9 170 169.9 169.9 170ZM105.6 30.7C84.8997 9.99999 51.2997 9.99999 30.5997 30.7C9.89967 51.4 9.89967 85 30.5997 105.7C51.2997 126.4 84.8997 126.4 105.6 105.7C126.3 84.9 126.3 51.4 105.6 30.7Z" />
                    </svg>
<!--                    <div id="title-search" class="i_search">-->
<!--                        <span class="i_search-close"></span>-->
<!--                        <form action="/search/index.php">-->
<!--                            <input id="title-search-input" class="color-text" type="text" placeholder="Искать на сайте" maxlength="50" autocomplete="off" size="10">-->
<!--                            <div class="search_button">-->
<!--                                <svg class="lupa-icon2" width="18" height="18" viewBox="0 0 173 173" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M169.9 170C166.8 173.1 161.7 173.1 158.6 170L110.2 121.6C80.6997 144.8 37.9997 139.8 14.6997 110.3C-8.50034 80.8 -3.50034 38.1 25.9997 14.8C55.4997 -8.4 98.1997 -3.4 121.5 26.1C140.9 50.8 140.9 85.6 121.5 110.3L169.9 158.7C173.1 161.8 173.1 166.8 169.9 170C170 169.9 170 169.9 169.9 170ZM105.6 30.7C84.8997 9.99999 51.2997 9.99999 30.5997 30.7C9.89967 51.4 9.89967 85 30.5997 105.7C51.2997 126.4 84.8997 126.4 105.6 105.7C126.3 84.9 126.3 51.4 105.6 30.7Z" />-->
<!--                                </svg>-->
<!--                                <input name="s" type="submit" value="Найти">-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
                </button>
                <button id="myCircles" class="i_header-circles i_header_select">
                    <a href="tel:+77005010039" class="i_phone_wpp">
                        <svg class="whatsapp-icon" width="18" height="18" viewBox="0 0 180 182" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M179.801 94.4C179.201 105.1 176.601 115.6 172.201 125.3C161.501 149.2 140.601 167.2 115.401 174.2C110.501 175.6 105.501 176.5 100.401 177C95.5008 177.5 90.5008 177.6 85.6008 177.2C73.1008 176.4 60.9008 172.8 49.8008 166.8C49.3008 166.5 48.7008 166.5 48.2008 166.6C32.5008 171.7 16.7008 176.7 1.00078 181.7C0.800778 181.8 0.600781 181.8 0.300781 181.9C0.400781 181.6 0.500778 181.3 0.500778 181.1C5.60078 165.8 10.8008 150.6 15.9008 135.3C16.1008 134.8 16.0008 134.2 15.7008 133.8C7.10077 119.2 2.80078 102.5 3.50078 85.5C5.00078 46.9 31.5008 13.7 68.8008 3.69996C73.7008 2.39996 78.7008 1.49997 83.7008 1.09997C88.7008 0.599973 93.8008 0.599967 98.8008 0.999967C137.001 4.09997 168.901 31.6 177.601 69C178.701 73.5 179.301 78.1 179.701 82.7C180.001 86.8 180.101 90.6 179.801 94.4ZM163.201 72.5C159.301 55.6 149.401 40.6 135.401 30.3C121.501 19.9 104.301 14.8 87.0008 16C82.1008 16.3 77.3008 17.1 72.6008 18.4C52.6008 23.8 35.7008 37.5 26.3008 56C13.8008 80.3 16.0008 109.6 31.9008 131.9C32.2008 132.3 32.3008 132.8 32.1008 133.2C29.3008 141.4 26.6008 149.5 23.8008 157.7C23.6008 158.3 23.4008 158.9 23.1008 159.7C23.5008 159.6 23.7008 159.5 24.0008 159.4C30.4008 157.4 36.8008 155.3 43.2008 153.3C45.7008 152.5 48.3008 151.7 50.8008 150.9C51.1008 150.8 51.5008 150.8 51.8008 151C52.0008 151.1 52.1008 151.2 52.3008 151.4C62.2008 157.7 73.5008 161.6 85.2008 162.6C89.8008 163 94.3008 163 98.9008 162.5C104.001 162 109.001 161 113.901 159.4C143.101 150.1 163.501 123.7 165.101 93.1C165.501 86.1 164.901 79.2 163.201 72.5ZM132.201 127.1C129.101 129.7 125.401 131.6 121.501 132.7C121.001 132.8 120.401 132.9 119.901 132.9C119.301 133 118.701 133 118.101 133.2C116.101 133.6 114.001 133.6 111.901 133.1C109.201 132.5 106.701 131.7 104.101 130.7C100.201 129.2 96.2008 127.6 92.3008 125.9C86.0008 123 80.2008 119.1 75.1008 114.4C67.9008 107.8 61.6008 100.2 56.5008 91.8C55.1008 89.5 53.6008 87.3 52.3008 84.9C50.3008 81.3 48.9008 77.4 48.1008 73.3C47.7008 71.5 47.6008 69.8 47.6008 68C47.5008 62.1 49.5008 56.4 53.2008 51.9C54.2008 50.7 55.3008 49.5 56.5008 48.4C58.4008 46.6 61.1008 45.8 63.8008 46.2C65.0008 46.4 66.2008 46.4 67.5008 46.4C68.6008 46.4 69.6008 46.9 70.2008 47.7C70.8008 48.5 71.3008 49.4 71.6008 50.3C72.5008 52.8 73.4008 55.3 74.4008 57.8C75.6008 61.1 76.9008 64.4 78.1008 67.7C78.6008 68.9 78.5008 70.3 77.9008 71.4C76.8008 73.4 75.4008 75.2 73.8008 76.8C73.1008 77.5 72.4008 78.2 71.7008 78.9C71.5008 79 71.4008 79.2 71.3008 79.4C70.3008 80.3 70.0008 81.8 70.8008 83C71.3008 84 71.9008 85 72.5008 86C75.1008 90.5 78.3008 94.7 82.0008 98.4C86.7008 103.2 92.1008 107.1 98.1008 110C99.1008 110.5 100.001 111 101.001 111.4C101.301 111.5 101.601 111.7 101.901 111.8C103.101 112.3 104.501 112 105.301 111C106.101 110.2 106.801 109.4 107.601 108.6C109.501 106.4 111.301 104.3 113.101 102.1C113.901 100.8 115.501 100.3 116.901 100.9C117.701 101.2 118.501 101.5 119.301 101.9C123.801 104.3 128.401 106.7 132.901 109.1C133.701 109.5 134.401 109.9 135.201 110.3C135.601 110.5 135.901 110.7 136.301 110.9C137.201 111.4 137.701 112.3 137.701 113.4C137.601 116 137.201 118.6 136.401 121C135.501 123.5 134.101 125.5 132.201 127.1Z" />
                        </svg>
                    </a>
                    <span class="i_drop j_drop">
	                     <svg class="whatsapp-icon" width="18" height="18" viewBox="0 0 180 182" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M179.801 94.4C179.201 105.1 176.601 115.6 172.201 125.3C161.501 149.2 140.601 167.2 115.401 174.2C110.501 175.6 105.501 176.5 100.401 177C95.5008 177.5 90.5008 177.6 85.6008 177.2C73.1008 176.4 60.9008 172.8 49.8008 166.8C49.3008 166.5 48.7008 166.5 48.2008 166.6C32.5008 171.7 16.7008 176.7 1.00078 181.7C0.800778 181.8 0.600781 181.8 0.300781 181.9C0.400781 181.6 0.500778 181.3 0.500778 181.1C5.60078 165.8 10.8008 150.6 15.9008 135.3C16.1008 134.8 16.0008 134.2 15.7008 133.8C7.10077 119.2 2.80078 102.5 3.50078 85.5C5.00078 46.9 31.5008 13.7 68.8008 3.69996C73.7008 2.39996 78.7008 1.49997 83.7008 1.09997C88.7008 0.599973 93.8008 0.599967 98.8008 0.999967C137.001 4.09997 168.901 31.6 177.601 69C178.701 73.5 179.301 78.1 179.701 82.7C180.001 86.8 180.101 90.6 179.801 94.4ZM163.201 72.5C159.301 55.6 149.401 40.6 135.401 30.3C121.501 19.9 104.301 14.8 87.0008 16C82.1008 16.3 77.3008 17.1 72.6008 18.4C52.6008 23.8 35.7008 37.5 26.3008 56C13.8008 80.3 16.0008 109.6 31.9008 131.9C32.2008 132.3 32.3008 132.8 32.1008 133.2C29.3008 141.4 26.6008 149.5 23.8008 157.7C23.6008 158.3 23.4008 158.9 23.1008 159.7C23.5008 159.6 23.7008 159.5 24.0008 159.4C30.4008 157.4 36.8008 155.3 43.2008 153.3C45.7008 152.5 48.3008 151.7 50.8008 150.9C51.1008 150.8 51.5008 150.8 51.8008 151C52.0008 151.1 52.1008 151.2 52.3008 151.4C62.2008 157.7 73.5008 161.6 85.2008 162.6C89.8008 163 94.3008 163 98.9008 162.5C104.001 162 109.001 161 113.901 159.4C143.101 150.1 163.501 123.7 165.101 93.1C165.501 86.1 164.901 79.2 163.201 72.5ZM132.201 127.1C129.101 129.7 125.401 131.6 121.501 132.7C121.001 132.8 120.401 132.9 119.901 132.9C119.301 133 118.701 133 118.101 133.2C116.101 133.6 114.001 133.6 111.901 133.1C109.201 132.5 106.701 131.7 104.101 130.7C100.201 129.2 96.2008 127.6 92.3008 125.9C86.0008 123 80.2008 119.1 75.1008 114.4C67.9008 107.8 61.6008 100.2 56.5008 91.8C55.1008 89.5 53.6008 87.3 52.3008 84.9C50.3008 81.3 48.9008 77.4 48.1008 73.3C47.7008 71.5 47.6008 69.8 47.6008 68C47.5008 62.1 49.5008 56.4 53.2008 51.9C54.2008 50.7 55.3008 49.5 56.5008 48.4C58.4008 46.6 61.1008 45.8 63.8008 46.2C65.0008 46.4 66.2008 46.4 67.5008 46.4C68.6008 46.4 69.6008 46.9 70.2008 47.7C70.8008 48.5 71.3008 49.4 71.6008 50.3C72.5008 52.8 73.4008 55.3 74.4008 57.8C75.6008 61.1 76.9008 64.4 78.1008 67.7C78.6008 68.9 78.5008 70.3 77.9008 71.4C76.8008 73.4 75.4008 75.2 73.8008 76.8C73.1008 77.5 72.4008 78.2 71.7008 78.9C71.5008 79 71.4008 79.2 71.3008 79.4C70.3008 80.3 70.0008 81.8 70.8008 83C71.3008 84 71.9008 85 72.5008 86C75.1008 90.5 78.3008 94.7 82.0008 98.4C86.7008 103.2 92.1008 107.1 98.1008 110C99.1008 110.5 100.001 111 101.001 111.4C101.301 111.5 101.601 111.7 101.901 111.8C103.101 112.3 104.501 112 105.301 111C106.101 110.2 106.801 109.4 107.601 108.6C109.501 106.4 111.301 104.3 113.101 102.1C113.901 100.8 115.501 100.3 116.901 100.9C117.701 101.2 118.501 101.5 119.301 101.9C123.801 104.3 128.401 106.7 132.901 109.1C133.701 109.5 134.401 109.9 135.201 110.3C135.601 110.5 135.901 110.7 136.301 110.9C137.201 111.4 137.701 112.3 137.701 113.4C137.601 116 137.201 118.6 136.401 121C135.501 123.5 134.101 125.5 132.201 127.1Z" />
                        </svg>
                        <a href="tel:+77005010039">+7 700 501 00 39</a>
                    </span>
                    <span class="close_hide_menu"></span>
                </button>
                <button class="i_header-circles" id="submit-btn">
                    <svg class="email-icon" width="18" height="14" viewBox="0 0 184 143" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M170 143H14C6.3 143 0 136.7 0 129V14C0 6.3 6.3 0 14 0H170C177.7 0 184 6.3 184 14V129C184 136.7 177.7 143 170 143ZM97.8 106.1C94.6 109.2 89.5 109.2 86.3 106.1L68 87.8L28.8 127H155.2L116 87.8L97.8 106.1ZM16 117.2L56.7 76.5L16 35.8V117.2ZM18.8 16L92 89.2L165.2 16H18.8ZM127.3 76.5L168 117.2V35.8L127.3 76.5Z" />
                    </svg>
                </button>
            </div>
            <!--!HEADER MORE-->
        </div>
        <!--!HEADER RIGHT-->
    </div>
</header>
