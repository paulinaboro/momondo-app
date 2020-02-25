<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['cityName'];
$sData = file_get_contents('all-flights-list.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
// $jResponse->flights = [];
foreach($jData->flights as $jFlight){
  // echo "<div>$jCity->name</div>";
  if( stripos($jFlight->from, $sSearchFor) !== false ){
    // array_push($jResponse->cities, $jCity);
    $jResponse->flights[] =  $jFlight; // same as array_push
  
    
   

  } 
}

//Pushing searched flights to the new file
$sNewData = file_get_contents('founded-matching-flghts.json');
$jNewData = json_decode($sNewData);
// array_push($jNewData->flights, $jResponse);

array_push($jNewData->searchedFlights, $jResponse);
// array_push($jNewData->searchedFlights, $jResponse);
// Write back to the file
$sNewData = json_encode($jNewData, JSON_PRETTY_PRINT);
// echo $sNewData;
// Save city to file
file_put_contents('founded-matching-flghts.json', $sNewData);

echo json_encode($jResponse);





