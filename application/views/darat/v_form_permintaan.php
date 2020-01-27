<?php
$this->fpdf->AddPage('L');
$this->fpdf->SetFont('Arial', 'B', 14);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 1, 'PT KALTIM KARIANGAU TERMINAL', 0, 1, 'L');
$this->fpdf->SetFont('Arial', 'B', 14);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 9, 'TERMINAL PETIKEMAS KARIANGAU', 0, 1, 'L');
$this->fpdf->SetFont('Arial', 'BU', 16);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 7, 'PERMINTAAN PELAYANAN JASA AIR BERSIH', 0, 1, 'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Arial', '', 12);
$this->fpdf->SetTextColor(0, 0, 0);
$this->fpdf->Cell(40, 7, 'Yang Bertanda Tangan Di Bawah Ini : ', 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'Nama Pelanggan', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(70, 7, '  '.$hasil['nama_pelanggan'], 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'Nama Pemohon', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(70, 7, '  '.$hasil['nama_pemohon'], 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'Alamat', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(90, 7, '  '.$hasil['alamat'], 0, 'L');
$this->fpdf->Ln(20);
$this->fpdf->Cell(40, 7, 'Tanggal Transaksi', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(90, 7, '  '.$hasil['tanggal'], 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'No. Telp/Hp', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(90, 7, '  '.$hasil['no_telp'], 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'Jam Permintaan', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(90, 7, '  '.$hasil['jam']." WITA", 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(40, 7, 'Total Permintaan', 0, 'L');
$this->fpdf->Cell(15, 7, ':', 0,0, 'R');
$this->fpdf->Cell(90, 7, '  '.$hasil['total_pengisian']." Ton", 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Ln();
$this->fpdf->Ln(20);
$this->fpdf->Cell(80, 7, 'Menyetujui', 0,0, 'C');
$this->fpdf->Cell(320, 7, 'Balikpapan, '.$hasil['tanggal'], 0,0, 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(80, 7, 'AN. Manager Operasi Dan Komersial', 0,0, 'C');
$this->fpdf->Cell(320, 7, 'Pemakai Jasa', 0,0, 'C');
$this->fpdf->Ln(25);
$this->fpdf->Cell(80, 7, '', 0,0, 'C');
$this->fpdf->Cell(320, 7, $hasil['nama_pemohon'], 0,0, 'C');
$this->fpdf->Ln(1);
$this->fpdf->Cell(80, 7, '(................................................)', 0,0, 'C');
$this->fpdf->Cell(320, 7, '(................................................)', 0,0, 'C');
$this->fpdf->Output("form_permintaan.pdf","I");

?>