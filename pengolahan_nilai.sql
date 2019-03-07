-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2019 pada 01.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengolahan_nilai`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertNilai` (IN `kd_detailsiswa` INT, IN `kd_detailguru` INT, IN `ntgs1` DECIMAL(10,0), IN `ntgs2` DECIMAL(10,0), IN `ntgs3` DECIMAL(10,0), IN `nuts` DECIMAL(10,0), IN `nuas` DECIMAL(10,0))  BEGIN
DECLARE tugas DECIMAL(10,0);
            DECLARE nmapel DECIMAL(10,0);
            DECLARE gradesiswa CHAR(1);

            SET tugas = (ntgs1 + ntgs2 + ntgs3)/ 3;
            SET nmapel = ((tugas * 30)/100) + ((nuts * 30)/100) + ((nuas * 40)/100);
            
            IF (nmapel >= 80 AND nmapel <= 100) THEN 
               SET gradesiswa = 'A';
            ELSEIF (nmapel >= 70 AND nmapel < 80) THEN 
            	SET gradesiswa = 'B';
            ELSEIF (nmapel >= 60 AND nmapel < 70) THEN 
            	SET gradesiswa = 'C';
            ELSEIF (nmapel >= 50 AND nmapel < 60) THEN 
            	SET gradesiswa = 'D';
            ELSE 
            	SET gradesiswa = 'E';
            END IF;

        INSERT INTO nilai(kode_detail_siswa, kode_detail_guru, tgs1, tgs2, tgs3, uts, uas, na_mapel, grade) VALUES (kd_detailsiswa, kd_detailguru, ntgs1, ntgs2, ntgs3, nuts, nuas, nmapel, gradesiswa);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateNilai` (IN `kd_nilai` INT, IN `ntgs1` DECIMAL(10,0), IN `ntgs2` DECIMAL(10,0), IN `ntgs3` DECIMAL(10,0), IN `nuts` DECIMAL(10,0), IN `nuas` DECIMAL(10,0), IN `photo` VARCHAR(20))  BEGIN
DECLARE tugas DECIMAL(10,0);
            DECLARE nmapel DECIMAL(10,0);
            DECLARE gradesiswa CHAR(1);

            SET tugas = (ntgs1 + ntgs2 + ntgs3)/ 3;
            SET nmapel = ((tugas * 30)/100) + ((nuts * 30)/100) + ((nuas * 40)/100);
            
            IF (nmapel >= 80 AND nmapel <= 100) THEN 
               SET gradesiswa = 'A';
            ELSEIF (nmapel >= 70 AND nmapel < 80) THEN 
            	SET gradesiswa = 'B';
            ELSEIF (nmapel >= 60 AND nmapel < 70) THEN 
            	SET gradesiswa = 'C';
            ELSEIF (nmapel >= 50 AND nmapel < 60) THEN 
            	SET gradesiswa = 'D';
            ELSE 
            	SET gradesiswa = 'E';
            END IF;

        UPDATE nilai 
        SET tgs1 = ntgs1, tgs2 = ntgs2, tgs3 = ntgs3, uts = nuts, uas = nuas, na_mapel = nmapel, foto = photo, grade = gradesiswa
        WHERE kode_nilai = kd_nilai;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_guru`
--

CREATE TABLE `detail_guru` (
  `kode_detail_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `kode_mapel` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_siswa`
--

CREATE TABLE `detail_siswa` (
  `kode_detail_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `tahun_ajar` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `no_telp` decimal(15,0) NOT NULL,
  `foto` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `nama_kelas` char(1) NOT NULL,
  `walikelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(40) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` int(11) NOT NULL,
  `tgs1` decimal(10,0) NOT NULL,
  `tgs2` decimal(10,0) NOT NULL,
  `tgs3` decimal(10,0) NOT NULL,
  `uts` decimal(10,0) NOT NULL,
  `uas` decimal(10,0) NOT NULL,
  `na_mapel` decimal(10,0) NOT NULL,
  `grade` char(1) NOT NULL,
  `kode_detail_siswa` int(11) NOT NULL,
  `kode_detail_guru` int(11) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_user`, `username`, `password`) VALUES
(1, 'fida', 'fida');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_guru`
--
ALTER TABLE `detail_guru`
  ADD PRIMARY KEY (`kode_detail_guru`);

--
-- Indeks untuk tabel `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD PRIMARY KEY (`kode_detail_siswa`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_guru`
--
ALTER TABLE `detail_guru`
  MODIFY `kode_detail_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_siswa`
--
ALTER TABLE `detail_siswa`
  MODIFY `kode_detail_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `kode_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kode_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
