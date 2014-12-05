-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 05, 2014 at 03:17 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `INGREDIENTE`
--

CREATE TABLE `INGREDIENTE` (
`ID_INGREDIENTE` int(11) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `PRECO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `INGREDIENTE`
--

INSERT INTO `INGREDIENTE` (`ID_INGREDIENTE`, `QUANTIDADE`, `PRECO`) VALUES
(1, 100, 1),
(2, 100, 3),
(3, 100, 4),
(4, 100, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `INGREDIENTE`
--
ALTER TABLE `INGREDIENTE`
 ADD PRIMARY KEY (`ID_INGREDIENTE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `INGREDIENTE`
--
ALTER TABLE `INGREDIENTE`
MODIFY `ID_INGREDIENTE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;