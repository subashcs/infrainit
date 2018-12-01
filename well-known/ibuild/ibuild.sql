-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 05:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibuild`
--

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
(1, 'add your views about the designs of the infrastructures you like', 3),
(9, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_items`
--

CREATE TABLE `deleted_items` (
  `id` int(11) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `category` int(50) NOT NULL,
  `available_amnt` int(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_per_unit` varchar(100) NOT NULL,
  `ext_details` varchar(1000) NOT NULL,
  `f_image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `manufacturer` varchar(300) NOT NULL,
  `deleted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_items`
--

INSERT INTO `deleted_items` (`id`, `material_name`, `category`, `available_amnt`, `user_id`, `price_per_unit`, `ext_details`, `f_image`, `date`, `likes`, `sales`, `manufacturer`, `deleted_date`) VALUES
(5, 'Strong bounty bricks', 0, 100000, 2, '9', '', 'hydro-energy.jpg', '2018-03-18 00:00:00', 0, 0, 'Hari Hardware Suppliers', '2018-03-21 14:53:00');

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
  `bedrooms` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `livingrooms` int(11) NOT NULL,
  `floors` int(11) NOT NULL,
  `garden` tinyint(1) NOT NULL DEFAULT '0',
  `Garagebays` int(11) NOT NULL,
  `estim_budget` decimal(10,0) NOT NULL,
  `area` int(11) NOT NULL COMMENT 'in square meter',
  `dimension` varchar(50) NOT NULL COMMENT 'in meter',
  `image` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_arc`
--

INSERT INTO `house_arc` (`house_id`, `name`, `architecture`, `bedrooms`, `beds`, `bathrooms`, `livingrooms`, `floors`, `garden`, `Garagebays`, `estim_budget`, `area`, `dimension`, `image`, `likes`, `dislikes`) VALUES
(1, 'Nepali traditional house', 'Traditional Newari', 3, 8, 1, 0, 0, 0, 0, '200000', 54, '9 m * 6 m', 'tradhouse.jpg', 1, 1);

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
(4, 1, 1, 0),
(6, 1, 2, 1);

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
  `price_per_unit` varchar(100) NOT NULL,
  `ext_details` varchar(1000) NOT NULL,
  `f_image` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0',
  `sales` int(11) NOT NULL DEFAULT '0',
  `manufacturer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_sizes`
--

CREATE TABLE `items_sizes` (
  `size_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `size` varchar(30) NOT NULL COMMENT 'perr mm for rods diameter , '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Please Confirm your email.', 'please confirm your email to begin with full features.and enjoy', '', '2017-09-05 14:26:41', 'https://www.google.com/drive/u/0/my-drive', 1),
(3, 'New Order reclaimation!', '', '', '2017-12-15 17:41:24', 'blocks/orders_show?ord_id=26', 0),
(7, 'One new order', '', '', '2017-12-15 19:41:09', '/ibuild/blocks/orders_show?ord_id=31', 0),
(8, 'this is a test', ' a test is of some value do you know it', '', '2018-02-10 12:28:15', '', 0),
(10, 'hello this tis a test', '', '', '2018-03-14 14:53:48', 'hello@thelo.com', 0);

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
(7, 2, '2017-12-15 19:41:09', 1);

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
(1, 1, 5, 1898, '4*3*2', 'cashondel', '2018-03-21 19:56:53', NULL, 0, 0, 0, 17082, 0, 0);

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
('yoursgod@outlook.com', '7958739723');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `que_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `answer_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`que_id`, `u_id`, `question`, `file`, `answer_count`) VALUES
(10, 1, 'What is the best method to collect data?', 'machine.jpg', 1),
(17, 1, 'The world is the planet Earth and all life upon it, including human civilization. In a philosophical context, the world is the whole of the physical Universe, or an ontological world. In a theological context, the world is the material or the profane sphere, as opposed to the celestial, spiritual, transcendent or sacred. The \"end of the ...', NULL, 1),
(18, 1, 'In a philosophical context, the world is the whole of the physical Universe, or an ontological world. In a theological context, the world is the material or the profane sphere, as opposed to the celestial, spiritual, transcendent or sacred. The \"end of the ...', NULL, 1),
(19, 1, 'In a philosophical context, the world is the whole of the physical Universe, or an ontological world. In a theological context, the world is the material or the profane sphere, as opposed to the celestial, spiritual, transcendent or sacred. The \"end of the ...', NULL, 1),
(21, 1, 'hello this is me subash can you help', NULL, 2),
(22, 2, 'Hello i am hari . This is a test?', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `queries_answers`
--

CREATE TABLE `queries_answers` (
  `ans_id` int(11) NOT NULL,
  `answerer_id` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `que_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries_answers`
--

INSERT INTO `queries_answers` (`ans_id`, `answerer_id`, `answer`, `file`, `que_id`) VALUES
(4, 1, 'Yes i can if you want <b>yes</b>', '', 21),
(6, 1, 'hello this is me subash', '', 21);

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
(1, 'me@gmail.com');

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
(3, '', 'Ambe suppliers', 'this is one of the biggest providing company', 0, '', '');

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
(3, 5, 'on'),
(4, 5, 'on'),
(5, 5, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `temp_usersi`
--

CREATE TABLE `temp_usersi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
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
(1, 'subash sapkota', 'subashsapkota59@gmail.com', 'faf7842dc3b7b128ab40159cd64b9766', '1999-02-23', '214748364755', '7230843722194625784_o.jpg', 'http://subashcs.com.np', 'customers', 0, 0, '', 0, 'Baglung  ', 'Baglung', 5, 'Malikaa', 1),
(2, 'Hari kc', 'laxmisteel@gmail.com', '', '2010-07-11', '21474836479434', 'Natural-Language-Processing-Definition-1.jpg', 'http://subashcs.com.np', 'suppliers', 0, 0, '', 0, 'baglung', 'asdfas', 2, 'sakjdfls', 1),
(3, 'ambe cement', 'ambecement@gmail.com', '', '2007-07-19', '797979799', 'ai.jpg', 'http://subashcs.com.np', 'suppliers', 0, 0, '', 0, 'klajsdklasdfjsalkf ', 'asdfas', 2, 'sakjdfls', 1),
(4, 'Ram Shankar Acharya', 'ramshank@gmail.com', 'ram@123', '2007-01-24', '92347927332423', 'ramimage.jpg', 'www.ram.com', 'suppliers', 0, 0, '', 1, '', '', 0, '', 1),
(9, 'subash sapkota', 'yoursgod@outlook.com', '5bab541acd761a3093d7c4202b6e1da9', '2015-07-10', '', '27994730_1131546880315559_1864289533_n.jpg', 'myweb.com', 'customers', 0, 0, '', 0, 'Baglung ', 'Baglung', 5, 'Malika', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `deleted_items`
--
ALTER TABLE `deleted_items`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `house_arc_likes`
--
ALTER TABLE `house_arc_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_as_house_liker_fk` (`user_id`),
  ADD KEY `house_as_house_fk` (`house_id`);

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
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `house_arc_likes`
--
ALTER TABLE `house_arc_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items_like`
--
ALTER TABLE `items_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `items_sizes`
--
ALTER TABLE `items_sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials_req`
--
ALTER TABLE `materials_req`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_to_supp`
--
ALTER TABLE `orders_to_supp`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `queries_answers`
--
ALTER TABLE `queries_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supply_regions`
--
ALTER TABLE `supply_regions`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temp_usersi`
--
ALTER TABLE `temp_usersi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersi`
--
ALTER TABLE `usersi`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`u_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `orders_to_supp`
--
ALTER TABLE `orders_to_supp`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`request_maker_id`) REFERENCES `usersi` (`u_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_email_fk` FOREIGN KEY (`email`) REFERENCES `usersi` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `queries_answers`
--
ALTER TABLE `queries_answers`
  ADD CONSTRAINT `answerer_user_fk` FOREIGN KEY (`answerer_id`) REFERENCES `usersi` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `query_ans_fk` FOREIGN KEY (`que_id`) REFERENCES `queries` (`que_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `supplier_user_fk` FOREIGN KEY (`u_id`) REFERENCES `usersi` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
