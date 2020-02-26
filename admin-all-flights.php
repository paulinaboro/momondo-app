
<?php 
require_once('admin-topNavbar.php');
?>
    <h1>List of all flights -admin panel</h1>
    <?php
  $sData = file_get_contents('demo-data.json');
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
     <td><a href='admin-delete-flight.php?id=$flight->id'>
      delete
    </a></td>
     <td><a href='admin-update-flight.php?id=$flight->id'>update</a></td> 
  </tr>";
  }
  ?>  


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




</body>
</html>

