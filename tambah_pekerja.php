<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
  //Terima rekod yang di post
  if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $katalaluan = $_POST['katalaluan'];
    $statuspengguna = $_POST['statuspengguna'];
    $tempid = "P";
    for($i = 0; $i < 4; $i++) {
      $tempnum = rand(0,9);
      $tempid = $tempid . $tempnum;
    }
    //TAMBAH REKOD BARU
    $result = mysqli_query($samb, "INSERT INTO pengguna values ('$tempid','$nama','$katalaluan','$statuspengguna')");
    echo "<script>alert('Penambahan rekod pengguna telah berjaya'); window.location='pekerja.php'</script>";
  }
?>
<html>
  <body>
    <center>
      <h3>TAMBAH PEKERJA</h3>
      <form name="form1" method="POST">
        <fieldset>
          <label>Nama Pengguna:</label><input type="text" name="nama" id="nama" /><br><br>
          <label>Kata Laluan:</label><input type="text" name="katalaluan" id="katalaluan" />
          <br><br>
          <label>Status:</label>
          <select name="statuspengguna">
            <option value="PEKERJA">PEKERJA</option>
            <option value="ADMIN">ADMIN</option>
          </select>
          <br><br><input type="submit" name="update" id="submit" value="Tambah Pengguna" />
        </fieldset>
      </form>
      <a href="semak.php">Ke senarai pengguna</a><br>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>