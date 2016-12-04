-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 11:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbdiary`
--

CREATE TABLE `tbdiary` (
  `idDiary` int(11) NOT NULL,
  `diarytitle` varchar(100) NOT NULL,
  `diarycontent` varchar(1024) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdiary`
--

INSERT INTO `tbdiary` (`idDiary`, `diarytitle`, `diarycontent`, `username`) VALUES
(1, 'AKU', 'Aku adalah anak gembala, selalu riang serta gembira.', 'lepi'),
(2, 'DIA', 'Dia, adalah dia bukan aku.', 'wilson'),
(4, 'Henry', 'Henry cowo angelinezhang', 'aku'),
(7, 'Coba Kamu', 'Kamu adalah kamu\r\n', 'kamu'),
(8, 'aaa', 'aaa', 'kamu');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `username` varchar(50) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`username`, `password`, `fullname`, `email`) VALUES
('aku', '22220c18caede9806cb42c8e2b41136d711673bf', 'aku', 'aku@gmail.com'),
('kamu', '76c0af47fddcd9d6ea61bebe31bc73422c4c6b9b', 'kamu', 'kamu@gmail.com'),
('lepi', 'a3d67768fcfefd2aa68d345cb660095edfdb5bd9', 'lepi', 'lepidotcom'),
('stanley', '2b43fb8b7a234825d50dd49ce7892d78a59da8f3', 'curut', 'harumsekali@gmail.com'),
('wilson', 'b2ffdbeb87e8e6331d350b482b328d309bc5a321', 'wilson acong', 'wilson@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdiary`
--
ALTER TABLE `tbdiary`
  ADD PRIMARY KEY (`idDiary`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdiary`
--
ALTER TABLE `tbdiary`
  MODIFY `idDiary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
