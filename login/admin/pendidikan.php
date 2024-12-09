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
            margin: 100px auto 50px;
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

    <div class="container">
        <h2>Tabel Data SKTM Pendidikan</h2>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <a href="data_pendidikan.php" class="btn-add">Tambah Data</a>
                <a href="print_pdf.php" class="btn-add">Cetak PDF</a>
            </div>
            <div class="search">
                <input type="text" id="searchInput" placeholder="Cari..." class="search" style="padding: 10px;">
                <button onclick="searchData()" class="icon"
                    style="padding: 16px; background: #28a745; color: white; border: none; cursor: pointer;"><i
                        class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No KK</th>
                        <th>Tanggal</th>
                        <th>Nama/TTL</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Verifikasi</th>
                        <th>Verifikator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $id_admin = $_SESSION['id_admin'];
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

                    // Mendapatkan halaman saat ini dan batas data per halaman
                    $limit = 10; // Batas data per halaman
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    // Mengambil nilai pencarian jika ada
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    $sql_count = "SELECT COUNT(*) AS total 
              FROM sktm_pend ";

                    if ($search) {
                        $sql_count .= " WHERE no_KK LIKE '%$search%' OR tanggal LIKE '%$search%' OR nama_ttl LIKE '%$search%' OR alamat LIKE '%$search%' OR ket LIKE '%$search%'";
                    }

                    $result_count = $conn->query($sql_count);
                    $row_count = $result_count->fetch_assoc();
                    $total_data = $row_count['total']; // Ambil nilai dari 'total' yang dihitung oleh COUNT(*)

                    $total_pages = ceil($total_data / $limit); // Hitung jumlah halaman


                    $sql = "SELECT * FROM sktm_pend";
                    if ($search) {
                        $sql .= " WHERE no_KK LIKE '%$search%' OR tanggal LIKE '%$search%' OR nama_ttl LIKE '%$search%' OR alamat LIKE '%$search%' OR ket LIKE '%$search%'";
                    }
                    $sql .= " LIMIT $limit OFFSET $offset";
                    $result = $conn->query($sql);

                    if (isset($_GET['cancel_verifikasi_id'])) {
                        $cancel_id = $_GET['cancel_verifikasi_id'];
                        $sql_cancel_verifikasi = "UPDATE sktm_pend SET verifikasi = '', nama_verifikator = '' WHERE id_sktm_pendidikan = $cancel_id";
                        if ($conn->query($sql_cancel_verifikasi) === TRUE) {
                            echo "<script>
                                    alert('Verifikasi dibatalkan.');
                                    window.location.href = 'pendidikan.php';
                                  </script>";
                        } else {
                            echo "<script>
                                    alert('Gagal membatalkan verifikasi.');
                                    window.location.href = 'pendidikan.php';
                                  </script>";
                        }
                    }

                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        $no = $offset + 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $no . "</td>
                                    <td>" . $row["no_KK"] . "</td>
                                    <td>" . $row["tanggal"] . "</td>
                                    <td>" . $row["nama_ttl"] . "</td>
                                    <td>" . $row["alamat"] . "</td>
                                    <td>" . $row["ket"] . "</td>
                                       <td>" . (($row["verifikasi"] === null || $row["verifikasi"] === '') ? 'Belum Terverifikasi' : $row["verifikasi"]) . "</td>
                                       <td>" . $row["nama_verifikator"] . "</td>
                                    <td>
                    <a href='edit_pendidikan.php?id=" . $row["id_sktm_pendidikan"] . "' class='btn-add' style='margin-right: 5px;'>Edit</a>
                    <a href='upload_foto.php?id=" . $row["id_sktm_pendidikan"] . "' class='btn-add' style='margin-right: 5px;'>Upload</a>
                    <a href='view_sktm.php?id=" . $row["id_sktm_pendidikan"] . "' class='btn-add' style='margin-right: 5px;'>SKTM</a>";

                            // Cek status verifikasi untuk menampilkan tombol 'Verifikasi' atau status 'Terverifikasi'
                            if ($row['verifikasi'] == 'Terverifikasi') {
                                echo "<a href='?cancel_verifikasi_id=" . $row["id_sktm_pendidikan"] . "' class='btn-add' style='margin-left: 5px;'>Cancel</a>";
                            } else {
                                echo "<a href='verifikasi.php?id=" . $row["id_sktm_pendidikan"] . "&tabel=sktm_pend' class='btn-add' style='margin-left: 5px;'>Verifikasi</a>";
                            }

                            echo "</td></tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"
                    class="<?php echo $page == $i ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
            <?php endif; ?>
        </div>
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