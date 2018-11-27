<?php

interface Shape{
	public function getArea();	
}

class Rect implements Shape{
	private $width;
	private $height;
	
	public function __construct($width, $height){
		
	$this->width = $width;
	$this->height = $height;	
	}
	
	public function getArea(){
		return $this->width * $this->height;	
	}
}

class Circle implements Shape{
	private $radius;
	
	public function __construct($radius) {
		$this->radius = $radius;	
	}	
	
	public function getArea(){
		return $this->radius * $this->radius * 3.14156;
		}
	
}