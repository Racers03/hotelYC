<?php
// if ($_SESSION['level']=="ADMIN")
if (true)
{
?>
<!-- Papar menu untuk admin -->
MENU UTAMA [ADMIN]
<BR>
<li><a href="bilik.php">Setup Bilik</a></li>
<li><a href="pekerja.php">Tambah Pekerja</a></li>
<li><a href="import_pekerja.php">Import Pekerja</a></li>
<li><a href="tempah.php">Masuk Tempahan</a></li>
<li><a href="semak.php">Semak Tempahan</a></li>
<li><a href="laporan.php">Laporan</a></li>
<li><a href="keluar.php">Keluar</a></li>
<?php
}
else
{
?>
<!-- Papar menu untuk pekerja --> 
MENU UTAMA [Pekerja]
<BR>
<li><a href="tempah.php">Masuk Tempahan</a></li>
<li><a href="semak.php">Semak Tempahan bilik</a></li>
<li><a href="keluar.php">Keluar</a></li>
<?php
}
?>