<aside class="comment_desk">
	<?
		// обращение к БД за комментарием
		$mes_result = mysqli_query($db, "SELECT * FROM messages");
		$comment = mysqli_fetch_array($mes_result);
	?>
	 <!-- вывод -->
	<div class="comment_block_container"> 
		<?php do { ?>
		<div class="comment">
			<strong><?=$comment['authors_login'];?></strong>
			<br>
			<div class="message_text">
				<?=$comment['message'];?>
				<br>
				<div class="message_date">
					<?=$comment['date'];?>
				</div>
			</div>
		</div>
		<?php } while($comment = mysqli_fetch_array($mes_result)); ?>
		<hr style="2px, black">
	</div>
	<?php
	function is_guest(){
		if (!empty($_SESSION['start_user'])) {
			return false;
		}return true;
	}
	?>
	<?if (is_guest()):?>
	<br>
	<div class="alert alert-warning" role="alert">
		<img src="./miki_styles/images/lolpic.png" style="width: 75%; height: 70%;" alt="">
		<br>
		Чтобы добавлять комментарии - зарегистрируйтесь или войдите в <a href="./miki_login/login.php">Учётную запись</a>.
	</div>
	<?else:?>
	<form action="./miki_connect/sendMessage.php" method="post" name="form"> <!-- форма написания комментариев -->
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
	<?endif;?>
</aside>
