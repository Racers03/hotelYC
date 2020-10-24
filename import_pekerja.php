<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <center>
      <h3>IMPORT PEKERJA</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <label>Pilih lokasi fail CSV/Excel:</label>
        <form action="import_proses.php" method="post" name="upload_excel" enctype="multipart/form-data">
          <div class="col"></div>
          <div class="custom-file col-5">
            <input type="file" name="file" id="file" class="custom-file-input"><br>
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <div class="col"></div>
          <br><br>
          <button type="submit" class="btn btn-primary" id="submit" name="Import">Upload</button>
        </form>
        <br>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>