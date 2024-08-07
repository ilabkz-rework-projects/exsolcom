<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Highloadblock\HighloadBlockTable as HL;
use Bitrix\Main\Loader;
// ---------------------------------------------------------------------------------------------------- iLaB PHP Functions
// Город
function i_city($s, $USER)
{
	Loader::includeModule('iblock');

	// if( $_GET['setcity'] )
	// 	Bitrix\Main\Context::getCurrent()->getSite() = $_GET['setcity'];
	// elseif( !Bitrix\Main\Context::getCurrent()->getSite() )
	// 	Bitrix\Main\Context::getCurrent()->getSite() = $s;

	$res = CIBlock::GetList(Array(), Array('ACTIVE'=>'Y', 'CODE'=>'catalog_'.Bitrix\Main\Context::getCurrent()->getSite()));
	if($ob = $res->Fetch())
	{
		$_SESSION['I_CITY_IBLOCK_ID']	= $ob['ID'];
		$_SESSION['I_CITY_IBLOCK_TYPE']	= $ob['CODE'];
	}/* else {
		$_SESSION['I_CITY_IBLOCK_ID']	= 38;
		$_SESSION['I_CITY_IBLOCK_TYPE']	= 'catalog_it';
	}*/

	// Изменение города пользовательское свойства
	if( $USER->isAuthorized() )
	{
		$rsUser = CUser::GetByID($USER->GetID());
		$arUser = $rsUser->Fetch();

		$arFilter = Array('IBLOCK_ID'=> IB_ID__CITY, 'XML_ID'=>Bitrix\Main\Context::getCurrent()->getSite());
		$res = CIBlockElement::GetList(Array('SORT'=>'ASC'), $arFilter);
		while($ob = $res->Fetch())
			$cId = $ob['ID'];

		if( $cId!=$arUser['UF_CITY'] || !$arUser['UF_CITY'] )
		{
//			if($USER->isAdmin())
//				echo 'изменили город на - '.$cId;

			$oUser = new CUser;
			$er = $oUser->Update($arUser['ID'], array('UF_CITY'=>$cId));
		}
	}
}
/*function UserFieldValue($ID)
{
	$UserField = CUserFieldEnum::GetList(array(), array('ID' => $ID));
	if($UserFieldAr = $UserField->GetNext())
	{
		return $UserFieldAr['VALUE'];
	}
	else return false;
}*/
/* Like array_splice(), but preserves the key(s) of the replacement array. */
function array_splice_assoc(&$input, $offset, $length, $replacement = array())
{
		$replacement = (array) $replacement;
		$key_indices = array_flip(array_keys($input));
		if (isset($input[$offset]) && is_string($offset)) {
				$offset = $key_indices[$offset];
		}
		if (isset($input[$length]) && is_string($length)) {
				$length = $key_indices[$length] - $offset;
		}

		$input = array_slice($input, 0, $offset, TRUE)
				+ $replacement
				+ array_slice($input, $offset + $length, NULL, TRUE);
}
// Дерево меню
function i_mapTree($data)
{
	$tree = array();
	foreach ($data as $id=>&$node)
		if (!$node['IBLOCK_SECTION_ID'])
			$tree[$id] = &$node;
		else
			$data[$node['IBLOCK_SECTION_ID']]['I_CHILD'][$id] = &$node;
	return $tree;
}unset($node);
// Дерево отзывов
function i_reviewTree($data)
{
	$tree = array();
	foreach ($data as $id=>&$node)
		if (!$node['PROPERTY_I_PARENT_ID_VALUE'])
			$tree[$id] = &$node;
		else
			$data[$node['PROPERTY_I_PARENT_ID_VALUE']]['I_CHILD'][$id] = &$node;
	return $tree;
}unset($node);

// Цена и валюта, деление
function i_price_currency_division($arr)
{
	$pr = preg_split('/\s(?=[^0-9])/', $arr);
	return $pr;
}

// Цены
function i_price($arr, $min)
{
	foreach($arr as $k=>$e)
		if( $e['CAN_ACCESS'] == 'Y' && $min < $e['DISCOUNT_VALUE'] )
		{ $pr=$k; $min=$e['DISCOUNT_VALUE']; }

	if($pr)
		return $pr;
	else
		return false;
}
// Сортировка свойств оформление заказа
function ilab_sort_prop ($arr1, $arr2)
{
	if( is_array($arr1) || is_array($arr2) )
	{
		if( is_array($arr1) )
			foreach($arr1 as $e)
				$arRe[$e['SORT']][] = $e;

		if( is_array($arr2) )
			foreach($arr2 as $e)
				$arRe[$e['SORT']][] = $e;

		ksort($arRe);

		foreach($arRe as $e)
			foreach($e as $ie)
				$result[] = $ie;

		return $result;
	} else
		return false;
}
// SKU свойства
function ilab_getSkuPropsData($arr)
{
	/*
		На данный момент, информационные блоки могут иметь свойства следующих типов:
		S — строка
		N — число
		L — список
		F — файл
		G — привязка к разделу
		E — привязка к элементу
		S:UserID — Привязка к пользователю
		S:DateTime — Дата/Время
		E:EList — Привязка к элементам в виде списка
		S:FileMan — Привязка к файлу (на сервере)
		S:map_yandex — Привязка к Яndex.Карте
		S:HTML — HTML/текст
		S:map_google — Привязка к карте Google Maps
		S:ElementXmlID — Привязка к элементам по XML_ID
	*/
	Loader::includeModule('highloadblock');

	foreach($arr as $arProp)
	{
		if ($arProp['PROPERTY_TYPE'] == 'L' || $arProp['PROPERTY_TYPE'] == 'E' || $arProp['PROPERTY_TYPE'] == 'S' || ($arProp['PROPERTY_TYPE'] == 'S' && $arProp['USER_TYPE'] == 'directory'))
		{
			if ($arProp['XML_ID'] == 'CML2_LINK')
				continue;

			if ($arProp['PROPERTY_TYPE'] == 'L')// Тип список
			{
				$rsPropEnums = CIBlockProperty::GetPropertyEnum($arProp['ID'], Array(), Array('VALUE'=>$arProp['VALUE']));
				while ($arEnum = $rsPropEnums->Fetch())
				{
					$arValues[] = array(
						'ID'		=> $arEnum['ID'],
						'NAME'		=> $arEnum['VALUE'],
						'CODE'		=> $arEnum['CODE'],
						'VALUE'		=> $arEnum['VALUE'],
					);
				}
			}
/*
			elseif ($arProp['PROPERTY_TYPE'] == 'E')
			{

				$rsPropEnums = CIBlockElement::GetList(
					array('SORT' => 'ASC'),
					array('IBLOCK_ID' => $arProp['LINK_IBLOCK_ID'], 'ACTIVE' => 'Y'),
					false,
					false,
					array('ID', 'NAME', 'PREVIEW_PICTURE')
				);
				while ($arEnum = $rsPropEnums->Fetch())
				{
					$arEnum['PREVIEW_PICTURE'] = CFile::GetFileArray($arEnum['PREVIEW_PICTURE']);

					if (!is_array($arEnum['PREVIEW_PICTURE']))
					{
						$arEnum['PREVIEW_PICTURE'] = false;
					}

					if ($arEnum['PREVIEW_PICTURE'] !== false)
					{
						$productImg = CFile::ResizeImageGet($arEnum['PREVIEW_PICTURE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, false, false);
						$arEnum['PREVIEW_PICTURE']['SRC'] = $productImg['src'];
					}

					$arValues['n'.$arEnum['ID']] = array(
						'ID'		=> $arEnum['ID'],
						'NAME'		=> $arEnum['NAME'],
						'SORT'		=> $arEnum['SORT'],
						'PICT'		=> $arEnum['PREVIEW_PICTURE']
					);
				}

			}
*/
			elseif ($arProp['PROPERTY_TYPE'] == 'S' && $arProp['USER_TYPE'] == 'directory')// Картинки hiload инфоблоки
			{
				$hlblock = HL::getList(array('filter' => array('TABLE_NAME' => $arProp['USER_TYPE_SETTINGS']['TABLE_NAME'])))->fetch();

				if ($hlblock)
				{
					$entity = HL::compileEntity($hlblock);
					$entity_data_class = $entity->getDataClass();
					$rsData = $entity_data_class::getList(array('filter'=>array('UF_XML_ID'=>$arProp['VALUE'])));

					while ($arData = $rsData->fetch())
					{
						$arValues[] = array(
							'ID'			=> $arData['UF_XML_ID'],
							'NAME'			=> $arData['UF_NAME'],
							'CODE'			=> $arData['UF_XML_CODE'],
							'VALUE'			=> CFile::GetPath($arData['UF_FILE']),
						);
					}

				}
			}
			elseif ($arProp['VALUE']) // Остальные если есть VALUE
			{
				$arValues[]	= array(
					'ID'		=> $arProp['ID'],
					'NAME'		=> $arProp['NAME'],
					'CODE'		=> $arProp['CODE'],
					'VALUE'		=> $arProp['VALUE'],
				);
			}
		}
	}

	return $arValues;
}
//метод класса, который добавляет свойство (код/значение) к заказу, динамически узнавая идентификатор свойства
function ilab_AddOrderProperty($code, $value, $order)
{
	if(!strlen($code))
		return false;

	if(CModule::IncludeModule('sale'))
	{
		if($arProp = CSaleOrderProps::GetList(array(), array('CODE' => $code))->Fetch())
		{
			return CSaleOrderPropsValue::Add(array(
				'NAME'			=> $arProp['NAME'],
				'CODE'			=> $arProp['CODE'],
				'ORDER_PROPS_ID'	=> $arProp['ID'],
				'ORDER_ID'		=> $order,
				'VALUE'			=> $value,
			));
		}
	}
}
function i_matrix_price($p, $arr)
{?>
	<div class="i_matrix jq_matrix<?if($p['SKU'])echo ' idnone';if( $arr['I_MULTI_PRICE']!='Y' )echo ' idnonei'?>" jqmp="<?=$arr['I_MULTI_PRICE']?>" jqmpsku="<?=$p['ID']?>" jqmpfirst="<?=$arr['MIN_PRICE']?>">
		<?$arrIn = $arr['ROWS'];
		foreach($arr['ROWS'] as $k=>$e):?>
			<div class="i_mptr">
				<?if(count($arr['ROWS']) > 1 || count($arr['ROWS']) == 1 && ($arr['ROWS'][0]['QUANTITY_FROM'] > 0 || $arr['ROWS'][0]['QUANTITY_TO'] > 0)):?>
					<div class="i_mptd i_mpcol">
						<?if(IntVal($e['QUANTITY_FROM']) > 0 && IntVal($e['QUANTITY_TO']) > 0)
							echo '<span class="i_mtbold">'.$e['QUANTITY_FROM'].'</span> - <span class="i_mtbold">'.$e['QUANTITY_TO'].'</span> <span class="i_mtunits">ед.</span>';
						elseif(IntVal($e['QUANTITY_FROM']) > 0)
							echo '<span class="i_mtbold">'.$e['QUANTITY_FROM'].'</span> <span class="i_mtunits">ед.</span> <span class="i_mtcol">и более</span>';
						elseif(IntVal($e['QUANTITY_TO']) > 0)
							echo '<span class="i_mtbold">1</span> - <span class="i_mtbold">'.$e['QUANTITY_TO'].'</span> <span class="i_mtunits">ед.</span>';
						else
							echo ''?>
					</div>
					<div class="i_mptd i_mpdash"> - </div>
				<?endif;
				$minPrice = false;
				$maxPrice = false;
				foreach($arr['COLS'] as $typeID=>$arType)
				{
					$PRICE = $arr['MATRIX'][$typeID][$k]['DISCOUNT_PRICE'];

					if($minPrice === false || $minPrice > $PRICE && $PRICE)
					{
						$minPrice	= $PRICE;
						$cur		= $arr['MATRIX'][$typeID][$k]['CURRENCY'];
					}

					if($maxPrice === false || $maxPrice < $PRICE && $PRICE)
					{
						$maxPrice	= $PRICE;
						$cur		= $arr['MATRIX'][$typeID][$k]['CURRENCY'];
					}
					$arrIn[$k]['PRICE'] = $minPrice;
				}
				echo '<b class="i_mptd i_mpnumb">'.FormatCurrency($minPrice, $cur).'</b>';?>
			</div>
		<?endforeach;
		if( $arrIn )
		{
			$i=0;foreach($arrIn as $e)
			{
				if($i>0)
					$v .= '*';

				$v .= $e['QUANTITY_FROM'].'|'.$e['QUANTITY_TO'].'|'.$e['PRICE'];
				$i++;
			}
		} elseif( $arr['MIN_PRICE'] )
			$v = '0|0|'.$arr['MIN_PRICE'];?>

		<input type="hidden" class="jq_mparr" value="<?=$v?>">

		<?
		/*
							[0]
								(
									[QUANTITY_FROM]
									[QUANTITY_TO]
									[PRICE]
								)

							[1]
								(
									[QUANTITY_FROM]
									[QUANTITY_TO] 
									[PRICE]
								)

							[2]
								(
									[QUANTITY_FROM]]
									[QUANTITY_TO]
									[PRICE]
								)
		*/
		?>
	</div>
<?}
// ---------------------------------------------------------------------------------------------------- Склонения слов
function i_declOfNum($number, $titles)
{
	$cases = array (2, 0, 1, 1, 1, 2);
	return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}

// ---------------------------------------------------------------------------------------------------- Отзывы
function i_reviews( $arRev, $USER, $parent, $i )
{
	foreach($arRev as $e):?>
		<div class="i_reviews_ele jq_reviews_ele" data-id="<?=$e['ID']?>">
			<div class="i_re_title">
				<?if( $e['NAME'] ):?>
					<b><?=$e['NAME']?></b>&nbsp;&nbsp;&nbsp;&nbsp;<i><?=$e['DATE_CREATE']?></i>&nbsp;&nbsp;&nbsp;&nbsp;<?if($parent['NAME']):?><span>Ответ на сообщение: <b><?=$parent['NAME']?></b></span><?endif?>
				<?else:?>
					<b>Комментарий был удалён...</b>
				<?endif?>
			</div>
			<?if( $e['DETAIL_TEXT'] ):?>
				<div class="i_re_text"><?=$e['DETAIL_TEXT']?></div>
			<?endif?>
			<?if( $e['NAME'] && $i ):?>
				<div class="i_re_reply"><a href="javascript:void(0)" class="jq_reviews_reply" data-id="<?=$e['ID']?>" data-name="<?=$e['NAME']?>">Ответить</a></div>
			<?endif?>
			<?if( $e['NAME'] && $USER->isAdmin()):?>
				<div class="i_re_admin_panel">
					<small><a href="javascript:void(0)" class="jq_reviews_delete" jq_id="<?echo $e['IBLOCK_ID'].'|'.$e['ID']?>"><?=GetMessage('REVIEW_DETELE')?></a></small>
				</div>
			<?endif?>
			<?if ($e['I_CHILD']):?>
				<div class="i_reviews_subblock">
					<?i_reviews( $e['I_CHILD'], $USER, $e, false )?>
				</div>
			<?endif?>
		</div>
	<?endforeach;
}

// ---------------------------------------------------------------------------------------------------- Категории основного каталога
function i_main_catalog_sections($arSections)
{
	foreach($arSections as $section):?>
		<li data-secid="<?=$section['ID']?>" class="<?=$section['I_CHILD'] ? 'i_has_child' : ''?>">
			<span><?=$section['NAME']?></span>
			<?if( $section['I_CHILD'] ):?>
				<ul class="j_match_ul idn"><?i_main_catalog_sections($section['I_CHILD'])?></ul>
			<?endif;?>
		</li>
	<?endforeach;
}

// ---------------------------------------------------------------------------------------------------- Изменение строки в латиницу
/**
 * Функиция транслитерации
 * @param string
 * @return string
 */
function i_translit_to_latin($st)
{
	$st = str_replace([
		'?', '!', '.', ',', ':', ';', '*', '(', ')', '{', '}', '[', ']', '%', '#', '№', '@', '$', '^', '-', '+', '/', '\\', '=', '|', '"', '\'',
		'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'З', 'И', 'Й', 'К',
		'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х',
		'Ъ', 'Ы', 'Э', ' ', 'Ж', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ю', 'Я',
		'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'з', 'и', 'й', 'к',
		'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х',
		'ъ', 'ы', 'э', 'ж', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я'
	], [
		'_', '_', '.', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_', '_',
		'A', 'B', 'V', 'G', 'D', 'E', 'E', 'Z', 'I', 'Y', 'K',
		'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H',
		'J', 'I', 'E', ' ', 'ZH', 'TS', 'CH', 'SH', 'SHCH',
		'', 'YU', 'YA',
		'a', 'b', 'v', 'g', 'd', 'e', 'e', 'z', 'i', 'y', 'k',
		'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h',
		'j', 'i', 'e', 'zh', 'ts', 'ch', 'sh', 'shch',
		'', 'yu', 'ya'
	], $st);
	$st = trim($st, '_');

	$prev_st = '';
	do {
		$prev_st = $st;
	} while ($st != $prev_st);

	return $st;
}

// ---------------------------------------------------------------------------------------------------- getEnumListProp

// Функция обёртка
// Возвращает список вариантов значений свойств типа "список" по фильтру arFilter отсортированные в порядке arOrder. Метод статический.

/**
 * @param $iblockId
 * @param $propId
 * @return array
 */
function getEnumListProp( int $iblockId, $propIds = [] )
{
	$arOrder = [];

	$arFilter = [
		'IBLOCK_ID' => $iblockId,
		'PROPERTY_ID' => $propIds
	];

	$resEnumField = CIBlockPropertyEnum::GetList( $arOrder, $arFilter );

	if( intval( $resEnumField->SelectedRowsCount() ) > 0 )
	{
		while( $arEnumField = $resEnumField->Fetch() )
			$enumListProps[ $arEnumField['PROPERTY_CODE']][ $arEnumField['VALUE'] ] = $arEnumField['ID'];
	}

	return $enumListProps ?? [];
}