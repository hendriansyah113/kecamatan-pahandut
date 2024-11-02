<?php
require('fpdf/fpdf.php'); // Sertakan file FPDF

class PDF extends FPDF {
    // Header
    function Header() {
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'Data SKCK', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(8, 10, 'NO', 1);
        $this->Cell(40, 10, 'Nama/TTL', 1);
        $this->Cell(21, 10, 'Pendidikan', 1);
        $this->Cell(14, 10, 'Agama', 1);
        $this->Cell(67, 10, 'Alamat', 1);
        $this->Cell(22, 10, 'Keterangan', 1);
        $this->Cell(20, 10, 'Tanggal', 1);
        $this->Ln();
    }

    // Footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 7);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Buat instance PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

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

// Mengambil data dari database
$sql = "SELECT id, nama_ttl, pendidikan, agama, alamat, keterangan, tanggal FROM arsip_skck";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pdf->Cell(8, 10, $row["id"], 1);
        $pdf->Cell(40, 10, $row["nama_ttl"], 1);
        $pdf->Cell(21, 10, $row["pendidikan"], 1);
        $pdf->Cell(14, 10, $row["agama"], 1);
        $pdf->Cell(67, 10, $row["alamat"], 1);
        $pdf->Cell(22, 10, $row["keterangan"], 1);
        $pdf->Cell(20, 10, $row["tanggal"], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'Tidak ada data', 1, 1, 'C');
}

$conn->close();

// Output PDF
$pdf->Output('I', 'Data_SKCK.pdf');
?>