-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 08:35 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipalegdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `admin_name` varchar(40) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `foto_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `admin_name`, `email_admin`, `foto_admin`) VALUES
(1, 'narkoadmin', 'adminkui', 'Wijanarko Putra Rajeb', 'wijanarko.rajeb@gmail.com', 'narko.jpg'),
(2, 'suwi', 'suwi', 'Sitti Suwaibah', 'sitisuwaibah45@gmail.com', '5d0ace1243370_suwi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` char(1) NOT NULL,
  `nama_agama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `nama_agama`) VALUES
('1', 'Islam'),
('2', 'Kristen'),
('3', 'Katolik'),
('4', 'Hindu'),
('5', 'Budha'),
('6', 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota_keluarga`
--

CREATE TABLE `tb_anggota_keluarga` (
  `id_caleg` int(11) NOT NULL,
  `nikanggota` char(16) NOT NULL,
  `id_gender` char(1) DEFAULT NULL,
  `id_stat_hub` char(1) DEFAULT NULL,
  `nama_anggota` varchar(50) DEFAULT NULL,
  `tgllahir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dapil`
--

CREATE TABLE `tb_dapil` (
  `id_dapil` char(2) NOT NULL,
  `nama_dapil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dapil`
--

INSERT INTO `tb_dapil` (`id_dapil`, `nama_dapil`) VALUES
('01', 'jatim 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_caleg`
--

CREATE TABLE `tb_data_caleg` (
  `username` varchar(255) NOT NULL,
  `tanggal_daftar` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `id_jbt_partai` char(2) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_gender` char(1) NOT NULL,
  `id_agama` char(1) NOT NULL,
  `id_pend` char(1) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `bidang_pend` varchar(255) NOT NULL,
  `id_kelurahan` char(10) NOT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `alamat_tinggal` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tingkat_caleg` char(1) DEFAULT NULL,
  `tempat_caleg` varchar(255) DEFAULT NULL,
  `daerah_pilih` varchar(255) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(1000) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_tulisan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_caleg`
--

INSERT INTO `tb_data_caleg` (`username`, `tanggal_daftar`, `id`, `nik`, `nama`, `id_partai`, `id_jbt_partai`, `tempat_lahir`, `tanggal_lahir`, `id_gender`, `id_agama`, `id_pend`, `pekerjaan`, `bidang_pend`, `id_kelurahan`, `alamat_ktp`, `alamat_tinggal`, `telepon`, `email`, `facebook`, `twitter`, `instagram`, `tingkat_caleg`, `tempat_caleg`, `daerah_pilih`, `visi`, `misi`, `foto`, `foto_ktp`, `foto_tulisan`) VALUES
('EvindaWidya', '2019-06-20', 25, '3326165708740003', 'Evinda Widya Cahyaningrum,S.kom', 3, '13', 'Surabaya', '2019-06-03', '2', '1', '6', 'Pegawai  Swasta', 'Teknologi Informasi', '3515100002', 'Desa Kebonagung,Kecamatan Sukodono, Kabupaten Sidoarjo', 'Desa Kebonagung,Kecamatan Sukodono, Kabupaten Sidoarjo', '081111111111', 'evindaW@gmail.com', 'Evinda', 'Evinda', '@Evinda', '2', 'Provinsi Jawa Timur', 'Desa Kebonagung,Kecamatan Sukodono, Kabupaten Sidoarjo', 'mensejahterakan rakyat', 'merakyat', '5d0b7c09b0c0e_5d0b7b3449fdb_5d0b22acdd6bb_evin.jpg', '5d0b7c09b0db4_5d0b7b54b7ca7_5d0b22acdd8eb_ktpEvin.jpg', '5d0b7c09b0f74_5d0b22acddc32_tulisan Evin.jpg'),
('FahrezaIdris', '2019-06-20', 26, '3203012503770011', 'Fahreza Idris,S.H', 10, '15', 'Bondowoso', '1989-04-27', '1', '1', '6', 'Pengacara', 'Hukum', '3522041001', 'Desa Miyono, Kecamatan Sekar, Kbupaten Bojonegoro', 'Desa Miyono, Kecamatan Sekar, Kbupaten Bojonegoro', '082222222222', 'fahreza@gmail.com', 'fahreza', '-', '@FahrezaId', '2', 'Provinsi Jawa Timur', 'Desa Miyono, Kecamatan Sekar, Kbupaten Bojonegoro', 'Menciptakan kedamaian serta kemakmuran rakyat', 'Membuat sistem yang memudahkan rakyat', '5d0b25ba0a469_fahrezaIdris.jpg', '5d0b25ba0a708_fahreza.jpg', '5d0b25ba0a9e4_Tulisan Fahreza.jpg'),
('HarifitraNingrum', '2019-06-20', 27, '3404075103910008', 'Hari Fitra Ningrum,S.Kom', 14, '17', 'Sidoarjo', '1995-07-06', '2', '1', '6', 'Guru', 'Teknologi Informasi', '3515090018', 'Desa Mulyodadi, Kecamatan Wonoayu, Kabupaten Sidoarjo', 'Desa Mulyodadi, Kecamatan Wonoayu, Kabupaten Sidoarjo', '083333333333', 'harifitraningrum@yahoo.com', 'fifi', '-', '@harifitra', '3', 'Kabupaten Sidoarjo', 'Desa Mulyodadi, Kecamatan Wonoayu, Kabupaten Sidoarjo', 'Memberdayakan perempuan', 'Mengadakan pelatihan untuk para perempuan', '5d0b27f0a2090_fifi.jpg', '5d0b27f0a2273_fifiKTP.jpg', '5d0b27f0a248a_Tulsan fifi.jpg'),
('hendra', '2019-06-20', 28, '3372011210770001', 'Hendra,S.E', 15, '12', 'Pamekasan', '1996-07-05', '1', '1', '6', 'Custumer Service BANK', 'Ekonomi', '3528020016', 'Desa Murtajih, Kecamatan Pademawu, Kabupaten Pamekasan', 'Desa Murtajih, Kecamatan Pademawu, Kabupaten Pamekasan', '084444444444', 'hendra@gmail.com', 'hendra', '-', '@hendra', '2', 'Provinsi Jawa Timur', 'Desa Murtajih, Kecamatan Pademawu, Kabupaten Pamekasan', 'Mengembangkan Daerah Pamekasan', 'Ikut serta dalam kegiatan kemasyarakatan', '5d0b843a00fde_5d0b25ba0a469_fahrezaIdris.jpg', '5d0b2ba71764b_hendraKTP.jpg', '5d0b2ba717948_Tulisan hendra.jpg'),
('IndraHerlambang', '2019-06-20', 29, '3372030111850001', 'Indra Herlambang,S.sos', 8, '15', 'Bondowoso', '1990-04-10', '1', '1', '6', 'Kepala Desa', 'Sosial', '3511080006', 'Kelurahan Pasarejo, Kecamatan Wonosari, Kabupaten Bondowoso', 'Kelurahan Pasarejo, Kecamatan Wonosari, Kabupaten Bondowoso', '085555555555', 'indra@gmail.com', '-', '-', '@indraa', '2', 'Provinsi Jawa Timur', 'Kelurahan Pasarejo, Kecamatan Wonosari, Kabupaten Bondowoso', 'Mensejahterakan rakyat', 'Mendengarkan keluh kesah rakyat', '5d0b2e100386d_indra.jpg', '5d0b2e1003c00_indraktp.jpg', '5d0b2e1003ddf_Tulisan Indra.jpg'),
('NurditaQurrotaayunin', '2019-06-20', 30, '9208055504980001', 'Nurdita Qurrota Ayunin,S.pd', 12, '17', 'Bangkalan', '1997-03-31', '2', '1', '6', 'Guru SMP', 'Pendidikan', '3526010007', 'Kelurahan Gili timur, Kecamatan Kamal, Kabupaten Bangkalan', 'Kelurahan Gili timur, Kecamatan Kamal, Kabupaten Bangkalan', '086666666666', 'Nurditaqurrota@gmail.com', 'Ayukk', '-', '@NurditaQ', '3', 'Kabupaten Bangkalan', 'Kelurahan Gili timur, Kecamatan Kamal, Kabupaten Bangkalan', 'Mensejahterakan kehidupan rakyat', 'Membuka lapangan kerja baru', '5d0b3104f15ac_ayuk.jpg', '5d0b3104f17ed_ayuktp.jpg', '5d0b3104f1a88_Tulisan ayuk.jpg'),
('NurliyaAshri', '2019-06-20', 31, '1804024707900009', 'Nurliya Ashri,S.Ag', 13, '14', 'Sumenep', '1990-03-06', '2', '1', '6', 'Dosen', 'pendidikan', '3529110004', 'Kelurahan Rajun, Kecamatan Pasongsongan, Kabupaten Sumenep', 'Kelurahan Rajun, Kecamatan Pasongsongan, Kabupaten Sumenep', '087777777777', 'nurliya@gmail.com', '-', '-', '@liyaa', '1', 'RI', 'Kelurahan Rajun, Kecamatan Pasongsongan, Kabupaten Sumenep', 'Meningkatkan kesejahteraan rakyat', 'Mengetahu keluh kesah rakyat', '5d0b33413cc5d_liya.jpg', '5d0b33413ce1e_ktpliya.jpg', '5d0b33413cfaf_Tulisan liya.jpg'),
('SiskaWulandari', '2019-06-20', 32, '3374016906940003', 'Siska Wulandari,S.Pd', 4, '10', 'Sampang', '1997-02-13', '2', '1', '6', 'Guru SD', 'Pendidikan', '3527040004', 'Desa Prajjan, Kecamatan Camplong, Kabupateng Sampang', 'Desa Prajjan, Kecamatan Camplong, Kabupateng Sampang', '081212121212', 'siskawulandari@gmail.com', '-', '-', '@siskawd', '2', 'Provinsi Jawa Timur', 'Desa Prajjan, Kecamatan Camplong, Kabupateng Sampang', 'Meningkatkan kinerja masyarakat', 'Membuka  Lapangan Baru', '5d0b3bf1a0353_rika.jpg', '5d0b3bf1a0627_rikaktp.jpg', '5d0b3bf1a08ce_Tulisan rika.png'),
('QoriatulJannah', '2019-06-20', 33, '6171036404970003', 'Qoriatul Jannah,S.M', 10, '17', 'Surakarta', '2019-05-27', '2', '1', '6', 'Pemasar', 'Manajemen', '3172080006', 'Kelurahan Cakung Barat, Kecamatan Cakug, Kota Jakarta Timur', 'Kelurahan Cakung Barat, Kecamatan Cakug, Kota Jakarta Timur', '083131313131', 'qoriatuljannah@gmail.com', 'RirikQJ', '-', '@RirikQJ', '2', 'Provinsi DKI Jakarta', 'Kelurahan Cakung Barat, Kecamatan Cakug, Kota Jakarta Timur', 'Mensejahterakan rakyat', 'Membuka lapangan kerja baru', '5d0b3dc04fa0a_ririkqj.jpg', '5d0b3dc04fc9b_ririk.jpg', '5d0b3dc0501ba_Tulisan ririk.jpg'),
('YulistikaFahriza', '2019-06-20', 34, '3174096112900001', 'Yulistika Fahriza,S.E', 11, '10', 'Semarang', '1998-03-04', '2', '1', '6', 'Pengusaha', 'Ekonomi', '1372020006', 'Kelurahan Laing, KecamatanTanjung Harapan, Kota Solok', 'Kelurahan Laing, KecamatanTanjung Harapan, Kota Solok', '084343434343', 'YulistikaF@gmail.com', '-', '-', '@yulistika', '1', 'RI', 'Kelurahan Laing, KecamatanTanjung Harapan, Kota Solok', 'Meningkatkan perekonoman warga', 'Mengadakan pelathan ', '5d0b43ff8180b_icha.jpg', '5d0b43ff819ef_ichaKTP.JPG', '5d0b43ff81b80_Tulisan icha.jpg'),
('narkobarokah', '2019-06-20', 35, '3342030111850002', 'Wijanarko Putra Rajeb,S.Kom', 14, '09', 'Jombang', '1999-10-21', '1', '1', '6', 'Programmer', 'Teknologi Informasi', '3517080003', 'Kelurahan Jarak, Kecamatan Wonosalam, Kabupaten Jombang', 'Kelurahan Jarak, Kecamatan Wonosalam, Kabupaten Jombang', '091919191919', 'wijanarko.rajeb@gmail.com', 'Wijanrko', '-', '@wijanarko', '1', 'Jatim', 'Kelurahan Jarak, Kecamatan Wonosalam, Kabupaten Jombang', 'Menyejahterakan rakyat', 'Membuka lapangan pekerjaan baru', '5d0b6c925856f_5d0b4c83151cf_narko.jpg', '5d0b6c9258757_1560942167_Dok baru 2019-05-24 15.39.30.jpg', '5d0b6c925892b_5d0b4c83156ce_tulisan narko.jpg'),
('HendrikWicaksono', '2019-06-20', 36, '3277011872770002', 'Hendrik Wicaksono,S.Kom', 9, '16', 'Bojonegoro', '1998-05-27', '1', '1', '6', 'Pengajar', 'Teknologi Informasi', '5103020003', 'Kelurahan Kuta, Kecamatan Kuta, Kabupaten Badung', 'Kelurahan Kuta, Kecamatan Kuta, Kabupaten Badung', '091919191919', 'HendrikWicaksono@gmail.com', '-', '-', '@hendrik', '1', 'RI', 'Kelurahan Kuta, Kecamatan Kuta, Kabupaten Badung', 'Meningkatkan perekonomian warga', 'Membuka lapangan kerja baru', '5d0b4fd3f05bb_hendrik.jpg', '5d0b4fd3f079a_ktphendrik.jpg', '5d0b4fd3f0962_tulisan hendrik.jpg'),
('Reynaldi', '2019-06-20', 37, '3275060306960015', 'Reynaldi,S.Kom', 2, '12', 'Gresik', '1998-05-31', '1', '1', '6', 'Programmer', 'Teknologi Informasi', '3525130014', 'Kelurahan Kauman,Kecamatan Sidayu,Kabupaten Gresik', 'Kelurahan Kauman,Kecamatan Sidayu,Kabupaten Gresik', '012222222222', 'reynaldi@gmail.com', '-', '-', '@reynaldi', '1', 'RI', 'Kelurahan Kauman,Kecamatan Sidayu,Kabupaten Gresik', 'Mensejahterakan rakyat', 'Merakyat', '5d0b51575e17a_reynaldi.jpg', '5d0b51575e55a_ktprey.jpg', '5d0b51575e6d7_tulisan rey.jpg'),
('Hilal', '2019-06-20', 38, '3312221203650001', 'Nurlatif Hilaludin,S.Kom', 9, '17', 'Banyuawangi', '1999-06-05', '2', '1', '6', 'Programmer', 'Teknologi Informasi', '3320040004', 'Kelurahan Paren, Kecamatan Mayong, Kabupaten Jepara', 'Kelurahan Paren, Kecamatan Mayong, Kabupaten Jepara', '091181818188', 'hilal@gmail.com', '-', '-', '@hilal', '2', 'Provinsi Jawa Tengah', 'Kelurahan Paren, Kecamatan Mayong, Kabupaten Jepara', 'Mensejahterakan rakyat', 'Membuka lapangan kerja baru', '5d0b532768236_hilal.jpg', '5d0b5327683fa_ktphilal.jpg', '5d0b5327685c3_tulisan hilal.jpg'),
('shinta', '2019-06-20', 39, '3326165708740003', 'Shinta Wulandari,S.Pd', 7, '16', 'Pamekasan ', '1999-06-12', '2', '1', '6', 'Guru', 'Pendidikan', '3528040001', 'Desa Peltong, Kecamatan Larangan, Kabupaten Pamekasan', 'Desa Peltong, Kecamatan Larangan, Kabupaten Pamekasan', '097656565656', 'shinta45@gmail.com', '-', '-', '-', '1', 'RI', 'Desa Peltong, Kecamatan Larangan, Kabupaten Pamekasan', 'Mensejahterakan rakyat', 'Membuka lapangan kerja baru', '5d0b84520fd54_5d0b43ff8180b_icha.jpg', '5d0b54e710d43_sinta.jpg', '5d0b54e710f4e_Tulisan sinta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_delete_caleg`
--

CREATE TABLE `tb_delete_caleg` (
  `username` varchar(255) NOT NULL,
  `tanggal_daftar` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_partai` int(11) NOT NULL,
  `id_jbt_partai` char(2) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_gender` char(1) NOT NULL,
  `id_agama` char(1) NOT NULL,
  `id_pend` char(1) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `bidang_pend` varchar(255) NOT NULL,
  `id_kelurahan` char(10) NOT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `alamat_tinggal` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tingkat_caleg` char(1) DEFAULT NULL,
  `tempat_caleg` varchar(255) DEFAULT NULL,
  `daerah_pilih` varchar(255) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(1000) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_tulisan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_delete_caleg`
--

INSERT INTO `tb_delete_caleg` (`username`, `tanggal_daftar`, `id`, `nik`, `nama`, `id_partai`, `id_jbt_partai`, `tempat_lahir`, `tanggal_lahir`, `id_gender`, `id_agama`, `id_pend`, `pekerjaan`, `bidang_pend`, `id_kelurahan`, `alamat_ktp`, `alamat_tinggal`, `telepon`, `email`, `facebook`, `twitter`, `instagram`, `tingkat_caleg`, `tempat_caleg`, `daerah_pilih`, `visi`, `misi`, `foto`, `foto_ktp`, `foto_tulisan`) VALUES
('narkobarokah2', '2019-06-09', 1, '3517111710990006', 'Wijanarko Putra Rajeb', 1, '01', 'Jombang', '2019-06-02', '1', '1', '1', 'Mahasiswa', 'Teknik Informatika', '3517100019', 'Bakalan', 'Telang', '085852838253', 'wijanarko.rajeb@gmail.com', 'Wijanarko Putra Rajeb', 'putra_rajeb', 'wijanarko.rajeb', '1', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah1', '0000-00-00', 6, '3327090912870001', 'Budi Leksono', 2, '03', 'Jombang', '2019-06-09', '1', '1', '5', 'Guru', 'Teknik Informatika', '3517100019', 'Bakalan', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Budi Leksono', '\'\'', '\'\'', '1', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah2', '0000-00-00', 7, '3327095905880001', 'Tri Didik Adiono', 3, '05', 'Jombang', '2019-06-04', '1', '1', '5', 'TNI', 'Hukum', '3517100019', 'Bakalan', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Tri Didik Adiono', '\'\'', '\'\'', '3', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah3', '0000-00-00', 8, '3327096308130001', 'Baktiono', 4, '02', 'Jombang', '2019-06-03', '1', '1', '5', 'POLRI', 'Hukum', '3351710001', 'Bakalan', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Baktiono', '\'\'', '\'\'', '3', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah4', '0000-00-00', 9, '6104038010530002', 'Adi Sutarwijono', 5, '04', 'Jombang', '2019-06-06', '1', '1', '6', 'PNS', 'Pendidikan IPA', '3517100019', 'Bakalan', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Adi Sutarwijono', '\'\'', '\'\'', '3', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah5', '0000-00-00', 10, '7104048080530001', 'Abdul Ghoni', 6, '02', 'Jombang', '2019-06-07', '1', '1', '5', 'Dosen', 'Sistem Informasi', '3517100019', '', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Abdul Ghoni', '\'\'', '\'\'', '1', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah6', '0000-00-00', 11, '7104048080530002', 'Riswanto', 7, '01', 'Jombang', '2019-06-11', '1', '1', '4', 'Mekanik', 'Teknik Mekatronika', '3517100019', 'Bakalan', 'Telang', '85852838253', 'wijanarko.rajeb@gmail.com', 'Riswanto', '\'\'', '\'\'', '2', 'Jawa Timur', 'Jombang', 'Maju Terus', 'Tanpa Henti Donk ya', '1560664596_avatar3.jpg', '1fk.png', '1ft.png'),
('narkobarokah', '2019-06-20', 24, '3517110502630009', 'Wasis', 2, '01', 'Jombang', '2019-06-03', '1', '1', '1', 'Buruh Tani', 'IPA', '3517160004', 'adadadda', 'dadadada', '08155611551', 'wasis.jbg@gmail.com', 'adadadad', 'adadada', 'dadaadda', '1', 'Jatim', 'Jombang', 'adadadad', 'adadad', '5d0ac28c3388e_1560772372_3.png', '5d0ac28c33a58_1560939383_Dok baru 2019-05-24 15.39.30.jpg', '5d0ac28c33c68_1560773721_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jbt_partai`
--

CREATE TABLE `tb_jbt_partai` (
  `id_jbt_partai` char(2) NOT NULL,
  `nama_jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jbt_partai`
--

INSERT INTO `tb_jbt_partai` (`id_jbt_partai`, `nama_jabatan`) VALUES
('01', 'Dewan Pembina'),
('02', 'Majelis Pertimbangan'),
('03', 'Dewan Penasehat'),
('04', 'Dewan Kehormatan'),
('05', 'Majelis Syuro'),
('06', 'Ketua Umum'),
('07', 'Sekretaris Jendral'),
('08', 'Bendahara Umum'),
('09', 'Ketua Daerah'),
('10', 'Sekretaris Daerah'),
('11', 'Bendahara Daerah'),
('12', 'Ketua Cabang'),
('13', 'Sekretaris Cabang'),
('14', 'Bendahara Cabang'),
('15', 'Ketua Anak Cabang'),
('16', 'Sekretaris Anak Cabang'),
('17', 'Bendahara Anak Cabang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kelamin`
--

CREATE TABLE `tb_jenis_kelamin` (
  `id_gender` char(1) NOT NULL,
  `ket_gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_kelamin`
--

INSERT INTO `tb_jenis_kelamin` (`id_gender`, `ket_gender`) VALUES
('1', 'Laki- Laki'),
('2', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` char(4) NOT NULL,
  `id_provinsi` char(2) DEFAULT NULL,
  `nama_kab` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kab`) VALUES
('1372', '13', 'KOTA SOLOK'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3320', '33', 'KABUPATEN JEPARA'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3517', '35', 'jombang'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('5103', '51', 'KABUPATEN BADUNG'),
('6399', '63', 'Kabupatennku');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` char(7) NOT NULL,
  `id_kabupaten` char(4) DEFAULT NULL,
  `nama_kecamatan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
('1372020', '1372', 'TANJUNG HARAPAN'),
('3172080', '3172', 'CAKUNG'),
('3320040', '3320', 'MAYONG'),
('3511080', '3511', 'WONOSARI'),
('3515090', '3515', 'WONOAYU'),
('3515100', '3515', 'SUKODONO'),
('3517080', '3517', 'WONOSALAM'),
('3517100', '3517', 'sumobito'),
('3517160', '3517', 'KESAMBEN'),
('3522041', '3522', 'SEKAR'),
('3525130', '3525', 'SIDAYU'),
('3526010', '3526', 'KAMAL'),
('3527040', '3527', 'CAMPLONG'),
('3528020', '3528', 'PADEMAWU'),
('3528040', '3528', 'LARANGAN'),
('3529110', '3529', 'PASONGSONGAN'),
('5103020', '5103', 'KUTA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` char(10) NOT NULL,
  `id_kecamatan` char(7) DEFAULT NULL,
  `nama_kelurahan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
('1372020006', '1372020', 'LAING'),
('3172080006', '3172080', 'CAKUNG BARAT'),
('3320040004', '3320040', 'PAREN'),
('3511080006', '3511080', 'PASAREJO'),
('3515090018', '3515090', 'MULYODADI'),
('3515100002', '3515100', 'KEBONAGUNG'),
('3517080003', '3517080', 'JARAK'),
('3517100019', '3517100', 'bakalan'),
('3517160004', '3517160', 'CARANG REJO'),
('3522041001', '3522041', ''),
('3525130014', '3525130', 'KAUMAN'),
('3526010007', '3526010', 'GILI TIMUR'),
('3527040004', '3527040', 'PRAJJAN'),
('3528020016', '3528020', 'MURTAJIH'),
('3528040001', '3528040', ''),
('3528040007', '3528040', 'LARANGAN LUAR'),
('3529110004', '3529110', 'RAJUN'),
('5103020003', '5103020', 'KUTA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_partai`
--

CREATE TABLE `tb_partai` (
  `id` int(11) NOT NULL,
  `nama_partai` varchar(40) DEFAULT NULL,
  `foto_partai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_partai`
--

INSERT INTO `tb_partai` (`id`, `nama_partai`, `foto_partai`) VALUES
(1, 'Partai Kebangkitan Bangsa', '1_pkb.jpg'),
(2, 'Partai Gerakan Indonesia Raya', '2_gerindra.jpg'),
(3, 'Partai Demokrasi Indonesia Perjuangan', '3_pdip.jpg'),
(4, 'Partai Golongan Karya', '4_golkar.jpg'),
(5, 'Partai NasDemi', '5d0a3fd897994_5_nasdem.jpg'),
(6, 'Partai Gerakan Perubahan Indonesia', '6_garuda.jpg'),
(7, 'Partai Berkarya', '7_berkarya.jpg'),
(8, 'Partai Keadilan Sejahtera', '8_pks.jpg'),
(9, 'Partai Persatuan Indonesia', '9_perindo.jpg'),
(10, 'Partai Persatuan Pembangunan', '10_ppp.jpg'),
(11, 'Partai Solidaritas Indonesia', '11_psi.jpg'),
(12, 'Partai Amanat Nasional', '12_pan.jpg'),
(13, 'Partai Hati Nurani Rakyat', '13_hanura.jpg'),
(14, 'Partai Demokrat', '14_demokrat.jpg'),
(15, 'Partai Bulan Bintang', '15_pbb.jpg'),
(16, 'Partai Keadilan dan Persatuan Indonesia', '16_pkp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pend` char(1) NOT NULL,
  `nama_pend` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pend`, `nama_pend`) VALUES
('1', 'Sekolah Dasar'),
('2', 'SMP/Sederajat'),
('3', 'SMA/Sederajat'),
('4', 'Diploma I/II'),
('5', 'Akademi /Diploma III'),
('6', 'Diploma IV/ Strata 1'),
('7', 'Strata II'),
('8', 'Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` char(2) NOT NULL,
  `nama_prov` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_prov`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA'),
('92', 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_hubungan`
--

CREATE TABLE `tb_status_hubungan` (
  `id_stat_hub` char(1) NOT NULL,
  `ket_stat_hub` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_hubungan`
--

INSERT INTO `tb_status_hubungan` (`id_stat_hub`, `ket_stat_hub`) VALUES
('1', 'Suami'),
('2', 'Istri'),
('3', 'Anak'),
('4', 'Menantu'),
('5', 'Cucu'),
('6', 'Orang Tua'),
('7', 'Mertua'),
('8', 'Famili Lain'),
('9', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat_caleg`
--

CREATE TABLE `tb_tingkat_caleg` (
  `id_tingkat` char(1) NOT NULL,
  `nama_tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tingkat_caleg`
--

INSERT INTO `tb_tingkat_caleg` (`id_tingkat`, `nama_tingkat`) VALUES
('1', 'DPR RI'),
('2', 'DPRD Provinsi'),
('3', 'DPRD Kabupaten/Kota');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_delete`
--

CREATE TABLE `tb_user_delete` (
  `username` varchar(20) DEFAULT NULL,
  `tanggal_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_login`
--

CREATE TABLE `tb_user_login` (
  `id` int(11) NOT NULL,
  `username_login` varchar(100) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_login`
--

INSERT INTO `tb_user_login` (`id`, `username_login`, `password`, `email`) VALUES
(2, 'EvindaWidya', 'evin555', 'evindaW@gmail.com'),
(3, 'FahrezaIdris', 'idris888', 'fahreza@gmail.com'),
(4, 'HarifitraNingrum', 'fifialay', 'harifitraningrum@yahoo.com'),
(5, 'hendra', '99999', 'hendra@gmail.com'),
(6, 'IndraHerlambang', 'indra', 'indra@gmail.com'),
(9, 'NurditaQurrotaayunin', 'ayunin', 'Nurditaqurrota@gmail.com'),
(10, 'NurliyaAshri', 'liya1234', 'nurliya@gmail.com'),
(11, 'QoriatulJannah', 'ririk21', 'qoriatuljannah@gmail.com'),
(13, 'SiskaWulandari', 'siska123', 'siskawulandari@gmail.com'),
(14, 'YulistikaFahriza', 'icha999', 'YulistikaF@gmail.com'),
(15, 'narkobarokah', '123', 'wijanarko.rajeb@gmail.com'),
(16, 'HendrikWicaksono', '12345', 'HendrikWicaksono@gmail.com'),
(17, 'Reynaldi', '12345', 'reynaldi@gmail.com'),
(18, 'Hilal', 'hilal', 'hilal@gmail.com'),
(19, 'shinta', 'shinta', 'shinta45@gmail.com'),
(20, 'aku', 'aku', 'wasis.jbg@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_anggota_keluarga`
--
ALTER TABLE `tb_anggota_keluarga`
  ADD PRIMARY KEY (`nikanggota`),
  ADD KEY `fk_tb_anggo_relations_tb_jenis` (`id_gender`),
  ADD KEY `fk_tb_anggo_relations_tb_statu` (`id_stat_hub`),
  ADD KEY `id_caleg` (`id_caleg`);

--
-- Indexes for table `tb_dapil`
--
ALTER TABLE `tb_dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- Indexes for table `tb_data_caleg`
--
ALTER TABLE `tb_data_caleg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pend` (`id_pend`),
  ADD KEY `id_gender` (`id_gender`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `tingkat_caleg` (`tingkat_caleg`),
  ADD KEY `id_partai` (`id_partai`),
  ADD KEY `id_jbt_partai` (`id_jbt_partai`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `tb_delete_caleg`
--
ALTER TABLE `tb_delete_caleg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jbt_partai`
--
ALTER TABLE `tb_jbt_partai`
  ADD PRIMARY KEY (`id_jbt_partai`);

--
-- Indexes for table `tb_jenis_kelamin`
--
ALTER TABLE `tb_jenis_kelamin`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `fk_tb_kabup_relations_tb_provi` (`id_provinsi`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `fk_tb_kecam_relations_tb_kabup` (`id_kabupaten`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `fk_tb_kelur_relations_tb_kecam` (`id_kecamatan`);

--
-- Indexes for table `tb_partai`
--
ALTER TABLE `tb_partai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tb_status_hubungan`
--
ALTER TABLE `tb_status_hubungan`
  ADD PRIMARY KEY (`id_stat_hub`);

--
-- Indexes for table `tb_tingkat_caleg`
--
ALTER TABLE `tb_tingkat_caleg`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `tb_user_login`
--
ALTER TABLE `tb_user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_data_caleg`
--
ALTER TABLE `tb_data_caleg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_delete_caleg`
--
ALTER TABLE `tb_delete_caleg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_partai`
--
ALTER TABLE `tb_partai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user_login`
--
ALTER TABLE `tb_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota_keluarga`
--
ALTER TABLE `tb_anggota_keluarga`
  ADD CONSTRAINT `fk_tb_anggo_relations_tb_jenis` FOREIGN KEY (`id_gender`) REFERENCES `tb_jenis_kelamin` (`id_gender`),
  ADD CONSTRAINT `fk_tb_anggo_relations_tb_statu` FOREIGN KEY (`id_stat_hub`) REFERENCES `tb_status_hubungan` (`id_stat_hub`),
  ADD CONSTRAINT `tb_anggota_keluarga_ibfk_1` FOREIGN KEY (`id_caleg`) REFERENCES `tb_data_caleg` (`id`);

--
-- Constraints for table `tb_data_caleg`
--
ALTER TABLE `tb_data_caleg`
  ADD CONSTRAINT `tb_data_caleg_ibfk_10` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurahan` (`id_kelurahan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_caleg_ibfk_3` FOREIGN KEY (`id_pend`) REFERENCES `tb_pendidikan` (`id_pend`),
  ADD CONSTRAINT `tb_data_caleg_ibfk_5` FOREIGN KEY (`id_gender`) REFERENCES `tb_jenis_kelamin` (`id_gender`),
  ADD CONSTRAINT `tb_data_caleg_ibfk_6` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`),
  ADD CONSTRAINT `tb_data_caleg_ibfk_7` FOREIGN KEY (`tingkat_caleg`) REFERENCES `tb_tingkat_caleg` (`id_tingkat`),
  ADD CONSTRAINT `tb_data_caleg_ibfk_8` FOREIGN KEY (`id_partai`) REFERENCES `tb_partai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_caleg_ibfk_9` FOREIGN KEY (`id_jbt_partai`) REFERENCES `tb_jbt_partai` (`id_jbt_partai`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD CONSTRAINT `fk_tb_kabup_relations_tb_provi` FOREIGN KEY (`id_provinsi`) REFERENCES `tb_provinsi` (`id_provinsi`);

--
-- Constraints for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD CONSTRAINT `fk_tb_kecam_relations_tb_kabup` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id_kabupaten`);

--
-- Constraints for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD CONSTRAINT `tb_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
