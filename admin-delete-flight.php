<?php
// get the id from the url
$flightId = $_GET['id'];
// open file
$sData = file_get_contents('demo-data.json');
// convert it to an object
$jData = json_decode($sData);
// echo $sData;
// print_r($jData);
// var_dump($jData);
// loop through the cities
foreach($jData->flights as $index=>$flight){
//   // check if the id from the url matches the city id
  if($flightId == $flight->id){
//     // if so, delete the city from the object (unset)
    array_splice($jData->flights, $index, 1);
    // break;
  }
}
// // convert the data object to text
$sData = json_encode($jData);
//echo $sData;
// // save the data back to the file
file_put_contents('demo-data.json', $sData);
header('Location: admin-all-flights.php');
