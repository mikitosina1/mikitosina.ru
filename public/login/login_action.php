<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../components/main_func.php";

session_start();

$u_login = htmlspecialchars(trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING)), $falgs = ENT_QUOTES);
$u_password = htmlspecialchars(trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING)), $falgs = ENT_QUOTES);
$u_password = hashPassword($u_password);
$error = '';
if(strlen($u_login) <= 3)
	$error = 'Введите логин';
else if(strlen($u_password) <= 3)
	$error = 'Введите пароль';

if($error != '') {
	echo $error;
	exit();
}

require_once "../connect/connect.php";

unset($_SESSION['auth_error']);

if(checkUser($u_login, $u_password)) {
	$_SESSION['u_login'] = $u_login;
	$_SESSION['u_password'] = $u_password;
	setcookie('u_login', $u_login, time()+3600*24*7, "/");
}
else $_SESSION['auth_error'] = 1;

header("Location: https://mikitosina.ru");
?>