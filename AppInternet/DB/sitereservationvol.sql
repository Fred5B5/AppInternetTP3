-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 02:54 AM
-- Server version: 5.7.19-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitereservationvol`
--

-- --------------------------------------------------------

--
-- Table structure for table `emplacements`
--

CREATE TABLE IF NOT EXISTS `emplacements` (
  `id` int(16) unsigned NOT NULL,
  `Nom_Emplacement` varchar(255) NOT NULL,
  `Accronyme_Emplacement` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emplacements`
--

INSERT INTO `emplacements` (`id`, `Nom_Emplacement`, `Accronyme_Emplacement`) VALUES
(1, 'Montreal-Trudeau', 'YUL'),
(2, 'Toronto Pearson', 'YYZ');

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imageusers`
--

CREATE TABLE IF NOT EXISTS `imageusers` (
  `id` int(16) unsigned NOT NULL,
  `emplacementImage` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imageusers`
--

INSERT INTO `imageusers` (`id`, `emplacementImage`, `path`, `created`, `modified`) VALUES
(2, 'img1.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'img2.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(16) unsigned NOT NULL,
  `user_id` int(16) unsigned NOT NULL,
  `vol_id` int(16) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `vol_id`, `created`, `modified`) VALUES
(1, 2, 3, '2018-10-10 08:18:39', '2018-10-10 09:58:48'),
(2, 4, 1, '2018-10-10 08:53:05', '2018-10-10 08:53:05'),
(24, 2, 1, '2018-10-10 09:49:04', '2018-10-10 09:49:04'),
(25, 2, 3, '2018-10-10 09:49:18', '2018-10-10 09:49:18'),
(26, 5, 1, '2018-10-10 16:49:56', '2018-10-10 16:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `typeusers`
--

CREATE TABLE IF NOT EXISTS `typeusers` (
  `id` int(16) unsigned NOT NULL,
  `TypeUsager` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeusers`
--

INSERT INTO `typeusers` (`id`, `TypeUsager`) VALUES
(1, 'ClientPasConfirmer'),
(2, 'Client'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(16) unsigned NOT NULL,
  `username` varchar(48) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Prenom_Usager` varchar(48) NOT NULL,
  `Nom_Usager` varchar(48) NOT NULL,
  `password` varchar(255) NOT NULL,
  `typeuser_id` int(16) unsigned NOT NULL,
  `imageuser_id` int(16) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `codeConfirmation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `Prenom_Usager`, `Nom_Usager`, `password`, `typeuser_id`, `imageuser_id`, `created`, `modified`, `codeConfirmation`) VALUES
(2, 'admin', 'admin@admin.com', 'Admin', 'Admin', '$2y$10$u/d5P5m/aumMNuxPCRW.2.q.2dFhmvqYw.E1kRY3.mpdKsZVpJyCG', 3, 2, '2018-10-10 07:23:25', '2018-10-10 08:42:15', NULL),
(4, 'test', 'test@test.com', 'test', 'test', '$2y$10$B1lYGRgZzf/4pJAQtyr8lOVHjM5PwUlO5gms2jkhFq/yEYbLbmInS', 3, 2, '2018-10-10 08:52:52', '2018-10-10 08:52:52', NULL),
(5, 'test2', 'test2@test2.com', 'test2', 'test2', '$2y$10$g6GD0w8EZG1KkTd5Suxmn.6swHCCrJFAv18xSIVHagU9AFVXv4MdG', 2, 2, '2018-10-10 12:00:56', '2018-10-10 12:00:56', NULL),
(11, 'test4', 'frederic.england@hotmail.com', '$user', '$user', '$2y$10$KB81XLLGBfBifselOcSaA.a1yNXJx5MedZXCTzGnZOM8FceiPnbTi', 1, 2, '2018-10-11 02:14:12', '2018-10-11 02:14:12', 'b5e0d6fd-9513-463b-af5a-46b46771effe');

-- --------------------------------------------------------

--
-- Table structure for table `vols`
--

CREATE TABLE IF NOT EXISTS `vols` (
  `id` int(16) unsigned NOT NULL,
  `emplacementdepart_id` int(16) unsigned NOT NULL,
  `emplacementfin_id` int(16) unsigned NOT NULL,
  `HeureDepart` datetime NOT NULL,
  `HeureArriver` datetime NOT NULL,
  `PrixEconomique` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vols`
--

INSERT INTO `vols` (`id`, `emplacementdepart_id`, `emplacementfin_id`, `HeureDepart`, `HeureArriver`, `PrixEconomique`, `created`, `modified`) VALUES
(1, 1, 2, '2018-10-10 09:00:00', '2018-10-31 00:00:00', 1, '2018-10-10 00:00:00', '2018-10-10 00:00:00'),
(2, 1, 2, '2018-10-10 08:17:00', '2018-10-10 08:17:00', 123, '2018-10-10 08:17:23', '2018-10-10 08:17:23'),
(3, 2, 1, '2018-10-10 08:18:00', '2018-10-10 08:18:00', 321, '2018-10-10 08:18:08', '2018-10-10 08:18:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emplacements`
--
ALTER TABLE `emplacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `imageusers`
--
ALTER TABLE `imageusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vol_id` (`vol_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `typeusers`
--
ALTER TABLE `typeusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeuser_id` (`typeuser_id`) USING BTREE,
  ADD KEY `imageuser_id` (`imageuser_id`);

--
-- Indexes for table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emplacementdepart_id` (`emplacementdepart_id`) USING BTREE,
  ADD KEY `emplacementfin_id` (`emplacementfin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emplacements`
--
ALTER TABLE `emplacements`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imageusers`
--
ALTER TABLE `imageusers`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `typeusers`
--
ALTER TABLE `typeusers`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(16) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vol_id` FOREIGN KEY (`vol_id`) REFERENCES `vols` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `imageuser_id` FOREIGN KEY (`imageuser_id`) REFERENCES `imageusers` (`id`),
  ADD CONSTRAINT `typeuser_id` FOREIGN KEY (`typeuser_id`) REFERENCES `typeusers` (`id`);

--
-- Constraints for table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `emplacementdepart_id` FOREIGN KEY (`emplacementdepart_id`) REFERENCES `emplacements` (`id`),
  ADD CONSTRAINT `emplacementfin_id` FOREIGN KEY (`emplacementfin_id`) REFERENCES `emplacements` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
