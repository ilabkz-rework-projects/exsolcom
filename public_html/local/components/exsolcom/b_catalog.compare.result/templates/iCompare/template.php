<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use Ilab\Core\Transform;

Loc::loadMessages(Bitrix\Main\Application::getDocumentRoot() . SITE_TEMPLATE_PATH . '/header.php');

$l = $arParams['I_LANGUAGE_ID'];

//	---------------------------------------------------------------------------------------------------- iLaB Powered
if ($arResult['ITEMS']):?>
	<!-- scrollBar -->
	<div class="ilab_c_pag_hor">
		<div class="ilab_c_characteristics_title"><?= Loc::getMessage('COMP_CHARACTERISTICS', false, $l); ?></div>
		<div class="ilab_c_ph_left j_ph_left idnone"></div>
		<div class="ilab_c_ph_scroll j_ph_scroll"></div>
		<div class="ilab_c_ph_right j_ph_right idnone"></div>
	</div>
	<div class="ilab_c_pag_ver">
		<div class="ilab_c_pv_top j_pv_top idnone"></div>
		<div class="ilab_c_pv_scroll j_pv_scroll"></div>
		<div class="ilab_c_pv_bottom j_pv_bottom idnone"></div>
	</div>
	<!-- scrollBar -->

	<div class="swiper-container ilab_c_products j_products i_cs_tile">
		<div class="swiper-wrapper">
			<!-- Product -->
			<div class="swiper-slide ilab_c_pinfo j_pinfo">
				<div class="ilab_c_ct_product"><?= Loc::getMessage('COMP_PRODUCT', false, $l) ?></div>
				<div class="ilab_c_ct_incompare"><?= Loc::getMessage('COMP_IN_COMPARE', false, $l) ?></div>
				<div class="ilab_c_ct_count">
							<span class="j_comp_count"
							      data-message='["<?= implode('","', Loc::getMessage('COMP_DEC_PRODUCT', false, $l)) ?>"]'>
								<?= i_declOfNum(count($arResult['ITEMS']), Loc::getMessage('COMP_DEC_PRODUCT', false, $l)) ?>
							</span>
					<span class="j_comp_cunit"></span>
				</div>
			</div>
			<? foreach ($arResult['ITEMS'] as $k => $e):?>
				<? if ($_SESSION['CURRENCY'][$_SESSION['CURRENT_CURRENCY']]) {
					$pr = preg_split('/\s(?=[^0-9])/', $e['MIN_PRICE']['PRINT_DISCOUNT_VALUE']);// массивы вида [0]=>88 990,00 [1]=>тг.
					$string = str_replace(' ', '', $pr[0]);
					$number = intval($string);
					$number = ceil($number / $_SESSION['CURRENCY'][$_SESSION['CURRENT_CURRENCY']]['RATE']);
					$formattedNumber = number_format($number, 0, '.', ' ');
					if ($_SESSION['CURRENCY'][$_SESSION['CURRENT_CURRENCY']]['CURRENCY'] == 'RUB') {
						$e['I_CURRENCY_MIN_OFFER_PRICE_FORMATTED'] = $formattedNumber . ' ₽';
					} elseif ($_SESSION['CURRENCY'][$_SESSION['CURRENT_CURRENCY']]['CURRENCY'] == 'USD') {
						$e['I_CURRENCY_MIN_OFFER_PRICE_FORMATTED'] = $formattedNumber . ' $';
					}
				} else {
					$e['I_CURRENCY_MIN_OFFER_PRICE_FORMATTED'] = $e['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];
				}
				?>
				<div class="swiper-slide ilab_c_item i_item jq_item">
					<div class="ilab_c_i_remove_compare j_remove_compare" data-id="<?= $e['ID'] ?>"
					     data-iblock_id="<?= $e['IBLOCK_ID'] ?>">
						<span><?= Loc::getMessage('COMP_REMOVE', false, $l) ?></span></div>
					<div class="ilab_c_i_block_compare">
                        <div class="i_image-programm-product-box">
                            <a class="ilab_c_i_image swiper-lazy<? if (!$e['PREVIEW_PICTURE']['SRC']) echo ' ilab_c_i_nophoto' ?>"
                               href="<?= $e['DETAIL_PAGE_URL'] ?>"<? if ($e['PREVIEW_PICTURE']['SRC']) echo ' style="background-image: url(' . $e['PREVIEW_PICTURE']['SRC'] . ')"' ?>></a>
                        </div>
                        <a class="ilab_c_i_name"
                           href="<?= $e['DETAIL_PAGE_URL'] ?>"><? echo ($e['PROPERTIES']['I_NAME_' . strtoupper(LANGUAGE_ID)]['VALUE']) ? $e['PROPERTIES']['I_NAME_' . strtoupper(LANGUAGE_ID)]['VALUE'] : $e['NAME'] ?></a>
						<div class="ilab_c_i_price i_item_price">
							<div class="i_item_price">
								<?if ($e['PROPERTIES']['I_PRICE']['VALUE']):
									$min = preg_split('/\s(?=[^0-9])/', $e['PROPERTIES']['I_PRICE']['VALUE'])?>

									<span class="i_pr_min">
						<span class="i_price"><?= $min[0] ?></span>&nbsp;<span class="i_currency"><?= $min[1] ?>₸</span>
					</span>
								<? elseif ($e['PRINT_MIN_OFFER_PRICE']):
									$off = preg_split('/\s(?=[^0-9])/', $e['PRINT_MIN_OFFER_PRICE']); ?>
									<span class="i_pr_off">
						<span class="i_pr_from"><?= GetMessage('FROM') ?></span>&nbsp;<span
												class="i_price<? //if( strlen($e['MIN_OFFER_PRICE'])>7 )echo ' ifont130'
												?>"><?= $off[0] ?></span>&nbsp;<span
												class="i_currency"><?= $off[1] ?></span>
					</span>
								<? else:
									echo '<div class="i_noprice">Цена по запросу</div>';
								endif ?>
							</div>
						</div>

						<div class="ilab_c_i_buy i_item_buy">
							<? if (!$e['I_TRADE_OFFERS'] && $e['CATALOG_QUANTITY'] > 0):?>
								<div class="i_count jq_count"<? if ($e['PROPERTIES']['I_MULTI_PRICE']['VALUE'] == 'Y') echo ' style="display: none"' ?>>
									<span class="i_co_minu jq_cop_minu"></span>
									<input class="i_co_numb jq_copnumb" type="text"
									       value="<?= $e['CATALOG_MEASURE_RATIO'] ?>"
									       jqmeasure="<?= $e['CATALOG_MEASURE_RATIO'] ?>">
									<span class="i_co_plus jq_cop_plus"></span>
								</div>
							<? endif ?>
							<? // -------------------------------------------------- Количество
							?>

							<? // -------------------------------------------------- Купить
							?>
							<? if ($e['I_TRADE_OFFERS']):?>
								<a href="<?= $e['DETAIL_PAGE_URL'] ?>"
								   class="i_buy_button i_sec_to_order"><?= GetMessage('READ_MORE') ?></a>
							<? elseif ($e['CAN_BUY']):?>

								<a href="<?= $e['BUY_URL'] ?>" class="i_buy_button jq_buy" jq_id="<?= $e['ID'] ?>"
								   jqcount="1"
								   price="<? if ($e['MIN_PRICE']['DISCOUNT_VALUE']) echo $e['MIN_PRICE']['DISCOUNT_VALUE'] ?>"
								   jqcount="<?= $e['CATALOG_MEASURE_RATIO'] ?>"<? if ($e['PROPERTIES']['I_MULTI_PRICE']['VALUE'] == 'Y') echo ' style="display:none"' ?>><?= GetMessage('BUY') ?></a>
								<a href="<?= SITE_DIR ?>personal/basket.php" class="i_buy_bought jq_bought idn">
									<span class="i_text"><?= GetMessage('IN_BASKET') ?>:</span>&nbsp;
									<span class="i_m_ratio j_m_ratio"><?= $e['CATALOG_MEASURE_RATIO'] ?></span>&nbsp;
									<span class="i_m_name j_m_name"><?= $e['CATALOG_MEASURE_NAME'] ?></span>
								</a>
								<div class="i_item_remove jq_item_remove idn" data-id="<? //=$e['ID']
								?>"></div>
								<? /*<div class="i_buy_succes jq_buy_succes idn">
						<div class="i_bs_close jq_bs_close"></div>
						<?=GetMessage('ADD_BASKET_SUCCES')?>
					</div>*/
								?>
								<div class="i_buy_succes jq_buy_succes idn" data-quan="<?= $e['CATALOG_QUANTITY'] ?>">
									<div class="i_bs_close jq_bs_close"></div>
									<span class="j_bask_succes idn">
							 <?= GetMessage('ADD_BASKET_SUCCES') ?>
						</span>
									<span class="j_quan_miss idn">
							 <?= GetMessage('ADD_BASKET_MISS', array("#MEASURE#" => $e['CATALOG_MEASURE_NAME'])) ?>
						</span>
								</div>

								<? // -------------------------------------------------- Купить количество
								?>
								<? if ($e['PROPERTIES']['I_MULTI_PRICE']['VALUE'] == 'Y'):?>
									<div class="i_datext jq_datext"><span><?= GetMessage('DISCOUNT_AMOUNT') ?></span>
									</div>

									<? if ($arParams['I_SHOW_NUMBER'] == 'Y'):?>
										<div class="i_mbuy jq_mbuy jq_buy_count idn">
											<div class="i_mbuy_close jq_mbuy_close">×</div>
											<div class="i_mbuy_title">Скидка на количество</div>
											<div class="i_mbuy_info">
												Вы можете получить скидку
												<br>
												увеличив количество товара!
											</div>
											<? if ($arParams['I_PRICE_MATRIX'] == 'Y' && $e['PRICE_MATRIX']):?>
												<?
												$params['PRICE_MATRIX'] = $e['PRICE_MATRIX'];
												$params['FIRST_MATRIX_ID'] = $e['ID'];
												$params['PRICE_MATRIX_OFFERS'] = $e['PRICE_MATRIX_OFFERS'];
												$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/ilab/tmpl/mprice.php', $params, array('MODE' => 'html', 'NAME' => 'Расчёт мультицен', 'SHOW_BORDER' => false))// MULTI PRICE
												?>
											<?endif ?>
											<div class="i_mprice">
												<span class="i_mtotal"><?= GetMessage('TOTAL_PRICE') ?></span><b
														class="i_mtnumb jq_mtnumb"
														jqmsum="<?= $e['MIN_PRICE']['DISCOUNT_VALUE'] ?>"><?= $e['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] ?></b>
											</div>
											<div class="i_msaving">
												<span class="i_mstxt"><?= GetMessage('M_SAVING') ?></span> <span
														class="i_msnumb jq_msnumb">-<?= $e['MIN_PRICE']['PRINT_DISCOUNT_DIFF'] ?></span>
											</div>

											<?//<div class="i_mbot">
											?>

											<?// -------------------------------------------------- Количество/Кнопка купить
											?>
											<div class="i_item_buy">
												<?// -------------------------------------------------- Количество
												?>
												<? if (!$e['I_TRADE_OFFERS'] && $e['CATALOG_QUANTITY'] > 0):?>
													<div class="i_count jq_count">
														<span class="i_co_minu jq_cop_minu"></span>
														<input class="i_co_numb jq_copnumb" type="text"
														       value="<?= $e['CATALOG_MEASURE_RATIO'] ?>"
														       jqmeasure="<?= $e['CATALOG_MEASURE_RATIO'] ?>">
														<span class="i_co_plus jq_cop_plus"></span>
													</div>
												<?endif ?>
												<?// -------------------------------------------------- Количество
												?>

												<?// -------------------------------------------------- Купить
												?>
												<? if ($e['I_TRADE_OFFERS']):?>
													<a href="<?= $e['DETAIL_PAGE_URL'] ?>"
													   class="i_buy_button i_sec_to_order"><?= GetMessage('READ_MORE') ?></a>
												<? elseif ($e['CAN_BUY']):?>
													<a href="<?= $e['BUY_URL'] ?>" class="i_buy_button jq_buy"
													   jq_id="<?= $e['ID'] ?>" jqcount="1"
													   price="<? if ($e['MIN_PRICE']['DISCOUNT_VALUE']) echo $e['MIN_PRICE']['DISCOUNT_VALUE'] ?>"
													   jqcount="<?= $e['CATALOG_MEASURE_RATIO'] ?>"><?= GetMessage('BUY') ?></a>
													<a href="<?= SITE_DIR ?>personal/basket.php"
													   class="i_buy_bought jq_bought idn">
														<span class="i_text"><?= GetMessage('IN_BASKET') ?>:</span>&nbsp;
														<span class="i_m_ratio j_m_ratio"><?= $e['CATALOG_MEASURE_RATIO'] ?></span>&nbsp;
														<span class="i_m_name j_m_name"><?= $e['CATALOG_MEASURE_NAME'] ?></span>
													</a>
													<div class="i_item_remove jq_item_remove idn" data-id="<?//=$e['ID']
													?>"></div>
													<?/*<div class="i_buy_succes jq_buy_succes idn">
													<div class="i_bs_close jq_bs_close"></div>
													<?=GetMessage('ADD_BASKET_SUCCES')?>
												</div>*/
													?>
													<div class="i_buy_succes jq_buy_succes idn"
													     data-quan="<?= $e['CATALOG_QUANTITY'] ?>">
														<div class="i_bs_close jq_bs_close"></div>
														<span class="j_bask_succes idn">
															 <?= GetMessage('ADD_BASKET_SUCCES') ?>
														</span>
														<span class="j_quan_miss idn">
															 <?= GetMessage('ADD_BASKET_MISS', array("#MEASURE#" => $e['CATALOG_MEASURE_NAME'])) ?>
														</span>
													</div>
												<? else:?>
													<a href="<?= $e['DETAIL_PAGE_URL'] ?>"
													   class="i_buy_button i_sec_to_order"><?= GetMessage('READ_MORE') ?></a>
												<?endif ?>
												<?// -------------------------------------------------- Купить
												?>
											</div>
											<?// -------------------------------------------------- Количество/Кнопка купить
											?>

											<?//</div>
											?>
										</div>
									<?endif;

								endif ?>
								<? // -------------------------------------------------- Купить количество
								?>

							<? else:?>
								<a href="<?= $e['DETAIL_PAGE_URL'] ?>"
								   class="i_buy_button i_sec_to_order"><?= GetMessage('READ_MORE') ?></a>
							<? endif ?>
							<? // -------------------------------------------------- Купить
							?>
							<? /*if( $e['I_TRADE_OFFERS'] ):?>
	<a href="<?=$e['DETAIL_PAGE_URL']?>" class="i_buy_buttom i_bdetail"><?=Loc::getMessage('READ_MORE',false,$l)?></a>
<?elseif( $e['CATALOG_QUANTITY']>0 && $e['PRICES'] ):?>
	<a href="<?=$e['BUY_URL']?>" class="i_buy_buttom jq_buy" jq_id="<?=$e['ID']?>" jqcount="<?=$e['CATALOG_MEASURE_RATIO']?>"><?=Loc::getMessage('BUY',false,$l)?></a>
	<a href="<?=SITE_DIR?>personal/basket.php" class="i_buy_bought jq_bought idnone" jqbatxt="<?=Loc::getMessage('IN_BASKET',false,$l)?>" jqbacount="<?=$e['CATALOG_MEASURE_RATIO']?>" jqbameasure="<?=$e['CATALOG_MEASURE_NAME']?>"></a>
	<div class="i_delete_item jq_delete_item idnone" jqid="<?//=$e['ID']?>"></div>
	<div class="i_buy_succes jq_buy_succes ipabs idnone">
		<div class="i_bs_close jq_bs_close ifont170 ipabs">&times;</div>
		<?=Loc::getMessage('ADD_BASKET_SUCCES',false,$l)?>
	</div>
<?elseif( $e['PRICES'] ):?>
	<a class="i_buy_buttom i_sec_to_order" href="<?=$e['DETAIL_PAGE_URL']?>"><?=Loc::getMessage('TO_ORDER',false,$l)?></a>
<?endif*/
							?>
							<!-- Кнопка купить -->


						</div>
					</div>

				</div>
			<? endforeach ?>
			<!-- Product -->

			<!-- Property -->
			<div class="swiper-container ilab_c_property j_property">
				<div class="swiper-wrapper">
					<? if ($arResult['I_PRO']):
						foreach ($arResult['I_PRO'] as $nameProp => $arProp):?>
							<div class="swiper-slide">

								<div class="ilab_c_prop_name"><?= $nameProp ?></div>
								<? foreach ($arProp as $pk => $pv):?>
									<div class="ilab_c_prop_value j_prop_value" data-id="<?= $pk ?>"><?
										if (is_array($pv))// Если множественный список
											foreach ($pv as $ik => $ipro) {
												if ($ik != 0)
													echo ', ';
												echo $ipro;
											}
										else// Одно значение
											echo $pv;
										?></div>
								<?endforeach ?>

							</div>
						<?endforeach;
					else:?>
						<div class="swiper-slide">
							<div class="ilab_c_prop_empty"><?= Loc::getMessage('COMP_CHARACTERISTICS_NO', true, $l) ?></div>
						</div>
					<? endif ?>
				</div>
			</div>
			<!-- Property -->
		</div>
	</div>

<? endif ?>


<?
//echo '<pre>';
//print_r($arParams);
//echo '</pre>';
?>


<?/*if($USER->isAdmin()):?>
	<pre class="pre"><?print_r($arParams)?></pre>
<?endif*/?>