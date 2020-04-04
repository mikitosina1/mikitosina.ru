<?php
session_start();
require_once '../miki_connect/connect.php';
?>
<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../miki_styles/images/doge.jpg">
    <!-- bootstrap4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../miki_styles/main_style.css" media="all">
    <link rel="stylesheet" href="../miki_styles/login_style.css" media="all">
</head>

<body>

<?php require_once '../miki_components/nav_panel.php';?>
<div class="container container_login align-items-center">
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm form_components">
            <?php if($_COOKIE['log'] == ''):?>
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
                <button type="submit" class="btn btn_log_login btn-lg btn-primary btn-block" id="auth_user">Войти</button>
                <p class="mt-5 mb-3">© 2019</p>
            </form>
            <?php
            else:
                ?>
                <h2><?=$_COOKIE['log']?></h2>
                <button class="btn btn-danger" id="exit_btn">Выйти</button>
            <?php endif;?>
        </div>
        <div class="col-sm"></div>
    </div>
</div>


<?php require_once '../miki_components/footer.php';?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script>-->
<!--    $('#exit_btn').click(function () {-->
<!--        $.ajax({-->
<!--            url: '../ajax/exit.php',-->
<!--            type: 'POST',-->
<!--            cache: false,-->
<!--            data: {},-->
<!--            dataType: 'html',-->
<!--            success: function(data) {-->
<!--                document.location.reload();-->
<!--            }-->
<!--        });-->
<!--    });-->
<!---->
<!--    $('#auth_user').click(function () {-->
<!--        var u_login = $('#u_login').val();-->
<!--        var u_password = $('#u_password').val();-->
<!---->
<!--        $.ajax({-->
<!--            url: '../ajax/auth.php',-->
<!--            type: 'POST',-->
<!--            cache: false,-->
<!--            data: {'u_login' : u_login, 'u_password' : u_password},-->
<!--            // data: 'u_login='+login+'&u_password='+pass,-->
<!--            dataType: 'html',-->
<!--            success: function(data) {-->
<!--                if(data == 'Готово') {-->
<!--                    $('#auth_user').text('Готово');-->
<!--                    $('#errorBlock').hide();-->
<!--                    document.location.reload();-->
<!--                }else {-->
<!--                    $('#errorBlock').show();-->
<!--                    $('#errorBlock').text(data);-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
</body>
</html>