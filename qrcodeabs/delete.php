<?php
include 'config.php'; // Sertakan koneksi database

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Siapkan pernyataan SQL untuk mencegah SQL injection
    $stmt = $conn->prepare("DELETE FROM absensi WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Arahkan kembali ke dashboard
        header("Location: admin_dashboard.php");
    } else {
        echo "Error menghapus data: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID tidak tersedia.";
}

$conn->close();
?>
