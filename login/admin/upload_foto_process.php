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

// Mengambil data dari form
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo "ID tidak valid.";
    exit;
}

// Mendefinisikan folder tujuan
$target_dir_sktm = "uploads/sktm/";
$target_dir_kk = "uploads/kk/";
$target_dir_ktp = "uploads/ktp/";

// Membuat folder jika belum ada
if (!is_dir($target_dir_sktm)) {
    mkdir($target_dir_sktm, 0755, true);
}
if (!is_dir($target_dir_kk)) {
    mkdir($target_dir_kk, 0755, true);
}
if (!is_dir($target_dir_ktp)) {
    mkdir($target_dir_ktp, 0755, true);
}

// Mengambil nama file dan path lengkap
$sktm_name = $_FILES['sktm']['name'];
$kk_name = $_FILES['kk']['name'];
$ktp_name = $_FILES['ktp']['name'];

// Mengubah nama file untuk menghindari konflik
$sktm_new_name = "sktm_" . time() . "_" . basename($sktm_name);
$kk_new_name = "kk_" . time() . "_" . basename($kk_name);
$ktp_new_name = "ktp_" . time() . "_" . basename($ktp_name);

// Path lengkap
$sktm_target = $target_dir_sktm . $sktm_new_name;
$kk_target = $target_dir_kk . $kk_new_name;
$ktp_target = $target_dir_ktp . $ktp_new_name;

// Memeriksa tipe file yang diupload
$allowed_types = array('jpg', 'jpeg', 'png', 'pdf');

$sktm_file_type = pathinfo($sktm_target, PATHINFO_EXTENSION);
$kk_file_type = pathinfo($kk_target, PATHINFO_EXTENSION);
$ktp_file_type = pathinfo($ktp_target, PATHINFO_EXTENSION);

// Variabel final untuk path file
$sktm_target_final = null;
$kk_target_final = null;
$ktp_target_final = null;

if (!empty($_FILES['sktm']['tmp_name']) && move_uploaded_file($_FILES['sktm']['tmp_name'], $sktm_target)) {
    $sktm_target_final = $sktm_target; // Simpan path jika file berhasil diunggah
}

if (!empty($_FILES['kk']['tmp_name']) && move_uploaded_file($_FILES['kk']['tmp_name'], $kk_target)) {
    $kk_target_final = $kk_target; // Simpan path jika file berhasil diunggah
}

if (!empty($_FILES['ktp']['tmp_name']) && move_uploaded_file($_FILES['ktp']['tmp_name'], $ktp_target)) {
    $ktp_target_final = $ktp_target; // Simpan path jika file berhasil diunggah
}

// Query untuk menyimpan atau memperbarui path file di database
$sql = "
    INSERT INTO dokumen_sktm (user_id, sktm_path, kk_path, ktp_path)
    VALUES (?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        sktm_path = IF(VALUES(sktm_path) IS NOT NULL, VALUES(sktm_path), sktm_path),
        kk_path = IF(VALUES(kk_path) IS NOT NULL, VALUES(kk_path), kk_path),
        ktp_path = IF(VALUES(ktp_path) IS NOT NULL, VALUES(ktp_path), ktp_path)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Kesalahan pada query SQL: " . $conn->error);
}

// Bind parameter dengan nilai NULL jika file tidak diunggah
$stmt->bind_param(
    "isss",
    $id,
    $sktm_target_final,
    $kk_target_final,
    $ktp_target_final
);

if ($stmt->execute()) {
    echo "<script>alert('File berhasil diupload atau diperbarui.'); window.location.href='pendidikan.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
