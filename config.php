<?php
//sambungan MYSQLI dengan nama $samb
$samb = mysqli_connect("localhost","root","","hotel");
//semak sambungan jika gagal
if (mysqli_connect_errno()){
echo "Gagal sambungkan pangkalan data mysql: ".mysqli_connect_error();
}
//SETUP NAMA HOTEL
$namasistem="SISTEM TEMPAHAN HOTEL YC";
$namarumah="HOTEL YC";
$moto="Kemas & Selesa";
$logo="header.jpg";
?>
