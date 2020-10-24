<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <center>
      <h2>
        DAFTAR LOGIN PEKERJA
        <br>
        IMPORT FAIL CSV
      </h2>
      <fieldset>
        <label>Pilih lokasi fail CSV/Excel:</label>
        <form action="import_proses.php" method="post" name="upload_excel" enctype="multipart/form-data">
          <input type="file" name="file" id="file" class="input-large"><br>
          <button type="submit" id="submit" name="Import">Upload</button>
        </form>
        <br>
        <a href="main.php">Laman Utama </a>
      </fieldset>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>