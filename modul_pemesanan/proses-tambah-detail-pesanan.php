<?php
include '../connection.php';
include '../modul_menu/proses-list-menu.php';

$no_pesanan = @$_GET['no_pesanan']; //untuk mendapatkan data
$no_pesan = $_POST['no_pesanan']; //untuk mengirim data untuk diinput
$id_menu = $_POST['id_menu'];
@$jumlah_pesan = $_POST['jumlah_pesan'];

//mencari harga barang yang dipesan
$queryhargabarang = "SELECT * FROM menu WHERE id_menu='$id_menu'";
$hasil = mysqli_query($db, $queryhargabarang);
@$data_harga = mysqli_fetch_assoc($hasil);
$totharga = $data_harga['harga_menu'] * $jumlah_pesan; //menghitung total harga suatu menu pesanan

$qtambahd = "INSERT INTO `detail_pesanan` (`no_pesanan`, `id_menu`, `jumlah`, `total_harga`) 
            VALUES ('$no_pesan', '$id_menu', '$jumlah_pesan', '$totharga');";
$hasiltambahd = mysqli_query($db, $qtambahd);
//var_dump($hasiltambahd);

if ($hasil == true) {
    header('Location: edit-pemesanan.php?no_pesanan='.$no_pesan);
} else {
    header('Location: edit-bahanbaku.php');
}

?>