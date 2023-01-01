-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `img`) VALUES
(1, 'Knalpot Akrapovic BMWS1000RR', 'Bahan: Titanium Ini adalah sistem pembuangan AKRAPOVIC yang diadopsi oleh banyak tim papan atas yang berpartisipasi dalam balapan terkenal dunia seperti MOTO GP/WSB/AMA. Permata tertinggi yang digabungkan dengan teknologi canggih dan keahlian dalam dimens', 1900000, 'akrapovic.jpg'),
(2, 'Shockbreaker Shock RCB MB2', 'UKURAN 305/330 MM ORIGINAL.  Shockbreaker  Rcb Tabung atas Model cakep dijamin empuk bos  Ready warna merah kuning dan titanium Tinggi 330/305 mm.', 1900000, 'Shockbreaker.jpg'),
(3, 'Velg 959 Panigale Corse A356/AC4CH', 'Item Height : 3.5inch  Panjang Barang : 17inch  Tipe Bahan : A356/AC4CH OEM Grade Aluminum  Tipe Barang : Rims  Berat Barang : 4.3kg  Fitur Khusus : Front Wheel Rim  Item Width : 17inch  Model Name : WR011  Sertifikasi Pengujian Eksternal : ce  Item Diame', 9500000, 'Velg.jpg'),
(4, 'Karbu Karburator Rx King 3KA Original Carburator Yamaha Rx King 3k Ori', 'CARBURATOR ORI RX KING, KODE PART : X024      100% ASLI YAMAHA  ,  STOCK TERBATAS ,  CEK STOCK SEBELUM MELAKUKAN TRANSAKSI', 550000, 'karbu_rx_king.jpg'),
(5, 'Velg RCB Racing Boy Jupiter Z 140 x 160 biru', 'Velg merek racing boy untuk motor Jupiter Z ukuran 149 depan 160 belakang warna biru', 2300000, 'velg_rcb_jupet.jpg'),
(6, 'Knalpot Racing Akrapovic Line carbon Kawasaki Zx25R ZX 25R FS', 'Knalpot Fullsystem Akrapovic Racing Line Carbon untuk Kawasaki ZX-25R  Bahan Silencer Carbon dan Made In Slovenia  S-K2R1-APC', 19000000, 'knalpot_zx25r.jpg'),
(7, 'Lengan Ayun (Swingarm Assy RR Set) Supra GTR 150 K56F', 'Resmi Honda Genuine Part. Mohon pastikan produk yang anda pesan sesuai dengan produk yang dibutuhkan. Kode Part : 5211AK56N11ZA', 750000, 'swingarm_supra.jpg'),
(8, 'Engine Slider AELLA DUCATI PANIGALE V4 S', 'Warna hitam Menekan Kerusakan pada mobil Anda akibat jatuh yang tidak terduga seperti gagap. Garis Merah yang digambar oleh cincin Aluminium Red alumite adalah simbol ImageCollar milik Ducati. Panigale adalah struktur MonocoqueFrame tanpa rangka Pipa, dan', 5400000, 'engine_slider_panigale_v4.jpg'),
(9, 'Tail Body Rear Body Ducati Panigale V4 Superleggera', 'Body Belakang Ducati Panigale V4 Superleggera ,  Kelengkapan : Body belakang, stoplamp 3in1 DRL, Undertail , Material fiberglass', 1900000, 'tail_body_panigale.jpg'),
(10, 'Windshield Racing BODY STYLE Yamaha R6 -1487A', 'Layar balap dengan rasio harga / kinerja yang sangat kompetitif. Diproduksi di Eropa dicirikan \"dirancang untuk balap\" layar dengan bentuknya. Peningkatan di bagian tengah layar mengurangi tekanan angin pada helm. Tersedia warna hitam. Dengan ABE. warna h', 1400000, 'windshilelded_r6.jpg'),
(11, 'Frame Slider EVOTECH Yamaha R6 417G', 'EVOTECH \"Defender\" Ini adalah penggeser bingkai yang meminimalkan kerusakan bodi mobil jika terjatuh. Dengan tidak hanya situasi balap yang terbatas, ini juga menunjukkan performa tinggi bahkan saat berkendara di jalan umum. Bodi penggeser memiliki koefis', 2150000, 'frame_slider_evotech.jpg'),
(12, 'Winglet Mx King 150 Aksesoris Motor - Hitam - Merah', 'Winglet Mx King 150 Aksesoris Motor - Hitam Bahan : FIBER Mutu Bagus PNP untuk mx king 150', 70000, 'winglet_mx_king.jpg'),
(13, 'OLI MPX2 MPX 2 OLI MATIC BEAT SCOOPY SPACY GENIO VARIO 110 125 PCX 150 - 0,8L MPX2', '800ML SPX2 OLI MESIN MATIC HONDA PCX ADV 150 OLI ASLI DARI PABRIK BUKAN OLI BEKAS / MASAKAN / SULINGAN SEHINGGA TIDAK BAU BUSUK JIKA DI BUKA BARANG DIJAMIN BARU MASIH TERSEGEL RAPI DIPACKING DENGAN RAPI SEHINGGA TIDAK MUDAH BOCOR ( BENDA CAIR ADA KEMUNGKI', 40000, 'oli_mpx2.png'),
(14, 'Ban Belakang Motor Bridgestone Battlax BT39 Size 250×18 Made In Japan', 'Ban Belakang Motor Battlax Bridgestone Size 250 × 18 Thn produksi 2021', 1700000, 'ban_belakang_bridgestone.jpg'),
(15, 'BRIDGESTONE SALE BAN MOTOR BATLLAX S22 120/70/17 NEW 2020', 'BRIDGESTONE SALE BAN MOTOR BATLLAX S22 120/70/17 NEW 2020', 1800000, 'ban_battlax_s22.jpg'),
(16, 'Ban Battlax BMW GS 170/60-17 T32 Bridgestone versys ktm', 'Battlax T32 adalah standar baru untuk santai, performa tour, membiarkan Anda menemukan kembali kegembiraan berjelajah dengan motor. Menampilkan respon cepat, handling ketat dan dukungan untuk sudut ramping tinggi membuatnya lebih mudah untuk menahan baris', 2400000, 'ban_battlax_t32.jpg'),
(17, 'Ban Motor Michelin Pilot Street 2 110/70-17 Tubeless', 'Tahun produksi KINGLAND berkisar 2021-2022 tetapi tidak dapat request tahun produksi karena sudah memakai wrapping dari pabrik sehingga tahun produksi tidak dapat dilihat & kami akan ambil secara ACAK. Kami juga mempunyai Produk kingland Kemasan Lama deng', 700000, 'ban_michelin_ps2.png'),
(18, 'Yamaha YZF R6 2003 2004 Depan Disc Brake Rotor Disk Motor YZFR6', 'Nama Merek : ARASHI Asal : CN (Asal) Tipe Barang : Brake Disks Berat Barang : 3.6kg Fitur Khusus : CNC Floating Front Brake Disc Rotor Item Width : 29.8cm Sertifikasi Pengujian Eksternal : ISO9000 Model Name : DBS030W Item Diameter : 29.8cm Item Height : ', 5400000, 'brake_disk_r6.jpg'),
(19, 'Lampu Depan Headlamp LUMINOS DM1 5.7\" Retro BMW Harley W175 40W', 'Lampu Headlamp LED LUMINOS DM1 5.7\" Custom Retro Harley BMW W175 40W  LAMPU DAYMEKER LUMINOS Dm1 5.7inch', 500000, 'head_lamp_luminos.jpg'),
(20, 'Lampu Depan Light Assy Head BeAT K1A 33100K1AN01', 'Nama Resmi Produk: Light Assy,Head Kode Part: 33100K1AN01 Kategori: Lampu Depan (Headlight)', 400000, 'head_lamp_bear.jfif'),
(21, 'AKSESORIS MOTOR ZA 5551 LEGSHIELD BODY SAMPING LUAR SCOOPY FI INJEKSI', 'LEGSIEL LUAR MOTOR SCOOPY FI MERK TENSHI WARNA:-MERAH MAROONReady kakak barangnya... Silahkan order dan checkout ya. Transaksi berhasil, Orderan sebelum jam 2 siang dikirim hr itu juga loh kak SETIAP HARI BARANG KAMI ORIGINAL 100% ASLI YAKAMI', 500000, 'body_samping_scopy.jpg'),
(22, 'SWING ARM AREM AEROX 155 PNP LEXI ASLI YAMAHA B65 F2171', 'SWING ARM AEROX 155 PNP KE LEXI B65 F2171 ORIGINAL PRODUK YGP', 300000, 'swingarm_aerox.jpg'),
(23, 'BAK KOPLING MESIN YAMAHA RX KING SET KIRI KANAN', 'Bak kopling yamaha rx king. Harga 1 paket ya bos. Original YIMN. Tebal dan awet.', 500000, 'rxking.jpg'),
(24, 'Lampu Led Strobo Gril Jepit 9106 I Lampu Strobo Patwal Grill SKU-0829 - Biru', '- Strobo gril tipe 9106 - 1 modul dan 4 batang led ( 1 batang memiliki 6 pcs led masing2 led 1 watt ) - Total 24 watt - 12 volt dc - Harga diatas seperti foto - Warna : Cek Varian', 150000, 'ledstrobo.jpg'),
(25, 'Aki Motor Honda Vario CBS Bosch RBTZ-5S', 'Aki Motor MF Bosch Maintenance Free AGM RBTZ-5S  Panjang : 113mm Lebar : 70mm Tinggi : 85mm 3,5ah 50cca', 100000, 'akivario.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(7, 'Pemilikbengkel01', 'pemilikbengkel@gmail.com', '7d77791d9a5ffea0bbf393a087ba7fcc', 'pemilikbengkel'),
(8, 'User', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
