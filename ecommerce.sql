-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 04:59 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_id`, `admin_pass`) VALUES
(1, 'akmal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(70) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `city`, `country`, `address`, `email`, `contact`, `password`) VALUES
(1, 'Md. Akmal Hossain', 'Sylhet', 'Bangladesh', 'Shahporan Gate, Khadimnagar, Sylhet', 'akmalhossain307@gmail.com', '01738279545', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maincat`
--

CREATE TABLE `tbl_maincat` (
  `id` int(11) NOT NULL,
  `maincat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maincat`
--

INSERT INTO `tbl_maincat` (`id`, `maincat_name`) VALUES
(1, 'Clothing'),
(3, 'Electronics'),
(4, 'Health &amp; Beauty'),
(5, 'Watches'),
(6, 'Jwellery'),
(7, 'Shoes'),
(8, 'Kids &amp; Girls');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cus_id` varchar(255) NOT NULL,
  `pro_id` varchar(100) NOT NULL,
  `cus_name` varchar(70) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_image` text NOT NULL,
  `payable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cus_id`, `pro_id`, `cus_name`, `city`, `country`, `address`, `email`, `contact`, `pro_title`, `pro_price`, `pro_qty`, `pro_image`, `payable`) VALUES
(13, 'akmalhossain307@gmail.com', '1', 'Md. Akmal Hossain', 'Sylhet', 'Bangladesh', 'Shahporan Gate, Khadimnagar, Sylhet', 'akmalhossain307@gmail.com', '01738279545', 'This is our first product title', 1000, 1, 'f6020686ba.jpg', '1025');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `subcategoryitem` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `tags` varchar(255) NOT NULL,
  `flavour` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `prev_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `title`, `category`, `subcategory`, `subcategoryitem`, `description`, `price`, `tags`, `flavour`, `type`, `availability`, `attribute`, `image`, `prev_price`) VALUES
(1, 'This is our first product title', 'Clothing', 'Men', 'Winter Wear', '&lt;p&gt;&lt;span style=&quot;color:#1abc9c&quot;&gt;This is our first product description.&lt;/span&gt;This is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product descriptionThis is our first product description&lt;/p&gt;', 1000, 'new product, product', 'white', 'featured', 'In Stock', 'New', 'f6020686ba.jpg', '1100'),
(2, 'product two', 'Clothing', 'Boys', 'Jackets', 'What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic \r\n\r\ntypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing\r\n\r\n\r\n packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 5000, 'new, products', 'black', 'normal', 'In Stock', 'Hot', '598420a3a6.jpg', '5500'),
(3, 'product three', 'Electronics', 'Women', 'Shirts', 'What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic \r\n\r\ntypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing\r\n\r\n\r\n packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 4500, 'product, new product', 'white', 'featured', 'Not In Stock', 'New', '8d485470af.jpg', '5000'),
(4, 'product four Updated', 'Clothing', 'Boys', 'Swimwear', '&lt;p&gt;What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;#39;Content here, content here&amp;#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;#39;lorem ipsum&amp;#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', 2520, 'new product, product', 'green', 'normal', 'In Stock', 'Sale', 'd525ab17a8.jpg', '2600'),
(5, 'product five updated', 'Clothing', 'Girls', 'Dresses', '&lt;p&gt;What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &amp;#39;Content here, content here&amp;#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &amp;#39;lorem ipsum&amp;#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', 12133, 'new product, product', 'blue', 'featured', 'In Stock', 'Hot', 'e725b3d60f.jpg', '2342'),
(6, 'This is product title', 'Clothing', 'Men', 'Dresses', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;&lt;span style=&quot;color:#c0392b&quot;&gt;is simply dummy text of the printing &lt;/span&gt;and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has &lt;span style=&quot;color:#f1c40f&quot;&gt;survived not only five ce&lt;/span&gt;nturies, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 3000, 'dresses', 'green', 'normal', 'In Stock', 'Sale', 'd66d3c9af9.jpg', '3500'),
(7, 'This is product title', 'Clothing', 'Men', 'Dresses', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a &lt;span style=&quot;color:#16a085&quot;&gt;type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passag&lt;/span&gt;es, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 1500, 'products', 'red', 'featured', 'In Stock', 'Hot', '21cc918126.jpg', '1600'),
(8, 'This is product title', 'Clothing', 'Men', 'Shoes', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply &lt;span style=&quot;font-size:22px&quot;&gt;dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since t&lt;/span&gt;he 1500s, when an unknown printer took a galley of type and scrambled it to make a type sp&lt;span style=&quot;font-size:26px&quot;&gt;ecimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It&lt;/span&gt; was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 424242, 'retert', 'red', 'normal', 'In Stock', 'New', '5c1dfa9209.jpg', '4324322'),
(9, 'this is another post', 'Clothing', 'Men', 'Blazers', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 53453, 'hgh', 'white', 'normal', 'In Stock', 'Hot', '8afeadba35.jpg', '53453'),
(10, 'this is another post', 'Clothing', 'Men', 'Jackets', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 345345, 'ami,apni,amra', 'red', 'featured', 'In Stock', 'Sale', 'dfc1fdfe25.jpg', '53453'),
(11, 'this is our first post', 'Clothing', 'Women', 'Dresses', '&lt;p&gt;&lt;strong&gt;Lo&lt;span style=&quot;font-family:Comic Sans MS,cursive&quot;&gt;rem Ipsum&lt;/span&gt;&lt;/strong&gt;&lt;span style=&quot;font-family:Comic Sans MS,cursive&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially&lt;/span&gt; unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 545435, 'hhth', 'green', 'featured', 'In Stock', 'Hot', '4226c1818b.jpg', '5455542'),
(12, 'this is another postdf', 'Clothing', 'Women', 'Jwellery', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 456456, 'dger', 'white', 'normal', 'In Stock', 'Sale', 'e5c01d438d.jpg', '546546'),
(13, 'this is another post', 'Clothing', 'Women', 'Winter Wear', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 45345, 'ami,apni,amra', 'red', 'featured', 'In Stock', 'Sale', '52f4890a76.jpg', '575756'),
(14, 'this is another post', 'Clothing', 'Boys', 'School Bags', '&lt;p&gt;&lt;strong&gt;Lorem Ip&lt;span style=&quot;color:#1abc9c&quot;&gt;&lt;span style=&quot;font-size:18px&quot;&gt;sum&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;span style=&quot;color:#1abc9c&quot;&gt;&lt;span style=&quot;font-size:18px&quot;&gt;&amp;nbsp;is simply dummy text of the p&lt;/span&gt;&lt;/span&gt;rinting and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 5453, 'ami,apni,amra', 'red', 'normal', 'In Stock', 'Sale', '1d43e530f5.jpg', '54646'),
(15, 'this is another post', 'Clothing', 'Boys', 'Shirts', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simp&lt;span style=&quot;color:#9b59b6&quot;&gt;ly dummy text of the printing a&lt;/span&gt;nd typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 6456456, 'hrtfghrt', 'black', 'featured', 'In Stock', 'New', '8dfce65466.jpg', '466456'),
(16, 'this is another post', 'Clothing', 'Girls', 'Shoes', '&lt;p&gt;&lt;strong&gt;Lorem&lt;span style=&quot;font-size:20px&quot;&gt;&lt;span style=&quot;color:#3498db&quot;&gt; Ipsum&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;span style=&quot;font-size:20px&quot;&gt;&lt;span style=&quot;color:#3498db&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s&lt;/span&gt;&lt;/span&gt;, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 64564, 'bfgbfg', 'white', 'featured', 'In Stock', 'Sale', 'd7afa90177.jpg', '5656'),
(17, 'this is our first post', 'Clothing', 'Girls', 'Night Dress', '&lt;p&gt;&lt;strong&gt;Lorem&lt;big&gt; Ipsum&lt;/big&gt;&lt;/strong&gt;&lt;big&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indus&lt;span style=&quot;color:#e67e22&quot;&gt;try&amp;#39;s standard dummy text &lt;/span&gt;ever since the 1500s, when&lt;/big&gt; an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 65464, 'dfsdf', 'red', 'normal', 'In Stock', 'Sale', '03e106d316.jpg', '5654645'),
(18, 'this another new product', 'Electronics', 'Laptop', 'Gaming', '&lt;p&gt;&lt;span style=&quot;color:#16a085&quot;&gt;&lt;span style=&quot;font-size:20px&quot;&gt;dummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy t&lt;/span&gt;&lt;/span&gt;extdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy textdummy text&lt;/p&gt;', 3234, 'html,html5', 'white', 'featured', 'In Stock', 'Sale', '6096aaf7bd.jpg', '3326'),
(19, 'gdfgdrgr', 'Health &amp; Beauty', 'Men', 'Blazers', '&lt;p&gt;ghgfyt ft fytf &amp;nbsp; yh u yu hu huih ug 87g&lt;/p&gt;', 435435, 'fdds', 'black', 'featured', 'In Stock', 'New', 'b11a8a585f.jpg', '5345345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `quality` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `pro_id`, `user`, `summary`, `review`, `price`, `quality`, `value`, `date`) VALUES
(1, 15, '', 'Nice product', 'Awesome product ', '4', '5', '5', '2017-08-25 01:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`id`, `subcat_name`) VALUES
(2, 'Women'),
(3, 'Boys'),
(4, 'Girls'),
(5, 'Men'),
(6, 'Laptop'),
(7, 'Desktop'),
(8, 'Camera'),
(9, 'Mobile Phone'),
(10, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcatitem`
--

CREATE TABLE `tbl_subcatitem` (
  `id` int(11) NOT NULL,
  `subcatitem_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcatitem`
--

INSERT INTO `tbl_subcatitem` (`id`, `subcatitem_name`) VALUES
(1, 'Dresses'),
(3, 'Jackets'),
(4, 'Sunglasses'),
(5, 'Sport wear'),
(6, 'Blazers'),
(7, 'Shirts'),
(8, 'Handbags'),
(9, 'Jwellery'),
(10, 'Swimwear'),
(11, 'Tops'),
(12, 'Flats'),
(13, 'Shoes'),
(14, 'Winter Wear'),
(15, 'Gaming'),
(16, 'Toys &amp; Games'),
(17, 'Jeans'),
(18, 'Shirts'),
(20, 'Shoes'),
(21, 'School Bags'),
(22, 'Lunch Box'),
(23, 'Footwear'),
(24, 'Sandals'),
(25, 'Shorts'),
(26, 'Shorts'),
(27, 'Jwellery'),
(28, 'Bags'),
(29, 'Night Dress'),
(30, 'Swim Wear'),
(31, 'Swim Wear'),
(32, 'Laptop Skin'),
(33, 'Apple'),
(34, 'Dell'),
(35, 'Lenovo'),
(36, 'Microsoft'),
(37, 'Asus'),
(38, 'Adapters'),
(39, 'Batteries'),
(40, 'Cooling Pads'),
(41, 'Routers &amp; Modems'),
(42, 'CPU'),
(43, 'PC Gaming Store'),
(44, 'Graphics Card'),
(45, 'Components'),
(46, 'Webcam'),
(47, 'Memory'),
(48, 'Mother Board'),
(49, 'Keyboard'),
(50, 'Head Phones'),
(51, 'Accessories'),
(52, 'Binoculars'),
(53, 'Telescopes'),
(54, 'Camcorders'),
(55, 'Digital'),
(56, 'Film Cameras'),
(57, 'Flashes'),
(58, 'Lenses'),
(59, 'Surveillance'),
(60, 'Tripods'),
(61, 'Samsung'),
(62, 'Motorola'),
(63, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `prev_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `s_id`, `pro_id`, `title`, `image`, `price`, `prev_price`) VALUES
(8, 'opaocqusi2ouqi93to4bunkon6', 8, 'This is product title', '5c1dfa9209.jpg', 424242, 4324320),
(9, '67sm0cevqveaolr8hhcp5ahcjc', 1, 'This is our first product title', 'f6020686ba.jpg', 1000, 1100),
(10, '67sm0cevqveaolr8hhcp5ahcjc', 3, 'product three', '8d485470af.jpg', 4500, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_maincat`
--
ALTER TABLE `tbl_maincat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcatitem`
--
ALTER TABLE `tbl_subcatitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_maincat`
--
ALTER TABLE `tbl_maincat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_subcatitem`
--
ALTER TABLE `tbl_subcatitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
