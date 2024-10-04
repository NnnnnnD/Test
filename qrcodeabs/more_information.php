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
    <title>More Information - QR Code System</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="more_information.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            margin-right: 10px;
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
                        <a class="nav-link active" aria-current="page" href="more_information.php">Seputar Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Seputar Informasi</h1>

        <!-- Seksi FAQ -->
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" 
                        aria-expanded="true" aria-controls="faq1">
                        Apa itu MANGSET
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                    MANGSET adalah singkatan dari Magang SETWAN(Sekretariat Dewan).
                    </div>
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" 
                        aria-expanded="false" aria-controls="faq2">
                        Bagaimana cara menggunakan fitur Scan Absensi?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Untuk menggunakan fitur Scan Absensi, klik tombol "Scan Absensi QR CODE" di dashboard, pilih jenis absensi (masuk atau pulang), lalu arahkan kamera perangkat Anda ke QR Code yang telah dibuat.
                    </div>
                </div>
            </div>
            <!-- FAQ 3 -->
            <!-- <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" 
                        aria-expanded="false" aria-controls="faq3">
                        Bagaimana cara membuat QR Code absensi?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Untuk membuat QR Code absensi, klik tombol "Buat Absen QR CODE" di dashboard, isi informasi yang diperlukan seperti nama, jurusan, dan kampus, lalu klik tombol "Buat QR Code" untuk menghasilkan QR Code yang dapat digunakan untuk absensi.
                    </div>
                </div>
            </div> -->
            <!-- Tambahkan lebih banyak FAQ sesuai kebutuhan -->
        </div>

        <!-- Seksi Panduan Penggunaan -->
        <div class="mt-5">
            <h3>Panduan Penggunaan</h3>
            <p>Berikut adalah langkah-langkah untuk menggunakan aplikasi QR Code System:</p>
            <ol>
                <li>Login menggunakan akun Anda di halaman login.</li>
                <li>Di dashboard, pilih antara "Scan Absensi QR CODE".</li>
                <li>Untuk membuat QR Code, Mintalah kepada Admin untuk dibuatkan Barcode sesuai Data pribadi.</li>
                <li>Untuk melakukan absensi, pilih jenis absensi (masuk atau pulang) dan pindai QR Code yang telah dibuat.</li>
                <li>Data absensi akan secara otomatis direkam dan dapat diekspor ke format CSV.</li>
            </ol>
        </div>

        <!-- Seksi Kebijakan Privasi -->
        <div class="mt-5">
            <h3>Kebijakan Privasi</h3>
            <p>Kami menghargai privasi Anda. Semua data yang dikumpulkan melalui aplikasi ini akan disimpan dengan aman dan hanya digunakan untuk keperluan absensi dan manajemen.</p>
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
