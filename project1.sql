-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2024 at 07:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `role_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `username`, `email`, `password`, `address`, `phone`, `created_at`, `updated_at`, `status`, `role_id`) VALUES
(20, 'Nguyễn Ngọc An', 'antrc2', 'antrc2gamer@gmail.com', 'd0794f96a42e8391$49ab17437d854d94fe33410e087004e94094b386ff10f7011b51e2359c8ce3f2', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1732906482, 1732906482, 1, 2),
(21, 'Đỗ Phú Hiếu', 'hieudp', 'gtvbehieu@gmail.com', 'f61fa41e31687f0a$08e3513a8e10e4e8cb0349840845e76c28f8ceacc08fc27858d242f840226560', 'Hoài Đức-Hà Nội', '0353276676', 1733132264, 1733132264, 1, 1),
(23, 'Văn đạt', 'dat29', 'dat@gmail.com', '9a95df92e3a02162$08dfda87e5fc06555d75ef39204ad6ae758eedd5f4bcbbae47cc2d212b45eab3', 'Hoài Đức-Hà Nội', '0353234345', 1733161720, 1733161720, 1, 2),
(24, 'Nguyễn Ngọc An', 'antrc3', 'antrcgamer@gmail.com', '69a0a0db49f54a53$907355ee4cd607022f0823c4c61b59817c3af7f363f466fe4cf74fbeb34e255a', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411898', 1733199144, 1733199144, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `fullname_recieved` varchar(255) NOT NULL,
  `address_recieved` varchar(255) NOT NULL,
  `phone_reciedved` varchar(255) NOT NULL,
  `created_at` bigint NOT NULL,
  `total` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `ma_don_hang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `user_id`, `fullname_recieved`, `address_recieved`, `phone_reciedved`, `created_at`, `total`, `status`, `ma_don_hang`) VALUES
(10, 20, 'Nguyễn Ngọc Anh', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733208531, 12000, 1, 'DH_test'),
(11, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733232556, 12630, 1, 'DH_test'),
(12, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733233335, 24690, 1, 'DH_test'),
(13, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733233549, 24690, 1, 'DH_test'),
(14, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733234663, 240000, 1, 'DH_test'),
(15, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733234686, 24000, 1, 'DH_test'),
(16, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733234823, 570, 1, 'DH_test'),
(17, 20, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411897', 1733241256, 840000, 1, 'DH_test');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int NOT NULL,
  `bill_id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` int NOT NULL,
  `was_review` int NOT NULL DEFAULT '0',
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_detail_id`, `so_luong`, `thanh_tien`, `was_review`, `trang_thai`) VALUES
(33, 10, 43, 10, 150, 0, 1),
(34, 10, 37, 18, 30, 0, 1),
(35, 10, 41, 10, 12000, 0, 1),
(36, 10, 42, 24, 34555, 0, 1),
(37, 10, 41, 10, 12000, 0, 1),
(38, 10, 41, 1, 12000, 0, 1),
(39, 10, 43, 4, 150, 0, 1),
(40, 10, 37, 1, 30, 0, 1),
(41, 13, 41, 2, 12000, 0, 1),
(42, 13, 43, 4, 150, 0, 1),
(43, 13, 37, 3, 30, 0, 1),
(44, 14, 40, 2, 120000, 0, 1),
(45, 15, 41, 2, 12000, 0, 1),
(46, 16, 43, 3, 150, 0, 1),
(47, 16, 37, 4, 30, 0, 1),
(48, 17, 40, 7, 120000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 20, 1732909515, 1732909515, 2),
(3, 20, 1733080458, 1733080458, 1),
(4, 21, 1733132276, 1733132276, 1),
(5, 23, 1733195999, 1733195999, 1),
(6, 24, 1733199959, 1733199959, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ASUS', 0, 1733195705, 1),
(2, 'TUF', 0, 1731422315, 1),
(3, 'macbook', 1732636579, 1732636579, 1),
(5, 'Dell', 1732636834, 1732636834, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `discount_amount` int NOT NULL,
  `start_date` bigint NOT NULL,
  `end_date` bigint NOT NULL,
  `start_price` int NOT NULL,
  `end_price` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `product_detail_id`, `discount_amount`, `start_date`, `end_date`, `start_price`, `end_price`, `status`) VALUES
(9, 40, 13, 1731645840, 1730781840, 12, 14332, 1),
(15, 43, 20, 1733122260, 1733122320, 10, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `cate_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `image`, `created_at`, `updated_at`, `detail`, `status`) VALUES
(28, 2, 'dell', '400350684_756076966348762_7191393029513830909_n.jpg', 1733194296, 1733246962, 'sds', 1),
(30, 1, 'ex', '122959113_449563376022943_7005312100385151816_n.jpg', 1733145988, 1733247057, 'An 18cm', 1),
(31, 2, 'lap top l dell', 'th (3).jpg', 1733146048, 1733146048, 'rất ok', 2),
(32, 5, 'dell 5i', 'th (5).jpg', 1733146117, 1733146117, 'sản phẩm tốt cho người dùng', 1),
(33, 3, 'lap top levo', 'th.jpg', 1733146086, 1733146086, 'edefd', 1),
(34, 2, 'AnTrc2', '400350684_756076966348762_7191393029513830909_n.jpg', 1733296049, 1733296049, '18cm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` int NOT NULL DEFAULT '0',
  `updated_at` int NOT NULL DEFAULT '0',
  `price` int NOT NULL,
  `amount` int NOT NULL,
  `ram` int NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `created_at`, `updated_at`, `price`, `amount`, `ram`, `color`, `status`) VALUES
(37, 28, 0, 0, 300, 14, 4, 'Xám', 1),
(39, 30, 0, 0, 12, 12, 64, 'Xanh', 1),
(40, 31, 0, 0, 120000, 1, 8, 'Đen', 1),
(41, 32, 0, 0, 12000, 8, 8, 'Đen', 1),
(42, 33, 0, 0, 34555, 24, 8, 'Đen', 1),
(43, 28, 0, 0, 150, 7, 64, 'Đen', 1),
(44, 28, 1733295146, 1733295146, 120000, 10, 16, 'Đỏ', 1),
(45, 34, 1733296104, 1733296171, 10000, 10, 4, 'Xanh than', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail_image`
--

CREATE TABLE `product_detail_image` (
  `id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_detail_image`
--

INSERT INTO `product_detail_image` (`id`, `product_detail_id`, `image`) VALUES
(55, 39, '674db575cfa7a.jpg'),
(56, 40, '674db5d2ef1b5.jpg'),
(57, 40, '674db5d2f063d.jpg'),
(58, 40, '674db5d2f1104.jpg'),
(77, 37, '674db5a566bda.jpg'),
(78, 41, '6745f1a311ab59.49877258.png'),
(79, 41, '6745f1a31246a6.27932691.jpg'),
(80, 41, '6745f1a312d9a8.79098335.jpg'),
(81, 41, '6745f1a3137af6.87777998.jpg'),
(82, 41, '6745f1a313ec25.80076136.png'),
(83, 41, '6745f1a31488d6.76298121.jpg'),
(84, 42, '674db5fa73963.jpg'),
(85, 42, '674db5fa751d3.jpg'),
(86, 42, '6745f552906875.42554343.webp'),
(87, 39, '674db575d31d4.jpg'),
(88, 37, '674db5a5679b0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `star` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` bigint NOT NULL,
  `updated_at` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `product_id`, `star`, `comment`, `created_at`, `updated_at`) VALUES
(6, 21, 33, 1, 'xczc', 1733137664, NULL),
(7, 21, 33, 1, 'zxzxzcx', 1733137670, NULL),
(9, 21, 33, 1, 'sdsds', 1733137889, NULL),
(12, 21, 33, 1, 'sản phẩm rất tốt 2', 1733138841, NULL),
(13, 21, 33, 1, 'sản phẩm rất tốt4', 1733138866, NULL),
(14, 21, 33, 1, 'sản phẩm rất tốt 7', 1733139012, NULL),
(15, 21, 32, 1, 'dd', 1733160965, NULL),
(16, 21, 32, 1, 'hhh', 1733194078, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã Xác nhận'),
(3, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Huỷ đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_account_role` (`role_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_account` (`user_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_detail_bill` (`bill_id`),
  ADD KEY `fk_product_detail` (`product_detail_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_account` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_detail_cart` (`cart_id`),
  ADD KEY `fk_cart_detail_product` (`product_detail_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discount_product_detail_id` (`product_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`cate_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_detail_product` (`product_id`);

--
-- Indexes for table `product_detail_image`
--
ALTER TABLE `product_detail_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_detail_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_detail_image`
--
ALTER TABLE `product_detail_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_account` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `fk_bill_detail_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_product_detail` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_account` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`),
  ADD CONSTRAINT `fk_cart_detail_cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `fk_discount_product_detail_id` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_detail_image`
--
ALTER TABLE `product_detail_image`
  ADD CONSTRAINT `product_detail_image_ibfk_1` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
