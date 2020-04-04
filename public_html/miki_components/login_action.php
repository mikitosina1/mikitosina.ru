<?php
require_once "./functions.php";
session_start();
$u_login = $_POST['u_login'];
$u_password = md5($_POST['u_password']);
unset($_SESSION['auth_error']);
if(checkUser($u_login, $u_password)) {
    $_SESSION['u_login'] = $u_login;
    $_SESSION['u_password'] = $u_password;
}
else $_SESSION['auth_error'] = 1;


