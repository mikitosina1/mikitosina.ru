<? include("includes/db.php");

	$echo = "<div class='tables'>
	<div class='table'>
		<div class='table-wrapper'>
			<div class='table-title'>Страницы</div>
			<div class='table-content'>
				$articles
				<a href='?act=add_article'class='table__add-button'id='add_article'>+</a>
			</div>
		</div>
	</div>
	<div class='table'>
		<div class='table-wrapper'>
			<div class='table-title'>Пользователи</div>
			<div class='table-content'>
				$users
				<a href='?act=add_user'class='table__add-button'id='add_user'>+</a>
			</div>
		</div>
	</div>";
	
$echo = "<div class='table'>
	<div class='table-wrapper'>
		<div class='table-title'>Войти в панель администратора</div>
		<div class='table-content'>
			<form method='post' id='login-form' class='login-form'>
			<input type='text' placeholder='Логин' class='input'
			name='login' required><br>
			<input type='password' placeholder='Пароль' class='input'
			name='password' required><br>
			<input type='submit' value='Войти' class='button'>
			</form>
		</div>
	</div>
</div>";

function login($db,$login,$password) {
	//Запрос в базу данных
	$loginResult = mysqli_query($db,"SELECT * FROM userlist WHERE login='$login'
	AND password='$password' AND admin='1'");
	if(mysqli_num_rows($loginResult) == 1) {  
		//Если есть совпадение,возвращается true
		return true;
	}else {
		//Если такого пользователя не существует, данные стираются,а возвращается false
		unset($_SESSION['login'],$_SESSION['password']);
		return false;
	}
}

if(isset($_POST['login']) && isset($_POST['password'])) {
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['password'] = $_POST['password'];
}

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
	if(login($db,$_SESSION['login'],$_SESSION['password'])) {
		//Попытка авторизации
		 $echo = null; //Обнуление переменной, чтобы удалить из вывода форму авторизации
	}
}

if(isset($_GET['act'])) {
	$act = $_GET['act'];
}else {
	$act = 'home';
}

switch($act) {
	case 'home': $article_result = mysqli_query($db,"SELECT * FROM articles");
	if(mysqli_num_rows($article_result) >= 1) {
		while($article_array = mysqli_fetch_array($article_result)) {
		$articles .= "<div class='table-content__list-item'>
			<a href='?act=edit_article&id=$article_array[id]'>$article_array[id] | $article_array[title]</a>
		</div>";
		}
	}

	else {
	$articles = "Статей пока нет";
	}

	$users_result = mysqli_query($db,"SELECT * FROM userlist");

	if(mysqli_num_rows($users_result) >= 1) {
	while($users_array = mysqli_fetch_array($users_result)) {
		$users .= "<div class='table-content__list-item'>
			<a href='?act=edit_user&id=$users_array[id]'>$users_array[id] | $users_array[login]</a>
			</div>";
		}
	}
	else {
		$users = "Статей пока нет";
	}

	break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- my_css -->
	<link rel="shortcut icon" type="image/png" href="../styles/little_pictures/favicon.png"/>
	<link rel="stylesheet" href="../styles/admin_style.css">
	<title>admin:login</title>
</head>

<body>
	<a href="https://mikitosina.ru/work_project/index.html" class="comeback_btn">вернуться на главную страницу</a>
	<div class='wrapper'>
		<main class='main' id='main'>
			<?echo $echo;?>
		</main>
	</div>
</body>
</html>