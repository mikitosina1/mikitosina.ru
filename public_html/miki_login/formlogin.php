<form action="./old_send/login_action.php" class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Войти в учётную запись</h1>
    <br>
    <label for="u_login" class="sr-only">Введите логин</label>
    <input type="text" id="u_login" class="form-control" placeholder="Ваш логин" required="" autofocus="">
    <br>
    <label for="u_password" class="sr-only">Пароль</label>
    <input type="password" id="u_password" class="form-control" placeholder="Пароль от учётной записи" required="">
    <div class="alert alert-danger mt-2" id="errorBlock"></div>
    <br>
    <button type="submit" class="btn btn-lg btn-primary btn-block" id="auth_user">Войти</button>
    <p class="mt-5 mb-3 text-muted">© 2019</p>
</form>