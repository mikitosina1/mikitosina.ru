<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once "./miki_components/functions.php";
include_once("./miki_connect/connect.php");
?>

<!DOCTYPE HTML>
<html lang="ru">
<?php require_once './miki_components/head.php';?>
<link rel="stylesheet" href="../miki_styles/news_style.css" media="all">
<body>
<?php require_once './miki_components/nav_panel.php';?>
<div class="container-fluid main_content">
	<div class="row cell_content">
        <div class="col-sm-6 mt-4 l_side_content">
		    <h4 class="news_labels">Добавление статьи</h4>
			<form action="" method="post">
                <label for="title" class="news_labels">Заголовок статьи :</label>
                <input type="text" name="title" id="title" class="form-control list">

                <label for="intro" class="news_labels">Интро статьи :</label>
                <textarea name="intro" id="intro" class="form-control list"></textarea>

                <label for="text" class="news_labels">Текст статьи :</label>
                <textarea name="text" id="text" class="form-control list"></textarea>

                <div class="alert alert-danger mt-2" id="errorBlock"></div>

                <button type="button" id="article_send" class="btn btn-success mt-3">
                Добавить
                </button>
		    </form>
        </div>
		<div class="col-sm-6 mt-4 r_side_content">
			<?php require './miki_components/chat.php';?>
            <div class = "side_user_panel">
                <?php
                    //require_once "./miki_components/userpanel.php";
                ?>
            </div>
		</div>
	</div>
</div>
<script>
	$('#article_send').click(function () {
		var title = $('#title').val();
		var intro = $('#intro').val();
		var text = $('#text').val();

		$.ajax({
			url: 'ajax/add_article.php',
			type: 'POST',
			cache: false,
			data: {'title' : title, 'intro' : intro, 'text' : text},
			dataType: 'html',
			success: function(data) {
			  if(data === 'Готово') {
				$('#article_send').text('Все готово');
				$('#errorBlock').hide();
				}	else {
						$('#errorBlock').show();
						$('#errorBlock').text(data);
					}
				}
		});
	});
</script>
<?php require_once './miki_components/footer.php';?>
</body>
</html>