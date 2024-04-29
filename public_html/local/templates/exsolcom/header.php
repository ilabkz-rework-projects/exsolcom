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
	<div class="i_header-burger"></div>
	<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/ilab/inc/header_menu.php',Array(),Array('MODE'=>'html', 'NAME'=>'Вверхнее меню', 'SHOW_BORDER'=>false))// Menu?>
	<div class="i_header-blog"></div>
	<div class="i_header-more"></div>
</header>
