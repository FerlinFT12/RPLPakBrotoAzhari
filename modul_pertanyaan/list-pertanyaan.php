<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-pertanyaan.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pertanyaan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
            activepertanyaan();
        ?>


        <div class="content">
            <h1>Daftar Pertanyaan</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <div class="btn-tambah-div">
                <a href="tambah-pertanyaan.php"><button class="btn btn-tambah" style="right: 790px;">Tambah Pertanyaan</button></a>
            </div>
            <br>
            <?php if (empty($data_pertanyaan)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 10%;">No</th>
                    <th style="text-align: left; width: 20%;">Nama Pertanyaan</th>
                    <th style="text-align: left; width: 20%;">Keterangan</th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($data_pertanyaan as $pertanyaan) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $pertanyaan['nama_pertanyaan'] ?></td>
                    <td>
                        <a href="edit-pertanyaan.php?id_pertanyaan=<?php echo $pertanyaan['id_pertanyaan']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-pertanyaan.php?id_pertanyaan=<?php echo $pertanyaan['id_pertanyaan']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>