<?php 
session_start();
include("./miki_connect/connect.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- bootstrap4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="./miki_styles/images/doge.jpg">
	<link rel="stylesheet" href="./miki_styles/main_style.css" media="all">
</head>

<body>
	<header>
	</header>
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
				<li class="nav-item col-sm-2">
					<a class="btn btn-outline-primary Log_button" href="./miki_login/login.php">Login</a>
				</li>
				<li class="nav-item ">
					<a class="btn btn-outline-secondary Reg_button" href="./miki_registration/reg.php">Registration</a>
				</li>
			</ul>
			<header class="col-sm-1"></header>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="рановато :)" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div class="container-fluid main_content">
		<div class="row cell_content">
			<div class="col-sm-8 l_side_content">
				

			</div>
			<div class="col-sm-4 mt-4 r_side_content">
				<aside class="comment_desk">
					<?
						// обращение к БД за комментарием
						$mes_result = mysql_query("SELECT * FROM messages",$db);
						$comment = mysql_fetch_array($mes_result);
					?>
					 <!-- комментарии на сайте -->
					<div class="comment_block_container"> 
						<?php do { ?>
						<div class="comment">
							<strong><?=$comment['authors_login'];?></strong>
							<br>
							<div class="message_text">
								<?=$comment['message'];?>
								<br>
								<div class="message_date">
									<?=$comment['date'];?>
								</div>
							</div>
						</div>
						<?php } while($comment = mysql_fetch_array($mes_result)); ?>
						<hr style="2px, black">
					</div>
					<?php
					function is_guest(){
						if (!empty($_SESSION['start_user'])) {
							return false;
						}

						return true;
					}
					?>
					<?if (is_guest()):?>
					<br>
					<div class="alert alert-warning" role="alert">
						<img src="./miki_styles/images/lolpic.png" style="width: 75%; height: 70%;" alt="">
						<br>
						Чтобы добавлять комментарии - зарегистрируйтесь или войдите в <a href="./miki_login/login.php">Учётную запись</a>.
					</div>
					<?else:?>
					<form action="./miki_connect/sendMessage.php" method="post" name="form"> <!-- форма написания комментариев -->
						<p>Автор:
							<br>
							<input name="authors_login" type="text" id="authors_login">
						</p> <!-- TODO имя авторизированного пользователя -->
						<p>Комментарии:
							<br>
							<textarea name="message" rows="9" cols="60" id="message"></textarea>
						</p>
						<input name="js" type="hidden" value="no" id="js">
						<p class="submit-btn">
							<input name="button" type="submit" value="Отправить" id="send"> 
							<span id="resp"></span>
						</p>
					</form>
					<?endif;?>
				</aside>
			</div>
		</div>
	</div>


	<?php  
	//начало сессии
	if ($_SESSION['succes_reg'] == 1) {
		echo "<span style='color:red;'>Пользователь зарегистрирован</span>";
		unset($_SESSION['reg_success']);
	}
	?>


	<!-- BOOBStrap4 jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>