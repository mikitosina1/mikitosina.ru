<?php
session_start();
unset($_SESSION['is_guest']);
unset($_SESSION['u_login']);
header("Location: https://mikitosina.ru");
exit();