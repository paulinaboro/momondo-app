<?php

$sData = file_get_contents('booked-flights.json');
$jData = json_decode($sData);

$jBooking = new stdClass();
// create a new keys

$jBooking->id = bin2hex(random_bytes(16)); // uniqid();
$jBooking->bookingCode = bin2hex(random_bytes(4));
$jBooking->passengerName = $_POST["ticket-passengerName"];
$jBooking->passengerSurname = $_POST['ticket-passengerSurname'];
$jBooking->passengerEmail = $_POST['ticket-passengerEmail'];
$jBooking->passengerPhoneNumber = $_POST['ticket-passengerPhoneNumber'];

array_push($jData->bookings, $jBooking);

// now we have to push the flight info to the array with booked flights, so we know what the passenger ordered
$flightId = $_GET['newId'];

$jBooking->bookedFlightInfo = [];
$sNewData = file_get_contents('demo-data.json');
$jNewData = json_decode($sNewData);


foreach($jNewData->flights as $existingFlight){
    if($existingFlight->id === $flightId){    
        array_push($jBooking->bookedFlightInfo, $existingFlight);
    }
}
// $jFlight->stops = [];
// if( isset($_POST['stop1-name']) ){
    //   $jStop1= new stdClass();
    //   $jStop1->name = $_POST['stop1-name'];
    //   $jStop1->airportName = $_POST['stop1-airportName'];
    //   $jStop1->airportCode = $_POST['stop1-airportCode'];
    //   $jStop1->stopDuration = $_POST['stop1-stopDuration'];
    //   array_push($jFlight->stops, $jStop1);
    //   // exit();
    // }
    
    $sData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents('booked-flights.json', $sData);
    
    
    
    // Send sms
    $sSendSms = $_POST['ticket-passengerPhoneNumber'];
    
    $sFromPhone = '50149540';
    $sToPhone  = $sSendSms;
    // $sApiKey = 'IGbfiPPX74MynwibPXq707msvl1AEVfFt2pz36CXy3rIw1cagU';
    $sApiKey = 'ThALQqwMXGYr5pMKuxfgjuRoKKGhKyYGuAf4FimIHbzjCP6z4k';
    // $sMessage = urlencode("Your ticket has been purchased successfully.");
    $sMessage = urlencode("Thanks for buying ticket with Momondo :).");
    
    echo file_get_contents("https://fatsms.com/apis/api-send-sms?to-phone=$sSendSms&message=$sMessage&from-phone=50149540&api-key=$sApiKey");
    
    
    
    $sSendEmail = $_POST['ticket-passengerEmail'];
    
    $sSubject = 'New Momondo Ticket Purchase';
    $sMessage = 'Thanks for the purchase.';
    
    
    $sPassword = file_get_contents('private/password.txt');
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    
    
    // Load Composer's autoloader
    // require 'vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'fortestingpaulina554@gmail.com'; 
        $mail->Password   = $sPassword;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        
        
        
        //Recipients
        $mail->setFrom($sSendEmail, 'Mailer');
        $mail->addAddress($sSendEmail, 'Momondo');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($sSendEmail, 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $sSubject;
        $mail->Body    = $sMessage;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    header('Location: purchase-finish.php');
    

    ?>




