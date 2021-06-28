<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html>


<head>
	<?php
	require_once "../components/head.php";
	require_once "../connect/connect.php";
	require_once "../components/main_func.php";
	?>
	<link rel="stylesheet" href="../styles/reg_style.css" media="all">
</head>

<body>
<?php
require_once '../components/nav_panel.php';
$user_handler = new typicalUser();
if($user_handler->is_guest() == TRUE){
	header("Location: https://mikitosina.ru");
}
?>
<div class="container reg_form_container">
	<div class="row">
		<div class="col-sm reg_form_content mt-4">
			<form action="reg_action.php" method="post">
				<label class="markplace"><p><b style="color: #880000; font-size: 1.5em;">*</b> - очень важные поля, без которых невозможно зарегистрироваться.</p></label>
				<div class="formpart">
					<label for="u_email">Введите Вашу электронную почту</label>
					<input type="email" name="u_email" id="u_email" class="form-control">
				</div>
				<div class="formpart">
					<label for="u_login">Ваш<strong style="color: #2d6ca2"> Логин </strong><b style="color: #880000; font-size: 1.5em;">*</b>(не менее 3-х символов)</label>
					<input type="text" name="u_login" id="u_login" class="form-control">
				</div>
				<div class="formpart">
					<label for="u_password" class="passLabel">
						Придумайте<strong style="color: #3e8f3e"> Пароль</strong><b style="color: #880000; font-size: 1.5em;">*</b>
						<br><p style="font-size: 0.75em;">Не менее 8 символов, заглавные и строчные буквы, цифры (обязательное условие)</p>
					</label>
					<input type="password" name="u_password" id="u_password" class="form-control">
				</div>

				<div class="formpart">
					<label for="u_password2">Повторите <strong style="color: #3e8f3e">пароль</strong><b style="color: #880000; font-size: 1.5em;">*</b></label>
					<input type="password" name="u_password2" id="u_password2" class="form-control">
				</div>
				<div class="formpart">
					<label for="Fname">Имя</label>
					<input type="text" name="Fname" id="Fname" class="form-control">
				</div>
				<div class="formpart">
					<label for="Lname">Фамилия</label>
					<input type="text" name="Lname" id="Lname" class="form-control">
				</div>
				<div class="formpart">
					<label for="u_age">Возраст</label>
					<input type="text" name="u_age" id="u_age" class="form-control">
				</div>
				<div class="formpart">
					<label for="u_info">Немного автобиографии</label>
					<input type="text" name="u_info" id="u_info" class="form-control">
				</div>

				<button type="submit" class="btn btn_reg_regaction btn-success mt-4">Зарегистрироваться</button>
			</form>
		</div>
	</div>
</div>
<footer>
	<?php require_once "../components/footer.php";?>
</footer>
</body>
</html>

