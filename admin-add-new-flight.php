
<?php 
require_once('admin-topNavbar.php');
?>

<h1>Add info about new flight:</h1>
  <form action="admin-save-new-flight.php" method="POST">
    <input name="flight-flightId" type="text" placeholder="flight id example SAS303">
    <input name="flight-from" type="text" placeholder="from city name">
    <input name="flight-fromCityCode" type="text" placeholder="fromCityCode">
    <input name="flight-to" type="text" placeholder="to city name">
    <input name="flight-toCityCode" type="text" placeholder="toCityCode">
    <input name="flight-departureTime" type="text" placeholder="departureTime-EPOCH">
    <input name="flight-arrivalTime" type="text" placeholder="arrivalTime-EPOCH">
    <input name="flight-companyShortcut" type="text" placeholder="companyShortcut">
    <input name="flight-companyName" type="text" placeholder="companyName">
    <input name="flight-flightDuration" type="text" placeholder="flightDuration in minutes">
    <input name="flight-price" type="text" placeholder="price in DKK">
    <input name="flight-totalPrice" type="text" placeholder="total-price in DKK">
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


    <button type="submit">SAVE</button> 
  </form>


  
</body>
</html>

