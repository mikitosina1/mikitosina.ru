<link rel="stylesheet" href="../styles/chat_style.css" media="all">

<?php
require_once (realpath(dirname(__FILE__) . '/main_func.php'));
require_once (realpath(dirname(__FILE__) . '/../connect/connect.php'));
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