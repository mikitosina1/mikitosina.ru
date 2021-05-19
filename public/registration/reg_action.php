<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once "../components/main_func.php";

$trim_u_email = trim(filter_var($_POST['u_email'], FILTER_SANITIZE_EMAIL));
$trim_u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$trim_u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));
$trim_username = trim(filter_var($_POST['Fname'], FILTER_SANITIZE_STRING));
$trim_userlastname = trim(filter_var($_POST['Lname'], FILTER_SANITIZE_STRING));
$u_email = htmlspecialchars($trim_u_email);
$u_login = htmlspecialchars($trim_u_email);
$pre_u_password = htmlspecialchars($trim_u_password);
$u_password = hashPassword($pre_u_password);
$username = htmlspecialchars($trim_username);
$userlastname = htmlspecialchars($trim_userlastname);
$u_age = $_POST['u_age'];
$u_info = $_POST['u_info'];
$user_role = 'user';
$u_ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

if (strlen($u_email) <= 3)
	die('Упс, имейл не соответствует требованиям заполнения');
else if (strlen($u_login) <= 3)
	die('Упс, ваш логин уже используется или не соответствует требованиям заполнения');
else if (strlen($u_password) <= 7)
	die('Упс, пароль не соответствует требованиям заполнения');
else if (strlen($username) <= 3)
	die('Упс, имя не соответствует требованиям заполнения или менее 3х знаков (обратитесь к администратору');

require_once "../connect/connect.php";

$reg_result = mysqli_query($db, "INSERT INTO start_users (u_email, u_login, u_password, username, userlastname, u_age, role, u_info, user_ip) VALUES ('$u_email', '$u_login', '$u_password', '$username', '$userlastname', '$u_age', '$user_role', '$u_info', '$u_ip')");
$reg_result = closeDB($db);
header("https://mikitosina.ru");

?>