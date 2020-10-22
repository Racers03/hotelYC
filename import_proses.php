<?php
  require('config.php');
  if(isset($_POST["Import"])){
    $filename=$_FILES["file"]["tmp_name"];
  }
  if($_FILES["file"]["size"] > 0){
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
    {
      //tambah dalam baris
      $save = "INSERT INTO pengguna values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]')";
      $result = mysqli_query($samb,$save);
      if(!isset($result)){
        echo "<script>alert('Pindah naik fail CSV gagal'); window.location = 'import_pekerja.php'</script>";
      } 
      else {
        echo "<script>alert('Pindah naik fail CSV berjaya'); window.location = 'pekerja.php'</script>";
      }
    }
    fclose($file);
  }
?>