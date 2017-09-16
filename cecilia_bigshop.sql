-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Sep 2017 um 23:15
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cecilia_bigshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`) VALUES
(18, 1, 2),
(19, 1, 2),
(20, 1, 2),
(21, 1, 2),
(22, 1, 2),
(23, 1, 2),
(24, 1, 2),
(25, 1, 2),
(26, 1, 2),
(27, 1, 2),
(28, 1, 2),
(29, 1, 2),
(30, 1, 2),
(31, 1, 2),
(32, 1, 2),
(33, 1, 2),
(34, 1, 2),
(35, 1, 2),
(36, 1, 2),
(37, 1, 2),
(38, 1, 2),
(39, 1, 2),
(40, 1, 2),
(41, 1, 2),
(42, 1, 2),
(43, 1, 2),
(44, 1, 2),
(45, 1, 2),
(46, 1, 2),
(47, 1, 2),
(48, 1, 2),
(49, 1, 2),
(50, 1, 2),
(51, 1, 2),
(52, 1, 2),
(53, 1, 2),
(54, 1, 2),
(55, 1, 2),
(56, 1, 2),
(57, 1, 2),
(58, 1, 2),
(59, 1, 2),
(60, 1, 2),
(61, 1, 2),
(62, 1, 2),
(63, 1, 2),
(64, 1, 2),
(65, 1, 2),
(66, 1, 2),
(67, 1, 2),
(68, 1, 2),
(69, 1, 2),
(70, 1, 2),
(71, 1, 2),
(72, 1, 2),
(73, 1, 2),
(74, 1, 2),
(75, 1, 2),
(76, 1, 2),
(77, 1, 2),
(78, 1, 2),
(79, 1, 2),
(80, 1, 2),
(81, 1, 2),
(83, 1, 2),
(84, 1, 2),
(85, 1, 2),
(86, 1, 2),
(87, 1, 2),
(88, 1, 2),
(89, 1, 2),
(90, 1, 2),
(91, 1, 2),
(92, 1, 2),
(93, 1, 2),
(94, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `name`, `image`, `price`, `description`, `latitude`, `longitude`) VALUES
(1, 'Banana', 'http://media.mercola.com/assets/images/foodfacts/banana-nutrition-facts.jpg', 10, 'fresh', '48.20817400', '16.37381900'),
(2, 'Kiwi', 'http://www.healthline.com/hlcmsresource/images/topic_centers/Food-Nutrition/642x361_IMAGE_1_The_7_Best_Things_About_Kiwis.jpg', 7, 'from Croatia', '45.10000000', '15.20000000'),
(3, 'Watermelon', 'http://media.mercola.com/assets/images/foodfacts/watermelon-nutrition-facts.jpg', 12, 'very sweet', '45.74887200', '21.20867900'),
(4, 'Peach', 'http://dreamicus.com/data/peach/peach-06.jpg', 6, 'bio', '45.74887200', '21.20867900'),
(5, 'Apple', 'http://www.healthline.com/hlcmsresource/images/topic_centers/Food-Nutrition/388x210_Are_Apple_Seeds_Poisonous.jpg', 2, 'sweet-sour', '45.74887200', '21.20867900'),
(6, 'Pear', 'http://agrifarming.in/wp-content/uploads/2015/06/Health-Benefits-of-Pears.jpg?x73645', 5, 'William-pear', '48.20817400', '16.37381900'),
(7, 'Tomato', 'http://nigeriannewsdirect.com/wp-content/uploads/2016/03/Tomatoe-.jpg', 2, 'cherry tomatos', '48.20817400', '16.37381900'),
(8, 'Beans', 'http://girliegirlarmy.com/wp-content/uploads/2014/05/beans.jpg', 17, 'fresh', '48.13512500', '11.58198000'),
(9, 'pumpkin', 'http://greenlifecorp.com/images/ingredient-of-the-month-pumpkin-1200x628.jpg', 12, 'ready to bake!', '48.13512500', '11.58198000'),
(10, 'Strawberry', 'https://sc02.alicdn.com/kf/UT8x0AfX2NbXXagOFbXv/Fresh-Strawberry-and-Cherries.jpg', 20, 'perfect', '64.20084100', '-149.49367300'),
(11, 'Mushroom', 'https://img.leafcdn.tv/640/photos.demandstudios.com/getty/article/223/67/134153015.jpg', 32, 'yummy', '40.45236900', '12.45879600'),
(12, 'Muffin', 'http://images.lecker.de/lilys-minimuffins-mit-streuseln-F5573607,id=8abb1957,b=lecker,w=590,h=442,cg=c.jpg', 9, 'self made', '16.45987600', '12.48596400');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(200) DEFAULT NULL,
  `userPass` varchar(350) DEFAULT NULL,
  `account_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `userEmail`, `userPass`, `account_nr`) VALUES
(1, 'test', 'test', 'test@test.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 123456985),
(2, 'cecilia', 'tanzer', 'tanzer_cecilia@yahoo.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 14587962);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
