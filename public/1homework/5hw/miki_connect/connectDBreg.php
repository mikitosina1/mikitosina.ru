	<?php
	//подключение к БД регистрации
	$db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
	mysql_select_db("k95336st_miki",$db);
	$db_host = "localhost"; 
	$db_user = "k95336st"; 
	$db_password = "iAA&MX7I";
	$db_table = "registration";
	mysql_query("SET NAMES 'utf8'",$db);
	?>