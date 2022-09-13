-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 05:37 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_formasi`
--

CREATE TABLE `ambil_formasi` (
  `id_formasi` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_per` int(12) NOT NULL,
  `nama_per` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_2` int(11) NOT NULL,
  `sts_submit` enum('belum','sudah') NOT NULL,
  `kirim_accept` enum('belum','sudah') NOT NULL,
  `kirim_reject` enum('belum','sudah') NOT NULL,
  `stat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambil_formasi`
--

INSERT INTO `ambil_formasi` (`id_formasi`, `id_name`, `name`, `id_per`, `nama_per`, `id_user`, `id_user_2`, `sts_submit`, `kirim_accept`, `kirim_reject`, `stat`) VALUES
(83, 38, 'Pasha Anisa', 4, 'PT. Shaniku', 28, 30, 'sudah', 'sudah', 'belum', 'Diterima'),
(84, 38, 'Pasha Anisa', 6, 'BNI Surabaya', 28, 34, 'belum', 'belum', 'belum', ''),
(85, 39, 'Naura Septi', 5, 'PT. Jaya Pura', 36, 33, 'belum', 'belum', 'belum', ''),
(86, 39, 'Naura Septi', 4, 'PT. Shaniku', 36, 30, 'belum', 'sudah', 'belum', ''),
(87, 40, 'Gilang Ramadhan', 7, 'PERTAMINA INDONESIA', 37, 35, 'belum', 'belum', 'belum', ''),
(88, 40, 'Gilang Ramadhan', 6, 'BNI Surabaya', 37, 34, 'belum', 'sudah', 'belum', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `firstname`, `lastname`, `email`, `subject`, `message`) VALUES
(4, 'Naura', 'Septi', 'naurahsepti@gmail.com', 'Pujian', 'web ini sangat berguna untuk membantu saya mencari lapangan pekerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(15) NOT NULL,
  `stat` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `email`, `password`, `level`, `stat`) VALUES
(25, 'admin', 'rejob4group@gmail.com', '772aa1cc2cd77c0ef311ef7d4eeb1f8f', 'admin', 'belum'),
(28, 'anisa', 'pashaneesa0901@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'user', 'sudah'),
(30, 'shaniku', 'shaniku.corporation@gmail.com', '772aa1cc2cd77c0ef311ef7d4eeb1f8f', 'perusahaan', 'sudah'),
(33, 'jayapura', 'jayapura@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'perusahaan', 'sudah'),
(34, 'bnisby', 'bni.surabaya@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'perusahaan', 'sudah'),
(35, 'pertamina', 'pertamina@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'perusahaan', 'sudah'),
(36, 'naurah', 'naurahsepti@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'user', 'sudah'),
(37, 'gilang', 'gilangramad@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'user', 'sudah'),
(38, 'bayuang', 'bayuanggara@gmail.com', 'ce74d2ef1c4ba01b76843330820a7f11', 'user', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_per` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_per` varchar(50) NOT NULL,
  `nama_dir` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `visi_misi` varchar(500) NOT NULL,
  `posisi` varchar(500) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_per`, `id_user`, `nama_per`, `nama_dir`, `alamat`, `no_tlp`, `email`, `deskripsi`, `visi_misi`, `posisi`, `tgl_buka`, `tgl_tutup`, `foto`) VALUES
(4, 30, 'PT. Shaniku', 'Intan Permata', 'Jl. Danau Ranau no. 12 Malang', 2147483647, 'shaniku.corporation@gmail.com', 'PT. Shaniku adalah perusahaan yang bergerak di bidang pemasaran produk sepatu dimana terdapat proses pembuatan dan lainya. PT. Shaniku didirikan oleh Pasha Anisa yang merupakan Direktur dari PT. Shaniku yang berawal dari hobinya terdapat fashion ', 'Mempermudah dalam mendesain dan pembuatan produk sepatu untuk memenuhi kebutuhan pelanggan', 'admin, accounting, karyawan', '2019-05-12', '2019-05-15', 'bei.jpg'),
(5, 33, 'PT. Jaya Pura', 'Thomas Andika', 'Jl. Simpanagan Mawar no. 30 Jakarta', 2147483647, 'jayapura@gmail.com', 'PT. Jaya Pura adalah perusahaan yang bergerak di bidang akutansi yang didirikan oleh Thomas Andika yang tertelak di Jakarta. Perusahaan ini membantu dalam mengurus keuangan negara untuk proses keuangan', 'Membantu dan memudahkan dalam proses akutansi dengan bantuan yang telah desediakan dengan baik', 'marketing, accounting, security', '2019-05-12', '2019-05-14', 'Canon.jpg'),
(6, 34, 'BNI Surabaya', 'Ria Sekar Ayu', 'Jl. Kasih Sayang Surabaya`', 2147483647, 'bni.surabaya@gmail.com', 'BNI surabayaadalah perusahaan yang bergerak di bidang perbankan yang membantu customer dalam keuangan. BNI mempunyai pelayanan yang memuaskan yang dapat membantu pelanggan dalam masalah keuangan yang dihadapi', 'membantu pelanggan dalam masalah keuangan', 'admin, marketing, accounting, karyawan, security', '2019-05-12', '2019-05-17', 'BNI.jpg'),
(7, 35, 'PERTAMINA INDONESIA', 'Jacob Andra', 'Jl. Buah Jeruk Bandung', 2147483647, 'pertamina@gmail.com', 'Pertamina adalah perusahaan yang bergerak di bidang pemasaran bahan bakar yang terdapat proses pembuatan dan lainya. Pertamina menyediakan layanan yang dapat digunakan untuk hahahahaha hehehehehehe', 'bahan bakar mudah untuk didapat', 'admin, marketing, accounting, karyawan, security', '2019-05-12', '2019-05-20', 'Gedung-Pertamina-Pusat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_name`, `id_per`, `id_user`, `pesan`) VALUES
(40, 38, 4, 28, 'Halo <b>Pasha Anisa</b>. Selamat! Anda terpilih oleh PT. Shaniku untuk melanjutkan tes tahap kedua, yaitu <i>interview session</i> dan <i>writing test</i>. Silahkan datang ke perusahaan kami di Jalan Danau Ranau nomor 12 Sawojajar 1 Malang dan temui <b>Dini Puji</b> di bagian <i>Human Resource</i>. Batas waktu Anda untuk melalukan tes tahap kedua adalah sampai tanggal <b>15 May 2019</b>.<br><br>Berkas-berkas yang perlu Anda bawa adalah:<br>1. Surat lamaran kerja.<br>2. Daftar riwayat hidup <i>(Curriculum vitae)</i>.<br>3. Fotokopi Ijazah yang dilegalisir.<br>4. Fotokopy KTP.<br>5. Pas foto 3x4 berwarna.<br>6. Sertifikat Pelatihan/Ketrampilan. <i>(jika ada)</i><br><br>Kedatangan Anda sangat kami tunggu.<br>Atas perhatiannya, kami ucapkan terima kasih.'),
(41, 38, 4, 28, 'Halo <b>Pasha Anisa</b>. Selamat! Anda terpilih menjadi bagian dari <b>PT. Shaniku</b>. Hubungi Kami untuk memulai aktivitas anda sebagai karyawan Kami. Terima Kasih'),
(42, 39, 4, 36, 'Halo <b>Naura Septi</b>. Selamat! Anda terpilih oleh PT. Shaniku untuk melanjutkan tes tahap kedua, yaitu <i>interview session</i> dan <i>writing test</i>. Silahkan datang ke perusahaan kami di Jalan Danau Ranau nomor 12 Sawojajar 1 Malang dan temui <b>Dini Puji</b> di bagian <i>Human Resource</i>. Batas waktu Anda untuk melalukan tes tahap kedua adalah sampai tanggal <b>15 May 2019</b>.<br><br>Berkas-berkas yang perlu Anda bawa adalah:<br>1. Surat lamaran kerja.<br>2. Daftar riwayat hidup <i>(Curriculum vitae)</i>.<br>3. Fotokopi Ijazah yang dilegalisir.<br>4. Fotokopy KTP.<br>5. Pas foto 3x4 berwarna.<br>6. Sertifikat Pelatihan/Ketrampilan. <i>(jika ada)</i><br><br>Kedatangan Anda sangat kami tunggu.<br>Atas perhatiannya, kami ucapkan terima kasih.'),
(43, 40, 6, 37, 'Halo <b>Gilang Ramadhan</b>. Selamat! Anda terpilih oleh BNI Surabaya untuk melanjutkan tes tahap kedua, yaitu <i>interview session</i> dan <i>writing test</i>. Silahkan datang ke perusahaan kami di Jalan Danau Ranau nomor 12 Sawojajar 1 Malang dan temui <b>Dini Puji</b> di bagian <i>Human Resource</i>. Batas waktu Anda untuk melalukan tes tahap kedua adalah sampai tanggal <b>15 May 2019</b>.<br><br>Berkas-berkas yang perlu Anda bawa adalah:<br>1. Surat lamaran kerja.<br>2. Daftar riwayat hidup <i>(Curriculum vitae)</i>.<br>3. Fotokopi Ijazah yang dilegalisir.<br>4. Fotokopy KTP.<br>5. Pas foto 3x4 berwarna.<br>6. Sertifikat Pelatihan/Ketrampilan. <i>(jika ada)</i><br><br>Kedatangan Anda sangat kami tunggu.<br>Atas perhatiannya, kami ucapkan terima kasih.');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_name` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_card` int(20) NOT NULL,
  `name` text NOT NULL,
  `dob` date NOT NULL,
  `religion` text NOT NULL,
  `gender` text NOT NULL,
  `status` text NOT NULL,
  `nationality` text NOT NULL,
  `height` int(15) NOT NULL,
  `weight` int(15) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `education` varchar(100) NOT NULL,
  `name_e` varchar(50) NOT NULL,
  `y_start` int(11) NOT NULL,
  `y_end` int(11) NOT NULL,
  `why_join` varchar(300) NOT NULL,
  `yourself` varchar(300) NOT NULL,
  `reasons` varchar(300) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_name`, `id_user`, `id_card`, `name`, `dob`, `religion`, `gender`, `status`, `nationality`, `height`, `weight`, `phone`, `email`, `blood`, `address`, `education`, `name_e`, `y_start`, `y_end`, `why_join`, `yourself`, `reasons`, `photo`) VALUES
(38, 28, 2147483647, 'Pasha Anisa', '1994-01-09', 'Islam', 'Wanita', 'Single', 'Indonesia', 165, 50, 2147483647, 'pashaneesa0901@gmail.com', 'A', 'Jl. Raden Sudirman Malang', 'S1', 'Universitas Negeri Malang', 2004, 2008, 'karena saya ingin mendapatkan perkerjaan sesuai dengan passion saya', 'Saya efektif dalam bekerja, dapat bekerja secara individu maupun kelompok. Saya selalu mengerjakan tugas yang diberikan dengan tepat waktu', 'Karena saya akan berusaha untuk bekerja dengan baik dan ulet yang dapat menguntungkan perusahaan', 'human11.jpg'),
(39, 36, 2147483647, 'Naura Septi', '1993-05-19', 'Islam', 'Wanita', 'Single', 'Indonesia', 160, 50, 2147483647, 'naurahsepti@gmail.com', 'A', 'Jl. Bundar no.5', 'SMK', 'SMK Grafika Malang', 2003, 2005, 'karena saya ingin mendapatkan perkerjaan sesuai dengan passion saya', 'Saya efektif dalam bekerja, dapat bekerja secara individu maupun kelompok. Saya selalu mengerjakan tugas yang diberikan dengan tepat waktu', 'Karena saya akan berusaha untuk bekerja dengan baik dan ulet yang dapat menguntungkan perusahaan', 'human2.jpg'),
(40, 37, 2147483647, 'Gilang Ramadhan', '1997-04-20', 'Kristen', 'Pria', 'Single', 'Indonesia', 175, 55, 2147483647, 'gilangramad@gmail.com', 'A', 'Jl. Pancasila no. 10', 'S1', 'Universitas GajahMadha', 2013, 2017, 'karena saya ingin mendapatkan perkerjaan sesuai dengan passion saya', 'Saya efektif dalam bekerja, dapat bekerja secara individu maupun kelompok. Saya selalu mengerjakan tugas yang diberikan dengan tepat waktu', 'Karena saya akan berusaha untuk bekerja dengan baik dan ulet yang dapat menguntungkan perusahaan', '6.jpg'),
(41, 38, 2147483647, 'Bayu Anggara', '1991-07-18', 'Katolik', 'Pria', 'Married', 'Indonesia', 175, 60, 2147483647, 'bayuanggara@gmail.com', 'AB', 'Jl. Batu Kristal', 'SMK', 'SMK Telkom Malang', 2004, 2007, 'karena saya ingin mendapatkan perkerjaan sesuai dengan passion saya', 'Saya efektif dalam bekerja, dapat bekerja secara individu maupun kelompok. Saya selalu mengerjakan tugas yang diberikan dengan tepat waktu', 'Karena saya akan berusaha untuk bekerja dengan baik dan ulet yang dapat menguntungkan perusahaan', 'human5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `religion` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `w_score` int(11) NOT NULL,
  `i_score` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `id_user`, `id_name`, `name`, `email`, `dob`, `religion`, `address`, `phone`, `photo`, `w_score`, `i_score`, `comment`, `status`) VALUES
(33, 30, 38, 'Pasha Anisa', 'pashaneesa0901@gmail.com', '1994-01-09', 'Islam', 'Jl. Raden Sudirman Malang', 2147483647, 'human11.jpg', 90, 80, 'baik sekali', 'Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_formasi`
--
ALTER TABLE `ambil_formasi`
  ADD PRIMARY KEY (`id_formasi`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_per`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_name`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_formasi`
--
ALTER TABLE `ambil_formasi`
  MODIFY `id_formasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_per` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_name` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
