<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include "config/koneksi.php";

if (!isset($_SESSION['user_id'])) {
    include "login.php";
} else {
    $sqlUser = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $sqlUser ->execute([$_SESSION['user_id']]);
    $resultUser = $sqlUser ->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php 
include "modul/nav.php";

  $page = isset($_GET['page']) ? $_GET['page'] : null;
  if ($page) {

      if ($page == 'siswa') {
        include "modul/input_siswa.php";
      }

      if ($page == 'absensi') {
        include "modul/input_absensi.php";
      }

      if ($page == 'lihat') {
        include "modul/lihat_absensi.php";
      }

      if ($page == 'lihat_siswa') {
        include "modul/lihat_siswa.php";
      }

      if ($page == 'hapus') {
        include "modul/hapus_absensi.php";
      }

      if ($page == 'hapus_siswa') {
        include "modul/hapus_siswa.php";
      }

      if ($page == 'edit') {
        include "modul/edit_absensi.php";
      }

      if ($page == 'edit_siswa') {
        include "modul/edit_siswa.php";
      }

      if ($page == 'user') {
        include "modul/user_profile.php";
      }

      if ($page == 'keluar') {
        include "modul/logout.php";
      }
      
  } else {
    include "modul/defaulth.php";
    // echo "<p>Selamat datang di Sistem Absensi</p>";
  }
?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
<?php 
}
?>