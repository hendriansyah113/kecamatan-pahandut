<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kecamatan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil path file dari dokumen_sktm
$sql = "SELECT sktm_path, kk_path, ktp_path FROM dokumen_sktm WHERE user_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sktm_path = $row['sktm_path'];
    $kk_path = $row['kk_path'];
    $ktp_path = $row['ktp_path'];
} else {
    echo "Dokumen tidak ditemukan.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View SKTM</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .document {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        .document img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .document p {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }
        .btn-back {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dokumen SKTM</h2>

        <div class="document">
            <p>Foto SKTM</p>
            <?php if (!empty($sktm_path)): ?>
                <img src="<?php echo $sktm_path; ?>" alt="Foto SKTM">
            <?php else: ?>
                <p>Tidak ada foto SKTM</p>
            <?php endif; ?>
        </div>

        <div class="document">
            <p>Foto KK</p>
            <?php if (!empty($kk_path)): ?>
                <img src="<?php echo $kk_path; ?>" alt="Foto KK">
            <?php else: ?>
                <p>Tidak ada foto KK</p>
            <?php endif; ?>
        </div>

        <div class="document">
            <p>Foto KTP</p>
            <?php if (!empty($ktp_path)): ?>
                <img src="<?php echo $ktp_path; ?>" alt="Foto KTP">
            <?php else: ?>
                <p>Tidak ada foto KTP</p>
            <?php endif; ?>
            <br>
            <a href="pendidikan.php" class="btn-back">Kembali</a>
        </div>
    </div>
</body>
</html>