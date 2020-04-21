<?php

include 'src/covid.php';


$res = new Covid19;

/**get all data
[
	// KAB/KOTA
    // ODR
    // OTG
    // ODP
    // PDP
    // CONFIRM
    // DATA TERAKHIR
]**/
// print_r($res->getAllZone());

// get specific data from location name
// print_r($res->getZone("ponorogo"));
// print_r($res->getZone("madiun"));


// get total odp in east java
print($res->totalSembuh . "\n");
// get total pdp in east java
print($res->totalMeninggal . "\n");
// get total Confirm in east java
print($res->totalPositif . "\n");

