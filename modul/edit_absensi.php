<?php
include 'config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_GET['id']; // ambil id
$stmt = $pdo->prepare("SELECT absensi.id, absensi.tanggal, absensi.status, siswa.nama, siswa.kelas
                       FROM absensi
                       JOIN siswa ON absensi.id_siswa = siswa.id
                       WHERE absensi.id = :id");
$stmt->execute(['id' => $id]);
$absensi = $stmt->fetch();

// ambil semua kategori  dari tb siswa
$siswa_stmt = $pdo->prepare("SELECT * FROM siswa");
$siswa_stmt->execute();
$siswa_list = $siswa_stmt->fetchAll();

// kalau absensi tidak ditemukan
if (!$absensi) {
    echo "Data tidak ditemukan!";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    // update absen
    $stmt = $pdo->prepare("UPDATE absensi SET tanggal = :tanggal, status = :status WHERE id = :id");
    $stmt->execute([
        'tanggal' => $tanggal,
        'status' => $status,
        'id' => $id
    ]);
    
    echo "<script type='text/javascript'>
    alert('Data absensi berhasil diubah!');
    window.location.href = 'index.php?page=lihat';
  </script>";
exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e9f5ff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #4e3b31;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #4e3b31;

    }

    input[type="text"],
    input[type="number"],
    select,
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d8cfc4;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    input[type="date"]:focus {
        border-color: #a0522d;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #5A6C57;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
    }

    button:hover {
        background-color: #526E48;
        transform: translateY(-2px);
    }

    .back a {
        display: inline-block;
        margin-top: 15px;
        text-align: center;
        color: #5A6C57;
        text-decoration: none;
    }

    .back a:hover {
        text-decoration: underline;

    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Absensi</h2>
        <form method="POST">
            <label>Nama Siswa:</label>
            <input type="text" value="<?php echo $absensi['nama']; ?>" readonly>
            <br><br>

            <label>Kelas:</label>
            <input type="text" value="<?php echo $absensi['kelas']; ?>" readonly>
            <br><br>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?php echo $absensi['tanggal']; ?>" required>
            <br><br>

            <label>Status Kehadiran:</label>
            <select name="status" required>
                <option value="Hadir" <?php if ($absensi['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                <option value="Izin" <?php if ($absensi['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
                <option value="Sakit" <?php if ($absensi['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
                <option value="Alfa" <?php if ($absensi['status'] == 'Alfa') echo 'selected'; ?>>Alfa</option>
            </select>
            <br><br>

            <button type="submit"><i class="fa-regular fa-bookmark" style=" font-size: 20px;
            min-width: 30px;"></i> Simpan</button>
        </form>

        <div class="back">
            <a href="?page=lihat_siswa"><i class="fa-solid fa-arrow-left mx-2"></i> Kembali</a>
        </div>
    </div>
</body>

</html>