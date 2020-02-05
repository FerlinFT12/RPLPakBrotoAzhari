<?php
include '../connection.php';
include '../modul_menu/proses-list-menu.php';

$id_detailpesanan = $_POST['id_detailpesanan']; //id detail pesanan
$no_pesanan = $_POST['no_pesanan']; //nomor pesanan
$id_menu = $_POST['id_menu']; //id menu
@$jumlah_pesan = $_POST['jumlah_pesan']; //jumlah pesan

$query = "SELECT * FROM `menu` WHERE id_menu = '$id_menu'";
$hasil = mysqli_query($db, $query);
@$data_harga = mysqli_fetch_assoc($hasil);
$totharga = $data_harga['harga_menu'] * $jumlah_pesan; 

$query = "UPDATE `detail_pesanan`
			SET `id_menu` = '$id_menu', `jumlah` = '$jumlah_pesan', `total_harga`='$totharga'
			WHERE `id_detailpesanan` = '$id_detailpesanan'";

$hasil = mysqli_query($db, $query);
// var_dump($hasil);
if ($hasil == true) {
    header('Location: edit-pemesanan.php?no_pesanan='.$no_pesanan);
} else {
    header('Location: edit-bahanbaku.php');
}
