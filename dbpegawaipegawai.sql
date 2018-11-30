-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 09:11 
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bag` varchar(10) NOT NULL,
  `n_bag` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bag`, `n_bag`) VALUES
('07.1', 'BBWS Serayu Opak, Ditjen. Sumber Daya Air'),
('07.2', 'BBWS Mesuji Sekampung, Ditjen. Sumber Daya Air'),
('07.3', 'BBWS Sungai Brantas, Ditjen. Sumber Daya Air'),
('07.4', 'Dit. Pengembangan Jaringan Jalan, Ditjen. Bina Marga'),
('07.6', 'BBWS Sumatera VIII, Ditjen Sumber Daya Air'),
('07.5', 'BBWS Sungai Brantas Surabaya, Ditjen. Sumber Daya Air'),
('07.7', 'BBWS Sumatera VII Bengkulu, Ditjen Sumber Daya Air'),
('07.8', 'Biro Kepegawaian dan Ortala, Sekretariat Jenderal'),
('07.9', 'BPP PUPR Wil. VII Banjarmasin, BPSDM'),
('07.10', 'Bagian Kepegawaian dan Ortala, Sekditjen CK'),
('07.11', 'Dit. Perkotaan, Ditjen Taru'),
('07.12', 'Bagian Kepegawaian dan Ortala, Sekditjen SDA'),
('07.13', 'Biro Hukum, Sekretariat Jenderal'),
('07.14', 'Sekretariat Direktorat Jenderal, Cipta Karya'),
('07.15', 'Direktorat Pengembangan Kawasan Permukiman, Ditjen Cipta Karya');

-- --------------------------------------------------------

--
-- Table structure for table `gol_ruang`
--

CREATE TABLE IF NOT EXISTS `gol_ruang` (
  `id_gol_pangkat` int(25) NOT NULL,
  `nm_gol_pangkat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gol_pangkat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gol_ruang`
--

INSERT INTO `gol_ruang` (`id_gol_pangkat`, `nm_gol_pangkat`) VALUES
(1, 'I/a - Pelaksana Muda'),
(2, 'I/b - Pelaksana Muda Tingkat I'),
(3, 'I/c - Pelaksana'),
(4, 'I/d - Pelaksana Tingkat I'),
(5, 'II/a - Pengatur Muda'),
(6, 'II/b - Pengatur Muda Tingkat I'),
(7, 'II/c - Pengatur'),
(8, 'II/d - Pengatur Tingkat I'),
(9, 'III/a - Penata Muda'),
(10, 'III/b - Penata Muda Tingkat I'),
(11, 'III/c - Penata'),
(12, 'III/d - Penata Tingkat I'),
(13, 'IV/a - Pembina'),
(14, 'IV/b - Pembina Tingkat I'),
(15, 'IV/c - Pembina Utama Muda'),
(16, 'IV/d - Pembina Utama Madya'),
(17, 'IV/e - Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `h_ak`
--

CREATE TABLE IF NOT EXISTS `h_ak` (
  `idh_ak` int(25) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `no_pak` varchar(25) NOT NULL,
  `tgl_pak` date NOT NULL,
  `angka_kredit` varchar(100) NOT NULL,
  PRIMARY KEY (`idh_ak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `h_ak`
--

INSERT INTO `h_ak` (`idh_ak`, `nip`, `no_pak`, `tgl_pak`, `angka_kredit`) VALUES
(9, '197912052008011016', '126/SK/Januari/2016', '2016-01-16', '100,00');

-- --------------------------------------------------------

--
-- Table structure for table `h_jabatan`
--

CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `id_jbt` int(50) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `id_jab` varchar(10) NOT NULL,
  `no_sk` varchar(25) NOT NULL,
  `tgl_sk` date NOT NULL,
  `tmt_jab` date NOT NULL,
  `jab_ak` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jbt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `h_jabatan`
--

INSERT INTO `h_jabatan` (`id_jbt`, `nip`, `id_jab`, `no_sk`, `tgl_sk`, `tmt_jab`, `jab_ak`) VALUES
(7, '197912052008011016', '08.4', '12/Aug/08/2018', '2018-08-08', '2018-08-14', '130,00');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jab` varchar(10) NOT NULL,
  `n_jab` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `n_jab`) VALUES
('07.1', 'Analis Kepegawaian Pelaksana/Terampil'),
('07.2', 'Analis Kepegawaian Pelaksana Lanjutan/Mahir'),
('07.3', 'Analis Kepegawaian Penyelia'),
('07.4', 'Analis Kepegawaian Pertama'),
('07.5', 'Analis Kepegawaian Muda'),
('07.6', 'Analis Kepegawaian Madya');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(20) NOT NULL,
  `niplama` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_gol_pangkat` int(25) NOT NULL,
  `id_bag` varchar(10) NOT NULL,
  `id_jab` varchar(10) NOT NULL,
  `pend_akhir_1` varchar(60) NOT NULL,
  `pend_akhir_2` varchar(60) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_statkerja` int(5) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `niplama`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `id_gol_pangkat`, `id_bag`, `id_jab`, `pend_akhir_1`, `pend_akhir_2`, `foto`, `id_statkerja`) VALUES
('197912052008011016', '110063541', 'Deny Ruri Dwiyatmoko, SE', 'Klaten', '1979-12-05', 'L', 'Kebayoran Baru, Jakarta', '2008-11-16', 14, '07.10', '07.3', 'S1 - Pendidikan Ekonomi', '-', '176849Lighthouse.jpg', 1),
('197909252010121001', '-', 'Deny Bayu Prawesto, S.H., M.PSDM', 'Surabaya', '1979-09-25', 'L', 'Gubeng Surabaya', '2010-12-01', 16, '07.3', '07.4', 'S1 - Ilmu Hukum', 'S2 - Pembangunan Sumber Daya Manusia', '340789Jellyfish.jpg', 2),
('198508212009121001', '-', 'Agus Dwi Praptana, S.IP', 'Tanjung Karang', '1985-08-21', 'L', 'Mampang Prapatan', '2009-01-12', 1, '07.3', '07.5', 'S1 - Ilmu Pemerintahan', '-', '20690Desert.jpg', 2),
('198809122010122004', '-', 'Amirah Rachma Santoso, S.Psi', 'Sleman', '1988-09-12', 'P', 'Puri Gading Regency, Bekasi', '2010-04-22', 10, '07.8', '07.4', 'S1 - Ilmu Psikologi', '-', '153167Penguins.jpg', 2),
('196607151994031005', '-', 'Ahmat Mulyadi, S.AP., M.Si', 'Jakarta', '1966-07-15', 'L', 'Cawang', '1994-05-31', 10, '07.4', '07.5', 'S1 - Administrasi Publik', 'S2 - Magister Sains', '341125Hydrangeas.jpg', 1),
('198509302009121001', '-', 'Arifa Nalendra, S.I.P, M.MT.', 'Bandung', '1985-09-30', 'L', 'Jakarta Selatan', '2009-10-12', 11, '07.3', '07.4', 'S1 - Ilmu Pemerintahan', 'S2 - Manajemen Teknik', '183532Hydrangeas.jpg', 1),
('198406082008012005', '110063411', 'Dewi Ramadhiani, S.Psi', 'Jakarta', '1984-01-08', 'P', 'selong', '2005-01-08', 11, '07.4', '07.5', 'S1 - Psikologi', '-', '191467Chrysanthemum.jpg', 1),
('198007232006042004', '110057985', 'Eka Yulia Widyanti, SIP, M.Si', 'Jakarta', '1980-07-08', 'P', 'ciledug', '2004-04-06', 10, '07.3', '07.5', 'S1 - Ilmu Politik', 'S2 - Magister Sains', '418365Tulips.jpg', 2),
('198507232010121004', '-', 'Sudarmono, S.IP., M.M.', 'Tegalrejo, Lampung Timur', '1985-07-23', 'L', 'Mesuji', '2010-12-10', 10, '07.2', '07.3', 'S1 - Ilmu Pemerintahan', 'S2 - Magister Manajemen', '863922Tulips.jpg', 1),
('197601192008012002', '-', 'Yessika Natasari Wulandari, S.E', 'Pontianak', '1976-01-19', 'P', 'Pontianak', '2008-02-12', 11, '07.6', '07.5', 'S1 - Ekonomi Akutansi', '-', '525146Chrysanthemum.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stat_kerja`
--

CREATE TABLE IF NOT EXISTS `stat_kerja` (
  `id_statkerja` int(5) NOT NULL,
  `n_statkerja` varchar(25) NOT NULL,
  PRIMARY KEY (`id_statkerja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stat_kerja`
--

INSERT INTO `stat_kerja` (`id_statkerja`, `n_statkerja`) VALUES
(1, 'Aktif'),
(2, 'Bebas Sementara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(50) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` int(2) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `passid`, `level_user`) VALUES
('akbar', 'akbar', 1),
('saif', 'saif', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
