-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2025 pada 18.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_dokter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointments`
--

CREATE TABLE `appointments` (
  `id_appointment` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `tanggal_janji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `appointments`
--

INSERT INTO `appointments` (`id_appointment`, `id_doctor`, `id_patient`, `tanggal_janji`) VALUES
(1, 1, 1, '2024-12-09 15:46:00'),
(2, 2, 2, '2024-12-28 21:30:00'),
(3, 3, 3, '2025-01-03 14:01:00'),
(4, 4, 4, '2025-01-04 09:04:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `id_specialization` int(11) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `nama_dokter`, `id_specialization`, `kontak`) VALUES
(1, 'Dr. Aulia', 1, '081234567891'),
(2, 'Dr. Budi', 3, '0812345679'),
(3, 'Dr. Citra', 2, '0812345680'),
(4, 'Dr. Daniel', 4, '0812345681'),
(5, 'Dr. Erika', 5, '0812345682'),
(6, 'Dr. Faisal', 6, '0812345683'),
(7, 'Dr. Gina', 7, '0812345684'),
(8, 'Dr. Hendra', 8, '0812345685'),
(9, 'Dr. Irma', 9, '0812345686');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patients`
--

CREATE TABLE `patients` (
  `id_patient` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `keluhan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `patients`
--

INSERT INTO `patients` (`id_patient`, `nama_pasien`, `usia`, `keluhan`) VALUES
(1, 'Siti Yuni Nurnita Sari', 22, 'Jantung Koroner'),
(2, 'Andi Rukmana', 30, 'Kulit gatal'),
(3, 'Nadia Febriani', 20, 'Stroke'),
(4, 'Muhammad Arfy Rafa Fakhrezie', 22, 'Sakit Perut'),
(5, 'Thirza Fathurrahman', 19, 'Demam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id_prescription` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `dosis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prescriptions`
--

INSERT INTO `prescriptions` (`id_prescription`, `id_appointment`, `nama_obat`, `dosis`) VALUES
(1, 1, 'Aspirin', '3 x sehari'),
(2, 2, 'Difenhidramin dan Amoksisilin', '3 x sehari'),
(3, 3, 'Warfarin dan Aspirin', '3 x sehari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `specializations`
--

CREATE TABLE `specializations` (
  `id_specialization` int(11) NOT NULL,
  `nama_spesialisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `specializations`
--

INSERT INTO `specializations` (`id_specialization`, `nama_spesialisasi`) VALUES
(1, 'Kardiologi'),
(2, 'Neurologi'),
(3, 'Dermatologi'),
(4, 'Gastroenterologi'),
(5, 'Ortopedi'),
(6, 'Pediatri'),
(7, 'Oftalmologi'),
(8, 'Psikiatri'),
(9, 'Onkologi'),
(10, 'Ginekologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','doctor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'dr.aulia', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(3, 'dr.budi', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(4, 'dr.citra', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(5, 'dr.daniel', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(6, 'dr.erika', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(7, 'dr.faisal', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(8, 'dr.gina', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(9, 'dr.hendra', 'cab2d8232139ee4f469a920732578f71', 'doctor'),
(10, 'dr.irma', 'cab2d8232139ee4f469a920732578f71', 'doctor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id_appointment`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Indeks untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_specialization` (`id_specialization`);

--
-- Indeks untuk tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indeks untuk tabel `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id_prescription`),
  ADD KEY `id_appointment` (`id_appointment`);

--
-- Indeks untuk tabel `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id_specialization`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`id_patient`);

--
-- Ketidakleluasaan untuk tabel `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_specialization`) REFERENCES `specializations` (`id_specialization`);

--
-- Ketidakleluasaan untuk tabel `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`id_appointment`) REFERENCES `appointments` (`id_appointment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
