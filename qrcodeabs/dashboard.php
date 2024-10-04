<?php
session_start(); // Mulai sesi

// Pengecekan apakah user sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit(); // Pastikan script berhenti agar kode di bawah tidak dieksekusi
}

// Jika user sudah login, script di bawah ini akan dieksekusi

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - QR Code System</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to FontAwesome for Social Media Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="dashboard.css">
    
    <style>
        /* Custom styles */
        body {
            background-image: url('qrcodes/image/bandungjuara.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .navbar-brand {
            color: #f9f9f9;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        footer img {
            transition: transform 0.3s;
        }

        footer img:hover {
            transform: scale(1.1);
        }

        h1 {
            color: greenyellow;
            font-size: 3em;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5), 4px 4px 10px rgba(0, 0, 0, 0.3);
            transform: perspective(500px) translateZ(10px);
        }
        
        h2 {
            color: black;
            font-size: 1em;
            text-align: center;
            transform: perspective(500px) translateZ(10px);
            padding-top: 5%;
        }

        h3 {
            color: black;
            font-size: 1em;
            text-align: center;
            transform: perspective(500px) translateZ(10px);
            padding-top: 5%;
        }

        /* Styles for related sites section */
        .related-sites {
            background-color: #f9f9f9;
            padding: 30px 0;
        }

        

        .related-sites h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .related-sites .card {
            border: none;
            text-align: center;
            padding: 20px;
        }

        .related-sites .card img {
            max-width: 10px;
            margin-bottom: 15px;
        }

        .statistics-section {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .statistics-section .stats-item {
            margin-bottom: 15px;
        }

        .footer-social {
            margin-top: 20px;
        }

        .footer-social a {
            color: greenyellow;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5), 4px 4px 10px rgba(0, 0, 0, 0.3);
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="p-3 mb-2 bg-primary text-white">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="qrcodes/image/image4.jpg" alt="Logo" class="img-thumbnail" width="65">
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
                    <li class="nav-item">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center">Selamat Datang Peserta Magang DPRD Kota Bandung</h1>

        <!-- Buttons for QR Code Actions -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="scan_absen.php" class="btn btn-primary">Scan Absensi QR CODE</a>
        </div>

        <!-- Visitor Statistics Section -->
        <!-- <section class="statistics-section mt-5"> -->
            <h2>Sosial Media :</h2>
            <div class="footer-social">
                <a href="https://www.instagram.com/bdg.set.dprd/" class="fab fa-instagram">SETWAN DPRD Kota Bandung</a>
                <a href="https://www.facebook.com/SetwanKotaBdg/" class="fab fa-facebook"> SETWAN DPRD Kota Bandung</a>
                <a href="https://x.com/dprdkotabandung" class="fab fa-twitter">DPRD Kota Bandung</a>
                <a href="https://www.youtube.com/@DPRDKotaBandungJuara" class="fab fa-youtube">DPRD Kota Bandung</a>
            </div> 

        <!-- <section class="statistics-section mt-5"> -->
            <!-- <h3>Hak Cipta dibuat oleh:</h3>
            <footer class>
        <div class="d-flex justify-content-center gap-5">
            <a href="https://www.stmik-mi.ac.id/" target="_blank">
                <img src="qrcodes/image/image1.jpg" alt="Nama Pengarang 1" class="img-thumbnail" width="60">
            </a>
            <a href="https://ars.ac.id/" target="_blank">
                <img src="qrcodes/image/image2.jpg" alt="Nama Pengarang 2" class="img-thumbnail" width="60">
            </a>
            <a href="https://www.unikom.ac.id/" target="_blank">
                <img src="qrcodes/image/image3.jpg" alt="Nama Pengarang 3" class="img-thumbnail" width="60">
            </a>
        </div> -->
        </footer>
        <!-- </section> -->
    </div>

<style>
    .statistics-section {
            width: 100%; /* Set section width to 100% */
            padding: 20px; /* Add some padding for aesthetics (optional) */
        
        }

        .footer-social {
            display: flex; /* Use flexbox for the social links */
            justify-content: center; /* Center the items */
            gap: 15px; /* Space between the social links */
        }

        footer {
            margin-top: 20px; /* Space above the footer */
        }
</style>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- dashboard.php -->
<?php
// Jika user sudah login, script di bawah ini akan dieksekusi
include 'footer_protected.php';
function decrypt_footer($encrypted) {
    // Kunci dekripsi sederhana
    return base64_decode($encrypted);
}

// Bagian kode yang di-encrypt
$encrypted_footer = 'PGgzPk...'; // ini adalah base64 dari footer

echo decrypt_footer($encrypted_footer);
?>

</body>
</html>
