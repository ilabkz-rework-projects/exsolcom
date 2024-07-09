<div class="detail-item">
	<div class="detail-item-img"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="<?=$arResult['DETAIL_PICTURE']['SRC']?>"></div>

	<div class="detail-item-content">
		<?if($arResult['I_CONTENT']){?>
			<?=$arResult['I_CONTENT']?>
		<?}else{?>
			<span><?=$arResult['PREVIEW_TEXT']?></span>
		<?}?>
	</div>

	<div class="detail-item-footer">
		<div class="detail-item-footer-price"></div>
		<div class="detail-item-footer-btn">
			<button id="form-kp-btn">Запросить коммерческое предложение</button>
		</div>
	</div>
</div>