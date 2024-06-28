<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader,
	Bitrix\Main\Application;

Loader::includeModule('iblock');

$request = Application::getInstance()->getContext()->getRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$json = file_get_contents('php://input');
	$getData = json_decode($json, true);

	$eventFields = array(
		"SUBJECT" => "Тест", // Тема письма
		"MESSAGE" => "Текст сообщения", // Тело письма
		"EMAIL_TO"  => "rd@ilab.kz",
		"NAME" => "Имя",
		"PHONE" => "Телефон",
		"EMAIL" => "Email"
	);

	// Отправка почтового события
	CEvent::Send("NEW_APPLICATION", 's1', $eventFields);



//	print_r(json_encode($res));

} else {
	echo "Ошибка: Недействительный запрос";
}



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");




