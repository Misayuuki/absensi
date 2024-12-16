<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Masukin data pengguna baru ke database
    $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->execute([$username, $email]);

    // ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .login {
        min-height: 100vh;
    }

    .bg-image {
        background-image: url('https://img.freepik.com/free-vector/cyberstalking-abstract-illustration_335657-4579.jpg?t=st=1732715326~exp=1732718926~hmac=944af0f8cf0666dd7ee32e914f82e73958cc1a1fc2a1afd75de9f5842719d2d4&w=740');
        background-size: cover;
        background-position: center;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
    </style>
</head>

<body>
    <div class="container ps-md-0 mt-5 mb-5">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image rounded"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4 fw-semibold font-monospace" style="color:#8C855E;">Sign Up here</h3>

                                <!-- <form method="POST">
                                    <label>Username</label>
                                    <input type="text" name="username" required>
                                    <label>Email</label>
                                    <input type="email" name="email" required>
                                    <button type="submit">Create Account</button>
                                </form> -->

                                <form method="POST">
                                    <div class="mb-3 mt-3">
                                        <label for="Username" class="form-label">Username :</label>
                                        <input type="text" class="form-control" placeholder="Masukan Username disini"
                                        name="username" required style="border-color: black;">
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email :</label>
                                        <input type="email" class="form-control" id="email" placeholder="Masukan Email disini"
                                            name="email" style="border-color: black;">
                                    </div>
                                    <!-- <button type="submit" name="btn" class="btn btn-dark" style="background-color: #605678;">Submit</button> -->
                                    <div class="d-grid gap-2">
                                    <button name="btn" class="btn btn-dark"  type="submit" style="background-color: #40343D;">Daftar Sekarang</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>