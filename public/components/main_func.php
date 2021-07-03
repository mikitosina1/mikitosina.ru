<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once (realpath(dirname(__FILE__) . '/../connect/connect.php'));

class typicalUser{
	protected string $query = '';
	protected array $into = array();
	protected array $value = array();
	protected array $params = array();
	protected string $u_login = '';
	protected string $u_password = '';
	public string $error = '';
	
	public function regUser($params){
		foreach ($params as $k => $v){
			$into[] = $k;
			$value[] = $v;
		}
		$query = "INSERT INTO start_users (`".$into[0]."`,`".$into[1]."`,`".$into[2]."`,`".$into[3]."`,`".$into[4]."`,`".$into[5]."`,`".$into[6]."`,`".$into[7]."`,`".$into[8]."`) VALUES ('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."')";
		$db_class_handler = new dataBasetypical();
		$db_class_handler -> query($query);
		return $_SESSION["success_reg"] = 1;
	}
	
	public function loginUser($u_login, $u_password) {
		$query = "SELECT * FROM `start_users` WHERE `u_login`='$u_login'";
		$crypted_u_password = crypt($u_password, "Y0HlemyzlpR4");
		$db_class_handler = new dataBasetypical();
		$user = $db_class_handler->query($query)->fetchArray();
		var_dump($user);
		if ($user){
			while ($user){
				if(password_verify($crypted_u_password, $user['u_password'])){
					$_SESSION['is_guest'] = true;
					$_SESSION['u_login'] = $user['u_login'];
					$_SESSION['user_id'] = $user['user_id'];
					$_SESSION['u_name'] = $user['u_name'];
					$_SESSION['u_lastname'] = $user['u_lastname'];
					$_SESSION['u_age'] = $user['u_age'];
					$_SESSION['role'] = $user['role'];
					$_SESSION["success_log"] = 1;
					setcookie('u_login', $user['u_login'], time()+3600*24*2, "/");
					return $_SESSION;
				}else{
					$error = "<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>Введите верный пароль. Проверьте язык клавиатуры. Он не может быть менее 8 символов.</h3></br>
					<a href='../' class='btn btn-primary'>На главную</a></br>
					<a href='../login/login.php' class='btn btn-primary'>Предыдущая страница</a>
				";
					return $error;
				}
			}
		}else{
			$error = "<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>Введите верный Логин. Проверьте язык клавиатуры.</h3></br>
					<a href='../' class='btn btn-primary'>На главную</a></br>
					<a href='../login/login.php' class='btn btn-primary'>Предыдущая страница</a>
				";
			return $error;
		}
	}

	public function issetUser ($u_email, $u_login, $username, $userlastname) {
		$query = "SELECT * FROM `start_users` WHERE `u_email`='$u_email' OR `u_login`='$u_login' OR (`u_email`='$u_email' AND `u_name`='$username' AND `u_lastname`='$userlastname') OR (`u_login`='$u_login' AND `u_name`='$username' AND `u_lastname`='$userlastname')";
		$db_class_handler = new dataBasetypical();
		$user = $db_class_handler->query($query)->fetchAll();
		while ($user){
			if (isset($user)) {
				return
					"<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>
					Бабушки у моего двора посовещались и подсказали, что они вас уже видели. Повторно регистрироваться нет необходимости. :)
					</h3></br>
					<a href='../' class='btn btn-primary'>На главную</a></br>
					<a href='reg.php' class='btn btn-primary'>Предыдущая страница</a>"
				;
			}
			else if (strlen($u_login) <= 3 || isset($u_login))
				return
				"<h3 style='text-align: center; margin-top: 2em; background: deepskyblue;'>
			Упс, ваш логин уже используется или не соответствует требованиям заполнения
		</h3></br>
		<a href='../' class='btn btn-primary'>На главную</a></br>
		<a href='reg.php' class='btn btn-primary'>Предыдущая страница</a>"
				;
			else
				return false;
		}
	}

	function is_guest(){
		if(isset($_SESSION['is_guest']) && !empty($_SESSION['is_guest'])) {
			return true;
		}return false;
	}

	function hashPassword($u_password) {
		$cryprt_pas = crypt($u_password, "Y0HlemyzlpR4");
		return password_hash($cryprt_pas,PASSWORD_BCRYPT);
	}
}
