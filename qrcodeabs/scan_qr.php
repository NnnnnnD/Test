    <?php
    session_start();
    require 'config.php'; // Koneksi database menggunakan PDO
    require 'phpqrcode/qrlib.php'; // Library QR Code

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $nama = trim($_POST['nama']);
        $jurusan = trim($_POST['jurusan']);
        $kampus = trim($_POST['kampus']);
        $penempatan = trim($_POST['penempatan']);
        $user_id = $_SESSION['user_id'];

        // Validasi input
        if (!empty($nama) && !empty($jurusan) && !empty($kampus) && !empty($penempatan)) {
            // Menangani unggahan gambar
            $uploadedImage = null; // Inisialisasi variabel
            if (isset($_FILES['user_image_path']) && $_FILES['user_image_path']['error'] == UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['user_image_path']['tmp_name'];
                $imageName = $_FILES['user_image_path']['name'];
                $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
                $allowedExtensions = ['jpg', 'jpeg', 'png'];

                // Validasi ekstensi gambar
                if (in_array(strtolower($imageExtension), $allowedExtensions)) {
                    // Buat nama unik untuk gambar
                    $newImageName = uniqid('', true) . '.' . $imageExtension;
                    $uploadPath = 'uploads/' . $newImageName; // Tentukan direktori unggahan Anda

                    // Pindahkan gambar yang diunggah ke direktori yang diinginkan
                    if (move_uploaded_file($imageTmpPath, $uploadPath)) {
                        $uploadedImage = $uploadPath; // Simpan jalur gambar yang diunggah
                    } else {
                        $error = "Gagal mengunggah gambar.";
                    }
                } else {
                    $error = "Format gambar tidak valid. Harus PNG atau JPG.";
                }
            }

            // Generate QR Code
            $dataQR = "Nama: $nama\nJurusan: $jurusan\nSekolah/Universitas: $kampus\nPenempatan: $penempatan";
            $qrDirectory = 'qrcodes/';

            // Buat direktori jika belum ada
            if (!is_dir($qrDirectory)) {
                mkdir($qrDirectory, 0755, true);
            }

            // Nama file unik untuk QR code
            $qrFileName = $qrDirectory . md5($dataQR . time()) . '.png';
            QRcode::png($dataQR, $qrFileName); // Generate QR code

            // Simpan data ke database
            $stmt = $pdo->prepare("INSERT INTO qr_codes (user_id, nama, jurusan, kampus, penempatan, user_image_path, qr_code_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $nama, $jurusan, $kampus, $penempatan, $uploadedImage, $qrFileName]); // Simpan qr_code_path yang sudah dihasilkan

            // Dapatkan ID terakhir yang di-insert
            $_SESSION['qr_code_id'] = $pdo->lastInsertId();

            // Redirect ke halaman hasil QR
            header("Location: hasil_qr.php");
            exit();
        } else {
            $error = "Silakan isi semua kolom.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Isi Data QR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="scan_qr.css">
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
                            <a class="nav-link active" aria-current="page" href="scan_qr.php">Scan QR</a>
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
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h1 class="text-center">Isi Data Anda</h1>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted">Masukkan data Anda untuk menghasilkan QR code.</p>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                    <?php endif; ?>

                    <!-- Form Input Data -->
                    <form action="scan_qr.php" method="POST" class="mt-4" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= isset($jurusan) ? htmlspecialchars($jurusan) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="kampus" class="form-label">Sekolah/Universitas</label>
                            <input type="text" class="form-control" id="kampus" name="kampus" required value="<?= isset($kampus) ? htmlspecialchars($kampus) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="penempatan" class="form-label">Penempatan</label>
                            <input type="text" class="form-control" id="penempatan" name="penempatan" required value="<?= isset($penempatan) ? htmlspecialchars($penempatan) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="user_image_path" class="form-label">Unggah Foto (PNG/JPG)</label>
                            <input type="file" class="form-control" id="user_image_path" name="user_image_path" accept=".png, .jpg, .jpeg">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit dan Lihat QR Code</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="admin_dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
