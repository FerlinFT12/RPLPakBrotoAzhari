<?php
    session_start();
    if($_SESSION['status'] != 'login') {
    header("location:login.php?pesan=belum_login");
    }
    include '../function.php'; //memanggil sidebar customer service
    include '../connection.php'; //koneksi dengan database
    include 'proses-list-kuesioner.php'; //memanggil data dari database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kuesioner</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <div class="logo"><img src="../img/LOGO.png" ></div>
        <h4>Restoran Pak Broto Azhari</h4>

        <?php
            activekuesioner();
            $query1 = "SELECT * from pembayaran"; //query menampilkan daftar no pembayaran
            $result1 = mysqli_query($db,$query1);

            $query2 = "SELECT * from pertanyaan"; //query menampilkan daftar pertanyaan
            $result2 = mysqli_query($db,$query2);

            //menampilkan daftar no. pembayaran
            while ($row1 = mysqli_fetch_assoc($result1)) {
            $no_pembayaran[] = $row1;
            }
            
            while ($row2 = mysqli_fetch_assoc($result2)) {
            $pertanyaan[] = $row2;
            }
        ?>
        <div class="content">
            <h1>Tambah Kuesioner</h1>
            <form method="post" action="proses-tambah-kuesioner.php">                
                <p>No. Pembayaran</p>
                <p><select name="no_pembayaran">
                        <?php foreach ($no_pembayaran as $no_pemb) : ?>
                            <option value="<?php echo $no_pemb['no_pembayaran']; ?>"><?php echo $no_pemb['no_pembayaran']; ?></option>
                        <?php endforeach ?>
                    </select></p>
                 <p>Pertanyaan</p>
                <p><select name="id_pertanyaan">
                        <?php foreach ($pertanyaan as $tanya) : ?>
                            <option value="<?php echo $tanya['id_pertanyaan']; ?>"><?php echo $tanya['nama_pertanyaan']; ?></option>
                        <?php endforeach ?>
                    </select></p>
                <p>Nilai</p>
                <p><input type="number" name="nilai" min="1" required></p>
                <input type="text" name="id_pegawai" required="" value="<?php echo $_SESSION['id_pegawai']; ?>" hidden> 
                <!-- <p>Bahan Baku</p> -->
                    <input type="submit" class="btn btn-tambah" value="Simpan">
                    <input type="reset" class="btn btn-submit" value="Batal">
            </form>

            <table class="data">
                <tr>
                    <th style="text-align: left; width: 20%">No. Pembayaran</<th>
                    <th style="text-align: left; width: 20%">Nama Pertanyaan</th>
                    <th style="text-align: left; width: 20%">Nilai</th>
                    <th style="text-align: left; width: 20%">Aksi</th>
                </tr>
                <?php foreach ($data_kuesioner as $kuesioner) : ?>
                <tr>
                    <td><?php echo $kuesioner['no_pembayaran'] ?></td>
                    <td><?php echo $kuesioner['nama_pertanyaan'] ?></td>
                    <td><?php echo $kuesioner['nilai'] ?></td>
                    <td>
                        <a href="edit-kuesioner.php?id_kuesioner=<?php echo $kuesioner['id_kuesioner']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-kuesioner.php?id_kuesioner=<?php echo $kuesioner['id_kuesioner']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>
</html>