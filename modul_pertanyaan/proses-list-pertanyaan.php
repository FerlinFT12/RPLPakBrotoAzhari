<?php
include '../connection.php';

$query = "SELECT * FROM pertanyaan";
$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_pertanyaan = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_pertanyaan[] = $row;
}

// ... lanjut di tampilan

?>