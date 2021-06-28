<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "../components/head.php";
require_once "../components/main_func.php";
require_once "../connect/connect.php";

$trim_u_email = trim(filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL));
$trim_u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$trim_u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));
$trim_u_password2 = trim(filter_var($_POST['u_password2'], FILTER_SANITIZE_STRING));
$trim_username = trim(filter_var($_POST['Fname'], FILTER_SANITIZE_STRING));
$trim_userlastname = trim(filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));
$u_age = htmlspecialchars($_POST['u_age'], ENT_QUOTES);
$u_info = htmlspecialchars($_POST['u_info'], ENT_QUOTES);

$user_handler = new typicalUser();

$u_email = htmlspecialchars($trim_u_email, ENT_QUOTES);
$u_login = htmlspecialchars($trim_u_login, ENT_QUOTES);
$pre_u_password = htmlspecialchars($trim_u_password, ENT_QUOTES);
$u_password = $user_handler->hashPassword($pre_u_password);
$username = htmlspecialchars($trim_username, ENT_QUOTES);
$userlastname = htmlspecialchars($trim_userlastname, ENT_QUOTES);
$user_role = 'user';
$u_ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

$is_isset_user = $user_handler->issetUser($u_email, $u_login, $username, $userlastname);

if (strlen($u_password) <= 7)
	die(
	"<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>Упс, пароль не соответствует требованиям заполнения</h3></br>
		<a href='../' class='btn btn-primary'>На главную</a></br>
		<a href='reg.php' class='btn btn-primary'>Предыдущая страница</a>"
	);
else if ($trim_u_password != $trim_u_password2)
	die(
	"<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>
			Упс, пароль не соответствует повторному заполнению пароля
		</h3></br>
		<a href='../' class='btn btn-primary'>На главную</a></br>
		<a href='reg.php' class='btn btn-primary'>Предыдущая страница</a>"
	);

$params = array();
$params =[
	'u_email' => $u_email,
	'u_login' => $u_login,
	'u_password' => $u_password,
	'u_name' => $username,
	'u_lastname' => $userlastname,
	'u_age' => $u_age,
	'u_info' => $u_info,
	'role' => $user_role,
	'user_ip' => $u_ip,
];
if ($is_isset_user == false){
	$user_handler->regUser($params);
	echo "<script>alert( 'Регистрация прошла успешно! </br> Через секунду перенесу на Главную.');</script>";
	sleep(5);
}
header("Location: https://mikitosina.ru");
echo "<script>alert( 'Регистрация прошла успешно!');</script>";
exit();
