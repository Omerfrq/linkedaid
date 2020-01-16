-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2020 at 05:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safehao1_linkedaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updated_at`) VALUES
(1, 'admin', '$2y$12$qWeVaNsbcesnm6xnqz9VYez2ksDITnuxy3mJhuXrCQ8VR7OWHOKP.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(20) NOT NULL,
  `comment_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `user_id`, `post_id`, `comment_id`) VALUES
(9, 10, 14, 18),
(10, 10, 14, 19),
(32, 8, 20, 62),
(33, 8, 20, 63),
(34, 10, 12, 65),
(35, 10, 21, 68),
(36, 8, 27, 70),
(37, 8, 30, 71),
(38, 18, 52, 73),
(39, 23, 44, 75);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegowi'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Repu'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Isla'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Congo, the Democrati'),
(51, 'Cook Islands'),
(52, 'Costa Rica'),
(53, 'Croatia (Hrvatska)'),
(54, 'Cuba'),
(55, 'Cyprus'),
(56, 'Czech Republic'),
(57, 'Denmark'),
(58, 'Djibouti'),
(59, 'Dominica'),
(60, 'Dominican Republic'),
(61, 'East Timor'),
(62, 'Ecuador'),
(63, 'Egypt'),
(64, 'El Salvador'),
(65, 'Equatorial Guinea'),
(66, 'Eritrea'),
(67, 'Estonia'),
(68, 'Ethiopia'),
(69, 'Falkland Islands (Ma'),
(70, 'Faroe Islands'),
(71, 'Fiji'),
(72, 'Finland'),
(73, 'France'),
(74, 'France Metropolitan'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Terr'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald '),
(95, 'Holy See (Vatican Ci'),
(96, 'Honduras'),
(97, 'Hong Kong'),
(98, 'Hungary'),
(99, 'Iceland'),
(100, 'India'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republ'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Jamaica'),
(108, 'Japan'),
(109, 'Jordan'),
(110, 'Kazakhstan'),
(111, 'Kenya'),
(112, 'Kiribati'),
(113, 'Korea, Republic of'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Latvia'),
(117, 'Lebanon'),
(118, 'Lesotho'),
(119, 'Liberia'),
(120, 'Libyan Arab Jamahiri'),
(121, 'Liechtenstein'),
(122, 'Lithuania'),
(123, 'Luxembourg'),
(124, 'Macau'),
(125, 'Macedonia, The Forme'),
(126, 'Madagascar'),
(127, 'Malawi'),
(128, 'Malaysia'),
(129, 'Maldives'),
(130, 'Mali'),
(131, 'Malta'),
(132, 'Marshall Islands'),
(133, 'Martinique'),
(134, 'Mauritania'),
(135, 'Mauritius'),
(136, 'Mayotte'),
(137, 'Mexico'),
(138, 'Micronesia, Federate'),
(139, 'Moldova, Republic of'),
(140, 'Monaco'),
(141, 'Mongolia'),
(142, 'Montserrat'),
(143, 'Morocco'),
(144, 'Mozambique'),
(145, 'Myanmar'),
(146, 'Namibia'),
(147, 'Nauru'),
(148, 'Nepal'),
(149, 'Netherlands'),
(150, 'Netherlands Antilles'),
(151, 'New Caledonia'),
(152, 'New Zealand'),
(153, 'Nicaragua'),
(154, 'Niger'),
(155, 'Nigeria'),
(156, 'Niue'),
(157, 'Norfolk Island'),
(158, 'Northern Mariana Isl'),
(159, 'Norway'),
(160, 'Oman'),
(161, 'Pakistan'),
(162, 'Palau'),
(163, 'Panama'),
(164, 'Papua New Guinea'),
(165, 'Paraguay'),
(166, 'Peru'),
(167, 'Philippines'),
(168, 'Pitcairn'),
(169, 'Poland'),
(170, 'Portugal'),
(171, 'Puerto Rico'),
(172, 'Qatar'),
(173, 'Reunion'),
(174, 'Romania'),
(175, 'Russian Federation'),
(176, 'Rwanda'),
(177, 'Saint Kitts and Nevi'),
(178, 'Saint Lucia'),
(179, 'Saint Vincent and th'),
(180, 'Samoa'),
(181, 'San Marino'),
(182, 'Sao Tome and Princip'),
(183, 'Saudi Arabia'),
(184, 'Senegal'),
(185, 'Seychelles'),
(186, 'Sierra Leone'),
(187, 'Singapore'),
(188, 'Slovakia (Slovak Rep'),
(189, 'Slovenia'),
(190, 'Solomon Islands'),
(191, 'Somalia'),
(192, 'South Africa'),
(193, 'South Georgia and th'),
(194, 'Spain'),
(195, 'Sri Lanka'),
(196, 'St. Helena'),
(197, 'St. Pierre and Mique'),
(198, 'Sudan'),
(199, 'Suriname'),
(200, 'Svalbard and Jan May'),
(201, 'Swaziland'),
(202, 'Sweden'),
(203, 'Switzerland'),
(204, 'Syrian Arab Republic'),
(205, 'Taiwan, Province of '),
(206, 'Tajikistan'),
(207, 'Tanzania, United Rep'),
(208, 'Thailand'),
(209, 'Togo'),
(210, 'Tokelau'),
(211, 'Tonga'),
(212, 'Trinidad and Tobago'),
(213, 'Tunisia'),
(214, 'Turkey'),
(215, 'Turkmenistan'),
(216, 'Turks and Caicos Isl'),
(217, 'Tuvalu'),
(218, 'Uganda'),
(219, 'Ukraine'),
(220, 'United Arab Emirates'),
(221, 'United Kingdom'),
(222, 'United States'),
(223, 'United States Minor '),
(224, 'Uruguay'),
(225, 'Uzbekistan'),
(226, 'Vanuatu'),
(227, 'Venezuela'),
(228, 'Vietnam'),
(229, 'Virgin Islands (Brit'),
(230, 'Virgin Islands (U.S.'),
(231, 'Wallis and Futuna Is'),
(232, 'Western Sahara'),
(233, 'Yemen'),
(234, 'Yugoslavia'),
(235, 'Zambia'),
(236, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `donated_amount` int(11) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `n_id`, `d_id`, `donated_amount`, `pay_date`) VALUES
(1, 21, 20, 5, '2019-05-18'),
(2, 21, 20, 5, '2019-05-18'),
(3, 49, 20, 5, '2019-05-18'),
(4, 49, 20, 10, '2019-05-18'),
(5, 2, 20, 5, '2019-05-18'),
(6, 18, 20, 10, '2019-05-18'),
(7, 23, 24, 566, '2019-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `donor_dob` date DEFAULT NULL,
  `donor_gender` varchar(11) NOT NULL,
  `donor_phone` int(11) NOT NULL,
  `donor_country` varchar(40) NOT NULL,
  `donor_city` varchar(40) NOT NULL,
  `donor_occupation` varchar(40) NOT NULL,
  `donor_marital_status` varchar(11) NOT NULL,
  `donor_competencies` text NOT NULL,
  `p_sectors_of_action` text DEFAULT NULL,
  `donor_fb_account` varchar(40) NOT NULL,
  `donor_tw_account` varchar(40) NOT NULL,
  `pic_name` text NOT NULL,
  `pic_type` varchar(40) NOT NULL,
  `pic_size` int(40) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `user_id`, `f_name`, `l_name`, `description`, `donor_dob`, `donor_gender`, `donor_phone`, `donor_country`, `donor_city`, `donor_occupation`, `donor_marital_status`, `donor_competencies`, `p_sectors_of_action`, `donor_fb_account`, `donor_tw_account`, `pic_name`, `pic_type`, `pic_size`, `date_added`) VALUES
(17, 3, '', '', '', '1970-01-01', 'Male', 68687969, 'Algeria', 'City', '', 'Married', '', 'Quality Education', 'twitter.com', 'facebook.com', '', '', 0, '0000-00-00'),
(18, 9, 'First Name', 'Last Name', 'ABCD', NULL, '', 0, '', '', '', '', '', '', '', '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-26'),
(19, 10, 'First', 'Last', 'ABCd', '2019-06-02', 'Male', 798789709, 'American Samoa', 'Philadelphia', 'Occupation', 'Married', 'Competencies', 'Good Health and Well Being', 'twitter.com', 'facebook.com', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-02'),
(24, 20, 'First Name', 'Last Name', 'Some Description', '1970-01-01', 'Male', 2147483647, 'Portugal', 'City', 'Wont tell', 'Married', 'Wont tell', '3,4,5', 'twitter.com', 'facebook.com', 'linkedaid.PNG', 'image/png', 221705, '2019-04-11'),
(25, 24, 'arslan', 'khan', 'No thanks', '1994-01-01', 'Male', 2147483647, 'Afghanistan', 'Stony Plain', 'Vela', 'Married', 'Yes', '1,2,3', '', '', 'billi.jpg', 'image/jpeg', 39035, '2019-06-25'),
(26, 25, 'Richard', 'Test', 'I am a nice person', '1970-01-01', 'Male', 0, '', '', '', 'Married', '', '', '', '', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `text`, `receiverId`, `status`) VALUES
(1, 'hi omer', 22, 'sent'),
(2, 'omer', 42, 'sent'),
(3, 'f', 48, 'sent'),
(4, 'asfd', 48, 'sent'),
(5, 'asfd', 48, 'sent'),
(6, 'f', 48, 'sent'),
(7, 'f', 42, 'sent'),
(8, 'inwe', 42, 'sent'),
(9, 'omer', 42, 'sent'),
(10, 'omer', 42, 'sent'),
(11, 'f', 42, 'sent'),
(12, 'o', 42, 'sent'),
(13, 'omer', 42, 'sent'),
(14, 'omer', 42, 'sent'),
(15, 'omer', 42, 'sent'),
(16, 'f', 42, 'sent'),
(17, 'omer', 42, 'sent'),
(18, 'omer', 42, 'sent'),
(19, 'shery', 42, 'sent'),
(20, 'f', 42, 'sent'),
(21, 'g', 42, 'sent'),
(22, 'g', 42, 'sent'),
(23, 'g', 42, 'sent'),
(24, 'b', 42, 'sent'),
(25, 'b', 42, 'received'),
(26, 'f', 42, 'sent'),
(27, 'b', 42, 'sent'),
(28, 'tada', 42, 'sent'),
(29, 'here is the chat bro gggggggggggggggggg', 42, 'sent'),
(30, 'omer', 42, 'received'),
(31, 'yes', 42, 'sent'),
(32, 'i am ngo', 42, 'received'),
(33, 'i am bro', 42, 'received'),
(34, 'great', 42, 'received'),
(35, 'ok', 42, 'sent'),
(36, 'great talking to you ngo', 42, 'sent'),
(37, 'nice', 42, 'received'),
(38, 'ok', 42, 'sent'),
(39, 'loved it', 42, 'sent'),
(40, 'i am ngo', 42, 'received'),
(41, 'ad,min', 42, 'sent'),
(42, 'om', 42, 'received'),
(43, 'omomom', 26, 'received'),
(44, 'i m ngoo', 26, 'received'),
(45, 'ok', 26, 'sent'),
(46, 'i am admin', 26, 'sent'),
(47, 'i am ngo', 26, 'received'),
(48, 'asdf', 42, 'sent'),
(49, 'omer', 42, 'sent'),
(50, 'omer', 42, 'sent'),
(51, 'basf', 42, 'sent'),
(52, 'omer', 42, 'sent'),
(53, 'df', 42, 'sent'),
(54, 'df', 42, 'sent'),
(55, 'f', 42, 'sent'),
(56, 'naeem rando', 42, 'sent'),
(57, 'omer', 26, 'received'),
(58, 'naeem randi', 26, 'sent'),
(59, 'omer', 26, 'received'),
(60, 'i am omer sitting with naeem', 26, 'received'),
(61, 'i a naeem', 26, 'sent'),
(62, '', 26, 'received'),
(63, 'omer', 26, 'received'),
(64, 'omer', 26, 'received'),
(65, ' ', 26, 'received'),
(66, ' omer', 26, 'received'),
(67, 'omer', 26, 'received'),
(68, 'omer', 26, 'received'),
(69, 'omer', 26, 'received'),
(70, 'omer', 26, 'received'),
(71, 'sdf', 26, 'received'),
(72, 'mdf', 26, 'received'),
(73, 'f', 26, 'received'),
(74, 'asdf', 26, 'received'),
(75, 'f', 26, 'received'),
(76, 'f', 26, 'received'),
(77, 'asdf', 26, 'received'),
(78, 'omer', 26, 'received'),
(79, 'hellog uys', 26, 'received'),
(80, 'omer', 42, 'sent'),
(81, 'asdf', 42, 'sent'),
(82, 'omer', 42, 'sent'),
(83, 'dasfadsf', 42, 'sent'),
(84, 'omer', 42, 'sent'),
(85, 'asfd', 42, 'sent'),
(86, 'adf', 26, 'received'),
(87, 'sdf', 26, 'received'),
(88, 'sdf', 26, 'received'),
(89, 'adf', 42, 'sent'),
(90, 'af', 42, 'sent'),
(91, 'asdf', 42, 'sent'),
(92, 'adsf', 26, 'received'),
(93, '', 26, 'received'),
(94, '', 26, 'received'),
(95, '', 26, 'received'),
(96, 'adsf', 42, 'sent'),
(97, 'hello bro', 43, 'sent'),
(98, 'omer', 42, 'sent'),
(99, 'i am admin', 26, 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ngo_name` varchar(60) DEFAULT NULL,
  `cp_fname` varchar(40) DEFAULT NULL,
  `cp_lname` varchar(40) DEFAULT NULL,
  `ngo_website` varchar(60) NOT NULL,
  `ngo_active_since` date DEFAULT NULL,
  `ngo_phone` int(9) DEFAULT NULL,
  `ngo_country_of_op` varchar(20) NOT NULL,
  `ngo_city_of_op` varchar(20) NOT NULL,
  `ngo_page_description` text NOT NULL,
  `ngo_hq` varchar(60) NOT NULL,
  `sectors_of_action` text DEFAULT NULL,
  `additional_info` text NOT NULL,
  `ngo_fb_account` text NOT NULL,
  `ngo_tw_account` text NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitute` float DEFAULT NULL,
  `ngo_address` varchar(90) NOT NULL,
  `pic_name` text DEFAULT NULL,
  `pic_type` varchar(11) DEFAULT NULL,
  `pic_size` int(40) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `user_id`, `ngo_name`, `cp_fname`, `cp_lname`, `ngo_website`, `ngo_active_since`, `ngo_phone`, `ngo_country_of_op`, `ngo_city_of_op`, `ngo_page_description`, `ngo_hq`, `sectors_of_action`, `additional_info`, `ngo_fb_account`, `ngo_tw_account`, `longitude`, `latitute`, `ngo_address`, `pic_name`, `pic_type`, `pic_size`, `date_added`, `status`) VALUES
(42, 7, 'ngoname', 'First Name', 'Last Name', '', NULL, NULL, 'AX AL', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 1),
(43, 8, 'ngoname', 'First Name', 'Last', 'ngowebsite.com', '2019-02-19', 89789798, 'American Samoa', 'Philadelphia', 'Description', 'Pennsylvania', 'Good Health and Well Being', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', 'facebook123.com', 'twitter.com', -25.363, 131.044, 'Grant Avenue, San Francisco, CA', 'UI MyRepairShop.PNG', 'image/png', 8890, '2019-02-26', 1),
(48, 18, 'Ngo Name', 'First Name', 'Last Name', 'ngowebsite.com', '2019-04-12', 2147483647, 'El Salvador', 'City', 'abcdefgh', 'City', '3,4,7', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', 'facebook.com/abc', 'twitter.com/abc', 2.14241, 48.7993, 'avenue de Paris, Versailles, France', 'Capture1.PNG', 'image/png', 5716, '2019-06-25', 1),
(49, 21, 'TestingPurposes', 'First', 'Last', '', NULL, NULL, 'AS AD', '', '', '', '', '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 0),
(50, 22, 'ABCD', 'ABCD', 'ABCD', '', '1970-01-01', 0, 'AI', '', '', '', '3,4,5', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 2),
(51, 23, 'NTS TESTs', 'arsi', 'Arslan', 'www.ntstests.pk', '2012-05-14', 2147483647, 'Pakistan', 'Pindi', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', 'Outside USA and Canada', '1,2,3', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', 'arsi', 'arsi', 73.0159, 33.6961, 'Park Avenue, F-9, Islamabad, Pakistan', '62102167_2445618162169237_849074163510411264_n.jpg', 'image/jpeg', 90855, '2019-07-03', 0),
(52, 26, 'hello world', 'Sonu', 'Pak', 'www.ntstests.pk', '2019-11-01', 2147483647, 'United Kingdom', 'slough', 'hello world', 'Berkshire', '1,2', 'We are open for gigs all over the country. If you are interested, please contact us via our website or send us an email to gigs@ggrock.com', '', '', 73.0516, 33.5747, 'Dheri Hasan Abad, Rawalpindi, Pakistan', 'fsa-logo-mdb.png', 'image/png', 1956, '2019-11-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngo_photos`
--

CREATE TABLE `ngo_photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic_title` varchar(60) NOT NULL,
  `pic_name` text DEFAULT NULL,
  `pic_type` varchar(20) DEFAULT NULL,
  `pic_size` int(20) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_photos`
--

INSERT INTO `ngo_photos` (`id`, `user_id`, `pic_title`, `pic_name`, `pic_type`, `pic_size`, `date_added`) VALUES
(41, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-12'),
(54, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-25'),
(55, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-25'),
(56, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-25'),
(60, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-09'),
(61, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-09'),
(62, 8, '', 'Capture.PNG', 'image/png', 19488, '2019-03-10'),
(63, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(64, 8, '', 'Capture.PNG', 'image/png', 19488, '2019-03-10'),
(65, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(66, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(67, 8, '', 'Capture.PNG', 'image/png', 19488, '2019-03-10'),
(68, 8, '', 'Capture.PNG', 'image/png', 19488, '2019-03-10'),
(69, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(70, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(71, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(72, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(73, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(74, 8, '', 'Capture.PNG', 'image/png', 19488, '2019-03-10'),
(75, 8, '', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(76, 8, 'Title', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(97, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(98, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(99, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(100, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(101, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(102, 18, 'abcd', 'attachment_2fed77504c185151f6e0fef85e1c8d06.png', 'image/png', 129911, '2019-07-08'),
(105, 23, 'NEW PHOTO', 'logo-01.png', 'image/png', 17969, '2019-07-08'),
(106, 23, 'NEW PHOTO', 'jn-small.png', 'image/png', 4637, '2019-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_videos`
--

CREATE TABLE `ngo_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `v_title` varchar(60) NOT NULL,
  `v_name` varchar(60) NOT NULL,
  `v_type` varchar(20) NOT NULL,
  `v_size` int(60) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_videos`
--

INSERT INTO `ngo_videos` (`id`, `user_id`, `v_title`, `v_name`, `v_type`, `v_size`, `date_added`) VALUES
(1, 8, '', 'post_video_copy.mp4', '', 0, '2019-01-29'),
(2, 8, '', 'post_video_copy.mp4', '', 0, '2019-01-29'),
(3, 8, '', 'post_video_copy.mp4', '', 0, '2019-01-29'),
(5, 8, '', 'speeddonorA.PNG', 'image/png', 8890, '2019-02-13'),
(6, 8, '', 'speeddonorA.PNG', 'image/png', 8890, '2019-02-13'),
(7, 8, '', 'speeddonorA.PNG', 'image/png', 8890, '2019-02-13'),
(8, 8, '', 'speeddonorA.PNG', 'image/png', 8890, '2019-02-13'),
(9, 8, '', 'speeddonorA.PNG', 'image/png', 8890, '2019-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_description` text NOT NULL,
  `pic_name` varchar(40) NOT NULL,
  `pic_type` varchar(20) NOT NULL,
  `pic_size` int(20) NOT NULL,
  `post_publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_description`, `pic_name`, `pic_type`, `pic_size`, `post_publish_date`) VALUES
(1, 8, 'Something!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-25'),
(7, 9, 'Something!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-02-26'),
(11, 10, 'This Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-02'),
(12, 10, 'This Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-02'),
(14, 10, 'My First Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-02'),
(20, 8, 'A Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-04'),
(21, 10, 'A post after modification!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-04'),
(22, 10, 'My First Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-04'),
(23, 10, 'My First Post To Modify!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-04'),
(24, 10, 'A Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-04'),
(25, 8, 'Another Post!', '', '', 0, '2019-03-05'),
(26, 8, 'A Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(27, 8, 'A modified post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(28, 10, 'Another Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(29, 10, 'Another Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(30, 10, 'This is a post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(31, 10, 'This is a post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(32, 10, 'A Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(33, 10, 'A Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-05'),
(34, 10, 'A Post!', '', '', 0, '2019-03-05'),
(35, 10, 'A Post!', '', '', 0, '2019-03-05'),
(36, 10, 'A Post!', '', '', 0, '2019-03-05'),
(37, 10, 'A Post!', '', '', 0, '2019-03-05'),
(38, 10, 'Another Post!', '', '', 0, '2019-03-05'),
(39, 10, 'Another Post!', '', '', 0, '2019-03-05'),
(40, 8, 'Post', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(41, 8, 'Post', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-03-10'),
(43, 18, 'This is another post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-04-11'),
(44, 18, 'Some Post!', 'UI MyRepairShop.PNG', 'image/png', 186505, '2019-04-11'),
(47, 18, 'This Post!', '', '', 0, '2019-04-11'),
(48, 18, 'This Post!', 'CaptureParseA.PNG', 'image/png', 9370, '2019-04-11'),
(49, 18, 'A Post!', 'CaptureParseA.PNG', 'image/png', 9370, '2019-04-11'),
(50, 18, 'The Post!', 'CaptureParseA.PNG', 'image/png', 9370, '2019-04-11'),
(51, 18, 'A Post!', 'CaptureParseA.PNG', 'image/png', 9370, '2019-04-11'),
(52, 18, 'Penguins', 'IMG_8455-e1519168467196.jpg', 'image/jpeg', 47630, '2019-04-12'),
(53, 23, 'Hello World', 'JN.png', 'image/png', 33344, '2019-06-20'),
(54, 23, 'Toor is here', '', '', 0, '2019-06-21'),
(55, 24, 'hi', '', '', 0, '2019-06-25'),
(56, 18, 'abcd', 'post_video_copy.mp4', 'video/mp4', 4836239, '2019-07-18'),
(57, 26, 'hello world', '', '', 0, '2019-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `publish_date`) VALUES
(18, 10, 14, 'My First Comment!', '2019-03-02'),
(19, 10, 14, 'My First Comment!', '2019-03-02'),
(55, 8, 1, 'Comment ABC', '2019-03-04'),
(58, 8, 1, 'Comment DEF', '2019-03-04'),
(61, 8, 20, 'Another Comment!', '2019-03-04'),
(62, 8, 20, 'Another CommentA!', '2019-03-04'),
(64, 8, 20, 'Another Comment!', '2019-03-04'),
(68, 10, 21, 'Another Comment!', '2019-03-04'),
(69, 8, 27, 'A Comment!', '2019-03-05'),
(70, 8, 27, 'Another Comment!', '2019-03-05'),
(71, 8, 30, 'A Comment!', '2019-03-05'),
(72, 8, 30, 'The Comment!', '2019-03-05'),
(73, 18, 52, 'ABCD', '2019-06-01'),
(74, 23, 53, 'Hi', '2019-06-20'),
(75, 23, 44, 'okay', '2019-07-03'),
(76, 23, 55, 'hello', '2019-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`, `user_type`) VALUES
(4, 1, 8, 0),
(6, 14, 10, 0),
(9, 20, 8, 0),
(10, 21, 10, 0),
(11, 33, 8, 0),
(12, 30, 8, 0),
(13, 52, 18, 0),
(16, 47, 23, 0),
(17, 49, 23, 0),
(18, 55, 23, 0),
(19, 54, 23, 0),
(20, 53, 23, 0),
(21, 34, 23, 0),
(22, 44, 23, 0),
(23, 53, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_shares`
--

CREATE TABLE `post_shares` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `share_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_shares`
--

INSERT INTO `post_shares` (`id`, `post_id`, `user_id`, `share_date`) VALUES
(2, 1, 8, NULL),
(3, 1, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sectors_of_action`
--

CREATE TABLE `sectors_of_action` (
  `id` int(11) NOT NULL,
  `sector` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors_of_action`
--

INSERT INTO `sectors_of_action` (`id`, `sector`) VALUES
(1, 'No Poverty'),
(2, 'Zero Hunger'),
(3, 'Good Health And Well Being'),
(4, 'Quality Education'),
(5, 'Gender Equality'),
(6, 'Clean Water and Sanitation'),
(7, 'Affordable and Clean Energy'),
(8, 'Decent Work and Economic Growth'),
(9, 'Industry / Innovation and Infrastucture'),
(10, 'Reduced Inequalities'),
(11, 'Sustainable cities and Communities'),
(12, 'Responsible Consumption and Production'),
(13, 'Climate Action'),
(14, 'Life below Water'),
(15, 'Life on Land'),
(16, 'Peace / Justice and Strong Institutions'),
(17, 'Partnerships for Goals');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `email`, `password`) VALUES
(3, 2, 'donor123@gmail.com', '$2y$12$fkWJ3JAcabaKLbUFkCFfXeX7JsMvs2cS9cL1LgxHaN3maOtZNmM5K'),
(7, 1, 'user124@gmail.com', '$2y$12$MbdSyuS.uLCY0aVm2CSFT.EwQ8EQVzd0oyGVay9dEcKP8xDZPK0Gm'),
(8, 1, 'user123@gmail.com', '$2y$12$fkWJ3JAcabaKLbUFkCFfXeX7JsMvs2cS9cL1LgxHaN3maOtZNmM5K'),
(9, 2, 'donor124@gmail.com', '$2y$12$BM1FZrZZfMs7X1eqa7Bmu.UEqgJaKfKoFGVHV8LJMnzovaDChXQe6'),
(10, 2, 'donor1@gmail.com', '$2y$12$Xp1w9cFDjJS/TMC5DPdzXumDiII3CX5A9SpqaxJ03UCR2ZA1dbCHO'),
(18, 1, 'LinkedaidNgo124@gmail.com', '$2y$12$aFK5SdlFxa1krT5VD6zvZeIjPDpso0mvWidV9eYAaEzhkvJIjc98q'),
(20, 2, 'LinkedaidDonor124@gmail.com', '$2y$12$aFK5SdlFxa1krT5VD6zvZeIjPDpso0mvWidV9eYAaEzhkvJIjc98q'),
(21, 1, 'your@testing.com', '$2y$12$aFK5SdlFxa1krT5VD6zvZeIjPDpso0mvWidV9eYAaEzhkvJIjc98q'),
(22, 1, 'ABCD124@gmail.com', '$2y$12$nj0pBGfhhkxuNUUxpgnKiOyuJWTcQek.L5T5ZDsuGDby/OyrmJbnW'),
(23, 1, 'arsikhan1994@gmail.com', '$2y$12$G59npgA/yWvA0ncR/l6IS.PslfG/mRed9HdZsAeIni5hNZ7BojMdO'),
(24, 2, 'arsi@bolhu.com', '$2y$12$Y1mc38qSpRadEmTDNcsbJ.W1t4gSGQOYE9ujH6TqY8Qi25gPekACi'),
(25, 2, 'testmail@yahoo.test', '371ab955fdc11c44c980779c3135b155'),
(26, 1, 'sonupak@gmail.com', '$2y$12$KXbHNSVsIp8OAf7hcPAe2e12k/0NAdX2.NPyxGCgUO8g/6eYH56dO'),
(27, 1, 'omerfarooq@gmail.com', '$2y$12$KXbHNSVsIp8OAf7hcPAe2e12k/0NAdX2.NPyxGCgUO8g/6eYH56dO'),
(28, 1, 'omer@gmail.com', '$2y$12$XbJG/Zu3AKIZbxZShjxU1O2c1.gL5wfREYSCauvVpxRMYeQMyqrwy');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'ngo'),
(2, 'donor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_likes_ibfk_1` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_ibfk_1` (`user_id`);

--
-- Indexes for table `ngo_photos`
--
ALTER TABLE `ngo_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_photos_ibfk_1` (`user_id`);

--
-- Indexes for table `ngo_videos`
--
ALTER TABLE `ngo_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_shares`
--
ALTER TABLE `post_shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sectors_of_action`
--
ALTER TABLE `sectors_of_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ngo_photos`
--
ALTER TABLE `ngo_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `ngo_videos`
--
ALTER TABLE `ngo_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post_shares`
--
ALTER TABLE `post_shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectors_of_action`
--
ALTER TABLE `sectors_of_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngo`
--
ALTER TABLE `ngo`
  ADD CONSTRAINT `ngo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngo_photos`
--
ALTER TABLE `ngo_photos`
  ADD CONSTRAINT `ngo_photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ngo_videos`
--
ALTER TABLE `ngo_videos`
  ADD CONSTRAINT `ngo_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ngo_videos` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_shares`
--
ALTER TABLE `post_shares`
  ADD CONSTRAINT `post_shares_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_shares_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
