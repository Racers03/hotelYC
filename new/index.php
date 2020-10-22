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
    <div class="container-fluid">
      <div class="row">
        <div class="col"></div>
        <div class="col-8">
          <div class="row">
            <h4>
              <b><u>PENGGUNA</u></b>
            </h4>
          </div>
          <div class="row pb-4">
            <small>
              Log masuk ke sistem
            </small>
          </div>
          <form>
            <div class="form-group">
              <label>ID Pengguna</label>
              <input class="form-control" name="idpengguna">
            </div>
            <div class="form-group">
              <label>Kata Laluan</label>
              <input type="password" class="form-control" name="katalaluan" required>
            </div>
            <button type="submit" class="btn btn-primary">Log Masuk</button>
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </body>
</html>
<?php require('footer.php'); ?>