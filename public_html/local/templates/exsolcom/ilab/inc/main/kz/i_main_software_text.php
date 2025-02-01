<?php

$resProgramm = CIBlockSection::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arParams['SECTION_ID'], 'ACTIVE' => 'Y'], false, ['ID', 'CODE', 'NAME', 'UF_SECTION_NAME_RU', 'UF_SECTION_NAME_KZ', 'UF_SECTION_NAME_EN']);

while($programmOb = $resProgramm->Fetch()) {
	$sectionName = $programmOb['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)];
}

?>

<div class="i_software-group-textBtn">
	<div class="i_software-group-text">
		<span class="i_software-headline"><?=$sectionName ? $sectionName : 'Қазақстанға арналған корпоративтік өнімдер желісі'?></span>
		<p class="i_software-desc">
			Қаржыны басқару және есеп жүргізу міндеттерін шешуге арналған, жекелеген кәсіпорындар үшін де, топтарға
			(холдингтер, конгломераттар, компаниялар тобы) біріктірілген кәсіпорындар үшін де қолайлы.
		</p>
	</div>
	<div class="i_software-btn">
		<button id="form-kp-btn">Баға тізімі мен коммерциялық ұсыныс сұрау</button>
	</div>
</div>