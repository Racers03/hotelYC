<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header2.php');
  //tunggu rekod yang dihantar
  if(isset($_POST['update']))
  {
    $idbilik = $_POST['idbilik'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    //KEMASKINI DENGAN REKOD BARU
    $result = mysqli_query($samb, "UPDATE bilik SET NamaBilik='$nama', HargaBilik='$harga' WHERE IdBilik='$idbilik'");
    if($result) {
      echo "<script>alert('Kemaskini rekod bilik telah berjaya'); window.location='bilik.php'</script>";
    }
  }
?>
<?php
  //AMBIL ID DARI URL
  $idbilik = $_GET['idbilik'];
  //PAPAR REkOD LAMA BERDASARKAN ID YANG DIPILIH
  $result = mysqli_query($samb, "SELECT * FROM bilik WHERE IdBilik='$idbilik'");
  while($res = mysqli_fetch_array($result))
  {
    $nama = $res['NamaBilik'];
    $harga = $res['HargaBilik'];
  }
?>
<html>
  <body>
    <center>
      <h3>KEMASKINI BILIK</h3><br>
      <div class="col"></div>
      <div class="col-8">
        <form name="form1" method="POST">
          <div class="form-group col-4 text-left">
            <label>Nama Bilik:</label>
            <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $nama;?>" />
          </div>
          <div class="form-group col-3 text-left">
            <label>Harga:</label>
            <input class="form-control" type="text" name="harga" id="harga" value="<?php echo $harga;?>" />
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