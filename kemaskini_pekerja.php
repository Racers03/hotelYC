<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
  //ambil rekod yang dipost
  if (isset($_POST['update'])) {
    $idpengguna = $_POST['userid'];
    $nama = $_POST['name'];
    $katalaluan = $_POST['pass'];
    $aras = $_POST['level'];
    //KEMASKINI DENGAN REKOD BARU
    $result = mysqli_query($samb, "UPDATE pengguna SET NamaPengguna='$nama',KataLaluan='$katalaluan',status='$aras' WHERE IdPengguna='$idpengguna'");
    //papar mesej jika rekod berjaya dikemaskini
    echo "<script>alert('Kemaskini rekod telah berjaya'); window.location='pekerja.php'</script>";
  }
?>
<?php
  //DAPATKAN ID DARI URL
  $id = $_GET['idpengguna'];
  //PILIH DATA BERDASARKAN PADA ID REKOD
  $result = mysqli_query($samb, "SELECT * FROM pengguna WHERE IdPengguna='$id'");
  while ($res = mysqli_fetch_array($result)) {
    //Paparkan nilai asal
    $user = $res['IdPengguna'];
    $name = $res['NamaPengguna'];
    $pass = $res['KataLaluan'];
    $level = $res['Status'];
  }
?>
<html>
  <body>
    <center>
      <h3>KEMASKINI REKOD PEKERJA</h3>
      <?php echo $user; ?><br><br>
      <div class="col"></div>
      <div class="col-8">
        <form name="form1" action="kemaskini_pekerja.php" method="POST">
          <div class="form-group col-4 text-left">
            <label>Nama Pengguna:</label>
            <input class="form-control" type="text" name="name" id="name" value="<?php echo $name; ?>" />
          </div>
          <div class="form-group col-3 text-left">
            <label>Kata Laluan:</label>
            <input class="form-control" type="text" name="pass" id="pass" value="<?php echo $pass; ?>" />
          </div>
          <br>
          <button type="submit" class="btn btn-primary" name="update" id="submit">Kemaskini</button>
        </form>
      </div>
      <div class="col"></div>
    </center>
    <?php require('./footer.php');?>
  </body>
</html>