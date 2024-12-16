<?php 
session_start();
if (isset($_SESSION['user_id'])) { // Cek apakah iduser ada di sesi
    session_destroy(); // Hapus sesi
}
echo "<script type='text/javascript'>
window.location.href = 'index.php?page=keluar';
</script>";
exit();
?>