<?php
//sambung ke pangkalan data
require('config.php');
//sambung ke fail header
require('header.php');
?>
<html> 
<body><FIELDSET> 
Jika Pelanggan baru <a href="daftar_pelanggan.php">Daftar di sini</a>
<br><hr><form method="POST" action="masuk_tempahan.php">
<!-- BORANG CARIAN NAMA PELANGGAN MULA -->
<label>Nama Pelanggan: </label><select name="IdPelanggan"> 
     <?php
     $data1=mysqli_query($samb,"select * from pelanggan");
     while ($info1=mysqli_fetch_array($data1))
     {
    echo "<option hidden selected> -- pilih id";
     }?>