<?php 
	$db_host = "localhost"; 
	$db_user = "cj39559_m"; 
	$db_password = "f6rZQ12G";
	$db = "cj39559_m";
	$db_connect = mysqli_connect($db_host,$db_user,$db_password,$db) OR DIE("Не могу создать соединение ");
	mysqli_select_db($db, "cj39559_m");
	mysqli_query($db, "SET NAMES 'utf8'");
	//подключение к базе данных
?>