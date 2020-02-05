<?php
include '../connection.php'; //memanggil koneksi

$id_detailpesanan = $_GET['id_detailpesanan']; //menangkap id detail pesanan yang akan dihapus
$queryno_pesanan = "SELECT * FROM detail_pesanan WHERE id_detailpesanan='$id_detailpesanan'";
$hasilquerynopesanan = mysqli_query($db, $queryno_pesanan);
$no_pesan = mysqli_fetch_assoc($hasilquerynopesanan);
//print_r($no_pesan['no_pesanan']);
$query = "DELETE FROM detail_pesanan WHERE id_detailpesanan = '$id_detailpesanan'";

$hasil = mysqli_query($db, $query);
// var_dump($hasil);
if ($hasil == true) {
    header('Location: edit-pemesanan.php?no_pesanan='.$no_pesan['no_pesanan']);
} else {
    header('Location: edit-detail-menu.php?id_detailpesanan='.$id_detailpesanan);
}
?>