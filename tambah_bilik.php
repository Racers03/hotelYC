<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  require('authcheck.php');
  //sambung ke fail header
  require('header2.php');
  //terima rekod yang di post 
  if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tempid = "B";
    for($i = 0; $i < 3; $i++) {
      $tempnum = rand(0,9);
      $tempid = $tempid . $tempnum;
    }
    //tambah rekod ke dalam jadual
    $result = mysqli_query($samb, "INSERT INTO bilik VALUES ('$tempid', '$nama', '$harga')");
    if($result) {
      echo "<script>alert('Penambahan rekod bilik telah berjaya'); window.location='bilik.php'</script>";
    }
  }
?>
<html>
  <body>
    <center>
      <h3>TAMBAH BILIK BARU</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <form name="form1" action="tambah_bilik.php" method="POST">
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-4 text-left">
              <label>Nama Bilik:</label>
              <input class="form-control" name="nama" id="nama">
            </div>
            <div class="form-group col-2 text-left">
              <label>Harga:</label>
              <input class="form-control" name="harga" id="harga">
            </div>
            <div class="col"></div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" name="update" id="submit">Submit</button>
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>