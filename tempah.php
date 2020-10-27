<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  require('authcheck.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body class="text-white">
    <center>
      <h3>MASUK TEMPAHAN</h3>
      Jika pelanggan baru, <a href="daftar_pelanggan.php">daftar di sini</a>.<br><br>
      <div class="col"></div>
      <div class="col-8">
        <form method="POST" action="masuk_tempahan.php">
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-5 text-left">
              <!-- BORANG CARIAN NAMA PELANGGAN MULA -->
              <label>Nama Pelanggan: </label>
              <select class="custom-select" name="idpelanggan" required>
                <?php
                  $data1 = mysqli_query($samb, "select * from pelanggan");
                  while ($info1 = mysqli_fetch_array($data1)) {
                    echo "<option hidden selected> -- pilih nom kad pengenalan -- </option>";
                    echo "<option value='$info1[IdPelanggan]'>$info1[IdPelanggan]</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group col-3 text-left">
              <!-- BORANG CARIAN NAMA PELANGGAN TAMAT -->
              <label>Bilik: </label>
              <select class="custom-select" name="idbilik" required>
                <?php
                  $data2 = mysqli_query($samb, "select * from bilik");
                while ($info2 = mysqli_fetch_array($data2)) {
                    echo "<option hidden selected> -- pilih bilik -- </option>";
                   echo "<option value='$info2[IdBilik]'>$info2[NamaBilik]</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col"></div>
          </div>
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-4 text-left">
              <label>
                Tarikh Masuk: 
              </label>
              <input class="form-control" type="date" name="tarikh_masuk" required>
            </div>
            <div class="form-group col-4 text-left">
              <label>
                Tarikh Keluar: 
              </label>
              <input class="form-control" type="date" name="tarikh_keluar" required>
            </div>
            <div class="col"></div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Tempah</button>
          <button type="reset" class="btn">Reset</button><br><br>
          *Pilihan hanya dibenarkan sekali sahaja
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>