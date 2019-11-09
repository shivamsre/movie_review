-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 08:46 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviereview`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `user` varchar(100) NOT NULL,
  `following` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`user`, `following`) VALUES
('17', '17'),
('d=', '16'),
('16', '16');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `moviename` varchar(100) NOT NULL,
  `thumbnail` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviename`, `thumbnail`, `title`, `id`) VALUES
('1', 'a', 'Not Your Barbie Girl', 1),
('2', 'b', 'Lavender\'s Blue', 2),
('3', 'c', 'Alone', 3),
('4', 'd', 'The Way I Are', 4),
('5', 'e', 'Blank Space', 5),
('6', 'f', 'Hymn For Weekend', 6),
('7', 'g', 'Come And Get It', 7),
('8', 'h', 'Cyberpunk', 8),
('9', 'i', 'Into The Dead', 9),
('10', 'j', 'Friction', 10),
('11', 'k', 'Good Life', 11),
('12', 'l', 'Boom Shankar', 12),
('13', 'm', 'La Culpa', 13),
('14', 'n', 'One More Night', 14),
('15', 'o', 'Delicate', 15),
('16', 'p', 'Joker', 16);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `moviename` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` varchar(599) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`moviename`, `username`, `comments`, `rating`, `id`) VALUES
('1', 'Arjun', 'This song is good', '4', 16),
('2', 'Vansh', 'good', '5', 17),
('3', 'Ayush', 'great song', '5', 18),
('5', 'Vansh', 'fine', '5', 17),
('1', '', 'qwerty', '', 0),
('3', 'Anush', 'cool', '5', 24),
('3', 'qwe', 'qwerty', '5', 28),
('3', 'Arjun', 'qwerty', '', 16),
('', '', 'qwe', '', 0),
('Venom', '', 'good movie', '5', 0),
('Venom', 'Arjun', 'good movie', '1', 16),
('Black Panther', 'Arjun', 'qwerty', '5', 16),
('2', 'Arjun', 'qwert', '', 16),
('', 'Arjun', 'good movie', '5', 16),
('439079', 'Arjun', 'none', '5', 16),
('335983', 'Arjun', 'hello', '1', 16),
('${movieId}', 'Arjun', 'qwert', '1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`) VALUES
('Arjun', 'qwerty', 16),
('Vansh', 'qwerty', 17),
('Ayush', 'qwerty', 18),
('Antim', 'qwerty', 19),
('Bittu', 'qwerty', 20),
('Akhil', 'qwerty', 21),
('Akash', 'qwerty', 22),
('Rahul', 'qwerty', 23),
('Anush', 'qwerty', 24),
('Shivam', 'qwerty', 25),
('Mehul', 'qwerty', 26),
('Anuj', 'qwerty', 27),
('qwe', 'qwerty', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
