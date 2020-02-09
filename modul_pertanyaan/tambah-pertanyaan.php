<?php
    session_start();
    if($_SESSION['status'] != 'login') {
    header("location:login.php?pesan=belum_login");
    }
?>
<?php
include '../function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pertanyaan</title>
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
            <h1>Tambah Pertanyaan</h1>
            <form method="post" action="proses-tambah-pertanyaan.php">
                <p>Nama Pertanyaan</p>
                <p><input type="text" name="nama_pertanyaan" required></p>
                <input type="text" name="id_pegawai" required="" value="<?php echo $_SESSION['id_pegawai']; ?>">
                <p>
                    <input type="submit" class="btn btn-tambah" value="Simpan">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
