<form action="./login_action.php" class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Войти в учётную запись</h1>
    <br>
    <label for="u_login" class="sr-only">Введите логин</label>
    <input type="text" id="u_login" class="form-control" placeholder="Ваш логин" required="" autofocus="">
    <br>
    <label for="u_password" class="sr-only">Пароль</label>
    <input type="password" id="u_password" class="form-control" placeholder="Пароль от учётной записи" required="">
    <br>
    <button type="submit" class="btn btn_log_login btn-lg btn-primary btn-block" id="auth_user">Войти</button>
</form>