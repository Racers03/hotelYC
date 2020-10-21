<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
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
    echo "<script>alert('Penambahan rekod bilik telah berjaya'); window.location='bilik.php'</script>";
  }
?>
<html>
  <body>
    <center>
      <h3>TAMBAH BILIK BARU</h3>
      <form name="form1" action="tambah_bilik.php" method="POST">
        <fieldset>
          <label>Nama Bilik:</label><input type="text" name="nama" id="nama" /><br><br>
          <label>Harga:</label><input type="text" name="harga" id="harga" />
          <br><br><input type="submit" name="update" id="submit" value="Tambah Bilik" />
        </fieldset>
      </form>
      <a href="bilik.php">Ke senarai bilik</a><br>
    </center>
  </body>
</html>