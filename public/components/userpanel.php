<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once ('./connect/connect.php');
require_once ('./components/main_func.php');
$user_handler = new typicalUser;

if (isset($_SESSION['u_login']) && isset($_SESSION['u_password'])/* && $user_handler->checkUser($_SESSION['u_login'], $_SESSION['u_password'])*/) {
	echo "<p>Здравствуйте, <b>" . $_SESSION['u_login'] . "</b>!</p><br>";
	echo "<a href='../login/logout.php'>Выйти из учётной записи</a>";
}
else {
	if(isset($_SESSION['auth_error']) && $_SESSION['auth_error'] == 1) {
		echo "<div class='alert alert-danger mt-2' id='errorBlock'> Неверные имя пользователия или пароль </div>";
		unset($_SESSION['auth_error']);
	}
	require_once "formlogin.php";
}