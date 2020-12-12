<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- my_css -->
	<link rel="stylesheet" href="../styles/main_style.css">
	<link rel="stylesheet" href="../styles/call_button.css">
	<link rel="shortcut icon" type="image/png" href="../styles/little_pictures/favicon.png"/>
	<title>Galery</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg" role="navigation">
		<link href="https://fonts.googleapis.com/css?family=Tinos:700&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
		<!-- схлопывание -->
		<button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<div class="animated-icon">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class="navbar-brand col-sm-3" href="https://mikitosina.ru/work_project/index.html">
				Штамповка.ру
				<img src="../styles/little_pictures/logoLLI.svg" class="logo" alt="шестерня">
			</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="https://mikitosina.ru/work_project/index.html">
						<img src="../styles/little_pictures/home_img.svg" class="logo_nav_links" alt="home">
						Главная
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../Onas.html">
						<img src="../styles/little_pictures/About_us.svg" class="logo_nav_links" alt="карт.о_нас">
						О нас
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../service.html">
						<img src="../styles/little_pictures/our_services.svg" class="logo_nav_links" alt="карт.услуг">
						Наши услуги
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="../styles/little_pictures/galery_img.svg" class="logo_nav_links" alt="galery_img">
						Товары
					</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Примеры товаров</a>
					<a class="dropdown-item" href="../galery/galery.php">Галерея</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../administrate/admin.php">Вход администратора</a>
				</div>
				</li>
				<li>
					<a href="tel:+79533610771" class="feedback_btn_tel">
						<img src="../styles/little_pictures/phone.svg" class="feedback_btn_tel" title="позвоните нам" alt="позвоните_нам">
					</a>
				</li>
				<li>
					<a href="mailto:mikitosina@mail.ru?subject=Вопрос по штамповке" class="feedback_btn_mail">
						<img src="../styles/little_pictures/mail.svg" title="напишите нам на почту" alt="напишите_нам">
					</a>
				</li>
			</ul>
			<!-- SEARCH -->
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Что ищете?" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
			</form>
		</div>
	</nav>
	<div class="btn_call_right">
		<div class="dws_call">
			<div class="pulse">
				<div class="block_right"></div>
				<div class="phone_right">
					<img src="../styles/little_pictures/phone.svg" class="phone_right" title="позвоните нам" alt="позвоните_нам">
				</div>
				<div class="text">позвоните!</div>
			</div>
		</div>
	</div>
	<iframe src="" class="embed-responsive-item" frameborder="0" allowfullscreen></iframe>

	<footer class="footer">
			<p>Сайт сделан для <a href="http://штамповка.рф">штамповка.рф</a> by <a href="https://vk.com/mikitosina">@mikitosina</a></p>
			<p> &#169;Контент защищён авторским правом</p>
			<p>
			<a href="#">К началу</a>
			 </p>
	</footer>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- toggler script -->
	<script src="./styles/toggler.js"></script>
</body>
</html>