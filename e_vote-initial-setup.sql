
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

---------------------------------------------------------

CREATE TABLE `t_admin` (
  `id_admin` tinyint(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`) VALUES
(1, 'ReiChan', 'administrator', '$2y$10$5ok3rcIOv/yNIlPIGo49a.cXRAiA5ZsnxbpijFoyy5EuuYyVrZetu');

---------------------------------------------------------

CREATE TABLE `t_kandidat` (
  `id_kandidat` smallint(4) NOT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `suara` smallint(4) NOT NULL DEFAULT '0',
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

---------------------------------------------------------
CREATE TABLE `t_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

---------------------------------------------------------

CREATE TABLE `t_pemilih` (
  `nis` varchar(10) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

---------------------------------------------------------

CREATE TABLE `t_user` (
  `id_user` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `id_kelas` varchar(3) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `pemilih` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

----------------------------------------------------------

ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);
-------------------------
ALTER TABLE `t_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);
-------------------------
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);
-------------------------
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);
-------------------------
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--------------------------
ALTER TABLE `t_kandidat`
  MODIFY `id_kandidat` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;