<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
  //Terima rekod yang di post
  if (isset($_POST['nama'])) {
    $pekerja = $_POST['nama_pekerja'];
    $nama = $_POST['nama'];
    $katalaluan = $_POST['katalaluan'];
    //TAMBAH REKOD BARU
    $result = mysqli_query($samb, "INSERT INTO pengguna (nama_pengguna,nama,kata_laluan,status) values ('$nama','$pekerja','$katalaluan','PEKERJA')");
    echo "<script>alert('Penambahan rekod pengguna telah berjaya'); window.location='pekerja.php'</script>";
  }
?>
<html>
  <body>
    <center>
      <h3>TAMBAH PEKERJA</h3>
      <form name="form1" action="tambah_pekerja.php" ,method="POST">
        <fieldset>
          <label>Nama Pekerja:</label><input type="text" name="nama_pekerja" id="nama_pekerja" /><br><br>
          <label>Nama Pengguna:</label><input type="text" name="nama" id="nama" /><br><br>
          <label>Kata Laluan:</label><input type="text" name="katalaluan" id="katalaluan" />
          <br><br><input type="submit" name="update" id="submit" value="Tambah Pengguna" />
        </fieldset>
      </form>
      <a href="semak.php">Ke senarai pengguna</a><br>
    </center>
  </body>
</html>