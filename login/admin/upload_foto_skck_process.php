<?php
session_start();

// Konfigurasi database
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

if ($id <= 0) {
    echo "ID tidak valid.";
    exit;
}

// Direktori target untuk upload
$target_dir_kelurahan = "uploads/kelurahan/";
$target_dir_ktp = "uploads/ktp/";
$target_dir_kk = "uploads/kk/";

// Validasi dan upload file KTP
if (empty($_FILES['ktp']['tmp_name'])) {
    echo "<script>alert('File KTP wajib diunggah.'); window.history.back();</script>";
    exit;
}

if (empty($_FILES['kelurahan']['tmp_name'])) {
    echo "<script>alert('File kelurahan wajib diunggah.'); window.history.back();</script>";
    exit;
}

if (empty($_FILES['kk']['tmp_name'])) {
    echo "<script>alert('File KK wajib diunggah.'); window.history.back();</script>";
    exit;
}

// Validasi tipe file
$allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

$ktp_name = $_FILES['ktp']['name'];
$ktp_file_type = strtolower(pathinfo($ktp_name, PATHINFO_EXTENSION));

$kelurahan_name = $_FILES['kelurahan']['name'];
$kelurahan_file_type = strtolower(pathinfo($kelurahan_name, PATHINFO_EXTENSION));

$kk_name = $_FILES['kk']['name'];
$kk_file_type = strtolower(pathinfo($kk_name, PATHINFO_EXTENSION));

if (!in_array($ktp_file_type, $allowed_types)) {
    echo "<script>alert('Tipe file KTP tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
    exit;
}

if (!in_array($kelurahan_file_type, $allowed_types)) {
    echo "<script>alert('Tipe file kelurahan tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
    exit;
}

if (!in_array($kk_file_type, $allowed_types)) {
    echo "<script>alert('Tipe file KK tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
    exit;
}

// Proses upload file
$ktp_new_name = "ktp_" . time() . "_" . basename($ktp_name);
$ktp_target = $target_dir_ktp . $ktp_new_name;

$kelurahan_new_name = "formulir_" . time() . "_" . basename($kelurahan_name);
$kelurahan_target = $target_dir_kelurahan . $kelurahan_new_name;

$kk_new_name = "kk_" . time() . "_" . basename($kk_name);
$kk_target = $target_dir_kk . $kk_new_name;

if (!move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp_target)) {
    echo "<script>alert('Gagal mengunggah file KTP.'); window.history.back();</script>";
    exit;
}

if (!move_uploaded_file($_FILES['kelurahan']['tmp_name'], $kelurahan_target)) {
    echo "<script>alert('Gagal mengunggah file kelurahan.'); window.history.back();</script>";
    exit;
}

if (!move_uploaded_file($_FILES['kk']['tmp_name'], $kk_target)) {
    echo "<script>alert('Gagal mengunggah file KK.'); window.history.back();</script>";
    exit;
}

// Simpan hanya nama file
$ktp_final_name = $ktp_new_name;
$kelurahan_final_name = $kelurahan_new_name;
$kk_final_name = $kk_new_name;

// Query untuk memperbarui database
$sql = "UPDATE arsip_skck SET ktp_path = ?, kelurahan_path = ?, kk_path = ? WHERE id_arsip_skck = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Kesalahan pada query SQL: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("sssi", $ktp_final_name, $kelurahan_final_name, $kk_final_name, $id);

if ($stmt->execute()) {
    echo "<script>alert('File berhasil diupload atau diperbarui.'); window.location.href='upload_foto_skck.php?id=$id';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . addslashes($stmt->error) . "'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
