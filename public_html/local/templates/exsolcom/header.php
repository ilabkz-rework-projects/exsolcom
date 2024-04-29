<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>>">
<head>
    <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowPanel();
    ?>
</head>
<header class="i_header">
    <div class="i_container">
        <!--HEADER LEFT-->
        <div class="i_header-left">
            <!--HEADER BURGER-->
            <div class="i_header-burger">
                <img src="<?=SITE_TEMPLATE_PATH.'/ilab/img/svg/burger-icon.svg'?>" alt="burger-icon">
            </div>
            <!--!HEADER BURGER-->

            <!--HEADER MENU-->
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/ilab/inc/header_menu.php',Array(),Array('MODE'=>'html', 'NAME'=>'Вверхнее меню', 'SHOW_BORDER'=>false))// Menu?>
            <!--!HEADER MENU-->
        </div>
        <!--!HEADER LEFT-->

        <!--HEADER RIGHT-->
        <div class="i_header-right">
            <!--HEADER BLOG-->
            <button class="i_header-blog">Блог</button>
            <!--!HEADER BLOG-->

            <!--HEADER MORE-->
            <div class="i_header-more">
                <div class="i_header-circles">
                    <span>RU</span>
                </div>
                <div class="i_header-circles">
                    <img src="<?=SITE_TEMPLATE_PATH.'/ilab/img/svg/lupa-icon.svg'?>" alt="burger-icon">
                </div>
                <div class="i_header-circles">
                    <img c src="<?=SITE_TEMPLATE_PATH.'/ilab/img/svg/whatsapp-icon.svg'?>" alt="burger-icon">
                </div>
                <div class="i_header-circles">
                    <img src="<?=SITE_TEMPLATE_PATH.'/ilab/img/svg/email-icon.svg'?>" alt="burger-icon">
                </div>
            </div>
            <!--!HEADER MORE-->
        </div>
        <!--!HEADER RIGHT-->
    </div>
</header>
