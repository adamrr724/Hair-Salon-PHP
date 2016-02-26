-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 26, 2016 at 08:21 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: hair_salon
--
CREATE DATABASE IF NOT EXISTS hair_salon DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE hair_salon;

--
-- Dumping data for table clients
--

INSERT INTO clients (id, client_name, phone, email, stylist_id) VALUES
(13, 'Field Goals', '230-098-9876', 'Ikicklongones@yahoo.com', 8),
(14, 'Olivia Munn', '234-654-9876', '<3aaron@yahoo.com', 10),
(15, 'Every NFL QB', '456-987-3845', 'Iwilleatyou@gmail.com', 11),
(16, 'Mary J', '420-420-4200', 'dontgetcaught@yahoo.com', 12),
(17, 'Eddie Lacy', '435-675-8765', 'gottaslimdown@hotmail.com', 18),
(18, 'Oh No Clinton Dix', '435-983-9376', 'whatkindofnameisthat?@gmail.com', 19),
(19, 'Anterior Cruciate Ligament', '555-456-8354', 'betterhealquick@yahoo.com', 20),
(20, 'Baby Face', '435-231-9876', 'bigboybabyface@yahoo.com', 21),
(21, 'Football', '324-987-7645', 'insteadofkissesigetkicked@gmail.com', 22),
(22, 'Julio Jones', '234-987-8754', 'safetynightmare@aol.com', 23),
(23, 'The Salon', '329-993-0498', 'LongHairDontCare@gmail.com', 24),
(24, 'Olines', '234-987-3564', 'gettinsacks@yahoo.com', 25),
(25, 'Dlines', '234-495-9857', 'preventinsacks@yahoo.com', 26),
(26, 'Macdonalds', '123-432-4723', 'cheezburgereddie@gmail.com', 27),
(27, 'Hail Mary', '234-546-5436', 'claimtofame@espn.com', 28),
(28, 'Killer Insticts', '324-435-3453', 'breakoutyear@gmail.com', 30);

--
-- Dumping data for table stylists
--

INSERT INTO stylists (id, name) VALUES
(8, 'Mason Crosby'),
(10, 'Aaron Rodgers'),
(11, 'Clay Matthews'),
(12, 'Letroy Guion'),
(18, 'Mike McCarthy'),
(19, 'Ha Ha Clinton Dix'),
(20, 'Jordy Nelson'),
(21, 'BJ Raji'),
(22, 'Tim Masthay'),
(23, 'Morgan Burnett'),
(24, 'David Bhaktiari'),
(25, 'Mike Neal'),
(26, 'TJ Lang'),
(27, 'Eddie Lacy'),
(28, 'Richard Rodgers'),
(29, 'Randall Cobb'),
(30, 'Jayrone Elliott');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
