<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "../components/main_func.php";
require_once "../components/head.php";

$user_holder = new typicalUser();
$trim_u_login = trim(filter_var($_POST['u_login'], FILTER_SANITIZE_STRING));
$u_login = htmlspecialchars($trim_u_login, ENT_QUOTES);
$trim_u_password = trim(filter_var($_POST['u_password'], FILTER_SANITIZE_STRING));
$pre_u_password = htmlspecialchars($trim_u_password, ENT_QUOTES);
$u_password = $user_holder->hashPassword($pre_u_password);

unset($_SESSION['auth_error']);
$log_in = $user_holder->loginUser($u_login, $u_password);

//print_r($log_in);

//header("Location: https://mikitosina.ru");
exit();