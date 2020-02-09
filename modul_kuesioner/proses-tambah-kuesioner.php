<?php
include '../connection.php';

$no_pembayaran = $_POST['no_pembayaran'];
$id_pertanyaan = $_POST['id_pertanyaan'];
$nilai = $_POST['nilai'];
$idpegawai = $_POST['id_pegawai'];

$query = "INSERT INTO kuesioner (no_pembayaran, id_pertanyaan, nilai, id) VALUES ('$no_pembayaran','$id_pertanyaan','$nilai','$idpegawai')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-bahanbaku.php');
} else {
	$_SESSION['messages'] = '<font color="red">Tambah Bahan Baku Gagal!</font>';
    header('Location: tambah-bahanbaku.php');
}
?>