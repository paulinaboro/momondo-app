<?php
http_response_code(200);
header('Content-Type: application/json');

$sSearchFor = $_GET['code'];
$sSearchFor2 = $_GET['lastName'];

$sData = file_get_contents('booked-flights.json');
$jData = json_decode($sData);

// $jResponse->x = array();
// foreach($jData->bookings as $jBooking){
//   if( stripos($jBooking->bookingCode, $sSearchFor) && stripos($jBooking->passengerSurname, $sSearchFor2) !== false ){
    
//     $jResponse->x = $jBooking; // same as array_push
//   } 
// }

// foreach($jData->bookings as $jBooking){
//   if( stripos($jBooking->bookingCode, $sSearchFor) !== false ){
    
//     $jResponse = $jBooking; // same as array_push
//   } 
// }


foreach($jData->bookings as $jBooking){
 
if(stripos($jBooking->bookingCode, $sSearchFor) !== false){ //check for the first element 
  if(stripos($jBooking->passengerSurname, $sSearchFor2) !== false){ //check for the second element
    $jResponse = $jBooking; // same as array_push
  }
}
}


$sData = json_encode($jResponse, JSON_PRETTY_PRINT);
echo json_encode($jResponse);



