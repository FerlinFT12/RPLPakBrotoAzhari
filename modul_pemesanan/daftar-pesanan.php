<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-pemesanan.php';
date_default_timezone_set('Asia/Jakarta');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemesanan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activemenu();
        ?>

        <div class="content">
            <h1>Daftar Pemesanan</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <br>
            <?php if (empty($data_pesan)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 5%;">No Pesanan</th>
                    <th style="text-align: left; width: 5%;">Nama Pelanggan</th>
                    <th style="text-align: left; width: 5%;">No Meja</th>
                    <th style="text-align: left; width: 4%;">Waktu Pemesanan</th>
                    <th style="text-align: left; width: 4%;">Aksi</th>
                </tr>
                <?php foreach ($data_pesan as $pesan) : ?>
                <tr>
                    <td><?php echo $pesan['no_pesanan'] ?></td>
                    <td><?php echo $pesan['nama_pelanggan'] ?></td>
                    <td><?php echo $pesan['no_meja'] ?></td>
                    <td><?php echo $pesan['waktu_pesanan'] ?></td>            
                    <td style="text-align: left;">
                        <a  href="../modul_pemesanan/detail-daftar-pesanan.php?no_pesanan=<?php echo $pesan['no_pesanan']; ?>" class="btn btn-edit" title="klik untuk proses pengembalian">Detail</a>
                    </td>
                </tr>

                    
                <?php endforeach ?>
            </table>
            <?php endif ?>
            <!-- <br>
            <div class="btn-tambah-div">
                <a href="tambah-menu.php"><button class="btn btn-tambah" style="right: 964px;">Rekap</button></a>
            </div> -->
        </div>

    </div>
</body>
</html>
