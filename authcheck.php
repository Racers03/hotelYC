<?php 
    //Jika $_SESSION tidak ditetapkan, redirect pengguna ke laman log masuk.
    if (!(isset($_SESSION['idpengguna']))) {
        session_destroy();
        header("Location: ./index.php");
    }
?>
