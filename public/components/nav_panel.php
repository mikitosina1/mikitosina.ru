<?php
require_once (realpath(dirname(__FILE__).'/../components/main_func.php'));
$user_handler = new typicalUser();
?>

<nav class="navbar navbar-expand-lg flex-column flex-md-row justify-content-center" role="navigation">
	<div class="logo__part">
		<a class="navbar-brand" href="/">
			<img src="../styles/images/blog.svg" alt="Логотип сайта" title="Логотип сайта" class="logo_header">
			<div class="title__blog">Mikitosina's Blog :D</div>
		</a>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon">
			<img src="../styles/images/hamburger.svg" alt="hamburger">
		</span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../news.php">News</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../contacts.php">Contacts</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdownHT" data-bs-toggle="dropdown" aria-expanded="true">Hometask</a>
				<div class="dropdown-menu" aria-labelledby="dropdownHT">
					<a class="dropdown-item" href="../1homework/twitter/index.html">Twitter</a>
					<a class="dropdown-item" href="../1homework/2hw/index.php">parser</a>
					<a class="dropdown-item" href="../1homework/3hw/index.php">3hw</a>
					<a class="dropdown-item" href="../1homework/Laravel-homework/laravel_app/public/index.php">Laravel-test_app</a>
				</div>
			</li>
			<?php if ($user_handler->is_guest() == FALSE):?>
			<li class="nav-item loggg">
				<a class="btn btn-outline-primary Log_button" href="../login/login.php">Login</a>
			</li>
			<li class="nav-item reggg">
				<a class="btn Reg_button" href="../registration/reg.php">Registration</a>
			</li>
			<?php else:?>
				<li class="nav-item">
					<p>Здравствуйте, <b><?=$_SESSION['u_name']?></b>!</p>
				</li>
				<li class="nav-item loggg">
					<a class="btn btn-outline-primary Log_button" href="../u_cabinet">Кабинет</a>
			</li>
				<li class="nav-item">
					<a href='../login/logout.php' class="nav-link">Выйти</a>
				</li>
			<?php endif;?>
		</ul>
	</div>
</nav>