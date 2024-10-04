<?php
include 'config.php'; // Include your database connection

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the current data of the record to populate the form
$sql = "SELECT * FROM absensi WHERE id = $id";
$result = $conn->query($sql);

// Check if the record exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Get the data for the record
} else {
    echo "Record not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data</h2>
        <form action="update_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kampus" class="form-label">Kampus</label>
                <input type="text" class="form-control" id="kampus" name="kampus" value="<?php echo $row['kampus']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penempatan" class="form-label">Penempatan</label>
                <input type="text" class="form-control" id="penempatan" name="penempatan" value="<?php echo $row['penempatan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="absen_type" class="form-label">Absen Type</label>
                <input type="text" class="form-control" id="absen_type" name="absen_type" value="<?php echo $row['absen_type']; ?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu Absen</label>
                <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $row['waktu']; ?>" readonly required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>