<?php
include 'config/koneksi.php';

$sql = "SELECT * FROM siswa";
$stmt = $pdo->prepare($sql);
$stmt->execute(); //eksekusi query
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9f5ff;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #4A628A;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            max-width: 600px;
            margin: 50px auto;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
           
        }

        th, td {
            text-align: left;
            padding: 12px 35px;
            
        }

        th {
            background-color: #5A6C57;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef5ff;
            transition: background-color 0.3s ease;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        td a {
            text-decoration: none;
            color: #4A628A;
            font-weight: bold;
            font-size: 14px;
            padding: 5px 10px;
            border: 1px solid #4A628A;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        td a:hover {
            background-color: #4A628A;
            color: white;
        }

        td:last-child {
            text-align: center;
        }


        .no-data {
            text-align: center;
            margin-top: 20px;
            color: #999;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Data siswa Sadiya Dharma Academy</h2>

    <!-- tb data siswa -->
    <?php if (count($data) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row["nama"]); ?></td>
                        <td><?= htmlspecialchars($row["kelas"]); ?></td>
                        <td>
                            <a href='index.php?page=edit_siswa&id=<?= $row["id"]; ?>'>Edit</a> 
                            <a href='index.php?page=hapus_siswa&id=<?= $row["id"]; ?>' onclick="return confirm('Kamu yakin mau hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">Tidak ada data siswa.</p>
    <?php endif; ?>
</div>
</body>
</html>
