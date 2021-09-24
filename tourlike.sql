-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 01:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourlike`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(5) NOT NULL,
  `heading` varchar(500) NOT NULL COMMENT 'หัวข้อ',
  `imageblog` varchar(100) NOT NULL COMMENT 'รูป',
  `content` varchar(10000) NOT NULL COMMENT 'เนื้อหา',
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `heading`, `imageblog`, `content`, `created_at`, `company_id`) VALUES
(1, 'แนะนำสถานที่ท่องเที่ยวนครนายกxx', '20210922113622nayok1.jpg', '1. เที่ยวนครนายก - ภูกะเหรี่ยง\r<br>\nเป็นอีกหนึ่งที่เที่ยวนครนายกที่ห้ามพลาดเด็ดขาด ใครชอบสายธรรมชาติที่นี่คือใช่เลย เพราะนอกจากได้สัมผัสกับประสบการณ์เขียวชะอุ่มของทุ่งนาแล้ว ภายในภูกะเหรี่ยงยังเป็นศุนย์การเรียนรู้ที่มีกิจกรรมให้เราได้ทำ ได้เรียนรู้สนุกๆ อีกมากมายแล้ว สำหรับที่นี่มีค่าเข้าด้วยนะ แต่ราคาไม่กี่สิบบาทซึ่งถ้าใครไม่อยากทำกิจกรรมก็นำคูปองที่ได้จากค่าเข้านั่นแหละมารับเครื่องดื่มฟรีได้ด้วยนะ\r<br>\n2. เที่ยวนครนายก - วัดป่าคลอง 11 (วัดคำชะโนด 2)\r<br>\nทริปเที่ยวนครนายกวันเดียวทัวร์ครับ ขอเอาใจสายไหว้พระ ขอพร ขอหวยครับ โดยไม่ต้องไปไกลอุดรธานี เพราะที่ปทุมธานีก็มีคำชะโนดเหมือนกันครับ หรือที่หลายคนรู้จักในชื่อของ วัดป่าคลอง 11 ครับ วัดแห่งนี้ ถือเป็นอีกวัดที่มีชื่อเสียงและความศักดิ์สิทธิ์ครับ ผู้คนนิยมเดินมาขอเลขเด็ด และโชคลาภ ซึ่งหลายคนบอกว่าได้สมใจเลยครับ แต่จะจริงไหม ต้องมาลองกับทัวร์ครับเลย\r<br>\n3. เที่ยวนครนายก - ซุ้มต้นไผ่ (วัดจุฬาภรณ์วนาราม)\r<br>\nเชื่อว่าหลายคนน่าจะคิดถึงป่าไผ่เกียวโตกันแน่ๆ ซึ่งตอนนี้อาจจะต้องหยุดบินกันไปสักพักก่อนครับ แต่ไม่ต้องเสียใจ เพราะทัวร์ครับมีป่าไผ่ที่สวยไม่แพ้ ป่าไผ่อาราชิยาม่าเลย แถมอยู่แค่นครนายกเองครับ ซึ่งซุ้มต้นไผ่แห่งนี้ อยู่บริเวณหน้าวัดจุฬาภรณ์วนาราม เป็นอุโมงค์ไผ่ที่เกิดขึ้นตามธรรมชาติ ยาวกว่า 800 เมตร ชอบมุมไหน ก็โพสท่าถ่ายรูปกันได้เต็มที่เลยครับ ถ่ายรูปเสร็จแล้ว อย่าลืมแวะเข้าไปไหว้พระกันได้นะครับ', '2021-09-21', 1),
(2, 'เที่ยวอุดรฯ ไหว้พระ พักใจ เลาะหาเมนูอร่อยกินให้จุกๆ กันไปเลย!', 'udon1.jpg', 'อุดรธานี เป็นจังหวัดหนึ่งที่ใหญ่มากๆ ในภาคอีสาน การไปเที่ยวอุดรฯ ในแต่ละครั้งนั้น ถ้าจะตระเวนเที่ยวให้ทั่วถึงคงยากน่าดู ยิ่งถ้าเราเดินทางด้วยรถสาธารณะก็จะเที่ยวได้แค่ในเมืองอุดรธานี แล้วอุดรฯ ก็ขึ้นชื่อเรื่องเที่ยวธรรมชาติไปเที่ยวทัง้ทีจะอยู่แต่ในเมืองได้ไง  เมื่อมีโอกาสออกไปเที่ยว ก็ต้องลุย! เช่ารถเที่ยวขับเองเลย รับรองว่าสะดวก เที่ยวได้แบบตามใจ\r\n<br>\r\nจะเที่ยวให้สบาย อย่างแรกที่ต้องทำก็คือการหาอะไรใส่ท้องกันให้แน่นซะก่อน มาเที่ยวอุดรฯ ทั้งที ก็ควรต้องประเดิมมื้อแรกกันที่อาหารเช้าสไตล์เวียดนามหน่อยดีกว่า กับเมนูไข่กระทะร้านคิงส์โอชา ร้านเด็ดร้านดังที่ต้องมาเช็คอินเมื่อมาเยือนเมืองอุดรธานี นอกจากไข่กระทะแล้ว ร้านนี้ยังมีเมนูให้เลือกชิมอีกเพียบ ไม่ว่าจะเป็นข้าวเปียก โจ๊ก บาแก็ตต์ หรือปอเปี๊ยะ ถ้าอยากเช็คอินกินมื้อเช้าสไตล์อุดรฯ แบบเต็มที่ ต้องแวะร้านนี้ก่อนเลย\r\n<br>\r\nอิ่มท้องเรียบร้อย ก็ออกสตาร์ทกันด้วยการขับรถมุ่งหน้าไปที่อำเภอบ้านดุงเป็นที่แรก กับสถานที่ที่สายมูทั้งหลายรู้จักกันดี และเชื่อว่าเป็นหมุดหมายที่คนซึ่งมีความศรัทธาในพญานาคต้องมา แน่นอนว่าคือที่คำชะโนด ผืนป่าต้นชะโนดแห่งเดียวของประเทศไทยที่มีลักษณะคล้ายเกาะกลางน้ำ ซึ่งมหัศจรรย์ตรงที่ว่ากันว่าด้านล่างของป่าแห่งนี้นั้นไร้พื้นดิน แต่กลับพยุงน้ำหนักของต้นชะโนดจำนวนมากเอาไว้ได้ ในอดีตนั้นที่นี่จึงไม่เคยถูกน้ำท่วมแม้ว่าจะมีน้ำหลากมากมายขนาดไหน เพราะสามารถลอยอยู่เหนือน้ำได้อย่างปลอดภัยตลอดเวลา แต่ภายหลังเกิดการก่อสร้างขึ้นบนเกาะนี้มากมาย ซึ่งน่าจะทำให้น้ำหนักเพิ่มขึ้นจนเกาะนี้ลอยดังเดิมได้ลำบาก ป่าแห่งนี้เต็มไปด้วยตำนานเรื่องเล่าสุดอัศจรรย์มาเนิ่นนาน และถึงคุณไม่เชื่อในเรื่องราวลี้ลับเหล่านั้น เราว่าแค่ไปดูความอัศจรรย์ของธรรมชาติที่สวยงามตรงนี้ก็คุ้มที่สุดแล้ว\r\n<br>\r\nมาถึงบ้านดุงแล้วทั้งที อีกหนึ่งสถานที่ซึ่งน่าแวะมาเยี่ยมเยือนก็คือบ่อเกลือบ้านดุง ซึ่งเป็นแหล่งผลิตเกลือสินเธาว์ที่ใหญ่ที่สุดแห่งหนึ่งของเมืองไทย โดยที่นี่ยังใช้วิธีผลิตแบบพื้นบ้านดั้งเดิมซึ่งดูได้แบบเพลินๆ นะ หรือถ้าเวลาเหลือ ขอแนะนำให้ลองสปาเกลือในหมู่บ้านนี้ซะหน่อยเป็นไร ว่ากันว่าเป็นแห่งเดียวในประเทศไทยด้วยจ้า แถมเค้ายังมีสินค้าจากเกลือให้เลือกช้อปกันหลากหลาย ลองแวะมาสิ คุณอาจเพลินกว่าที่คาดไว้ก็ได้ ใครจะรู้', '2021-09-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) NOT NULL,
  `company_email` varchar(100) NOT NULL COMMENT 'อีเมลบริษัท',
  `company_password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน',
  `company_name` varchar(100) NOT NULL COMMENT 'ชื่อบริษัท',
  `role_id` int(2) NOT NULL DEFAULT 2,
  `company_tel` varchar(12) NOT NULL COMMENT 'เบอร์โทร',
  `company_image` varchar(100) DEFAULT NULL COMMENT 'รูปหรือโลโก้บริษัท',
  `company_detail` varchar(500) DEFAULT NULL COMMENT 'รายละเอียดบริษัท',
  `bank_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อธนาคาร เช่น กสิกร ไทยพาณิชย์',
  `bank_number` varchar(15) DEFAULT NULL COMMENT 'เลขบัญชี',
  `company_license` varchar(100) DEFAULT NULL COMMENT 'รูปใบอนุญาติ ยืนยันบริษัท',
  `company_status` int(1) NOT NULL DEFAULT 0 COMMENT 'สถานะ (0=รอการยืนยันบัญชี 1=ยืนยันเสร็จสิ้น\r\n2=โดนยกเลิก)',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ลงทะเบียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_email`, `company_password`, `company_name`, `role_id`, `company_tel`, `company_image`, `company_detail`, `bank_name`, `bank_number`, `company_license`, `company_status`, `created_at`) VALUES
(1, 'company@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', 'CS14 Company', 2, '0912345678', '20210921103102logoedge.jpg', 'vbxxx', 'กสิกร', '012-3-45678-9', 'testcom2_licen_t1234.jpg', 1, '2021-05-17 19:53:43'),
(44, 'compa1@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', 'comscicompany', 2, '0914789632', '', 'เป็นบริษัทขายทัวร์ที่มีความยอดนิยม', 'กสิกร', '035-789-14567', '20210907053405licentest.jpg', 1, '2021-09-07 10:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `imagetour`
--

CREATE TABLE `imagetour` (
  `image_tour` int(10) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `tour_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagetour`
--

INSERT INTO `imagetour` (`image_tour`, `img_name`, `tour_id`) VALUES
(1, 'img_pattaya1.jpg', 2),
(3, 'img_pattaya3.jpg', 2),
(16, 'img_pattaya2.jpg', 2),
(23, '202109062125211.jpg', 13),
(24, '202109062125212.jpg', 13),
(25, '202109062125213.jpg', 13),
(26, '202109062125214.jpg', 13),
(27, '202109062133261.jpg', 14),
(28, '202109062133262.jpg', 14),
(29, '202109062133263.jpg', 14),
(30, '202109062133264.jpg', 14),
(31, '202109070548411.jpg', 15),
(32, '202109070548412.jpg', 15),
(33, '202109070548413.jpg', 15),
(34, '202109070548414.jpg', 15),
(35, '202109070556351.jpg', 16),
(36, '202109070556352.jpg', 16),
(37, '202109070556353.jpg', 16),
(38, '202109070556354.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(1) NOT NULL DEFAULT 1 COMMENT '1=รอชำระมัดจำ, 2=รอตรวจสอบการชำระค่ามัดจำ, 3= สำเร็จ, 4= ยกเลิก',
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_status`, `id`) VALUES
(115, '2021-09-07 04:14:32', 3, 33),
(116, '2021-09-07 04:15:53', 3, 33),
(117, '2022-01-05 12:48:52', 3, 33),
(118, '2021-09-15 13:51:35', 3, 3),
(119, '2021-09-15 13:51:29', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(10) NOT NULL,
  `tour_id` int(10) NOT NULL,
  `order_price` float NOT NULL COMMENT 'ราคาต่อชิ้น',
  `order_amount` int(10) NOT NULL COMMENT 'จำนวนที่จอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `tour_id`, `order_price`, `order_amount`) VALUES
(115, 15, 7500, 4),
(116, 14, 9000, 5),
(117, 2, 10000, 10),
(118, 14, 9000, 3),
(119, 2, 10000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `img_deposit` varchar(100) DEFAULT NULL COMMENT 'รูปสลิปค่ามัดจำ 80%',
  `comment_deposit` varchar(500) DEFAULT NULL,
  `payment_totalprice` float NOT NULL COMMENT 'ราคาเต็ม',
  `payment_deposit` float NOT NULL COMMENT 'ราคาที่ต้องมัดจำ',
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `img_deposit`, `comment_deposit`, `payment_totalprice`, `payment_deposit`, `order_id`) VALUES
(48, '20210907060159slip.jpg', '', 30000, 24000, 115),
(49, '20210907061355slip.jpg', '', 45000, 36000, 116),
(50, '20210915144717slip.jpg', '', 100000, 80000, 117),
(51, '20210915155059slip.jpg', '', 27000, 21600, 118),
(52, '20210915155110slip.jpg', '', 30000, 24000, 119);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(10) NOT NULL,
  `province_name` varchar(100) NOT NULL COMMENT 'รายชื่อจังหวัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'สำนักปลัดกระทรวงมหาดไทย'),
(3, 'กรมการปกครอง'),
(10, 'จังหวัดกรุงเทพมหานคร'),
(11, 'จังหวัดสมุทรปราการ'),
(12, 'จังหวัดนนทบุรี'),
(13, 'จังหวัดปทุมธานี'),
(14, 'จังหวัดพระนครศรีอยุธยา'),
(15, 'จังหวัดอ่างทอง'),
(16, 'จังหวัดลพบุรี'),
(17, 'จังหวัดสิงห์บุรี'),
(18, 'จังหวัดชัยนาท'),
(19, 'จังหวัดสระบุรี'),
(20, 'จังหวัดชลบุรี'),
(21, 'จังหวัดระยอง'),
(22, 'จังหวัดจันทบุรี'),
(23, 'จังหวัดตราด'),
(24, 'จังหวัดฉะเชิงเทรา'),
(25, 'จังหวัดปราจีนบุรี'),
(26, 'จังหวัดนครนายก'),
(27, 'จังหวัดสระแก้ว'),
(30, 'จังหวัดนครราชสีมา'),
(31, 'จังหวัดบุรีรัมย์'),
(32, 'จังหวัดสุรินทร์'),
(33, 'จังหวัดศรีสะเกษ'),
(34, 'จังหวัดอุบลราชธานี'),
(35, 'จังหวัดยโสธร'),
(36, 'จังหวัดชัยภูมิ'),
(37, 'จังหวัดอำนาจเจริญ'),
(38, 'จังหวัดบึงกาฬ'),
(39, 'จังหวัดหนองบัวลำภู'),
(40, 'จังหวัดขอนแก่น'),
(41, 'จังหวัดอุดรธานี'),
(42, 'จังหวัดเลย'),
(43, 'จังหวัดหนองคาย'),
(44, 'จังหวัดมหาสารคาม'),
(45, 'จังหวัดร้อยเอ็ด'),
(46, 'จังหวัดกาฬสินธุ์'),
(47, 'จังหวัดสกลนคร'),
(48, 'จังหวัดนครพนม'),
(49, 'จังหวัดมุกดาหาร'),
(50, 'จังหวัดเชียงใหม่'),
(51, 'จังหวัดลำพูน'),
(52, 'จังหวัดลำปาง'),
(53, 'จังหวัดอุตรดิตถ์'),
(54, 'จังหวัดแพร่'),
(55, 'จังหวัดน่าน'),
(56, 'จังหวัดพะเยา'),
(57, 'จังหวัดเชียงราย'),
(58, 'จังหวัดแม่ฮ่องสอน'),
(60, 'จังหวัดนครสวรรค์'),
(61, 'จังหวัดอุทัยธานี'),
(62, 'จังหวัดกำแพงเพชร'),
(63, 'จังหวัดตาก'),
(64, 'จังหวัดสุโขทัย'),
(65, 'จังหวัดพิษณุโลก'),
(66, 'จังหวัดพิจิตร'),
(67, 'จังหวัดเพชรบูรณ์'),
(70, 'จังหวัดราชบุรี'),
(71, 'จังหวัดกาญจนบุรี'),
(72, 'จังหวัดสุพรรณบุรี'),
(73, 'จังหวัดนครปฐม'),
(74, 'จังหวัดสมุทรสาคร'),
(75, 'จังหวัดสมุทรสงคราม'),
(76, 'จังหวัดเพชรบุรี'),
(77, 'จังหวัดประจวบคีรีขันธ์'),
(80, 'จังหวัดนครศรีธรรมราช'),
(81, 'จังหวัดกระบี่'),
(82, 'จังหวัดพังงา'),
(83, 'จังหวัดภูเก็ต'),
(84, 'จังหวัดสุราษฎร์ธานี'),
(85, 'จังหวัดระนอง'),
(86, 'จังหวัดชุมพร'),
(90, 'จังหวัดสงขลา'),
(91, 'จังหวัดสตูล'),
(92, 'จังหวัดตรัง'),
(93, 'จังหวัดพัทลุง'),
(94, 'จังหวัดปัตตานี'),
(95, 'จังหวัดยะลา'),
(96, 'จังหวัดนราธิวาส');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(1) NOT NULL,
  `role_name` varchar(100) NOT NULL COMMENT 'ตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'สมาชิก'),
(2, 'บริษัท'),
(3, 'ผู้ดูแลระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(10) NOT NULL,
  `tour_title` varchar(100) NOT NULL COMMENT 'ชื่อที่แสดงหน้าโชว์',
  `img_title` varchar(100) NOT NULL COMMENT 'รูปแพ็คเกจ',
  `tour_name` varchar(100) NOT NULL COMMENT 'ชื่อทัวร์',
  `date_start` date DEFAULT NULL COMMENT 'วันที่เริ่มทัวร์',
  `date_end` date DEFAULT NULL COMMENT 'วันเดินทางกลับ',
  `tour_detail` varchar(5000) DEFAULT NULL COMMENT 'รายละเอียดทัวร์',
  `tour_price` float NOT NULL COMMENT 'ราคาทัวร์',
  `trip_type` varchar(500) DEFAULT NULL COMMENT 'สายการบิน รถทัวร์ ต่างๆ',
  `amount` int(10) NOT NULL COMMENT 'จำนวนคนที่รับ',
  `accommodation` varchar(500) DEFAULT NULL COMMENT 'ที่พัก',
  `img_accommodation` varchar(100) DEFAULT NULL COMMENT 'รูปที่พัก',
  `province_id` int(11) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tour_id`, `tour_title`, `img_title`, `tour_name`, `date_start`, `date_end`, `tour_detail`, `tour_price`, `trip_type`, `amount`, `accommodation`, `img_accommodation`, `province_id`, `company_id`) VALUES
(2, 'พัทยา ซิตี้', '20210904203500pu1.jpg', 'ทัวร์ พัทยา 5วัน 4 คืน เทศกาลสงกรานต์', '2022-04-12', '2022-04-16', 'ไปเที่ยวไหนดีในวันหยุด อยากแค่หนีกรุงไปเที่ยวใกล้ๆ ชื่อของ พัทยา ยังคงมาในอันดับต้น ด้วยความที่พัทยามีความสะดวกและพร้อมไปทุกสิ่ง ไม่ว่าจะเป็นที่พักที่มีให้เลือกหลายแบบหลายราคา ร้านอาหารคาเฟ่สวยๆ รวมทั้งที่เที่ยวอีกหลายแห่ง จึงเป็นเมืองเที่ยวใกล้อีกหนึ่งแห่งที่เหมาะจะชวนเดอะแกงค์ไปฮาเฮ หรือไปพักผ่อนเล่นน้ำริมทะเลแบบครอบครัวไปด้วยกันได้รวบรวมสถานที่ท่องเที่ยวในพัทยาและในละแวกใกล้เคียงที่สามารถเที่ยวชิวๆ ได้ไม่ยาก\r<br>\nวันที่1 ..........\r<br>\nวันที่2 ..........', 10000, 'Air Asia', 377, 'โรงแรมเอ วัน สตาร์', 'hotelpattaya.jpg', 20, 1),
(13, 'ท่องเที่ยว ทำบุญ อยุธยา', '20210906212521title1.jpg', 'ท่องเที่ยวไหว้ ณ อยุธยา 2 วัน 1 คืน', '2022-03-12', '2022-03-13', 'อยุธยา ไม่ได้มีแค่วัดเก่าแก่ โบราณสถานที่ทรงคุณค่าทางประวัติศาสตร์ แต่ยังมีคาเฟ่ร้านอาหาร เกิดขึ้นใหม่มากมายทั้งสวยชิคทันสมัย ที่ผสมผสานกับบรรยากาศของความเป็นเมืองเก่าได้อย่างลงตัว เพราะฉะนั้นการเที่ยวอยุธยาในยุคนี้ ไม่ใช่แค่เพียงไปไหว้พระ 9 วัดแล้วกลับบ้าน แต่ยังสามารถไปนั่งชิล หามุมถ่ายภาพสวยในคาเฟ่ เดินช๊อปของน่าซื้อที่ตลาดดังในบรรยากาศแบบกรุงเก่าที่ขึ้นชื่อในอยุธยา\r<br>\nวันที่ 1 .......\r<br>\nวันที่ 2 .......', 4000, 'รถทัวร์', 100, 'อธิธารา โฮมสเตย์ (Athithara Homestay)', '20210906212521u4.jpg', 14, 1),
(14, 'เที่ยวเชียงใหม่รับอากาศหนาว ', '20210906213326tit1.jpg', 'ท่องเที่ยว เชียงใหม่ 3 วัน 2 คืน', '2023-01-07', '2023-01-09', 'วนเก็บกระเป๋า หยิบกล้องส่องทางไกล แล้วขึ้นเหนือไปสัมผัสธรรมชาติกันหน่อยดีกว่า เพราะตอนนี้ร่างกายต้องการปะทะอากาศดี ๆ เราเลยอยากพาทุกคนออกไปท่องโลก\r<br>\n\r<br>\nได้ใกล้ชิดธรรมชาติจนคุณจะลืมไม่ลงเลย เพราะ แต่ละที่ที่จะเราพาไปสวย สงบ และแน่นอนว่าหาไม่ได้จากในเมืองแน่ แบบไปถึงแล้วเหมือนหลุดไปอีกโลกเลย มีทั้ง คาเฟ่ริมน้ำตก\r<br>\n\r<br>\nนอนชมดาวกลางเขา ไปนอนนวดบนบ้านต้นไม้ ชมดอกซารุระเมืองไทย แช่ออนเซ็นแบบสาวญี่ปุ่น แล้วแวะไปถ่ายรูปที่ทุ่งดอกไม้แบบสวย ๆ จะไปเป็นแก๊ง จะจูงมือแฟน หรือจะพาครอบครัวไป\r<br>\nวันที่1 .........\r<br>\nวันที่2 ........', 9000, 'การบินไทย', 77, 'Stay with Nimman Chiangmai', '20210906213326ho.jpeg', 50, 1),
(15, 'เที่ยวสุราษสุขสำราญ', '20210907054841tit.jpg', 'เที่ยวสุราษ 3 วัน 2 คืน', '2021-12-15', '2021-12-17', '“สุราษฎร์ธานี  เมืองร้อยเกาะ หอยใหญ่ ไข่แดง แหล่งธรรมมะ ”  เป็นจังหวัดที่มีพื้นที่มากที่สุดของภาคใต้  มีหมู่เกาะที่มีชื่อเสียง น้ำทะเลใสหาดทรายขาว อาทิ  เกาะสมุย เกาะพะงัน เกาะเต่า และเกาะนางยวน ซึ่งแต่ละเกาะมีความหลากหลายของธรรมชาติแตกต่างกันไป  ไม่เพียงแต่หมู่เกาะสวยน้อยใหญ่ ที่เรียงรายในน่านน้ำทะเลอ่าวไทยจนกลายเป็นเกาะในฝัน สวรรค์ของคนรักทะเล ในเรื่องของธรรมชาติ ป่าเขา ก็ไม่แพ้ที่ใด  เพราะชื่อ เขื่อนเชี่ยวหลาน  กลายเป็นจุดหมายปลายทางอันดับต้น ที่เหมาะจะปลีกวิเวกหลบลี้ความวุ่นวายมาพักผ่อน นอนแพ เล่นน้ำอย่างมีความสุข  มาสุราษฎร์  เที่ยวไหนดี', 7500, 'การบินไทย', 46, 'Tango Luxe Samui Beach Villa - สุราษฎร์ธานี', '202109070548415164.jpg', 84, 44),
(16, 'สุโขทัยเมืองโบราณ', '20210907055635title.jpg', 'เที่ยวสุโขทัย 3 วัน 2 คืน', '2021-12-16', '2021-12-18', 'สุโขทัย ราชธานีเก่าแก่ที่ครั้งหนึ่งต้องหาโอกาสไปสัมผัสช่วงเวลาแห่งอดีตและร่องรอยทางประวัติศาสตร์ที่ควรค่าแก่การเรียนรู้  ผ่านโบราณสถานสำคัญที่ได้ชื่อว่าเป็นมรดกโลก  อุทยานประวัติศาสตร์สุโขทัย และอุทยานประวัติศาสตร์ศรีสัชนาลัย ไม่เพียงแต่เป็นเมืองที่มีคุณค่าทางประวัติศาสตร์เท่านั้น แต่ยังคงไว้ซึ่งความเป็นวิถีชีวิตแบบดั้งเดิมเรียบง่าย ในบรรยากาศที่ยังคงเป็นธรรมชาติให้ได้ไปสัมผัส รวมที่เที่ยวสุโขทัย สัมผัสเสน่ห์แบบไทยแนบชิดธรรมชาติ', 8000, 'แอร์เอเชีย', 100, 'เดอะ เลเจนด้า สุโขทัย บูติค รีสอร์ท', '20210907055635h.jpg', 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `email` varchar(100) NOT NULL COMMENT 'อีเมล',
  `password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน',
  `tel` varchar(12) DEFAULT NULL COMMENT 'เบอร์โทร',
  `role_id` int(1) DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สมัครสมาชิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `tel`, `role_id`, `remember_token`, `created_at`) VALUES
(1, 'Natchapol', 'Nedruengsaeng', 'admin@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', '0939123707', 3, NULL, '2021-05-08 22:50:12'),
(3, 'Natchapolx', 'Nedruengsaengx', 'test1@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', '0939123707', 1, NULL, '2021-05-09 20:51:32'),
(7, 'Fnametest2', 'lnametest2', 'test2@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', '0939123707', 1, NULL, '2021-05-10 17:52:34'),
(33, 'ณัชพล', 'เนตรเรืองแสง', 'user1@gmail.com', '8f4afcd5b18be97aa5c0e61d87759a0684aeb211668daa35fa32ed132813c0d1', '0939123707', 1, NULL, '2021-09-07 10:52:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_company` (`company_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_companyrole` (`role_id`);

--
-- Indexes for table `imagetour`
--
ALTER TABLE `imagetour`
  ADD PRIMARY KEY (`image_tour`),
  ADD KEY `fk_imgtour` (`tour_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_userid_order` (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_tourid` (`tour_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_orderpay` (`order_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `fk_tourprovince` (`province_id`),
  ADD KEY `fk_tourcompany` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userrole` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `imagetour`
--
ALTER TABLE `imagetour`
  MODIFY `image_tour` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_companyrole` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `imagetour`
--
ALTER TABLE `imagetour`
  ADD CONSTRAINT `fk_imgtour` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`tour_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_userid_order` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_oderdetail` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tourid` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`tour_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_orderpay` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `fk_tourcompany` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `fk_tourprovince` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_userrole` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
