<?php include "config.php"; ?>
<!-- panggil fail untuk besarkan huruf -->
<?php 
  include "besar.php"; 
?>
<!-- panggil fail untuk tukar warna font -->
<?php 
  include "tukar.php"; 
?>
<html>
  <head>
    <!-- tukar nama sistem yang sesuai -->
    <title><?php echo $namasistem; ?></title>
    <link rel="stylesheet" href="./script/bootstrap-4.5.3/css/bootstrap.min.css" />
    <script src="./script/jquery-3.5.1.min.js"></script>
    <script src="./script/bootstrap-4.5.3/js/bootstrap.min.js"></script>
  </head>
  <body>
  <style body {background-image: url('./hotel.jpg')}></style>
    <div class="container pl-5 pr-5 pt-5 pb-4">
      <div class="row text-primary">
        <h1>
          <?php echo $namasistem; ?>
        </h1>
      </div>
      <div class="row text-secondary">
        <?php echo $moto; ?>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-light navbar-light mb-4">
      <div class="col"></div>
      <div class="col-9">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bilik
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./bilik.php">Semak Bilik</a>
                <a class="dropdown-item" href="./tambah_bilik.php">Tambah Bilik</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tempahan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./semak.php">Semak Tempahan</a>
                <a class="dropdown-item" href="./tempah.php">Masuk Tempahan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pekerja
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./pekerja.php">Semak Pekerja</a>
                <a class="dropdown-item" href="./tambah_pekerja.php">Tambah Pekerja</a>
                <a class="dropdown-item" href="./import_pekerja.php">Import Pekerja</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./laporan.php">Laporan</a>
            </li>
          </ul>
          <div class="btn-group my-2 my-lg-0 mr-3">
            <!-- menyediakan butang tukar warna font dan butang tukar saiz teks-->
            <button type="button" class="btn btn-secondary" onclick="zoomIn();">Besar Teks</button>
            <button type="button" class="btn btn-secondary" onclick="zoomOut();">Kecil Teks</button>
            <button type="button" class="btn btn-secondary" onclick="toggleColor();">Tukar Warna</button>
          </div>
          <a class="nav-link" href="./keluar.php"><b>Log Keluar</b></a>
        </div>
      </div>
      <div class="col"></div>
    </nav>
  </body>
</html>