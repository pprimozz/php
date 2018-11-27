<?php

interface Command{
	public function execute();
}

class GetCompanyCommand implements Command{
	private $stockSim;
	
	public function execute(){
		$this->stockSim->getCompany();
	}
}

class UpdatePricesCommand implements Command{
	private $stockSim;
	
	public function execute(){
		$this->stockSim->updatePrices();
	}
}
//Receiver
class StockSim{
	public function getCompany(){
	// ...
	}
	
	public function updatePrice(){
	// ....
	}
}
//Client
//in == String
$in = getAction();

//Invoker
if (class_exists($in))
$comm = new $in(new StockSim());
 else 
	throw new Exception("....");
	
$comm->exe();