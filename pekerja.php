<?php
  //sambung ke pangkalan data
  require('config.php');
  //mulakan sesi login untuk kekalkan login 
  session_start();
  require('authcheck.php');
  //sambung ke fail header
  require('header2.php');
?>
<html>
  <body class="text-white">
    <center>
      <h3>SENARAI PEKERJA</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <table class="table text-white">
          <style>
            .table {
              background-color: rgba(0,0,0,0.3);
              backdrop-filter: blur(2px);
            }
          </style>
          <tr>
            <td colspan="6" align="right">
              <b><a href="tambah_pekerja.php">[+] Tambah Pekerja</a></b>
            </td>
          </tr>
          <tr>
            <td width="40"><b>Bil.</b></td>
            <td width="120"><b>ID Pekerja</b></td>
            <td width="243"><b>Nama Pekerja</b></td>
            <td width="150"><b>Nama Pengguna</b></td>
            <td width="120"><b>Kata Laluan</b></td>
            <td width="120"><b>Tindakan</b></td>
          </tr>
          <?php
            $data1 = mysqli_query($samb, "SELECT * FROM pengguna");
            $no = 1;
            while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['IdPengguna']; ?></td>
            <td><?php echo $info1['NamaPengguna']; ?></td>
            <td><?php echo $info1['NamaPengguna']; ?></td>
            <td><?php echo $info1['KataLaluan']; ?></td>
            <td>
              <a href="kemaskini_pekerja.php?idpengguna=<?php echo $info1['IdPengguna']; ?>">Kemaskini</a>
              <?php
                //ADMIN BOLEH DELETE AKAUN PENGGUNA - ADMIN TIDAK BOLEH
                if ($_SESSION['level'] == "ADMIN") {
              ?>
              <a href="hapus_pekerja.php?idpengguna=<?php echo $info1['IdPengguna']; ?>">Hapus</a>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php $no++;} ?>
        </table>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>