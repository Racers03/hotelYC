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
    $query = mysqli_query($samb,
    "SELECT * FROM pengguna
    WHERE IdPengguna='$user'
    AND KataLaluan='$pass'");
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query) == 0||$row['KataLaluan']!=$pass)
    {
        //papar mesej gagal login 
        echo "<script>alert('ID Pengguna atau Katalaluan yang salah');
        window.location='index.php'</script>";
    }
    else
    {
        $_SESSION['idpengguna']=$row['IdPengguna'];
        // $_SESSION['level'] = $row['status'];
        //buka laman utama berdasarkan level login
        header("Location: index2.php");
    }
}
?>
<html>
<body>
<FIELDSET>
         <!-- Papar jadual -->
          <CENTER><table width='70%' border=0>
        <tr> 
            <td width="900"><FONT SIZE="+2"><U>PENGGUNA</U></td>
        </tr>
    <td> 
    <form method="POST"> 
        <p> Login masuk untuk pengguna</p>
        <label for="InputID">ID Pengguna</label><br>
    <input type="text" name="idpengguna"
    placeholder="ID Pengguna" required><br>
    <label for="inputPassword">Katalaluan</label><br>
    <input type="password" name="katalaluan"
    id="inputPassword" placeholder="Katalaluan" required><br>
    <button type="submit">Login</button><br>
    </td>
    </tr>
    </form>
    </table></CENTER>
    </FIELDSET>
    </body><br><br>
    <?php require('footer.php'); ?>
    </html>