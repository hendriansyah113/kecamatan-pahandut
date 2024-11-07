<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi sudah benar

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Seleksi data user berdasarkan username
$sql = "SELECT * FROM login WHERE username = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah username ditemukan
if ($result->num_rows === 1) {
	$data = $result->fetch_assoc();

	// Cek password yang diinput dengan yang di-hash di database
	if (password_verify($password, $data['password'])) {
		// Jika password benar, buat session
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['level'] = $data['level'];

		// Redirect sesuai level atau kebutuhan
		header("Location: admin/halaman_admin.php");
		exit();
	} else {
		// Debugging tambahan untuk memverifikasi password
		header("location:index.php?pesan=gagal");
	}
} else {
	// Jika username tidak ditemukan
	header("location:index.php?pesan=gagal");
}
