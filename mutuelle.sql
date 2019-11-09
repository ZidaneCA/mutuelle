-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 01:40 PM
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
CREATE database mutuelle;
use mutuelle;
--
-- Database: `mutuelle`
--

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(10) UNSIGNED NOT NULL,
  `matMembre` varchar(10) NOT NULL,
  `montant` decimal(12,2) UNSIGNED NOT NULL,
  `dateEmp` date NOT NULL,
  `delais` date NOT NULL,
  `matExp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epargne`
--

CREATE TABLE `epargne` (
  `id` int(10) UNSIGNED NOT NULL,
  `matMembre` varchar(10) NOT NULL,
  `montant` decimal(12,2) NOT NULL,
  `date` date NOT NULL,
  `matPercept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fondsociale`
--

CREATE TABLE `fondsociale` (
  `id` int(10) UNSIGNED NOT NULL,
  `matMembre` varchar(10) NOT NULL,
  `montant` decimal(12,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `delais` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interets`
--

CREATE TABLE `interets` (
  `idEmp` int(10) UNSIGNED NOT NULL,
  `matMembre` varchar(10) NOT NULL,
  `pourcentage` decimal(5,2) UNSIGNED NOT NULL,
  `montantInt` decimal(12,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `mat` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `tel` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `domicile` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`mat`, `nom`, `prenom`, `sex`, `admin`, `tel`, `email`, `adresse`, `domicile`, `photo`) VALUES
('000000', 'admin', 'admin', 'M', 1, 999777666, 'admin@mutuelle_ensp.com', 'Mutuelle', 'ENSP', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `parametres`
--

CREATE TABLE `parametres` (
  `id` int(10) UNSIGNED NOT NULL,
  `fondsociale` decimal(12,2) NOT NULL,
  `pourInteret` decimal(5,2) NOT NULL,
  `delaisRem` int(11) NOT NULL,
  `delaisFS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parametres`
--

INSERT INTO `parametres` (`id`, `fondsociale`, `pourInteret`, `delaisRem`, `delaisFS`) VALUES
(1, '150000.00', '10.00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rembourse`
--

CREATE TABLE `rembourse` (
  `id` int(10) UNSIGNED NOT NULL,
  `idEmp` int(10) UNSIGNED NOT NULL,
  `montant` decimal(12,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `matPercept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matMembre` (`matMembre`);

--
-- Indexes for table `epargne`
--
ALTER TABLE `epargne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matMembre` (`matMembre`);

--
-- Indexes for table `fondsociale`
--
ALTER TABLE `fondsociale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matMembre` (`matMembre`);

--
-- Indexes for table `interets`
--
ALTER TABLE `interets`
  ADD PRIMARY KEY (`idEmp`,`matMembre`),
  ADD KEY `idEmp` (`idEmp`,`matMembre`),
  ADD KEY `matMembre` (`matMembre`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`mat`);

--
-- Indexes for table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rembourse`
--
ALTER TABLE `rembourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmp` (`idEmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `epargne`
--
ALTER TABLE `epargne`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fondsociale`
--
ALTER TABLE `fondsociale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rembourse`
--
ALTER TABLE `rembourse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`matMembre`) REFERENCES `membre` (`mat`);

--
-- Constraints for table `epargne`
--
ALTER TABLE `epargne`
  ADD CONSTRAINT `epargne_ibfk_1` FOREIGN KEY (`matMembre`) REFERENCES `membre` (`mat`);

--
-- Constraints for table `fondsociale`
--
ALTER TABLE `fondsociale`
  ADD CONSTRAINT `fondsociale_ibfk_1` FOREIGN KEY (`matMembre`) REFERENCES `membre` (`mat`);

--
-- Constraints for table `interets`
--
ALTER TABLE `interets`
  ADD CONSTRAINT `interets_ibfk_1` FOREIGN KEY (`matMembre`) REFERENCES `membre` (`mat`),
  ADD CONSTRAINT `interets_ibfk_2` FOREIGN KEY (`idEmp`) REFERENCES `emprunt` (`id`);

--
-- Constraints for table `rembourse`
--
ALTER TABLE `rembourse`
  ADD CONSTRAINT `rembourse_ibfk_1` FOREIGN KEY (`idEmp`) REFERENCES `emprunt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
