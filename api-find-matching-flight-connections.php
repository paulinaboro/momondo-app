<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['from'];
$sData = file_get_contents('all-available-flights-list.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->flights[] = [];
//Pushing searched flights to the new file
$sNewData = file_get_contents('founded-matching-flights.json');
$jNewData = json_decode($sNewData);

foreach($jData->flights as $jFlight){
  if( stripos($jFlight->from, $sSearchFor) !== false ){
  
    array_unshift($jNewData->flights, $jFlight);
  } 
}
// Write back to the file
$sNewData = json_encode($jNewData, JSON_PRETTY_PRINT);
// Save city to file
file_put_contents('founded-matching-flights.json', $sNewData);
echo json_encode($jResponse);


