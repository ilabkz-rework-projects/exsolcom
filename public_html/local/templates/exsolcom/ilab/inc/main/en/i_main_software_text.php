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
		<span class="i_software-headline"><?=$sectionName ? $sectionName : '"1C" company\'s software product line for Kazakhstan'?></span>

		<p class="i_software-desc">
            Designed to address financial management and accounting tasks for both standalone companies and companies united in groups (holdings, conglomerates, groups of companies).
		</p>
	</div>
	<div class="i_software-btn">
		<button id="form-kp-btn">Request a Price List<br>
            and Commercial Offer</button>

	</div>
</div>

