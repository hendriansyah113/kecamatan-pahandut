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
    $sql = "SELECT * FROM arsip_bpjs WHERE id_arsip_bpjs = $id";
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
$target_dir_foto = "uploads/foto/";

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

// Proses upload file Foto
if (!empty($_FILES['foto']['name'])) {
    $foto_name = $_FILES['foto']['name'];
    $foto_file_type = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

    if (!in_array($foto_file_type, $allowed_types)) {
        echo "<script>alert('Tipe file Foto tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
        exit;
    }

    $foto_new_name = "foto_" . time() . "_" . basename($foto_name);
    $foto_target = $target_dir_foto . $foto_new_name;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_target)) {
        $foto_path = $foto_new_name;
    } else {
        echo "<script>alert('Gagal mengupload file Foto.'); window.history.back();</script>";
        exit;
    }
} else {
    $foto_path = $row['foto_path'];
}

// Query untuk memperbarui database
$sql = "UPDATE arsip_bpjs SET ktp_path = ?, foto_path = ? WHERE id_arsip_bpjs = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Kesalahan pada query SQL: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("ssi", $ktp_path, $foto_path, $id);

if ($stmt->execute()) {
    echo "<script>alert('File berhasil diupload atau diperbarui.'); window.location.href='upload_foto_bpjs.php?id=$id';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . addslashes($stmt->error) . "'); window.location.href='upload_foto_bpjs.php?id=$id';</script>";
}

$stmt->close();
$conn->close();
