<?php

interface SortStrategy{
	public function sort();
}

class QuickSort{
	private $data;
	
	public function __construct(Array $data){
	$this->data = $data;	
		}
		
		public function sort(){
			//...
			}
}

class MerchSort{
	private $data;
	
	public function __construct($data){
		$this->data = $data;
		}
		
	public function sort(){
		//...
			}
}

function sort(Array &$data){
	if (count($data) > 20){
		$tempdata = new QuickSort($data);
		} else{
			$tempdata = new MerchSort($data);
			}
			$tempdata->sort();
}

$data = array(2,3,4,5,6,7,8,9,6,432,34,56,78,909);
sort($data);