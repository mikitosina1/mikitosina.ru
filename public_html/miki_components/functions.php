<?php
function connectDB() {
    $db_host = "localhost";
    $db_user = "k95336st_miki";
    $db_password = "iAA&MX7I";
    $db = mysqli_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
    mysqli_select_db($db, "k95336st_miki");
    mysqli_query($db, "SET NAMES 'utf8'");
    return new $db;
}

function closeDB($db) {
    $db ->close();
}

function regUser($u_email, $u_login, $u_password, $username, $userlastname, $u_age, $user_role, $u_info, $u_ip, $hash) {
    $db = connectDB();
    mysqli_query($db, "INSERT INTO start_users (u_email, u_login, u_password, username, userlastname, u_age, role, u_info, user_ip, user_hash) VALUES ('$u_email', '$u_login', '$u_password', '$username', '$userlastname', '$u_age', '$user_role', '$u_info', '$u_ip', '$hash')");
    closeDB($db);
}

function checkUser($u_login, $u_password) {
    if(($u_login == "") && ($u_password == "")) return false;
    $db = connectDB();
    $result_set = $db -> query("SELECT u_password from start_users WHERE u_login = '$u_login'");
    $user = $result_set -> fetch_assoc();
    $real_password = $user['u_password'];
    closeDB($db);
    return $real_password == $u_password;
}
