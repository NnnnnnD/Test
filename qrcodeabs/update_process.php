<?php
include 'config.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $kampus = $_POST['kampus'];
    $penempatan = $_POST['penempatan'];
    $absen_type = $_POST['absen_type'];
    $waktu = $_POST['waktu'];

    // Update the data in the 'absensi' table
    $sql = "UPDATE absensi SET 
                nama='$nama', 
                jurusan='$jurusan', 
                kampus='$kampus', 
                penempatan='$penempatan', 
                absen_type='$absen_type', 
                waktu='$waktu' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: admin_dashboard.php"); // Redirect back to the dashboard
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>