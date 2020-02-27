<?php

//Admin wants to update the data
if(isset($_POST['flight-from'])&&
isset($_POST['flight-to'])
){
echo 'User trying to update data';
//Open file
$sData = file_get_contents('all-available-flights-list.json');
//Convert text file to JSON
$jData = json_decode($sData);
//Loop and find a match
foreach ($jData->flights as $jFlight){
if($jFlight->id == $_POST['txtUserId']){
  //Update the city name in the match/break
 
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

    $jStop1->name = $_POST['stop1-name'];
    $jStop1->airportName = $_POST['stop1-airportName'];
    $jStop1->airportCode = $_POST['stop1-airportCode'];
    $jStop1->stopDuration = $_POST['stop1-stopDuration'];

    $jStop2->name = $_POST['stop2-name'];
    $jStop2->airportName = $_POST['stop2-airportName'];
    $jStop2->airportCode = $_POST['stop2-airportCode'];
    $jStop2->stopDuration = $_POST['stop2-stopDuration'];
break;
}
}
//Convert JSON to text and save it
$sData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('all-available-flights-list.json', $sData);
//Redirect user to cities.php
header('Location: admin-all-flights.php');
exit();
}

  if(  isset($_GET['id'])   ){
    $sFlightId = $_GET['id'];
    // Open file
    $sData = file_get_contents('all-available-flights-list.json');
    // Convert text to JSON
    $jData = json_decode($sData);
    $aFlights = $jData->flights;
//creating a boolean
$bFlightFound = false;

    foreach($aFlights as $jFlight){
      if($sFlightId == $jFlight->id){
        ?>
       
<?php 
require_once('admin-topNavbar.php');
?>
       


          <h1>Update info about the flight:</h1>
  <form action="admin-update-flight.php" method="POST">
  <input name="txtUserId" type="hidden" value="<?= $jFlight->id ?>">
    <input name="flight-flightId" type="text" placeholder="flight id example SAS303"  value="<?= $jFlight->flightId ?>">
    <input name="flight-from" type="text" placeholder="from city name"  value="<?= $jFlight->from ?>">
    <input name="flight-fromCityCode" type="text" placeholder="fromCityCode"  value="<?= $jFlight->fromCityCode ?>">
    <input name="flight-to" type="text" placeholder="to city name"  value="<?= $jFlight->to ?>">
    <input name="flight-toCityCode" type="text" placeholder="toCityCode"  value="<?= $jFlight->toCityCode ?>">
    <input name="flight-departureTime" type="text" placeholder="departureTime-EPOCH"  value="<?= $jFlight->departureTime ?>">
    <input name="flight-arrivalTime" type="text" placeholder="arrivalTime-EPOCH"  value="<?= $jFlight->arrivalTime ?>">
    <input name="flight-companyShortcut" type="text" placeholder="companyShortcut"  value="<?= $jFlight->companyShortcut ?>">
    <input name="flight-companyName" type="text" placeholder="companyName"  value="<?= $jFlight->companyName ?>">
    <input name="flight-flightDuration" type="text" placeholder="flightDuration in minutes"  value="<?= $jFlight->flightDuration ?>">
    <input name="flight-price" type="text" placeholder="price in DKK"  value="<?= $jFlight->price ?>">
    <input name="flight-totalPrice" type="text" placeholder="total-price in DKK"  value="<?= $jFlight->totalPrice ?>">
  <h1>Stops1</h1>

<p>Stop 1</p>
    <input name="stop1-name" type="text" placeholder="stop1 name">
    <input name="stop1-airportName" type="text" placeholder="stop1-airportName">
    <input name="stop1-airportCode" type="text" placeholder="stop1-airportCode">
    <input name="stop1-stopDuration" type="text" placeholder="stop1-stopDuration">


<p>Stop 2</p>
    <input name="stop2-name" type="text" placeholder="stop2 name">
    <input name="stop2-airportName" type="text" placeholder="stop2-airportName">
    <input name="stop2-airportCode" type="text" placeholder="stop2-airportCode">
    <input name="stop2-stopDuration" type="text" placeholder="stop2-stopDuration">


    <button type="submit">UPDATE</button> 
  </form>



        </body>
        </html> 
        <?php
     $bFlightFound = true;
      break;
      }
    }

if($bFlightFound == false){
  header('Location: admin-all-flights.php');
}
  }
?>
