<?php
  //sambung ke pangkalan data
  require('config.php');
  //mulakan sesi login untuk kekalkan login 
  session_start();
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <div class="container-fluid"></div>
    <?php require('./footer.php');?>
  </body>
</html>