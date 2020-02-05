<?php
    //memanggil library FPDF
    require('../pdf/fpdf.php');

    //tanggal hari ini
    $tanggalhariini = date('d-M-y');

    //instance object dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('P','mm','A4');
    //membuat halaman baru
    $pdf->AddPage();
    //setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    //mencetak string
    $pdf->Cell(190, 7, 'LAPORAN PENJUALAN DI RESTORAN PAK BROTO AZHARI',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,6,$tanggalhariini,0,1,'C');

    //Memberikan space ke bawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(30,6,'No. Pemesanan',1,0);
    $pdf->Cell(85,6,'Nama Pelanggan',1,0);
    $pdf->Cell(35,6,'Waktu Pembayaran',1,0);
    $pdf->Cell(25,6,'Bayar',1,1);
    
    $pdf->SetFont('Arial','',10);

    include '../connection.php';
    include 'proses-list-pembayaran.php';

        $querytotalpendapatan = "SELECT SUM(bayar) AS totalbayar FROM pembayaran WHERE waktu_bayar >= now() - INTERVAL 1 DAY";
        $hasilsum = mysqli_query($db, $querytotalpendapatan);
        @$grandtotal = mysqli_fetch_assoc($hasilsum);

    while($data=mysqli_fetch_assoc($hasil2)) {
        $pdf->Cell(30,6,$data['no_pesanan'],1,0);
        $pdf->Cell(85,6,$data['nama_pelanggan'],1,0);
        $pdf->Cell(35,6,$data['waktu_bayar'],1,0);
        $pdf->Cell(25,6,$data['bayar'],1,1);
    }
    $pdf->Cell(100,6,'Total Pendapatan : '.$grandtotal['totalbayar'],1,1);
    $pdf->Output();
?>