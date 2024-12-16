<?php 
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nama, kelas) VALUES (:nama, :kelas)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nama'=> $nama, 'kelas'=> $kelas]);

    echo "Data siswa berhasil ditambahkan!";

}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
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
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #666;
    }

    select,
    input[type="text"],
    input[type="number"],
    input[type="datetime-local"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        transition: border-color 0.3s ease-in-out;
    }

    select:hover,
    input[type="text"]:hover,
    input[type="number"]:hover,
    input[type="datetime-local"]:hover {
        border-color: #66afe9;
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
    </style>
</head>

<body>

    <div class="container">
        <h2 class="fw-semibold font-monospace"><i>Input Siswa</i></h2>
        <form method="POST">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa :</label>
                <input type="text" id="nama" name="nama" required style="border-color: black;">
            </div>
            <div class="form-group">
                <label for="kelas_siswa">Kelas Siswa :</label>
                <input type="text" id="kelas" name="kelas" required style="border-color: black;">
            </div>
            <button type="submit" name="btn">Input Data Siswa</button>
        </form>
    </div>
</body>

</html>