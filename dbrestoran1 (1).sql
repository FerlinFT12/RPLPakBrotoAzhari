-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Feb 2020 pada 17.29
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `nama_bahanbaku` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `nama_bahanbaku`, `stok`, `id`) VALUES
(8, 'Beras', 50, 1),
(9, 'Kecap', 20, 1),
(10, 'Masako', 30, 1),
(11, 'Bawang Merah', 3, 1),
(12, 'Cabai', 10, 1),
(13, 'Telor', 5, 3),
(14, 'Beras Merah', 200, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detailpesanan` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detailpesanan`, `no_pesanan`, `id_menu`, `jumlah`, `total_harga`) VALUES
(720, 16, 14, 10, 50000),
(721, 16, 15, 3, 45000),
(722, 16, 13, 5, 50000),
(723, 15, 13, 10, 100000),
(724, 14, 9, 5, 75000),
(727, 14, 14, 5, 25000),
(730, 17, 11, 2, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `no_pembayaran` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`id_kuesioner`, `no_pembayaran`, `id_pertanyaan`, `nilai`, `id`) VALUES
(4, 18, 1, 5, 5),
(5, 18, 2, 4, 5),
(6, 20, 2, 3, 5),
(7, 20, 1, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `jenis_menu`, `id`) VALUES
(9, 'Ayam Geprek', 15000, 'Ayam', 1),
(11, 'Ayam Panggang ', 25000, 'Ayam', 1),
(12, 'Sop Buntut ', 8000, 'Sup', 1),
(13, 'Jus Alpukat ', 10000, 'Seafood', 1),
(14, 'Kopi Hitam ', 5000, 'Seafood', 1),
(15, 'Soto Ayam ', 15000, 'Sayuran', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `bagian`) VALUES
(1, 'andri', 'andri123', 'pelayan'),
(2, 'rudiansyaht', 'rudi1234567890', 'koki'),
(3, 'jinggasurya', 'putihkelabu', 'pantry'),
(4, 'heriansyahp', 'heriansyahputra', 'kasir'),
(5, 'rudiwibowo', 'rudiwibowo123', 'cs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `no_pesanan`, `waktu_bayar`, `bayar`) VALUES
(18, 1, '2020-02-02 18:10:20', 108000),
(19, 6, '2020-02-02 18:34:13', 20000),
(20, 16, '2020-02-05 05:46:45', 145000),
(22, 15, '2020-02-05 05:52:29', 100000),
(23, 14, '2020-02-05 05:57:07', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `nama_pertanyaan` varchar(100) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nama_pertanyaan`, `id_pegawai`) VALUES
(1, 'Bagaimana Pelayanan di Restoran Pak Broto Azhari ?', 5),
(2, 'Bagaimana Rasa Menu yang disediakan di Restoran Pak Broto Azhari ?', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `waktu_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `id_meja`, `waktu_pesanan`, `nama_pelanggan`) VALUES
(1, 2, '2020-02-02 18:03:38', 'Andri'),
(2, 1, '2020-02-02 18:05:01', 'Sandi'),
(3, 3, '2020-02-02 18:07:43', 'Devi'),
(4, 5, '2020-02-03 01:21:26', 'Susi'),
(5, 2, '2020-02-02 18:30:19', 'ferlin'),
(6, 2, '2020-02-02 18:30:39', 'ferlin'),
(7, 8, '2020-02-04 00:05:50', 'Asri'),
(8, 5, '2020-02-04 00:11:24', 'Reno'),
(9, 7, '2020-02-04 00:20:56', 'Eno'),
(10, 4, '2020-02-04 00:28:14', 'Moni'),
(11, 1, '2020-02-04 00:45:19', 'Ani'),
(12, 6, '2020-02-04 00:53:45', 'Mika'),
(13, 1, '2020-02-04 00:57:32', 'Lewis'),
(14, 4, '2020-02-04 01:00:58', 'Lan'),
(15, 1, '2020-02-04 01:03:01', 'Rini'),
(16, 9, '2020-02-04 01:04:40', 'Sosroan'),
(17, 6, '2020-02-09 05:37:40', 'Aray');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_menu` int(11) NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_menu`, `id_bahanbaku`, `satuan`, `jumlah`) VALUES
(15, 10, 'biji', 5),
(15, 12, 'biji', 4),
(15, 11, 'biji', 2),
(15, 13, 'biji', 1),
(15, 8, 'Sendok', 50),
(9, 9, 'Sendok', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detailpesanan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`),
  ADD KEY `id` (`id`),
  ADD KEY `no_pembayaran` (`no_pembayaran`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detailpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `kuesioner_ibfk_2` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE,
  ADD CONSTRAINT `kuesioner_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
