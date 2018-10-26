-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sdit_sumenep
CREATE DATABASE IF NOT EXISTS `sdit_sumenep` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sdit_sumenep`;

-- Dumping structure for table sdit_sumenep.peserta
CREATE TABLE IF NOT EXISTS `peserta` (
  `kd_peserta` varchar(50) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `pangilan` varchar(10) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tk_asal` varchar(20) NOT NULL,
  `alamat_tkasal` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jml_sdrkndung` varchar(10) NOT NULL,
  `nama_sdrkndung1` varchar(10) NOT NULL,
  `sekolah_sdrkndung1` varchar(10) NOT NULL,
  `nama_sdrkndung2` varchar(10) NOT NULL,
  `sekolah_sdrkandung2` varchar(10) NOT NULL,
  `nama_sdrkndung3` varchar(10) NOT NULL,
  `sekolah_sdrkndung3` varchar(10) NOT NULL,
  `bhs_rmh` varchar(10) NOT NULL,
  `gol_darah` varchar(5) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp_orangtua` varchar(13) NOT NULL,
  `alat_transportasi` varchar(10) NOT NULL,
  `jrk_kesekolah` varchar(50) NOT NULL,
  `nama_ayah` varchar(20) NOT NULL,
  `nama_ibu` varchar(20) NOT NULL,
  `pdd_ayah` varchar(20) NOT NULL,
  `pdd_ibu` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_walisiswa` varchar(50) DEFAULT NULL,
  `hbg_klg` varchar(50) DEFAULT NULL,
  `pkj_wali` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`kd_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdit_sumenep.peserta: ~3 rows (approximately)
/*!40000 ALTER TABLE `peserta` DISABLE KEYS */;
INSERT INTO `peserta` (`kd_peserta`, `nama_peserta`, `pangilan`, `NIK`, `jenis_kelamin`, `tk_asal`, `alamat_tkasal`, `tempat_lahir`, `tgl_lhr`, `agama`, `jml_sdrkndung`, `nama_sdrkndung1`, `sekolah_sdrkndung1`, `nama_sdrkndung2`, `sekolah_sdrkandung2`, `nama_sdrkndung3`, `sekolah_sdrkndung3`, `bhs_rmh`, `gol_darah`, `alamat`, `no_hp_orangtua`, `alat_transportasi`, `jrk_kesekolah`, `nama_ayah`, `nama_ibu`, `pdd_ayah`, `pdd_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_walisiswa`, `hbg_klg`, `pkj_wali`, `no_telp`) VALUES
	('PS001', 'siro', 'gane', '1231312-31', 'laki-laki', 'sumenep 02', 'sumenep', 'madura', '1998-01-06', 'islam', '2', 'joko', 'sekolah', 'ani', 'sd', '-', '-', 'inggris', 'O', 'jalan mawar', '1021031203', 'pesawat', '32', 'joki', 'nina', 'S2', 'S2', 'guru', 'ibu rt', 'musa', 'adik', 'staff ti', '31231312'),
	('PS002', 'gane', 'gani', '202003o10', 'laki-laki', 'denpasar 03', 'denpasar', 'bali', '1999-12-23', 'islam', '2', 'harun', 'sakdsak', 'asdaskd', 'asdaskd;a', 'asdasd', 'asdas', 'ma', 'B', 'aslldkla', '24324324', 'sldasdl', '22', 'sjdalksjd', 'asdsak', 'asjdkasjd', 'askdjkl', 'askdjasj', 'asdlkajsd', 'aksdjas', 'skadjkaj', 'asjdaskdjal', '11919'),
	('PS003', 'asa', 'asaS', '', 'asa', 'ASA', 'SSAD', 'Situbondo', '2018-08-27', 'asdas', '2', 'asdas', 'asd', 'asdaskd', 'asdsa', 'asdasd', 'sad', 'inggris', 'B', 'sad', '087757738405', 'saa', '22', 'asd', 'asdsa', 'asdsa', 'asdsa', 'asdsa', 'asdsa', 'asdsad', 'adik', 'sad', '333333');
/*!40000 ALTER TABLE `peserta` ENABLE KEYS */;

-- Dumping structure for table sdit_sumenep.sistem_psb
CREATE TABLE IF NOT EXISTS `sistem_psb` (
  `no` varchar(50) NOT NULL,
  `kd_peserta` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tanggal_input` date NOT NULL,
  `psikologi` double DEFAULT NULL,
  `alquran` double DEFAULT NULL,
  `akademik` double DEFAULT NULL,
  `nilai_rata` double NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `kd_peserta` (`kd_peserta`),
  KEY `kd_user` (`nama_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdit_sumenep.sistem_psb: ~2 rows (approximately)
/*!40000 ALTER TABLE `sistem_psb` DISABLE KEYS */;
INSERT INTO `sistem_psb` (`no`, `kd_peserta`, `nama_petugas`, `tanggal_input`, `psikologi`, `alquran`, `akademik`, `nilai_rata`, `status`) VALUES
	('No001', 'PS001', 'siro_gane', '2018-09-18', 33, 44, 33, 36.666666666667, ''),
	('No002', 'PS001', 'siro_gane', '2018-09-20', 40, 89, 80, 69.666666666667, '');
/*!40000 ALTER TABLE `sistem_psb` ENABLE KEYS */;

-- Dumping structure for table sdit_sumenep.tabel_admin
CREATE TABLE IF NOT EXISTS `tabel_admin` (
  `USERNAME_ADMIN` varchar(25) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `LEVEL_ADMIN` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`USERNAME_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table sdit_sumenep.tabel_admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `tabel_admin` DISABLE KEYS */;
INSERT INTO `tabel_admin` (`USERNAME_ADMIN`, `PASSWORD`, `LEVEL_ADMIN`) VALUES
	('siro_gane', '12345', 'admin');
/*!40000 ALTER TABLE `tabel_admin` ENABLE KEYS */;

-- Dumping structure for table sdit_sumenep.user
CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdit_sumenep.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
