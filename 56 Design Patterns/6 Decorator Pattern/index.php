<?php

interface Logger{
	public function log($msg);
}

//Concrete Component
class FileLogger implements Logger{
	public function log($msg){
		echo "<p>Logging to <b>file</b>: ($msg)</p>";
	}
}

//Decorator
abstract class LoggerDecorator implements Logger{
	protected $logger;
	
	public function __construct(Logger $logger){
		$this->logger = $logger;
	}
	
	public function log($msg){
	$this->logger->log($msg);
	}
}

class EmailLogger extends LoggerDecorator{
	public function log($msg){
		$this->logger->log($msg);
;		echo "<p>Logging to <b> EMAIL</b>: ($msg)</p>";
	}
}

//Text Logger
class TextmessageLogger extends LoggerDecorator{
	public function log($msg){
		$this->logger->log($msg);
;		echo "<p>Logging to <b> SMS</b>: ($msg)</p>";
	}
}

class PrintLogger extends LoggerDecorator{
	public function log($msg){
		$this->logger->log($msg);
;		echo "<p>Logging to <b> PRINT</b>: ($msg)</p>";
	}
}

class FaxLogger extends LoggerDecorator{
	public function log($msg){
		$this->logger->log($msg);
;		echo "<p>Logging to <b> FAX</b>: ($msg)</p>";
	}
}

$log = new FileLogger();
$log = new TextMessageLogger($log);
$log = new FaxLogger($log);

$log->log("saving file");

