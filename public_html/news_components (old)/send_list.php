<?php
session_start();
include("../miki_connect/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Предложить новость</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="../miki_styles/images/doge.jpg">
	<!-- bootstrap4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../miki_styles/send_list_style.css" media="all">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/">
			<img src="../miki_styles/images/logotype_F.png" alt="Логотип сайта" title="Логотип сайта" class="logo_header">
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
					<a class="nav-link" href="../news.php">News</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contacts.html">Contacts</a>
				</li>
				<li class="nav-item dropdown col-sm-7">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Hometask
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../work_project/index.html">Тиснение</a>
						<a class="dropdown-item" href="../haabr/haabr.html">haabr1</a>
						<a class="dropdown-item" href="../haabr/haabr2/haabr2.html">haabr2</a>
						<a class="dropdown-item" href="../learn.php">learn</a>
					</div>
				</li>
				<li class="nav-item col-sm-2">
					<a class="btn btn-outline-primary Log_button" href="#">Login</a>
				</li>
				<li class="nav-item ">
					<a class="btn btn-outline-secondary Reg_button" href="../miki_registration/reg.php">Registration</a>
				</li>
			</ul>
			<header class="col-sm-1"></header>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="рановато :)" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<br><br>
	<div class="container-fluid align-items-center">
		<div class="row">
			<div class="col-sm">
				<form action="./send_list_action.php" class="form-signin" method="post" name="list_form">
					<h1 class="h3 mb-3 font-weight-normal fixed-left">Предложить новость</h1>
					<br>
					<label for="authors_login" class="sr-only">Автор новости</label>
					<input type="text" id="authors_login" class="form-control" placeholder="Кто же пишет новость?" required="" autofocus="">
					<br>
					<label for="new_list" class="sr-only">Новость</label>
					<input type="text" id="new_list" class="form-control" placeholder="Что же вы хотите написать?" required="">
					<br>
					<div class="form_components">	
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="img_input">Загрузить</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="img_input" aria-describedby="img_input">
								<label class="custom-file-label" for="img_input">Выберите файл</label>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block fixed-bottom mb-5" type="submit" id="send">Предложить новость!</button>
				</form>
			</div>	
			<div class="col-sm"></div>
		</div>
	</div>


	<!-- BOOBStrap4 jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>