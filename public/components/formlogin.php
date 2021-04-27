<div class="block-form-signin">
	<form action="/login/login_action.php" class="form-signin " method="post">
		<h1 class="h6 mb-3 font-weight-normal white-form-name">Быстрый вход в учётную запись</h1>
		<label for="u_login" class="sr-only">Введите логин</label>
		<input type="text" name="u_login" id="u_login" class="form-control" placeholder="Ваш логин" required="" autofocus="">
		<br>
		<label for="u_password" class="sr-only">Пароль</label>
		<input type="password" name="u_password" id="u_password" class="form-control" placeholder="Пароль от учётной записи" required="">
		<br>
		<button type="submit" class="btn btn_log_login btn-lg btn-primary btn-block" id="auth_user">Войти</button>
	</form>
</div>