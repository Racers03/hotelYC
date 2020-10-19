<?php
  //sambung ke pangkalan data
  require('config.php');
  //semak sama ada data telah dihantar
  if (isset($_POST['idpelanggan'])) {
    //pembolehubah untuk memegang data yang dihantar
    $id = $_POST['idpelanggan'];
    $masuk = $_POST ['tarikh_masuk'];
    $bilik = $_POST['idbilik'];
    $keluar = $_POST['tarikh_keluar'];
    //dapatkan jumlah bayaran bilik
    $duit=mysqli_query($samb,"SELECT * FROM bilik WHERE idbilik='$bilik'");
    $tunjukDuit=mysqli_fetch_array($duit);
  }
?>