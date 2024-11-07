<?php
require('fpdf/fpdf.php'); // Sertakan file FPDF

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, 'Data SKTM Berobat', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(8, 10, 'NO', 1);
        $this->Cell(30, 10, 'No KK', 1);
        $this->Cell(25, 10, 'Tanggal', 1);
        $this->Cell(40, 10, 'Nama/TTL', 1);
        $this->Cell(68, 10, 'Alamat', 1);
        $this->Cell(20, 10, 'Keterangan', 1);
        $this->Ln();
    }

    // Footer
    function Footer()
    {
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
$sql = "SELECT * FROM sktm_berobat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row_number = 1;  // Variabel untuk nomor baris
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(8, 10, $row_number, 1);  // Menggunakan nomor baris
        $pdf->Cell(30, 10, $row["no_KK"], 1);
        $pdf->Cell(25, 10, $row["tanggal"], 1);
        $pdf->Cell(40, 10, $row["nama_ttl"], 1);
        $pdf->Cell(68, 10, $row["alamat"], 1);
        $pdf->Cell(20, 10, $row["ket"], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'Tidak ada data', 1, 1, 'C');
}

$conn->close();

// Output PDF
$pdf->Output('I', 'Data_SKTMBerobat.pdf');
