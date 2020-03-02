<?php include("../miki_connect/connect.php");
header("Content-type: text/html; charset=UTF-8");

//**********************************************
if(empty($_POST['js'])){
	if($_POST['message'] != '' && $_POST['authors_login'] != ''){

		$authors_login = @iconv("UTF-8", "windows-1251", $_POST['authors_login']);
		$authors_login = addslashes($authors_login);
		$authors_login = htmlspecialchars($authors_login);
		$authors_login = stripslashes($authors_login);
		$authors_login = mysql_real_escape_string($authors_login);
		
		$message = @iconv("UTF-8", "windows-1251", $_POST['message']);
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);

		$date = date("d-m-Y в H:i:s");
		$mes_result = mysql_query("INSERT INTO messages (authors_login, message, date) VALUES ('$authors_login', '$message', '$date')");
		if($mes_result == true){
			body('Location: https://mikitosina.ru');
			echo 0; //Ваше сообшение успешно отправлено
		}else{
			body('Location: https://mikitosina.ru');
			echo 1; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		body('Location: https://mikitosina.ru');
		echo 2; //Нельзя отправлять пустые сообщения
	}
}

//**************************************** Если отключен JavaScript ************************************

if($_POST['js'] == 'no'){
	if($_POST['message'] != '' && $_POST['authors_login'] != ''){

		$authors_login = $_POST['authors_login'];
		$authors_login = addslashes($authors_login);
		$authors_login = htmlspecialchars($authors_login);
		$authors_login = stripslashes($authors_login);
		$authors_login = mysql_real_escape_string($authors_login);
		
		$message = $_POST['message'];
		$message = addslashes($message);
		$message = htmlspecialchars($message);
		$message = stripslashes($message);
		$message = mysql_real_escape_string($message);
		$date = date("d-m-Y в H:i:s");
		
		$mes_result = mysql_query("INSERT INTO messages (authors_login, message, date) VALUES ('$authors_login', '$message', '$date')");
		if($mes_result == true){
			header('Location: https://mikitosina.ru/news.php');
			echo "Ваше сообшение успешно отправлено"; //Ваше сообшение успешно отправлено
		}else{
			header('Location: https://mikitosina.ru/news.php');
			echo "Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		header('Location: https://mikitosina.ru/news.php');
		echo "Нельзя отправлять пустые сообщения"; //Нельзя отправлять пустые сообщения
	}
}

header('Location: https://mikitosina.ru/news.php');
?>