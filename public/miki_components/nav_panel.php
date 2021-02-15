<nav class="navbar navbar-expand-lg flex-column flex-md-row" role="navigation">
    <div class="logo__part">
        <a class="navbar-brand" href="/">
            <img src="../miki_styles/images/logo-03.svg" alt="Логотип сайта" title="Логотип сайта" class="logo_header">
            <div class="title__blog">Mikitosina's Blog :D</div>
        </a>
    </div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon">
            <img src="../miki_styles/images/hamburger.svg" alt="hamburger">
        </span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Home
				<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../news.php">News</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../contacts.php">Contacts</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Hometask
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../1homework/twitter/index.html">Twitter</a>
                    <a class="dropdown-item" href="../1homework/2hw/index.php">parser</a>
                    <a class="dropdown-item" href="../1homework/3hw/index.php">3hw</a>
                    <a class="dropdown-item" href="../work_project/index.html">Тиснение</a>
                    <a class="dropdown-item" href="../1homework/Laravel-homework/laravel_app/public/index.php">Laravel-test_app</a>
				</div>
			</li>
			<?php if (is_guest()):?>
			<li class="nav-item loggg">
				<a class="btn btn-outline-primary Log_button" href="../miki_login/login.php">Login</a>
			</li>
			<li class="nav-item reggg">
				<a class="btn btn-outline-secondary Reg_button" href="../miki_registration/reg.php">Registration</a>
			</li>
			<?php else:?>
				<li class="nav-item">
					<p>Здравствуйте, <b><?=$_SESSION['u_login']?></b>!</p>
				</li>
				<li class="nav-item loggg">
					<a class="btn btn-outline-primary Log_button" href="../u_cabinet">Кабинет</a>
			</li>
				<li class="nav-item">
					<a href='../miki_login/logout.php' class="nav-link">Выйти</a>
				</li>
			<?php endif;?>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="в разработке :)" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>