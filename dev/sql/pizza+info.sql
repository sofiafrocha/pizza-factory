-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2014 at 09:21 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `CLIENTE`
--

CREATE TABLE `CLIENTE` (
`ID_CLIENTE` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `MORADA` varchar(45) NOT NULL,
  `TELEFONE` decimal(9,0) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `USERNAME` varchar(45) NOT NULL,
  `PASSWORD` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CLIENTE`
--

INSERT INTO `CLIENTE` (`ID_CLIENTE`, `NOME`, `MORADA`, `TELEFONE`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Obi Wan Kenobi', 'Little Gardens, Chicken Bristle', 987567345, 'kenobi@jo.org', 'okenobi', 'okenobi1'),
(2, 'Leia Organa', 'Umber Log Canyon, Penny Pot', 987678567, 'lorgana@is.org', 'lorgana', 'lorgana1'),
(3, 'Darth Vader', 'Silver Maze, Tally Ho', 345789654, 'darth@empire.org', 'dvader', 'dvader1'),
(4, 'Darth Maul', 'Dewy Farms, Cape Fear', 765456234, 'dmaul@si.th', 'dmaul', 'dmaul1'),
(5, 'Han Solo', 'Quiet Robin Glen, Pumpkin', 856476345, 'hsolo@smuglers.com', 'hsolo', 'hsolo1'),
(6, 'Luke Skywalker', 'Harvest Corner, Fairplay', 78476453, 'lskywalker@rebels.org', 'lskywalker', 'lskywalker1'),
(7, 'Anakin Skywalker', 'Gentle Embers Carrefour 01', 962123123, 'anakin@jo.org', 'askywalker', 'askywalker1');

-- --------------------------------------------------------

--
-- Table structure for table `ENCOMENDA`
--

CREATE TABLE `ENCOMENDA` (
`ID_ENC` int(11) NOT NULL,
  `CLI_ID_CLIENTE` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO` int(11) NOT NULL,
  `PRECO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `PIZZA`
--

CREATE TABLE `PIZZA` (
`ID_PIZZA` int(11) NOT NULL,
  `ID_ENC` int(11) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `TAMANHO` varchar(45) NOT NULL,
  `MASSA` varchar(45) NOT NULL,
  `TOMATE` tinyint(1) NOT NULL,
  `QUEIJO` tinyint(1) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PRECO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PIZZA_HAS_INGREDIENTE`
--

CREATE TABLE `PIZZA_HAS_INGREDIENTE` (
  `ID_INGREDIENTE` int(11) NOT NULL,
  `ID_PIZZA` int(11) NOT NULL,
  `NUMERO`int (11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CLIENTE`
--
ALTER TABLE `CLIENTE`
 ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indexes for table `ENCOMENDA`
--
ALTER TABLE `ENCOMENDA`
 ADD PRIMARY KEY (`ID_ENC`), ADD KEY `FK_FAZ` (`CLI_ID_CLIENTE`);

--
-- Indexes for table `INGREDIENTE`
--
ALTER TABLE `INGREDIENTE`
 ADD PRIMARY KEY (`ID_INGREDIENTE`);

--
-- Indexes for table `PIZZA`
--
ALTER TABLE `PIZZA`
 ADD PRIMARY KEY (`ID_PIZZA`), ADD KEY `FK_TEM` (`ID_ENC`);

--
-- Indexes for table `PIZZA_HAS_INGREDIENTE`
--
ALTER TABLE `PIZZA_HAS_INGREDIENTE`
 ADD PRIMARY KEY (`ID_INGREDIENTE`,`ID_PIZZA`), ADD KEY `FK_LEVA_UM` (`ID_PIZZA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CLIENTE`
--
ALTER TABLE `CLIENTE`
MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ENCOMENDA`
--
ALTER TABLE `ENCOMENDA`
MODIFY `ID_ENC` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `INGREDIENTE`
--
ALTER TABLE `INGREDIENTE`
MODIFY `ID_INGREDIENTE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `PIZZA`
--
ALTER TABLE `PIZZA`
MODIFY `ID_PIZZA` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ENCOMENDA`
--
ALTER TABLE `ENCOMENDA`
ADD CONSTRAINT `FK_FAZ` FOREIGN KEY (`CLI_ID_CLIENTE`) REFERENCES `CLIENTE` (`ID_CLIENTE`);

--
-- Constraints for table `PIZZA`
--
ALTER TABLE `PIZZA`
ADD CONSTRAINT `FK_TEM` FOREIGN KEY (`ID_ENC`) REFERENCES `ENCOMENDA` (`ID_ENC`);

--
-- Constraints for table `PIZZA_HAS_INGREDIENTE`
--
ALTER TABLE `PIZZA_HAS_INGREDIENTE`
ADD CONSTRAINT `FK_ESTA_NUMA` FOREIGN KEY (`ID_INGREDIENTE`) REFERENCES `INGREDIENTE` (`ID_INGREDIENTE`),
ADD CONSTRAINT `FK_LEVA_UM` FOREIGN KEY (`ID_PIZZA`) REFERENCES `PIZZA` (`ID_PIZZA`);
