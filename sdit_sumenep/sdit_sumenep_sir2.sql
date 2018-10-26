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
	('PS003', 'abraham', 'asaS', '2324234', 'asa', 'ASA', 'SSAD', 'Situbondo', '1999-10-25', 'asdas', '2', 'asdas', 'asd', 'asdaskd', 'asdsa', 'asdasd', 'sad', 'inggris', 'B', 'sad', '087757738405', 'saa', '22', 'asd', 'asdsa', 'asdsa', 'asdsa', 'asdsa', 'asdsa', 'asdsad', 'adik', 'sad', '333333'),
	('PS004', 'Naruto', 'uzumaki', '1212-12', 'L', 'denpasar 03', 'denpasar', 'Situbondo', '1992-10-20', 'islam', '2', 'harun', 'sekolah', 'ani', 'Budi', '-', '-', 'inggris', 'B', 'jalan mawar', '087757738405', 'pesawat', '23', 'joki', 'nina', 'S2', 'S2', 'guru', 'ibu rt', '68373', 'adik', 'staff ti', '0020202');
/*!40000 ALTER TABLE `peserta` ENABLE KEYS */;

-- Dumping structure for table sdit_sumenep.sistem_psb
CREATE TABLE IF NOT EXISTS `sistem_psb` (
  `id_nilai` varchar(50) NOT NULL,
  `kd_peserta` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tanggal_input` date NOT NULL,
  `psikologi` double DEFAULT NULL,
  `alquran` double DEFAULT NULL,
  `akademik` double DEFAULT NULL,
  `nilai_rata` double NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `kd_peserta` (`kd_peserta`),
  KEY `kd_user` (`nama_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdit_sumenep.sistem_psb: ~2 rows (approximately)
/*!40000 ALTER TABLE `sistem_psb` DISABLE KEYS */;
INSERT INTO `sistem_psb` (`id_nilai`, `kd_peserta`, `nama_petugas`, `tanggal_input`, `psikologi`, `alquran`, `akademik`, `nilai_rata`, `status`) VALUES
	('no001', 'PS001', 'siro_gane', '2018-10-19', 58, 88, 95, 80.333333333333, ''),
	('no002', 'PS003', 'siro_gane', '2018-10-25', 90, 100, 80, 90, ''),
	('no003', 'PS003', 'userbali', '2018-10-26', 70, 100, 55, 75, ''),
	('no004', 'PS004', 'userbali', '2018-10-26', 70, 60, 80, 70, '');
/*!40000 ALTER TABLE `sistem_psb` ENABLE KEYS */;

-- Dumping structure for table sdit_sumenep.table_admin
CREATE TABLE IF NOT EXISTS `table_admin` (
  `USERNAME_ADMIN` varchar(150) DEFAULT NULL,
  `PASSWORD` varchar(150) DEFAULT NULL,
  `LEVEL_ADMIN` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdit_sumenep.table_admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `table_admin` DISABLE KEYS */;
INSERT INTO `table_admin` (`USERNAME_ADMIN`, `PASSWORD`, `LEVEL_ADMIN`) VALUES
	('admin', '123456', 'admin'),
	('userbali', 'bali2018', 'admin');
/*!40000 ALTER TABLE `table_admin` ENABLE KEYS */;

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
