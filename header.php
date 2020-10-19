<?php include "config.php"; ?>
<html>
  <head>
    <!-- tukar nama sistem yang sesuai -->
    <title><?php echo $namasistem; ?></title>
  </head>
  <body>
    <center>
      <TABLE BORDER="0" cellpadding="0" CELLSPACING="0">
        <TR>
          <!-- nama fail header adalah header.jpg -->
          <TD WIDTH="1000" HEIGHT="200" BACKGROUND="<?php echo $logo; ?>" VALIGN="center" style="background-repeat:no-repeat;">
            <FONT SIZE="+3" COLOR="green" font face="Arial">
              <?php echo $namasistem; ?><br><?php echo $namarumah; ?>
            </FONT>
            <br>
            <FONT SIZE="+2" COLOR="red" font face="Arial">
              <i><?php echo $moto; ?></i>
            </FONT>
          </TD>
        </TR>
      </TABLE>
    </center>
  </body>
  <!-- panggil fail untuk besarkan huruf -->
  <?php include "besar.php"; ?>
  <!-- panggil fail untuk tukar warna font -->
  <?php include "tukar.php"; ?>
</html>