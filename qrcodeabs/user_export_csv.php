<?php
// Handle Ekspor ke CSV
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    session_start(); // Pastikan sesi dimulai untuk akses user_id
    require 'config.php'; // Pastikan ini terhubung ke database

    // Cek apakah user sudah login
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Ambil user_id dari sesi
    $user_id = $_SESSION['user_id'];

    // Siapkan query untuk mengambil data absen berdasarkan user_id
    $stmt = $pdo->prepare("SELECT a.nama, a.jurusan, a.kampus, a.penempatan, a.absen_type, a.waktu 
                            FROM absensi a 
                            JOIN users u ON a.nama = u.nama 
                            WHERE u.id = :user_id 
                            ORDER BY a.waktu DESC");
    $stmt->execute([':user_id' => $user_id]);
    $absensi = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set header untuk mengunduh file CSV
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=absensi_' . date('Y-m-d_H-i-s') . '.csv');

    // Buka output untuk ditulis
    $output = fopen('php://output', 'w');

    // Tulis header CSV
    fputcsv($output, ['Nama', 'Jurusan', 'Sekolah/Universitas', 'Penempatan', 'Jenis Absen', 'Waktu']);

    // Tulis data absen ke CSV
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