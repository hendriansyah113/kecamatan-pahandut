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
$target_dir_ktp = "uploads/ktp/";
$target_dir_foto = "uploads/foto/";

// Membuat direktori jika belum ada
if (!is_dir($target_dir_ktp)) {
    mkdir($target_dir_ktp, 0755, true);
}
if (!is_dir($target_dir_foto)) {
    mkdir($target_dir_foto, 0755, true);
}

// Validasi dan upload file ktp (wajib)
if (empty($_FILES['ktp']['tmp_name'])) {
    echo "<script>alert('File ktp wajib diunggah.'); window.history.back();</script>";
    exit;
}

$ktp_name = $_FILES['ktp']['name'];
$ktp_file_type = strtolower(pathinfo($ktp_name, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

// Periksa tipe file ktp
if (!in_array($ktp_file_type, $allowed_types)) {
    echo "<script>alert('Tipe file ktp tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
    exit;
}

// Proses upload file ktp
$ktp_new_name = "ktp_" . time() . "_" . basename($ktp_name);
$ktp_target = $target_dir_ktp . $ktp_new_name;

if (!move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp_target)) {
    echo "<script>alert('Gagal mengunggah file KTP.'); window.history.back();</script>";
    exit;
}

// Simpan hanya nama file KK
$ktp_final_name = $ktp_new_name;

$foto_name = $_FILES['foto']['name'];
if (!empty($foto_name)) {
    $foto_new_name = "foto_" . time() . "_" . preg_replace('/[^a-zA-Z0-9._-]/', '_', $foto_name);
    $foto_target = $target_dir_foto . $foto_new_name;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_target)) {
        $foto_final_name = $foto_new_name;
    } else {
        echo "<script>alert('Gagal mengunggah file Foto.'); window.history.back();</script>";
        exit;
    }
} else {
    $foto_final_name = null;
}

// Query untuk memperbarui database
$sql = "UPDATE arsip_bpjs SET ktp_path = ?, foto_path = ? WHERE id_arsip_bpjs = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Kesalahan pada query SQL: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("ssi", $ktp_final_name, $foto_final_name, $id);

if ($stmt->execute()) {
    echo "<script>alert('File berhasil diupload atau diperbarui.'); window.location.href='upload_foto_bpjs.php?id=$id';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . addslashes($stmt->error) . "'); window.location.href='upload_foto_bpjs.php?id=$id';</script>";
}

$stmt->close();
$conn->close();
