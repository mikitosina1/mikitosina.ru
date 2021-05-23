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

        $query = "INSERT INTO start_users (`".$into[0]."`,`".$into[1]."`,`".$into[2]."`,`".$into[3]."`,`".$into[4]."`,`".$into[5]."`,`".$into[6]."`,`".$into[7]."`) VALUES ('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."')";
        $db_class_handler = new dataBasetypical;
        $db_class_handler -> query($query);
        $db_class_handler -> close();
    }

    function checkUser($u_login, $u_password) {
//        if(($u_login == "") || ($u_password == "")) return false;
//        $db = connectDB();
//        mysqli_select_db($db, "mikitosinaru");
//        $result_set = $db -> query("SELECT u_password from start_users WHERE u_login = '$u_login' AND u_password = '$u_password'");
//        $user = $result_set -> fetch_assoc();
//        if ($user)
//            return true;
//        else
//            return false;
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