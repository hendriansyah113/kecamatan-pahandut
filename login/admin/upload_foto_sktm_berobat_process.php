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
$target_dir_kk = "uploads/kk/";
$target_dir_foto = "uploads/foto/";

// Membuat direktori jika belum ada
if (!is_dir($target_dir_kk)) {
    mkdir($target_dir_kk, 0755, true);
}
if (!is_dir($target_dir_foto)) {
    mkdir($target_dir_foto, 0755, true);
}

// Validasi dan upload file KK (wajib)
if (empty($_FILES['kk']['tmp_name'])) {
    echo "<script>alert('File KK wajib diunggah.'); window.history.back();</script>";
    exit;
}

$kk_name = $_FILES['kk']['name'];
$kk_file_type = strtolower(pathinfo($kk_name, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

// Periksa tipe file KK
if (!in_array($kk_file_type, $allowed_types)) {
    echo "<script>alert('Tipe file KK tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
    exit;
}

// Proses upload file KK
$kk_new_name = "kk_" . time() . "_" . basename($kk_name);
$kk_target = $target_dir_kk . $kk_new_name;

if (!move_uploaded_file($_FILES['kk']['tmp_name'], $kk_target)) {
    echo "<script>alert('Gagal mengunggah file KK.'); window.history.back();</script>";
    exit;
}

// Simpan hanya nama file KK
$kk_final_name = $kk_new_name;

// Validasi dan upload file Foto (opsional)
$foto_final_name = null;

if (!empty($_FILES['foto']['tmp_name'])) {
    $foto_name = $_FILES['foto']['name'];
    $foto_file_type = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

    if (!in_array($foto_file_type, $allowed_types)) {
        echo "<script>alert('Tipe file Foto tidak valid. Harap upload file dengan format JPG, JPEG, PNG, atau PDF.'); window.history.back();</script>";
        exit;
    }

    $foto_new_name = "foto_" . time() . "_" . basename($foto_name);
    $foto_target = $target_dir_foto . $foto_new_name;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_target)) {
        $foto_final_name = $foto_new_name; // Simpan hanya nama file Foto
    }
}

// Query untuk memperbarui database
$sql = "UPDATE sktm_berobat SET kk_path = ?, foto_path = ? WHERE id_sktm_berobat = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Kesalahan pada query SQL: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("ssi", $kk_final_name, $foto_final_name, $id);

if ($stmt->execute()) {
    echo "<script>alert('File berhasil diupload atau diperbarui.'); window.location.href='upload_foto_sktm_berobat.php?id=$id';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan: " . addslashes($stmt->error) . "'); window.location.href='upload_foto_sktm_berobat.php?id=$id';</script>";
}

$stmt->close();
$conn->close();
