<?php 
	$db_host = "localhost"; 
	$db_user = "k95336st_miki"; 
	$db_password = "iAA&MX7I";
	//подключение к БД регистрации
	$db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
	mysql_select_db("k95336st_miki",$db);
	// $db_table = "registration";
	mysql_query("SET NAMES 'utf8'",$db);
	//подключение к базе данных
?>