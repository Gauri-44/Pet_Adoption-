-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 04:49 PM
-- Server version: 5.6.21
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `petadopt`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
`pet_id` int(20) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_age` varchar(20) NOT NULL,
  `pet_breed` varchar(50) NOT NULL,
  `pet_nameplate` varchar(50) NOT NULL,
  `pet_img` varchar(50) DEFAULT 'NA',
  `with_food_price` float NOT NULL,
  `without_food_price` float NOT NULL,
  `with_food_per_day` float NOT NULL,
  `pet_availability` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `pet_age`, `pet_breed`, `pet_nameplate`, `pet_img`, `with_food_price`, `without_food_price`, `with_food_per_day`, `pet_availability`) VALUES
(1, 'Sheru', '2months', 'Desi', 'SH4544545', 'assets/img/pets/sheru.jpg', 1000, 0, 100, 'yes'),
(2, 'Max', '5months', 'Desi', 'MA4567678', 'assets/img/pets/max.jpg', 1400, 0, 100, 'yes'),
(3, 'Lissy', '4months', 'Persian', 'LI9090908', 'assets/img/pets/lissy.jpg', 1300, 0, 100, 'yes'),
(4, 'Luca', '6months', 'Rott Weiler', 'LU9098789', 'assets/img/pets/luca.jpg', 1200, 0, 100, 'yes'),
(5, 'Rock', '3months', 'Desi', 'RO878787', 'assets/img/pets/rock.jpg', 2000, 0, 100, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `clientpets`
--

CREATE TABLE IF NOT EXISTS `clientpets` (
  `pet_id` int(20) NOT NULL,
  `client_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientpets`
--

INSERT INTO `clientpets` (`pet_id`, `client_username`) VALUES
(1, 'harry'),
(3, 'harry'),
(7, 'harry'),
(8, 'harry'),
(9, 'harry');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `client_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_username`, `client_name`, `client_phone`, `client_email`, `client_address`, `client_password`) VALUES
('harry', 'Harry Den', '9876543210', 'harryden@gmail.com', '2477  Harley Vincent Drive', 'password'),
('jenny', 'Jeniffer Washington', '7850000069', 'washjeni@gmail.com', '4139  Mesa Drive', 'jenny'),
('tom', 'Tommy Doee', '900696969', 'tom@gmail.com', '4645  Dawson Drive', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
('antonio', 'Antonio M', '0785556580', 'antony@gmail.com', '2677  Burton Avenue', 'password'),
('christine', 'Christine', '8544444444', 'chr@gmail.com', '3701  Fairway Drive', 'password'),
('ethan', 'Ethan Hawk', '69741111110', 'thisisethan@gmail.com', '4554  Rowes Lane', 'password'),
('james', 'James Washington', '0258786969', 'james@gmail.com', '2316  Mayo Street', 'password'),
('lucas', 'Lucas Rhoades', '7003658500', 'lucas@gmail.com', '2737  Fowler Avenue', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
`owner_id` int(20) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `owner_phone` varchar(15) NOT NULL,
  `owner_address` varchar(50) NOT NULL,
  `owner_gender` varchar(10) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `owner_availability` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_name`, `dl_number`, `owner_phone`, `owner_address`, `owner_gender`, `client_username`, `owner_availability`) VALUES
(1, 'Bruno Den', '27840218658 ', '9547863157', '1782  Vineyard Drive', 'Male', 'harry', 'yes'),
(2, 'Will Williams', '03191563155 ', '9147523684', '4354  Hillcrest Drive', 'Male', 'harry', 'yes'),
(3, 'Steeve Rogers', '32346288078 ', '9147523682', '1506  Skinner Hollow Road', 'Male', 'harry', 'yes'),
(4, 'Ivy', '04316015965 ', '9187563240', '4680  Wayside Lane', 'Female', 'jenny', 'no'),
(5, 'Pamela C Benson', '68799466631 ', '7584960123', 'Urkey Pen Road', 'Female', 'jenny', 'yes'),
(6, 'Billy Williams', '36740186040 ', '8421025476', '2898  Oxford Court', 'Male', 'tom', 'yes'),
(7, 'Nicolas', '44919316260 ', '7541023695', 'Breezewood Court', 'Male', 'harry', 'yes'),
(8, 'Stephen Strange', '94592817723', '5215557850', 'Fairview Street12', 'Male', 'jenny', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `e_mail`, `message`) VALUES
('Nikhil', 'nikhil@gmail.com', 'Hope this works.');

-- --------------------------------------------------------

--
-- Table structure for table `adoptedpets`
--

CREATE TABLE IF NOT EXISTS `adoptedpets` (
`id` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `pet_id` int(20) NOT NULL,
  `owner_id` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `adopt_date` date NOT NULL,
  `reg` double NOT NULL,
  `total_amount` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=574681260 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adoptedpets`
--

INSERT INTO `adoptedpets` (`id`, `customer_username`, `pet_id`, `owner_id`, `booking_date`, `adopt_date`,  `reg`,  `total_amount`) VALUES
(574681245, 'ethan', 4, 2, '2018-07-01', '2018-07-02', 1100, 1100 ),
(574681246, 'james', 6, 6,  '2018-06-01', '2018-06-28',  1500,  1600 ),
(574681247, 'antonio', 3, 1, '2018-07-19', '2018-07-22',  1300,  1300 ),
(574681248, 'ethan', 1, 2, '2018-07-20', '2018-07-29',  1000, 690 ),
(574681249, 'james', 1, 2,  '2018-07-24', '2018-07-25',  2000, 2000 );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
 ADD PRIMARY KEY (`pet_id`), ADD UNIQUE KEY `pet_nameplate` (`pet_nameplate`);

--
-- Indexes for table `clientpets`
--
ALTER TABLE `clientpets`
 ADD PRIMARY KEY (`pet_id`), ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`client_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_username`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
 ADD PRIMARY KEY (`owner_id`), ADD UNIQUE KEY `dl_number` (`dl_number`), ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `adoptedpets`
--
ALTER TABLE `adoptedpets`
 ADD PRIMARY KEY (`id`), ADD KEY `customer_username` (`customer_username`), ADD KEY `pet_id` (`pet_id`), ADD KEY `owner_id` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
MODIFY `pet_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
MODIFY `owner_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `adoptedpets`
--
ALTER TABLE `adoptedpets`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=574681260;
--
-

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
