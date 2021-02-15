<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "F6gFqcXEJfs7nd7R";
    $db = "mikitosinaru";
    $db_connect = mysqli_connect($db_host,$db_user,$db_password,$db) OR DIE("Не могу создать соединение");
    mysqli_select_db($db, "mikitosinaru");
    mysqli_query($db, "SET NAMES 'utf8'");
    //подключение к базе данных
?>