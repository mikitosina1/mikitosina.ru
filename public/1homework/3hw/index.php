<?php 
<!-- session_start(); -->
include("./action.php");
//поддержка соединения с бд отдельным файлом
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>result from DB</title>
</head>
<body>
	<?
	// обращение к БД за необходимым выводом
	$order_user_id = mysql_query("INSERT INTO 'user_id' FROM 'orders' SELECT'id' = '1' FROM 'users' ORDER BY '' LIMIT '2', ",$db);
	$order_item_id = mysql_query("INSERT INTO 'item_id' FROM 'orders' SELECT'id' = '2,3' FROM 'items' ORDER BY '' LIMIT '2', ",$db);
	$order_result = mysql_query("SELECT * FROM orders",$db);
	$order = mysql_fetch_array($output_result);
	?>
	<div class="order_block_container">
		<div class="comment">
			<strong>Все заказы</strong>
			<br>
			<div class="message_text">
				<?=$order['orders'];?>
				<br>
			</div>
		</div>
	</div>
</body>
</html>