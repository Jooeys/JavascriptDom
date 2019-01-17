-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2019 at 11:03 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(100) NOT NULL,
  `terms_text` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `terms_text`) VALUES
(1, 'These Website Standard Terms And Conditions (these â€œTermsâ€ or these â€œWebsite Standard Terms And Conditionsâ€) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this â€œWebsiteâ€). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms And Conditions.\r\n\r\nThis Website is not for use by any minors (defined as those who are not at least 18 years of age), and you must not use this Website if you a minor.'),
(2, '1. Intellectual Property Rights.\r\n\r\nOther than content you own, which you may have opted to include on this Website, under these Terms, [COMPANY NAME] and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved.'),
(3, 'You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website'),
(4, '2. Restrictions.\r\n\r\nYou are expressly and emphatically restricted from all of the following:\r\n\r\npublishing any Website material in any media;\r\n\r\nselling, sublicensing and/or otherwise commercializing any Website material;\r\n\r\npublicly performing and/or showing any Website material;\r\n\r\nusing this Website in any way that is, or may be, damaging to this Website;\r\n\r\nusing this Website in any way that impacts user access to this Website;\r\n\r\nusing this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;\r\n\r\nengaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;\r\n\r\nusing this Website to engage in any advertising or marketing;\r\n\r\nCertain areas of this Website are restricted from access by you and [COMPANY NAME] may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion.  Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.'),
(5, '3.Your Content.\r\n\r\nIn these Website Standard Terms And Conditions, â€œYour Contentâ€ shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant [COMPANY NAME] a non-exclusive, worldwide, irrevocable, royalty-free, sublicensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.\r\n\r\nYour Content must be your own and must not be infringing on any third partyâ€™s rights. [COMPANY NAME] reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
