<?php
require('config.php');
$idbilik = $_GET['idbilik'];
//Hapus rekod bilik
$result = mysqli_query($samb,"DELETE FROM bilik
WHERE idbilik='$idbilik'");
//Papar mesej jika berjaya hapus
  echo "<script>alert('HAPUS BILIK BERJAYA');
  window.location='bilik.php'</script>";
  ?>