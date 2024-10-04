<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php'; // Pastikan file ini berisi informasi koneksi database

if (isset($_POST['register'])) {
    // Validasi dan sanitasi input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        $error_message = 'Semua field harus diisi.';
    } else {
        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = 'Email sudah terdaftar. Silakan gunakan email lain.';
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data ke tabel users
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Set pesan sukses dan arahkan ke halaman login
                $success_message = 'Registrasi berhasil! Anda akan diarahkan ke halaman login dalam 3 detik.';
                // Redirect ke login.php setelah 3 detik
                header("refresh:3;url=login.php");
            } else {
                $error_message = 'Terjadi kesalahan saat registrasi: ' . htmlspecialchars($stmt->error);
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - QR Code System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="qrcodes/image/image4.jpg" alt="Logo" class="img-thumbnail" width="40">
                mangset
            </a>
        </div>
    </nav>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4" style="width: 100%; max-width: 500px;">
            <h3 class="card-title text-center mb-4">Register</h3>

            <!-- Tampilkan Pesan Sukses atau Error -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= htmlspecialchars($success_message) ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <!-- Form Registrasi -->
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            </form>

            <p class="mt-3 text-center">Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
