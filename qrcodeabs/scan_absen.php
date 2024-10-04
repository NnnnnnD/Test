<?php
session_start();
require 'config.php'; // Ensure this file has a proper PDO connection

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle QR code scan results
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['scan_data'], $_POST['absen_type'])) {
    $scanData = $_POST['scan_data'];
    $absenType = $_POST['absen_type'];

    // Check QR Code format
    $dataLines = explode("\n", $scanData);
    if (count($dataLines) < 3) {
        $message = "Data QR Code tidak valid.";
    } else {
        $nama = trim(str_replace("Nama:", "", $dataLines[0]));
        $jurusan = trim(str_replace("Jurusan:", "", $dataLines[1]));
        $kampus = trim(str_replace("Sekolah/Universitas:", "", $dataLines[2]));

        // Get user_id from session
        $user_id = $_SESSION['user_id'];

        // Validate absen_type
        if (!in_array($absenType, ['masuk', 'pulang'])) {
            $message = "Jenis absen tidak valid.";
        } else {
            // Query to get data placement from qr_codes table
            $stmt = $pdo->prepare("SELECT penempatan FROM qr_codes WHERE nama = ? AND jurusan = ? AND kampus = ?");
            $stmt->execute([$nama, $jurusan, $kampus]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $penempatan = $result['penempatan'];

                // Insert data into 'absensi' table
                $stmt = $pdo->prepare("INSERT INTO absensi (user_id, nama, jurusan, kampus, penempatan, absen_type) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt->execute([$user_id, $nama, $jurusan, $kampus, $penempatan, $absenType])) {

                    // Write to CSV with tab delimiter
                    $csvFile = 'absensi_peserta.csv';
                    $csvExists = file_exists($csvFile);

                    $fp = fopen($csvFile, 'a');
                    if (!$csvExists) {
                        fwrite($fp, "Nama\tJurusan\tSekolah/Universitas\tPenempatan\tJenis Absen\tWaktu\n");
                    }
                    $dataLine = "$nama\t$jurusan\t$kampus\t$penempatan\t" . ucfirst($absenType) . "\t" . date('Y-m-d H:i:s') . "\n";
                    fwrite($fp, $dataLine);
                    fclose($fp);

                    // Set flash message and redirect
                    $_SESSION['flash_message'] = "Absen $absenType berhasil direkam.";
                    header("Location: scan_absen.php");
                    exit();
                } else {
                    $message = "Gagal menyimpan data absen.";
                }
            } else {
                $message = "Data QR Code tidak ditemukan di database.";
            }
        }
    }
}

// Handle CSV export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require 'config.php';

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Get user_id from session
    $user_id = $_SESSION['user_id'];

    // Prepare query to get attendance data by user_id
    $stmt = $pdo->prepare("SELECT a.nama, a.jurusan, a.kampus, a.penempatan, a.absen_type, a.waktu 
                            FROM absensi a 
                            JOIN users u ON a.nama = u.name 
                            WHERE u.id = :user_id 
                            ORDER BY a.waktu DESC");
    $stmt->execute([':user_id' => $user_id]);
    $absensi = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if attendance data is available
    if (empty($absensi)) {
        die('Tidak ada data untuk diekspor.');
    }

    // Set header for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=absensi_' . date('Y-m-d_H-i-s') . '.csv');

    // Open output for writing
    $output = fopen('php://output', 'w');

    // Write CSV header
    fputcsv($output, ['Nama', 'Jurusan', 'Sekolah/Universitas', 'Penempatan', 'Jenis Absen', 'Waktu']);

    // Write attendance data to CSV
    foreach ($absensi as $absen) {
        fputcsv($output, [
            $absen['nama'],
            $absen['jurusan'],
            $absen['kampus'],
            $absen['penempatan'],
            ucfirst($absen['absen_type']),
            $absen['waktu']
        ]);
    }

    fclose($output);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Absensi QR CODE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('qrcodes/image/bandungjuara.jpg');
            background-size: 130%;
            background-position: center;
            background-repeat: no-repeat;
        }
        #video {
            width: 100%;
            max-width: 600px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .hidden {
            display: none;
        }
    </style>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Scan Absensi QR CODE</h1>

        <!-- Flash message -->
        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($_SESSION['flash_message']) ?>
            </div>
            <?php unset($_SESSION['flash_message']); ?>
        <?php elseif (isset($message)): ?>
            <div class="alert alert-danger text-center">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <!-- Absen Actions -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <button id="scanMasukBtn" class="btn btn-primary">Scan Absen Masuk</button>
            <button id="scanPulangBtn" class="btn btn-success">Scan Absen Pulang</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="scan_absen.php?export=csv" class="btn btn-warning">Export Daftar Hadir ke CSV</a>
        </div>

        <!-- Video Stream for Scanning -->
        <div class="d-flex justify-content-center">
            <video id="video" class="hidden" autoplay></video>
        </div>

        <!-- Form for Sending Scan Results -->
        <form id="scanForm" method="POST" class="hidden">
            <input type="hidden" name="scan_data" id="scanData">
            <input type="hidden" name="absen_type" id="absenType">
        </form>
    </div>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include zxing-js library -->
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        const video = document.getElementById('video');
        const scanForm = document.getElementById('scanForm');
        const scanDataInput = document.getElementById('scanData');
        const absenTypeInput = document.getElementById('absenType');

        async function startScanning() {
            const codeReader = new ZXing.BrowserQRCodeReader();
            try {
                // Request camera access
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
                video.srcObject = stream;

                // Wait for video metadata to be loaded
                await new Promise(resolve => video.onloadedmetadata = resolve);
                video.play();

                // Start scanning
                codeReader.decodeFromVideoElement(video).then(result => {
                    scanDataInput.value = result.text;
                    scanForm.submit();
                }).catch(err => {
                    console.error(err);
                    alert('Gagal membaca QR Code. Silakan coba lagi.');
                });
            } catch (err) {
                console.error(err);
                alert('Gagal mengakses kamera. Silakan periksa izin kamera.');
            }
        }

        // Handle Scan Button Clicks
        document.getElementById('scanMasukBtn').addEventListener('click', () => {
            absenTypeInput.value = 'masuk';
            video.classList.remove('hidden');
            scanForm.classList.remove('hidden');
            startScanning();
        });

        document.getElementById('scanPulangBtn').addEventListener('click', () => {
            absenTypeInput.value = 'pulang';
            video.classList.remove('hidden');
            scanForm.classList.remove('hidden');
            startScanning();
        });
    </script>
</body>
</html>
