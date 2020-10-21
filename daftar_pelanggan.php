<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
  session_start();
  //semak sama ada data dengan IC Pelanggan telah dihantar
  if (isset($_POST['idpelanggan'])) {
    //pembolehubah untuk memegang data yang dihantar
    $id = $_POST['idpelanggan'];
    $nama = $_POST['nama'];
    $hp = $_POST['nomhp'];
    $alamat = $_POST['alamat'];
    $poskod = $_POST['poskod'];
    $bandar = $_POST['bandar'];
    $negeri = $_POST['negeri'];
    $tempid = "";
    for($i = 0; $i < 4; $i++) {
      $tempnum = rand(0,9);
      $tempid = $tempid . $tempnum;
    }
    $idpengguna = $_SESSION['idpengguna'];
    //Tambah rekod baru ke dalam table alamat
    $sql1 = "INSERT INTO alamat VALUES ('$alamat','$negeri','$poskod','$bandar')";
    $hasil1 = mysqli_query($samb, $sql1);
    //Tambah rekod baru ke dalam table pelanggan
    if ($hasil1) {
      $sql = "INSERT INTO pelanggan VALUES ('$tempid','$nama','$hp','$alamat','$idpengguna','$id')";
      $hasil = mysqli_query($samb, $sql);
      //papar mesej berjaya atau gagal simpan rekod baru
      if ($hasil) {
        echo "<script>alert('PENDAFTARAN PELANGGAN BARU BERJAYA'); window.location='index2.php'</script>";
      } else {
        echo "<script>alert('PENDAFTARAN PELANGGAN BARU GAGAL'); window.location='daftar_pelanggan.php'</script>";
      }
    }
  }
?>
<html>
  <h2>PENDAFTARAN PELANGGAN BARU</h2>
  <body>
    <fieldset>
      <!-- Papar Borang Pendaftaran -->
      <form method="POST">
        <label>Nombor Kad Pengenalan</label><br>
        <font size="1" color="#ff0000">*Tanpa tanda -</font><br>
        <input type="text" name="idpelanggan" placeholder="090807031234" maxlength='12' size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus><br>
        <label>Nama Anda</label><br>
        <font size="1" color="#ff0000">*Huruf besar</font><br>
        <input type="text" name="nama" id="nama" placeholder="Nama pelanggan" size="60" required><br>
        <label>Nombor Telefon</label><br>
        <input type="text" name="nomhp" placeholder="0187654321" maxlength='12' size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus><br>
        <label><u>Alamat:</u></label><br>
        <label>Alamat</label><br>
        <input type="text" name="alamat" id="alamat1" placeholder="Alamat" size="60" required><br>
        <label>Bandar</label><br>
        <input type="text" name="bandar" id="bandar" placeholder="Bandar" size="40" required><br>
        <label>Poskod</label><br>
        <input type="text" name="poskod" placeholder="18000" maxlength='5' size="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus><br>
        <label>Negeri</label><br>
        <input type="text" name="negeri" id="negeri" placeholder="Negeri" size="30" required><br><br>
        <button type="submit">Daftar</button>
        <button type="reset">Reset</button><br><br>
        *Pastikan semua maklumat ditaip dengan teliti.
      </form>
      <form action="index2.php"><button type="submit">Home</button></form><br><br>
    </fieldset>
  </body>
</html>