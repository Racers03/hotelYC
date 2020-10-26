<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  require('authcheck.php');
?>
<html>
  <head>
    <title>LAPORAN BULANAN BILIK</title>
  </head>
  <body>
    <table width="711" border="0">
      <td>
        <p><strong>LAPORAN BULANAN KEUNTUNGAN BILIK </strong></p>
        <table width="1000" border="1" align="center">
          <tr>
            <td colspan="9">
              REKOD TEMPAHAN BULANAN: <?php echo $namarumah; ?><br>
              <div align="right" class="style15">Tarikh Cetakan:<?php echo date("d/m/Y"); ?></div>
            </td>
          </tr>
          <tr>
            <td width="30"><b>Bil.</b></td>
            <td width="150"><b>Nama Bilik</b></td>
            <td width="140"><b>Tarikh Masuk</b></td>
            <td width="140"><b>Tarikh Keluar</b></td>
            <td width="100"><b>Bil Hari</b></td>
            <td width="100"><b>Nama Pelanggan</b></td>
            <td width="100"><b>Nom HP</b></td>
            <td width="140"><b>Harga</b></td>
            <td width="140"><b>Jumlah</b></td>
          </tr>
          <?php
            $no = 1;
            $bilik = $_POST["bilik"];
            $bulan = $_POST["bulan"];
            $tahun = $_POST["tahun"];
            if ($bilik == "-" && $bulan == "-" && $tahun == "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan ORDER by idbilik,tarikh_masuk");
            } elseif ($bilik != "-" && $bulan == "-" && $tahun == "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE idbilik='$bilik' ORDER by idbilik,tarikh_masuk");
            } elseif ($bilik != "-" && $bulan != "-" && $tahun == "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE idbilik='$bilik' AND (MONTH(tarikh_masuk)='$bulan' OR MONTH(tarikh_keluar)='$bulan') 
              ORDER BY idbilik,tarikh_masuk");
            } elseif ($bilik != "-" && $bulan != "-" && $tahun != "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE idbilik='$bilik' AND ((MONTH(tarikh_masuk)='$bulan' AND YEAR(tarikh_masuk)='$tahun') 
              OR (MONTH(tarikh_keluar)='$bulan' AND YEAR(tarikh_keluar)='$tahun')) ORDER BY idbilik,tarikh_masuk");
            } elseif ($bilik == "-" && $bulan != "-" && $tahun == "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE MONTH(tarikh_masuk)='$bulan' OR MONTH(tarikh_keluar)='$bulan' ORDER BY idbilik,tarikh_masuk");
            } elseif ($bilik == "-" && $bulan !== "-" && $tahun != "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE YEAR(tarikh_masuk)='$tahun' OR YEAR(tarikh_keluar)='$tahun' ORDER BY idbilik,tarikh_masuk");
            } elseif ($bilik != "-" && $bulan == "-" && $tahun != "-") {
              $data1 = mysqli_query($samb, "SELECT * FROM tempahan WHERE idbilik='$bilik' AND YEAR(tarikh_masuk)='$tahun' OR YEAR(tarikh_keluar)='$tahun') 
              ORDER BY idbilik,tarikh_masuk");
            }
            $jumBesar = 0;
            $bil_rekod = mysqli_num_rows($data1);
            while ($info1 = mysqli_fetch_array($data1)) {
              //SAMBUNG REKOD YANG BERKAITAN
              $databilik = mysqli_query($samb, "SELECT * FROM bilik WHERE IdBilik='$info1[IdBilik]'");
              $infobilik = mysqli_fetch_array($databilik);

              //DAPATKAN NAMA PELANGGAN
              $datapelanggan = mysqli_query($samb, "SELECT * FROM pelanggan WHERE IdPelanggan='$info1[IdPelanggan]'");
              $infopelanggan = mysqli_fetch_array($datapelanggan);

              //KIRA PERBEZAAN HARI MENGINAP
              $date1 = date_create($info1['tarikh_masuk']);
              $date2 = date_create($info1['tarikh_keluar']);
              $diff = date_diff($date1, $date2);
              $jumHari = $diff->format("%a");

              //susun semula tarikh
              $masuk = date("d-m-Y", strtotime($info1['tarikh_masuk']));
              $keluar = date("d-m-Y", strtotime($info1['tarikh_keluar']));
          ?>

          <!-- PAPAR REKOD DALAM JADUAL -->
          <tr>
            <td><?php echo $no; ?>
            <td><?php echo $infobilik['NamaBilik']; ?></td>
            <td><?php echo $masuk; ?></td>
            <td><?php echo $keluar; ?></td>
            <td><?php echo $diff->format("%a hari"); ?></td>
            <td><?php echo $infopelanggan['NamaPelanggan']; ?></td>
            <td><?php echo $infopelanggan['NoTelefon']; ?></td>
            <td>RM <?php echo number_format($info1['bayaran'], 2); ?></td>
            <td>RM <?php echo number_format($info1['bayaran'] * $jumHari, 2); $jumBesar += ($info1['bayaran'] * $jumHari);?></td>
          <tr>
          <?php 
            $no++;
            }
          ?>
          <tr>
            <td colspan="8" align="right">
              JUMLAH KESELURUHAN
            </td>
            <td>RM <?php echo number_format($jumBesar, 2); ?></td>
          </tr>
        </table>
        <hr />
        <div align="center" class="style15">* Laporan Tamat *<br /> Jumlah Rekod:<?php echo $bil_rekod; ?></div>
        <center><br><br>
          <a href="main.php">Ke Menu Utama</a><br>
          <a href="javascript:window.print()">Cetak Laporan</a>
        </center>
      </td>
    </table>
  </body>
</html>