<?php
// Cek apakah pengguna sudah login dan apakah levelnya adalah admin
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin') {
    // Jika bukan admin, arahkan ke halaman beranda
    header("Location: halaman_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data User - Kecamatan Pahandut</title>
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

        .btn-submit,
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-submit {
            background-color: #28a745;
        }

        .btn-submit:hover {
            background-color: #218838;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-back {
            background-color: #007bff;
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

        /* Styling untuk elemen select */
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
            color: #333;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
            cursor: pointer;
        }

        /* Tambahkan ikon panah ke select */
        .form-group select {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            padding-right: 30px;
        }

        /* Hover effect */
        .form-group select:hover {
            border-color: #007bff;
            background-color: #e9ecef;
        }

        /* Focus effect */
        .form-group select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="logo.gif" alt="Logo" class="logo-img">
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
        <h2>Edit Data User</h2>
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

        // Mendapatkan ID dari URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($id) {
            // Mengambil data dari database
            $sql = "SELECT * FROM login WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            } else {
                die("Data tidak ditemukan.");
            }
        } else {
            die("ID tidak valid.");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $nama = $conn->real_escape_string($_POST["nama"]);
            $username = $conn->real_escape_string($_POST["username"]);
            $level = $conn->real_escape_string($_POST["level"]);
            $password = $conn->real_escape_string($_POST["password"]);
            // Enkripsi kata sandi
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Mengupdate data di database
            $sql = "UPDATE login SET nama='$nama', username='$username', level='$level', password='$hashedPassword' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Data berhasil diupdate!');
                        window.location.href = 'd_user.php';
                      </script>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>

        <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password">Level</label>
                <select name="level" id="level">
                    <option value="admin" <?php if ($row['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="pegawai" <?php if ($row['level'] == 'pegawai') echo 'selected'; ?>>Pegawai</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Update Data</button>
            <a href="d_user.php" class="btn-back">Kembali</a>
        </form>
    </div>
</body>

</html>