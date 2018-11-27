<?php

// Observer
interface Observer{
	public function add(Company $subject);
	public function notify($price);
}

class StockSim implements Observer {
	private $companies;
	
	public function __construct(){
		$this->companies = array();
	}
	
	public function add(Company $subject){
		array_push($this->companies, $subject);
	}
	
	public function updatePrices(){
		// calculate new price
		$this->notify(rand(23.99, 199.23));
	}
	
	public function notify($price){
		foreach ($this->companies as $comp){
			$comp->update($price + rand(23.99, 199.42));
		}
	}
	
}

interface Company{
	public function update($price);
}

class Google implements Company{
	private $price;
	
	public function __construct($price){
		$this->price = $price;
		echo "<p>Creating Google at $price</p>";
	}
	public function update($price){
		$this->price = $price;
		echo "<p>Google selling for $price</p>";
	}
}

class Walmart implements Company{
	private $price;
	
	public function __construct($price){
		$this->price = $price;
		echo "<p>Creating Walmart at $price</p>";
	}
	public function update($price){
		$this->price = $price;
		echo "<p>Walmart selling for $this->price</p>";
	}
}

//Client

$stocksim = new StockSim();

$comp1 = new Google(19.99);
$comp2 = new Walmart(15.99);
$comp3 = new Google(19.99);
$comp4 = new Walmart(15.99);

$stocksim->add($comp1);
$stocksim->add($comp2);
$stocksim->add($comp3);
$stocksim->add($comp4);

echo "<hr/>";

$stocksim->updatePrices();

echo "<hr/>";

$stocksim->updatePrices();