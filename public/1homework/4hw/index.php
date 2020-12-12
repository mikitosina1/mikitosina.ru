<?php 
include("./connectDBreg.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MainPage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="../miki_styles/images/doge.jpg">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/">
			<img src="./miki_styles/images/logotype_F.png" alt="Логотип сайта" title="Логотип сайта" class="logo_header">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="/">Home
					<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./news.php">News</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./contacts.html">Contacts</a>
				</li>
				<a class="nav-link disabled" href="#">Список пользователей</a>
				<a class="btn btn-outline-primary" href="./">Кабинет Пользователя</a>
			</ul>
			<header class="col-sm-1"></header>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="рановато :)" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>

	<div class="col-sm-3"></div>
	<div class="col-sm-3">
		<form class="">
			<?
			$reg_result = mysql_query("SELECT `name`, `login` FROM `registration`");
			while($result = mysql_fetch_array($reg_result)){
			?>
			<div class="alert alert-primary " role="alert" login = "<?=$result['login'];?>" >
				Имя: <?=$result['name'];?> Логин: <?=$result['login'];?>
				<button type="button" class="btn btn-danger delete_user">Удалить</button>
				<br>
			</div>
			<? } ?>
		</form>
	</div>

		<!-- BOOBStrap4 jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>$('.delete_user').click(function () {
		var login = $(this).parent().attr('login');

		$.ajax({
			url: '/1homework/4hw/action.php',
			type: 'GET',
			cache: false,
			data: {'login' : login},
		});
	});
</script>
</body>
</html>