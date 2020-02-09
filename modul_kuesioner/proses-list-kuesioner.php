<?php
include '../connection.php';

$query = "SELECT kuesioner.*, pertanyaan.*,pembayaran.*
    FROM kuesioner
    JOIN pembayaran ON pembayaran.no_pembayaran = kuesioner.no_pembayaran
    JOIN pertanyaan ON pertanyaan.id_pertanyaan = kuesioner.id_pertanyaan";
$hasil = mysqli_query($db, $query);

$query2 = "SELECT pesanan.no_pesanan, pesanan.nama_pelanggan, SUM(nilai) as nilai
            FROM kuesioner, pembayaran, pesanan WHERE kuesioner.no_pembayaran=pembayaran.no_pembayaran
            AND pembayaran.no_pesanan=pesanan.no_pesanan GROUP BY pembayaran.no_pembayaran";
$hasil2 = mysqli_query($db, $query2);

mysqli_connect_error();
// ... menampung semua data kategori
$data_kuesioner = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kuesioner[] = $row;
}

while ($row2 = mysqli_fetch_assoc($hasil2)) {
    $kuesioner[] = $row2;
}



// ... lanjut di tampilan



?>