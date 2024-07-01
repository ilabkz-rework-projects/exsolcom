<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
use Ilab\Data\iGet;
// ---------------------------------------------------------------------------------------------------- iLaB
if($arResult['CURRENCY_RATES']):?>
    <select class="i_currency-dropdown">
        <option value='0' <?=$_SESSION['CURRENT_CURRENCY'] == '0' ? 'selected' : ''?>>KZT</option>
        <?foreach ($arResult['CURRENCY_RATES'] as $s):?>
            <option value='<?=$s['ID']?>' <?=$_SESSION['CURRENT_CURRENCY'] == $s['ID'] ? 'selected' : ''?>>
                <?=$s['CURRENCY']?>
            </option>
        <?endforeach?>
    </select>

<?endif
// ---------------------------------------------------------------------------------------------------- iLaB?>





<?/*if($USER->isAdmin()):?>
	<pre><?print_r($arResult)?></pre>
<?endif*/?>