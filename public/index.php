<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	session_start();

	require_once "./components/main_func.php";
    require_once "./1homework/strplus/strplus1.php";
    require_once "./learn.php";
    require_once "./connect/connect.php";

?>
<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <?php require_once "./components/head.php";?>
    </head>
	<body>
		<?php require_once "./components/nav_panel.php";?>
		<div class="container-fluid main_content">
			<div class="row cell_content">
				<div class="col-sm-2"></div>
				<div class="col-sm-5 mt-4 r_side_content">
					<div class="col-sm post__text">
                        <p>Здравствуйте, ребята, Эта часть скоро станет динамической!<br>
                            Вы спросите: для чего я сделал этот блог?<br>
                            Хочу использовать его, как портфолио и вижу возможность подсказать <br>
                            что-то начинающим ребятам. Начинать сложно, но интересно. <br>
                            Интернет "кишит" информацией. Надеюсь, я стану когда-нибудь <br>
                            Её полезной частью
                            lorem
                        </p>
                    </div>
					<div class="col-sm post__text">
                        <article>
                            Это вывод функции, прибавления к строке с 10
                            цифровыми значениями, с учётом переполнения.
                        </article>
                        <p>Вывод самой строки: <?php echo $string; ?></p>
                        <p>Итог сложения: <?php echo thousandplus1(); ?></p>
					</div>
                    <div class="col-sm post__text">
                        <article>
                            каждый 10й не выводить, каждый 5й красный, каждый 3й зелёный
                        </article>
                        <p>Вывод самой строки: </p>
                        <p><?php echo every5and10(); ?></p>
                    </div>
				</div>
				<div class="col-sm-3 mt-4 d-flex align-items-end flex-column r_side_content login_n_chat">
                    <div class="col">
                            <?php require_once "./components/userpanel.php";?>
                    </div>
                    <div class="col mt-3 chat__inner">
					    <?php require "./components/chat.php";?>
                    </div>
				</div>
			</div>
		</div>
        <footer>
            <?php require_once "./components/footer.php";?>
        </footer>
	</body>
</html>