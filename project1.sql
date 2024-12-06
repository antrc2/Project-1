-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 10:30 AM
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
(39, 24, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411898', 1733307195, 34555, 0, 'DH_39'),
(40, 24, 'Nguyễn Ngọc An', 'Vĩnh Ninh - Vĩnh Quỳnh - Thanh Trì - Hà Nội', '0838411898', 1733307226, 12, 1, 'DH_40'),
(41, 21, 'anh hiếu', 'Hoài Đức-Hà Nội', '0353276676', 1733330849, 20000, 2, 'DH_41'),
(42, 21, 'Đỗ Phú Hiếu', 'Hoài Đức-Hà Nội', '0353276676', 1733331217, 380105, 1, 'DH_42'),
(43, 21, 'Đỗ Phú Hiếu', 'Hoài Đức-Hà Nội', '0353276676', 1733331338, 1140, 1, 'DH_43'),
(44, 21, 'Đỗ Phú Hiếu', 'Hoài Đức-Hà Nội', '0353276676', 1733332114, 12, 0, 'DH_44'),
(45, 21, 'Long Phú Quốc', 'Hoài Đức-Hà Nội', '0353276676', 1733370043, 902718, 1, 'DH_45');

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
(65, 39, 42, 1, 34555, 0, 1),
(66, 40, 39, 1, 12, 0, 1),
(67, 41, 45, 2, 10000, 0, 1),
(68, 42, 42, 11, 34555, 0, 1),
(69, 43, 37, 3, 300, 0, 1),
(70, 43, 43, 2, 120, 0, 1),
(71, 44, 39, 1, 12, 0, 1),
(72, 45, 39, 2, 24, 0, 1),
(73, 45, 47, 3, 902694, 0, 1);

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

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_detail_id`, `amount`, `price`, `created_at`, `updated_at`, `status`) VALUES
(90, 5, 37, 1, 300, 1733391439, 1733391439, 1);

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
(1, 'Acer', 0, 1733332406, 1),
(2, 'LG ', 0, 1733332451, 1),
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
(9, 40, 13, 1731645840, 1733460240, 12, 14332, 1),
(15, 43, 20, 1733122260, 1733381520, 10, 1000, 1),
(16, 42, 20, 1733211180, 1733211180, 10000, 30000, 1);

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
(28, 1, 'Acer Swift 14 AI ', '714fQRug1+L._AC_SX679_.jpg', 1733194296, 1733333450, '  Máy tính Copilot+. Kỷ nguyên AI mới bắt đầu - Biến ý tưởng của bạn từ lời nhắc văn bản thành tác phẩm nghệ thuật được tạo ra', 1),
(30, 1, 'Acer Swift', 'th (5).jpg', 1733145988, 1733329936, 'Giữ sự mát mẻ: Giữ sự mát mẻ giữa những thiên hà chơi game khốc liệt nhất, nhờ quạt kép cải tiến và hệ thống thoát khí hiệu quả của Nitro V 15', 1),
(31, 2, 'Intel Evo Edition', '71UTfYZOmZL._AC_SX466_.jpg', 1733146048, 1733332581, 'Màn hình IPS 14\" nhỏ gọn, màu sắc sống động với độ chói thấp - Mở rộng phạm vi khả thi với màn hình IPS 14” nhỏ gọn có tỷ lệ khung hình 16:10 có thể biến tầm nhìn của bạn thành hiện thực. ', 1),
(32, 2, 'LG UltraGear', 'th (5).jpg', 1733146117, 1733332885, 'sản phẩm tốt cho người dùng', 1),
(33, 2, 'LG Ultra PC', 'th.jpg', 1733146086, 1733332851, 'Laptop hiệu năng cao, phù hợp cho công việc sáng tạo hoặc giải trí.', 1),
(34, 2, 'Intel Core', '717pottSkKL._AC_SX466_.jpg', 1733296049, 1733332719, 'Windows 11 Home - Windows 11 đưa bạn đến gần hơn với những gì bạn yêu thích. Theo đuổi đam mê và tối đa hóa năng suất của bạn với Windows 11 mới', 1),
(38, 1, 'Acer Nitro V Gaming Laptop', '71F-Wcriq4L._AC_SX466_.jpg', 1733329431, 1733329892, 'Giữ sự mát mẻ: Giữ sự mát mẻ giữa những thiên hà chơi game khốc liệt nhất, nhờ quạt kép cải tiến và hệ thống thoát khí hiệu quả của Nitro V 15', 1);

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
(37, 28, 0, 1733303596, 300, 8, 4, 'Xám', 1),
(39, 30, 0, 0, 12, 4, 64, 'Xanh', 1),
(40, 31, 0, 0, 120000, 1, 8, 'Đen', 1),
(41, 32, 0, 0, 12000, 2, 8, 'Đen', 1),
(42, 33, 0, 0, 34555, 0, 8, 'Đen', 1),
(43, 28, 0, 1733336526, 150, 49, 568, 'Đen', 1),
(44, 28, 1733295146, 1733295146, 120000, 8, 16, 'Đỏ', 1),
(45, 34, 1733296104, 1733296171, 10000, 0, 4, 'Xanh than', 1),
(46, 28, 1733335750, 1733335750, 600000, 13, 128, 'xanh', 1),
(47, 28, 1733336194, 1733336194, 300898, 42, 264, 'đen', 1);

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
(88, 37, '674db5a5679b0.jpg'),
(89, 44, '122959113_449563376022943_7005312100385151816_n.jpg'),
(90, 44, '386879197_274394835576707_5557031970033408359_n.jpg'),
(91, 44, '400350684_756076966348762_7191393029513830909_n.jpg'),
(92, 44, 'IMG_8869.jpg'),
(93, 44, 'mcvui.jpg'),
(94, 44, 'omg.jpg'),
(95, 44, 'SQ.jpg'),
(96, 44, '122959113_449563376022943_7005312100385151816_n.jpg'),
(97, 44, '386879197_274394835576707_5557031970033408359_n.jpg'),
(98, 44, '400350684_756076966348762_7191393029513830909_n.jpg'),
(99, 37, '122959113_449563376022943_7005312100385151816_n.jpg'),
(101, 37, '400350684_756076966348762_7191393029513830909_n.jpg'),
(104, 46, '71F-Wcriq4L._AC_SX466_.jpg'),
(105, 46, '71UTfYZOmZL._AC_SX466_.jpg'),
(106, 46, '714fQRug1+L._AC_SX679_.jpg'),
(107, 46, 'th (2).jpg'),
(108, 46, 'th (3).jpg'),
(109, 46, 'th (4).jpg');

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
(16, 21, 32, 1, 'hhh', 1733194078, NULL),
(17, 20, 33, 1, 'adadad', 1733297849, NULL),
(18, 21, 34, 1, 'sản phẩm rất chất lượng cao', 1733330927, NULL);

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
(0, 'Chưa thanh toán'),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_detail_image`
--
ALTER TABLE `product_detail_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
