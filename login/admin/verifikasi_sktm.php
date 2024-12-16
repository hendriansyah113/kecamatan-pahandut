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

// Mendapatkan ID dari URL dan data dari form
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nama_verifikasi = isset($_POST['nama_verifikasi']) ? $_POST['nama_verifikasi'] : '';

// Memastikan ID valid
if ($id > 0 && $nama_verifikasi) {
    // Query untuk memperbarui status verifikasi
    $sql = "UPDATE sktm_pend SET nama_verifikator = ?, verifikasi='Terverifikasi' WHERE id_sktm_pendidikan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nama_verifikasi, $id);

    if ($stmt->execute()) {
        // Redirect setelah berhasil verifikasi
        header("Location: pendidikan.php?pesan=verifikasi_sukses");
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Data tidak lengkap atau ID tidak valid.";
}

$conn->close();