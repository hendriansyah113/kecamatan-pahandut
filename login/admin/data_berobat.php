<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../index.php?pesan=belum_login");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Berobat - Kecamatan Pahandut</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
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

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .btn-submit {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #218838;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .btn-back:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
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

        @media (min-width: 768px) {
            .container {
                width: auto !important;
                max-width: 900px;
                /* Mengganti width menjadi auto */
            }
        }

        @media only screen and (max-width: 1000px) {

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

            label {
                font-size: 30px;
            }

            .btn-submit {
                font-size: 30px;
            }

            .btn-back {
                font-size: 30px;
            }
        }
    </style>
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

    <div class="container">
        <h2>Tambah Data SKTM Berobat</h2>
        <form action="data_berobat.php" method="post">
            <div class="form-group">
                <label for="no_KK">No KK</label>
                <input type="number" id="no_KK" name="no_KK" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="nama_ttl">Nama/TTL</label>
                <input type="text" id="nama_ttl" name="nama_ttl" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="ket">Keterangan</label>
                <input type="text" id="ket" name="ket" required>
            </div>
            <button type="submit" class="btn-submit">Simpan Data</button>
            <a href="berobat.php" class="btn-back">Kembali</a>
        </form>

        <?php
        // Memproses data setelah form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Mengambil data dari form
            $no_KK = $conn->real_escape_string($_POST["no_KK"]);
            $tanggal = $conn->real_escape_string($_POST["tanggal"]);
            $nama_ttl = $conn->real_escape_string($_POST["nama_ttl"]);
            $alamat = $conn->real_escape_string($_POST["alamat"]);
            $ket = $conn->real_escape_string($_POST["ket"]);

            // Menyimpan data ke database
            $sql = "INSERT INTO sktm_berobat (no_KK, tanggal, nama_ttl, alamat, ket) VALUES ('$no_KK', '$tanggal', '$nama_ttl', '$alamat', '$ket')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Data berhasil ditambahkan!');
                        window.location.href = 'berobat.php';
                      </script>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </div>
    <script>
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            menu.classList.toggle('open');
        }

        function searchData() {
            const searchInput = document.getElementById('searchInput').value;
            window.location.href = '?search=' + searchInput;
        }
    </script>
</body>

</html>