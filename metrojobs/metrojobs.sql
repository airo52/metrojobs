-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 09:57 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metrojobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `CompanyID` int(255) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `NumberOfEmployees` varchar(10) NOT NULL,
  `Industry` varchar(20) NOT NULL,
  `TypeOfEmployer` varchar(10) NOT NULL,
  `ContactPerson` varchar(50) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyTel` varchar(12) NOT NULL,
  `CompanyAddress` varchar(50) NOT NULL,
  `County` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`CompanyID`, `CompanyName`, `NumberOfEmployees`, `Industry`, `TypeOfEmployer`, `ContactPerson`, `CompanyEmail`, `CompanyTel`, `CompanyAddress`, `County`) VALUES
(1, 'Delta', '50', 'IT', 'Private', 'Benard Olang', 'info@deltatechnologies.com', '254712345678', '45 Busia', 'Busia'),
(2, 'Twickenham ', '50', 'Accomodation', 'Private', 'John Braza', 'info@twickenham.com', '254721445263', '63 Chuka', 'Tharaka Ni'),
(3, 'Twitter', '500000', 'IT', 'Private', 'Jeff Buzzos', 'info@twitter.org', '25420002324', 'J7 Bamo', 'Tharaka Ni'),
(4, 'D coder', '26', 'Agriculture', 'Private', 'John Larry', 'info@dcoder.com', '254732353637', '5 Alpha House Kisumu', 'Kisumu'),
(5, '810 Networks', '50', 'technology', 'Public', 'Mr. Mwathi', 'info@810.com', '254710100810', '6 Nairobi', 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobID` int(255) NOT NULL,
  `no_of_vacancies` varchar(50) NOT NULL,
  `work_experience` varchar(10) NOT NULL,
  `professional_qualification` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `opening_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `CompanyID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobID`, `no_of_vacancies`, `work_experience`, `professional_qualification`, `location`, `salary`, `opening_date`, `closing_date`, `CompanyID`) VALUES
(1, '21', '0 - 1 Year', 'Computer Science Degree Holder', 'Kisumu', '20000', '2019-03-16', '2019-03-30', 4),
(3, '2', '2 - 3 Year', 'Masters Degree in Computer Engineering', 'Nairobi', '200000', '2019-03-16', '2019-04-30', 2),
(4, '50', '0 - 1 Year', 'Wed and Android Developers', 'Nairobi, Kisumu, Mombasa', '70000', '2019-03-30', '2019-04-30', 3),
(5, '5', '0 - 1 Year', 'it-software', 'Kisumu', 'Confidential', '2019-03-23', '2019-04-30', 5),
(6, '5', '0 - 1 Year', 'accounting-auditing', 'nakuru', 'Confidential', '2019-03-23', '2019-03-30', 5),
(7, '3', '2 - 3 Year', 'building-architecture', 'Mombasa', '75000', '2019-03-23', '2019-03-30', 3),
(8, '50', '2 - 3 Year', 'accounting-auditing', 'Kisumu', 'Confidential', '2019-03-27', '2019-04-30', 3),
(9, '14', '2 - 3 Year', 'administrative', 'Nairobi', 'Confidential', '2019-03-30', '2019-04-30', 3),
(10, '6', '2 - 3 Year', 'accounting-auditing', 'Kisumu', 'Confidential', '2019-03-30', '2019-04-17', 4),
(11, '5', '0 - 1 Year', 'accounting-auditing', 'Nakuru', 'Confidential', '2019-03-27', '2019-04-26', 4);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `UserID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`username`, `password`, `UserID`) VALUES
('emilymesso', '7e83d2e94d4e68a87e27d135927c2445', 4),
('jimmbob', 'dde927225d58f66ed16cf54eda6905f6', 2),
('juliusnyer', '525a469f71a8d8c1e8f079a86bd79f57', 5),
('user123', '6ad14ba9986e3615423dfca256d04e3f', 3);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `UserID` int(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Industry` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` varchar(12) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `ResidentialArea` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`UserID`, `FullName`, `Industry`, `Email`, `Tel`, `Address`, `ResidentialArea`) VALUES
(2, 'Jimm Bob Messo', 'Accomodation', 'jimmbob@gmail.com', '254712345678', '9300 Kisumu', 'Kisumu'),
(3, 'User 123', 'education', 'user123@outlook.com', '254712310673', '3 Nairobi', 'Machakos'),
(4, 'Emily Messo', 'advertising-marketin', 'emily@yahoo.com', '254712345869', '412 - Ndagani', 'Chuka'),
(5, 'Julius Nyerere', 'accounting-auditing', 'nyererejulius@ymail.com', '254791393292', '4 - Luanda', 'Mombasa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `CompanyID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `CompanyID`) VALUES
('810', 'e10adc3949ba59abbe56e057f20f883e', 5),
('dcoder', '81dc9bdb52d04dc20036dbd8313ed055', 4),
('deltatechs', 'b43e691700a8a4f5c1e903b6bc29a60a', 1),
('twickenham', 'bc6668be891e07c3fea3135d5d039b09', 2),
('twitter', 'ea35d3bc755381f1c50634ffe4440bd5', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `CompanyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
