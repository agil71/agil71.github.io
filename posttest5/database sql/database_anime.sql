-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 01:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bio_anime`
--

-- --------------------------------------------------------

--
-- Table structure for table `character_anime`
--

CREATE TABLE `character_anime` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul_anime` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `character_anime`
--

INSERT INTO `character_anime` (`id`, `nama`, `judul_anime`, `umur`, `gender`) VALUES
(0, 'Eren Yeager', 'Attack On Titan', '20', 'male'),
(0, 'Gojo Satoru', 'Jujutsu Kaisen', '28', 'male'),
(0, 'kamado tanjiro', 'kimetsu no yaiba', '18', 'male'),
(0, 'Anos Voldigoad', 'Maou Gakuin', '17', 'male'),
(0, 'Chitoge Kirisaki', 'Nisekoi', '17', 'female'),
(0, 'Naruto Uzumaki', 'Naruto', '19', 'male'),
(0, 'Uchiha Sasuke', 'Naruto', '19', 'male'),
(0, 'Katsuki Bakugou', 'My Hero Academia', '17', 'male'),
(0, 'raku ichijou', 'Nisekoi', '17', 'male'),
(0, 'Chika Fujiwara', 'Kaguya sama wa Kokurasetai', '18', 'female'),
(0, 'Monkey D.Luffy', 'One Piece', '19', 'male'),
(0, 'Roronoa Zoro', 'One Piece', '20', 'male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
