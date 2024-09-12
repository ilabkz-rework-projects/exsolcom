<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
use Ilab\Data\iGet;
// ---------------------------------------------------------------------------------------------------- iLaB
if($arResult):?>
	<div class="i_projects-element">
		<?foreach ($arResult['ELEMENT'] as $element){?>
			<div class="i_projects-element__item" id="<?=$element['ID']?>" data_iblock_id="5">
				<div class="i_projects-element__item__img">
					<img src="<?=$element['IMAGES']?>" alt="<?=$element['NAME']?>">
				</div>
				<div class="i_projects-element__content">
					<div class="i_projects-element__item__name">
						<span><?=$element['NAME']?></span>
					</div>
					<div class="i_projects-element__item__text">
						<span><?echo LANGUAGE_ID === 'ru' ? $element['PREVIEW_TEXT'] : $element['I_PREVIEW_TEXT_'.strtoupper(LANGUAGE_ID)]['VALUE']?></span>
					</div>
				</div>
			</div>
		<?}?>
	</div>
<?endif
// ---------------------------------------------------------------------------------------------------- iLaB?>



<?/*if($USER->isAdmin()):?>
	<pre><?print_r($arResult)?></pre>
<?endif*/?>

<?
echo '<pre>';
print_r($arResult);
echo '</pre>';
?>
