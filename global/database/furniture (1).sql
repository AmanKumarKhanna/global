-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 03:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_desc`, `product_id`) VALUES
(1, 'CHAIR', 'CH.jpg', 'THE CHAIRS YOU NEED', 0),
(2, 'BED', 'BED.jpg', 'BED YOU DESIRE', 0),
(3, 'TABLE', 'TABLE.jpg', 'CHOOSE A PREFECT TABLE FOR YOU', 0),
(4, 'SOFA', 'SOFA.jpg', 'FOR THE COMFORT YOU DESERVE', 0),
(5, 'WARDROBE', 'WARD.webp', 'KEEP YOUR THINGS IN STYLE', 0),
(6, 'DINING AND BAR', 'DB.JPG', 'ENJOY YOUY FOOD AT BEST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `o_id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `o_desc` text NOT NULL,
  `o_date` time NOT NULL,
  `o_status` varchar(10) NOT NULL DEFAULT 'disable',
  `o_priority` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`o_id`, `pro_id`, `o_desc`, `o_date`, `o_status`, `o_priority`) VALUES
(1, 1, 'We bring best product for you - 30% flat discount ', '12:59:00', 'enable', 5),
(2, 2, 'flat 20% off&nbsp; - this is the best suitable sofa for you&nbsp;', '12:59:00', 'enable', 1),
(4, 4, 'demo', '13:58:00', 'enable', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(21) NOT NULL,
  `user_id` int(11) NOT NULL,
  `m_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `status`, `user_id`, `m_status`) VALUES
(1, '2020-10-17', 'Confirmed', 3, 'Paid/Deliverd'),
(2, '2020-10-18', 'Confirmed', 3, 'Unpaid/Undelivered'),
(3, '2020-10-31', 'Not-Confirmed', 1, 'Pending'),
(4, '2020-11-20', 'Pending', 1, 'Pending'),
(5, '2020-11-20', 'Not-Confirmed', 1, 'Pending'),
(6, '2020-11-21', 'Pending', 0, 'Pending'),
(7, '2020-11-21', 'Confirmed', 3, 'unpaid/undeliverd'),
(8, '2020-12-22', 'Pending', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `product_id`, `order_id`, `product_price`, `product_qty`) VALUES
(1, 2, 1, 50000, 2),
(2, 1, 1, 13000, 3),
(3, 3, 2, 45000, 1),
(4, 4, 2, 6000, 2),
(7, 1, 5, 13000, 1),
(8, 1, 6, 13000, 1),
(9, 2, 7, 50000, 2),
(10, 1, 7, 13000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `page_master`
--

CREATE TABLE `page_master` (
  `page_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page_master`
--

INSERT INTO `page_master` (`page_id`, `title`, `page_desc`) VALUES
(1, 'beta example', 'on working mode (beta)                    ');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`color_id`, `product_id`, `color_name`) VALUES
(1, 0, 'RED'),
(2, 0, 'BLACK'),
(3, 0, 'BLUE'),
(4, 0, 'WHITE'),
(5, 0, 'YELLOW'),
(6, 0, 'GRAY'),
(7, 0, 'BROWN'),
(8, 0, 'GREEN'),
(9, 0, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `product_id` int(10) NOT NULL,
  `product_img` varchar(225) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_discription` text NOT NULL,
  `color_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `offer_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `product_img`, `product_name`, `product_discription`, `color_id`, `material_id`, `cat_id`, `size_id`, `offer_price`, `selling_price`, `insert_date`) VALUES
(1, 'eames-replica.webp', 'Eames Replica', 'white color single seater chair ', 5, 8, 1, 2, '13000.00', '20000.00', '2020-09-26 15:09:54'),
(2, 'sofaset.webp', 'Rebel-5 Sofa', 'blue color multi-seater sofa', 6, 10, 4, 1, '50000.00', '55000.00', '2020-09-19 14:33:33'),
(3, 'siramika-solid-wood-poster-bed-in-honey-oak-finish-by-mudramark-siramika-solid-wood-poster-bed-in-ho-vdje44.webp', 'siramika-solid-wood-poster-bed', 'we present you the siramika solid wood poster bed in honey oak finish by mudramark', 7, 1, 2, 1, '45000.00', '50000.00', '2020-10-18 14:04:20'),
(4, 'classic-xl-bean-bag-with-beans-in-black-colour-by-style-homez-classic-xl-bean-bag-with-beans-in-blac-yevh4u.webp', 'Classic-xl-bean-bag-with', 'we present you the classic xl bean bag with beans in black colour by style homez', 2, 10, 1, 4, '6000.00', '10000.00', '2020-10-18 14:06:43'),
(5, 'alicia-4-door-wardrobe-in-walnut-colour-by-casacraft-alicia-4-door-wardrobe-in-walnut-colour-by-casa-iszqbb.webp', 'Alicia 4 door wardrobe', 'we present you Alicia 4 door wardrobe in walnut colour by casacraft', 7, 1, 5, 4, '33000.00', '40000.00', '2020-10-18 14:09:41'),
(6, 'alba-1-seater-sofa-in-sandy-brown-colour-by-woodsworth-alba-1-seater-sofa-in-sandy-brown-colour-by-w-r8ip4c.webp', 'Alba 1 seater sofa', 'we present you the alba 1 seater sofa in sandy brown colour by woodsworth', 8, 10, 1, 2, '23000.00', '25000.00', '2020-10-18 14:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `material_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `material_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`material_id`, `product_id`, `material_name`) VALUES
(1, 0, 'WOOD'),
(2, 0, 'GLASS'),
(3, 0, 'GLOSSY MDF'),
(4, 0, 'ARCLYIC'),
(5, 0, 'IRON'),
(6, 0, 'ALLOY'),
(7, 0, 'PLASTIC'),
(8, 0, 'TEAK WOOD'),
(9, 0, 'SHEESAM WOOD'),
(10, 0, 'FABRIC'),
(11, 0, 'BAMBOO');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `review_rating` int(2) NOT NULL,
  `rating_status` int(2) NOT NULL,
  `review_desc` text NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `product_id`, `review_rating`, `rating_status`, `review_desc`, `user_name`, `user_email`, `user_contact`) VALUES
(1, 1, 4, 0, 'awesome product', 'shivam', 'chandant1726501@gmail.com', '8511361044'),
(2, 2, 4, 0, 'such product never expected', 'aman', 'chandant1726501@gmail.com', '8511361044'),
(3, 2, 2, 0, 'this is awesome . but i got a fault about this product and so there for i decided to return this product.', 'sharvan dubey', 'saj44@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `product_id`, `product_size`) VALUES
(1, 0, 'LARGE'),
(2, 0, 'MEDIUM'),
(3, 0, 'SMALL'),
(4, 0, 'EXTRA LARGE');

-- --------------------------------------------------------

--
-- Table structure for table `slide_master`
--

CREATE TABLE `slide_master` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` varchar(255) NOT NULL,
  `slide_desc` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide_master`
--

INSERT INTO `slide_master` (`slide_id`, `slide_title`, `slide_image`, `slide_desc`, `is_active`) VALUES
(1, 'FURNITURE YOU DESERVE', '1.jpg', 'WE WILL PROVIDE THE COMFORT YOU NEED.....', 1),
(2, 'JUST FOR YOU shivam', '2.jpg', 'THE SPECIAL FURNITURES ONES FOR SPECIAL YOU', 1),
(3, 'FURNITURE YOU DESIRE', '3.jpg', 'THE FURNITURE YOU EVER DESIRE OF IS AT YOUR EASE.. UNIQUE AND VARIETY FURNITURES FOR EVERY ENVIROMENT', 1),
(4, 'BRINGS TO YOU', '4.jpg', 'THE OFFER AND PRICE WE BRING IS THE LOWEST YOU ARE GONNA EVER GET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` varchar(12) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_image`, `user_gender`, `user_dob`, `user_address`, `user_contact`, `user_pwd`, `user_type`) VALUES
(1, 'AMAN', 'aman@gmail.com', 'a.jpg', 'male', '1999-12-04', 'MUMBAI', '9426255499', 'Aman@1999', 'admin'),
(2, 'SHIVAM', 'shivam@gmail.com', 'IMG_20180520_182346.jpg', 'male', '1998-01-01', 'VANARAS', '790454169', 'SHIVAM@123', 'admin'),
(3, 'TMC', 'tmc@gmail.com', 'IMG_20180108_103623.jpg', 'male', '1999-12-01', 'AHMEDABAD', '9875216541', 'TMC@123', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_add`
--

CREATE TABLE `user_add` (
  `user_add_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `b_address` varchar(30) NOT NULL,
  `b_city` varchar(15) NOT NULL,
  `b_zip` int(6) NOT NULL,
  `b_state` varchar(20) NOT NULL,
  `b_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_add`
--

INSERT INTO `user_add` (`user_add_id`, `user_id`, `b_address`, `b_city`, `b_zip`, `b_state`, `b_contact`) VALUES
(1, 3, 'B-18/42 ONGC COLONY', 'SURAT', 394518, 'Gujarat', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `page_master`
--
ALTER TABLE `page_master`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slide_master`
--
ALTER TABLE `slide_master`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_add`
--
ALTER TABLE `user_add`
  ADD PRIMARY KEY (`user_add_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `o_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_master`
--
ALTER TABLE `page_master`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `color_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `material_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slide_master`
--
ALTER TABLE `slide_master`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_add`
--
ALTER TABLE `user_add`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
