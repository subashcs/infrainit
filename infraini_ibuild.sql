-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2018 at 01:05 PM
-- Server version: 10.1.35-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infraini_ibuild`
--

-- --------------------------------------------------------

--
-- Table structure for table `architects`
--

CREATE TABLE `architects` (
  `u_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_des` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `architects`
--

INSERT INTO `architects` (`u_id`, `company_name`, `company_des`) VALUES
(13, 'rajan architects', 'we provide best architects for you here   these are high quality'),
(14, 'Sushil hardwares', 'We supply basic building materials'),
(15, 'Sushil hardwares', 'we supply basic buiding materials');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `u_id` int(11) NOT NULL,
  `user_views` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `total_bought` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`u_id`, `user_views`, `total_bought`) VALUES
(1, 'Hello this is me ram sharma and i use infrainit for allocating resource for infrastructures i am responsible to build.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `citizenship_no` varchar(100) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `esewa` varchar(100) DEFAULT NULL,
  `cardnum` int(5) DEFAULT NULL,
  `cardcode` int(11) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `metropolitan` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `oda` int(11) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `deleted_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `u_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `metropolitan` varchar(50) NOT NULL,
  `oda` int(11) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deny_reasons`
--

CREATE TABLE `deny_reasons` (
  `order_id` int(11) NOT NULL,
  `reason` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house_arc`
--

CREATE TABLE `house_arc` (
  `house_id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `architecture` varchar(200) NOT NULL,
  `provider` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `description` varchar(500) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `livingrooms` int(11) NOT NULL,
  `bedrooms_desc` varchar(500) NOT NULL,
  `livingrooms_desc` varchar(500) NOT NULL,
  `washrooms_desc` varchar(500) NOT NULL,
  `floors` int(11) NOT NULL,
  `garden` varchar(300) NOT NULL,
  `garagebays` int(11) NOT NULL,
  `garage_desc` varchar(300) NOT NULL,
  `estim_budget` decimal(10,0) NOT NULL,
  `length` int(11) NOT NULL,
  `bredth` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_arc`
--

INSERT INTO `house_arc` (`house_id`, `name`, `architecture`, `provider`, `phone`, `description`, `bedrooms`, `bathrooms`, `livingrooms`, `bedrooms_desc`, `livingrooms_desc`, `washrooms_desc`, `floors`, `garden`, `garagebays`, `garage_desc`, `estim_budget`, `length`, `bredth`, `date`, `likes`, `dislikes`) VALUES
(1, 'Nepali traditional house', 'Traditional Newari', 13, '+9779860427421', 'This represents traditional Newari culture house.It has cultural representing carvings on the doors and walls', 4, 1, 1, 'Bedrooms are provided with special ventilators.', 'A large living room is provided.', 'The washrooms are spacious and  4*3 m large.', 3, 'The garden is located in 4 sq m area right in fron of the house with passage in betweeen.', 2, 'The garage area is 3*2 m  with about 2 cars and 1 bike parking area.', '205000', 14, 4, '2018-04-21 19:42:14', 1, 1),
(29, 'Casa Quan', 'Contemporary', 1, '+9779860427421', 'High-profile Dutch firm MVRDV recently unveiled the enviable Casa Kwantes. A contemporary take on 1930s modernist design, the Rotterdam-based home boasts a curved glazed facade and energy-efficient tech.\r\n\r\nThe 480 sq m (5,166 sq ft) family house is spread over two main floors, plus a small basement.Naturally, the unusual shape of the glazed facade means the interior of the home is pretty unconventional. The curved shape also offers a visual link between different areas of the houses.', 3, 1, 1, '2 on each floor', 'A large at house center', 'en-suite Bathroom', 2, 'Not available inside', 2, 'Can hold 2 cars', '4000000', 25, 20, '2018-04-21 19:42:14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `house_arc_likes`
--

CREATE TABLE `house_arc_likes` (
  `like_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_arc_likes`
--

INSERT INTO `house_arc_likes` (`like_id`, `house_id`, `user_id`, `liked`) VALUES
(84, 1, 13, 1),
(89, 29, 1, 1),
(92, 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE `house_images` (
  `image_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_images`
--

INSERT INTO `house_images` (`image_id`, `house_id`, `image`) VALUES
(1, 1, 'tradhouse.jpg'),
(16, 1, 'Infra.jpg'),
(8, 29, '2017-best-houses-62.jpg'),
(9, 29, 'casa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `infra_login`
--

CREATE TABLE `infra_login` (
  `rand` varchar(1000) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infra_login`
--

INSERT INTO `infra_login` (`rand`, `u_id`) VALUES
('21d584152d5efca6a6cc6c2dcbdfbd39', 13),
('2691996adc3fa94e5112362929513639', 13),
('9f275cd542ebc6ab1e881e1513c19fa2', 13),
('4cf5dedefc35e21d11839a731d741313', 13),
('6e49b3e893d635c0928c25ebcb7dfef8', 13),
('07d31a6ee75eb61a7f666a10d79fb314', 13),
('ab164f63c395db79ee66af1bdc8d2c4f', 13),
('80f52337aceb4a99585c86657513a11b', 13),
('b0c90c9eb501f9e36209a2ec1962cd42', 13),
('0ea875fc4345eac3d28216a1de5611df', 13),
('c4dc363ac2075ddb4efba669a8a24955', 13),
('26eef070a3d918bbfc411fcdf1ce99df', 13),
('05d6e58bea0a11f2e99bc7a8c759b3e0', 1),
('82c3b16583a131c17b7750beadb12cb3', 10),
('d4dc23138bdd8a644844472b30d1941d', 1),
('841641f3d37e0e0d082e1aa92388a11f', 10),
('e4dcc57682d86ebab2210c137f2401b8', 10),
('d7be10c52ce22510cbfcc85de366378f', 14),
('00dd4190465e2d9316a0495f114697da', 15),
('9c20601d3fdf776a92fb33be31cb4be5', 16),
('312b6d5196b47a70c95ec76e7dc88b23', 16),
('607a26d67c6d6f858fb9cc106cd12b8c', 16),
('4afd2dd1bb4100739688e6e8d376d92b', 16),
('bdc02345582646fdba70fef8a3efc79b', 16),
('ff043a51c4dcd66a618620bbc05c721a', 10),
('e6adfb8668f0e0864751f5df2b8e5805', 10),
('51f3b82fc14ca499e68f8f59b78f886a', 10),
('6f05c3e7890c740634d65f8e0774862e', 10),
('aca536d220e3e57fb0e5e078157e5ede', 16);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `email`, `fname`, `lname`, `subject`) VALUES
(2, 'subashsapkota59@gmail.com', 'subash ', 'sapkota', 'hello it is a test of how this feature works'),
(3, 'Randy@TalkWithLead.com', 'Randy', 'Sinclair', 'Hi,\r\n\r\nMy name is Randy and I was looking at a few different sites online and came across your site infrainit.com.  I must say - your website is very impressive.  I found your website on the first page of the Search Engine. \r\n\r\nHave you noticed that 70 percent of visitors who leave your website will never return?  In most cases, this means that 95 percent to 98 percent of your marketing efforts are going to waste, not to mention that you are losing more money in customer acquisition costs than you need to.\r\n \r\nAs a business person, the time and money you put into your marketing efforts is extremely valuable.  So why let it go to waste?  Our users have seen staggering improvements in conversions with insane growths of 150 percent going upwards of 785 percent. Are you ready to unlock the highest conversion revenue from each of your website visitors?  \r\n\r\nTalkWithLead is a widget which captures a website visitorâ€™s Name, Email address and Phone Number and then calls you immediately, so t'),
(4, 'SusanDl9d@gmail.com', 'Susan', 'Williams', 'Hello, after visiting your website I wanted to let you know that we work with businesses like yours to publish a custom made promotional & marketing video that features your company online.\r\n \r\nThis video would tell the story of your company.\r\n \r\nThe 90 second video below shows you what this custom made video can do for your business.\r\n \r\nTo watch the video please visit:\r\nhttps://www.videopromodeals.com/?=infrainit.com\r\n \r\nVisit today, and weâ€™ll send you a free marketing report for your company.\r\n \r\nThanks for your time.\r\n \r\nSincerely,\r\n \r\n-Susan Davis\r\nVideo Marketing Affiliate \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n- This is a commercial message from PJLK marketing LC\r\n4470 W Sunset Blvd #91359\r\nLos Angeles, CA 90027\r\n \r\nTo permanently remove any future messages from us:  https://stop-marketing.top/?site=infrainit.com\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `available_amnt` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ext_details` varchar(1000) NOT NULL,
  `f_image` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0',
  `sales` int(11) NOT NULL DEFAULT '0',
  `manufacturer` varchar(300) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `material_name`, `category`, `available_amnt`, `user_id`, `ext_details`, `f_image`, `date`, `likes`, `sales`, `manufacturer`, `deleted`) VALUES
(1, 'Infrainit Blocks', 'blocks', '100002 units', 10, '', 'stacked-cinder-blocks.jpg', '2018-03-30 00:00:00', 0, 0, 'Infrainit Suppliers', 0),
(2, 'Infrainit cement', 'Cement', '20000 kg', 10, '', 'constr.jpg', '2018-03-30 00:00:00', 1, 0, 'Infrainit Suppliers', 0),
(3, 'Infrainit Rods', 'rods', '12000 meter', 10, 'Infrainit rods are the best in quality you get!!                                                                                                                                                                                                                                                                                        ', 'b19metals087.jpg', '2018-03-30 00:00:00', 1, 0, 'Infrainit iron suppliers', 0),
(4, 'Infrainit flat rods', 'rods', '2000 meter', 10, '', 'flat.jpg', '2018-04-08 00:00:00', 0, 0, 'Safal suppliers', 1),
(5, 'Infrainit black mud bricks', 'bricks', '20030 units', 10, 'Add material details                                          ', '2108200315140021.jpg', '2018-04-08 00:00:00', 1, 0, 'Brisky Bricks Suppliers', 0),
(7, 'Infrainit rods', 'rods', '10000 meters', 10, 'Infrainit rods are provided with great strengths.\r\n                                                              ', 'flat11.jpg', '2018-04-09 00:00:00', 0, 0, 'Infrainit rods manufacturer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_like`
--

CREATE TABLE `items_like` (
  `like_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `liker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_like`
--

INSERT INTO `items_like` (`like_id`, `item_id`, `liker`) VALUES
(14, 1, 1),
(15, 2, 3),
(16, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_sizes`
--

CREATE TABLE `items_sizes` (
  `size_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price_per_unit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_sizes`
--

INSERT INTO `items_sizes` (`size_id`, `material_id`, `size`, `price_per_unit`) VALUES
(1, 1, '30*20*10 cm', 15),
(2, 2, 'fine', 300),
(3, 3, '2 cm radius round', 100),
(4, 4, 'flat 20mm thick ', 340),
(5, 5, '30*15*10', 20),
(6, 7, '4 cm thick', 400);

-- --------------------------------------------------------

--
-- Table structure for table `materials_req`
--

CREATE TABLE `materials_req` (
  `material_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `n_id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `file` varchar(300) NOT NULL,
  `date_c` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dest_url` varchar(500) NOT NULL,
  `for_all` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`n_id`, `topic`, `description`, `file`, `date_c`, `dest_url`, `for_all`) VALUES
(1, 'You are all set.Thanks for joining.', 'Read our documents and user guide for beginning.', '', '2017-09-05 14:23:16', 'blocks/', 1),
(3, 'New Order reclaimation!', '', '', '2017-12-15 17:41:24', 'blocks/orders_show?ord_id=26', 0),
(7, 'One new order', '', '', '2017-12-15 19:41:09', '/ibuild/blocks/orders_show?ord_id=31', 0),
(8, 'this is a test', ' a test is of some value do you know it', '', '2018-02-10 12:28:15', '', 0),
(10, 'hello this tis a test', '', '', '2018-03-14 14:53:48', 'hello@thelo.com', 0),
(11, '', '', '', '2018-03-23 16:53:22', '/ibuild/consult/a_single_question?q_id=23', 0),
(12, '', '', '', '2018-03-23 16:54:17', '/ibuild/consult/a_single_question?q_id=23', 0),
(13, '', '', '', '2018-03-28 16:50:39', '/ibuild/consult/a_single_question?q_id=22', 0),
(14, '', '', '', '2018-03-29 15:53:08', '/ibuild/consult/a_single_question?q_id=23', 0),
(15, '', '', '', '2018-03-29 16:39:24', '/ibuild/consult/a_single_question?q_id=23', 0),
(16, '', '', '', '2018-03-29 16:39:24', '/ibuild/consult/a_single_question?q_id=23', 0),
(17, '', '', '', '2018-03-29 16:39:27', '/ibuild/consult/a_single_question?q_id=23', 0),
(18, '', '', '', '2018-03-29 16:41:45', '/ibuild/consult/a_single_question?q_id=23', 0),
(19, '', '', '', '2018-04-08 14:56:51', '/ibuild/consult/a_single_question?q_id=23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticeuser`
--

CREATE TABLE `noticeuser` (
  `n_id` int(11) NOT NULL,
  `target_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeuser`
--

INSERT INTO `noticeuser` (`n_id`, `target_user`, `date`, `seen`) VALUES
(1, 3, '2017-12-15 09:05:20', 0),
(3, 3, '2017-12-15 18:58:09', 0),
(7, 2, '2017-12-15 19:41:09', 1),
(12, 2, '2018-03-23 16:54:17', 0),
(13, 2, '2018-03-28 16:50:39', 0),
(14, 2, '2018-03-29 15:53:08', 0),
(15, 2, '2018-03-29 16:39:27', 0),
(16, 2, '2018-03-29 16:39:27', 0),
(17, 2, '2018-03-29 16:39:28', 0),
(18, 2, '2018-03-29 16:41:45', 0),
(19, 2, '2018-04-08 14:56:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_to_supp`
--

CREATE TABLE `orders_to_supp` (
  `order_id` int(11) NOT NULL,
  `request_maker_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supply_time` datetime DEFAULT NULL,
  `sent_status` tinyint(1) NOT NULL DEFAULT '0',
  `received_status` tinyint(1) NOT NULL DEFAULT '0',
  `initial_paym_offered` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `denied` tinyint(1) NOT NULL DEFAULT '0',
  `queued` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_to_supp`
--

INSERT INTO `orders_to_supp` (`order_id`, `request_maker_id`, `material_id`, `order_amount`, `size`, `payment_method`, `date`, `supply_time`, `sent_status`, `received_status`, `initial_paym_offered`, `total_price`, `denied`, `queued`) VALUES
(1, 1, 5, 1898, '4*3*2', 'cashondel', '2018-03-21 19:56:53', NULL, 1, 0, 0, 17082, 0, 1),
(2, 1, 7, 124, '6', 'cashondel', '2018-04-13 13:24:47', NULL, 0, 0, 0, 49600, 0, 0),
(3, 11, 5, 2000, '5', 'cashondel', '2018-04-13 14:01:09', NULL, 0, 0, 0, 40000, 0, 0),
(4, 1, 5, 5323, '5', 'cashondel', '2018-08-03 16:58:22', NULL, 0, 0, 0, 106460, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_location`
--

CREATE TABLE `order_location` (
  `order_id` int(11) NOT NULL,
  `gaunnagar` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `oda` int(11) NOT NULL,
  `extradet` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_location`
--

INSERT INTO `order_location` (`order_id`, `gaunnagar`, `street`, `oda`, `extradet`) VALUES
(25, 'baglulng', 'Malika berneta', 4, ''),
(26, 'Baglung', 'Malika -4 berneta', 5, 'Near rice mill');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `email` varchar(300) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`email`, `phone`) VALUES
('laxmisteel@gmail.com', '+9779860427421'),
('tez4274@gmail.com', '9860427421'),
('rajanfist12@gmail.com', '9861922680'),
('sapkotashusil@gmail.com', '9860201143');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `que_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `answer_count` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`que_id`, `u_id`, `question`, `file`, `answer_count`, `date`) VALUES
(21, 1, 'Hello everyone I want to build a house under minimum budget around 5 lakhs in kaski district  hill area. Can anyone provide suggestions for some earthquake resistant house. If architectures could be provided with contact it will be highly appreciated.Thank you!!', NULL, 0, '2018-04-08 13:37:21'),
(23, 2, 'Hello this is a question yes it is test of how this code works on my page and i am having my thumb and fingers excercise right now by typing this.\r\n?>', NULL, 1, '2018-04-08 13:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `queries_answers`
--

CREATE TABLE `queries_answers` (
  `ans_id` int(11) NOT NULL,
  `answerer_id` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `que_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries_answers`
--

INSERT INTO `queries_answers` (`ans_id`, `answerer_id`, `answer`, `file`, `que_id`, `date`) VALUES
(1, 10, 'This is a test answer i down', 'constr.jpg', 23, '2018-04-08 14:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `recover_pass`
--

CREATE TABLE `recover_pass` (
  `recover_code` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `s_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`s_id`, `email`) VALUES
(3, ''),
(1, 'me@gmail.com'),
(2, 'yoursgd@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `u_id` int(11) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `company_des` varchar(700) NOT NULL,
  `likes` int(11) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`u_id`, `pan_no`, `company_name`, `company_des`, `likes`, `latitude`, `longitude`) VALUES
(2, '', 'Binit hardware companies nepal', '   a very good hardware company in Nepal                                                                  ', 0, '27.701904900000002', '85.3229652'),
(3, '', 'Ambe suppliers', 'this is one of the biggest providing company', 0, '', ''),
(10, '198928310', 'Infrainit Construction material Suppliers', 'This company belongs to infrainit.com and is the supplier under infrainit', 0, '27.7017867', '85.32303859999999'),
(16, '17372', 'Sushil hardwares', 'We supply basic buiding materials', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supply_regions`
--

CREATE TABLE `supply_regions` (
  `reg_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `supply_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_regions`
--

INSERT INTO `supply_regions` (`reg_id`, `material_id`, `supply_region`) VALUES
(1, 8, 'kathmandu'),
(2, 4, 'malika'),
(3, 5, 'Kathmandu'),
(4, 5, 'Chitwan'),
(5, 5, 'Baglung'),
(6, 2, 'Chitwan'),
(7, 2, 'Gorkha'),
(8, 3, 'Sarlahi'),
(9, 3, 'Dhading'),
(10, 3, 'Gorkha'),
(11, 3, 'Lamjung'),
(12, 3, 'Myagdi'),
(13, 3, 'Baglung'),
(14, 4, 'Solukhumbu'),
(15, 4, 'Kathmandu'),
(16, 4, 'Gorkha'),
(17, 7, 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `temp_usersi`
--

CREATE TABLE `temp_usersi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `district` varchar(50) NOT NULL,
  `metropolitan` varchar(50) NOT NULL,
  `oda` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `estd` date NOT NULL,
  `password` varchar(600) NOT NULL,
  `cardnum` int(16) NOT NULL,
  `cardcode` int(3) NOT NULL,
  `esewa` varchar(100) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `company_des` varchar(700) NOT NULL,
  `confirm_code` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_usersi`
--

INSERT INTO `temp_usersi` (`id`, `name`, `email`, `phone`, `category`, `pan_no`, `DOB`, `district`, `metropolitan`, `oda`, `street`, `estd`, `password`, `cardnum`, `cardcode`, `esewa`, `company_name`, `company_des`, `confirm_code`) VALUES
(5, 'Pratistha Basnet', 'yoursgod@outlook.com', '9860427421', 'architect', '', '2004-07-14', 'Kaski', 'pokhara', 4, 'srijana chowk', '0000-00-00', 'b4caefa3d450d0e36e183160d17aba24', 0, 0, '', 'Pratistha architects', 'Pratistha architect provides designs for infrastructures , interior housing designs and many more.', 'e89c35e2b9adfec209faeecb8ac218a7'),
(6, 'Rocky Mishra', 'rkymishra49@gmail.com', '9849983613', 'customer', '', '1998-01-07', 'Saptari', 'Rajbiraj', 3, 'Rajbiraj', '0000-00-00', 'eb86ff2b6caec19e2677b8e647f8122c', 2147483647, 123, '98949983613', '', '', 'e034b67dbf24e28ee27a666048bbfdce');

-- --------------------------------------------------------

--
-- Table structure for table `usersi`
--

CREATE TABLE `usersi` (
  `u_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `citizenship_no` varchar(25) NOT NULL,
  `image` varchar(500) NOT NULL,
  `website` varchar(300) NOT NULL,
  `role` varchar(40) NOT NULL,
  `cardnum` int(30) NOT NULL,
  `cardcode` int(5) NOT NULL,
  `esewa` varchar(100) NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `district` varchar(50) NOT NULL,
  `metropolitan` varchar(50) NOT NULL,
  `oda` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `committed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersi`
--

INSERT INTO `usersi` (`u_id`, `name`, `email`, `password`, `DOB`, `citizenship_no`, `image`, `website`, `role`, `cardnum`, `cardcode`, `esewa`, `subscribed`, `district`, `metropolitan`, `oda`, `street`, `committed`) VALUES
(1, 'Ram sharma', 'subashsapkota59@gmail.com', 'b4caefa3d450d0e36e183160d17aba24', '1999-02-23', '214748364755', 'artificial-intelligence.jpg', 'http://subashcs.com.np', 'customers', 0, 0, '', 0, 'Baglung  ', 'Baglung', 5, 'Malikaa', 1),
(2, 'Hari kc', 'laxmisteel@gmail.com', '', '2010-07-11', '21474836479434', 'Natural-Language-Processing-Definition-1.jpg', 'http://subashcs.com.np', 'suppliers', 0, 0, '', 0, 'baglung', 'asdfas', 2, 'sakjdfls', 1),
(3, 'ambe cement', 'ambecement@gmail.com', '', '2007-07-19', '797979799', 'ai.jpg', 'http://subashcs.com.np', 'suppliers', 0, 0, '', 0, 'klajsdklasdfjsalkf ', 'asdfas', 2, 'sakjdfls', 1),
(4, 'Ram Shankar Acharya', 'ramshank@gmail.com', 'ram@123', '2007-01-24', '92347927332423', 'ramimage.jpg', 'www.ram.com', 'suppliers', 0, 0, '', 1, '', '', 0, '', 1),
(10, 'infrainit supplier', 'tez4274@gmail.com', '544e8beeffa2761edb0e042d27614c3e', '0000-00-00', '', '3-construction-company-business-license-pitfalls-sm.jpg', '', 'suppliers', 0, 0, '', 0, 'Kathmandu', 'kathmandu', 32, 'putalisadak', 1),
(13, 'Rajan Sapkota', 'rajanfist12@gmail.com', '2151e46894a0442ad73162a6683274db', '2011-04-16', '', '20180429_170405.jpg', 'http://www.rajan23.com.np', 'architects', 0, 0, '', 0, 'Baglung   ', 'Baglung Municipality', 5, 'Malika berneta', 1),
(16, 'Sushil Sapkota', 'sapkotashusil@gmail.com', '912ec803b2ce49e4a541068d495ab570', '0000-00-00', '', 'ef6abc2e98b6f45b7f79589d012d047f.jpg', '', 'suppliers', 0, 0, '', 0, 'Baglung', 'Baglung', 4, 'Upallachaur ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `architects`
--
ALTER TABLE `architects`
  ADD KEY `id` (`u_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `deny_reasons`
--
ALTER TABLE `deny_reasons`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `house_arc`
--
ALTER TABLE `house_arc`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `provider` (`provider`);

--
-- Indexes for table `house_arc_likes`
--
ALTER TABLE `house_arc_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_as_house_liker_fk` (`user_id`),
  ADD KEY `house_as_house_fk` (`house_id`);

--
-- Indexes for table `house_images`
--
ALTER TABLE `house_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `infra_login`
--
ALTER TABLE `infra_login`
  ADD PRIMARY KEY (`rand`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_items_user` (`user_id`);

--
-- Indexes for table `items_like`
--
ALTER TABLE `items_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `items_sizes`
--
ALTER TABLE `items_sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `fk_item_size` (`material_id`);

--
-- Indexes for table `materials_req`
--
ALTER TABLE `materials_req`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `house_material` (`house_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `noticeuser`
--
ALTER TABLE `noticeuser`
  ADD PRIMARY KEY (`n_id`,`target_user`),
  ADD KEY `target_user_fk` (`target_user`);

--
-- Indexes for table `orders_to_supp`
--
ALTER TABLE `orders_to_supp`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_fk` (`request_maker_id`),
  ADD KEY `material_fk` (`material_id`) USING BTREE;

--
-- Indexes for table `order_location`
--
ALTER TABLE `order_location`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD KEY `phone_email_fk` (`email`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `queries_answers`
--
ALTER TABLE `queries_answers`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `answerer_user_fk` (`answerer_id`),
  ADD KEY `query_ans_fk` (`que_id`);

--
-- Indexes for table `recover_pass`
--
ALTER TABLE `recover_pass`
  ADD PRIMARY KEY (`recover_code`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD UNIQUE KEY `u_id` (`u_id`);

--
-- Indexes for table `supply_regions`
--
ALTER TABLE `supply_regions`
  ADD UNIQUE KEY `unique` (`reg_id`);

--
-- Indexes for table `temp_usersi`
--
ALTER TABLE `temp_usersi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usersi`
--
ALTER TABLE `usersi`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house_arc`
--
ALTER TABLE `house_arc`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `house_arc_likes`
--
ALTER TABLE `house_arc_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `house_images`
--
ALTER TABLE `house_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items_like`
--
ALTER TABLE `items_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items_sizes`
--
ALTER TABLE `items_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materials_req`
--
ALTER TABLE `materials_req`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders_to_supp`
--
ALTER TABLE `orders_to_supp`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `queries_answers`
--
ALTER TABLE `queries_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supply_regions`
--
ALTER TABLE `supply_regions`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `temp_usersi`
--
ALTER TABLE `temp_usersi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersi`
--
ALTER TABLE `usersi`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`u_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_arc`
--
ALTER TABLE `house_arc`
  ADD CONSTRAINT `house_arc_ibfk_1` FOREIGN KEY (`provider`) REFERENCES `usersi` (`u_id`);

--
-- Constraints for table `house_arc_likes`
--
ALTER TABLE `house_arc_likes`
  ADD CONSTRAINT `house_as_house_fk` FOREIGN KEY (`house_id`) REFERENCES `house_arc` (`house_id`),
  ADD CONSTRAINT `user_as_house_liker_fk` FOREIGN KEY (`user_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_user` FOREIGN KEY (`user_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `items_sizes`
--
ALTER TABLE `items_sizes`
  ADD CONSTRAINT `fk_item_size` FOREIGN KEY (`material_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials_req`
--
ALTER TABLE `materials_req`
  ADD CONSTRAINT `house_material` FOREIGN KEY (`house_id`) REFERENCES `house_arc` (`house_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `noticeuser`
--
ALTER TABLE `noticeuser`
  ADD CONSTRAINT `target_user_fk` FOREIGN KEY (`target_user`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_notice_fk` FOREIGN KEY (`n_id`) REFERENCES `notices` (`n_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_email_fk` FOREIGN KEY (`email`) REFERENCES `usersi` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
