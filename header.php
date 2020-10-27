<?php include "config.php"; ?>
<html>
  <head>
    <!-- tukar nama sistem yang sesuai -->
    <link rel="stylesheet" href="./script/bootstrap-4.5.3/css/bootstrap.min.css" />
    <title><?php echo $namasistem; ?></title>
  </head>
  <body>
  <style>
      body {
        background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('./hotel.jpg');
        background-size: cover;
        background-attachment: fixed;
      }

      .dark::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0,0,0,0.3);
      }

      .header-info1 {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
      }

      .header-logo {
        height: 100px;
      }
    </style>
    <div class="header container-fluid pl-5 pr-5 pt-5 pb-4">
      <center>
        <div class="col"></div>
        <div class="col-9">
          <div class="row">
            <div class="col-md-8">
              <div class="header-info1">
                <div class="row text-primary">
                  <h1>
                    <a href="./main.php"><?php echo $namasistem;?></a>
                  </h1>
                </div>
                <div class="row text-info">
                  <?php echo $moto; ?>
                </div>
              </div>
            </div>
            <div class="col-md-3 text-right">
              <img src="./header.jpg" alt="logo" class="header-logo"/>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </center>
    </div>
  </body>
</html>