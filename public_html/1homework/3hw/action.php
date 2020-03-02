<?php 
	$db_host = "localhost"; 
	$db_user = "********"; 
	$db_password = "**********";
	//подключение к БД регистрации
	$db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
	mysql_select_db("********",$db);
	// $db_table = "registration";
	mysql_query("SET NAMES 'utf8'",$db);
	//подключение к базе данных
?>