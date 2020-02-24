<?php
$sData = file_get_contents('all-flights-list.json');
$jData = json_decode($sData);
$sFlightsDivs = '';
foreach($jData as $jFlight){
  // $iCheapestPrice = $iCheapestPrice ?? $jFlight->price;
  // if($jFlight->price < $iCheapestPrice){
  //   $iCheapestPrice = $jFlight->price;
  // }
  //xyxgi
  $sDepartureDate = date("Y-M-d H:i", substr($jFlight->departureTime, 0, 10)); 

  //2nd loop for array of stops

  $jStopsDivs = '';
  foreach($jFlight->stops as $jStop){
    $jStopsDivs .= "
    <div>
    <p>$jStop->name</p>
    <p>$jStop->airportCode</p>
    </div>
    ";  
    /////////////////////////// convert total minutes of the stop to hours
    // $totalMinutes = $jStop->duration;
    // $hours = intval($totalMinutes/60);
    // $minutes = $totalMinutes - ($hours * 60);
    // if(empty($minutes)){
    //   echo $minutes;
    //   unset($minutes);
    //   $minutes = "00";
    // }
    //////////////////////////
 
  
  
  
   
  $sFlightsDivs .= "
    <div id='flight'>
    <div id='flight-route'>
      <div class='row'>
        <div>
          <input type='checkbox'>
        </div>
        <div>
          <img class='airline-icon' src='$jFlight->img/companyShortcut.png'>
        </div>
        <div>
          $sDepartureDate - 18:30
          <p>$jFlight->companyShortcut</p>              
        </div>
        <div>
      $jStopsDivs
        </div>
        <div>
          10h. 20min.
          <p>CPH-MIA</p>
        </div>
      </div>
      <div class='row'>
        <div>
          <input type='checkbox'>
        </div>
        <div>
          <img class='airline-icon' 
          src='AF.png'>
        </div>
        <div>
          18:15 - 18:30
          <p>KLM</p>              
        </div>
        <div>
          1 stop
          <p>Amsterdam</p>
        </div>
        <div>
          10h. 20min.
          <p>CPH-MIA</p>
        </div>
      </div>            
    </div>
    <div id='flight-buy'>
      <div>
        $jFlight->price Kr.
      </div>
      <button>BUY</button>
    </div>
  </div>
  ";
}
}
?>

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
    <a class="active" href="index.php" id="logo">momondo</a>
    <a href="">fly</a>
    <a href="">hotel</a>
    <a href="">car</a>
    <a href="">trips</a>
    <a href="">discover</a>
    <a href="">my trips</a>
    <a href="">login</a>
  </nav>

  <section id="search">

    <div id="boxFromCity"> 
      <input type="text" placeholder="from city">
      <div id="fromCityResults">
     
      </div>
</div>
     


    <button>&lt;- -&gt;</button>
    <input type="text" placeholder="to city">
    <input type="text" placeholder="from date">
    <input type="text" placeholder="to date">
    <button id="btnSearch">SEARCH</button>
  </section>

  <section id="temporal">
    <img src="img/temporal.png">
  </section>

  <main>
    <div id="options">OPTIONS</div>
    <div id="results">

      <div id="price-options">
        <div id="cheapest">
          Cheapest
          <p>
            <!-- <span class="price">
              <?= $iCheapestPrice ?>
            </span> -->
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="best" class="active">
          Best
          <p>
            <span class="price">4.956 kr</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="fastest">
          Fastest
          <p>
            <span class="price">4.956 kr</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div>
          Custom
          <p>compare and choose</p>
        </div>
      </div>

      <div id="flights">  
        <?= $sFlightsDivs ?>
      </div>



    </div>
  </main>
  <script src="app.js"></script>

</body>
</html>