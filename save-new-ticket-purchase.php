<?php

$sData = file_get_contents('booked-flights.json');
$jData = json_decode($sData);

$jBooking = new stdClass();
// create a new keys
$jBooking->id = bin2hex(random_bytes(16)); // uniqid();
$jBooking->bookingCode = bin2hex(random_bytes(4));
$jBooking->passengerName = $_POST["ticket-passengerName"];
$jBooking->passengerSurname = $_POST['ticket-passengerSurname'];
$jBooking->passengerEmail = $_POST['ticket-passengerEmail'];
$jBooking->passengerPhoneNumber = $_POST['ticket-passengerPhoneNumber'];

array_push($jData->bookings, $jBooking);

$sData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('booked-flights.json', $sData);
header('Location: purchase-finish.php');

;