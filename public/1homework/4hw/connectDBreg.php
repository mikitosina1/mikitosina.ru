<?php 
	$db_host = "localhost"; 
	$db_user = "k95336st_hw4"; 
	$db_password = "GuFNOR7E";
	//подключение к БД регистрации
	$db = mysqli_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение");
	mysqli_select_db($db, "k95336st_hw4");
	// $db_table = "registration";
	mysqli_query($db, "SET NAMES 'utf8'");
	//подключение к базе данных
?>