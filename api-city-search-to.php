<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['cityName'];
$sData = file_get_contents('cities-with-airports.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->cities = [];
foreach($jData->cities as $jCity){
  // echo "<div>$jCity->name</div>";
  if( stripos($jCity->cityName, $sSearchFor) !== false ){
    // array_push($jResponse->cities, $jCity);
    $jResponse->cities[] =  $jCity; // same as array_push

  } 
}


//now habe to take the value from and to and than push the flights objects with those value to the 'founded-matching-fligths.json"

//Pushing searched flights to the new file
// $sNewData = file_get_contents('founded-matching-flights.json');
// $jNewData = json_decode($sNewData);
// // array_push($jNewData->flights, $jResponse);

// array_push($jNewData->foundedAvailableFlights, $jResponse);
// // array_push($jNewData->searchedFlights, $jResponse);
// // Write back to the file
// $sNewData = json_encode($jNewData, JSON_PRETTY_PRINT);
// // echo $sNewData;
// // Save city to file
// file_put_contents('founded-matching-flights.json', $sNewData);

echo json_encode($jResponse);