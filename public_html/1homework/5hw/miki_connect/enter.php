<!DOCTYPE HTML>
<html>
	<head>
		<title>Contacts</title> <!-- название сайта -->
		<meta charset= "UTF-8"> <!-- кодировка -->
		<link rel= "shortcut icon" type= "image/x-icon" href= "../images/doge.jpg"> <!-- мини-хуёвина -->
		<link rel= "stylesheet" href= "../styles/style.css" media="all"> <!-- для всех устройств одно отображение -->
	</head>

	<body>
		<div class="header"> <!-- шапка сайта -->
			<div class="mid"> <!-- центральное расположение -->
				<div class="topmenu">
					<nav>
						<a href="/">Main Page</a>
						<a href="../list/news.html">News</a>
						<a href="../enter.php">Entertainments</a>
						<a href="../contacts.php">Contacts</a>
							<a href="../haabr/haabr.html">haabr</a>
						<a href="../registration/reg.php">Registration</a>
					</nav>
				</div>	
				<img src="../images/logotype_F.png" alt="Логотип сайта" title="Логотип сайта">
				<div class="photo-tape">
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="menu"> <!-- меню сайта --> 
			<div class="mid"> 


			</div>
		</div>
		<?php  
		//начало сессии
		if ($_SESSION['succes_reg'] == 1) {
			echo "<span style='color:red;'>Пользователь зарегистрирован</span>";
			unset($_SESSION['reg_success']);
		}
		?>

		<div class="content"> <!-- контент (основная часть) -->
			<div class="mid">
				
			</div>
		</div>

		<div class="footer"> <!-- нижняя часть -->
			<div class="mid"></div>
		</div>
	</body>
</html>