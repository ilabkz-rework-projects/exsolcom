<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
// ---------------------------------------------------------------------------------------------------- iLaB
if($arResult):?>
	<div class="i_projects-section">
		<?foreach ($arResult['ELEMENT'] as $element){?>
			<div class="i_projects-section__item">
				<a href="<?=$element['SECTION_PAGE_URL']?>" class="i_projects-item">
					<div class="i_projects-section__item__img">
						<img src="<?=$element['IMAGES']?>" alt="<?=$element['NAME']?>">
					</div>
					<div class="i_projects-section__item__name">
						<span><?=$element['UF_SECTION_NAME_'.strtoupper(LANGUAGE_ID)]?></span>
					</div>
				</a>
			</div>
		<?}?>
	</div>
<?endif
// ---------------------------------------------------------------------------------------------------- iLaB?>



<?/*if($USER->isAdmin()):?>
	<pre><?print_r($arResult)?></pre>
<?endif*/?>