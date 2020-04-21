<?php

include 'src/covid.php';

$crona = new Covid19();


if(isset($_GET['location'])){
	echo "<pre>";
    echo json_encode($crona->getZone($_GET['location']), JSON_PRETTY_PRINT);
    echo "</pre>";
}else if(isset($_GET['alllocation'])){
	echo "<pre>";
    echo json_encode($crona->getAllZone(), JSON_PRETTY_PRINT);
    echo "</pre>";
}else{
	echo "<pre>";
    echo json_encode($crona->get(), JSON_PRETTY_PRINT);
	echo "</pre>";
}

