<?php 
	$db_host = "localhost"; 
	$db_user = "mikitosina_user"; 
	$db_password = "F6gFqcXEJfs7nd7R";
	$db = mysqli_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
	mysqli_select_db($db, "mikitosina_db");
	mysqli_query($db, "SET NAMES 'utf8'");
	//подключение к базе данных
?>