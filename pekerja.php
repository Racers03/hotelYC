<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
?>
<html>
  <body>
    <center>
      <h3>SENARAI PEKERJA</h3><br>
      <fieldset>
        <table width="811" border="1" align="center">
          <tr>
            <td colspan="5" valign="middle" align="right">
              <b><a href="tambah_pekerja.php">[+] Tambah Pekerja</a></b>
            </td>
          </tr>
          <tr>
            <td width="40"><b>Bil.</b></td>
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
            <td><?php echo $info1['NamaPengguna']; ?></td>
            <td><?php echo $info1['NamaPengguna']; ?></td>
            <td><?php echo $info1['KataLaluan']; ?></td>
            <td>
              <a href="kemaskini_pekerja.php?idpengguna=<?php echo $info1['IdPengguna']; ?>">Kemaskini</a>
              <?php
                //ADMIN BOLEH DELETE AKAUN PENGGUNA - ADMIN TIDAK BOLEH
                // if ($info1['status']!="ADMIN")
                if (true) {
              ?>
              <a href="hapus_pekerja.php?idpengguna=<?php echo $info1['IdPengguna'];} ?>">Hapus</a>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php $no++; ?>
        </table>
      </fieldset>
      <a href="index2.php">Ke Menu Utama</a><br>
    </center>
  </body>
</html>