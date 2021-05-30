<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once (realpath(dirname(__FILE__) . '/../connect/connect.php'));

class typicalUser{
    /**
     * @var $query string хранилище запроса в БД
     */
    protected $query;
    protected $into = array();
    protected $value = array();

    public function regUser($params){

        foreach ($params as $k => $v){
            $into[] = $k;
            $value[] = $v;
        }

        $query = "INSERT INTO start_users (`".$into[0]."`,`".$into[1]."`,`".$into[2]."`,`".$into[3]."`,`".$into[4]."`,`".$into[5]."`,`".$into[6]."`,`".$into[7]."`,`".$into[8]."`) VALUES ('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."')";
        $db_class_handler = new dataBasetypical();
        $db_class_handler -> query($query);
//        $db_class_handler -> close();
    }

    function loginUser($u_login, $u_password) {

        if(($u_login == "") || ($u_password == "")) return false;
        $query = "SELECT `user_id`, `u_login`,`u_password`, `u_name`, `u_lastname`, `u_age`, `role` FROM `start_users` WHERE `u_login`='$u_login' AND `u_password`='$u_password'";
        $db_class_handler = new dataBasetypical();
        $user = $db_class_handler->query($query)->fetchAll();
        if ($user)
            return true;
        else
            return false;
    }

    function issetUser ($u_email, $u_login, $username, $userlastname) {
        $query = "SELECT * FROM `start_users`";
        $db_class_handler = new dataBasetypical();
        $user = $db_class_handler->query($query)->fetchAll();
    }

    function is_guest(){
        if (!empty($_SESSION['u_login'])) {
            return false;
        }return true;
    }

    function hashPassword($u_password) {
        $cryprt_pas = crypt($u_password, "Y0HlemyzlpR4");
        return password_hash($cryprt_pas,PASSWORD_BCRYPT );
    }
}

class chatForUsers {
    protected $query;
    public $message_ar = array();

    public function showMessages() {
        $query = "SELECT * FROM `messages`";
        $db_class_handler = new dataBasetypical();
        $message_ar = $db_class_handler->query($query)->fetchAll();
        return $message_ar;
    }

}