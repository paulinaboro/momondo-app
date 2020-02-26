
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
<!-- <label for="reservation">Booking Code</label> -->
<input type="text" id="bookingCode" name="reservation" placeholder="Booking code">
<!-- <label for="bookingLastName">Last Name</label> -->
<input type="text" id="bookingLastName" name="bookingLastName" placeholder="Last name">
<button id="searchByBookingCode" onclick="findBooking()">Search</button>
<div id="reservationInfo" class="hidden">
  <h2>Reservation Details</h2>
<p class="bold">Passenger name:</p>
<p id="name"></p>
<p class="bold">Passenger Last Name:</p>
<p id="lastName"></p>
<p class="bold">Booking Code</p>
<p id="code"></p>
<p class="bold">Flight from:</p>
<p id="from"></p>
<p class="bold">Flight to:</p>
<p id="to"></p>
</div>
</div>

<script src="app.js"></script>
  </body>
  </html>