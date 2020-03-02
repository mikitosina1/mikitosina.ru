<?php 
session_start();
include("./miki_connect/connect.php");
?>
<!DOCTYPE HTML>
<html>
<?php require_once './miki_components/head.php';?>

<body>
<?php require_once './miki_components/nav_panel.php';?>
<div class="container-fluid main_content">
	<div class="row cell_content">
		<div class="col-sm-8 l_side_content"></div>
		<div class="col-sm-4 mt-4 r_side_content">
			<?php require './miki_components/chat.php';?>
		</div>
	</div>
</div>
<?php  
//начало сессии
if ($_SESSION['succes_reg'] == 1) {
	echo "<span style='color:red;'>Пользователь зарегистрирован</span>";
	unset($_SESSION['reg_success']);
}
?>


<!-- BOOBStrap4 jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>