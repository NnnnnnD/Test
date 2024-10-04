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
    <title>Contact - QR Code System</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="contact.css">
    <style>
        /* Custom styles */
        body {
            background-color: whitesmoke;
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
        <h1 class="text-center mb-4">Kontak Kami</h1>

        <div class="row">
            <!-- Informasi Kontak -->
            <div class="col-md-6">
                <h3>Hubungi Kami</h3>
                <p>Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami melalui salah satu metode berikut:</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>Alamat:</strong> Jl. Sukabumi No.30, Kacapiring, Kec. Batununggal, Kota Bandung, Jawa Barat 40271</li>
                    <li class="mb-2"><strong>Telepon:</strong> (022) 87243095</li>
                    <li class="mb-2"><strong>E-mail:</strong> sekretariat@dprd-bandungkota.go.id</li>
                </ul>
                
            </div>

    <div class="mt-5 pt-5 map_main">
        <div class="map-responsive" style="border: 5px solid #000; padding: 10px; border-radius: 10px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.5767461694748!2d107.632317!3d-6.9168135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c5350b1fdd%3A0xc4c1abd65fa97b29!2sJl.%20Sukabumi%20No.30%2C%20Kacapiring%2C%20Kec.%20Batununggal%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040271!5e0!3m2!1sid!2sid!4v1695455547337" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center mt-2">
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
