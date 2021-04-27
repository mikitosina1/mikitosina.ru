<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once "./components/main_func.php";	
include("./connect/connect.php");
?>

<!DOCTYPE HTML>
<html lang="ru">
<head>
    <?php require_once './components/head.php';?>
    <link rel="stylesheet" href="./styles/contacts_style.css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all">
</head>
<body>

<?php require_once './components/nav_panel.php';?>
<div class="row about"> 
	<div class="col-lg-4 col-md-4 col-sm-12">
		<img src="./styles/imfphotos/photoabout.jpg" class="img-fluid" alt="mp">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-12 desc">
		<br>
		<br>
		<br>
		<br>
		<h3><span style="color: #10828C;">▍./Junior/web-dev/З.Никита.php;</span></h3>
		<p>
			Здравствуй!<br>
			Волей случая (или мы с тобой знакомы) ты попал на мой ресурс. </br>
			Смысл этого маленького блога - показать на примере технологии, которые я освоил, как мой полигон для учёбы. </br>
            Открытий и экспериментов над моими знаниями, умениями и пониманием технических ресурсов, которыми я обладаю на данный момент.</br>

			Зовут меня Никита, в форме обратной связи или прикреплённых ссылках моих соц.сетей можешь ко мне так и обращаться.
			<br>
			<br>
			<hr>
            <h4>2019 &#169; Заречный Никита Викторович.</h4>
			<div class="social vk">
				<a href="https://vk.com/mikitosina" target="_blank"><i class="fa fa-vk fa-2x"></i></a>    
			</div>
			<div class="social telegram">
				<a href="https://t.me/mikitosina" target="_blank"><i class="fa fa-paper-plane fa-2x"></i></a>
			</div>
			<div class="social facebook">
				<a href="https://www.facebook.com/mikitosina" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>    
			</div>
			<div class="social github">
				<a href="https://github.com/mikitosina1" target="_blank"><i class="fa fa-github fa-2x"></i></a>
			</div>
			<div class="social whatsapp">
				<a href=" https://wa.me/89533610771" target="_blank"><i class="fa fa-whatsapp fa-2x"></i></a>
			</div>
        <div class="nick__frame">
            <a href="https://nick-name.ru/nickname/id1662492/">
                <img src="https://nick-name.ru/img.php?id=1662492&sert=1" alt="Сертификат на никнейм mikitosina1, зарегистрирован на https://vk.com/mikitosina" border="0" style="width: 25em; height: 15em;"/>
            </a>
        </div>
        </p>
<!--        --><?php //require_once './miki_components/userpanel.php';?>
	</div>
</div>
<footer>
    <?php require_once 'components/footer.php';?>
</footer>
</body>


</html>