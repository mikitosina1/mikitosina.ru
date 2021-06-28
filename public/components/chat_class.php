<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once (realpath(dirname(__FILE__) . '/../connect/connect.php'));

class chatForUsers {
	public string $query = '';
	public array $message_ar = array();
	
	public function showMessages() {
		$query = "SELECT * FROM `messages`";
		$db_class_handler = new dataBasetypical();
		$message_ar = $db_class_handler->query($query)->fetchAll();
		return $message_ar;
	}
	
	public function sendMessages($authors_login, $message, $date) {
		$mes_result = "INSERT INTO messages (authors_login, message, date) VALUES ('$authors_login', '$message', '$date')";
		$db_class_handler = new dataBasetypical();
		$db_class_handler -> query($mes_result);
	}
}