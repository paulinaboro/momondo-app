<?php
  // To start using sessions/cookies 
  require_once('admin-access.php');
  $sUserEmail = $_SESSION['sEmail'];
?>


<?php 
require_once('admin-topNavbar.php');
?>
<div id="adminPageContent">
  <h1>Welcome to admin page.</h1>
  <h2>Hi, <?= $sUserEmail ?></h2>
  <p>On admin page you have access to all the flights, you can edit them and adjust changes.</p>
<br>
  <a href="admin-logout.php">Logout</a>
  </div>
</body>
</html>