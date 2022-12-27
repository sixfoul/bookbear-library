-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 06:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookbear`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `CallNo` varchar(100) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  `Images` varchar(250) CHARACTER SET latin1 NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Title`, `Author`, `Publisher`, `CallNo`, `Availability`, `Images`, `note`) VALUES
(1, 'Circe: A Novel', 'Miller, Madeline.', 'New York: Little, Brown and Company, 2018.', '813.6', 'Available', 'images/circe.jpg', 'jhuh'),
(2, 'to know and nurture a reader: Conferring with Confidence and Joy', 'Yates, Kari', 'Portland, Maine: Stenhouse Publishers, 2018.', '372.4', 'Not Available', 'images/toknowandnurture.jpg', 'test'),
(3, 'MODERN SPACES: A Subjective Atlas of 20th-Century Interiors', 'Grospierre, Nicolas', 'Munchen: Prestel, 2018.', '724.6', 'Available', 'images/modernspaces.jpg', 'test'),
(4, 'Ride A Bike!: Reclaim the City', 'Basel, Switzerland: Birkhauser, 2018.', 'Basel, Switzerland: Birkhauser, 2018.', '711.72', 'Not Available', 'images/rideabike.jpg', 'test'),
(5, 'The Allure of Fungi', 'Pouliot, Alison', 'Clayton South, VIC: CSIRO Publishing, 2018.', '579.50994', 'Not Available', 'images/fungi.jpg', 'test'),
(6, 'Air Pollution: Sources, Impacts and Controls', 'Boston: CAB International, 2019.', 'Boston: CAB International, 2019.', '628.53', 'Not Available', 'images/airpollution.jpg', 'test'),
(7, 'History of Islamic Philosophy', 'New York: Routledge, 1996', 'New York: Routledge, 1996', '181.07/HIS', 'Available', 'images/history.jpg', 'test'),
(8, 'All My Secrets', 'McKenzie, Sophie, ', 'London: Simon & Schuster, 2015', '823', 'Not Available', 'images/allmysecrets.jpg', 'test'),
(9, 'Nation Branding: Concepts, Issues, Practice', 'Dinnie, Keith', 'New York, NY: Routledge, 2015', '658.827/DIN', 'Available', 'images\\nationbranding.jpg', 'test'),
(10, 'Working Reclaimed Wood: A Guide for Woodworkers, Makers, & Designers', 'Liberman, Yoav', 'Cincinatti, Ohio: Popular Woodoworking Books, 2018.', '684.08', 'Available', 'images/wood.jpg', 'test'),
(11, 'RESILIENT: Find Your Inner Strength', 'Hanson, Rick (Psychologist)', 'London: Rider Books, 2018.', '158.1', 'Available', 'images\\findyou.jpg', 'test'),
(12, 'Mentoring 101: What Every Leader Needs To Know', 'Maxwell, John C.', '1947-Nashville, Tenn. : T.Nelson, 2008.', '658.3124/MAX', 'Available', 'images\\mentoring.jpg', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `borrowinfo`
--

CREATE TABLE `borrowinfo` (
  `userName` varchar(100) NOT NULL,
  `pustaka_Ref` varchar(100) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `bookCallNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editborrow`
--

CREATE TABLE `editborrow` (
  `id` int(10) NOT NULL,
  `Title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pustaka`
--

CREATE TABLE `pustaka` (
  `pustakaName` varchar(100) NOT NULL,
  `pustakaCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pustaka`
--

INSERT INTO `pustaka` (`pustakaName`, `pustakaCode`) VALUES
('Pustaka Negeri Sarawak, Miri', 'Pustaka_Mi'),
('Pustaka Negeri Sarawak, Sibu', 'Pustaka_Si'),
('Pustaka Negeri Sarawak', 'Pustaka_Sr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `SarawakID` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`SarawakID`, `Password`) VALUES
('testingABC', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editborrow`
--
ALTER TABLE `editborrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`SarawakID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
