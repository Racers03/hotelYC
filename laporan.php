<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <center>
      <h3>CETAK REKOD TRANSAKSI</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <form name="form1" method="post" action="laporan2.php">
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-4 text-left">
              <label>Nama Bilik:</label>
              <select name="bilik" class="custom-select">
                <?php
                  //PANGGIL NAMA BILIK DALAM LIST
                  $data2 = mysqli_query($samb, "select * from bilik");
                  echo "<option>-</option>";
                  while ($info2 = mysqli_fetch_array($data2)) {
                    echo "<option value='$info2[IdBilik]'>$info2[NamaBilik]</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col"></div>
          </div>
          <div class="form-row">
            <div class="col"></div>
            <div class="form-group col-2 text-left">
              <label>Bulan:</label>
              <select name="bulan" id="bulan" class="custom-select">
                <option value="-">-</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mac</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Ogos</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Disember</option>
              </select>
            </div>
            <div class="form-group col-2 text-left">
              <label>Tahun:</label>
              <select name="tahun" id="tahun" class="custom-select">
                <option value="-">-</option>
                <option>2019</option>
                <option>2020</option>
              </select>
            </div>
            <div class="col"></div>
          </div>
          <br>
          <button type="submit" name="button" id="submit" class="btn btn-primary">Cetak</button>
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>