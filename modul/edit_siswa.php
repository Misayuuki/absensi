<?php
include 'config/koneksi.php';


$id = $_GET['id']; // ambil id
$stmt = $pdo->prepare("SELECT * FROM siswa WHERE id = :id");
$stmt->execute(['id' => $id]);
$siswa = $stmt->fetch();

// kalau siswa tidak ditemukan
if (!$siswa) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // update data siswa
    $stmt = $pdo->prepare("UPDATE siswa SET nama = :nama, kelas = :kelas WHERE id = :id");
    $stmt->execute([
        'nama' => $nama,
        'kelas' => $kelas,
        'id' => $id
    ]);
    
    echo "<script type='text/javascript'>
    alert('Data siswa berhasil diubah!');
    window.location.href = 'index.php?page=lihat_siswa';
  </script>";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e9f5ff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 80px auto;
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
    input[type="datetime-local"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d8cfc4;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="datetime-local"]:focus {
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
        <h2>Edit Data Siswa</h2>
        <form method="POST">
            <label>Nama Siswa:</label>
            <input type="text" name="nama" value="<?php echo $siswa['nama']; ?>">
            <br><br>

            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?php echo $siswa['kelas']; ?>">
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