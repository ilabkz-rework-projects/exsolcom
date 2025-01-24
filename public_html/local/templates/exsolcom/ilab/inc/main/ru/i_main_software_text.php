<?php

if($_SESSION['CURRENT_SECTION_NAME']){
	$sectionName = $_SESSION['CURRENT_SECTION_NAME'];
	unset($_SESSION['CURRENT_SECTION_NAME']);
}else{
	$sectionName = 'Линейка корпоративных продуктов для Казахстана';
}

?>


<div class="i_software-group-textBtn">
	<div class="i_software-group-text">
		<span class="i_software-headline"><?=$sectionName?></span>
		<p class="i_software-desc">
			Предназначена для решения задач управления финансами и ведения учета, как обособленных предприятий, так и предприятий, объединенных в группы (холдинги, конгломераты, группы компаний).
		</p>
	</div>
	<div class="i_software-btn">
		<button id="form-kp-btn">Запросить прайс лист и КП</button>
	</div>
</div>