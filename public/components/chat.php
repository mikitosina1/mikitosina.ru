<link rel="stylesheet" href="../styles/chat_style.css" media="all">
<!-- <script src="ajax/chat_class.js" type="text/javascript"></script> -->

<?php
require_once (realpath(dirname(__FILE__).'/main_func.php'));
require_once (realpath(dirname(__FILE__).'/chat_class.php'));
require_once (realpath(dirname(__FILE__).'/../connect/connect.php'));
$message_ar = array();
$user_handler = new typicalUser();
$chat_class_holder = new chatForUsers();
$mes_query = $chat_class_holder->showMessages();
$message_ar = $mes_query;
?>
<!-- вывод -->
<div class="comment_block_container">
	<?php foreach ($message_ar as $k => $v) {?>
		<div class="comment">
			<strong><?= $v['authors_login'];?> :</strong>
			<br>
			<div class="message_text">
				<?= $v['message'];?>
				<br>
				<div class="message_date">
					<?= $v['date'];?>
				</div>
			</div>
		</div>
		<hr>
	<?php }?>
</div>
<div class="alert alert-danger mt-2" id="errorBlock"></div>
<?php if ($user_handler->is_guest()==FALSE):?>
<br>
<div class="alert alert-warning" role="alert">
	<img src="./styles/images/lolpic.png" style="width: 75%; height: 70%;" alt="">
	<br>
	<p>Чтобы добавлять комментарии - зарегистрируйтесь или войдите в <a href="./login/login.php">Учётную запись</a>.</p>
</div>
<?php else:?>
<form method="post" name="form" id="chForm"> <!-- форма написания комментариев -->
	<input name="authors_login" value="<?=$_SESSION['u_login']?>" type="text" id="authors_login" class="hidden">
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