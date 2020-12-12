<!DOCTYPE html>
<?php 
	include("connect.php");
	//include("index.php");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
?>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
	<?php

		$mysqli = new mysqli($db_host,$db_user,$db_password,$db);
  		$sqli_query = $mysqli->query("SELECT * FROM SHOP");
  		$output = mysqli_fetch_array($sqli_query);
	?>
	<table class="table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">доступность</th>
			<th scope="col">розн. цена</th>
			<th scope="col">опт. цена</th>
			<th scope="col">категория</th>
			<th scope="col">путь к картинке</th>
			<th scope="col">название</th>
			<th scope="col">арт.</th>
			<th scope="col">производитель</th>
			<th scope="col">описание</th>
			<th scope="col">цвет</th>
			<th scope="col">statusNew</th>
			<th scope="col">statusAction</th>
			<th scope="col">statusTop</th>
		</tr>
		</thead>

		<tbody>
		<?php do{?>
		<tr>
			<th scope="row"><?=$output['id'];?></th>
			<td><?=$output['available'];?></td>
			<td><?=$output['price'];?></td>
			<td><?=$output['optprice'];?></td>
			<td><?=$output['categoryId'];?></td>
			<td><?=$output['picture'];?></td>
			<td><?=$output['name'];?></td>
			<td><?=$output['articul'];?></td>
			<td><?=$output['vendor'];?></td>
			<td><?=$output['description'];?></td>
			<td><?=$output['season'];?></td>
			<td><?=$output['statusNew'];?></td>
			<td><?=$output['statusAction'];?></td>
			<td><?=$output['statusTop'];?></td>
		</tr>
		<?php }while ($output = mysqli_fetch_array($sqli_query));?>
		</tbody>
	</table>

	<a class="btn btn-primary" href="./index.php"> Назад на белую страницу </a>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>