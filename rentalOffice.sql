-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 4 月 26 日 11:46
-- サーバのバージョン： 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalOffice`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `loginID` int(11) NOT NULL,
  `officeID` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `bookings`
--

INSERT INTO `bookings` (`bookingID`, `loginID`, `officeID`, `checkIn`, `checkOut`, `status`) VALUES
(2, 22, 1, '2019-04-01', '2019-04-30', ''),
(3, 17, 18, '2019-04-23', '2019-05-16', ''),
(4, 22, 1, '2019-06-08', '2019-06-11', ''),
(5, 20, 18, '2019-06-01', '2019-06-14', ''),
(6, 3, 4, '2019-06-20', '2019-06-30', ''),
(7, 21, 16, '2019-05-16', '2019-06-14', ''),
(8, 17, 20, '2019-05-25', '2019-06-30', ''),
(9, 2, 8, '2019-04-11', '2019-04-26', ''),
(12, 2, 16, '2019-07-23', '2019-07-31', ''),
(16, 1, 4, '2019-04-10', '2019-04-25', ''),
(18, 17, 7, '2019-04-11', '2019-07-27', ''),
(19, 2, 8, '2019-06-06', '2019-07-01', ''),
(20, 3, 13, '2019-04-11', '2019-05-04', ''),
(21, 1, 4, '2019-09-26', '2019-10-17', ''),
(22, 1, 2, '2019-04-10', '2019-05-04', ''),
(23, 1, 9, '2019-04-10', '2019-05-04', ''),
(24, 3, 13, '2019-12-04', '2019-12-29', ''),
(25, 1, 14, '2019-05-07', '2019-05-09', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `country`
--

CREATE TABLE `country` (
  `idnum` int(11) NOT NULL,
  `countryCode` varchar(3) NOT NULL,
  `countryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `country`
--

INSERT INTO `country` (`idnum`, `countryCode`, `countryName`) VALUES
(251, 'AF', 'Afghanistan'),
(252, 'AL', 'Albania'),
(253, 'DZ', 'Algeria'),
(254, 'AS', 'American Samoa'),
(255, 'AD', 'Andorra'),
(256, 'AO', 'Angola'),
(257, 'AI', 'Anguilla'),
(258, 'AQ', 'Antarctica'),
(259, 'AG', 'Antigua and Barbuda'),
(260, 'AR', 'Argentina'),
(261, 'AM', 'Armenia'),
(262, 'AW', 'Aruba'),
(263, 'AU', 'Australia'),
(264, 'AT', 'Austria'),
(265, 'AZ', 'Azerbaijan'),
(266, 'BS', 'Bahamas'),
(267, 'BH', 'Bahrain'),
(268, 'BD', 'Bangladesh'),
(269, 'BB', 'Barbados'),
(270, 'BY', 'Belarus'),
(271, 'BE', 'Belgium'),
(272, 'BZ', 'Belize'),
(273, 'BJ', 'Benin'),
(274, 'BM', 'Bermuda'),
(275, 'BT', 'Bhutan'),
(276, 'BO', 'Bolivia'),
(277, 'BQ', 'Bonaire'),
(278, 'BA', 'Bosnia and Herzegovina'),
(279, 'BW', 'Botswana'),
(280, 'BV', 'Bouvet Island'),
(281, 'BR', 'Brazil'),
(282, 'IO', 'British Indian Ocean Territory'),
(283, 'BN', 'Brunei Darussalam'),
(284, 'BG', 'Bulgaria'),
(285, 'BF', 'Burkina Faso'),
(286, 'BI', 'Burundi'),
(287, 'KH', 'Cambodia'),
(288, 'CM', 'Cameroon'),
(289, 'CA', 'Canada'),
(290, 'CV', 'Cape Verde'),
(291, 'KY', 'Cayman Islands'),
(292, 'CF', 'Central African Republic'),
(293, 'TD', 'Chad'),
(294, 'CL', 'Chile'),
(295, 'CN', 'China'),
(296, 'CX', 'Christmas Island'),
(297, 'CC', 'Cocos (Keeling) Islands'),
(298, 'CO', 'Colombia'),
(299, 'KM', 'Comoros'),
(300, 'CG', 'Congo'),
(301, 'CD', 'Democratic Republic of the Congo'),
(302, 'CK', 'Cook Islands'),
(303, 'CR', 'Costa Rica'),
(304, 'HR', 'Croatia'),
(305, 'CU', 'Cuba'),
(306, 'CW', 'Curacao'),
(307, 'CY', 'Cyprus'),
(308, 'CZ', 'Czech Republic'),
(309, 'CI', 'Cote d\'Ivoire'),
(310, 'DK', 'Denmark'),
(311, 'DJ', 'Djibouti'),
(312, 'DM', 'Dominica'),
(313, 'DO', 'Dominican Republic'),
(314, 'EC', 'Ecuador'),
(315, 'EG', 'Egypt'),
(316, 'SV', 'El Salvador'),
(317, 'GQ', 'Equatorial Guinea'),
(318, 'ER', 'Eritrea'),
(319, 'EE', 'Estonia'),
(320, 'ET', 'Ethiopia'),
(321, 'FK', 'Falkland Islands (Malvinas)'),
(322, 'FO', 'Faroe Islands'),
(323, 'FJ', 'Fiji'),
(324, 'FI', 'Finland'),
(325, 'FR', 'France'),
(326, 'GF', 'French Guiana'),
(327, 'PF', 'French Polynesia'),
(328, 'TF', 'French Southern Territories'),
(329, 'GA', 'Gabon'),
(330, 'GM', 'Gambia'),
(331, 'GE', 'Georgia'),
(332, 'DE', 'Germany'),
(333, 'GH', 'Ghana'),
(334, 'GI', 'Gibraltar'),
(335, 'GR', 'Greece'),
(336, 'GL', 'Greenland'),
(337, 'GD', 'Grenada'),
(338, 'GP', 'Guadeloupe'),
(339, 'GU', 'Guam'),
(340, 'GT', 'Guatemala'),
(341, 'GG', 'Guernsey'),
(342, 'GN', 'Guinea'),
(343, 'GW', 'Guinea-Bissau'),
(344, 'GY', 'Guyana'),
(345, 'HT', 'Haiti'),
(346, 'HM', 'Heard Island and McDonald Islands'),
(347, 'VA', 'Holy See (Vatican City State)'),
(348, 'HN', 'Honduras'),
(349, 'HK', 'Hong Kong'),
(350, 'HU', 'Hungary'),
(351, 'IS', 'Iceland'),
(352, 'IN', 'India'),
(353, 'ID', 'Indonesia'),
(354, 'IR', 'Iran, Islamic Republic of'),
(355, 'IQ', 'Iraq'),
(356, 'IE', 'Ireland'),
(357, 'IM', 'Isle of Man'),
(358, 'IL', 'Israel'),
(359, 'IT', 'Italy'),
(360, 'JM', 'Jamaica'),
(361, 'JP', 'Japan'),
(362, 'JE', 'Jersey'),
(363, 'JO', 'Jordan'),
(364, 'KZ', 'Kazakhstan'),
(365, 'KE', 'Kenya'),
(366, 'KI', 'Kiribati'),
(367, 'KP', 'Korea, Democratic People\'s Republic of'),
(368, 'KR', 'Korea, Republic of'),
(369, 'KW', 'Kuwait'),
(370, 'KG', 'Kyrgyzstan'),
(371, 'LA', 'Lao People\'s Democratic Republic'),
(372, 'LV', 'Latvia'),
(373, 'LB', 'Lebanon'),
(374, 'LS', 'Lesotho'),
(375, 'LR', 'Liberia'),
(376, 'LY', 'Libya'),
(377, 'LI', 'Liechtenstein'),
(378, 'LT', 'Lithuania'),
(379, 'LU', 'Luxembourg'),
(380, 'MO', 'Macao'),
(381, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(382, 'MG', 'Madagascar'),
(383, 'MW', 'Malawi'),
(384, 'MY', 'Malaysia'),
(385, 'MV', 'Maldives'),
(386, 'ML', 'Mali'),
(387, 'MT', 'Malta'),
(388, 'MH', 'Marshall Islands'),
(389, 'MQ', 'Martinique'),
(390, 'MR', 'Mauritania'),
(391, 'MU', 'Mauritius'),
(392, 'YT', 'Mayotte'),
(393, 'MX', 'Mexico'),
(394, 'FM', 'Micronesia, Federated States of'),
(395, 'MD', 'Moldova, Republic of'),
(396, 'MC', 'Monaco'),
(397, 'MN', 'Mongolia'),
(398, 'ME', 'Montenegro'),
(399, 'MS', 'Montserrat'),
(400, 'MA', 'Morocco'),
(401, 'MZ', 'Mozambique'),
(402, 'MM', 'Myanmar'),
(403, 'NA', 'Namibia'),
(404, 'NR', 'Nauru'),
(405, 'NP', 'Nepal'),
(406, 'NL', 'Netherlands'),
(407, 'NC', 'New Caledonia'),
(408, 'NZ', 'New Zealand'),
(409, 'NI', 'Nicaragua'),
(410, 'NE', 'Niger'),
(411, 'NG', 'Nigeria'),
(412, 'NU', 'Niue'),
(413, 'NF', 'Norfolk Island'),
(414, 'MP', 'Northern Mariana Islands'),
(415, 'NO', 'Norway'),
(416, 'OM', 'Oman'),
(417, 'PK', 'Pakistan'),
(418, 'PW', 'Palau'),
(419, 'PS', 'Palestine, State of'),
(420, 'PA', 'Panama'),
(421, 'PG', 'Papua New Guinea'),
(422, 'PY', 'Paraguay'),
(423, 'PE', 'Peru'),
(424, 'PH', 'Philippines'),
(425, 'PN', 'Pitcairn'),
(426, 'PL', 'Poland'),
(427, 'PT', 'Portugal'),
(428, 'PR', 'Puerto Rico'),
(429, 'QA', 'Qatar'),
(430, 'RO', 'Romania'),
(431, 'RU', 'Russian Federation'),
(432, 'RW', 'Rwanda'),
(433, 'RE', 'Reunion'),
(434, 'BL', 'Saint Barthelemy'),
(435, 'SH', 'Saint Helena'),
(436, 'KN', 'Saint Kitts and Nevis'),
(437, 'LC', 'Saint Lucia'),
(438, 'MF', 'Saint Martin (French part)'),
(439, 'PM', 'Saint Pierre and Miquelon'),
(440, 'VC', 'Saint Vincent and the Grenadines'),
(441, 'WS', 'Samoa'),
(442, 'SM', 'San Marino'),
(443, 'ST', 'Sao Tome and Principe'),
(444, 'SA', 'Saudi Arabia'),
(445, 'SN', 'Senegal'),
(446, 'RS', 'Serbia'),
(447, 'SC', 'Seychelles'),
(448, 'SL', 'Sierra Leone'),
(449, 'SG', 'Singapore'),
(450, 'SX', 'Sint Maarten (Dutch part)'),
(451, 'SK', 'Slovakia'),
(452, 'SI', 'Slovenia'),
(453, 'SB', 'Solomon Islands'),
(454, 'SO', 'Somalia'),
(455, 'ZA', 'South Africa'),
(456, 'GS', 'South Georgia and the South Sandwich Islands'),
(457, 'SS', 'South Sudan'),
(458, 'ES', 'Spain'),
(459, 'LK', 'Sri Lanka'),
(460, 'SD', 'Sudan'),
(461, 'SR', 'Suriname'),
(462, 'SJ', 'Svalbard and Jan Mayen'),
(463, 'SZ', 'Swaziland'),
(464, 'SE', 'Sweden'),
(465, 'CH', 'Switzerland'),
(466, 'SY', 'Syrian Arab Republic'),
(467, 'TW', 'Taiwan'),
(468, 'TJ', 'Tajikistan'),
(469, 'TZ', 'United Republic of Tanzania'),
(470, 'TH', 'Thailand'),
(471, 'TL', 'Timor-Leste'),
(472, 'TG', 'Togo'),
(473, 'TK', 'Tokelau'),
(474, 'TO', 'Tonga'),
(475, 'TT', 'Trinidad and Tobago'),
(476, 'TN', 'Tunisia'),
(477, 'TR', 'Turkey'),
(478, 'TM', 'Turkmenistan'),
(479, 'TC', 'Turks and Caicos Islands'),
(480, 'TV', 'Tuvalu'),
(481, 'UG', 'Uganda'),
(482, 'UA', 'Ukraine'),
(483, 'AE', 'United Arab Emirates'),
(484, 'GB', 'United Kingdom'),
(485, 'US', 'United States'),
(486, 'UM', 'United States Minor Outlying Islands'),
(487, 'UY', 'Uruguay'),
(488, 'UZ', 'Uzbekistan'),
(489, 'VU', 'Vanuatu'),
(490, 'VE', 'Venezuela'),
(491, 'VN', 'Viet Nam'),
(492, 'VG', 'British Virgin Islands'),
(493, 'VI', 'US Virgin Islands'),
(494, 'WF', 'Wallis and Futuna'),
(495, 'EH', 'Western Sahara'),
(496, 'YE', 'Yemen'),
(497, 'ZM', 'Zambia'),
(498, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- テーブルの構造 `office`
--

CREATE TABLE `office` (
  `officeID` int(11) NOT NULL,
  `officeName` varchar(100) NOT NULL,
  `officePic` varchar(200) NOT NULL,
  `officeDescription` varchar(500) NOT NULL,
  `countryCode` varchar(3) NOT NULL,
  `region` varchar(50) NOT NULL,
  `officeAddress` varchar(100) NOT NULL,
  `officePhoneNumber` varchar(20) NOT NULL,
  `officeEmail` varchar(100) NOT NULL,
  `officePassword` varchar(50) NOT NULL,
  `maxCapacity` int(11) NOT NULL,
  `rentalFee` int(11) NOT NULL,
  `bookingStatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `office`
--

INSERT INTO `office` (`officeID`, `officeName`, `officePic`, `officeDescription`, `countryCode`, `region`, `officeAddress`, `officePhoneNumber`, `officeEmail`, `officePassword`, `maxCapacity`, `rentalFee`, `bookingStatus`) VALUES
(2, 'Cebu super modan office', 'img/office-12.jpg', 'Located in Cebu.', 'PH', '', 'Cebu', '980', 'jljfioj@g.com', 'po', 10, 20000, ''),
(4, 'Japan Tokyo office', 'img/office-14.jpg', 'located in Tokyo Japan', 'JP', '', 'Tokyo', '7890-567', 'japan@gmia.com', 'tokyo', 4, 30000, ''),
(6, 'teji', 'img/office-15.jpg', '', 'CN', '', 'i', 'jij', 'ij@jio.om', 'ij', 0, 0, ''),
(7, 'Manila office', 'img/office-2.jpg', 'located in Manila Philippines', 'PH', '', 'Manila 234', '89-1234-112', 'manila@gmail.com', 'manila', 8, 30000, ''),
(8, 'TENJIN office in Fukuoka', 'img/office-11.jpeg', 'located in Tenjin Fukuoka.', 'JP', '', 'tenjin 15', '123', 'tenjin@gmail.com', 'tenjin', 9, 12000, ''),
(9, 'Cebu city office', 'img/office-6.jpg', 'located in Cebu city Cbelji.', 'PH', '', 'Cebu', 'j', 'ojoij@ljlk.comlk', 'o', 5, 15000, ''),
(11, 'Gold Coast office', 'img/office-13.jpg', 'in Gold Coast', 'AU', '', 'Gold Coast', '69780-78', 'kjoeioa@kjoie.com', 'j', 4, 50000, ''),
(12, 'ijoiej', 'img/office-17.jpg', '', 'CG', '', 'ijaoij', 'oijoij', 'oijoij@ij.om', 'j', 0, 0, ''),
(13, 'Tokyo office', 'img/office-3.jpg', 'located in Tokyo.', 'JP', '', 'Shibuya 134', '890-3456', 'jiofe@ljc.om', 'j', 8, 18000, ''),
(14, 'Osaka office', 'img/office-4.jpg', 'located in Osaka.', 'JP', '', 'Umeda 9031', '123-7890', 'jiofe@ljc.omk', 'k', 14, 19000, ''),
(15, 'Maribago office', 'img/office-5.jpg', 'located in Maribago Cebu.', 'PH', '', 'cebu', '6780-86', 'kjeiof@ig.com', 'a', 6, 9900, ''),
(16, 'Okinawa office', 'img/office-6.jpg', 'in Naha.', 'JP', '', 'Naha 12-10', '098-956-2345', 'okinawa@okinawa.com', 'p', 4, 19000, ''),
(17, 'Sydney Office', 'img/office-6.jpg', 'located nearby the seaport around the Opera house.', 'AU', '', 'Sydney 1234', '890-5678', 'aus@gmail.com', 'aus', 15, 19000, ''),
(18, 'Fiji Nadi office', 'img/office-9.jpg', 'Located in Nadi. ', 'FJ', '', 'Nadi 123', '123', 'fiji.nadi@gmail.com', 'fiji', 200, 2147483647, ''),
(19, 'UK office', '', '', 'GB', '', 'London 123', '890-128490', 'uk@gmail.com', 'uk', 2, 40000, ''),
(20, 'New Okinawa office', 'img/office-2.jpg', 'Located in heart of Naha.', 'JP', '', 'Naha 123-13', '098-956-4567', 'okinawa.new@gmail.com', 'okinawa', 4, 8000, ''),
(22, '456', '', '', 'IS', '', '', '', '567@ijio.com', '123', 0, 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `User`
--

CREATE TABLE `User` (
  `loginID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userPic` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `User`
--

INSERT INTO `User` (`loginID`, `userName`, `phoneNumber`, `email`, `password`, `userPic`, `status`) VALUES
(1, 'admin', '12345', 'admin@gmail.com', 'admin', '', 'A'),
(2, 'test', 'r78', 'jife@ijgi.com', '567890', 'img/team-5.jpg', 'U'),
(3, 'yamauchi daichi', '67890', 'daichi@jie.com1234', 'daichi', 'img/team-1.jpg', 'U'),
(17, 'Sachiko', '567890-45', 'sachiko@gmail.com', 'sachiko', 'img/team-2.jpg', 'U'),
(20, 'Shoya', '567890-45', 'shoya@gmail.com', 'shoya', 'img/team-3.jpg', 'U'),
(21, 'Keiko', '567890-45', 'keiko@gmail.com', 'keiko', 'img/team-4.jpg', 'U'),
(22, 'Masanori', '567890-45', 'masanori@gmail.com', 'masanori', 'img/team-5.jpg', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idnum`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officeID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `idnum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
