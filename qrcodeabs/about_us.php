<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - QR Code System</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="about_us.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            margin-right: 10px;
        }
        .team-member img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="p-3 mb-2 bg-primary text-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
                <img src="qrcodes/image/image4.jpg" alt="Logo" class="img-thumbnail" width="50">
                MANGSET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="more_information.php">Seputar Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    </div>
    

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tentang Kami</h1>

        <div class="row">
            <div class="col-md-6">
                <h3>Misi</h3>
                <p>Untuk menyediakan solusi Kode QR yang efisien dan andal untuk sistem kehadiran dan manajemen, meningkatkan alur kerja operasional organisasi.</p>
            </div>
            <div class="col-md-6">
                <h3>Visi</h3>
                <p>Menjadi penyedia terkemuka teknologi Kode QR inovatif yang memberdayakan bisnis dan institusi untuk menyederhanakan proses.</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Team IT</h3>
            </div>
            <!-- Team Member 1 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/firgi.jpg" class="card-img-top" alt="Team Member 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Firgi Ahmad Dilla</h5>
                        <p class="card-text">Product Manager</p>
                    </div>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/satria.jpg" class="card-img-top" alt="Team Member 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Satria Bakti Kusuma</h5>
                        <p class="card-text">Lead Developer</p>
                    </div>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/willy.jpg" class="card-img-top" alt="Team Member 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rowan Willy San Remo</h5>
                        <p class="card-text">UX/UI Designer</p>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 4 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/yoga.jpg" class="card-img-top" alt="Team Member 4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Yoga Pratista</h5>
                        <p class="card-text">IT support</p>
                    </div>
                </div>
            </div>

            <!-- Team Member 5 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/hiu.jpg" class="card-img-top" alt="Team Member 5">
                    <div class="card-body text-center">
                        <h5 class="card-title">Hiu Hawaririn Erambono</h5>
                        <p class="card-text">Business Intelligence</p>
                    </div>
                </div>
            </div>

            <!-- Team Member 6 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/fitri.jpg" class="card-img-top" alt="Team Member 6">
                    <div class="card-body text-center">
                        <h5 class="card-title">Fitria Rahmawati</h5>
                        <p class="card-text">Web Developer</p>
                    </div>
                </div>
            </div>

            <!-- Team Member 7 -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card team-member">
                    <img src="qrcodes/image/dara.jpg" class="card-img-top" alt="Team Member 7">
                    <div class="card-body text-center">
                        <h5 class="card-title">Darayani Haq</h5>
                        <p class="card-text">Programmer</p>
                    </div>
                </div>
            </div>
            <!-- Tambahkan lebih banyak anggota tim sesuai kebutuhan -->
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center mt-5">
        <p class="text-muted">Hak Cipta dibuat oleh:</p>
        <div class="d-flex justify-content-center gap-5">
            <a href="https://www.stmik-mi.ac.id/" target="_blank">
                <img src="qrcodes/image/image1.jpg" alt="Nama Pengarang 1" class="img-thumbnail" width="50">
            </a>
            <a href="https://ars.ac.id/" target="_blank">
                <img src="qrcodes/image/image2.jpg" alt="Nama Pengarang 2" class="img-thumbnail" width="50">
            </a>
            <a href="https://www.unikom.ac.id/" target="_blank">
                <img src="qrcodes/image/image3.jpg" alt="Nama Pengarang 3" class="img-thumbnail" width="50">
            </a>
        </div>
    </footer>

    <!-- Bootstrap JS (optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
