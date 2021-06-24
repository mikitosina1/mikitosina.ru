<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once (realpath(dirname(__FILE__) . '/../connect/connect.php'));

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