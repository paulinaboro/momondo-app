<?php
  // Validation
  if( isset($_GET['id'])){
$flightId = $_GET['id'];

$sData = file_get_contents('founded-matching-flights.json');
$jData = json_decode($sData);
$jTicketInfoDiv = '';
foreach($jData->flights as $jFlight){
    if($jFlight->id = $flightId){
        $jTicketInfoDiv= "
        <div>
        <p>You are buying the ticket from <span class='bold'>$jFlight->from</span> to <span class='bold'> $jFlight->to.</span>
        <p>Ticket prize is</p><span class='bold'>$jFlight->price DKK</span>
        <p>Airline: <span class='bold'>$jFlight->companyShortcut</span></p>
        <p>Flight No. <span class='bold'>$jFlight->flightId</span></p>
        </div> ";
    }
}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Purchase</title>  
  <!--Import Google Icon Font-->
  <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!--Import materialize.css-->
    <link
      type="text/css"
      rel="stylesheet"
      href="node_modules/materialize-css/dist/css/materialize.min.css"
      media="screen,projection"
    />
    <link rel="stylesheet" href="purchase.css">
</head>

<body>
<div>
    <div id="info">
<h1>Flight details</h1>
<p><?php echo $jTicketInfoDiv; ?></p>

    <h3>Enter passenger details in order to buy a ticket</h3>
    </div>
    <!-- <form action="save-new-ticket-purchase.php?newId=<?php echo $flightId ?>" method="POST">
    <input name="ticket-bookingCode" type="hidden" type="text">
    <label for="ticket-passengerName">Name</label>
    <input name="ticket-passengerName" type="text" placeholder="Name">
    <label for="ticket-passengerSurname">Surname</label>
    <input name="ticket-passengerSurname" type="text" placeholder="Surname">
<label for="ticket-passengerEmail">E-mail</label>
    <input name="ticket-passengerEmail" type="text" placeholder="Email">
<label for="ticket-passengerPhoneNumber">Phone Number(enter without +45)</label>
    <input name="ticket-passengerPhoneNumber" type="text" placeholder="Phone number">
<button type="submit">Buy</button>
      </button>
    </form> -->


    <!-- ////////////////////////////////////////////////////// -->



  <div class="row">
<form id="purchaseForm" class="col s12" action="save-new-ticket-purchase.php?newId=<?php echo $flightId ?>" method="POST">
<input name="ticket-bookingCode" type="hidden" type="text">
<div class="row">
  <div class="input-field inline">
    <input
    name="ticket-passengerName"
      type="text"
      class="validate"
      required
    />
    <label for="ticket-passengerName">Name*</label>
  </div>
</div>


<div class="row">
  <div class="input-field inline">
    <input
    name="ticket-passengerSurname"
      type="text"
      class="validate"
      required
    />
    <label for="ticket-passengerSurname">Last Name*</label>
  </div>
</div>


<div class="row">
    <div class="input-field inline">
        <input name="ticket-passengerEmail" id="email" type="email" class="validate">
        <label for="email">Email</label>
        <span class="helper-text" data-error="not a valid email" data-success="Correct email, good job! "></span>
      </div>
</div>


<div class="row">
  <div class="input-field inline">
    <input
    name="ticket-passengerPhoneNumber"
      type="text"
      class="validate"
      required
    />
    <label for="ticket-passengerPhoneNumber">Phone Number*</label>
  </div>
</div>
<button id="buy_btn" type="submit">Buy</button>
      </button>
</form>
</div>

<!-- ///////////////////////////////////////////////////////////////////// -->

<script
      type="text/javascript"
      src="node_modules/materialize-css/dist/js/materialize.min.js"
    ></script>
</body>
</html>

