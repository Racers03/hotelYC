<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
?>
<html>
<body>
  <center>
    <table width="711" border="0">
      <td>
        <p><strong>CETAK REKOD TRANSAKSI</strong></p>
        <form name="form1" method="post" action="laporan2.php">
          <table width="600" border="1">
            <tr>
              <td width="118">Nama Bilik</td>
              <td width="31">:</td>
              <td width="429">
                <label for="select"></label>
                <select name="bilik">
                  <?php
                  //PANGGIL NAMA BILIK DALAM LIST
                  $data2 = mysqli_query($samb, "select * from bilik");
                  echo "<option>-</option>";
                  while ($info2 = mysqli_fetch_array($data2)) {
                    echo "<option value='$info2[idbilik]'>$info2[nama]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Bulan</td>
              <td>:</td>
              <td>
                <select name="bulan" id="bulan">
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
              </td>
            </tr>
            <tr>
              <td>Tahun</td>
              <td>:</td>
              <td>
                <select name="tahun" id="tahun">
                  <option value="-">-</option>
                  <option>2019</option>
                  <option>2020</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="3"><input type="submit" name="button" id="button" value="Cetak"></td>
            </tr>
          </table>
        </form>
        <p>&nbsp;</p>
        <hr />
        <div align="center" class="style15"></div>
        <center> <br><br>
          <a href="index2.php">Ke Menu Utama</a><br>
        </center>
      </table>
    </center>
  </body>
</html>