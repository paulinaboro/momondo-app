<?php


// if( !isset($_POST['subject']) ||
// strlen(($_POST['subject']) < 2 & ($_POST['subject']) > 50
// console.log("testing")
// )
// {
//     echo 'subject must be from 2 to 50 characters';
//     exit();
//     }


//add form inputs to data.json
//push/send it to the data.json
//return data in json to app.css 



// $sPassengerEmail = $_POST['ticket-passengerEmail'];
// $sPassengerPhone = $_POST['ticket-passengerPhoneNumber'];
// $sFrom = $_POST['from'];
// $sTo = $_POST['to'];


    // $sSubject = $_POST['subject'];
    // $sMessage = $_POST['message'];

    $sSubject = "Momondo Ticket Purchase";
    $sMessage = "Thank you for buying the ticket on Momondo page.";


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
    $mail->Username   = 'forTestingpaulina554@gmail.com';                     // SMTP username
    $mail->Password   = $sPassword;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('$sPassengerEmail', 'Mailer');
    $mail->addAddress('$sPassengerEmail', 'Momondo');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('$sPassengerEmail', 'Information');
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












