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

// Mendapatkan ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    // Mengambil data dari database
    $sql = "SELECT * FROM arsip_skck WHERE id_arsip_skck = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("ID tidak valid.");
    }
} else {
    die("ID tidak valid.");
}

// Direktori target untuk upload file
$target_dir_ktp = "uploads/ktp/";
$target_dir_kelurahan = "uploads/kelurahan/";
$target_dir_kk = "uploads/kk/";

// Validasi tipe file
$allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

// Proses upload file KTP
if (!empty($_FILES['ktp']['name'])) {
    $ktp_name = $_FILES['ktp']['name'];
    $ktp_file_type = strtolower(pathinfo($ktp_name, PATHINFO_EXTENSION));

    if (!in_array($ktp_file_type, $allowed_types)) {
        echo "<script>alert('Tipe file KTP tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
        exit;
    }

    $ktp_new_name = "ktp_" . time() . "_" . basename($ktp_name);
    $ktp_target = $target_dir_ktp . $ktp_new_name;

    if (move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp_target)) {
        $ktp_path = $ktp_new_name;
    } else {
        echo "<script>alert('Gagal mengupload file KTP.'); window.history.back();</script>";
        exit;
    }
} else {
    $ktp_path = $row['ktp_path'];
}

// Proses upload file Kelurahan
if (!empty($_FILES['kelurahan']['name'])) {
    $kelurahan_name = $_FILES['kelurahan']['name'];
    $kelurahan_file_type = strtolower(pathinfo($kelurahan_name, PATHINFO_EXTENSION));

    if (!in_array($kelurahan_file_type, $allowed_types)) {
        echo "<script>alert('Tipe file Kelurahan tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
        exit;
    }

    $kelurahan_new_name = "kelurahan_" . time() . "_" . basename($kelurahan_name);
    $kelurahan_target = $target_dir_kelurahan . $kelurahan_new_name;

    if (move_uploaded_file($_FILES['kelurahan']['tmp_name'], $kelurahan_target)) {
        $kelurahan_path = $kelurahan_new_name;
    } else {
        echo "<script>alert('Gagal mengupload file Kelurahan.'); window.history.back();</script>";
        exit;
    }
} else {
    $kelurahan_path = $row['kelurahan_path'];
}

// Proses upload file KK
if (!empty($_FILES['kk']['name'])) {
    $kk_name = $_FILES['kk']['name'];
    $kk_file_type = strtolower(pathinfo($kk_name, PATHINFO_EXTENSION));

    if (!in_array($kk_file_type, $allowed_types)) {
        echo "<script>alert('Tipe file KK tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
        exit;
    }

    $kk_new_name = "kk_" . time() . "_" . basename($kk_name);
    $kk_target = $target_dir_kk . $kk_new_name;

    if (move_uploaded_file($_FILES['kk']['tmp_name'], $kk_target)) {
        $kk_path = $kk_new_name;
    } else {
        echo "<script>alert('Gagal mengupload file KK.'); window.history.back();</script>";
        exit;
    }
} else {
    $kk_path = $row['kk_path'];
}

// Update database dengan path file yang baru atau yang lama jika tidak diupdate
$sql_update = "UPDATE arsip_skck SET ktp_path = '$ktp_path', kelurahan_path = '$kelurahan_path', kk_path = '$kk_path' WHERE id_arsip_skck = $id";

if ($conn->query($sql_update) === TRUE) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href='upload_foto_skck.php?id=$id';</script>";
} else {
    echo "<script>alert('Gagal mengupdate data.'); window.location.href='upload_foto_skck.php?id=$id';</script>";
}

$conn->close();
