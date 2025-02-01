<div class="i_software">
	<div class="i_container">
		<div class="i_software-corporate">
			<!--Иконка с 1С-->
			<div class="i_software-iconAnnounce">
				<!--Иконка background-element-->
				<svg width="382" height="382" viewBox="0 0 800 800" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M571.279 206.324C473.649 119.82 326.329 119.799 228.7 206.303L128.579 106.183C281.62 -35.3944 518.379 -35.3944 671.42 106.183L571.279 206.324ZM230.325 595.045C327.427 679.671 472.615 679.713 569.717 595.088L669.879 695.249C517.303 834.906 282.697 834.927 130.141 695.249L230.325 595.045Z" fill="#FF161F"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M593.697 571.298C679.717 474.197 680.139 327.954 595.048 230.325L695.253 130.121C835.396 283.203 834.911 518.884 693.817 671.417L593.697 571.298ZM206.324 571.277L106.183 671.417C-34.9106 518.884 -35.3961 283.224 104.747 130.121L204.91 230.283C119.798 327.912 120.305 474.175 206.324 571.277Z" />
				</svg>
				<!--Иконка background-element-->
				<!--Изображение 1С-->
                <div class="i_software-block">
                    <div class="i_software-im">
                        <img src="<?=SITE_TEMPLATE_PATH.'/ilab/img/main/Announce-software.png'?>" alt="Announce-software">
                    </div>
                </div>
				<!--Изображение 1С-->
			</div>
			<!--Иконка с 1С-->
			<!--Текст с кнопкой-->
            <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH.'/ilab/inc/main/'.LANGUAGE_ID.'/i_main_software_text.php',Array('SECTION_ID' => $arParams['SECTION_ID'], 'IBLOCK_ID' => $arParams['IBLOCK_ID']),Array('MODE'=>'html', 'NAME'=>'Линейка кормпоративных продуктов', 'SHOW_BORDER'=>true))?>
            <!--Текст с кнопкой-->
		</div>
	</div>
</div>