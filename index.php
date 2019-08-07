<?php
define('BASEPATH', dirname(__FILE__));
session_start();  // Sesssion Tracker

if (isset($_SESSION['siswa'])) {          // Jika user udah login, arahin ke laman voting
   header('location:./vote.php');
}

if (isset($_POST['submit'])) {      // Cek Saat user teken tombol submit

   require('include/connection.php');     // Ambil kredensial koneksi mysql

   $nis     = $_POST['nis'];
   $thn     = date('Y');
   $dpn     = date('Y') + 1;        // Ambil Info Pemilih
   $periode = $thn.'/'.$dpn;

   $cek = $con->prepare("SELECT * FROM t_pemilih WHERE nis = ? && periode = ?") or die($con->error);  // Ambil data dari table_pemilih
   $cek->bind_param('ss', $nis, $periode);
   $cek->execute();     // Run SQL
   $cek->store_result();

   if ($cek->num_rows() > 0) {           // Cek Udah milih apa blom

      echo '<script type="text/javascript">alert("Anda sudah memberikan suara");</script>';     // Return jika udah

   } else {

      $sql = $con->prepare("SELECT * FROM t_user WHERE id_user = ? && pemilih = 'Y'") or die($con->error);
      $sql->bind_param('s', $nis);
      $sql->execute();
      $sql->store_result();   // Ulangi tadi

      if ($sql->num_rows() > 0 ) {
         $sql->bind_result($id, $user, $kelas, $jk, $pemilih);
         $sql->fetch();

         $_SESSION['siswa'] = $id;  // Id Session start

         header('location:./vote.php');   // Redirect ke laman voting

      } else {

         echo '<script type="text/javascript">alert("Anda tidak berhak memberikan suara");</script>';
            // return jika dpn ga cocok
      }

   }

}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Pemilihan Ketua OSIS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets-modern/css/main.css" />
</head>

<body class="is-preload">

    <!-- Header -->
    <header id="header">
        <h1>Pemilihan Ketua OSIS</h1>
        <p>Kon Percoyo, Aku Sumpek karo jenenge PHP!!!!</p>
    </header>

    <?php 
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'thanks':
                    echo '<h1>MAKASIH LOH</h1>';
                    break;

                    default:
                    echo '<form id="signup-form" method="post" action="">
                    <input type="text" name="nis" id="nis" required="NIS" placeholder="Masukkan NIS" />
                    <input type="submit" value="Login" name="submit" />
                </form>';
                    break;
                }
            } else {
                echo '<form id="signup-form" method="post" action="">
                <input type="text" name="nis" id="nis" required="NIS" placeholder="Masukkan NIS" />
                <input type="submit" value="Login" name="submit" />
            </form>';
            }
            ?>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li><?php echo date ('Y');?>&copy; #SakuraTeam</li>
        </ul>
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="./assets-modern/js/main.js"></script>
    <script type="text/javascript" src="./assets/js/jquery.js"></script>

</body>

</html>