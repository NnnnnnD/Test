<?php
include 'config.php'; // Include your database connection

// Set headers to force download the CSV file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=daftar_hadir.csv');

// Open the output stream
$output = fopen('php://output', 'w');

// Write the column headers
fputcsv($output, array('No', 'Nama', 'Jurusan', 'Kampus', 'Penempatan', 'Absen Type', 'Waktu Absen'));

// Fetch data from the 'absensi' table
$sql = "SELECT nama, jurusan, kampus, penempatan, absen_type, waktu FROM absensi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1;
    // Loop through each row of data and output as CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, array(
            $no++, 
            $row['nama'], 
            $row['jurusan'], 
            $row['kampus'], 
            $row['penempatan'], 
            $row['absen_type'], 
            $row['waktu']
        ));
    }
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();

// Close the output stream
fclose($output);
?>