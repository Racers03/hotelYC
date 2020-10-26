<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  require('authcheck.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body>
    <center>
      <h3>SENARAI STATUS TEMPAHAN BILIK</h3>
      <font color="red">Nota - Pembatalan tempahan hanya dibenarkan dalam tempoh 3 hari SEBELUM tarikh masuk.</font><br><br>
      <div class="col"></div>
      <div class="col-8">
        <table class="table">
          <tr>
            <td width="30"><b>Bil.</b></td>
            <td width="150"><b>Nama Bilik</b></td>
            <td width="120"><b>Tarikh Masuk</b></td>
            <td width="120"><b>Tarikh Keluar</b></td>
            <td width="100"><b>Bil Hari</b></td>
            <td width="200"><b>Nama Pelanggan</b></td>
            <td width="100"><b>Nom HP</b></td>
            <td width="180"><b>Harga</b></td>
            <td width="180"><b>Jumlah</b></td>
            <td width="140"><b>Tindakan</b></td>
          </tr>
          <?php
            $no = 1;
            //panggil rekod untuk paparan di jadual
            $data1 = mysqli_query($samb, "SELECT * FROM tempahan ORDER BY tarikh_masuk DESC");
            //nilai awal
            $jumBesar = 0;
            while ($info1 = mysqli_fetch_array($data1)) {
              //sambung ke table bilik berdasarkan kunci asing
              $databilik = mysqli_query($samb, "SELECT * FROM bilik WHERE IdBilik='$info1[IdBilik]'");
              $infobilik = mysqli_fetch_array($databilik);
              //sambung ke table pelanggan berdasarkan kunci asing
              $datapelanggan = mysqli_query($samb, "SELECT * FROM pelanggan WHERE IdPelanggan='$info1[IdPelanggan]'");
              $infopelanggan = mysqli_fetch_array($datapelanggan);
              //cari beza hari
              $date1 = date_create($info1['tarikh_masuk']);
              $date2 = date_create($info1['tarikh_keluar']);
              $diff = date_diff($date1, $date2);
              $jumHari = $diff->format("%a");
              //susun semula tarikh
              $masuk = date("d-m-Y", strtotime($info1['tarikh_masuk']));
              $keluar = date("d-m-Y", strtotime($info1['tarikh_keluar']));
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $infobilik['NamaBilik']; ?></td>
            <td><?php echo $masuk; ?></td>
            <td><?php echo $keluar; ?></td>
            <td><?php echo $diff->format("%a hari"); ?></td>
            <td><?php echo $infopelanggan['NamaPelanggan']; ?></td>
            <td><?php echo $infopelanggan['NoTelefon']; ?></td>
            <td>RM <?php echo number_format($info1['bayaran'], 2); ?></td>
            <td>RM <?php echo number_format($info1['bayaran'] * $jumHari, 2); $jumBesar += ($info1['bayaran'] * $jumHari); ?></td>
            <td>
              <?php
                //batal tempahan dalama tempoh 3 hari sebelum tarikh
                $date10 = date_create($info1['tarikh_masuk']);
                $date20 = date_create(date("Y-m-d"));
                $diff1 = date_diff($date10, $date20);
                $jumHari2 = $diff1->format("%a");

                if ($jumHari2 > 3) {
              ?>
              <a href="hapus_tempahan.php?id=<?php echo $info1['IdTempah']; ?>">Batal Tempahan</a>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php $no++; } ?>
          <tr>
            <td colspan="8" align="right">
              <b>JUMLAH KESELURUHAN</b>
            </td>
            <td><b>RM <?php echo number_format($jumBesar, 2); ?></b></td>
            <td></td>
          </tr>
        </table>
        <div align="center" class="style15"><b>Jumlah Rekod: <?php echo $no - 1; ?></b></div>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>