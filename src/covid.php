<?php

/**
 *
 * Defri Indra M
 * 03 April 2020
 * 
 */
class Covid19 {
	protected $url = "https://api.covid.defrindr.my.id/jatim";
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
		$data2 = $sources2->data[0];
		$this->totalPositif = $data2->kasus_positif;
		$this->totalSembuh = $data2->kasus_sembuh;
		$this->totalMeninggal = $data2->kasus_meninggal;
		
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

	public function __get($var){
		switch ($var) {
			case 'totalPositif':
				return $this->totalPositif;
				break;
			case 'totalSembuh':
				return $this->totalSembuh;
				break;
			case 'totalMeninggal':
				return $this->totalMeninggal;
				break;
			default:
				return "Data not found";
				break;
		}
	}

}

