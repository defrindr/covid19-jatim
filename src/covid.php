<?php

/**
 *
 * Defri Indra M
 * 03 April 2020
 * 
 */
class Covid19 {
	protected $url = "https://literasistmj.000webhostapp.com/jatim";
	protected $data = [];

	protected $totalPositif = 0;
	protected $totalSembuh = 0;
	protected $totalMeninggal = 0;

	function __construct(){
		$this->data = $this->request();
	}

	function request(){
		
		$sources = json_decode(file_get_contents($this->url));
		$sources2 = json_decode(file_get_contents(preg_replace("/jatim/","province/jawa%20timur",$this->url)));
		
		$data = $sources->data;
		$data2 = $sources2->data;

		foreach($data2 as $row){
			$this->totalPositif = $row->kasus_positif;
			$this->totalSembuh = $row->kasus_sembuh;
			$this->totalMeninggal = $row->kasus_meninggal;
		}
		
		return $data;
	}


	public function getZone($zone){
		if(gettype($zone) == "string"){
			return $this->matchWithString($zone);
		}else{
			return $this->matchWithArray($zone);
		}

	}

	private function matchWithArray($arr){
		$temp = [];
		foreach($this->data as $val){
			foreach ($arr as $value) {
				if(strpos(strtolower($val->zona), strtolower($value) )
				){
					array_push($temp,$val);
				}
			}
		}

		return $temp;
	}

	private function matchWithString($str){
		$temp = [];
		foreach($this->data as $val){
			if(strpos(strtolower($val->zona),strtolower($str) )
			){
				array_push($temp,$val);
			}
		}

		return $temp;
	}

	public function getAllZone(){
		return $this->data;
	}

	public function __toString(){
		$ret = [
			"total_positif" => $this->totalPositif,
			"total_sembuh" => $this->totalSembuh,
			"total_meninggal" => $this->totalMeninggal,
		];

		return $ret;
	}

	public function get(){
		$ret = [
			"total_positif" => $this->totalPositif,
			"total_sembuh" => $this->totalSembuh,
			"total_meninggal" => $this->totalMeninggal,
		];

		return $ret;
	}
}

// $res = new Covid19;


// print_r($res->getZone("ponorogo"));


