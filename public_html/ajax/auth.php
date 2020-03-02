<?php
$u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));

$error = '';
if(strlen($u_login) <= 3)
	$error = 'Введите логин';
else if(strlen($u_password) <= 3)
	$error = 'Введите пароль';

if($error != '') {
	echo $error;
	exit();
}

$hash = "sdfjsdkhgs234jh324SDk";
$pass = md5($u_password . $hash);

require_once '../miki_connect/connect.php';

$sql = 'SELECT `id` FROM `start_users` WHERE `u_login` = :u_login && `u_password` = :u_password';
$query = $pdo->prepare($sql);
$query->execute(['u_login' => $u_login, 'u_password' => $u_password]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0)
echo 'Такого пользователя не существует';
else {
setcookie('log', $u_login, time() + 3600 * 24 * 30, "/");
echo 'Готово';
}
?>