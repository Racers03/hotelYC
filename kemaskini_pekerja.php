<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
  //ambil rekod yang dipost
  if (isset($_POST['update'])) {
    $idpengguna = $_POST['userid'];
    $nama = $_POST['name'];
    $katalaluan = $_POST['pass'];
    $aras = $_POST['level'];
    //KEMASKINI DENGAN REKOD BARU
    $result = mysqli_query($samb, "UPDATE pengguna SET nama='$nama',kata_laluan='$katalaluan',status='$aras' WHERE nama_pengguna='$idpengguna'");
    //papar mesej jika rekod berjaya dikemaskini
    echo "<script>alert('Kemaskini rekod telah berjaya'); window.location='pekerja.php'</script>";
  }
?>
<?php
  //DAPATKAN ID DARI URL
  $id = $_GET['kemaskini_id'];
  //PILIH DATA BERDASARKAN PADA ID REKOD
  $result = mysqli_query($samb, "SELECT * FROM pengguna WHERE nama_pengguna='$id'");
  while ($res = mysqli_fetch_array($result)) {
    //Paparkan nilai asal
    $user = $res['nama_pengguna'];
    $name = $res['nama'];
    $pass = $res['kata_laluan'];
    $level = $res['status'];
  }
?>
<html>
  <body>
    <center>
      <?php echo $user; ?>
      <h3>KEMASKINI REKOD PEKERJA</h3>
      <form name="form1" action="kemaskini_pekerja.php" method="POST">
        <fieldset>
          <label>Nama Pengguna:</label>
          <input type="text" name="name" id="name" value="<?php echo $name; ?>" /><br><br>
          <label>Kata Laluan:</label>
          <input type="text" name="pass" id="pass" value="<?php echo $pass; ?>" />
          <input type="hidden" name="level" value=<?php echo $level; ?>>
          <input type="hidden" name="userid" value=<?php echo $user; ?>>
          <br><br><input type="submit" name="update" id="submit" value="Kemaskini" />
        </fieldset>
      </form>
      <a href="pekerja.php">Ke senarai pekerja</a><br>
    </center>
  </body>
</html>