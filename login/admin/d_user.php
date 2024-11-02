<!DOCTYPE html>
<html>
<head>
    <title>Kecamatan Pahandut</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            background-color: #f4f4f4;
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

        h2{
          font-family: times new roman;
          text-align: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
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
  <br>
  <h2>Data User</h2>
  <br>
  <table border="1">
    <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
    </tr>

  <?php
  $servername = "localhost"; // Ganti dengan nama server database Anda
  $username = "root"; // Ganti dengan username database Anda
  $password = ""; // Ganti dengan password database Anda
  $dbname = "kecamatan"; // Ganti dengan nama database Anda

  // Buat koneksi
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Periksa koneksi
  if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "SELECT id, nama, username, MD5(password) AS password, level FROM login";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Menampilkan setiap baris data
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td><td>" . $row["username"]. "</td><td>" . $row["password"]. "</td><td>" . $row["level"]. "</td></tr>";
        }
      } else {
        echo "0 results";
      }
  $conn->close();
  ?>
  </table>
<script>
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('open');
    }
</script>
</body>
</html>