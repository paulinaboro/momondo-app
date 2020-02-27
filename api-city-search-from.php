<?php
http_response_code(200);
header('Content-Type: application/json');
$sSearchFor = $_GET['cityName'];
$sData = file_get_contents('cities-with-airports.json');
$jData = json_decode($sData);
$jResponse = new stdClass(); // {}
$jResponse->cities = [];
foreach($jData->cities as $jCity){
  if( stripos($jCity->cityName, $sSearchFor) !== false ){
    $jResponse->cities[] =  $jCity; // same as array_push
  } 
}
echo json_encode($jResponse);





