<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once "../miki_components/functions.php";

$u_email = trim(filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL));
$u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));
$u_password = hashPassword($u_password);
$username = trim(filter_var($_POST['Fname'], FILTER_SANITIZE_STRING));
$userlastname = trim(filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));
$u_age = $_POST['u_age'];
$u_info = $_POST['u_info'];
$user_role = 'user';
$u_ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

if (strlen($u_email) <= 3)
	die('Упс, имейл не соответствует требованиям заполнения');
else if (strlen($u_login) <= 3)
	die('Упс, ваш логин уже используется или не соответствует требованиям заполнения');
else if (strlen($u_password) <= 7)
	die('Упс, пароль не соответствует требованиям заполнения');
else if (strlen($username) <= 3)
	die('Упс, имя не соответствует требованиям заполнения или менее 3х знаков (обратитесь к администратору');

require_once "../miki_connect/connect.php";

$reg_result = mysqli_query($db, "INSERT INTO start_users (u_email, u_login, u_password, username, userlastname, u_age, role, u_info, user_ip) VALUES ('$u_email', '$u_login', '$u_password', '$username', '$userlastname', '$u_age', '$user_role', '$u_info', '$u_ip')");
$reg_result = closeDB($db);
header("https://mikitosina.ru");

?>