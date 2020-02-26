<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmed</title>
</head>
<body>

    <p>Your purchase was made succesfully!</p>
    <p>You will receive booking confirmation on your e-mail and phone number.</p>

    <p>checking email</p>
<p><?php echo $sendEmail ?></p>

<p> checking phone</p>
<p><?php echo $sendSms ?> </p>


     <a href="index.php">return to the main page -></a>
</body>
</html> 