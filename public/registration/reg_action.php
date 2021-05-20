<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once "../components/main_func.php";
require_once "../connect/connect.php";

$trim_u_email = trim(filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL));
$trim_u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$trim_u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));
$trim_username = trim(filter_var($_POST['Fname'], FILTER_SANITIZE_STRING));
$trim_userlastname = trim(filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));

$user_handler = new typicalUser();

$u_email = htmlspecialchars($trim_u_email);
$u_login = htmlspecialchars($trim_u_login);
$pre_u_password = htmlspecialchars($trim_u_password);
$u_password = $user_handler->hashPassword($pre_u_password);
$username = htmlspecialchars($trim_username);
$userlastname = htmlspecialchars($trim_userlastname);
$u_age = htmlspecialchars($_POST['u_age']);
$u_info = htmlspecialchars($_POST['u_info']);
$user_role = 'user';
$u_ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

$params = array();
$params =[
    'u_email' => $u_email,
    'u_login' => $u_login,
    'u_password' => $u_password,
    'userlastname' => $userlastname,
    'u_age' => $u_age,
    'u_info' => $u_info,
    'user_role' => $user_role,
    'u_ip' => $u_ip,
];

if (strlen($u_email) <= 3)
	die('Упс, имейл не соответствует требованиям заполнения');
else if (strlen($u_login) <= 3)
	die('Упс, ваш логин уже используется или не соответствует требованиям заполнения');
else if (strlen($u_password) <= 7)
	die('Упс, пароль не соответствует требованиям заполнения');
else if (strlen($username) <= 3)
	die('Упс, имя не соответствует требованиям заполнения или менее 3х знаков (обратитесь к администратору');
$user_handler->regUser($params);

header("https://mikitosina.ru");

?>