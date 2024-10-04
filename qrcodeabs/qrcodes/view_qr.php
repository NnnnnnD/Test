<?php
$qrDirectory = 'qr_codes/';
$files = glob($qrDirectory . '*.png');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View QR Codes</title>
    <link rel="stylesheet" href="generate.css">
</head>
<body>
    <div class="menu">
        <a href="generate_qr.php">Home</a>
        <a href="view_qr.php">View QR Codes</a>
    </div>
    <div class="container">
        <h1>Daftar QR Code</h1>
        <?php if (count($files) > 0): ?>
            <?php foreach ($files as $file): ?>
                <div class="qr-image">
                    <img src="<?php echo $file; ?>" alt="QR Code">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada QR Code yang dibuat.</p>
        <?php endif; ?>
    </div>
</body>
</html>
