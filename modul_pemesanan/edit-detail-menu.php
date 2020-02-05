<?php
// ... ambil data dari database
include '../function.php';
include '../modul_menu/proses-list-menu.php';

$id_menu = @$_GET['id_menu'];
// $nama_pelanggan = @$_POST['nama_pelanggan'];
// $id_meja = @$_POST['id_meja'];
// $jumlah_pesan = @$_POST['jumlah_pesan'];
$no_pesanan = @$_GET['no_pesanan'];
$id_detailpesanan = $_GET['id_detailpesanan'];
$no_pesan = @$_POST['no_pesanan'];
$nama_pelanggan = @$_POST['nama_pelanggan'];
$no_meja = @$_POST['no_meja'];
$jumlah_pesan = @$_POST['jumlah_pesan'];

$query = "SELECT * FROM `menu` WHERE id_menu = $id_menu";
$hasil = mysqli_query($db, $query);
@$data_harga = mysqli_fetch_assoc($hasil);
$totharga = $data_harga['harga_menu'] * $jumlah_pesan; 

// if (!$no_pesanan) {
//     $qpesan = "SELECT pesanan.*, meja.no_meja FROM `pesanan` JOIN meja ON meja.id_meja = pesanan.id_meja WHERE no_pesanan = $no_pesan";
//     $hasilpesan = mysqli_query($db,$qpesan);
//     $data_pesan = mysqli_fetch_assoc($hasilpesan);    
// }else{
    $qpesan = "SELECT pesanan.*, meja.no_meja, detail_pesanan.*,menu.* FROM pesanan,meja,detail_pesanan,menu WHERE pesanan.no_pesanan=detail_pesanan.no_pesanan
    AND pesanan.id_meja=meja.id_meja AND detail_pesanan.id_menu=menu.id_menu AND detail_pesanan.id_detailpesanan='$id_detailpesanan'";
    $hasilpesan = mysqli_query($db,$qpesan);
    $data_pesan = mysqli_fetch_assoc($hasilpesan);
// }

// jika ada no pesanan
if (!$no_pesanan) {
//nama, jumlah, harga, totalharga
    $qdetail = "SELECT detail_pesanan.*, menu.id_menu, menu.nama_menu, menu.harga_menu FROM `detail_pesanan` JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.no_pesanan = $no_pesan";
    $hasil = mysqli_query($db, $qdetail);
    $data_detail = array();
    while (@$row = mysqli_fetch_assoc($hasil)) {
        $data_detail[] = $row; 
    }
    
}
else{
    $qdetail = "SELECT detail_pesanan.*, menu.id_menu, menu.nama_menu, menu.harga_menu FROM `detail_pesanan` JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.no_pesanan = $no_pesanan";
    $hasil = mysqli_query($db, $qdetail);
    $data_detail = array();
    while (@$row = mysqli_fetch_assoc($hasil)) {
        $data_detail[] = $row; 
    }
}



// var_dump($newID);
// var_dump($id_meja);
// var_dump($id_menu);
// var_dump($jumlah_pesan);
// var_dump($nama_pelanggan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Detail Pesanan</title>
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
            <h3>Edit Data Detail Pesanan</h3>
            <?php
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <!-- <form action="proses-tambah-pemesanan.php" method="post"> -->

                <form action="proses-edit-detail-menu.php" method="post">

                <?php 
                // $qtambahp = "INSERT INTO `pesanan` (`no_pesanan`, `id_meja`, `nama_pelanggan`) 
                // VALUES ($no_pesanan, '$id_meja','$nama_pelanggan');";
                // $hasiltambahp = mysqli_query($db, $qtambahp);   
                 ?>

                 <?php if (!$no_pesanan) {?>

                    <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesan; ?>"></p>
            <?php }else{ ?>
                    <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan; ?>"></p>
            <?php } ?>
                <input type="text" name="id_detailpesanan" value="<?php echo $data_pesan['id_detailpesanan'];?>">
                <p><input type="text" name="no_pesanan" value="<?php echo $data_pesan['no_pesanan'];?>"hidden></p>
                <p>Nama Pelanggan</p>
                <p><input type="text" name="nama_pelanggan" value="<?php echo $data_pesan['nama_pelanggan']; ?>" disabled></p>
                <p>No Meja</p>
                <p><input type="text" name="id_meja" value="<?php echo $data_pesan['no_meja'] ?>" disabled></p>
                <p>Pilih Menu <?php echo $data_pesan['id_menu']?></p>
                <p><select name="id_menu">
                        <?php foreach ($data_menu as $menu) : 
                        if($menu['id_menu'] == $data_pesan['id_menu']) {
                            $select = "selected";
                        } else {
                            $select = "";
                        }
                        //<option value="1" selected>Nilai 1</option>
                            echo "<option value=".$menu['id_menu']." ".$select.">".$menu['nama_menu']."</option>";
                    endforeach ?>
                    </select>
                </p>
                <p>Jumlah</p>
                <p><input type="number" name="jumlah_pesan" value="<?php echo $data_pesan['jumlah']; ?>"></p>
                <p><input type="submit" class="btn btn-tambah" value="Edit Menu"></p>                
                </form>

                <table class="data">
                    <tr>
                        <th style="text-align: left; width: 20%">Nama Menu</th>
                        <th style="text-align: left; width: 20%">Jumlah</th>
                        <th style="text-align: left; width: 20%">Harga</th>
                        <th style="text-align: left; width: 20%">Total Harga</th>
                        <th style="text-align: left; width: 20%">Aksi</th>
                    </tr>
                    <?php foreach ($data_detail as $detail) : ?>
                    <tr>
                        <td><?php echo $detail['nama_menu'] ?></td>
                        <td><?php echo $detail['jumlah'] ?></td>
                        <td><?php echo $detail['harga_menu'] ?></td>
                        <td><?php echo $detail['total_harga'] ?></td>
                        <td>
                            <form action="proses-edit-detail-menu.php" method="post">
                                <p><input type="hidden" name="nama_pelanggan" value="<?php echo $data_pesan['nama_pelanggan'] ?>"></p>
                                <?php if (!$no_pesanan) {?>

                                        <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesan; ?>"></p>
                                <?php }else{ ?>
                                        <p><input type="hidden" name="no_pesanan" value="<?php echo $no_pesanan; ?>"></p>
                                <?php } ?>
                                <p><input type="hidden" name="no_meja" value="<?php echo $data_pesan['no_meja']; ?>"></p>
                                <p><input type="submit" class="btn btn-hapus" value="Hapus"></p>
                            </form>
                                <p><a href="edit-detail-menu.php?id_detailmenu?=<?php echo $detail['id_detailmenu']?>" class="btn btn-edit">Edit Menu</a></p> 
                        </td>

                    </tr>
                    <?php endforeach ?>
                </table>
                <table class="data">
                    <tr>
                        <?php $querysum = "select sum(total_harga) as grand_total from detail_pesanan WHERE detail_pesanan.no_pesanan = $no_pesanan";
                                $hasilsum = mysqli_query($db, $querysum);
                                @$grand_total = mysqli_fetch_assoc($hasilsum);
                        ?>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%"></th>
                        <th style="text-align: left; width: 20%">Grand Total</th>
                        <th style="text-align: left; width: 20%"><?php echo $grand_total['grand_total']; ?></th>
                        <th style="text-align: left; width: 20%"></th>
                    </tr>
                </table>
                <form action="pemesanan-data.php">
                    <p><input type="submit" class="btn btn-tambah" value="Simpan"></p> 
                </form>
        </div>
    </div>
</body>
</html>
