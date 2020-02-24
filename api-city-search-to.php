<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['cityName'];
$sData = file_get_contents('all-flights-list.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->flights = [];
foreach($jData->flights as $jFlight){
  // echo "<div>$jCity->name</div>";
  if( stripos($jFlight->to, $sSearchFor) !== false ){
    // array_push($jResponse->cities, $jCity);
    $jResponse->flights[] =  $jFlight; // same as array_push
  } 
}
echo json_encode($jResponse);






