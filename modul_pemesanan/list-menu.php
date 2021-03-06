<?php
// ... ambil data dari database
include '../function.php';
include 'proses-list-menu.php';

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
          activepemesanan();
        ?>


        <div class="content">
            <h1>Daftar Menu</h1>
            <?php  
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <div class="btn-tambah-div">
                <a href="tambah-menu.php"><button class="btn btn-tambah" style="right: 925px;">Tambah Data</button></a>
            </div>
            <br>
            <?php if (empty($data_menu)) : ?>
            Tidak ada data.
            <br>
            <?php else : ?>
            <table class="data">
                <tr>
                    <th style="text-align: left; width: 10%;">No</th>
                    <th style="text-align: left; width: 20%;">Nama Menu</th>
                    <th style="text-align: left; width: 10%;">Harga</th>
                    <th style="text-align: left; width: 10%;">Jenis</th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($data_menu as $menu) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $menu['nama_menu'] ?></td>
                    <td><?php echo $menu['harga_menu'] ?></td>
                    <td><?php echo $menu['jenis_menu'] ?></td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>