<?php
include_once("../miki_connect/connect.php");


// генерация случайного кода
function generateCode($length=6) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;
	while (strlen($code) < $length) {
	$code .= $chars[mt_rand(0,$clen)];
	}
	return $code;
}

if(isset($_POST['submit']))
{
	// запись в бд, где логин равен введенному
	$query = mysqli_query($db,"SELECT user_id, u_password FROM start_users WHERE u_login='".mysqli_real_escape_string($db,$_POST['u_login'])."' LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Сравниваем пароли
	if($data['u_password'] === md5(md5($_POST['u_password']))){
		// Генерируем случайное число и шифруем его
		$hash = md5(generateCode(10));

		if(!empty($_POST['not_attach_ip'])){
			// Если пользователя выбрал привязку к IP
			// Переводим IP в строку
			$insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
		}
		// Записываем в БД новый хеш авторизации и IP
		mysqli_query($db, "UPDATE start_users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
		setcookie("user_id", $data['user_id'], time()+60*60*24*4, "/");
		setcookie("log", $hash, time()+60*60*24*4, "/", null, null, true); // httponly !!!

		// На проверку
		header("Location: ./checking_true.php"); exit();
	}
	else{
		print "Вы ввели неправильный логин/пароль";
	}
}
?>
