<!DOCTYPE HTML>
<?php 
	include("connect.php");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
?>
<html>

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
	<?php 
		//вход xml
		$stream = simplexml_load_file('goods.xml');

		//к категориям мобильных
		$way_to_category = (array) $stream->shop->categories;
		$cat_values = [];
		foreach ($way_to_category as $key) {
			foreach ($key as $key2) {
				$cat_values[] = "('$key2')";
			}
		}

		print_r($cat_values);
		// Подключение к базе данных
		$mysqli = new mysqli($db_host,$db_user,$db_password,$db);


		// Если есть ошибка соединения, выводим её и убиваем подключение
		if ($mysqli->connect_errno) {
				die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}

		$sql_temp_1 = 'INSERT INTO property (property) VALUES ';
		$mysqli_insert_1 = $mysqli->query($sql_temp_1 . implode(', ', $cat_values));



		// к предложениям
		$way_to_offers = (array) $stream->shop->offers;
		$values = [];
		foreach ($way_to_offers as $key) {
			foreach ($key as $key2 => $value2) {
				$available = (string) $value2->attributes()->available;
				$price = (string) $value2->price;
				$optprice =(string) $value2->optprice;
				$categoryId = (string) $value2->categoryId;
				$picture = (string) $value2->picture;
				$name = (string) $value2->name;
				$artic = (string) $value2->articul;
				$vendor = (string) $value2->vendor;
				$descr = (string) $value2->description;
				$season = (string) $value2->extprops->season;
				$statusNew = (string) $value2->statusNew;
				$statusAction = (string) $value2->statusAction;
				$statusTop = (string) $value2->statusTop;

				$values[] = "('{$available}', '{$price}', '{$optprice}', '{$categoryId}', '{$picture}', '{$name}', '{$artic}', '{$vendor}', '{$descr}', '{$season}', '{$statusNew}', '{$statusAction}', '{$statusTop}')";
			}
		}
		$sql_temp = 'INSERT INTO SHOP (available, price, optprice, categoryId, picture, name, articul, vendor, description, season, statusNew, statusAction, statusTop) VALUES ';


		while($temp_values = array_splice($values, 0, 5000)) {
			//$mysqli_insert = $mysqli->query($sql_temp . implode(', ', $temp_values));

		}
	?>

	<a class="btn btn-success" href="./parsed_table.php"> Перейти к таблице </a>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>