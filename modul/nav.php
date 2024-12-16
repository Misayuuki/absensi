<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Modern & Interaktif</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 250px;
            --sidebar-width-collapsed: 70px;
            --primary-color: #5A6C57;
            --secondary-color: #85A98F;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9f5ff;
            margin: 0;
            padding: 0;
            transition: all 0.3s;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            transition: all 0.3s;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: var(--sidebar-width-collapsed);
        }

        .sidebar-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            color: white;
            font-size: 20px;
            transition: transform 0.3s;
        }

        .sidebar-toggle:hover {
            transform: rotate(180deg);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin-top: 60px;
        }

        .sidebar-menu li {
            padding: 10px 20px;
            transition: all 0.3s;
            position: relative;
        }

        .sidebar-menu li:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sidebar-menu li i {
            font-size: 20px;
            min-width: 30px;
        }

        .sidebar.collapsed .sidebar-menu li span {
            display: none;
        }

        .content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
            padding: 20px;
        }

        .sidebar.collapsed + .content {
            margin-left: var(--sidebar-width-collapsed);
        }

        .profile-section {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .sidebar.collapsed .profile-section {
            flex-direction: column;
            align-items: center;
        }

        .sidebar.collapsed .profile-details {
            display: none;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-text {
            font-size: 30px;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </div>

        <div class="profile-section">
            <img src="gbr/<?= htmlspecialchars($resultUser['gbr']) ?>" alt="Profil" class="profile-img">
            <div class="profile-details">
                <h6 class="m-0">Hai, <?=$resultUser['username']?></h6>
                <small><?=$resultUser['email']?></small>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li>
                <a href="?page=siswa">
                    <i class="fas fa-plus"></i>
                    <span>Input Siswa</span>
                </a>
            </li>
            <li>
                <a href="?page=absensi">
                    <i class="fas fa-plus"></i>
                    <span>Input Absensi</span>
                </a>
            </li>
            <li>
                <a href="?page=lihat_siswa">
                    <i class="fa-solid fa-address-book"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="?page=lihat">
                    <i class="fas fa-book"></i>
                    <span>Rekap Absensi</span>
                </a>
            </li>

            <li>
                <a href="?page=user">
                <i class="fa-regular fa-user"></i>
                    <span>User Profile</span>
                </a>
            </li>
      
            <li>
                <a href="?page=keluar">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
