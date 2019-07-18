-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 09:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `knjigaID` int(11) NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `opis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`knjigaID`, `naslov`, `autor`, `opis`) VALUES
(1, 'Na Drini Cuprija', 'Ivo Andric', 'asdasdasd asdasdasdasdasd'),
(2, 'Tvrdjava', 'Mesa Selimovic', 'qweqweqweqwe'),
(3, 'Seobe', 'Milos Crnjanski', 'cvxcvxcvcxvxcvxc'),
(4, 'Blago Cara Radovana', 'Jovan Ducic', 'qeweqeweqeqwe');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacijaID` int(11) NOT NULL,
  `knjigaID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `brojdana` int(11) NOT NULL,
  `zanrID` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`rezervacijaID`, `knjigaID`, `userID`, `brojdana`, `zanrID`, `datum`) VALUES
(1, 1, 4, 60, 1, '2019-01-08'),
(2, 2, 5, 90, 2, '2019-02-11'),
(4, 2, 2, 30, 0, '2019-02-04'),
(5, 2, 4, 80, 2, '2019-01-08'),
(6, 1, 2, 90, 0, '2019-02-05'),
(7, 3, 3, 60, 2, '2019-01-08'),
(8, 3, 5, 120, 2, '2019-02-10'),
(9, 4, 5, 60, 2, '2019-02-05'),
(10, 4, 4, 90, 2, '2019-02-13'),
(11, 3, 6, 90, 0, '2019-02-07'),
(12, 1, 6, 90, 0, '2019-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `password`, `isAdmin`, `telephone`) VALUES
(1, 'Milica Bogdanovic', 'milica', 'milica123', 1, '987123423'),
(2, 'Vladan Simonovic', 'vladan', 'vladan123', 0, '345435345435'),
(3, 'Petar Petrovic', 'petar', 'petar123', 0, '4564564564'),
(4, 'Milos Milosevic', 'milos', 'milos123', 0, '3453453453'),
(5, 'Marina Filipovic', 'marina', 'marina123', 0, '12312312312'),
(6, 'Andjela Simonovic', 'andjela', 'andjela123', 0, '445646456');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `zanrID` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`zanrID`, `naziv`) VALUES
(1, 'Istorija'),
(2, 'Drama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`knjigaID`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacijaID`,`knjigaID`,`userID`,`zanrID`,`datum`),
  ADD KEY `knjigaid_fk` (`knjigaID`),
  ADD KEY `userid_fk` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`zanrID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `knjigaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `knjigaid_fk` FOREIGN KEY (`knjigaID`) REFERENCES `knjiga` (`knjigaID`),
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
