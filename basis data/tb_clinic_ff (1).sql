-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 19.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_clinic_ff`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action`
--

CREATE TABLE `action` (
  `action_id` int(3) NOT NULL,
  `action_name` varchar(100) NOT NULL,
  `action_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `action`
--

INSERT INTO `action` (`action_id`, `action_name`, `action_price`) VALUES
(1, 'Pemeriksaan Biasa', '15000'),
(2, 'Rawat Luka', '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(3) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `doctor_gender` varchar(2) NOT NULL,
  `doctor_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `doctor_address`, `doctor_gender`, `doctor_phone`) VALUES
(1, 'Fahira', 'Belawan bahari', 'P', '085345678878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medical_record`
--

CREATE TABLE `medical_record` (
  `medical_id` int(3) NOT NULL,
  `medical_date` date NOT NULL,
  `medical_diagnose` varchar(100) NOT NULL,
  `medical_temperature` varchar(50) NOT NULL,
  `medical_blood_pressure` varchar(50) NOT NULL,
  `medical_price` varchar(100) NOT NULL,
  `medical_total` int(11) NOT NULL,
  `registry_id` int(3) NOT NULL,
  `action_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medical_record`
--

INSERT INTO `medical_record` (`medical_id`, `medical_date`, `medical_diagnose`, `medical_temperature`, `medical_blood_pressure`, `medical_price`, `medical_total`, `registry_id`, `action_id`) VALUES
(14, '2022-08-01', ' Demam', ' 37 derajat', ' 120/90', ' 50000', 0, 2, 1),
(16, '0000-00-00', 'mabuk', '25 derajat', '120/50', '3000', 0, 2, 1),
(17, '0000-00-00', 'mabuk', '25 derajat', '120/50', '4000', 0, 2, 1),
(18, '0000-00-00', 'mabuk', '25 derajat', '120/50', '4000', 0, 3, 1),
(19, '0000-00-00', 'mabuk cinta', '25 derajat', '120/50', '4000', 0, 1, 2),
(20, '2022-08-03', 'Mabuk', '22 Derajat', '100/500', '39990', 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(3) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `medicine_category` varchar(50) NOT NULL,
  `medicine_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_category`, `medicine_price`) VALUES
(1, 'Paramex', 'Tablet', 4500),
(2, 'Paracetamol', 'Syrup', 17000),
(3, 'Komix', 'Syrup', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `patience`
--

CREATE TABLE `patience` (
  `patience_id` int(3) NOT NULL,
  `patience_name` varchar(100) NOT NULL,
  `patience_address` varchar(100) NOT NULL,
  `patience_blood` varchar(50) NOT NULL,
  `patience_age` varchar(50) NOT NULL,
  `patience_gender` varchar(2) NOT NULL,
  `patience_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `patience`
--

INSERT INTO `patience` (`patience_id`, `patience_name`, `patience_address`, `patience_blood`, `patience_age`, `patience_gender`, `patience_phone`) VALUES
(1, 'Fahmi', 'Kisaran bandung', 'B', '23', 'L', '085262774356'),
(2, 'Salsa', 'Belawan', 'O', '23', 'P', '083456788907');

-- --------------------------------------------------------

--
-- Struktur dari tabel `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(3) NOT NULL,
  `recipe_qty` int(50) NOT NULL,
  `recipe_total` int(50) NOT NULL,
  `medicine_id` int(3) NOT NULL,
  `medical_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_qty`, `recipe_total`, `medicine_id`, `medical_id`) VALUES
(34, 3, 51000, 2, 14),
(35, 2, 34000, 2, 14),
(36, 8, 36000, 1, 14),
(39, 3, 0, 3, 17),
(40, 2, 9000, 1, 17),
(41, 4, 18000, 1, 17),
(42, 50, 850000, 2, 19),
(43, 125, 125000, 3, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registry`
--

CREATE TABLE `registry` (
  `registry_id` int(3) NOT NULL,
  `registry_date` date NOT NULL,
  `registry_time` time NOT NULL,
  `registry_price` varchar(100) NOT NULL,
  `patience_id` int(3) NOT NULL,
  `doctor_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registry`
--

INSERT INTO `registry` (`registry_id`, `registry_date`, `registry_time`, `registry_price`, `patience_id`, `doctor_id`) VALUES
(1, '2022-07-31', '19:19:05', '23000', 1, 1),
(2, '2022-07-31', '19:19:05', '23000', 2, 1),
(3, '2022-07-01', '02:59:00', '3000', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(3) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_total` varchar(50) NOT NULL,
  `registry_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `no_hp`) VALUES
(1, 'fadil', 'fadil', '0895358349898'),
(2, 'fadilcs1', 'fadil', '0895658552'),
(3, 'fadilcs12', 'fadil', '0895658585');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indeks untuk tabel `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indeks untuk tabel `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`medical_id`),
  ADD KEY `registry_id` (`registry_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indeks untuk tabel `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indeks untuk tabel `patience`
--
ALTER TABLE `patience`
  ADD PRIMARY KEY (`patience_id`);

--
-- Indeks untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `medical_id` (`medical_id`);

--
-- Indeks untuk tabel `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`registry_id`),
  ADD KEY `patience_id` (`patience_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `registry_id` (`registry_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `action`
--
ALTER TABLE `action`
  MODIFY `action_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `medical_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `patience`
--
ALTER TABLE `patience`
  MODIFY `patience_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `registry`
--
ALTER TABLE `registry`
  MODIFY `registry_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`registry_id`) REFERENCES `registry` (`registry_id`),
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`action_id`);

--
-- Ketidakleluasaan untuk tabel `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`medical_id`) REFERENCES `medical_record` (`medical_id`);

--
-- Ketidakleluasaan untuk tabel `registry`
--
ALTER TABLE `registry`
  ADD CONSTRAINT `registry_ibfk_1` FOREIGN KEY (`patience_id`) REFERENCES `patience` (`patience_id`),
  ADD CONSTRAINT `registry_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`registry_id`) REFERENCES `registry` (`registry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
