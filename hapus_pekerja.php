<?php
  //sambung ke pangkalan data
  require('config.php');
  //Dapatkan ID dari URL
  $idpengguna = $_GET['idpengguna'];
  //Hapus rekod pekerja
  $result = mysqli_query($samb, "DELETE FROM pengguna WHERE IdPengguna='$idpengguna'");
  //Papar mesej jika berjaya hapus
  if($result) {
    echo "<script>alert('HAPUS REKOD PEKERJA BERJAYA'); window.location='pekerja.php'</script>";
  }
?>