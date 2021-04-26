	<?php
	//подключение к БД
	$db = mysqli_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
	mysqli_select_db($db, "mikitosina_db");
	$db_host = "localhost"; 
	$db_user = "mikitosina_user"; 
	$db_password = "F6gFqcXEJfs7nd7R";
	$db_table = "registration";
	mysqli_query($db, "SET NAMES 'utf8'");
	?>