-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 08:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkacad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isActive` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `isActive`) VALUES
(1, 'phuong', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'iPhone 14 Pro Max 1TB', '50000000', 'https://cdn.tgdd.vn/Products/Images/42/289705/iphone-14-pro-max-purple-1.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit dolores quos minima sit in non, asperiores labore quam est id! Quia, repudiandae veritatis quam nam modi hic? Sapiente voluptates dignissimos beatae eveniet voluptatibus quam dolor a quod consectetur pariatur commodi earum doloremque, vero repudiandae mollitia voluptatem nesciunt eos animi numquam perferendis aliquam velit sit. Corrupti aut iste blanditiis. Vero veritatis doloribus eos dolorum architecto odit molestiae saepe sunt soluta odio. Quam accusamus molestiae excepturi quod. Repellendus incidunt rerum corporis temporibus fugit harum! Fuga sed corporis quos ipsam iusto quod rerum dolor cumque, dignissimos dolore impedit totam neque distinctio quam nihil, quo aliquid debitis, ad optio quisquam! Accusantium dolorem amet quisquam earum mollitia, alias expedita obcaecati similique labore sunt in sint cupiditate doloremque quidem odit veritatis quam nostrum sed recusandae neque provident magni esse? Tempora veniam totam v'),
(2, 'iPhone 14 Pro 1TB', '41000000', 'https://cdn.tgdd.vn/Products/Images/42/289696/iphone14-pro-1.jpg', ' qq'),
(3, 'iPhone 13 512GB', '25000000', 'https://cdn.tgdd.vn/Products/Images/42/250257/iphone-13-xanh-1.jpg', ' '),
(4, 'MacBook PRO M1 2021', '42000000', 'https://cdn.tgdd.vn/Products/Images/44/253581/macbook-pro-14-m1-pro-2021-bac-1.jpg', ' '),
(5, 'iPhone 14 Pro Max 128GB ', '33600000', 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-purple-1.jpg', ''),
(7, 'MacBook Pro 16 M1 Pro 2021', '57490000', 'https://cdn.tgdd.vn/Products/Images/44/253706/apple-macbook-pro-16-m1-pro-2021-10-core-cpu-1.jpg', ''),
(8, 'iPhone 14 Pro 128GB ', '3059000', 'https://cdn.tgdd.vn/Products/Images/42/247508/iphone-14-pro-tim-4.jpg', ''),
(9, 'iPhone 14 Plus 128GB', '25700000', 'https://cdn.tgdd.vn/Products/Images/42/245545/Slider/iphone-14-plus638028259536373879.jpg', ''),
(10, 'iPhone 12 64GB ', '16000000', 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-1-2.jpg', ''),
(11, 'iPhone 14 128GB', '23000000', 'https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-tim-2-1.jpg', ''),
(12, 'iPhone 13 128GB', '20000000', 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-3.jpg', ''),
(13, 'iPhone 14 Plus 128GB', '26000000', 'https://cdn.tgdd.vn/Products/Images/42/245545/iphone-14-plus-ti-1.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
