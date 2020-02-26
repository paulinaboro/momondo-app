
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>MOMONDO</title>
</head>
<body>
  
  <nav>
    <a href="index.php" id="logo">momondo</a>
    <a href="">fly</a>
    <a href="">hotel</a>
    <a href="">car</a>
    <a href="">trips</a>
    <a href="">discover</a>
    <a href="mytrips.php" class="active">my trips</a>
    <a href="">login</a>
  </nav>
  <section id="temporal">
    <img src="img/temporal.png">
  </section>


<div id="searchForBooking">
<h1>Enter your booking code and last name to find your reservation</h1>
<label for="reservation">Booking Code</label>
<input type="text" id="bookingCode" name="reservation" placeholder="Booking code">
<label for="bookingLastName">Last Name</label>
<input type="text" id="bookingLastName" name="bookingLastName" placeholder="Last name">
<button id="searchByBookingCode" onclick="findBooking()">Search</button>
<div id="reservationInfo">
  <h1>Reservation Details</h1>

    <p id="name">lalal</p>
    <p id="surname">lala</p>
<!-- <template id="reservationTemplate" >
<p id="name"></p>
<p id="surname"></p>
</template>     -->

</div>
</div>



<script src="app.js"></script>
  </body>
  </html>