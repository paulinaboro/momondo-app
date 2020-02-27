
<?php 
  require_once('admin-access.php');
  $sUserEmail = $_SESSION['sEmail'];
require_once('admin-topNavbar.php');

  $sData = file_get_contents('all-available-flights-list.json');
  $jData = json_decode($sData);
  $sFlightsTable = '';
  foreach($jData->flights as $flight){
    $sFlightsTable .= "
  </tr>
  <tr>
    <td>$flight->from</td>
    <td>$flight->to</td>
    <td>$flight->id</td>
     <td>$flight->flightId</td>
     <td><a class='update' href='admin-update-flight.php?id=$flight->id'>update</a></td> 
     <td><a class='delete' href='admin-delete-flight.php?id=$flight->id'>
      delete
    </a></td>
  </tr>";
  }
  ?>  

<div id="tableContent">
<h2>List of all flights -admin panel</h2>
<table>
  <tr>
  <th>From</th>
    <th>To</th>
    <th>Id</th>
    <th>FlightId</th>
    <th>Delete</th>
    <th>Update</th>
  </tr>
 <?php echo $sFlightsTable ?>
  <tr>
  </tr>
</table>
</div>
</body>
</html>


