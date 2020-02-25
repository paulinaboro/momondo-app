<?php
  // Validation
  if( isset($_POST['txtEmail']) && 
      isset($_POST['txtPassword'])
  ){
    // Connect to the database
    $sCorrectEmail      = 'a@a.com';
    $sCorrectPassword   = '1';
    $sUserEmail         = $_POST['txtEmail'];
    $sUserPassword      = $_POST['txtPassword'];
    if( $sCorrectEmail ==  $sUserEmail &&
        $sCorrectPassword == $sUserPassword
    ){
      // To start using sessions/cookies 
      session_start();
      // You can put anything in the session
      $_SESSION['sEmail'] = $sUserEmail;
      header('Location: admin-page.php');
      exit();
    }
  }




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
  
  <form action="admin-login.php" method="POST">
    <input name="txtEmail" type="text" placeholder="email">
    <input name="txtPassword" type="text" placeholder="password">
    <button>LOGIN</button>
  </form>

</body>
</html>