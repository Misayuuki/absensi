<?php
include 'config/koneksi.php';

// menangkap data tanggal dari form klo ada
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';


$sql = "SELECT absensi.id, siswa.nama, siswa.kelas, absensi.tanggal, absensi.status
        FROM absensi
        JOIN siswa ON absensi.id_siswa = siswa.id";

// menambahkan filter rentang tanggal klo form diisi
if (!empty($start_date) && !empty($end_date)) {
    $sql .= " WHERE absensi.tanggal BETWEEN :start_date AND :end_date";
}

$stmt = $pdo->prepare($sql);

// Bind parameter jika ada filter
if (!empty($start_date) && !empty($end_date)) {
    $stmt->execute(['start_date' => $start_date, 'end_date' => $end_date]);
} else {
    $stmt->execute();
}

// Ambil data hasil query
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Absensi Siswa</title>
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
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        form input[type="date"], form button {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            background-color: #5A6C57;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #3A5175;
        }

        table {
            border-collapse: collapse;
            max-width: 700px;
            margin: 50px auto;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
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

    <h2>Rekap Absensi Sadiya Dharma Academy</h2>

    <!-- form input Rentang Tanggal -->
    <form method="POST">
        <label for="start_date">Tanggal Mulai:</label>
        <input type="date" name="start_date" id="start_date" value="<?= $start_date; ?>" required>
        <label for="end_date">Tanggal Akhir:</label>
        <input type="date" name="end_date" id="end_date" value="<?= $end_date; ?>" required>
        <button type="submit">Filter</button>
    </form>

    <!-- tb data absensi -->
    <?php if (count($data) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
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
                        <td><?= htmlspecialchars($row["tanggal"]); ?></td>
                        <td><?= htmlspecialchars($row["status"]); ?></td>
                        <td>
                            <a href='index.php?page=edit&id=<?= $row["id"]; ?>'>Edit</a> 
                            <a href='index.php?page=hapus&id=<?= $row["id"]; ?>' onclick="return confirm('Kamu yakin mau hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">Tidak ada data absensi dalam rentang tanggal ini...</p>
    <?php endif; ?>
</body>
</html>
