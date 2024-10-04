<?php
session_start();
require 'config.php'; // Koneksi database menggunakan PDO

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah ID QR code ada dalam session
if (!isset($_SESSION['qr_code_id'])) {
    header("Location: scan_qr.php"); // Redirect jika tidak ada ID
    exit();
}

// Ambil data QR Code berdasarkan ID
$qr_code_id = $_SESSION['qr_code_id'];
$stmt = $pdo->prepare("SELECT * FROM qr_codes WHERE id = ?");
$stmt->execute([$qr_code_id]);
$qrCodeData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$qrCodeData) {
    header("Location: scan_qr.php"); // Redirect jika data tidak ditemukan
    exit();
}

// Hapus ID dari session setelah mengambil data
unset($_SESSION['qr_code_id']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Absensi QR Code</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="scan_qr.php">Scan QR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hasil_qr.php">Hasil QR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <div class="container mt-5">
        <div class="card shadow" id="qr-code-section">
            <div class="card-header bg-success text-white">
                <h1 class="text-center">Hasil QR Code</h1>
            </div>
            <div class="card-body">
                <p class="text-center">Berikut adalah informasi yang diambil dari QR Code:</p>

                <ul class="list-group">
                    <li class="list-group-item"><strong>Nama:</strong> <?= htmlspecialchars($qrCodeData['nama']) ?></li>
                    <li class="list-group-item"><strong>Jurusan:</strong> <?= htmlspecialchars($qrCodeData['jurusan']) ?></li>
                    <li class="list-group-item"><strong>Sekolah/Universitas:</strong> <?= htmlspecialchars($qrCodeData['kampus']) ?></li>
                    <li class="list-group-item"><strong>Penempatan:</strong> <?= htmlspecialchars($qrCodeData['penempatan']) ?></li>
                    <li class="list-group-item"><strong>Gambar:</strong></li>
                    <li class="list-group-item">
                        <?php if (!empty($qrCodeData['user_image_path'])): ?>
                            <img src="<?= htmlspecialchars($qrCodeData['user_image_path']) ?>" alt="User Image" class="img-fluid" style="max-width: 200px;">
                        <?php else: ?>
                            Tidak ada gambar yang diunggah.
                        <?php endif; ?>
                    </li>
                    <li class="list-group-item"><strong>QR Code:</strong></li>
                    <li class="list-group-item">
                        <img id="qr-code-image" src="<?= htmlspecialchars($qrCodeData['qr_code_path']) ?>" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    </li>
                </ul>

                <div class="text-center mt-3">
                    <button onclick="printPage()" class="btn btn-secondary">Cetak</button>
                    <button onclick="downloadPDF()" class="btn btn-success">Unduh PDF</button>
                    <button onclick="downloadJPG()" class="btn btn-warning">Unduh JPG</button>
                    <a href="scan_qr.php" class="btn btn-secondary">Kembali ke Scan QR</a>
                    <a href="admin_dashboard.php" class="btn btn-primary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fitur Cetak
        function printPage() {
            window.print();
        }

        // Fitur Download PDF
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const qrCodeSection = document.getElementById('qr-code-section');

            html2canvas(qrCodeSection).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                doc.addImage(imgData, 'PNG', 10, 10, 190, 0); // Add image to PDF
                doc.save('qr_code_data.pdf'); // Save PDF
            });
        }

        // Fitur Download JPG
        function downloadJPG() {
            const qrCodeSection = document.getElementById('qr-code-section');
            html2canvas(qrCodeSection).then(canvas => {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/jpeg');
                link.download = 'qr_code_data.jpg'; // Save image as JPG
                link.click();
            });
        }
    </script>
</body>
</html>
