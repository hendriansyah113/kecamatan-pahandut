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
            color: #ff6347; /* Tomato color */
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

        @media only screen and (max-width: 768px) {
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
                width: 100%;
                text-align: center;
            }

            .menu-toggle {
                display: block;
                cursor: pointer;
            }
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

        .table th, .table td {
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
            background-color: #28a745; /* Green color */
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #218838; /* Darker green */
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
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="logo.gif" alt="Logo" class="logo-img">
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <img src="https://img.icons8.com/android/24/ffffff/menu.png"/>
        </div>
        <ul class="menu">
            <li><a href="halaman_admin.php">Beranda</a></li>
            <li><a href="pendidikan.php">SKTM Pendidikan</a></li>
            <li><a href="berobat.php">SKTM Berobat</a></li>
            <li><a href="bpjs.php">Arsip BPJS</a></li>
            <li><a href="skck.php">Arsip SKCK</a></li>
            <li><a href="umum.php">Arsip Umum</a></li>
            <li><a href="d_user.php">User</a></li>
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
            <div>
                <input type="text" id="searchInput" placeholder="Cari..." style="padding: 10px; font-size: 16px;">
                <button onclick="searchData()" style="padding: 10px; background: #28a745; color: white; border: none; cursor: pointer;"><i class="fas fa-search"></i></button>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    // Mengambil total jumlah data
                    $sql_count = "SELECT COUNT(*) AS total FROM sktm_pend";
                    if ($search) {
                        $sql_count .= " WHERE no_KK LIKE '%$search%' OR tanggal LIKE '%$search%' OR nama_ttl LIKE '%$search%' OR alamat LIKE '%$search%' OR ket LIKE '%$search%'";
                    }
                    $result_count = $conn->query($sql_count);
                    $total_data = $result_count->fetch_assoc()['total'];
                    $total_pages = ceil($total_data / $limit);

                    // Mengambil data dari database
                    $sql = "SELECT id, no_KK, tanggal, nama_ttl, alamat, ket FROM sktm_pend";
                    if ($search) {
                        $sql .= " WHERE no_KK LIKE '%$search%' OR tanggal LIKE '%$search%' OR nama_ttl LIKE '%$search%' OR alamat LIKE '%$search%' OR ket LIKE '%$search%'";
                    }
                    $sql .= " LIMIT $limit OFFSET $offset";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        $no = $offset + 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $no. "</td>
                                    <td>" . $row["no_KK"]. "</td>
                                    <td>" . $row["tanggal"]. "</td>
                                    <td>" . $row["nama_ttl"]. "</td>
                                    <td>" . $row["alamat"]. "</td>
                                    <td>" . $row["ket"]. "</td>
                                    <td>
                                       <a href='edit_pendidikan.php?id=" . $row["id"] . "' class='btn-add'>Edit</a>
                                       <a href='upload_foto.php?id={$row['id']}' class='btn-add'>Upload</a>
                                       <a href='view_sktm.php?id={$row['id']}' class='btn-add'>SKTM</a>
                                    </td>
                                  </tr>";
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
                <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>" class="<?php echo $page == $i ? 'active' : ''; ?>"><?php echo $i; ?></a>
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