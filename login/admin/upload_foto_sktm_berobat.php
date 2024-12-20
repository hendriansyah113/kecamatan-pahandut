<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../index.php?pesan=belum_login");
    exit();
}

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kecamatan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data verifikator dari tabel login
$sql_verifikator = "SELECT id_admin, nama FROM login"; // Pastikan kolom nama sesuai dengan tabel Anda
$result_verifikator = $conn->query($sql_verifikator);

$verifikators = [];
if ($result_verifikator->num_rows > 0) {
    while ($row = $result_verifikator->fetch_assoc()) {
        $verifikators[] = $row;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Kecamatan Pahandut</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            background-color: #eef2f7;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        nav {
            width: 100%;
            background: linear-gradient(135deg, #2b5876, #4e4376);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            max-width: 80px;
            height: auto;
            margin-right: 15px;
        }

        .menu {
            display: flex;
            list-style: none;
        }

        .menu a {
            text-decoration: none;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            position: relative;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #ff6347;
            /* Tomato color */
        }

        .menu a:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: #ff6347;
            transition: width 0.4s, left 0.4s;
        }

        .menu a:hover:before {
            width: 100%;
            left: 0;
        }

        .menu-toggle {
            display: none;
        }

        .logout {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: indianred;
            transition: background 0.4s;
        }

        .logout:hover {
            background: transparent;
            border: 1px solid indianred;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto 50px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .container2 {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background: black;
        }

        .table tr:hover {
            background: #d3d3d3;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table thead tr {
            background: linear-gradient(135deg, #2b5876, #4e4376);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            /* Green color */
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #218838;
            /* Darker green */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-add:focus {
            outline: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination a {
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a.active {
            background-color: #28a745;
            color: white;
            border: 1px solid #28a745;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .search {
            font-size: 16px;
        }

        @media (min-width: 768px) {
            .container {
                width: auto !important;
                /* Mengganti width menjadi auto */
            }
        }

        @media only screen and (max-width: 1000px) {

            .container {
                width: none;
            }

            .menu {
                display: none;
                flex-direction: column;
                align-items: center;
                width: 100%;
                background: rgba(0, 0, 0, 0.8);
                position: absolute;
                top: 60px;
                left: 0;
                z-index: 1;
            }

            .menu.open {
                display: flex;
            }

            .menu a {
                padding: 10px 0;
                font-size: 50px;
                width: 100%;
                text-align: center;
            }

            .menu-toggle {
                display: block;
                cursor: pointer;
                position: fixed;
                top: 20px;
                /* Jarak dari atas layar */
                right: 100px;
                /* Jarak dari kiri layar */
                z-index: 1000;
                /* Pastikan berada di depan elemen lainnya */
            }

            /* Jika menggunakan ikon gambar atau font-awesome, atur ukuran di sini */
            .menu-toggle img {
                width: 300%;
                /* Sesuaikan lebar ikon */
                height: auto;

            }

            body {
                font-size: 18px;
            }

            h1 {
                font-size: 5em;
            }

            h2 {
                font-size: 3em;
            }

            p {
                font-size: 2em;
            }

            .btn-add {
                font-size: 30px;
            }

            table {
                font-size: 30px;
            }

            .pagination a {
                font-size: 30px;
            }

            .search {
                font-size: 30px;
            }
        }
    </style>
    <link rel="manifest" href="../../web.webmanifest" />
</head>

<body>
    <nav>
        <div class="logo">
            <img src="logo.gif" alt="Logo" class="logo-img">
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <img src="https://img.icons8.com/android/24/ffffff/menu.png" />
        </div>
        <ul class="menu">
            <li><a href="halaman_admin.php">Beranda</a></li>
            <li><a href="pendidikan.php">SKTM Pendidikan</a></li>
            <li><a href="berobat.php">SKTM Berobat</a></li>
            <li><a href="bpjs.php">Arsip BPJS</a></li>
            <li><a href="skck.php">Arsip SKCK</a></li>
            <li><a href="umum.php">Arsip Umum</a></li>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] === 'admin') : ?>
                <li><a href="d_user.php">User</a></li>
            <?php endif; ?>
            <li><a class="logout" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <div class="container">
        <?php

        // Mendapatkan ID dari URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id) {
            // Mengambil data dari database
            $sql = "
            SELECT * FROM sktm_berobat WHERE id_sktm_berobat = $id;
        ";

            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            }
        } else {
            die("ID tidak valid.");
        } ?>
        <h2>Data Upload Dokumen <?= $row['nama_ttl'] ?></h2>
        <form action="upload_foto_sktm_berobat_process.php?id=<?php echo htmlspecialchars($_GET['id']); ?>"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

            <div class=" form-group">
                <label for="kk">Upload KK :</label>
                <input type="file" name="kk" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                <div>
                    <?php
                    if (empty($row['kk_path'])) {
                        echo "<span class='text-danger'>Tidak ada dokumen</span>";
                    } else {
                        $kk_path = "uploads/kk/" . $row['kk_path'];
                        if (file_exists($kk_path)) {
                            echo "<a href='" . $kk_path . "' target='_blank'>Lihat Dokumen</a>";
                        } else {
                            echo "<span class='text-danger'>Tidak ada dokumen.</span>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class=" form-group">
                <label for="foto">Upload Foto Sakit (Opsional) :</label>
                <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                <div>
                    <?php
                    if (empty($row['foto_path'])) {
                        echo "<span class='text-danger'>Tidak ada dokumen</span>";
                    } else {
                        $foto_path = "uploads/foto/" . $row['foto_path'];
                        if (file_exists($foto_path)) {
                            echo "<a href='" . $foto_path . "' target='_blank'>Lihat Dokumen</a>";
                        } else {
                            echo "<span class='text-danger'>Tidak ada dokumen.</span>";
                        }
                    }
                    ?>
                </div>
            </div>
            <button type=" submit" class="btn btn-primary">Upload</button>
            <a href="berobat.php" class="btn-back">Kembali</a>
        </form>
    </div>
    <div class="container2">
        <h2>Verifikasi</h2>
        <form method="POST" action="verifikasi_berobat.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
            <div class="form-group">
                <label for="nama_verifikasi">Nama Verifikator:</label>
                <select class="form-control" name="nama_verifikasi" id="nama_verifikasi" required>
                    <option value="">-- Pilih Verifikator --</option>
                    <?php foreach ($verifikators as $verifikator): ?>
                        <option value="<?php echo htmlspecialchars($verifikator['nama']); ?>">
                            <?php echo htmlspecialchars($verifikator['nama']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </form>
    </div>
</body>

</html>