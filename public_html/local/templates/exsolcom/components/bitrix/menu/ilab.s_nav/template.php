<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
	<div class="i_side-menu">
		<div class="i_side-menu-container">
			<div class="i_side-menu-title">
				<span>Меню сайта</span>
			</div>

			<div class="i_side-menu-close">
<!--				<img src="/local/templates/exsolcom/ilab/img/svg/closeModal-dark.svg" alt="x">-->
			</div>

			<ul class="left-menu">
				<?
				foreach ($arResult as $arItem):
					if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
						continue;
					?>
					<? if ($arItem["SELECTED"]):?>
					<li class="selected">
						<div class="menu-img">
<!--							<img src="--><?php //=$arItem['PARAMS']['IMG']?><!--" alt="img">-->
						</div>
						<a href="<?= $arItem["LINK"] ?>" class="selected"><?= $arItem["TEXT"] ?></a>
					</li>
				<? else:?>
					<li>
						<div class="menu-img">
<!--							<img src="--><?php //=$arItem['PARAMS']['IMG']?><!--" alt="img">-->
						</div>
						<a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
					</li>
				<? endif ?>

				<? endforeach ?>
			</ul>
		</div>
	</div>
<? endif ?>