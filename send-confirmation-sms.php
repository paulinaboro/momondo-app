<?php
$sEmail = $_GET['email'];
//Send sms
// $sFromPhone = '50149540';
// $sToPhone  = '50149540';
// $sApiKey = 'IGbfiPPX74MynwibPXq707msvl1AEVfFt2pz36CXy3rIw1cagU';
// $sMessage = urlencode("Flight from {$sFrom} to {$to}, flight number is: {$sFlightNumber}");
// if( strlen($sMessage) > 100 ){
//   echo 'Message is too long';
//   exit();
// }

// echo file_get_contents("https://fatsms.com/apis/api-send-sms?to-phone=25850567&message=$sMessage&from-phone=25850567&api-key=IGbfiPPX74MynwibPXq707msvl1AEVfFt2pz36CXy3rIw1cagU");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    
    <p><?= $sEmail ?></p>
</body>
</html>