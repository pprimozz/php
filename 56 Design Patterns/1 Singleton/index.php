<?php

class Database  {
	
	public static $instance;
	
	public static function getInstance(){
		if (!isset(Database::$instance))
			Database::$instance = new Database();
			
			return Database::$instance;
	}
	
	private function __construct(){
		/* PRIVATE */
	}
	
	public function getQuery(){
		return "SELECT * FROM some_table";
	}
}

$db = Database::getInstance();
$db2 = Database::getInstance();
$db3 = Database::getInstance();

echo $db->getQuery();
var_dump($db2);
var_dump($db3);