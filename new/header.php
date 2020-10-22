<?php include "config.php"; ?>
<html>
  <head>
    <!-- tukar nama sistem yang sesuai -->
    <title><?php echo $namasistem; ?></title>
  </head>
  <body>
    <div class="container pl-5 pr-5 pt-5 pb-4">
      <div class="row text-primary">
        <h1>
          <?php echo $namasistem; ?>
        </h1>
      </div>
      <div class="row text-secondary">
        <?php echo $moto; ?>
      </div>
      <div class="row pt-3">
        <div class="btn-group">
          <!-- menyediakan butang tukar warna font dan butang tukar saiz teks-->
          <button type="button" class="btn btn-secondary" onclick="zoomIn();">Besar Teks</button>
          <button type="button" class="btn btn-secondary" onclick="zoomOut();">Kecil Teks</button>
          <button type="button" class="btn btn-secondary" onclick="toggleColor();">Tukar Warna</button>
        </div>
      </div>
    </div>
  </body>
  <!-- panggil fail untuk besarkan huruf -->
    <?php 
      include "besar.php"; 
    ?>
    <!-- panggil fail untuk tukar warna font -->
    <?php 
      include "tukar.php"; 
    ?>
</html>