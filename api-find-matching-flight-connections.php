<?php
http_response_code(200);
header('Content-Type: application/json');

$sSearchFor = $_GET['from'];


$sData = file_get_contents('demo-data.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->flights[] = [];
foreach($jData->flights as $jFlight){
  // echo "<div>$jCity->name</div>";
  if( stripos($jFlight->from, $sSearchFor) !== false ){
    // array_push($jResponse->cities, $jCity);
    $jResponse->flights[] = $jFlight; // same as array_push

  } 
}
//Pushing searched flights to the new file
$sNewData = file_get_contents('founded-matching-flights.json');
$jNewData = json_decode($sNewData);

array_push($jNewData->foundedFlights, $jResponse);

// Write back to the file
$sNewData = json_encode($jNewData, JSON_PRETTY_PRINT);
// echo $sNewData;
// Save city to file
file_put_contents('founded-matching-flights.json', $sNewData);
echo json_encode($jResponse);

