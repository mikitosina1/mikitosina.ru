<?php
if (checkUser($_SESSION['$u_login'], $_SESSION['$u_password'])) {
    echo "<p>Здравствуйте, <b>" . $_SESSION['$u_login'] . "</b>!</p><br>";
    echo "<a href='./fast_logout.php'>Выйти из учётной записи</a>"

}
else {
    if($_SESSION['auth_error'] == 1) {
        echo "<div class='alert alert-danger mt-2' id='errorBlock'> Неверные имя пользователия и\или пароль </div>";
        unset($_SESSION['auth_error']);
    }
    require_once "./formlogin.php";
}

