<?php
use Bitrix\Main\Loader;

Loader::includeModule('iblock');

$resProgramm = \CIBlockSection::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arParams['SECTION_ID'], 'ACTIVE' => 'Y'], false, ['ID', 'CODE', 'NAME', 'UF_SECTION_NAME_RU', 'UF_SECTION_NAME_KZ', 'UF_SECTION_NAME_EN']);

while($programmOb = $resProgramm->Fetch()) {
	$sectionName = $programmOb['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)];
}

?>


<div class="i_software-group-textBtn">
	<div class="i_software-group-text">
		<span class="i_software-headline"><?=$sectionName ? $sectionName : 'Линейка программных продуктов фирмы "1С" для Казахстана'?></span>
		<p class="i_software-desc">
			Предназначена для решения задач управления финансами и ведения учета, как обособленных предприятий, так и предприятий, объединенных в группы (холдинги, конгломераты, группы компаний).
		</p>
	</div>
	<div class="i_software-btn">
		<button id="form-kp-btn">Запросить прайс лист и КП</button>
	</div>
</div>

