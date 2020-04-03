<?php

include 'src/covid.php';



$res = new Covid19();

/**get all data
[
	kota,
	odp,
	pdp,
	confirm.
	update time
]**/
print_r($res->getData());

// get specific data from location name
// print_r($res->zone("ponorogo"));
// print_r($res->zone("madiun"));


// get total odp in east java
print($res->getTotalODP());
// get total pdp in east java
print($res->getTotalPDP());
// get total Confirm in east java
print($res->getTotalConfirm());

