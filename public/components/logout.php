<?php
session_start();
unset($_SESSION['u_login']);
unset($_SESSION['u_password']);
header("location :". $_SERVER['HTTP_REFERER']);