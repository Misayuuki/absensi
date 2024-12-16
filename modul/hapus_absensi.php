<?php 
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM absensi WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Data antrian sudah berhasil dihapus nih! 🤩');
        window.location.href = 'index.php?page=lihat';
        </script>";
        // header("Location: lihat_absensi.php");
        exit; 
        
    } else {
        echo "Error : " . $stmt->errorInfo()[2];
    }
}


?>