<?php
$this->fpdf->AddPage('P','A4');
$this->fpdf->SetFont('Arial', '', 10);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 1, 'PT KALTIM KARIANGAU TERMINAL', 0, 1, 'L');
$this->fpdf->SetFont('Arial', '', 10);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 9, 'TERMINAL PETIKEMAS KARIANGAU', 0, 1, 'L');
$this->fpdf->SetFont('Arial', '', 11);
$this->fpdf->Ln(3);
$this->fpdf->Cell(0, 7, 'FORM PENGISIAN AIR BERSIH DI TPK KARIANGAU', 0, 1, 'C');
$this->fpdf->Ln(1);
$this->fpdf->SetFont('Arial', '', 9);
$this->fpdf->SetTextColor(0, 0, 0);
$this->fpdf->Cell(40, 7, 'Nama Perusahaan', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(70, 7, $hasil['nama_perusahaan'], 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Kota', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(70, 7, 'Balikpapan', 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Kapal/Voy No', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(90, 7, $hasil['kapal']." , ".$hasil['voy_no'], 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Tanggal', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(90, 7, $hasil['tgl_transaksi'], 0, 'L');
$this->fpdf->Ln(10);
$this->fpdf->SetFont('Arial', '', 8);
$this->fpdf->Cell(7, 7, 'No', 1,0, 'C');
$this->fpdf->Cell(28, 7, 'Jenis Pelayanan', 1,0, 'C');
$this->fpdf->Cell(11, 7, ' Satuan', 1,0, 'C');
$this->fpdf->Cell(27, 7, ' Jumlah Permintaan', 1,0, 'C');
$this->fpdf->Cell(46, 7, ' Flow Meter Awal', 1,0, 'C');
$this->fpdf->Cell(46, 7, ' Flow Meter Akhir', 1,0, 'C');
$this->fpdf->Cell(30, 7, ' Realisasi Pengisian', 1,0, 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(7, 7, '1', 1,0, 'C');
$this->fpdf->Cell(28, 7, 'Pengisian Air Bersih', 1,0, 'C');
$this->fpdf->Cell(11, 7, 'Ton', 1,0, 'C');
if($hasil['flowmeter_sebelum_4'] != NULL && $hasil['flowmeter_sesudah_4'] != NULL){
    if($hasil['flowmeter_sebelum_3'] != NULL && $hasil['flowmeter_sesudah_3'] != NULL){
        if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
            $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'].' , '.$hasil['flowmeter_sebelum_3'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'].' , '.$hasil['flowmeter_sesudah_3'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
            $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
        }
        else{
            $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_3'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_3'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
            $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
        }
    }
    else{
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
}
else if($hasil['flowmeter_sebelum_3'] != NULL && $hasil['flowmeter_sesudah_3'] != NULL){
    if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'].' , '.$hasil['flowmeter_sebelum_3'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'].' , '.$hasil['flowmeter_sesudah_3'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
    else{
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_3'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_3'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
}
else if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
    $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'], 1,0, 'C');
    $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
}
else{
    $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'], 1,0, 'C');
    $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
}
$this->fpdf->Ln(12);
$this->fpdf->Cell(10, 10, '', 0, 'R');
$this->fpdf->SetFont('Arial', '', 9);
$this->fpdf->Cell(300, 3, 'Balikpapan, ' . $hasil['tanggal'], 0, 0, 'C');
$this->fpdf->Ln(6);
$this->fpdf->Cell(320, 3, 'PT. Kaltim Kariangau Terminal', 0, 0, 'C');
$this->fpdf->Ln(4);
$this->fpdf->Cell(55, 3, 'PT/Kapal', 0, 0, 'C');
$this->fpdf->Cell(210, 3, 'Operator Pengisian Air Bersih', 0, 0, 'C');
$this->fpdf->Ln(6);
$this->fpdf->Ln(2);
$this->fpdf->Ln(4);
$this->fpdf->Cell(195, 3, 'PT. Kaltim Kariangau Terminal', 0, 0, 'C');
$this->fpdf->Ln(4);
$this->fpdf->Cell(55, 3, $hasil['kapal'], 0, 0, 'C');
$this->fpdf->Ln(1);
$this->fpdf->Cell(55, 3, '(..........................................)', 0, 0, 'C');
$this->fpdf->Cell(85, 3, 'ASMAN OPERASI PELAYANAN', 0, 0, 'C');
$this->fpdf->Cell(40, 3, '(..........................................)', 0, 0, 'C');
$this->fpdf->Ln(4);
$this->fpdf->Cell(195, 3, 'NON PETIKEMAS', 0, 0, 'C');
$this->fpdf->Ln(14);
$this->fpdf->Cell(195, 3, 'BERLY KARDIN SENAPATI', 0, 0, 'C');
$this->fpdf->Ln(1);
$this->fpdf->Cell(195, 3, '(.................................................)', 0, 0, 'C');

$this->fpdf->Ln(20);
$this->fpdf->Line(0, 148.5, 210, 148.5); // 20mm from each edge
$this->fpdf->Ln(20);

$this->fpdf->SetFont('Arial', '', 10);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 1, 'PT KALTIM KARIANGAU TERMINAL', 0, 1, 'L');
$this->fpdf->SetFont('Arial', '', 10);
$this->fpdf->Ln();
$this->fpdf->Cell(0, 9, 'TERMINAL PETIKEMAS KARIANGAU', 0, 1, 'L');
$this->fpdf->SetFont('Arial', '', 11);
$this->fpdf->Ln(3);
$this->fpdf->Cell(0, 7, 'FORM PENGISIAN AIR BERSIH DI TPK KARIANGAU', 0, 1, 'C');
$this->fpdf->Ln(1);
$this->fpdf->SetFont('Arial', '', 9);
$this->fpdf->SetTextColor(0, 0, 0);
$this->fpdf->Cell(40, 7, 'Nama Perusahaan', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(70, 7, $hasil['nama_perusahaan'], 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Kota', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(70, 7, 'Balikpapan', 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Kapal/Voy No', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(90, 7, $hasil['kapal']." , ".$hasil['voy_no'], 0, 'L');
$this->fpdf->Ln(5);
$this->fpdf->Cell(40, 7, 'Tanggal', 0, 'L');
$this->fpdf->Cell(5, 7, ':', 0, 'L');
$this->fpdf->Cell(90, 7, $hasil['tgl_transaksi'], 0, 'L');
$this->fpdf->Ln(10);
$this->fpdf->SetFont('Arial', '', 8);
$this->fpdf->Cell(7, 7, 'No', 1,0, 'C');
$this->fpdf->Cell(28, 7, 'Jenis Pelayanan', 1,0, 'C');
$this->fpdf->Cell(11, 7, ' Satuan', 1,0, 'C');
$this->fpdf->Cell(27, 7, ' Jumlah Permintaan', 1,0, 'C');
$this->fpdf->Cell(46, 7, ' Flow Meter Awal', 1,0, 'C');
$this->fpdf->Cell(46, 7, ' Flow Meter Akhir', 1,0, 'C');
$this->fpdf->Cell(30, 7, ' Realisasi Pengisian', 1,0, 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(7, 7, '1', 1,0, 'C');
$this->fpdf->Cell(28, 7, 'Pengisian Air Bersih', 1,0, 'C');
$this->fpdf->Cell(11, 7, 'Ton', 1,0, 'C');

if($hasil['flowmeter_sebelum_4'] != NULL && $hasil['flowmeter_sesudah_4'] != NULL){
    if($hasil['flowmeter_sebelum_3'] != NULL && $hasil['flowmeter_sesudah_3'] != NULL){
        if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
            $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'].' , '.$hasil['flowmeter_sebelum_3'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'].' , '.$hasil['flowmeter_sesudah_3'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
            $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
        }
        else{
            $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_3'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
            $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_3'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
            $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
        }
    }
    else{
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_4'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_4'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
}
else if($hasil['flowmeter_sebelum_3'] != NULL && $hasil['flowmeter_sesudah_3'] != NULL){
    if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'].' , '.$hasil['flowmeter_sebelum_3'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'].' , '.$hasil['flowmeter_sesudah_3'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
    else{
        $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_3'], 1,0, 'C');
        $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_3'], 1,0, 'C');
        $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
    }
}
else if($hasil['flowmeter_sebelum_2'] != NULL && $hasil['flowmeter_sesudah_2'] != NULL){
    $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'].' , '.$hasil['flowmeter_sebelum_2'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'].' , '.$hasil['flowmeter_sesudah_2'], 1,0, 'C');
    $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
}
else{
    $this->fpdf->Cell(27, 7, $hasil['total_permintaan'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sebelum'], 1,0, 'C');
    $this->fpdf->Cell(46, 7, $hasil['flowmeter_sesudah'], 1,0, 'C');
    $this->fpdf->Cell(30, 7, $hasil['realisasi'], 1,0, 'C');
}

$this->fpdf->Ln(12);
$this->fpdf->Cell(10, 10, '', 0, 'R');
$this->fpdf->SetFont('Arial', '', 9);
$this->fpdf->Cell(300, 3, 'Balikpapan, ' . $hasil['tanggal'], 0, 0, 'C');
$this->fpdf->Ln(6);
$this->fpdf->Cell(320, 3, 'PT. Kaltim Kariangau Terminal', 0, 0, 'C');
$this->fpdf->Ln(4);
$this->fpdf->Cell(55, 3, 'PT/Kapal', 0, 0, 'C');
$this->fpdf->Cell(210, 3, 'Operator Pengisian Air Bersih', 0, 0, 'C');
$this->fpdf->Ln(6);
$this->fpdf->Ln(2);
$this->fpdf->Ln(4);
$this->fpdf->Cell(195, 3, '', 0, 0, 'C');
$this->fpdf->Ln(4);
$this->fpdf->Cell(55, 3, $hasil['kapal'], 0, 0, 'C');
$this->fpdf->Ln(1);
$this->fpdf->Cell(55, 3, '(..........................................)', 0, 0, 'C');
$this->fpdf->Cell(85, 3, '', 0, 0, 'C');
$this->fpdf->Cell(40, 3, '(..........................................)', 0, 0, 'C');
$this->fpdf->Ln(12);
$this->fpdf->Output("kwitansi-".$hasil['nama_perusahaan'].".pdf","I");

?>