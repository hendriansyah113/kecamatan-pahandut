<!DOCTYPE html>

<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/Lambang_Kota_Palangka_Raya.png" type="image/x-icon">

  <title>PERMOHONAN SKCK</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="manifest" href="web.webmanifest" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg.jpg" alt="">
      </div>
    </div>

    <header class="header_section">
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.php">
              <span>
                KECAMATAN PAHANDUT
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Beranda <span
                      class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#"> Layanan</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- end header section -->

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_ttl = $_POST['nama_ttl'];
    $pendidikan = $_POST['pendidikan'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $kelurahan = NULL;
    $ktp = NULL;  // Inisialisasi ktp sebagai NULL
    $kk = NULL;  // Inisialisasi kk sebagai NULL

    $dirKTP = "login/admin/uploads/ktp/";
    $dirKK = "login/admin/uploads/kk/";
    $dirkelurahan = "login/admin/uploads/kelurahan/";

    function uploadFile($fileKey, $targetDir)
    {
      $fileName = uniqid() . "_" . basename($_FILES[$fileKey]['name']);
      $targetFilePath = $targetDir . $fileName;
      if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $targetFilePath)) {
        return $fileName; // Kembalikan nama file jika berhasil
      } else {
        die("<div class='alert alert-danger'>Gagal mengunggah file $fileKey!</div>");
      }
    }

    // Unggah file formulir, KK, dan KTP
    $kelurahan = uploadFile('kelurahan', $dirkelurahan);
    $kk = uploadFile('kk', $dirKK);
    $ktp = uploadFile('ktp', $dirKTP);

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "kecamatan");
    if ($conn->connect_error) {
      die("<div class='alert alert-danger'>Koneksi gagal: " . $conn->connect_error . "</div>");
    }

    // Menyimpan data ke database dengan prepared statement
    $sql = "INSERT INTO arsip_skck (nama_ttl, pendidikan, agama, alamat, keterangan, tanggal, kelurahan_path, ktp_path, kk_path )
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
      die("<div class='alert alert-danger'>Kesalahan dalam persiapan query: " . $conn->error . "</div>");
    }

    // Bind parameter
    $stmt->bind_param("sssssssss", $nama_ttl, $pendidikan, $agama, $alamat, $keterangan, $tanggal, $kelurahan, $ktp, $kk);

    // Eksekusi statement dan cek hasilnya
    if ($stmt->execute()) {
      echo "<div class='alert alert-success'>Data berhasil disimpan!</div>";
    } else {
      echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $stmt->error . "</div>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
  }
  ?>


  <!-- form section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Permohonan SKCK</h2>
      </div>
      <form action="" method="POST" enctype="multipart/form-data" class="form-container">

        <div class="form-group row">
          <label for="nama_ttl" class="col-sm-3 col-form-label">Nama/TTL <span
              class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama_ttl" name="nama_ttl"
              placeholder="Masukkan Nama dan TTL" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan <span
              class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="pendidikan" name="pendidikan"
              placeholder="Masukkan Pendidikan" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="agama" class="col-sm-3 col-form-label">Agama <span class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="agama" name="agama" placeholder="agama" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="alamat" class="col-sm-3 col-form-label">Alamat <span
              class="text-danger">*</span></label>
          <div class="col-sm-9">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3"
              required></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label for="keterangan" class="col-sm-3 col-form-label">Keterangan <span
              class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="keterangan" name="keterangan"
              placeholder="Masukkan Keterangan" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="tanggal" class="col-sm-3 col-form-label">Tanggal <span
              class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="kelurahan" class="col-sm-3 col-form-label">Surat dari Kelurahan <span
              class="text-danger">*</span>
            (JPG/PNG/JPEG/PDF)</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="kelurahan" name="kelurahan"
              accept=".jpg,.jpeg,.png,.pdf" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="kk" class="col-sm-3 col-form-label">Kartu Keluarga <span class="text-danger">*</span>
            (JPG/PNG/JPEG/PDF)</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="kk" name="kk" accept=".jpg,.jpeg,.png,.pdf"
              required>
          </div>
        </div>

        <div class="form-group row">
          <label for="ktp" class="col-sm-3 col-form-label">KTP <span class="text-danger">*</span>
            (JPG/PNG/JPEG/PDF)</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="ktp" name="ktp" accept=".jpg,.jpeg,.png,.pdf"
              required>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <!-- end form section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <img src="images/Lambang_Kota_Palangka_Raya.png" alt="" srcset="" style="width: 60%;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Kecamatan Pahandut
            </h5>
            <ul>
              <li>
                <a href="">
                  Kota Palangka Raya
                </a>
              </li>
              <li>
                <a href="">
                  Provinsi Kalimantan Tengah
                </a>
              </li>
              <li>
                <a href="">
                  Indonesia
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Kontak Kami
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Jl. Diponegoro No.19, Langkai, Kec. Jekan Raya, Kota Palangka Raya, Kalimantan
                Tengah 74874
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Telp : (0536) 3221784
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                kec-pahandut@palangkaraya.go.id
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <img src="images/Logo-Provinsi-Kalimantan-Tengah.png" alt="" srcset="" style="width: 50%;">
            <div class="social_box">
              <a href="https://web.facebook.com/kecamatan.pahandut/?_rdc=1&_rdr">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/kecamatan_pahandut_pky/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> Created By Najwa Putri</a>
    </p>
  </footer>
  <!-- footer section -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/app.js"></script>
</body>

</html>