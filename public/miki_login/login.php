<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
require_once "../miki_connect/connect.php";
require_once "../miki_components/functions.php";
?>

<html lang="ru">

<head>
    <?php require_once '../miki_components/head.php';?>
	<link rel="stylesheet" href="../miki_styles/login_style.css" media="all">
</head>

<body>

<?php require_once '../miki_components/nav_panel.php';?>
<div class="container-fluid main_content align-items-center">
	<div class="row row__content">
		<div class="col-sm"></div>
		<div class="col-sm form_components">
			<?php if (is_guest()):?>
				<form action="login_action.php" class="form-signin" method="post">
					<h1 class="h3 mb-3 font-weight-normal">Войти в учётную запись</h1>
					<br>
					<label for="u_login" class="sr-only">Введите логин</label>
					<input type="text" name="u_login" id="u_login" class="form-control" placeholder="Ваш логин" required="" autofocus="">
					<br>
					<label for="u_password" class="sr-only">Пароль</label>
					<input type="password" name="u_password" id="u_password" class="form-control" placeholder="Пароль от учётной записи" required="">
					<div class="alert alert-danger mt-2" id="errorBlock"></div>
					<br>
					<button type="submit" class="btn btn_log_login btn-lg btn-primary btn-block" id="auth_user">Войти</button>
					<p class="mt-5 mb-3">© 2019</p>
				</form>
			<?php else:?>
				<h2>Вы уже вошли,<?=$_SESSION['u_login']?></h2>

				<a href='../miki_login/logout.php' class="btn btn-primary">Выйти</a>
			<?php endif;?>
		</div>
		<div class="col-sm"></div>
	</div>
</div>

<footer>
    <?php require_once '../miki_components/footer.php';?>
</footer>
</body>
</html>