-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2024 pada 02.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(14, 4, 1, 1, 5100000),
(15, 4, 1, 2, 5200000),
(16, 5, 3, 1, 2189000),
(17, 5, 3, 2, 2150000),
(18, 6, 2, 0, 0),
(19, 6, 2, 1, 1010000),
(20, 6, 2, 3, 10000000),
(21, 6, 2, 2, 5000000),
(22, 7, 4, 3, 45100000),
(23, 7, 4, 1, 46000000),
(24, 8, 5, 2, 46000),
(26, 20, 4, 1, 45200000),
(27, 20, 4, 3, 45300000),
(28, 45, 5, 1, 120000),
(29, 45, 5, 3, 125000),
(30, 45, 5, 2, 110000),
(31, 47, 7, 1, 460000),
(34, 53, 2, 4, 1100000),
(35, 53, 2, 1, 1110000),
(36, 53, 2, 2, 1200000),
(37, 54, 10, 4, 135000),
(38, 54, 10, 3, 120000),
(39, 54, 10, 2, 130000),
(40, 56, 9, 1, 27000000),
(41, 56, 9, 4, 28000000),
(42, 56, 9, 3, 28100000),
(43, 57, 11, 1, 1100000),
(44, 57, 11, 2, 1500000),
(47, 59, 12, 2, 1300000),
(48, 60, 2, 1, 1010000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang`) VALUES
(1, 'Motor CB150RR', '2024-01-19', 5000000, 'Kilometer rendah'),
(2, 'Monitor Asus 45inc', '2024-01-26', 1200000, 'Kondisi Baru\r\n\r\n'),
(5, 'Zippo 35ml', '2024-01-24', 45000, 'Tidak ada minyaknya'),
(9, 'Motor Kawasaki Zx25R', '2024-01-18', 26000000, 'Ex kecelakaan'),
(12, 'Carier Osprey 50L', '2024-02-01', 1200000, 'Barang masih mulus ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_akhir` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(4, 1, '2024-01-22', 5200000, 2, 2, 'ditutup'),
(5, 3, '2024-01-22', 2189000, 1, 2, 'ditutup'),
(20, 4, '2024-01-29', 45300000, 3, 2, 'ditutup'),
(45, 5, '2024-01-29', 125000, 3, 2, 'ditutup'),
(47, 7, '2024-01-31', 460000, 1, 2, 'ditutup'),
(53, 2, '2024-01-31', 1200000, 2, 16, 'ditutup'),
(54, 10, '2024-01-31', 135000, 4, 2, 'ditutup'),
(55, 8, '2024-01-31', 0, 0, 2, 'ditutup'),
(56, 9, '2024-01-31', 28100000, 3, 2, 'ditutup'),
(57, 11, '2024-02-01', 1500000, 2, 2, 'ditutup'),
(58, 10, '2024-02-01', 0, 0, 2, 'ditutup'),
(59, 12, '2024-02-01', 1300000, 2, 2, 'ditutup'),
(60, 2, '2024-02-01', 1010000, 1, 2, 'ditutup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(1, 'Farras Iqbal', 'iqbal', '28b662d883b6d76fd96e4ddc5e9ba780', '08909098987'),
(2, 'Raja Syah', 'raja', '28b662d883b6d76fd96e4ddc5e9ba780', '0890980989'),
(3, 'Alif Farhan', 'alif', '28b662d883b6d76fd96e4ddc5e9ba780', '087880451416'),
(4, 'Raihan', 'raihan', '28b662d883b6d76fd96e4ddc5e9ba780', '08788987612');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Surya', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 2),
(18, 'Farras', 'farras', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
