<?php
define('BASEPATH', dirname(__FILE__));
if (!isset($_POST['add_kandidat'])) {

   header('location:../');

} else {

   $nama     = $_POST['nama'];
   $visi     = $_POST['visi'];
   $misi     = $_POST['misi'];
   $thn      = date('Y');
   $dpn      = date('Y') + 1;
   $periode  = $thn.'/'.$dpn;

   if ($nama == '' || $visi == '' || $misi == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   }
}
?>
