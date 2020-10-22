<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
  //mulakan sesi login untuk kekalkan login 
  session_start();
  //semak sama ada data dengan ID pengguna nama telah dihantar
  if (isset($_POST['idpengguna'])) {
    //pembolehubah untuk memegang data yang dihantar
    $user = $_POST['idpengguna'];
    $pass = $_POST['katalaluan'];
    //arahan sql akan dilaksanakan
    $query = mysqli_query($samb, "SELECT * FROM pengguna WHERE IdPengguna='$user' AND KataLaluan='$pass'");
    $row = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) == 0 || $row['KataLaluan'] != $pass) {
      //papar mesej gagal login 
      echo "<script>alert('ID Pengguna atau Katalaluan yang salah'); window.location='index.php'</script>";
    } else {
      $_SESSION['idpengguna'] = $row['IdPengguna'];
      $_SESSION['level'] = $row['Status'];
      //buka laman utama berdasarkan level login
      header("Location: index2.php");
    }
  }
?>
<html>
  <head>
    <link rel="stylesheet" href="./script/bootstrap-4.5.3/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="container-fluid"></div>
  </body>
</html>
<?php require('footer.php'); ?>