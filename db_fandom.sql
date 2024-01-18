-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2024 pada 12.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fandom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', '+628123171623', 'blablabla@gmail.com', 'Taman Ciharendong Kencana Blok E34, Kuningan, Kuningan, Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_form_pemesanan`
--

CREATE TABLE `tb_form_pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `kota_kabupaten` varchar(35) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `metode` enum('COD','BCA','BNI','MANDIRI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_form_pemesanan`
--

INSERT INTO `tb_form_pemesanan` (`id_pesanan`, `nama`, `alamat`, `kota_kabupaten`, `provinsi`, `kode_pos`, `no_hp`, `email`, `nama_produk`, `metode`) VALUES
(1, 'fayyis', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzxbox@gmail.com', '', ''),
(7, 'hayam', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzofficial@gmail.com', '', ''),
(8, 'hayam', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzofficial@gmail.com', '', ''),
(9, 'hayam', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzofficial@gmail.com', '', ''),
(10, 'asdawdsd', 'Japara', 'Kuningan', 'jawa barat', 45556, 2147483647, 'admin@email.com', '', ''),
(11, 'fayyis', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzxbox@gmail.com', '', ''),
(12, 'hayam', 'Cilimus', 'Kuningan', 'jawa barat', 45556, 2147483647, 'yizzxbox@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`category_id`, `category_name`) VALUES
(17, 'Parfume');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_stock`, `date_created`) VALUES
(20, 17, 'Bulletproof', 75000, 'sdfsdf', 'produk1704888847.jpg', 100, '2024-01-10 12:14:07'),
(22, 17, 'Butter', 75000, 'adawdasdzxc', 'produk1704888908.jpg', 100, '2024-01-10 12:15:08'),
(23, 17, 'Euphoria', 75000, 'Kalau ini membuat nyaman banget, wangi yang khas yang bisa buat si DIA nempel terus', 'produk1704889039.jpg', 100, '2024-01-10 12:17:19'),
(24, 17, 'Dynamite', 75000, 'Ini cocok banget buat kamu yang suka tampil, energik, dan suka berteman', 'produk1704891237.jpg', 100, '2024-01-10 12:53:57'),
(25, 17, 'Idol', 75000, 'Ini coccok banget buat kamu yang penyayang dan pemaaf. itu yang membuat selalu inget sama kamu', 'produk1704891290.jpg', 100, '2024-01-10 12:54:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_form_pemesanan`
--
ALTER TABLE `tb_form_pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_form_pemesanan`
--
ALTER TABLE `tb_form_pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
