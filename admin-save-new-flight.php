<?php
// Read/Open file 
$sData = file_get_contents('demo-data.json');
// echo $sData;
$jData = json_decode($sData);
// CREATE A NEW FLIGHT JSON OBJECT
$jFlight = new stdClass();
// create a new keys
$jFlight->id = bin2hex(random_bytes(16)); // uniqid();
$jFlight->flightId = $_POST["flight-flightId"];
$jFlight->from = $_POST["flight-from"];
$jFlight->fromCityCode = $_POST['flight-fromCityCode'];
$jFlight->to = $_POST['flight-to'];
$jFlight->toCityCode = $_POST['flight-toCityCode'];
$jFlight->departureTime = $_POST['flight-departureTime'];
$jFlight->arrivalTime = $_POST['flight-arrivalTime'];
$jFlight->companyShortcut = $_POST['flight-companyShortcut'];
$jFlight->companyName = $_POST['flight-companyName'];
$jFlight->flightDuration = $_POST['flight-flightDuration'];
$jFlight->price = $_POST['flight-price'];
$jFlight->totalPrice = $_POST['flight-totalPrice'];


// if (isset(($_POST['stop1-name']), ($_POST['stop1-airportName']), ($_POST['stop1-airportCode']), ($_POST['stop1-stopDuration']))){
    $jFlight->stops = [];
  if( isset($_POST['stop1-name']) ){
    $jStop1= new stdClass();
    $jStop1->name = $_POST['stop1-name'];
    $jStop1->airportName = $_POST['stop1-airportName'];
    $jStop1->airportCode = $_POST['stop1-airportCode'];
    $jStop1->stopDuration = $_POST['stop1-stopDuration'];
    array_push($jFlight->stops, $jStop1);
    // exit();
  }

  if (isset(($_POST['stop2-name']), ($_POST['stop2-airportName']), ($_POST['stop2-airportCode']), ($_POST['stop2-stopDuration']))){
    $jStop2= new stdClass();
    $jStop2->name = $_POST['stop2-name'];
    $jStop2->airportName = $_POST['stop2-airportName'];
    $jStop2->airportCode = $_POST['stop2-airportCode'];
    $jStop2->stopDuration = $_POST['stop2-stopDuration'];
    array_push($jFlight->stops, $jStop2);
    // exit();
  }

// How to add to an array. Array and then value
array_push($jData->flights, $jFlight);

// pushing stop to the array "stops" inside of flight object
// array_push($jData->stops, $jStop);

// Write back to the file
$sData = json_encode($jData, JSON_PRETTY_PRINT);
// echo $sData;
// Save city to file
file_put_contents('demo-data.json', $sData);
// Redirect
header('Location: admin-add-new-flight.php');
// header('Location: admin-page.php');





