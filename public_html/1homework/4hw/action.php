<?php

include("./connectDBreg.php");

$login = $_GET['login'];
$a = mysql_query('DELETE FROM registration WHERE login = ' . $login);
die('delete');
?>