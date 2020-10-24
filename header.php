<?php include "config.php"; ?>
<html>
  <head>
    <!-- tukar nama sistem yang sesuai -->
    <link rel="stylesheet" href="./script/bootstrap-4.5.3/css/bootstrap.min.css" />
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
    </div>
  </body>
</html>