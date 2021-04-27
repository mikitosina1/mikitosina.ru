<!DOCTYPE html>
<html lang="en">

<?php require_once './components/head.php';?>

<body>
<?php require_once './components/nav_panel.php';?>
<div class="row">
	<div class="col-lg">
		<a class="btn btn-warning btn-lg" href="./news.php" role="button">Назад к новостям</a>
	</div>
	<div class="col-lg mt-4">
			<!-- MainContent -->
	<h4>Добавление статьи</h4>
	<form action="" method="post">
		<label for="title">Заголовок статьи</label>
		<input type="text" name="title" id="title" class="form-control">



<!-- 	<label for="intro">Интро статьи</label>
		<textarea name="intro" id="intro" class="form-control"></textarea> -->

		<label for="text">Текст статьи</label>
		<textarea name="text" id="text" class="form-control"></textarea>

		<div class="alert alert-danger mt-2" id="errorBlock"></div>

		<button type="button" id="article_send" class="btn btn-success mt-3">
		Добавить
		</button>
	</form>
	</div>
	<div class="col-lg"></div>
</div>
<!-- BOOBStrap4 jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		  		if(data == 'Готово') {
					$('#article_send').text('Все готово');
					$('#errorBlock').hide();
				}else {
					$('#errorBlock').show();
					$('#errorBlock').text(data);
				}
			}
		});
	});
</script>
</body>
</html>