<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  //sambung ke fail header
  require('header2.php');
  //Terima rekod yang di post
  if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $katalaluan = $_POST['katalaluan'];
    $statuspengguna = $_POST['statuspengguna'];
    $tempid = "P";
    for($i = 0; $i < 4; $i++) {
      $tempnum = rand(0,9);
      $tempid = $tempid . $tempnum;
    }
    //TAMBAH REKOD BARU
    $result = mysqli_query($samb, "INSERT INTO pengguna values ('$tempid','$nama','$katalaluan','$statuspengguna')");
    if($result) {
      if ($_GET['redirect']) {
        $_SESSION['idpengguna'] = $tempid;
        $_SESSION['level'] = $statuspengguna;
        echo "<script>alert('Penambahan rekod pengguna telah berjaya dan akan log masuk secara automatik.'); window.location='main.php'</script>";
      } else {
        echo "<script>alert('Penambahan rekod pengguna telah berjaya'); window.location='pekerja.php'</script>";
      }
    }
  }
?>
<html>
  <body class="text-white">
    <center>
      <h3>TAMBAH PEKERJA</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <form name="form1" method="POST">
          <div class="form-group col-5 text-left">
            <label>Nama Pengguna:</label>
            <input type="text" name="nama" id="nama" class="form-control" required/>
          </div>
          <div class="form-group col-5 text-left">
            <label>Kata Laluan:</label><input type="text" name="katalaluan" id="katalaluan" class="form-control" required pattern=".{6,25}" oninvalid="this.setCustomValidity('Sila masukkan 6 hingga 25 patah perkataan.');" oninput="this.setCustomValidity('');"/>
          </div>
          <div class="form-group col-5 text-left form-inline">
            <div class="col"></div>
            <label>Status: &nbsp;</label>
            <select name="statuspengguna" class="custom-select">
              <option value="PEKERJA">PEKERJA</option>
              <option value="ADMIN">ADMIN</option>
            </select>
            <div class="col"></div>
          </div>
          <br>
          <button type="submit" name="update" id="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>