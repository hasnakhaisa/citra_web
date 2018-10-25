-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2018 pada 16.58
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karanga2_florist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_ID`, `category_name`, `category_image`) VALUES
(1, 'Bouquete', 'assets/uploads/category.jpg'),
(2, 'Bunga Parcel', 'assets/uploads/category.jpg'),
(3, 'Bunga Ucapan', 'assets/uploads/category.jpg'),
(4, 'Pernikahan', 'assets/uploads/category.jpg'),
(5, 'Bunga Artificial', 'assets/uploads/category.jpg'),
(6, 'Bunga Dekorasi', 'assets/uploads/category.jpg'),
(7, 'Bunga Standing', 'assets/uploads/category.jpg'),
(8, 'Bunga Krans', 'assets/uploads/category.jpg'),
(9, 'Kelahiran', 'assets/uploads/category.jpg'),
(10, 'Duka Cita', 'assets/uploads/category.jpg'),
(11, 'Ulang Tahun', 'assets/uploads/category.jpg'),
(12, 'Love Romance', 'assets/uploads/category.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `gambar`) VALUES
(32, 'assets/uploads/slider_1.jpg'),
(33, 'assets/uploads/slider_1_ah.jpg'),
(34, 'assets/uploads/slide_citra.jpg'),
(38, 'assets/uploads/diskon15.jpg'),
(39, 'assets/uploads/pahlawan2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` int(30) DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_time_duration` varchar(100) NOT NULL,
  `product_image` text,
  `product_count_view` int(11) NOT NULL,
  `product_dimensions` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `popular` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_category`, `product_price`, `product_description`, `product_time_duration`, `product_image`, `product_count_view`, `product_dimensions`, `product_weight`, `popular`) VALUES
(26, '3 Titik', 10, 500000, 'Background banner papan custom printing\r\nBunga tiga titik, posisi bunga dipojok atas kanan kiri dan tengah bawaah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/FOTO_PRODUCT.JPG', 17, '2,5x1,5M ', '3', 'tidakpopular'),
(29, '4 Titik', 10, 150000, 'Background banner papan custom printing\r\nBunga empat titik, diatas pojok kanan kiri, bawah kanan kiri dan tengah papan dengan kaki kayu.\r\nIsi bunga segar : hortensia, pikok ungu, bunga balon, krisan orens dan pink, dan daun sri gaidng.', '3', 'assets/uploads/clean.JPG', 2, '2,5x1,5M ', '3', 'tidakpopular'),
(30, '4 Titik Pita Sterofoam', 10, 1500000, 'Background banner papan custom printing dengan pita sterofoam besar\r\nBunga 4 titik, diatas pojok kanan kiri, bawah pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : Mawar putih, krisan kuning, pikok ungu dan putih, daun LL\r\n', '3', 'assets/uploads/4titikpitasterofoam.jpg', 2, ' 2,5x1,5M ', '3', 'tidakpopular'),
(31, 'Bawahan Pita Sterofoam Besar', 10, 750000, 'Background banner papan custom printing dengan pita sterofoam besar\r\nBunga full dibawah papan dengan kaki kayu.\r\nIsi bunga segar : hortensia, krisan kuning dan putih, pikok ungu dan pink, dan daun sri gading.', '3', 'assets/uploads/bawahanpitasterofoambesar.jpg', 1, '2,5x1,5M ', '3', 'tidakpopular'),
(32, 'LETER U MAHKOTA PITA STEROFOAM', 10, 2000000, 'Background banner papan custom printing dengan pita sterofoam \r\nBunga dipojok atas kanan kiri, bawah kanan kiri, tengah atas dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/letter_untuk_mahkora_pita_sterefoam.jpg', 18, '2,5x1,5M ', '3', 'tidakpopular'),
(33, '3 Titik Pita Kecil', 10, 600000, 'Background banner papan custom printing dengan pita sterofoam kecil\r\nBunga tiga titik, diatas pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : krisan pink, hortensia, pikok ungu, bunga balon, dan daun sri gading.', '3', 'assets/uploads/DUKA.jpg', 1, '2,5x1,5M ', '3', 'tidakpopular'),
(34, 'Mahkota Kaki', 10, 500000, 'Background banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, hortensia, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/mahkotakaki.JPG', 1, '2,5x1,5M ', '3', 'tidakpopular'),
(35, 'MAHKOTA, BAWAHAN, _ LINE TENGAH PITA STEROFOAM BESAR', 10, 1500000, 'Background banner papan custom printing dengan pita sterofoam besar\r\nBunga full dibawah papan dan ditengah atas papan dengan kaki kayu.\r\nIsi bunga segar : Anturium merah dan putih, hortensia, pikok ungu, daun sri gading.', '3', 'assets/uploads/MAHKOTA,_BAWAHAN,___LINE_TENGAH_PITA_STEROFOAM_BESAR.jpg', 1, '2,5x1,5M ', '3', 'tidakpopular'),
(36, '3 titik wisuda', 3, 500000, 'Background banner papan custom printing\r\nBunga tiga titik, posisi bunga dipojok atas kanan kiri dan tengah bawaah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, pikok putih dan ungu, anturium merah, bunga balon, dan daun sri gading.', '3', 'assets/uploads/3_titik_wisuda.JPG', 8, '2,5x1,5M ', '3', 'tidakpopular'),
(37, '3 titik wedding', 4, 500000, 'Background banner papan custom printing\r\nBunga tiga titik, posisi bunga dipojok atas kanan kiri dan tengah bawaah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning, pikok putih dan ungu, anturium merah, hortensia, dan daun sri gading.', '3', 'assets/uploads/3_titik_wedding.JPG', 8, '2,5x1,5M ', '1', 'tidakpopular'),
(38, 'Ucapan Wisuda', 3, 600000, 'Background banner papan custom printing dengan pita sterofoam kecil\r\nBunga tiga titik, diatas pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : pikok ungu, mawar putih dan merah, anturium merah, krisan kuning, dan daun sri gading.', '3', 'assets/uploads/3_titik_pita_kecil_.jpg', 11, '2,5x1,5M ', '3', 'tidakpopular'),
(39, 'Ucapan Pernikaan', 4, 600000, 'Background banner papan custom printing\r\nBunga tiga titik, diatas pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : bunga balon, hortensia, anturium merah, pikok ungu, krisan kuning, daun pillow dan daun sri gading.', '3', 'assets/uploads/3_titik_pita_kecil_wedding.jpg', 4, '2,5x1,5M ', '3', 'tidakpopular'),
(40, 'Bunga ucapan selamat dan sukses', 3, 1500000, 'Background banner papan custom printing dengan pita sterofoam besar\r\nBunga 4 titik, diatas pojok kanan kiri, bawah pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : Anturium merah, krisan kuning, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/4_titik_pita_sterefoam_sukses.jpg', 5, '2,5x1,5M ', '3', 'tidakpopular'),
(41, 'Ucapan ', 4, 750000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing dengan pita sterofoam besar\r\nBunga 4 titik, diatas pojok kanan kiri, bawah pojok kanan kiri dan tengah bawah papan dengan kaki kayu.\r\nIsi bunga segar : Anturium merah, hortensia, krisan kuning dan orens, mawar putih dan pink, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/4_titik_pita_sterefoam_wedding.JPG', 3, '2,5x1,5M ', '3', 'tidakpopular'),
(42, 'Bunga Ucapan Ulang Tahun', 11, 750000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing dengan pita sterofoam besar\r\nBunga full dibawah papan dengan kaki kayu.\r\nIsi bunga segar : mawar pink, anturium merah, krisan kuning, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/bawahan_pita_strerofoam_besar_sukses.jpg', 15, '2,5x1,5M ', '3', 'tidakpopular'),
(43, 'Bunga Ucapan Pernikahan', 4, 750000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing dengan pita sterofoam besar\r\nBunga full dibawah papan dengan kaki kayu.\r\nIsi bunga segar : hortensia, anturium merah, bunga balon, krisan kuning dan orens, dan daun sri gading.', '3', 'assets/uploads/bawahan_pita_sterefoam_besar_wedding.jpg', 0, '2,5x1,5M ', '3', 'tidakpopular'),
(44, 'Bunga Ucapan Pernikahan Letter Mahkota', 4, 2000000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing dengan pita sterofoam\r\nBunga full leter u dan ditengah atas papan dengan kaki kayu.\r\nIsi bunga segar : anturium merah, hortensia, krisan kuning dan orens, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/letter_mahkota_pita_sterefoam_wedding.jpg', 0, '2,5x1,5M ', '3', 'tidakpopular'),
(45, 'Letter Mahkota', 11, 2000000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing\r\nBunga full mengelilingi papan dengan kaki kayu.\r\nIsi bunga segar : anturium merah, hortensia, mawar putih, bunga balon, krisan kuning, pikok ungu, dan daun pillow.', '3', 'assets/uploads/letter_mahkota_britday.jpg', 4, '2,5x1,5M ', '3', 'tidakpopular'),
(46, 'Wedding Mahkota Bawahan', 4, 1000000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing\r\nBunga diatas tengah papan dan full bawah papan dengan kaki kayu.\r\nIsi bunga segar : mawar merah dan pink, aster, pikok putih dan ungu, krisan kuning, daun sri gading dan daun pillow', '3', 'assets/uploads/Mahkota_Bawahan_WEDDING.JPG', 2, '2,5x1,5M ', '3', 'tidakpopular'),
(47, 'Bunga Ucapan Ulang Tahun', 11, 1000000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing dengan pita sterofoam besar\r\nBunga full dibawah papan dan ditengah atas papan dengan kaki kayu.\r\nIsi bunga segar : Anturium merah, hortensia, bunga balon, pikok ungu, daun sri gading.', '3', 'assets/uploads/mahkota_bawahan_pita_sterofoam_besar_sukses.jpg', 8, '2,5x1,5M ', '3', 'tidakpopular'),
(48, 'Bunga Ucapan Grand Opening', 3, 500000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : hortensia, anturium merah, pikok kuning, dan daun sri gading.', '3', 'assets/uploads/mahkota_kaki_SUKSES.jpg', 2, '2,5x1,5M ', '3', 'tidakpopular'),
(49, 'Bunga Ucapan Pernikahan', 4, 500000, 'Bentuk papan persegi panjang ukuran 2,5x1,5M \r\nBackground banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, hortensia, pikok ungu, bunga balon, dan daun sri gading.', '3', 'assets/uploads/Mahkota_Kaki_WEDDING.jpg', 0, '2,5x1,5M ', '1', 'tidakpopular'),
(51, 'Duka Mahkota dan Kaki', 10, 400000, 'Bentuk papan persegi panjang ukuran 2x1,2M \r\nBackground banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning, bunga balon, pikok ungu, aster putih, dau pillow dan daun sri gading.', '3', 'assets/uploads/DUKA_MAHKOTA_DAN_KAKI.jpg', 0, '2x1,2M ', '3', 'popular'),
(52, 'Bunga Ucapan Sukses Mahkota dan Kaki', 3, 400000, 'Bentuk papan persegi panjang ukuran 2x1,2M \r\nBackground banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : Mawar putih dan pink, Krisan orens dan kuning, hortensia, pikok ungu, daun pillow dan daun sri gading. ', '3', 'assets/uploads/SUKSES_Mahkota_dan_Kaki.jpg', 4, '2x1,2M', '1', 'popular'),
(53, 'Bunga Pernikahan Mahkota dan Kaki', 4, 400000, 'entuk papan persegi panjang ukuran 2x1,2M \r\nBackground banner papan custom printing\r\nBunga dua titik, posisi bunga ditengah atas dan bawah dengan kaki kayu.\r\nIsi bunga segar : Anturium merah, hortensia, krisan kuning, pikok, daun sri gading.', '1', 'assets/uploads/Wedding_Mahkota_dan_Kaki.jpg', 1, '2x1,2M ', '1', 'tidakpopular'),
(54, 'Bunga Ucapan Anniversary', 12, 1000000, 'Bentuk papan persegi panjang ukuran 3x1,8M \r\nBackground banner papan custom printing\r\nBunga tiga titik, posisi bunga dipojok atas kanan kiri dan tengah bawaah dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan orens, anturium merah, pikok ungu, dan daun sri gading', '3', 'assets/uploads/ANNIVERSARY.jpg', 17, '2x1,2M ', '1', 'popular'),
(55, 'Bunga Ucapan Model 3M', 3, 2200000, 'Bentuk papan persegi panjang ukuran 3x1,8M \r\nBackground banner papan custom printing dengan pita sterofoam\r\nBunga 4 titik pojok kanan kiri atas bawah dan tengah bawah papan.\r\nIsi bunga segar : krisan kuning dan orens, pikok ungu dan putih, dan daun pillow.', '3', 'assets/uploads/Sukses_4_titik_pita_Sterofoam_3M.jpg', 7, '3x1,8M', '3', 'popular'),
(56, 'Bunga Ucapan Anniversary Model Letter U', 12, 2200000, 'Bentuk papan persegi panjang ukuran 3x1,8M \r\nBackground banner papan custom printing\r\nBunga full leter u mngelilingi papan dengan kaki kayu.\r\nIsi bunga segar : krisan kuning dan putih, anturium merah, pikok ungu, dan daun sri gading.', '3', 'assets/uploads/Sukses_Letter_U_3M.jpg', 3, '3x1,8M ', '1', 'popular'),
(57, 'Buket 100 Mawar Segar', 1, 1000000, 'Isi buket bunga segar : 100 mawar putih\r\nbentuk rangkaian : bulat kertas tissue putih dan coklat, pita gold\r\nevent : wisuda, hadiah ulangtaun, ucapan anniversary, ucapan lekas sembuh', '2 jam', 'assets/uploads/100_MAWAR_.jpg', 8, '50 x 30 cm', '1', 'popular');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_ID` int(11) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `transaction_time` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  `transaction_image` varchar(255) NOT NULL,
  `destination_address` varchar(255) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `transaction_status`, `transaction_time`, `user_ID`, `transaction_image`, `destination_address`, `information`) VALUES
(1, 'Belum isi detail', '0000-00-00', 13, '', '', ''),
(2, 'Konfirmasi Pembayaran', '0000-00-00', 32, '', 'Jl. Semarang No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145, Indonesia', ''),
(5, 'Konfirmasi Pembayaran', '0000-00-00', 33, '', 'Malang, Kota Malang, Jawa Timur, Indonesia', ''),
(6, 'Belum isi detail', '2018-08-30', 33, '', '', ''),
(7, 'Konfirmasi Pembayaran', '2018-08-30', 33, '', 'Jl. Gebang Lor No.79D, RT.003/RW.01, Gebang Putih, Sukolilo, Kota SBY, Jawa Timur 60117, Indonesia', ''),
(8, 'Belum isi detail', '2018-08-30', 33, '', '', ''),
(9, 'Konfirmasi Pembayaran', '2018-08-31', 34, '', 'Jl. Mayjen Sungkono No.120, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256, Indonesia', ''),
(10, 'Belum isi detail', '2018-08-31', 36, '', '', ''),
(11, 'Konfirmasi Pembayaran', '2018-08-31', 36, '', 'Jl. Bratang Wetan III, Ngagelrejo, Wonokromo, Kota SBY, Jawa Timur 60245, Indonesia', ''),
(12, 'Konfirmasi Pembayaran', '2018-08-31', 32, '', 'bsbs', ''),
(13, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(14, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(15, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(16, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(17, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'alamat', ''),
(18, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(19, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(20, 'Konfirmasi Pembayaran', '2018-09-01', 43, 'uploads/aWlaNnZW_700w_0.jpg', 'Jl. Arif Rahman Hakim No.61, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(21, 'Konfirmasi Pembayaran', '2018-09-01', 43, 'uploads/infographic-Dicoding-2017-small.png', 'tulisan', ''),
(22, 'Konfirmasi Pembayaran', '2018-09-01', 43, 'uploads/infographic-Dicoding-2017-small1.png', 'sjs', ''),
(23, 'Konfirmasi Pembayaran', '2018-09-01', 43, 'uploads/infographic-Dicoding-2017-small2.png', 'jfjd', ''),
(24, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Alamat', ''),
(25, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'vhcu', ''),
(26, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'f', ''),
(27, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'Jl. Arif Rahman Hakim No.177, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia', ''),
(28, 'Konfirmasi Pembayaran', '2018-09-01', 43, '', 'ssffv', ''),
(29, 'Konfirmasi Pembayaran', '2018-09-06', 32, '', 'Jl. Wisma Permai I No.100, Mulyorejo, Kota SBY, Jawa Timur 60115, Indonesia', ''),
(30, 'Konfirmasi Pembayaran', '2018-09-06', 43, '', 'bb', ''),
(31, 'Konfirmasi Pembayaran', '2018-09-07', 43, '', 'fff', ''),
(32, 'Belum isi detail', '2018-09-07', 43, '', '', ''),
(33, 'Belum isi detail', '2018-09-07', 43, '', '', ''),
(34, 'Konfirmasi Pembayaran', '2018-09-07', 43, 'uploads/IMG_20180906_125010.jpg', 'hhh', ''),
(35, 'Konfirmasi Pembayaran', '2018-09-07', 43, '', 'sjsjs', ''),
(36, 'Konfirmasi Pembayaran', '2018-09-07', 43, 'uploads/IMG_20180904_104726.jpg', 'djdj', ''),
(37, 'Belum isi detail', '2018-09-07', 43, '', '', ''),
(38, 'Belum isi detail', '2018-09-07', 43, '', '', ''),
(39, 'Konfirmasi Pembayaran', '2018-09-07', 43, 'uploads/IMG_20180906_1250101.jpg', 'vxvd\n', ''),
(40, 'Konfirmasi Pembayaran', '2018-09-07', 43, '', 'bsns', ''),
(41, 'Konfirmasi Pembayaran', '2018-09-07', 43, '', 'Surabaya, Surabaya City, East Java, Indonesia', ''),
(42, 'Konfirmasi Pembayaran', '2018-09-07', 43, '', 'jdjdjd', ''),
(43, 'Konfirmasi Pembayaran', '2018-09-07', 43, 'uploads/IMG_20180906_1250102.jpg', 'Surabaya, Surabaya City, East Java, Indonesia', ''),
(44, 'Konfirmasi Pembayaran', '2018-09-07', 32, '', 'Jl. Menur Pumpungan No.30, Menur Pumpungan, Sukolilo, Kota SBY, Jawa Timur 60118, Indonesia', ''),
(45, 'Konfirmasi Pembayaran', '2018-09-07', 32, '', 'Jl. Menur Pumpungan No.30, Menur Pumpungan, Sukolilo, Kota SBY, Jawa Timur 60118, Indonesia', ''),
(46, 'Belum isi detail', '2018-09-11', 36, '', '', ''),
(47, 'Konfirmasi Pembayaran', '2018-09-11', 36, '', 'bratang', ''),
(48, 'Barang Diproses', '2018-09-12', 44, '', 'Jl. Panjang jiwa no 112', 'Barang proses pengiriman'),
(49, 'Belum isi detail', '2018-09-15', 43, '', '', ''),
(50, 'Barang Diproses', '2018-09-15', 47, '', 'hxhx', ''),
(51, 'Belum isi detail', '2018-10-01', 34, '', '', ''),
(52, 'Barang diTerima', '2018-10-05', 49, 'uploads/IMG-20181005-WA0018.jpg', 'graha its', 'sudah kirim'),
(53, 'Barang Diproses', '2018-10-07', 47, '', 'lengkap', ''),
(54, 'Barang Diproses', '2018-10-07', 47, '', 'alamat', ''),
(55, 'Barang Diproses', '2018-10-07', 47, '', 'mm', ''),
(56, 'Belum isi detail', '2018-10-08', 54, '', '', ''),
(57, 'Belum isi detail', '2018-10-09', 32, '', '', '');

--
-- Trigger `transaction`
--
DELIMITER $$
CREATE TRIGGER `tanggal` BEFORE INSERT ON `transaction` FOR EACH ROW BEGIN
    IF NEW. transaction_time = '0000-00-00' THEN
        SET NEW.transaction_time= CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `detail_ID` int(11) NOT NULL,
  `transaction_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction_detail`
--

INSERT INTO `transaction_detail` (`detail_ID`, `transaction_ID`, `product_ID`, `quantity`, `price`, `total_payment`) VALUES
(1, 1, 54, 1, '1000000.0', '1000000.0'),
(2, 2, 36, 1, '500000.0', '500000.0'),
(5, 5, 37, 1, '500000.0', '500000.0'),
(6, 6, 32, 2, '2000000.0', '4000000.0'),
(7, 7, 42, 1, '750000.0', '750000.0'),
(8, 8, 54, 1, '1000000.0', '1000000.0'),
(9, 9, 54, 1, '1000000.0', '1000000.0'),
(10, 10, 47, 1, '1000000.0', '1000000.0'),
(11, 11, 32, 1, '2000000.0', '2000000.0'),
(12, 12, 29, 1, '150000.0', '150000.0'),
(13, 13, 54, 1, '1000000.0', '1000000.0'),
(14, 14, 54, 1, '1000000.0', '1000000.0'),
(15, 15, 42, 1, '750000.0', '750000.0'),
(16, 16, 55, 1, '2200000.0', '2200000.0'),
(17, 17, 38, 1, '600000.0', '600000.0'),
(18, 18, 42, 2, '750000.0', '1500000.0'),
(19, 19, 47, 1, '1000000.0', '1000000.0'),
(20, 20, 38, 1, '600000.0', '600000.0'),
(21, 21, 32, 1, '2000000.0', '2000000.0'),
(22, 22, 54, 1, '1000000.0', '1000000.0'),
(23, 23, 42, 2, '750000.0', '1500000.0'),
(24, 24, 47, 1, '1000000.0', '1000000.0'),
(25, 25, 42, 1, '750000.0', '750000.0'),
(26, 26, 38, 1, '600000.0', '600000.0'),
(27, 27, 42, 1, '750000.0', '750000.0'),
(28, 28, 32, 1, '2000000.0', '2000000.0'),
(29, 29, 42, 1, '750000.0', '750000.0'),
(30, 30, 42, 1, '750000.0', '750000.0'),
(31, 31, 26, 1, '500000.0', '500000.0'),
(32, 32, 32, 1, '2000000.0', '2000000.0'),
(33, 33, 32, 2, '2000000.0', '4000000.0'),
(34, 34, 32, 3, '2000000.0', '6000000.0'),
(35, 35, 32, 4, '2000000.0', '8000000.0'),
(36, 36, 37, 2, '500000.0', '1000000.0'),
(37, 37, 42, 1, '750000.0', '750000.0'),
(38, 38, 42, 2, '750000.0', '1500000.0'),
(39, 39, 42, 3, '750000.0', '2250000.0'),
(40, 40, 52, 1, '400000.0', '400000.0'),
(41, 41, 52, 2, '400000.0', '800000.0'),
(42, 42, 46, 1, '1000000.0', '1000000.0'),
(43, 43, 32, 1, '2000000.0', '2000000.0'),
(44, 44, 54, 1, '1000000.0', '1000000.0'),
(45, 45, 32, 1, '2000000.0', '2000000.0'),
(46, 46, 52, 1, '400000.0', '400000.0'),
(47, 47, 37, 1, '500000.0', '500000.0'),
(48, 48, 37, 1, '500000.0', '500000.0'),
(49, 49, 26, 1, '500000.0', '500000.0'),
(50, 50, 34, 1, '500000.0', '500000.0'),
(51, 51, 26, 1, '500000.0', '500000.0'),
(52, 52, 38, 1, '600000.0', '600000.0'),
(53, 53, 57, 1, '1000000.0', '1000000.0'),
(54, 54, 57, 1, '1000000.0', '1000000.0'),
(55, 55, 57, 1, '1000000.0', '1000000.0'),
(56, 56, 57, 1, '1000000.0', '1000000.0'),
(57, 57, 54, 1, '1000000.0', '1000000.0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_telephone` varchar(255) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_ID`, `user_name`, `user_fullname`, `user_password`, `user_email`, `user_telephone`, `user_address`) VALUES
(1, 'nurdicky', 'Dicky Nur Laili', 'e172dd95f4feb21412a692e73929961e', 'nurdicky8@gmail.com', '081513642456', 'Sambogunung Dukun Gresik'),
(2, 'adam', 'Adam Jhonson', 'e10adc3949ba59abbe56e057f20f883e', 'adam@gmail.com', '085655727695', 'Jalan Gajah Mada Rt 8a'),
(3, 'testing', 'testing saya', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing@gmail.com', '081291889131', 'jl. testing jaya raya'),
(4, 'dd', '', '104a73062ab40e4a6f2f5216d6545c02', 'dd@gmail.com', '', ''),
(5, 'fitriani', '', '8ac99bb12b7c18e27d06fd34fe1203fc', 'fitri@gmail.com', '', ''),
(7, 'cNTIK', '', '09daf55148da4f6052c56bea07380109', 'nds@gmail.com', '', ''),
(8, 'choirun', '', '2cb72a5cd3899a67f0a92ab699b72ef6', 'choirun@gmail.com', '', ''),
(9, 'elkiar', '', '468b722fd761304d7d1068990e2b1cc5', 'elkiar@gmail.com', '', ''),
(10, 'elkiar', '', '468b722fd761304d7d1068990e2b1cc5', 'elkiar@gmail.com', '', ''),
(11, 'kaka', '', '5d052f1e32af4e4ac2544a5fc2a9b992', 'kaka@gmail.com', '', ''),
(13, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', ''),
(14, 'haha', '', '7694f4a66316e53c8cdd9d9954bd611d', 'jzj@jaja.com', '', ''),
(15, 'coba', '', '202cb962ac59075b964b07152d234b70', 'coba@coba.com', '', ''),
(16, 'coba1', '', '202cb962ac59075b964b07152d234b70', 'coba1@coba.com', '', ''),
(17, 'coba2', '', '202cb962ac59075b964b07152d234b70', 'coba2@coba.com', '123123', ''),
(18, 'coba3', '', 'c4ca4238a0b923820dcc509a6f75849b', 'Kjaj@ajja.con', '3136', ''),
(20, 'hasnak', '', '577ead1a1b2dd28db1b7a4e28038e70a', 'hasna@hasna.com', '08129', ''),
(22, 'hasna1', '', '809966f3f02a7d044c02e808bf6d28a0', 'hasnakhaisa@gmail.com', '0812', ''),
(30, 'destiana choirun nisak', '', '911eda46da6f22a8f9cebc5282a2d069', 'destiana082@gmail.com', '085130408600', ''),
(32, 'citra_test', 'ftp', '53607741a975c45b498e5b494b1c1d53', 'ftp.pens@gmail.com', '081285285285', ''),
(33, 'destiana', '', '25d55ad283aa400af464c76d713c07ad', 'destianachoirunnisak@yahoo.com', '085130408600', 'Gebang lor 100'),
(35, 'rudy', '', 'c01c037d5cb7a7da1eb2cffbdffabbfd', 'rudygober3@gmail.com', '081233649623', ''),
(36, 'riaaa', '', '9a2b23bcb4138b67334c7dcfcc9fe13f', 'noerrhiannah95@gmail.com', '083849153579', ''),
(37, 'Fara', '', '534b9e98db281e5007cbadab911baa29', 'faragisca@gmail.com', '087852950567', ''),
(38, 'Irvan', '', 'e0886d79dc78ceb3bdb93eebad9ca7e5', 'irvandkv1045@gmail.com', '085606090006', ''),
(43, 'kw', 'Miftahun Jones', 'c4ca4238a0b923820dcc509a6f75849b', 'dateebdev@gmail.com', '081358847213', ''),
(44, 'citra florist', '', 'c01c037d5cb7a7da1eb2cffbdffabbfd', 'citra.florist@yahoo.com', '081232565897', ''),
(45, 'jaja', '', 'c4ca4238a0b923820dcc509a6f75849b', 'kucing@gmail.com', '36', ''),
(46, 'meong', '', 'c9f0f895fb98ab9159f51fd0297e236d', 'miftahunajat', '1', ''),
(47, 'top', '', 'c4ca4238a0b923820dcc509a6f75849b', 'miftahunajat@gmail.com', '081358', ''),
(48, 'lidhiyar', '', '06b836012fea846d9a82cfda4adc2cc9', 'dhiyarland@gmail.com', '085722373738', ''),
(49, 'roni', '', 'c077b683eb089d6118a43d57768122dd', 'citraflowershop@gmail.com', '082245786940', ''),
(50, 'putria ', '', '2dd94b3ee212944b49d8d8f4771d3a40', 'putri.dwip@gmail.com', '081938002028', ''),
(51, 'malinda', '', 'a2aef80e01d6c7d32270f9636781a579', 'mavensaaurora@gmail.com', '081357628897', ''),
(52, 'rudy darmawan', '', 'c01c037d5cb7a7da1eb2cffbdffabbfd', 'rudygober14@gmail.com', '081233649623', ''),
(53, 'Nazhier', '', 'bca02f359e7670c6a754d94652d986fc', 'nazhier9974@gmail.com', '085733956091', ''),
(54, 'nazhier9974', '', '5012a1cbc560d21c9ad22c555790c2b0', 'nazhier.rijalana-2016@fst.unair.ac.id', '085733956091', ''),
(55, 'prihatno96', '', 'c6778450c96b3b5c0f897b9e9c9e5a8e', 'prihatno96@gmail.com', '085729675296', ''),
(56, 'Rizka', '', 'aa61bcbe7fd8d8851a3ef2638f4769c9', 'smirizka@gmail.com', '089661525951', ''),
(57, 'Sholikan', '', 'c5d4a4d7ec4e555e458b10092ba88389', 'sholikankhan@gmail.con', '081318719552', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_admin`
--

CREATE TABLE `user_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_admin`
--

INSERT INTO `user_admin` (`admin_ID`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin'),
(2, 'citra_admin', 'citraHARUM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`detail_ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indeks untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
