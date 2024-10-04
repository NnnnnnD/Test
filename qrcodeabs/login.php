<?php
// *login.php*

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Mulai sesi

include 'config.php'; // Pastikan file ini berisi informasi koneksi database menggunakan PDO

$error_message = '';

if (isset($_POST['login'])) {
    // Ambil dan sanitasi input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error_message = 'Email dan password harus diisi.';
    } else {
        // Prepare statement untuk mengambil password yang sudah di-hash dan role dari database
        $stmt = $pdo->prepare("SELECT id, password, role FROM users WHERE email = :email");
        if ($stmt === false) {
            $error_message = 'Gagal menyiapkan statement: ' . htmlspecialchars($pdo->errorInfo()[2]);
        } else {
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $hashed_password = $user['password'];
                // Verifikasi password
                if (password_verify($password, $hashed_password)) {
                    // Simpan informasi login dalam sesi
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $user['role']; // Simpan role dalam sesi

                    // Arahkan pengguna ke dashboard berdasarkan role
                    if ($user['role'] === 'admin') {
                        header("Location: admin_dashboard.php");
                    } else {
                        header("Location: dashboard.php");
                    }
                    exit();
                } else {
                    $error_message = 'Password salah. Silakan coba lagi.';
                }
            } else {
                $error_message = 'Email tidak ditemukan. Silakan cek kembali.';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('qrcodes/image/Megamendung.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
            <!-- Gambar di atas form -->
            <div class="text-center mb-4">
                <img src="qrcodes/image/logo.jpg" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <!-- Tampilkan pesan error jika ada -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>
            <!-- Form Login -->
            <h3 class="text-center mb-3">MANGSET</h3>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
                <p class="mt-3 text-center">Sudah punya akun? <a href="register.php">Registrasi disini</a>.</p>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS (optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>