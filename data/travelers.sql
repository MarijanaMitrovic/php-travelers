-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 05:27 PM
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
-- Database: `travelers`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `last_name`, `bio`, `photo`) VALUES
(1, 'Marijana', 'Mitrovic', 'My name is Marijana Mitrovic. I was born on 12.07.1996. At the moment, I am a student of ICT College in Belgrade. This web site was made for Practicum PHP.', 'assets/images/users/admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_travel` date NOT NULL,
  `persons` int(5) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fname`, `lname`, `date_of_travel`, `persons`, `destination_id`, `user_id`, `note`, `email`) VALUES
(8, 'For', 'Someone', '2019-06-25', 1, 1, 5, 'NOTE', 'some@gmail.com'),
(9, 'Vlad', 'Mitrovic', '2019-09-12', 2, 9, 5, 'Noyettetetete', 'vlad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE `continent` (
  `id` int(11) NOT NULL,
  `cont_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`id`, `cont_name`) VALUES
(1, 'Europe'),
(2, 'Asia'),
(3, 'Australia'),
(4, ' North & South America');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  `hot` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `picture`, `price`, `continent_id`, `hot`) VALUES
(1, 'Santorini, Greece', 'Did you know that the whole complex of Santorini islands is still an active volcano (the same as Méthana, Mílos and Nísiros) and probably the only volcano in the world whose crater is in the sea?\r\nSantorini is considered to be the most sought after place for a romantic getaway in Greece, since there are not many places in the world where you can enjoy exquisitely clear waters while perched on the rim of a massive active volcano in the middle of the sea! The island has a growing reputation as a “wedding destination” for couples not only from Greece but from all over the world.', 'assets/images/01-greece.jpg', 590, 1, 'yes'),
(2, 'Rome, Italy', 'A heady mix of haunting ruins, awe-inspiring art and vibrant street life, Italy’s hot-blooded capital is one of the world’s most romantic and charismatic cities.A trip to Rome is as much about lapping up the dolce vita lifestyle as gorging on art and culture. Idling around picturesque streets, whiling away hours at streetside cafes, people-watching on pretty piazzas – these are all central to the Roman experience. The tempo rises in the evening when fashionable drinkers descend on the city’s bars and cafes for a sociable aperitivo (drink with snacks) and trattorias hum with activity. Elsewhere, cheerful hordes mill around popular haunts before heading off to hip cocktail bars and late-night clubs.', 'assets/images/02-rome.jpg', 490, 1, 'yes'),
(3, 'Mount Fuji, Japan', 'Mount Fuji (富士山, Fujisan) is with 3776 meters Japan\'s highest mountain. It is not surprising that the nearly perfectly shaped volcano has been worshiped as a sacred mountain and experienced big popularity among artists and common people throughout the centuries.\r\nIf you want to enjoy Mount Fuji at a more leisurely pace and from a nice natural surrounding, you should head to the Fuji Five Lake (Fujigoko) region at the northern foot of the mountain, or to Hakone, a nearby hot spring resort. Mount Fuji is officially open for climbing during July and August via several routes.', 'assets/images/03-japan.jpg', 1690, 2, 'yes'),
(4, 'Dubai, UAE', 'From the timeless tranquillity of the desert to the lively bustle of the souk, Dubai offers a kaleidoscope of attractions for visitors.\r\n \r\nThe emirate embraces a wide variety of scenery in a very small area. In a single day, the tourist can experience everything from rugged mountains and awe-inspiring sand dunes to sandy beaches and lush green parks, from dusty villages to luxurious residential districts and from ancient houses with wind towers to ultra-modern shopping malls.\r\n \r\nThe emirate is both a dynamic international business centre and a laid-back tourist escape; a city where the sophistication of the 21st century walks hand in hand with the simplicity of a bygone era. But these contrasts give Dubai its unique flavour and personality; a cosmopolitan society with an international lifestyle, yet with a culture deeply rooted in the Islamic traditions of Arabia.', 'assets/images/04-dubai.jpg', 1090, 2, 'yes'),
(5, 'London, UK', 'One of the world\'s most visited cities, London has something for everyone: from history and culture to fine food and good times. London is as much about wide-open vistas and leafy landscape escapes as it is high-density, sight-packed urban exploration. Central London is where the major museums, galleries and most iconic sights congregate, but visit Hampstead Heath or the Queen Elizabeth Olympic Park to flee the crowds and frolic in wide open green expanses. You can also venture further out to Kew Gardens, Richmond or Hampton Court Palace for beautiful panoramas of riverside London followed by a pint in a quiet waterside pub.', 'assets/images/05-london.jpg', 690, 1, 'yes'),
(6, 'Sydney, Australia', 'Enjoy Sydney’s natural beauty, from unspoilt beaches to public gardens and, of course, the sparkling harbour, before discovering its thriving restaurants, markets and ancient culture. Top it off with a trip to the Blue Mountains , a popular excursion among locals. There are plenty of reasons to love Bondi Beach. Just minutes from the city centre, you can immerse yourself in \"Bondi Bubble\". You\'ll find incredible surfing, fantastic cafes and restaurants, designer shops and plenty to keep you busy. Join the locals for a casual stroll along the  - one of Sydney’s most scenic treks.', 'assets/images/06-australia.jpg', 2790, 3, 'yes'),
(7, 'Paris, France', 'Paris\' monument-lined boulevards, museums, classical bistros and boutiques are enhanced by a new wave of multimedia galleries, creative wine bars, design shops and tech start-ups. The cloud-piercing, wrought-iron Eiffel Tower, broad Arc de Triomphe guarding the glamorous avenue des Champs-Élysées, flying buttressed Notre Dame cathedral, lamplit bridges spanning the Seine and art nouveau cafes\' wicker-chair-lined terraces are enduring Parisian emblems. Despite initial appearances, however, Paris’ cityscape isn’t static: there are some stunning modern and contemporary icons, too, from the inside-out, industrial-style Centre Pompidou to the mur végétal (vertical garden) gracing the Musée du Quai Branly, the glass sails of the Fondation Louis Vuitton contemporary-art centre, and the gleaming steel egg-shaped concert venue La Seine Musicale.', 'assets/images/07-paris.jpg', 650, 1, 'yes'),
(8, 'Bali, Indonesia', 'Bali is the most popular island holiday destination in the Indonesian archipelago. The island’s home to an ancient culture that\'s known for its warm hospitality. Exotic temples and palaces set against stunning natural backdrops are some of its top attractions. Dining in Bali presents endless choices of local or far-flung cuisine. After sunset, famous nightspots come to life offering exciting clubbing and packed dance floors. Inland, towering volcanoes and pristine jungles greet you with plenty to see and do. Most can\'t stay away from the beach for long, though. Enjoy amazing beach resorts and luxury resorts in any of Bali’s famous areas. These include Kuta, Seminyak and Jimbaran where most of the great hotels and villas are right on the beach. They’re also home to most of Bali’s exciting surf spots. For tranquil seascapes and sunrises, the eastern beach resorts are your best bets. These include Sanur, Nusa Dua and the remote coast of Candidasa are your best bets. It also offers plenty for adventure-seekers and shopaholics. Picturesque mountain jogging tracks are within a short walk from designer boutique and chic cafe-lined streets. Sightseeing opportunities in Ubud are virtually endless. The town itself is densely dotted with a multitude of ancient temples, palaces and historical sites. ', 'assets/images/08-bali.jpg', 1390, 2, 'no'),
(9, 'Playa del Carmen, Mexico', 'Playa del Carmen has recently undergone extreme rapid development with new luxury residential condominium buildings, restaurants, boutiques and entertainment venues. Tourist activity in Playa del Carmen centers on Quinta Avenida, or Fifth Avenue, which stretches from Calle 1 norte to Calle 40. A pedestrian walkway located just one or two blocks inland from the beach, Fifth Avenue is lined with hundreds of shops, bars and restaurants. There are many small boutique hotels on and just off Fifth Avenue and on the beach. Playa del Carmen is known mainly for white sand beaches, turquoise waters, and a laid back bohemian vibe. Not too long ago it was a fishing village but has now become the #1 destination in Mexico.', 'assets/images/09-mexico.jpg', 1890, 4, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `impression` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_photo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `impression`, `photo`, `user_id`, `org_photo`) VALUES
(1, 'We went to Alpes last month via Travelers, that was such an amazing experience! Discovering new culture, meeting new people, I just can say - that was well organized trip. ', 'assets/images/img_2.jpg', 1, 'assets/images/img_2.jpg'),
(3, 'Last month we went to Mexico via Travelers. Awesome trip, a lot of exploring, snorkling and swimming. The best possible for this price.', 'assets/images/experiences/new_1560465882playa.jpeg', 5, 'assets/images/experiences/1560465882playa.jpeg'),
(4, 'Came back from Rome few days ago. I just have no word for this city, full organisation and everything this agency offered to us. Can\'t wait next trip!', 'assets/images/experiences/new_1560466275romeeeee.jpg', 8, 'assets/images/experiences/1560466275romeeeee.jpg'),
(5, 'Loving Paris and can\'t wait next trip!', 'assets/images/experiences/new_1560815319paris.jpg', 10, 'assets/images/experiences/1560815319paris.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_blocks`
--

CREATE TABLE `home_blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_blocks`
--

INSERT INTO `home_blocks` (`id`, `title`, `image`, `href`) VALUES
(1, 'Write down your experience', 'assets/images/img_2.jpg', 'index.php?page=user'),
(2, 'Book a tour with us', 'assets/images/img_3.jpg', 'index.php?page=booking');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `path`) VALUES
(3, 'Home', 'index.php?page=home'),
(4, 'Destinations', 'index.php?page=destinations'),
(7, 'Author', 'index.php?page=author');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`) VALUES
(1, 'Never stop exploring', 'For all who love adventures and active holidays', 'assets/images/hero_bg_1.jpg'),
(2, 'Love the places', 'Discover hidden beauties of our planet', 'assets/images/hero_bg_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`, `role_id`) VALUES
(1, 'Marijana', 'Mitrovic', 'marijana1207@admin.com', '6c9cdce9f6d927cea4c621b33ca05013', '2019-06-04 00:00:00', 1),
(2, 'Perica', 'Peric', 'perica@gmail.com', '084414d6a7b8487a0e663e27b2b773ba', '2019-06-06 18:43:50', 2),
(5, 'Vladimir', 'Mitrovic', 'vladimir@gmail.com', '4a9b9f853b5684564b41acbda21c676c', '2019-06-12 15:11:45', 2),
(7, 'Neko', 'Ime', 'nesto@gmail.com', '75d32b3aa6f034695e950f1edbc88c74', '2019-06-12 15:24:08', 2),
(8, 'John', 'Smith', 'johnsmith@gmail.com', 'cd4388c0c62e65ac8b99e3ec49fd9409', '2019-06-14 00:45:31', 2),
(10, 'Neki', 'Korisnik', 'neko@gmail.com', '75d32b3aa6f034695e950f1edbc88c74', '2019-06-18 01:46:52', 2),
(11, 'sgsgssss', 'shshshshs', 'sahahha@gmail.com', '640abc3193814a21312a71cb49ab1711', '2019-06-18 17:18:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blocks`
--
ALTER TABLE `home_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_blocks`
--
ALTER TABLE `home_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
