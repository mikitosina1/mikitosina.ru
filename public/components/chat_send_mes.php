<?php
require_once "head.php";
require_once (realpath(dirname(__FILE__) . '/../components/chat_class.php'));
header("Content-type: text/html; charset=UTF-8");

if(!empty($_POST['go_message'])){
	if($_POST['message'] != '' && $_POST['authors_login'] != ''){
		
		$authors_login = @iconv("UTF-8", "windows-1251", $_POST['authors_login']);
		$authors_login = addslashes($authors_login);
		$authors_login = htmlspecialchars($authors_login, ENT_QUOTES);
		$authors_login = stripslashes($authors_login);
		
		$message = @iconv("UTF-8", "windows-1251", $_POST['message']);
		$message = addslashes($message);
		$message = htmlspecialchars($message, ENT_QUOTES);
		$message = stripslashes($message);
		
		$date = date("d-m-Y в H:i:s");
		$chat_handler = new chatForUsers();
		$send_message = $chat_handler->sendMessages($authors_login, $message, $date);
		
		if($send_message){
			header("Location: https://mikitosina.ru");
			echo 0; //Ваше сообшение успешно отправлено
		}else{
			header("Location: https://mikitosina.ru");
			echo 1; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		header("Location: https://mikitosina.ru");
		echo 2; //Нельзя отправлять пустые сообщения
	}
}
?>