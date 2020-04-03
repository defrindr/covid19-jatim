<?php

/**
 *
 * Defri Indra M
 * 03 April 2020
 * 
 */
class Covid19 {
	protected $url = "https://covid19dev.jatimprov.go.id/xweb/draxi";
	protected $data = [];

	protected $totalODP = 0;
	protected $totalPDP = 0;
	protected $totalConfirm = 0;

	function __construct(){
		$this->data = $this->request();
	}

	function request(){
		$curl = curl_init();

		$header = [
			"Accept" => "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
			"Accept-Encoding" =>  "gzip, deflate, br",
			"Accept-Language" => "en-GB,en-US;q=0.9,en;q=0.8,id;q=0.7",
			"Cache-Control" => "no-cache",
			"Connection" => "keep-alive",
			"Host" => $this->url,
			"Pragma" => "no-cache",
			"Sec-Fetch-Dest" => "document",
			"Sec-Fetch-Mode" => "navigate",
			"Sec-Fetch-Site" => "none",
			"Sec-Fetch-User" => "?1",
			"Upgrade-Insecure-Requests" => "1",
			"User-Agent" => "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36",
		];

		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HEADER, $header);

		$sources = curl_exec($curl);

		curl_close($curl);

		preg_match_all("/<tr>\s.+[\s].+<td>(.+)<\/td>\s.+<td>(.+)<\/td>\s.+<td>(.+)<\/td>\s.+<td>(.+)<\/td>\s.+<td>(.+)<\/td>\s.+<\/tr>/", $sources, $res);

		$data = [];

		for(
			$i = 0;
			$i < count($res[0]);
			$i++
		){

			array_push($data,[
				$res[1][$i],
				$res[2][$i],
				$res[3][$i],
				$res[4][$i],
				$res[5][$i]
			]);
		}

		unset($data[0]); // delete thead

		$this->totalODP = $data[count($data)][1];
		$this->totalPDP = $data[count($data)][2];
		$this->totalConfirm = $data[count($data)][3];

		unset($data[ count($data) ]);

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
				if(strpos(
					strtolower($val[0]), strtolower($value))
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
			if(strpos(
				strtolower($val[0]), strtolower($str) )
			){
				array_push($temp,$val);
			}
		}

		return $temp;
	}

	public function getData(){
		return $this->data;
	}

	public function getTotalODP(){
		return $this->totalODP;
	}
	public function getTotalPDP(){
		return $this->totalPDP;
	}
	public function getTotalConfirm(){
		return $this->totalConfirm;
	}
}
