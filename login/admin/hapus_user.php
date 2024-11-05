<?php
// Periksa apakah `id` tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kecamatan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM login WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'd_user.php';
              </script>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>ID tidak ditemukan. Pastikan memilih data yang ingin dihapus.</p>";
}
