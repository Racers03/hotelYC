<?php
  //sambung ke pangkalan data
  require('config.php');
  //Dapatkan ID dari URL
  $idpengguna = $_GET['id'];
  //Hapus rekod tempahan
  $result = mysqli_query($samb, "DELETE FROM tempahan WHERE idtempah='$idpengguna'");
  echo "<script>alert('HAPUS REKOD TEMPAHAN BERJAYA'); window.location='semak.php'</script>";
?>
