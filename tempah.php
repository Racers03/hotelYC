<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <FIELDSET>
      Jika Pelanggan baru <a href="daftar_pelanggan.php">Daftar di sini</a>
      <br>
      <br>
      <form method="POST" action="masuk_tempahan.php">
        <!-- BORANG CARIAN NAMA PELANGGAN MULA -->
        <label>Nama Pelanggan: </label>
        <select name="idpelanggan">
          <?php
            $data1 = mysqli_query($samb, "select * from pelanggan");
            while ($info1 = mysqli_fetch_array($data1)) {
              echo "<option hidden selected> -- pilih nom kad pengenalan -- </option>";
              echo "<option value='$info1[IdPelanggan]'>$info1[IdPelanggan]</option>";
            }
          ?>
        </select><br>
        <!-- BORANG CARIAN NAMA PELANGGAN TAMAT -->
        <label>Bilik: </label>
        <select name="idbilik">
          <?php
            $data2 = mysqli_query($samb, "select * from bilik");
            while ($info2 = mysqli_fetch_array($data2)) {
              echo "<option hidden selected> -- pilih bilik -- </option>";
              echo "<option value='$info2[IdBilik]'>$info2[NamaBilik]</option>";
            }
          ?>
        </select><br>
        Tarikh Masuk: <input type="date" name="tarikh_masuk"><br>
        Tarikh Keluar: <input type="date" name="tarikh_keluar"><br><br>
        <button type="submit">Tempah</button>
        <button type="reset">Reset</button><br><br>
        *Pilihan hanya dibenarkan sekali sahaja
      </form>
      <a href="main.php">Laman Utama </a>
    </FIELDSET>
    <?php require('./footer.php');?>
  </body>
</html>