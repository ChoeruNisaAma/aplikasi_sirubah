-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2020 pada 11.21
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-rubah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`username`, `password`) VALUES
('coba', '$2y$10$Tc6hvjY9bgftLjKNiGAeD.6.k8coFOk7PwcH6fRKtwZ'),
('hahaha', '$2y$10$wrnrrc3szYCH3Syc/fCBSuzhFz70YvP9URaWj569u26'),
('hapus', '$2y$10$Fy8zr5bzz/yczdG0V8JzB.gM0it5Bxp71QD.6V3bMA8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_rt`
--

CREATE TABLE `admin_rt` (
  `id_rt` int(10) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_rw` int(10) NOT NULL,
  `scan_ktp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_rw`
--

CREATE TABLE `admin_rw` (
  `id_rw` int(10) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `scan_ktp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_kelurahan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_srt`
--

CREATE TABLE `jenis_srt` (
  `id` int(11) NOT NULL,
  `jenis` text NOT NULL,
  `syarat` longtext NOT NULL,
  `biaya` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `jml_berkas` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_srt`
--

INSERT INTO `jenis_srt` (`id`, `jenis`, `syarat`, `biaya`, `waktu`, `produk`, `jml_berkas`) VALUES
(1, 'Basis Data Terpadu (BDT)', 'Persyaratan yang perlu dipersiapkan :\r\n 1. Surat Pengantar RT dan RW\r\n 2. Scan Kartu Keluarga\r\n', 'Gratis', '5 - 10 menit', 'Penerbitan Surat Pengantar BDT yang ditandatangani oleh Bp. Lurah dan distempel basah ', 1),
(8, 'Kartu Tanda Penduduk (KTP) Baru', 'Persyaratan KTP Baru bagi WNI :\r\n 1. Telah berusia 17 tahun lebih sehari/sudah kawin\r\n 2. Surat Pengantar dari RT dan RW\r\n 3. Scan Kartu Keluarga\r\n\r\n', 'Gratis', '5 - 10 menit', 'Produk Surat Pengantar KTP yang ditandatangani oleh Bp. Lurah atau Kepala Seksi dan distempel basah', 1),
(9, 'Kartu Keluarga (KK)', 'Persyaratan yang perlu dipersiapkan :\r\n 1. Surat Pengantar RT dan RW\r\n 2. Scan Kartu Keluarga\r\n', 'Gratis', '5 - 10 Menit', 'Produk Surat Pengantar Kartu Keluarga yang ditandatangani oleh Bp. Lurah atau Kepala Seksi dan diste', 1),
(10, 'Surat Kelahiran/Akte Kelahiran', 'Persyaratan yang perlu dipersiapkan :\r\n 1. Scan Kartu Keluarga\r\n 2. Scan KTP Ayah\r\n 3. Scan KTP Ibu\r\n 4. Scan Lembar Surat Nikah Ayah\r\n 5. Scan Lembar Surat Nikah Ibu\r\n 6. Surat Keterangan Lahir dari Rumah Sakit yang sudah ditulis nama bayi\r\n', 'Gratis', '5 - 10 Menit', 'Produk Surat Pengantar Kartu Keluarga yang ditandatangani oleh Bp. Lurah atau Kepala Seksi dan diste', 6),
(13, 'cobaa lagiii dong', 'masih coba lagiii ini \r\nmash gagal', 'lagi coba lagi lhooo', 'ini nyobain lagi', 'coba dong berhasil', 4),
(14, 'bbbb', 'syarat :\r\n 1. ktp\r\n 2. mklll', 'gratis', '5-6 menit', 'jjjjjabms', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nama` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `nama_rt` varchar(50) NOT NULL,
  `nama_rw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `scan_ktp` varchar(128) NOT NULL,
  `token` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nama`, `nik`, `password`, `kelurahan`, `nama_rt`, `nama_rw`, `email`, `no_hp`, `alamat`, `scan_ktp`, `token`) VALUES
('Punya Sasa Cantik', '1212', '$2y$10$uyvqRayekrRYzqlVhO1/KOOlqV9GzDw5yIOHvpiNJ0BNXs1tJf14u', 8, '12', '12', 'cuantiknya@gmail.com', '0875436789', 'Jalan Timoho Barat 1 No 8', '03f952805e3d4926c43d9456a53df4aa.png', 'ca7b648d1e436115d6a6efdc0a4082ee88972d0f60f6f5afe76982f635974121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_kelurahan`
--

CREATE TABLE `nama_kelurahan` (
  `id` int(11) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kontak` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_kelurahan`
--

INSERT INTO `nama_kelurahan` (`id`, `instansi`, `lokasi`, `kontak`, `username`, `password`) VALUES
(2, 'Kelurahan Banyumanik', 'jalan Perintis Kemerdekaan No 9', 'Telepon:(024) 746.4044', 'Banyumanik', 'Banyumanik'),
(3, 'Kelurahan Pundak Payung', '', '', '', ''),
(4, 'Kelurahan Gedawang', '', '', '', ''),
(5, 'Kelurahan Pedangsari', '', '', '', ''),
(6, 'Kelurahan Srondol Wetan', '', '', '', ''),
(7, 'Kelurahan Pedalangan', '', '', '', ''),
(8, 'Kelurahan Sumurboto', '', '', '', ''),
(9, 'Kelurahan Tinjomoyo', '', '', '', ''),
(10, 'Kelurahan Srondol Kulon', '', '', '', ''),
(11, 'Kelurahan Ngesrep', '', '', '', ''),
(14, 'Kelurahan Jabungan', 'Jabungan', 'jabungan@gmail.com', 'Jabungan', '$2y$10$uLWyGUUKnHOM.FMhVP.7LOSYa3KfSGop.WyDtY6KZ2teBoZmj.IKK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_srt` int(10) NOT NULL,
  `jenis_srt` varchar(50) NOT NULL,
  `jml_berkas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_akte_lahir`
--

CREATE TABLE `surat_akte_lahir` (
  `nik` char(17) NOT NULL,
  `kk` varchar(125) NOT NULL,
  `ktp_ibu` varchar(125) NOT NULL,
  `ktp_ayah` varchar(125) NOT NULL,
  `surat_nikah` varchar(125) NOT NULL,
  `suket_lahir` varchar(125) NOT NULL,
  `tgl` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_akte_lahir`
--

INSERT INTO `surat_akte_lahir` (`nik`, `kk`, `ktp_ibu`, `ktp_ayah`, `surat_nikah`, `suket_lahir`, `tgl`) VALUES
('1212', '', '', '', '', '', '16 Maret 2020'),
('1212', '0f6934a7a2d375156a761e33a239e4c4.png', 'd523f8f1d8167d5e40d1f544eafeda2f.png', 'd523f8f1d8167d5e40d1f544eafeda2f.png', 'd523f8f1d8167d5e40d1f544eafeda2f.png', 'd523f8f1d8167d5e40d1f544eafeda2f.png', '16 Maret 2020'),
('1212', '', '', '', '', '', '16 Maret 2020'),
('1212', '', '', '', '', '', '16 Maret 2020'),
('1212', '', '', '', '', '', '16 Maret 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_bdt`
--

CREATE TABLE `surat_bdt` (
  `id_bdt` int(128) NOT NULL,
  `nik` char(17) NOT NULL,
  `kk` varchar(128) NOT NULL,
  `tgl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_bdt`
--

INSERT INTO `surat_bdt` (`id_bdt`, `nik`, `kk`, `tgl`) VALUES
(1, '1212', 'localhost_perpus_.png', '0000-00-00'),
(2, '1212', '4bce47f8b79468b2852161811640cd73.png', '0000-00-00'),
(3, '1212', '70d8f4ded4c4eb1019576af0412f1b67.png', '0000-00-00'),
(4, '1212', '4914840647c6722992c93c08863f09ba.png', '0000-00-00'),
(5, '1212', '46c994c5716ad8f5776fa964191c2df0.png', '0000-00-00'),
(6, '1212', '7fa8d735eda77d567da62f6b22bd5fb2.png', '16 Maret 2020'),
(7, '1212', 'a67f0c4f14e88746232da58f391beb91.png', '16 Maret 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_srt` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `admin_rt`
--
ALTER TABLE `admin_rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indeks untuk tabel `admin_rw`
--
ALTER TABLE `admin_rw`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indeks untuk tabel `jenis_srt`
--
ALTER TABLE `jenis_srt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `kelurahan` (`kelurahan`);

--
-- Indeks untuk tabel `nama_kelurahan`
--
ALTER TABLE `nama_kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_bdt`
--
ALTER TABLE `surat_bdt`
  ADD PRIMARY KEY (`id_bdt`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_srt`
--
ALTER TABLE `jenis_srt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nama_kelurahan`
--
ALTER TABLE `nama_kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `surat_bdt`
--
ALTER TABLE `surat_bdt`
  MODIFY `id_bdt` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`kelurahan`) REFERENCES `nama_kelurahan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
