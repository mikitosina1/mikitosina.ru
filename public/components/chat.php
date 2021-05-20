<link rel="stylesheet" href="../styles/chat_style.css" media="all">

<?php
require_once "main_func.php";
// обращение к БД за комментарием
$mes_result = mysqli_query($db, "SELECT * FROM messages");
$comment = mysqli_fetch_array($mes_result);
$user_handler = new typicalUser();
?>
<!-- вывод -->
<div class="comment_block_container">
	<?php do { ?>
	<div class="comment">
		<strong><?=$comment['authors_login'];?> :</strong>
		<br>
		<div class="message_text">
			<?=$comment['message'];?>
			<br>
			<div class="message_date">
				<?=$comment['date'];?>
			</div>
		</div>
	</div>
	<?php } while($comment = mysqli_fetch_array($mes_result));?>
	<hr>
</div>
<?php if ($user_handler->is_guest()):?>
<br>
<div class="alert alert-warning" role="alert">
	<img src="./styles/images/lolpic.png" style="width: 75%; height: 70%;" alt="">
	<br>
	<p>Чтобы добавлять комментарии - зарегистрируйтесь или войдите в <a href="./login/login.php">Учётную запись</a>.</p>
</div>
<?php else:?>
<form action="./connect/sendMessage.php" method="post" name="form"> <!-- форма написания комментариев -->
	<p>Автор:
		<br>
		<input name="authors_login" type="text" id="authors_login">
	</p> <!-- TODO имя авторизированного пользователя -->
	<p>Комментарии:
		<br>
		<textarea name="message" rows="9" cols="60" id="message"></textarea>
	</p>
	<input name="go_message" type="hidden" value="no" id="go_message">
	<p class="submit-btn">
		<input name="button" type="submit" value="Отправить" id="send">
		<span id="resp"></span>
	</p>
</form>
<?php endif;?>