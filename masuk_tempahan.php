<?php
  //sambung ke pangkalan data
  require('config.php');
  session_start();
  require('authcheck.php');
  //semak sama ada data telah dihantar
  if (isset($_POST['idpelanggan'])) {
    //pembolehubah untuk memegang data yang dihantar
    $id = $_POST['idpelanggan'];
    $masuk = $_POST ['tarikh_masuk'];
    $bilik = $_POST['idbilik'];
    $keluar = $_POST['tarikh_keluar'];
    //dapatkan jumlah bayaran bilik
    $duit=mysqli_query($samb,"SELECT * FROM bilik WHERE IdBilik='$bilik'");
    $tunjukDuit=mysqli_fetch_array($duit);
    $harga=$tunjukDuit['HargaBilik'];
    
    //Periksa Bilik kosong atau tidak
    $wujud=mysqli_query($samb,
    "SELECT * FROM tempahan
    WHERE IdBilik='$bilik' AND (
    (tarikh_masuk <= '$masuk' AND tarikh_keluar > '$masuk')
    OR (tarikh_masuk < '$keluar' AND tarikh_keluar >= '$keluar')
    OR(tarikh_masuk >= '$masuk' AND tarikh_keluar < '$keluar')
    )");
    $bil_rekod=mysqli_num_rows ($wujud);
    if ($bil_rekod==0&&$masuk!=$keluar)
    {
      //tambah rekod baru ke dalam table
      $tempid = "";
      for($i = 0; $i <= 5; $i++) {
        $tempnum = rand(0,9);
        $tempid = $tempid . $tempnum;
      }
      $rekod = "INSERT INTO tempahan
      (IdTempah,tarikh_masuk,IdBilik,IdPelanggan,tarikh_keluar,bayaran)
      VALUES ('$tempid','$masuk','$bilik','$id','$keluar','$harga')";
      // Melaksanakan pertanyaan rekod dengan sambungan ke pangkalan data
      $hasil = mysqli_query($samb, $rekod);
      // papar mesej berjaya atau gagal simpan rekod baru
      echo "<script>alert('TEMPAHAN BILIK BERJAYA'); window.location='semak.php'</script>";
    }
    else{
      echo "<script>alert('TEMPAHAN BILIK GAGAL! Bilik telah ditempah'); window.location='tempah.php'</script>";
    }
  }
?>