<?php 
include "config/koneksi.php";

$sqlUser = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$sqlUser->execute([$_SESSION['user_id']]);
$resultUser = $sqlUser->fetch();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $profilePicture = $resultUser['gbr']; // Default gambar 

  
    if (!empty($_FILES['gbr']['name'])) {
        $fileName = $_FILES['gbr']['name'];
        $fileTmp = $_FILES['gbr']['tmp_name'];
        $uploadPath = "gbr/" . $fileName;
    
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            $profilePicture = $fileName; // update gambar baru
        } else {
            echo "<script>alert('Gagal mengunggah gambar!');</script>";
        }
    }

    $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, gbr = :gbr WHERE id = :id");
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'gbr' => $profilePicture,
        'id' => $_SESSION['user_id']
    ]);

    echo "<script>alert('Profil kamu berhasil diperbarui nih!'); window.location.href = 'index.php?page=user';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e9f5ff;
        margin: 0;
        padding: 0;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 50px auto;
    }

    .container {
        max-width: 60%;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
    input[type="email"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d8cfc4;
        border-radius: 4px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    select:focus,
    input[type="file"]:focus {
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!--ini Profil -->
            <div class="col-md-4 text-center">
                <img src="gbr/<?= htmlspecialchars($resultUser['gbr']) ?>" alt="Profile Picture"
                    class="profile-picture mb-3">
                <h5><?= htmlspecialchars($resultUser['username']) ?></h5>
                <p><?= htmlspecialchars($resultUser['email']) ?></p>
            </div>

            <!-- ini form edit profil -->
            <div class="col-md-8">
                <h4>Edit Profil</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?= htmlspecialchars($resultUser['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= htmlspecialchars($resultUser['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Ubah Foto Profil :</label>
                        <input type="file" class="form-control" id="gbr" name="gbr">
                    </div>
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>