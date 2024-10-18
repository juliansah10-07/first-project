-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2024 pada 05.05
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xmarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `harga_barang` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `jenis_barang`, `harga_barang`) VALUES
(1, 'Chiki', 100, 'Snack', 100000),
(2, 'Milkuat', 10, 'Susu', 10000),
(5, 'Cimori', 5, 'Susu', 12000),
(8, 'Milkuat', 123, 'Susu', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_brg_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` float NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_brg_keluar`, `tanggal`, `nama_barang`, `jenis_barang`, `jumlah_barang`, `harga_barang`, `total_harga`) VALUES
(3, '2024-10-12', 'Milkuat', 'Susu', 100, 10000, 100000),
(4, '2024-10-14', 'Milkuat', 'Kebersihan', 231, 2, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_brg_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` float NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_brg_masuk`, `tanggal`, `nama_barang`, `jenis_barang`, `jumlah_barang`, `harga_barang`, `total_harga`) VALUES
(1, '2024-10-19', 'Chiki', 'Snack', 20, 10000, 200000),
(5, '2024-10-11', 'Chiki', 'Kebersihan', 12, 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_pemasukan` float NOT NULL,
  `total_pengeluaran` float NOT NULL,
  `total_keuntungan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `tanggal`, `total_pemasukan`, `total_pengeluaran`, `total_keuntungan`) VALUES
(3, '2024-10-05', 90000000, 10000000, 80000000),
(5, '2024-10-05', 202020, 101010, 101010),
(6, '2024-10-05', 22, 22, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama`, `email`, `password`) VALUES
(1, 2024101601, 'admin pertama', 'adminsatu@gmail.com', '$2y$10$ooEEHauoA2p1lPsak.rRoeQNIPhQJE5z6ug1luKFr6Yl5b7L8wNsm'),
(2, 2024101602, 'admin dua', 'admindua02@yahoo.com', '$2y$10$MmeYXOiDZ48fdnlPRuG6eOxNpEyahvsGbxJTtGDYsQv1IfSyxQ9Z.'),
(3, 123, 'tamu', 'cc@gmail.com', '$2y$10$7eHOZkWcvr.czQ4xja/gWuTpMARq9lM7SIMl9yQPJxh1lm/8cXwc2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_brg_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_brg_masuk`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_brg_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
