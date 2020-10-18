<?php
//sambung ke pangkalan data
require('config.php');
//sambung ke fail header
require('header.php');
//terima rekod yang di post 
if(isset($_POST['nama']))
{
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    //tambah rekod ke dalam jadual
    $result = mysqli_query($samb, "INSERT INTO bilik (nama,harga)
    VALUES ('$nama', '$harga')");
    echo "<script>alert('Penambahanrekod bilik telah berjaya');
    window.location='bilik.php'</script>";
    }
?>
<html>
<center>
<body>
    <h3>TAMBAH BILIK BARU</h3>
    <form name="form1" action="tambah_bilik.php" method="POST">
    <fieldset>
    <label>Nama Bilik:</label><input type="text" name="nama"
    id="nama"/><br><br>
    <label>Harga:</label><input type="text" name="harga" id="harga"  />
    <br><br><input type="submit" name="update" id="submit"
    value="Tambah Bilik" />
    </fieldset>
    </form>
    <a href="bilik.php">Ke senarai bilik</a><br>
        </body></center>

</html>