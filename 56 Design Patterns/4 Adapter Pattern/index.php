<?php

class Facebook {
	public function postToWall($msg){
		echo 'Posting message';
		}
}

interface SocialMediaAdapter{
	public function post($msg);
}

class FacebookAdapter implements SocialMediaAdapter{
	
	private $facebook;
	
	public function __construct(Facebook $facebook){
		$this->facebook=$facebook;
	}
	
	public function post($msg){
		$this->facebook->postToWall($msg);
		}
}

function getMessageFromUser(){
	return 'bla bla bla';
}

$facebook = new FacebookAdapter(new Facebook());

$msg = getMessageFromUser();

$facebook->post($msg);