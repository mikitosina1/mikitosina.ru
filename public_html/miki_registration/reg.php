<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="../miki_styles/images/doge.jpg">
		<!-- BOOBStrap4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="./miki_styles/images/doge.jpg">
	<link rel="stylesheet" href="./miki_styles/main_style.css" media="all">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link rel="stylesheet" href="../miki_styles/reg_style.css" media="all">
	<title>Registration Form</title>
</head>


<body>
<?php require_once '../miki_components/nav_panel.php';?>
<div class="container reg_form_container">
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm reg_form_content mt-4">
			<form action="./reg_action.php" method="post">
				<label for="u_email">Введите Вашу электронную почту</label>
				<input type="email" name="u_email" id="u_email" class="form-control">

				<label for="u_login">Ваш логин <br> (не менее 3-х символов)</label>
				<input type="text" name="u_login" id="u_login" class="form-control">

				<label for="u_password">Пароль (не менее 8 символов)</label>
				<input type="password" name="u_password" id="u_password" class="form-control">

				<label for="Fname">Имя</label>
				<input type="text" name="Fname" id="Fname" class="form-control">

				<label for="Lname">Фамилия</label>
				<input type="text" name="Lname" id="Lname" class="form-control">

				<label for="u_age">Возраст</label>
				<input type="text" name="u_age" id="u_age" class="form-control">

				<label for="u_info">Немного автобиографии</label>
				<input type="text" name="u_info" id="u_info" class="form-control">

				<button type="submit" class="btn btn-success mt-4">Зарегистрироваться</button>
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

