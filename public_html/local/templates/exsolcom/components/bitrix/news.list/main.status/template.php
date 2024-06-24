<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="i_our-status-group-blocks">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="i_our-status-group-blocks-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="i_our-status-group-blocks-item-bgIcon">
				<svg width="147" height="147" viewBox="0 0 147 147" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_504_76)">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M76.411 120.92C100.336 119.474 119.48 100.335 120.926 76.4103L146.944 76.4103C145.454 114.691 114.692 145.454 76.411 146.943L76.411 120.92ZM70.2042 26.111C46.5918 27.732 27.7217 46.5911 26.1008 70.2035L0.0720742 70.2035C1.75064 32.2328 32.2308 1.7472 70.2014 0.0741277L70.2042 26.111Z" fill="#F0F0F0"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M26.0753 76.4101C27.5152 100.203 46.4622 119.26 70.2034 120.889L70.2034 146.929C32.1039 145.248 1.54415 114.562 0.057588 76.4101L26.0753 76.4101ZM76.4102 26.0807L76.4102 0.0574822C114.562 1.54405 145.245 32.101 146.929 70.2033L120.9 70.2033C119.274 46.4593 100.204 27.5206 76.4102 26.0807Z" fill="#E4CCCD"/>
					</g>
					<defs>
						<clipPath id="clip0_504_76">
							<rect width="147" height="147" fill="white" transform="translate(147) rotate(90)"/>
						</clipPath>
					</defs>
				</svg>
			</div>
			<div class="i_our-status-group-blocks-item-icon">
				<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="picture-9-Technical-Director">
			</div>
			<div class="i_our-status-group-blocks-item-name">
				<span><?=$arItem['NAME']?></span>
			</div>
		</div>
	<?endforeach;?>
</div>
