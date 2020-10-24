<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <center>
      <h3>SENARAI BILIK</h3>
      <br>
      <div class="col"></div>
      <div class="col-8">
        <table class="table">
          <tr>
            <td colspan="4" valign="middle" align="right">
              <b><a href="tambah_bilik.php">[+] Tambah Bilik</a></b>
            </td>
          </tr>
          <tr>
            <td width="40"><b>Bil.</b></td>
            <td width="243"><b>Nama Bilik</b></td>
            <td width="150"><b>Harga Semalaman</b></td>
            <td width="150"><b>Tindakan</b></td>
          </tr>
          <?php
            $data1 = mysqli_query($samb, "SELECT * FROM bilik ORDER BY HargaBilik DESC");
            $no = 1;
            while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['NamaBilik']; ?></td>
            <td>RM <?php echo $info1['HargaBilik']; ?>
            <td>
              <a href="kemaskini_bilik.php?idbilik=<?php echo $info1['IdBilik']; ?>">Kemaskini</a>
              <a href="hapus_bilik.php?idbilik=<?php echo $info1['IdBilik']; ?>">Hapus</a>
            </td>
          </tr>
          <?php
              $no++;
            }
          ?>
        </table>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>