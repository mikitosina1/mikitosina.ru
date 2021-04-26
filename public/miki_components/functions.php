<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

function connectDB() {
	return new mysqli("localhost","mikitosina_user","F6gFqcXEJfs7nd7R");
}

function closeDB($db) {
	$db ->close();
}

function regUser($u_email, $u_login, $u_password, $username, $userlastname, $u_age, $user_role, $u_info, $u_ip, $hash) {
	$db = connectDB();
	var_dump();
	mysqli_select_db($db, "mikitosina_db");
	mysqli_query($db, "INSERT INTO start_users (u_email, u_login, u_password, username, userlastname, u_age, role, u_info, user_ip) VALUES ('$u_email', '$u_login', '$u_password', '$username', '$userlastname', '$u_age', '$user_role', '$u_info', '$u_ip')");
	closeDB($db);
}

function checkUser($u_login, $u_password) {
	if(($u_login == "") || ($u_password == "")) return false;
	$db = connectDB();
	mysqli_select_db($db, "mikitosina_db");
	$result_set = $db -> query("SELECT u_password from start_users WHERE u_login = '$u_login' AND u_password = '$u_password'");
	$user = $result_set -> fetch_assoc();
	if ($user)
		return true;
	else
		return false;
}

function is_guest(){
	if (!empty($_SESSION['u_login'])) {
		return false;
	}return true;
}

function hashPassword($u_password) {
    return md5($u_password . "saildsssss");
}