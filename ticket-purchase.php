
<?php
$flightId = $_GET['id'];

$sData = file_get_contents('founded-matching-flights.json');
$jData = json_decode($sData);

$jTicketInfoDiv = '';
foreach($jData->flights as $jFlight){
    if($jFlight->id = $flightId){
        $jTicketInfoDiv= "
        <div>
        <p>You are buying the ticket from $jFlight->from to $jFlight->to</p>
        <p>Ticket prize is $jFlight->price</p>
        <p>Airline Company name is $jFlight->companyName</p>
        </div> ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Purchase</title>
    
</head>
<body>

<div>
<h1>Flight details</h1>
<p><?php echo $jTicketInfoDiv; ?></p>
</div>
    <h3>Enter passenger details in order to buy a ticket</h3>
    <form action="save-new-ticket-purchase.php" method="POST">
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
        Buy
      </button>
    </form>

    <script src="purchase.js"></script>
</body>
</html>

