<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */

$arResult['I_CONTENT'] = file_get_contents($_SERVER["DOCUMENT_ROOT"].$arResult['PROPERTIES']['I_CONTENT_LINK']['VALUE']);
