<?php
  // To start using sessions/cookies 
  require_once('admin-access.php');
  $sUserEmail = $_SESSION['sEmail'];
?>


<?php 
require_once('admin-topNavbar.php');
?>
  <h1>ADMIN</h1>
  <h2>Hi, <?= $sUserEmail ?></h2>
  <p>On admin page you have access to all the flights, you can edit them and adjust changes.</p>

  <a href="admin-logout.php">Logout</a>
</body>
</html>