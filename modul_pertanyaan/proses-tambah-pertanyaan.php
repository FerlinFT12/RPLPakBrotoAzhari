<?php
include '../connection.php';

$namapertanyaan = $_POST['nama_pertanyaan'];
$idpegawai = $_POST['id_pegawai'];

$query = "INSERT INTO pertanyaan (nama_pertanyaan, id_pegawai) VALUES ('$namapertanyaan','$idpegawai')";
$hasil = mysqli_query($db, $query);
var_dump($hasil);
if ($hasil == true) {
    header('Location: list-pertanyaan.php');
} else {
	$_SESSION['messages'] = '<font color="red">Tambah Bahan Baku Gagal!</font>';
    header('Location: tambah-bahanbaku.php');
}
?>