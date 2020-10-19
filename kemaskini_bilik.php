<?php
  //sambung ke pangkalan data
  require('config.php');
  //sambung ke fail header
  require('header.php');
  //tunggu rekod yang dihantar
  if(isset($_POST['update']))
  {
    $idbilik = $_POST['idbilik'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    //KEMASKINI DENGAN REKOD BARU
    $result = mysqli_query($samb, "UPDATE bilik SET nama='$nama', harga='$harga' WHERE idbilik=$idbilik");
    echo "<script>alert('Kemaskini rekod bilik telah berjaya'); window.location='bilik.php'</script>";
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
      <h3>KEMASKINI BILIK</h3>
      <form name="form1" action="kemaskini_bilik.php" method="POST">
        <fieldset>
          <label>Nama Bilik:</label><input type="text" name="nama" id="nama" value="<?php echo $nama;?>" /><br><br>
          <label>Harga:</label><input type="text" name="harga" id="harga" value="<?php echo $harga;?>" />
          <input type="hidden" name="idbilik" value=<?php echo $_GET['idbilik'];?>><br><br>
          <input type="submit" name="update" id="submit" value="Kemaskini" />
        </fieldset>
      </form>
      <a href="bilik.php">Ke senarai bilik</a><br>
    </center>
  </body>
</html>