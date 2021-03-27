-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 12:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarketplaceassinment`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `phonecode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `code`, `Name`, `phonecode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'af', 'Afghanistan', '93', NULL, NULL, NULL, NULL, b'1'),
(2, 'AL', 'Albania', '355', NULL, NULL, NULL, NULL, b'1'),
(3, 'DZ', 'Algeria', '213', NULL, NULL, NULL, NULL, b'1'),
(4, 'AS', 'American Samoa', '1684', NULL, NULL, NULL, NULL, b'1'),
(5, 'AD', 'Andorra', '376', NULL, NULL, NULL, NULL, b'1'),
(6, 'AO', 'Angola', '244', NULL, NULL, NULL, NULL, b'1'),
(7, 'AI', 'Anguilla', '1264', NULL, NULL, NULL, NULL, b'1'),
(8, 'AQ', 'Antarctica', '0', NULL, NULL, NULL, NULL, b'1'),
(9, 'AG', 'Antigua And Barbuda', '1268', NULL, NULL, NULL, NULL, b'1'),
(10, 'AR', 'Argentina', '54', NULL, NULL, NULL, NULL, b'1'),
(11, 'AM', 'Armenia', '374', NULL, NULL, NULL, NULL, b'1'),
(12, 'AW', 'Aruba', '297', NULL, NULL, NULL, NULL, b'1'),
(13, 'AU', 'Australia', '61', NULL, NULL, NULL, NULL, b'1'),
(14, 'AT', 'Austria', '43', NULL, NULL, NULL, NULL, b'1'),
(15, 'AZ', 'Azerbaijan', '994', NULL, NULL, NULL, NULL, b'1'),
(16, 'BS', 'Bahamas The', '1242', NULL, NULL, NULL, NULL, b'1'),
(17, 'BH', 'Bahrain', '973', NULL, NULL, NULL, NULL, b'1'),
(18, 'BD', 'Bangladesh', '880', NULL, NULL, NULL, NULL, b'1'),
(19, 'BB', 'Barbados', '1246', NULL, NULL, NULL, NULL, b'1'),
(20, 'BY', 'Belarus', '375', NULL, NULL, NULL, NULL, b'1'),
(21, 'BE', 'Belgium', '32', NULL, NULL, NULL, NULL, b'1'),
(22, 'BZ', 'Belize', '501', NULL, NULL, NULL, NULL, b'1'),
(23, 'BJ', 'Benin', '229', NULL, NULL, NULL, NULL, b'1'),
(24, 'BM', 'Bermuda', '1441', NULL, NULL, NULL, NULL, b'1'),
(25, 'BT', 'Bhutan', '975', NULL, NULL, NULL, NULL, b'1'),
(26, 'BO', 'Bolivia', '591', NULL, NULL, NULL, NULL, b'1'),
(27, 'BA', 'Bosnia and Herzegovina', '387', NULL, NULL, NULL, NULL, b'1'),
(28, 'BW', 'Botswana', '267', NULL, NULL, NULL, NULL, b'1'),
(29, 'BV', 'Bouvet Island', '0', NULL, NULL, NULL, NULL, b'1'),
(30, 'BR', 'Brazil', '55', NULL, NULL, NULL, NULL, b'1'),
(31, 'IO', 'British Indian Ocean Territory', '246', NULL, NULL, NULL, NULL, b'1'),
(32, 'BN', 'Brunei', '673', NULL, NULL, NULL, NULL, b'1'),
(33, 'BG', 'Bulgaria', '359', NULL, NULL, NULL, NULL, b'1'),
(34, 'BF', 'Burkina Faso', '226', NULL, NULL, NULL, NULL, b'1'),
(35, 'BI', 'Burundi', '257', NULL, NULL, NULL, NULL, b'1'),
(36, 'KH', 'Cambodia', '855', NULL, NULL, NULL, NULL, b'1'),
(37, 'CM', 'Cameroon', '237', NULL, NULL, NULL, NULL, b'1'),
(38, 'CA', 'Canada', '1', NULL, NULL, NULL, NULL, b'1'),
(39, 'CV', 'Cape Verde', '238', NULL, NULL, NULL, NULL, b'1'),
(40, 'KY', 'Cayman Islands', '1345', NULL, NULL, NULL, NULL, b'1'),
(41, 'CF', 'Central African Republic', '236', NULL, NULL, NULL, NULL, b'1'),
(42, 'TD', 'Chad', '235', NULL, NULL, NULL, NULL, b'1'),
(43, 'CL', 'Chile', '56', NULL, NULL, NULL, NULL, b'1'),
(44, 'CN', 'China', '86', NULL, NULL, NULL, NULL, b'1'),
(45, 'CX', 'Christmas Island', '61', NULL, NULL, NULL, NULL, b'1'),
(46, 'CC', 'Cocos (Keeling) Islands', '672', NULL, NULL, NULL, NULL, b'1'),
(47, 'CO', 'Colombia', '57', NULL, NULL, NULL, NULL, b'1'),
(48, 'KM', 'Comoros', '269', NULL, NULL, NULL, NULL, b'1'),
(49, 'CG', 'Congo', '242', NULL, NULL, NULL, NULL, b'1'),
(50, 'CD', 'Congo The Democratic Republic Of The', '242', NULL, NULL, NULL, NULL, b'1'),
(51, 'CK', 'Cook Islands', '682', NULL, NULL, NULL, NULL, b'1'),
(52, 'CR', 'Costa Rica', '506', NULL, NULL, NULL, NULL, b'1'),
(53, 'CI', 'Cote D Ivoire (Ivory Coast)', '225', NULL, NULL, NULL, NULL, b'1'),
(54, 'HR', 'Croatia (Hrvatska)', '385', NULL, NULL, NULL, NULL, b'1'),
(55, 'CU', 'Cuba', '53', NULL, NULL, NULL, NULL, b'1'),
(56, 'CY', 'Cyprus', '357', NULL, NULL, NULL, NULL, b'1'),
(57, 'CZ', 'Czech Republic', '420', NULL, NULL, NULL, NULL, b'1'),
(58, 'DK', 'Denmark', '45', NULL, NULL, NULL, NULL, b'1'),
(59, 'DJ', 'Djibouti', '253', NULL, NULL, NULL, NULL, b'1'),
(60, 'DM', 'Dominica', '1767', NULL, NULL, NULL, NULL, b'1'),
(61, 'DO', 'Dominican Republic', '1809', NULL, NULL, NULL, NULL, b'1'),
(62, 'TP', 'East Timor', '670', NULL, NULL, NULL, NULL, b'1'),
(63, 'EC', 'Ecuador', '593', NULL, NULL, NULL, NULL, b'1'),
(64, 'EG', 'Egypt', '20', NULL, NULL, NULL, NULL, b'1'),
(65, 'SV', 'El Salvador', '503', NULL, NULL, NULL, NULL, b'1'),
(66, 'GQ', 'Equatorial Guinea', '240', NULL, NULL, NULL, NULL, b'1'),
(67, 'ER', 'Eritrea', '291', NULL, NULL, NULL, NULL, b'1'),
(68, 'EE', 'Estonia', '372', NULL, NULL, NULL, NULL, b'1'),
(69, 'ET', 'Ethiopia', '251', NULL, NULL, NULL, NULL, b'1'),
(70, 'XA', 'External Territories of Australia', '61', NULL, NULL, NULL, NULL, b'1'),
(71, 'FK', 'Falkland Islands', '500', NULL, NULL, NULL, NULL, b'1'),
(72, 'FO', 'Faroe Islands', '298', NULL, NULL, NULL, NULL, b'1'),
(73, 'FJ', 'Fiji Islands', '679', NULL, NULL, NULL, NULL, b'1'),
(74, 'FI', 'Finland', '358', NULL, NULL, NULL, NULL, b'1'),
(75, 'FR', 'France', '33', NULL, NULL, NULL, NULL, b'1'),
(76, 'GF', 'French Guiana', '594', NULL, NULL, NULL, NULL, b'1'),
(77, 'PF', 'French Polynesia', '689', NULL, NULL, NULL, NULL, b'1'),
(78, 'TF', 'French Southern Territories', '0', NULL, NULL, NULL, NULL, b'1'),
(79, 'GA', 'Gabon', '241', NULL, NULL, NULL, NULL, b'1'),
(80, 'GM', 'Gambia The', '220', NULL, NULL, NULL, NULL, b'1'),
(81, 'GE', 'Georgia', '995', NULL, NULL, NULL, NULL, b'1'),
(82, 'DE', 'Germany', '49', NULL, NULL, NULL, NULL, b'1'),
(83, 'GH', 'Ghana', '233', NULL, NULL, NULL, NULL, b'1'),
(84, 'GI', 'Gibraltar', '350', NULL, NULL, NULL, NULL, b'1'),
(85, 'GR', 'Greece', '30', NULL, NULL, NULL, NULL, b'1'),
(86, 'GL', 'Greenland', '299', NULL, NULL, NULL, NULL, b'1'),
(87, 'GD', 'Grenada', '1473', NULL, NULL, NULL, NULL, b'1'),
(88, 'GP', 'Guadeloupe', '590', NULL, NULL, NULL, NULL, b'1'),
(89, 'GU', 'Guam', '1671', NULL, NULL, NULL, NULL, b'1'),
(90, 'GT', 'Guatemala', '502', NULL, NULL, NULL, NULL, b'1'),
(91, 'XU', 'Guernsey and Alderney', '44', NULL, NULL, NULL, NULL, b'1'),
(92, 'GN', 'Guinea', '224', NULL, NULL, NULL, NULL, b'1'),
(93, 'GW', 'Guinea-Bissau', '245', NULL, NULL, NULL, NULL, b'1'),
(94, 'GY', 'Guyana', '592', NULL, NULL, NULL, NULL, b'1'),
(95, 'HT', 'Haiti', '509', NULL, NULL, NULL, NULL, b'1'),
(96, 'HM', 'Heard and McDonald Islands', '0', NULL, NULL, NULL, NULL, b'1'),
(97, 'HN', 'Honduras', '504', NULL, NULL, NULL, NULL, b'1'),
(98, 'HK', 'Hong Kong S.A.R.', '852', NULL, NULL, NULL, NULL, b'1'),
(99, 'HU', 'Hungary', '36', NULL, NULL, NULL, NULL, b'1'),
(100, 'IS', 'Iceland', '354', NULL, NULL, NULL, NULL, b'1'),
(101, 'IN', 'India', '91', NULL, NULL, NULL, NULL, b'1'),
(102, 'ID', 'Indonesia', '62', NULL, NULL, NULL, NULL, b'1'),
(103, 'IR', 'Iran', '98', NULL, NULL, NULL, NULL, b'1'),
(104, 'IQ', 'Iraq', '964', NULL, NULL, NULL, NULL, b'1'),
(105, 'IE', 'Ireland', '353', NULL, NULL, NULL, NULL, b'1'),
(106, 'IL', 'Israel', '972', NULL, NULL, NULL, NULL, b'1'),
(107, 'IT', 'Italy', '39', NULL, NULL, NULL, NULL, b'1'),
(108, 'JM', 'Jamaica', '1876', NULL, NULL, NULL, NULL, b'1'),
(109, 'JP', 'Japan', '81', NULL, NULL, NULL, NULL, b'1'),
(110, 'XJ', 'Jersey', '44', NULL, NULL, NULL, NULL, b'1'),
(111, 'JO', 'Jordan', '962', NULL, NULL, NULL, NULL, b'1'),
(112, 'KZ', 'Kazakhstan', '7', NULL, NULL, NULL, NULL, b'1'),
(113, 'KE', 'Kenya', '254', NULL, NULL, NULL, NULL, b'1'),
(114, 'KI', 'Kiribati', '686', NULL, NULL, NULL, NULL, b'1'),
(115, 'KP', 'Korea North', '850', NULL, NULL, NULL, NULL, b'1'),
(116, 'KR', 'Korea South', '82', NULL, NULL, NULL, NULL, b'1'),
(117, 'KW', 'Kuwait', '965', NULL, NULL, NULL, NULL, b'1'),
(118, 'KG', 'Kyrgyzstan', '996', NULL, NULL, NULL, NULL, b'1'),
(119, 'LA', 'Laos', '856', NULL, NULL, NULL, NULL, b'1'),
(120, 'LV', 'Latvia', '371', NULL, NULL, NULL, NULL, b'1'),
(121, 'LB', 'Lebanon', '961', NULL, NULL, NULL, NULL, b'1'),
(122, 'LS', 'Lesotho', '266', NULL, NULL, NULL, NULL, b'1'),
(123, 'LR', 'Liberia', '231', NULL, NULL, NULL, NULL, b'1'),
(124, 'LY', 'Libya', '218', NULL, NULL, NULL, NULL, b'1'),
(125, 'LI', 'Liechtenstein', '423', NULL, NULL, NULL, NULL, b'1'),
(126, 'LT', 'Lithuania', '370', NULL, NULL, NULL, NULL, b'1'),
(127, 'LU', 'Luxembourg', '352', NULL, NULL, NULL, NULL, b'1'),
(128, 'MO', 'Macau S.A.R.', '853', NULL, NULL, NULL, NULL, b'1'),
(129, 'MK', 'Macedonia', '389', NULL, NULL, NULL, NULL, b'1'),
(130, 'MG', 'Madagascar', '261', NULL, NULL, NULL, NULL, b'1'),
(131, 'MW', 'Malawi', '265', NULL, NULL, NULL, NULL, b'1'),
(132, 'MY', 'Malaysia', '60', NULL, NULL, NULL, NULL, b'1'),
(133, 'MV', 'Maldives', '960', NULL, NULL, NULL, NULL, b'1'),
(134, 'ML', 'Mali', '223', NULL, NULL, NULL, NULL, b'1'),
(135, 'MT', 'Malta', '356', NULL, NULL, NULL, NULL, b'1'),
(136, 'XM', 'Man (Isle of)', '44', NULL, NULL, NULL, NULL, b'1'),
(137, 'MH', 'Marshall Islands', '692', NULL, NULL, NULL, NULL, b'1'),
(138, 'MQ', 'Martinique', '596', NULL, NULL, NULL, NULL, b'1'),
(139, 'MR', 'Mauritania', '222', NULL, NULL, NULL, NULL, b'1'),
(140, 'MU', 'Mauritius', '230', NULL, NULL, NULL, NULL, b'1'),
(141, 'YT', 'Mayotte', '269', NULL, NULL, NULL, NULL, b'1'),
(142, 'MX', 'Mexico', '52', NULL, NULL, NULL, NULL, b'1'),
(143, 'FM', 'Micronesia', '691', NULL, NULL, NULL, NULL, b'1'),
(144, 'MD', 'Moldova', '373', NULL, NULL, NULL, NULL, b'1'),
(145, 'MC', 'Monaco', '377', NULL, NULL, NULL, NULL, b'1'),
(146, 'MN', 'Mongolia', '976', NULL, NULL, NULL, NULL, b'1'),
(147, 'MS', 'Montserrat', '1664', NULL, NULL, NULL, NULL, b'1'),
(148, 'MA', 'Morocco', '212', NULL, NULL, NULL, NULL, b'1'),
(149, 'MZ', 'Mozambique', '258', NULL, NULL, NULL, NULL, b'1'),
(150, 'MM', 'Myanmar', '95', NULL, NULL, NULL, NULL, b'1'),
(151, 'NA', 'Namibia', '264', NULL, NULL, NULL, NULL, b'1'),
(152, 'NR', 'Nauru', '674', NULL, NULL, NULL, NULL, b'1'),
(153, 'NP', 'Nepal', '977', NULL, NULL, NULL, NULL, b'1'),
(154, 'AN', 'Netherlands Antilles', '599', NULL, NULL, NULL, NULL, b'1'),
(155, 'NL', 'Netherlands The', '31', NULL, NULL, NULL, NULL, b'1'),
(156, 'NC', 'New Caledonia', '687', NULL, NULL, NULL, NULL, b'1'),
(157, 'NZ', 'New Zealand', '64', NULL, NULL, NULL, NULL, b'1'),
(158, 'NI', 'Nicaragua', '505', NULL, NULL, NULL, NULL, b'1'),
(159, 'NE', 'Niger', '227', NULL, NULL, NULL, NULL, b'1'),
(160, 'NG', 'Nigeria', '234', NULL, NULL, NULL, NULL, b'1'),
(161, 'NU', 'Niue', '683', NULL, NULL, NULL, NULL, b'1'),
(162, 'NF', 'Norfolk Island', '672', NULL, NULL, NULL, NULL, b'1'),
(163, 'MP', 'Northern Mariana Islands', '1670', NULL, NULL, NULL, NULL, b'1'),
(164, 'NO', 'Norway', '47', NULL, NULL, NULL, NULL, b'1'),
(165, 'OM', 'Oman', '968', NULL, NULL, NULL, NULL, b'1'),
(166, 'PK', 'Pakistan', '92', NULL, NULL, NULL, NULL, b'1'),
(167, 'PW', 'Palau', '680', NULL, NULL, NULL, NULL, b'1'),
(168, 'PS', 'Palestinian Territory Occupied', '970', NULL, NULL, NULL, NULL, b'1'),
(169, 'PA', 'Panama', '507', NULL, NULL, NULL, NULL, b'1'),
(170, 'PG', 'Papua new Guinea', '675', NULL, NULL, NULL, NULL, b'1'),
(171, 'PY', 'Paraguay', '595', NULL, NULL, NULL, NULL, b'1'),
(172, 'PE', 'Peru', '51', NULL, NULL, NULL, NULL, b'1'),
(173, 'PH', 'Philippines', '63', NULL, NULL, NULL, NULL, b'1'),
(174, 'PN', 'Pitcairn Island', '0', NULL, NULL, NULL, NULL, b'1'),
(175, 'PL', 'Poland', '48', NULL, NULL, NULL, NULL, b'1'),
(176, 'PT', 'Portugal', '351', NULL, NULL, NULL, NULL, b'1'),
(177, 'PR', 'Puerto Rico', '1787', NULL, NULL, NULL, NULL, b'1'),
(178, 'QA', 'Qatar', '974', NULL, NULL, NULL, NULL, b'1'),
(179, 'RE', 'Reunion', '262', NULL, NULL, NULL, NULL, b'1'),
(180, 'RO', 'Romania', '40', NULL, NULL, NULL, NULL, b'1'),
(181, 'RU', 'Russia', '70', NULL, NULL, NULL, NULL, b'1'),
(182, 'RW', 'Rwanda', '250', NULL, NULL, NULL, NULL, b'1'),
(183, 'SH', 'Saint Helena', '290', NULL, NULL, NULL, NULL, b'1'),
(184, 'KN', 'Saint Kitts And Nevis', '1869', NULL, NULL, NULL, NULL, b'1'),
(185, 'LC', 'Saint Lucia', '1758', NULL, NULL, NULL, NULL, b'1'),
(186, 'PM', 'Saint Pierre and Miquelon', '508', NULL, NULL, NULL, NULL, b'1'),
(187, 'VC', 'Saint Vincent And The Grenadines', '1784', NULL, NULL, NULL, NULL, b'1'),
(188, 'WS', 'Samoa', '684', NULL, NULL, NULL, NULL, b'1'),
(189, 'SM', 'San Marino', '378', NULL, NULL, NULL, NULL, b'1'),
(190, 'ST', 'Sao Tome and Principe', '239', NULL, NULL, NULL, NULL, b'1'),
(191, 'SA', 'Saudi Arabia', '966', NULL, NULL, NULL, NULL, b'1'),
(192, 'SN', 'Senegal', '221', NULL, NULL, NULL, NULL, b'1'),
(193, 'RS', 'Serbia', '381', NULL, NULL, NULL, NULL, b'1'),
(194, 'SC', 'Seychelles', '248', NULL, NULL, NULL, NULL, b'1'),
(195, 'SL', 'Sierra Leone', '232', NULL, NULL, NULL, NULL, b'1'),
(196, 'SG', 'Singapore', '65', NULL, NULL, NULL, NULL, b'1'),
(197, 'SK', 'Slovakia', '421', NULL, NULL, NULL, NULL, b'1'),
(198, 'SI', 'Slovenia', '386', NULL, NULL, NULL, NULL, b'1'),
(199, 'XG', 'Smaller Territories of the UK', '44', NULL, NULL, NULL, NULL, b'1'),
(200, 'SB', 'Solomon Islands', '677', NULL, NULL, NULL, NULL, b'1'),
(201, 'SO', 'Somalia', '252', NULL, NULL, NULL, NULL, b'1'),
(202, 'ZA', 'South Africa', '27', NULL, NULL, NULL, NULL, b'1'),
(203, 'GS', 'South Georgia', '0', NULL, NULL, NULL, NULL, b'1'),
(204, 'SS', 'South Sudan', '211', NULL, NULL, NULL, NULL, b'1'),
(205, 'ES', 'Spain', '34', NULL, NULL, NULL, NULL, b'1'),
(206, 'LK', 'Sri Lanka', '94', NULL, NULL, NULL, NULL, b'1'),
(207, 'SD', 'Sudan', '249', NULL, NULL, NULL, NULL, b'1'),
(208, 'SR', 'Suriname', '597', NULL, NULL, NULL, NULL, b'1'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '47', NULL, NULL, NULL, NULL, b'1'),
(210, 'SZ', 'Swaziland', '268', NULL, NULL, NULL, NULL, b'1'),
(211, 'SE', 'Sweden', '46', NULL, NULL, NULL, NULL, b'1'),
(212, 'CH', 'Switzerland', '41', NULL, NULL, NULL, NULL, b'1'),
(213, 'SY', 'Syria', '963', NULL, NULL, NULL, NULL, b'1'),
(214, 'TW', 'Taiwan', '886', NULL, NULL, NULL, NULL, b'1'),
(215, 'TJ', 'Tajikistan', '992', NULL, NULL, NULL, NULL, b'1'),
(216, 'TZ', 'Tanzania', '255', NULL, NULL, NULL, NULL, b'1'),
(217, 'TH', 'Thailand', '66', NULL, NULL, NULL, NULL, b'1'),
(218, 'TG', 'Togo', '228', NULL, NULL, NULL, NULL, b'1'),
(219, 'TK', 'Tokelau', '690', NULL, NULL, NULL, NULL, b'1'),
(220, 'TO', 'Tonga', '676', NULL, NULL, NULL, NULL, b'1'),
(221, 'TT', 'Trinidad And Tobago', '1868', NULL, NULL, NULL, NULL, b'1'),
(222, 'TN', 'Tunisia', '216', NULL, NULL, NULL, NULL, b'1'),
(223, 'TR', 'Turkey', '90', NULL, NULL, NULL, NULL, b'1'),
(224, 'TM', 'Turkmenistan', '7370', NULL, NULL, NULL, NULL, b'1'),
(225, 'TC', 'Turks And Caicos Islands', '1649', NULL, NULL, NULL, NULL, b'1'),
(226, 'TV', 'Tuvalu', '688', NULL, NULL, NULL, NULL, b'1'),
(227, 'UG', 'Uganda', '256', NULL, NULL, NULL, NULL, b'1'),
(228, 'UA', 'Ukraine', '380', NULL, NULL, NULL, NULL, b'1'),
(229, 'AE', 'United Arab Emirates', '971', NULL, NULL, NULL, NULL, b'1'),
(230, 'GB', 'United Kingdom', '44', NULL, NULL, NULL, NULL, b'1'),
(231, 'US', 'United States', '1', NULL, NULL, NULL, NULL, b'1'),
(232, 'UM', 'United States Minor Outlying Islands', '1', NULL, NULL, NULL, NULL, b'1'),
(233, 'UY', 'Uruguay', '598', NULL, NULL, NULL, NULL, b'1'),
(234, 'UZ', 'Uzbekistan', '998', NULL, NULL, NULL, NULL, b'1'),
(235, 'VU', 'Vanuatu', '678', NULL, NULL, NULL, NULL, b'1'),
(236, 'VA', 'Vatican City State (Holy See)', '39', NULL, NULL, NULL, NULL, b'1'),
(237, 'VE', 'Venezuela', '58', NULL, NULL, NULL, NULL, b'1'),
(238, 'VN', 'Vietnam', '84', NULL, NULL, NULL, NULL, b'1'),
(239, 'VG', 'Virgin Islands (British)', '1284', NULL, NULL, NULL, NULL, b'1'),
(240, 'VI', 'Virgin Islands (US)', '1340', NULL, NULL, NULL, NULL, b'1'),
(241, 'WF', 'Wallis And Futuna Islands', '681', NULL, NULL, NULL, NULL, b'1'),
(242, 'EH', 'Western Sahara', '212', NULL, NULL, NULL, NULL, b'1'),
(243, 'YE', 'Yemen', '967', NULL, NULL, NULL, NULL, b'1'),
(244, 'YU', 'Yugoslavia', '38', NULL, NULL, NULL, NULL, b'1'),
(245, 'ZM', 'Zambia', '260', NULL, NULL, NULL, NULL, b'1'),
(246, 'ZW', 'Zimbabwe', '263', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` bit(1) NOT NULL DEFAULT b'0',
  `AttachmentPath` varchar(1000) DEFAULT NULL,
  `IsAttachmentDownloaded` bit(1) NOT NULL DEFAULT b'0',
  `AttachmentDownloadedDate` datetime DEFAULT NULL,
  `IsPaid` bit(50) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownloaded`, `AttachmentDownloadedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 136, 33, 57, b'1', NULL, b'0', NULL, b'00000000000000000000000000000000000000000000000000', '0', 'title', 'cat', NULL, NULL, NULL, NULL, b'1'),
(2, 136, 33, 58, b'0', NULL, b'1', NULL, b'00000000000000000000000000000000000000000000000000', '0', '136', 'cat', NULL, NULL, NULL, NULL, b'0'),
(3, 152, 58, 33, b'1', NULL, b'1', NULL, b'00000000000000000000000000000000000000000000000001', '6', 'title', 'cat', NULL, NULL, NULL, NULL, b'1'),
(5, 137, 33, 58, b'0', NULL, b'1', NULL, b'00000000000000000000000000000000000000000000000000', '0', '149', 'cat', NULL, NULL, NULL, NULL, b'1'),
(31, 139, 58, 58, b'1', 'member/58/156/attachment/Doc2.pdf', b'1', '2021-03-27 11:25:03', b'00000000000000000000000000000000000000000000000000', '0', 's', 'PHP', '2021-03-27 11:25:03', 58, NULL, NULL, b'1'),
(33, 149, 58, 58, b'1', 'member/58/149/attachment/2.jpg', b'1', '2021-03-27 12:57:28', b'00000000000000000000000000000000000000000000000001', '34', 'computerf', 'COMPUTER SCIENCE', '2021-03-27 12:57:28', 58, NULL, NULL, b'1'),
(35, 150, 58, 58, b'1', 'member/58/151/attachment/2.jpg', b'1', '2021-03-27 14:25:16', b'00000000000000000000000000000000000000000000000001', '34', 's', 'PHP', '2021-03-27 14:06:52', 2147483647, NULL, NULL, b'1'),
(36, 152, 58, 58, b'1', '', b'1', '2021-03-27 14:28:35', b'00000000000000000000000000000000000000000000000001', '34', 's', 'PHP', '2021-03-27 14:27:04', 2147483647, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'PHP', 'php', NULL, NULL, NULL, NULL, b'1'),
(2, 'COMPUTER SCIENCE', 'CS', NULL, NULL, NULL, NULL, b'1'),
(3, 'IT', 'IT\r\n', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `notetypes`
--

CREATE TABLE `notetypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notetypes`
--

INSERT INTO `notetypes` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Handwritten', 'description', NULL, NULL, NULL, NULL, b'1'),
(2, 'Unversity notes', 'Unversity notes', NULL, NULL, NULL, NULL, b'1'),
(3, 'Novel', 'Novel', NULL, NULL, NULL, NULL, b'1'),
(4, 'Story Book', 'Story Book', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `Datavalue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ID`, `Value`, `Datavalue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(2, 'Female', 'F', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(5, 'Unknown', 'U', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(6, 'Paid', 'P', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(7, 'Free', 'FR', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(8, 'Draft', 'Draft', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(9, 'Submitted For Review', 'Submitted For Review', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(10, 'IN Review', 'IN Review', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(11, 'Published', 'Published', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(12, 'Rejected', 'Rejected', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(13, 'Removed', 'Removed', 'Notes Status', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--

CREATE TABLE `sellernotes` (
  `ID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(1000) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(1000) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL DEFAULT b'0',
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(10000) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotes`
--

INSERT INTO `sellernotes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(136, 55, 12, 33, 'ar', '2021-03-03 19:34:07', ' pdvhf', 2, NULL, 1, NULL, 'd', ' ', NULL, NULL, NULL, NULL, b'0', NULL, NULL, NULL, NULL, NULL, NULL, b'1'),
(137, 58, 12, 1, 'ar', '2021-03-07 19:59:19', 's', 2, '2.jpg', 2, 200, 'des', 'institue', 11, 'courcename', '3', 'pfro', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(139, 58, 11, 1, 'ar', '2021-03-07 20:01:35', 's', 1, '4.jpg', 2, 0, 'd', 'lj', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(140, 58, 11, 1, 'ar', '2021-03-07 20:01:40', 'computr', 1, '4.jpg', 3, 0, 'd', 'ld', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(141, 58, 11, 1, 'ar', '2021-03-07 20:01:42', 's', 3, '4.jpg', 2, 0, 'd', '', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(142, 58, 11, 1, 'ar', '2021-03-07 20:01:43', 's', 1, '4.jpg', 3, 0, 'd', '', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(143, 58, 11, 1, 'ar', '2021-03-07 20:01:44', 's', 2, '4.jpg', 1, 0, 'd', '', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(144, 58, 11, 1, 'ar', '2021-03-07 20:01:45', 'science', 1, NULL, 3, 0, 'd', '', 1, '', '', '', b'0', '0', '', NULL, NULL, NULL, NULL, b'1'),
(145, 58, 11, 1, 'ar', '2021-03-07 20:02:34', 's', 2, '3.jpg', 1, 22, 's', 'institue', 16, 'bootstrap', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(146, 58, 11, 1, 'ar', '2021-03-07 20:02:39', 'social', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'js', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(147, 58, 11, 1, 'ar', '2021-03-07 20:02:41', 's', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(148, 55, 11, 1, 'ar', '2021-03-07 20:02:48', 's', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'php', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(149, 58, 11, 1, 'ar', '2021-03-07 20:02:52', 'computerf', 2, '3.jpg', 1, 22, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam facere architecto deleniti voluptatum nisi repellendus est. Odit, minima, qui.', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(150, 58, 11, 1, 'FFF', '2021-03-07 20:02:54', 's', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(151, 55, 11, 1, 'ar', '2021-03-07 20:03:01', 's', 2, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(152, 58, 11, 1, 'ar', '2021-03-07 20:03:05', 's', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(153, 58, 11, 1, 'ar', '2021-03-07 20:03:08', 's', 2, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(154, 58, 11, 1, 'ar', '2021-03-07 20:03:16', 's', 1, '3.jpg', 1, 22, 's', 'institue', 16, 'courcename', '22', 'p', b'1', '34', 'university.png', NULL, NULL, NULL, NULL, b'1'),
(156, 55, 11, 33, 'ar', '2021-03-03 19:34:07', 'Titl', 2, NULL, 1, NULL, 'd', NULL, NULL, NULL, NULL, NULL, b'0', NULL, NULL, NULL, NULL, NULL, NULL, b'1'),
(160, 55, 11, 33, 'ar', '2021-03-03 19:34:07', 'Titl', 2, NULL, 1, NULL, 'd', NULL, NULL, NULL, NULL, NULL, b'0', NULL, NULL, NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachements`
--

CREATE TABLE `sellernotesattachements` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesattachements`
--

INSERT INTO `sellernotesattachements` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(27, 152, '2.jpg', 'member/58/144/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(28, 154, '2.jpg', 'member/58/145/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(29, 143, '2.jpg', 'member/58/146/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(30, 147, '2.jpg', 'member/58/147/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(31, 148, '2.jpg', 'member/58/148/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(32, 149, '2.jpg', 'member/58/149/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(33, 136, '2.jpg', 'member/58/150/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(34, 150, '2.jpg', 'member/58/151/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(35, 140, '2.jpg', 'member/58/152/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(36, 140, '3.jpg', 'member/58/153/attachment/2.jpg', NULL, NULL, NULL, NULL, b'1'),
(38, 139, 'Doc2.pdf', 'member/58/156/attachment/Doc2.pdf', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--

CREATE TABLE `sellernotesreportedissues` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedBYID` int(11) NOT NULL,
  `AgainstDownloadID` int(11) NOT NULL,
  `Remarks` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreportedissues`
--

INSERT INTO `sellernotesreportedissues` (`ID`, `NoteID`, `ReportedBYID`, `AgainstDownloadID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(37, 136, 58, 2, '', '2021-03-26 13:11:27', 58, NULL, NULL, b'1'),
(38, 149, 58, 5, '', '2021-03-26 13:11:43', 58, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreviews`
--

INSERT INTO `sellernotesreviews` (`ID`, `NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 149, 58, 2, '5', 'nice book', '2021-03-25 11:30:52', NULL, '2021-03-25 13:56:36', 58, b'1'),
(18, 149, 55, 5, '1', 'boring', '2021-03-25 13:50:53', 58, '2021-03-25 20:25:34', 58, b'1'),
(19, 149, 56, 1, '3', 'interesting    book', '2021-03-25 14:26:14', 58, '2021-03-25 20:23:55', 58, b'1'),
(20, 156, 58, 1, '5', 'nice concept', '2021-03-25 14:26:14', 58, '2021-03-25 20:23:55', 58, b'1'),
(21, 136, 58, 1, '3', 'average book', '2021-03-25 14:26:14', 58, '2021-03-25 20:23:55', 58, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfigurations`
--

CREATE TABLE `systemconfigurations` (
  `ID` int(11) NOT NULL,
  `Key1` varchar(100) NOT NULL,
  `Value` varchar(1000) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) DEFAULT NULL,
  `Phonenumber–CountryCode` varchar(50) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Phonenumber–CountryCode`, `Phonenumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(18, 58, '2021-03-11', 1, 'parthdevani2121@gmail.com', '+91', '09106946183', 'DP_10032021033424.jpg', 'ad1', 'ad2', 'talala', 'gujrat', '13', 'India', 'gtu', 'lj', '2021-03-10 18:23:29', 58, '2021-03-11 10:55:21', 58, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`RoleID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'superadmin', 'superadmin', NULL, NULL, NULL, NULL, b'1'),
(2, 'admin', 'admin\r\n', NULL, NULL, NULL, NULL, b'1'),
(3, 'member', 'member\r\n', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL DEFAULT b'0',
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `Email`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 2, 'parth', 'devani', 'parth@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(8, 2, 'parth', 'devani', 'ashah@ds.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(9, 3, 'parth', 'devani', 'ahah@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(11, 3, 'parth', 'devani', 'ahaeeeh@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(13, 3, 'parth', 'devani', 'parqth22@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(14, 3, 'raj', 'trada', 'parqtsqsqh@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(16, 3, 'parth', 'devani', 'parthww@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(21, 3, 'parth', 'devani', 'ahah@ds.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(22, 3, 'parth', 'devani', 'parthwwwe@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(26, 3, 'parth', 'd', 'asha2333h@ds.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(33, 3, 'ik', 'khatri', 'ikkh@gmail.com', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(55, 3, 'ikhlash', 'khatri', 'parthdevani3817@gamil.com', '2', b'1', NULL, NULL, NULL, NULL, b'1'),
(56, 1, 'gaji', 'para', 'gajipara@ds.dndd', '2', b'0', NULL, NULL, NULL, NULL, b'1'),
(57, 3, 'raj', 'trada', '@gmail.com', '2', b'1', NULL, NULL, NULL, NULL, b'1'),
(58, 3, 'parth', 'devani', 'parthdevani2121@gmail.com', '11', b'1', NULL, NULL, NULL, NULL, b'1'),
(59, 3, 'parth', 'devani', 'parthdevani21@gmail.com', '11', b'1', NULL, NULL, NULL, NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Datavalue` (`Datavalue`);

--
-- Indexes for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sellernotes_ibfk_1` (`SellerID`),
  ADD KEY `sellernotes_ibfk_2` (`ActionedBy`),
  ADD KEY `sellernotes_ibfk_3` (`Category`),
  ADD KEY `sellernotes_ibfk_4` (`NoteType`),
  ADD KEY `sellernotes_ibfk_5` (`Country`),
  ADD KEY `sellernotes_ibfk_6` (`Status`);

--
-- Indexes for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedBYID` (`ReportedBYID`),
  ADD KEY `sellernotesreportedissues_ibfk_3` (`AgainstDownloadID`);

--
-- Indexes for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `sellernotesreviews_ibfk_3` (`AgainstDownloadsID`);

--
-- Indexes for table `systemconfigurations`
--
ALTER TABLE `systemconfigurations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `users_ibfk_2` (`Gender`),
  ADD KEY `users_ibfk_3` (`Phonenumber–CountryCode`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EmailID` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `systemconfigurations`
--
ALTER TABLE `systemconfigurations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`);

--
-- Constraints for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD CONSTRAINT `sellernotes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_2` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_3` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_4` FOREIGN KEY (`NoteType`) REFERENCES `notetypes` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_5` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_6` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ID`);

--
-- Constraints for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD CONSTRAINT `sellernotesattch_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`);

--
-- Constraints for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD CONSTRAINT `sellernotereview_ibfk_1` FOREIGN KEY (`ReportedBYID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotereview_ibfk_2` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`ID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`);

--
-- Constraints for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD CONSTRAINT `sellernotereview1_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `sellernotereview1_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotereview1_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `usersprofil_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `usersprofil_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
