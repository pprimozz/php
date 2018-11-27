<?php

class Database{

}

class Template{

}

class Loger{

}

// Creates a page and logs activity
class PageFacade{
	public function createAndServe($id, $msg=""){
	$db = new Database();
	$data = $db->getData($id);
	
	$template = new Template($id, $data);
	$template->serve();
	
	$logger = new Logger();
	$logger->log($msg);
	}

}

$page = new PageFacade();

$id = $_POST["id"];
$page->createAndServe($id, "Serving a page for ($id)");
