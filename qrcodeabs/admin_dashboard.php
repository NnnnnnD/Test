<?php
session_start(); // Mulai sesi

// Pengecekan apakah user sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit(); // Pastikan script berhenti agar kode di bawah tidak dieksekusi
}

// Jika user sudah login, script di bawah ini akan dieksekusi
include 'config.php'; 

// Fetch data from the 'absensi' table
$sql = "SELECT id, nama, jurusan, kampus, penempatan, absen_type, waktu FROM absensi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - QR Code System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         body {
            background-image: url('qrcodes/image/batik.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .navbar-brand img {
            margin-right: 10px;
            width: 40px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .table thead th {
            background-color: #0d6efd;
            color: white;
        }
        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="admin_dashboard.php">
                <img src="qrcodes/image/image4.jpg" alt="Logo">
                MANGSET
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger ms-3"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Selamat Datang Admin!</h2>
            <h3>Dashboard Admin</h3>
            <div>
                <a href="admin_export_csv.php" class="btn btn-warning btn-sm"><i class="fas fa-file-csv"></i> Export CSV</a>
                <a href="scan_qr.php" class="btn btn-success btn-sm"><i class="fas fa-qrcode"></i> Buat Absen QR CODE</a>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card">
            <div class="card-body">
                <table id="absensiTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Kampus</th>
                            <th>Penempatan</th>
                            <th>Absen</th>
                            <th>Waktu Absen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $no = 1;
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['kampus']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['penempatan']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['absen_type']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['waktu']) . "</td>";
                                echo "<td>
                                    <a href='update_absensi.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm btn-custom'><i class='fas fa-edit'></i> Update</a>
                                    <button class='btn btn-danger btn-sm btn-custom delete-button' data-id='" . $row['id'] . "'><i class='fas fa-trash-alt'></i> Delete</button>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
                        }
                        // Close the database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="deleteForm" method="POST" action="delete.php">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
                <input type="hidden" name="id" id="deleteId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#absensiTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });

            // Handle delete button click
            $('.delete-button').on('click', function() {
                var id = $(this).data('id');
                $('#deleteId').val(id);
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
    </script>
</body>
</html>
