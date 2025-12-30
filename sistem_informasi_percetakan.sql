-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_percetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `satuan` varchar(50) DEFAULT NULL,
  `harga_beli` decimal(12,2) DEFAULT 0.00,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `stok`, `satuan`, `harga_beli`, `created_at`, `updated_at`) VALUES
(1, 'kain', 200, '100', 1000000.00, '2025-12-26 15:45:54', '2025-12-26 15:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `bahan_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `pembelian_id`, `bahan_id`, `qty`, `harga`, `subtotal`) VALUES
(4, 8, 1, 1, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  `bahan_id` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(12,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `satuan` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `deskripsi`, `harga`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Brosur A4', 'Layanan cetak brosur ukuran A4 siap cetak', 1500.00, 'lembar', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(2, 'Banner Flexi', 'Layanan cetak banner bahan flexi indoor/outdoor', 45000.00, 'meter', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(3, 'Poster', 'Layanan cetak poster full color', 8000.00, 'lembar', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(4, 'Kartu Nama', 'Layanan cetak kartu nama 1 box isi 100 pcs', 60000.00, 'box', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(5, 'Stiker Vinyl', 'Layanan cetak stiker bahan vinyl tahan air', 3000.00, 'lembar', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(6, 'Undangan', 'Layanan cetak undangan berbagai acara', 5000.00, 'lembar', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(7, 'Sertifikat', 'Layanan cetak sertifikat kertas premium', 4500.00, 'lembar', '2025-12-30 01:08:52', '2025-12-30 01:08:52'),
(8, 'Nota', 'Layanan cetak nota rangkap per buku', 75000.00, 'buku', '2025-12-30 01:08:52', '2025-12-30 01:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `log_revisi`
--

CREATE TABLE `log_revisi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `user_id`, `nama`, `telepon`, `email`, `alamat`, `username`, `password_hash`, `created_at`, `updated_at`) VALUES
(2, 0, 'Revalnugraha', '081234567890', 'revalnugraha@gmail.com', 'Jl. Mawar No. 123, Bandung', 'Reval', '$2y$10$aGz.Pi7nC6uYvSNMy07Cf.mtvkq6bnnJMSKeX2ZWXcQ6aMcZvSqyC', '2025-12-25 15:53:18', '2025-12-25 15:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `metode` enum('cash','transfer','qris') NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `kode`, `supplier_id`, `tanggal`, `total`, `catatan`) VALUES
(8, '1', 3, '2025-12-01 00:00:00', 50000000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kontak` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`) VALUES
(3, 'Ginop', NULL, 'subang', '2025-12-28 08:29:05', '2025-12-28 08:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('draft','proses','selesai','batal') NOT NULL DEFAULT 'draft',
  `total` decimal(12,2) NOT NULL DEFAULT 0.00,
  `catatan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `pelanggan_id`, `layanan_id`, `tanggal`, `status`, `total`, `catatan`, `created_at`, `updated_at`) VALUES
(12, '', 2, 1, '2025-12-30 13:45:39', '', 0.00, NULL, '2025-12-30 13:45:39', '2025-12-30 21:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_app`
--

CREATE TABLE `user_app` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `role` enum('admin','karyawan','pelanggan') NOT NULL DEFAULT 'karyawan',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_app`
--

INSERT INTO `user_app` (`id`, `username`, `password_hash`, `nama`, `role`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$ut5xBiZ.Q7FfZWifkhtxHuwfhBi1aAh3Pnx/FuKrw57EzCuwmrnBK', 'Administrator', 'admin', 1, '2025-12-25 15:13:25', '2025-12-25 15:13:25'),
(2, 'karyawan', '$2y$10$cSB8JGt42YfDVtfOE3x6dOvR5MpmcIjiu61caIgnhLTNST/NcNzye', 'Staff Percetakan', 'karyawan', 1, '2025-12-25 15:14:39', '2025-12-25 15:14:39'),
(3, 'Akmal', '$2y$10$HdhZb4jidZGuZlBH/6rzDu08Nt1mp53H/HwjC3PPtMU7NI9cMgSrq', 'AkmalNurpajar', 'pelanggan', 1, '2025-12-28 19:40:55', '2025-12-28 19:40:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_id` (`pembelian_id`),
  ADD KEY `bahan_id` (`bahan_id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `layanan_id` (`layanan_id`),
  ADD KEY `bahan_id` (`bahan_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_revisi`
--
ALTER TABLE `log_revisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `fk_transaksi_layanan` (`layanan_id`);

--
-- Indexes for table `user_app`
--
ALTER TABLE `user_app`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_revisi`
--
ALTER TABLE `log_revisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_app`
--
ALTER TABLE `user_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `detail_pesanan_ibfk_3` FOREIGN KEY (`bahan_id`) REFERENCES `bahan` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `log_revisi`
--
ALTER TABLE `log_revisi`
  ADD CONSTRAINT `log_revisi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_revisi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_app` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_layanan` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
