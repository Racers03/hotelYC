<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  //sambung ke fail header
  require('header2.php');
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
        echo "<script>alert('PENDAFTARAN PELANGGAN BARU BERJAYA'); window.location='main.php'</script>";
      } else {
        echo "<script>alert('PENDAFTARAN PELANGGAN BARU GAGAL'); window.location='daftar_pelanggan.php'</script>";
      }
    }
  }
?>
<html>
  <body>
    <center>
      <h3>PENDAFTARAN PELANGGAN BARU</h3>
      <small>
        *Pastikan semua maklumat ditaip dengan teliti.
      </small><br><br>
      <div class="col"></div>
      <div class="col-8">
        <!-- Papar Borang Pendaftaran -->
        <form method="POST">
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-8 text-left">
              <label>Nama Anda:</label><br>
              <input class="form-control" name="nama" id="harga" placeholder="Nama pelanggan" size="60" required>
              <small class="form-text text-muted">
                *Huruf besar
              </small>
            </div>
            <div class="col"></div>
          </div>
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-4 text-left">
              <label>Nombor Kad Pengenalan:</label><br>
              <input class="form-control" name="idpelanggan" id="harga" placeholder="090807031234" maxlength='12' size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
              <small class="form-text text-muted">
                *Tanpa tanda -
              </small>
            </div>
            <div class="form-group col-4 text-left">
              <label>Nombor Telefon:</label><br>
              <input class="form-control" name="nomhp" placeholder="0187654321" maxlength='12' size="15" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
            </div>
            <div class="col"></div>
          </div>
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-8 text-left">
              <label>Alamat:</label><br>
              <input class="form-control" type="text" name="alamat" id="alamat1" placeholder="Alamat" size="60" required>
            </div>   
            <div class="col"></div>
          </div>
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-4 text-left">
              <label>Bandar:</label><br>
              <input class="form-control" type="text" name="bandar" id="bandar" placeholder="Bandar" size="40" required>
            </div>
            <div class="form-group col-2 text-left">
              <label>Poskod:</label><br>
              <input class="form-control" type="text" name="poskod" placeholder="18000" maxlength='5' size="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus>
            </div>
            <div class="form-group col-2 text-left">
              <label>Negeri:</label><br>
              <input class="form-control" type="text" name="negeri" id="negeri" placeholder="Negeri" size="30" required>
            </div>
            <div class="col"></div>
          </div>
          <br>
          <button class="btn btn-primary" type="submit">Daftar</button>
          <button class="btn" type="reset">Reset</button>
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>