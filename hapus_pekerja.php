<?php
  //sambung ke pangkalan data
  require('config.php');
  //Dapatkan ID dari URL
  $idpengguna = $_GET['hapus_id'];
  //Hapus rekod pekerja
  $result = mysqli_query($samb, "DELETE FROM pengguna WHERE nama_pengguna='$idpengguna'");
  //Papar mesej jika berjaya hapus
  echo "<script>alert('HAPUS REKOD PEKERJA BERJAYA'); window.location='pekerja.php'</script>";
?>