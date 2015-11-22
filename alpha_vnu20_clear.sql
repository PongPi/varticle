-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2014 at 02:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alpha_vnu20_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `AccountGroup`
--

DROP TABLE IF EXISTS `AccountGroup`;
CREATE TABLE IF NOT EXISTS `AccountGroup` (
`id` int(11) NOT NULL,
  `user_id` int(25) DEFAULT NULL,
  `group_id` int(20) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `AccountGroup`
--

INSERT INTO `AccountGroup` (`id`, `user_id`, `group_id`, `status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

DROP TABLE IF EXISTS `Accounts`;
CREATE TABLE IF NOT EXISTS `Accounts` (
`id` int(25) NOT NULL,
  `username` varchar(2350) CHARACTER SET latin2 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`id`, `username`, `name`, `email`, `password`, `status`) VALUES
(1, 'lvduit', 'Van-Duyet Le', 'lvduit08@gmail.com', '399242a6bf3ae9023cb60d856b73433e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Activities`
--

DROP TABLE IF EXISTS `Activities`;
CREATE TABLE IF NOT EXISTS `Activities` (
`id` int(11) NOT NULL,
  `account_id` int(25) DEFAULT NULL,
  `data` mediumtext CHARACTER SET latin1,
  `created` datetime DEFAULT NULL,
  `post_id` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Albums`
--

DROP TABLE IF EXISTS `Albums`;
CREATE TABLE IF NOT EXISTS `Albums` (
`id` int(11) NOT NULL,
  `account_id` int(25) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `desc` text COLLATE utf8_bin NOT NULL,
  `cover` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Albums`
--

INSERT INTO `Albums` (`id`, `account_id`, `date`, `title`, `desc`, `cover`, `status`) VALUES
(2, 1, '2014-11-28 13:26:44', 'Khoảnh khắc đô thị đại học', 'Hồ sơ lưu trữ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Catalogue`
--

DROP TABLE IF EXISTS `Catalogue`;
CREATE TABLE IF NOT EXISTS `Catalogue` (
`id` int(11) NOT NULL,
  `cat_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `cat_description` mediumtext CHARACTER SET utf8,
  `cat_key` char(250) COLLATE utf8_bin DEFAULT NULL,
  `cat_img` text COLLATE utf8_bin,
  `cat_status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Catalogue`
--

INSERT INTO `Catalogue` (`id`, `cat_name`, `cat_description`, `cat_key`, `cat_img`, `cat_status`) VALUES
(8, 'Giới thiệu', 'Giới thiệu', 'about', NULL, 1),
(9, 'Tin tức – Sự kiện', 'Tin tức – Sự kiện', 'information', NULL, 1),
(10, 'Hội nghị - Hội thảo', 'Hội nghị - Hội thảo', 'conference', NULL, 1),
(11, 'Sách VNU20', 'Sách VNU20', 'book', NULL, 1),
(12, 'Phim VNU20', 'Phim VNU20', 'film', NULL, 1),
(13, 'Chuyên đề', 'Chuyên đề', 'topical', NULL, 1),
(14, 'Bản tin-Tạp chí KHCN', 'Bản tin-Tạp chí KHCN', 'magazine', NULL, 1),
(15, 'Chiến lược phát triển', 'Chiến lược phát triển', NULL, NULL, 2),
(18, 'Hồ sơ lưu trữ', 'Hồ sơ lưu trữ', 'hslt', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

DROP TABLE IF EXISTS `Groups`;
CREATE TABLE IF NOT EXISTS `Groups` (
`id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `group_permistion` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`id`, `status`, `group_name`, `group_permistion`) VALUES
(1, 1, 'Manager', 7),
(2, 1, 'Quản lý bài viết', NULL),
(3, 1, 'Quản lý hình ảnh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Meta`
--

DROP TABLE IF EXISTS `Meta`;
CREATE TABLE IF NOT EXISTS `Meta` (
`id` int(11) NOT NULL,
  `post_id` int(250) NOT NULL,
  `meta_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `meta_text` varchar(250) CHARACTER SET utf8 NOT NULL,
  `meta_link` varchar(250) CHARACTER SET utf8 NOT NULL,
  `meta_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Meta`
--

INSERT INTO `Meta` (`id`, `post_id`, `meta_name`, `meta_text`, `meta_link`, `meta_status`) VALUES
(8, 11, 'Link', 'asdasd', 'asadsaaaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

DROP TABLE IF EXISTS `Permissions`;
CREATE TABLE IF NOT EXISTS `Permissions` (
`id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Permissions`
--

INSERT INTO `Permissions` (`id`, `group_id`, `role_id`, `status`) VALUES
(7, 1, 15, 1),
(8, 1, 1, 1),
(9, 1, 5, 1),
(10, 1, 6, 1),
(11, 1, 7, 1),
(12, 1, 8, 1),
(13, 1, 9, 1),
(14, 1, 10, 1),
(15, 1, 11, 1),
(16, 1, 12, 1),
(17, 1, 13, 1),
(18, 1, 14, 1),
(31, 1, 16, 1),
(32, 1, 17, 1),
(33, 1, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Photos`
--

DROP TABLE IF EXISTS `Photos`;
CREATE TABLE IF NOT EXISTS `Photos` (
`id` int(11) NOT NULL,
  `account_id` int(25) DEFAULT NULL,
  `album_id` int(25) DEFAULT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

DROP TABLE IF EXISTS `Posts`;
CREATE TABLE IF NOT EXISTS `Posts` (
`id` int(11) NOT NULL,
  `account_id` int(25) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `post_img` varchar(255) COLLATE utf8_bin NOT NULL,
  `post_desc` text COLLATE utf8_bin NOT NULL,
  `post_content` mediumtext CHARACTER SET utf8,
  `post_status` tinyint(1) DEFAULT '1',
  `post_cat` int(255) DEFAULT NULL,
  `post_type` varchar(20) CHARACTER SET utf8 DEFAULT 'post'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`id`, `account_id`, `post_date`, `post_title`, `post_img`, `post_desc`, `post_content`, `post_status`, `post_cat`, `post_type`) VALUES
(1, 1, '2014-11-14 00:00:00', 'Giới thiệu chung về ĐHQG-HCM 20 năm xây dựng - Phát triển - Hội Nhập', 'http://www.vnuhcm.edu.vn/Resources/image/images/TinTuc/dhqg.jpg', 'Đại học Quốc gia Thành phố Hồ Chí Minh (ĐHQG-HCM) được thành lập ngày 27 tháng 01 năm 1995 theo Nghị định 16/CP của Chính phủ trên cơ sở sắp xếp 9 trường đại học lại thành 8 trường đại học thành viên và chính thức ra mắt vào ngày 6 tháng 02 năm 1996.', 'Đại học Quốc gia Thành phố Hồ Chí Minh (ĐHQG-HCM) được thành lập ngày 27 tháng 01 năm 1995 theo Nghị định 16/CP của Chính phủ trên cơ sở sắp xếp 9 trường đại học lại thành 8 trường đại học thành viên và chính thức ra mắt vào ngày 6 tháng 02 năm 1996.\r\n<br>\r\nNăm 2001, ĐHQG-HCM được tổ chức lại theo Quyết định số 15/2001/QĐ-TTg ngày 12 tháng 02 năm 2001 của Thủ tướng Chính phủ. ĐHQG-HCM cũng như ĐHQG Hà Nội có Quy chế tổ chức và hoạt động riêng. Theo đó, ĐHQG-HCM là một trung tâm đào tạo đại học, sau đại học và nghiên cứu khoa học - công nghệ đa ngành, đa lĩnh vực, chất lượng cao, đạt trình độ tiên tiến, làm nòng cốt cho hệ thống giáo dục đại học, đáp ứng nhu cầu phát triển kinh tế - xã hội.', 1, 8, 'post'),
(2, 1, '2014-11-14 00:00:00', 'Triển lãm giới thiệu sản phầm sáng tạo và kết nối doanh nghiệp - DHQG HCM', 'http://www.vnuhcm.edu.vn/Resources/image/images/TinTuc/dhqg.jpg', '', 'http://www.vnuhcm.edu.vn/?ArticleId=1b64c3e0-75c7-4372-a8ca-d504f1059e7a', 1, 9, 'link'),
(3, 1, '2014-11-14 00:00:00', 'Phó Thủ tướng Vũ Đức Đam tham dự Lễ khai khóa - 2014', 'http://www.webpagescreenshot.info/i3/546604a2bd3ec7-13559232', 'Sáng ngày 3/10, Phó Thủ tướng Vũ Đức Đam đã tham dự Lễ khai khóa và có buổi làm việc với cán bộ chủ chốt ĐHQG-HCM về tình hình xây dựng - phát triển ĐHQG-HCM và các mô hình mới được áp dụng hiệu quả tại đơn vị.', 'http://www.vnuhcm.edu.vn/?ArticleId=ce86f7ca-f88f-4f99-920e-5c263e3db145', 1, 9, 'link'),
(4, 1, '2014-11-14 00:00:00', 'Lễ kỉ niệm ngày Nhà giáo Việt Nam 20-11', 'http://www.vnuhcm.edu.vn/Resources/ImagesInPortlet/ImageSlide/01.jpg', 'Sáng ngày 3/10, Phó Thủ tướng Vũ Đức Đam đã tham dự Lễ khai khóa và có buổi làm việc với cán bộ chủ chốt ĐHQG-HCM về tình hình xây dựng - phát triển ĐHQG-HCM và các mô hình mới được áp dụng hiệu quả tại đơn vị.', 'http://www.vnuhcm.edu.vn/?ArticleId=ce86f7ca-f88f-4f99-920e-5c263e3db145', 1, 9, 'link'),
(5, 1, '2014-11-15 00:00:00', 'Đèn đường tự bật khi phương tiện đến gần', 'http://khoahocvacongnghevietnam.com.vn/images/stories/thang-11-2014/1411-den%20duong%20thong%20minh.jpg', 'Các nhà khoa học Đan Mạch vừa tìm ra công nghệ đèn đường thông minh nhằm góp phần biến Thủ đô Copenhagen trở thành thành phố đầu tiên trên thế giới có lượng khí carbon trung hòa vào năm 2025 và tiết kiệm điện', 'Các nhà khoa học Đan Mạch vừa tìm ra công nghệ đèn đường thông minh nhằm góp phần biến Thủ đô Copenhagen trở thành thành phố đầu tiên trên thế giới có lượng khí carbon trung hòa vào năm 2025 và tiết kiệm điện.\r\nalt\r\nĐèn đường đang được nghiên cứu tự điều chỉnh độ sáng\r\nCác cột đèn được lắp đặt cảm ứng để chúng chỉ hoạt động khi phát hiện có người đi bộ hay điều khiển phương tiện giao thông đến gần. Công nghệ này cho phép giảm ánh sáng các đèn đường khi không có xe cộ và người qua lại. Tuy nhiên, tầm nhìn của người điều khiển phương tiện vẫn luôn được đảm bảo để họ cảm thấy an toàn. Các cảm biến theo dõi mật độ giao thông, chất lượng không khí, tiếng ồn, thời tiết sẽ điều chỉnh độ sáng hợp lý nhất để giảm chi phí và khí thải mà vẫn đảm bảo nguồn sáng cần thiết.\r\nKỹ sư trưởng Kim Brostrom thuộc Phòng Thí nghiệm chiếu sáng ngoài trời Đan Mạch cho biết: “Nhóm nghiên cứu đã lắp đặt trên 280 cây cột tín hiệu với 50 giải pháp và 10 hệ thống quản lý điện khác nhau. Chúng tôi cũng có rất nhiều cảm biến bật/ tắt ở khu vực này".\r\nBên cạnh đó, một số cột đèn tín hiệu còn được lắp thêm máy phát điện sử dụng sức gió hoặc năng lượng mặt trời. Các nhà khoa học ước tính, nhờ việc lắp đặt đèn giao thông thông minh khắp thành phố mà Copenhagen đã tiết kiệm được đến 85% chi phí chiếu sáng trong đô thị.\r\nĐặc biệt, hệ thống này có thể được điều khiển dễ dàng qua việc kết nối với máy tính bảng hoặc điện thoại thông minh.', 1, 14, 'post'),
(6, 1, '2014-11-15 00:00:00', 'Trung Quốc trình làng xe tự hành sao Hỏa', 'http://khoahocvacongnghevietnam.com.vn/images/stories/thang-11-2014/1411-xe%20tu%20hanh%20sao%20hoa.jpg', 'Trung Quốc hôm qua công bố phiên bản mẫu chiếc xe tự hành trên bề mặt sao Hỏa, một phần trong kế hoạch chinh phục hành tinh Đỏ trong tương lai.\r\n', 'Phiên bản nguyên mẫu xe tự hành sao Hỏa của Trung Quốc. Ảnh: Reuters\r\nPhiên bản nguyên mẫu được trưng bày tại một triển lãm hàng không ở thành phố Chu Hải, tỉnh Quảng Đông. Xe tự hành sao Hỏa có 6 bánh, về cơ bản gần giống xe tự hành Mặt Trăng mang tên Thỏ Ngọc. Nó được trang bị các tấm pin mặt trời cánh rộng, với camera gắn ở phía trên và cánh tay robot cố định ở đằng trước.\r\nMột số thay đổi sẽ được áp dụng để phù hợp với điều kiện môi trường khác biệt và địa hình trên hành tinh đỏ. Bản thiết kế và các chức năng hoạt động chính thức sẽ được quyết định sau quá trình nghiên cứu thử nghiệm.\r\nTheo Xinhua, Trung Quốc hiện chưa công bố kế hoạch chính thức liên quan đến tàu thăm dò sao Hỏa. Tuy nhiên, Ouyang Ziyuan - một nhà khoa học hàng đầu trong sứ mệnh thăm dò Mặt Trăng của nước này cho biết, Trung Quốc dự định sẽ đưa thiết bị tự hành lên sao Hỏa năm 2020. Hoạt động thu thập dữ liệu và đưa xe tự hành trở về sẽ được thực hiện trong khoảng 10 năm sau đó.\r\nKể từ năm 1960, các quốc gia trên thế giới đã thực hiện 43 sứ mệnh sao Hỏa, trong đó có 19 chương trình thành công.', 1, 14, 'post'),
(7, 1, '2014-11-15 00:00:00', 'VIỆN HÀN LÂM KH&CN VIỆT NAM VÀ ĐHQG-HCM: Ưu tiên nghiên cứu Khoa học Vũ trụ và Công nghệ Sinh học', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/Ky%20ket%20vien%20han%20lam%20KHVN.JPG', 'Nghiên cứu khoa học Vũ trụ và Công nghệ Sinh học là hai nội dung chính yếu trong hợp tác đầu tiên giữa Viện Hàn lâm KH&CN Việt Nam (VAST) và ĐHQG-HCM vừa được ký kết vào ngày 11/9/2014.\r\n', 'Theo đó, ĐHQG-HCM và VAST sẽ hợp tác về lĩnh vực khoa học công nghệ (KHCN) và công tác đào tạo.\r\n\r\n Về KHCN, hai bên sẽ phối hợp tạo ra các sản phẩm KHCN mang thương hiệu chung, thực hiện một số nghiên cứu liên ngành; tăng cường khai thác trang thiết bị tại các phòng thí nghiệm; trao đổi thông tin bằng các ấn bản khoa học và học liệu. Hai bên xem xét việc phát triển chất lượng nguồn nhân lực KHCN thông qua việc trao đổi chuyên gia dưới dạng hợp đồng giảng dạy hoặc nghiên cứu. Dựa trên Luật Sở hữu Trí tuệ, hai bên cũng thỏa thuận đồng khai thác các kết quả nghiên cứu để đưa ra thị trường những sản phẩm khoa học ứng dụng. \r\n\r\n  Về hoạt động đào tạo, hai bên liên kết đào tạo bậc đại học và sau đại học dưới hình thức nhận hướng dẫn và đồng hướng dẫn các luận văn, luận án khoa học; tiếp nhận sinh viên, học viên cao học và nghiên cứu sinh thực tập tại các phòng thí nghiệm; phối hợp xây dựng chuyên ngành đào tạo mới. Hai bên xem xét thành lập các khoa phối thuộc nhằm khai thác lợi thế của mỗi bên thông qua hình thức trưởng khoa kiêm nhiệm; công nhận chương trình đào tạo, chứng chỉ và bằng cấp của nhau theo từng trường hợp cụ thể.\r\n', 1, 10, 'post'),
(8, 1, '2014-11-15 00:00:00', 'ĐHQG-HCM: Đánh giá AUN- QA thêm 2 chương trình đào tạo', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(5).JPG', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', '<p>Ng&agrave;y 8/10, ĐHQG-HCM đ&atilde; tổ chức khai mạc hoạt động đ&aacute;nh gi&aacute; ngo&agrave;i theo ti&ecirc;u chuẩn kiểm định chất lượng của Mạng lưới c&aacute;c trường đại học Đ&ocirc;ng Nam &Aacute; (AUN) cho 2 chương tr&igrave;nh đ&agrave;o tạo: Quản l&yacute; C&ocirc;ng nghiệp (Khoa Quản l&yacute; C&ocirc;ng nghiệp), Kỹ thuật Điều khiển v&agrave; Tự động h&oacute;a (Khoa Điện &ndash; Điện tử) của Trường ĐH B&aacute;ch khoa.</p>\n\n<p><img src="http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(6).JPG" /></p>\n\n<p style="text-align:justify">Tham gia đợt đ&aacute;nh gi&aacute; n&agrave;y c&oacute; TS. Choltis Dhirathiti &ndash; Ph&oacute; Gi&aacute;m đốc điều h&agrave;nh AUN; &ocirc;ng Korn Ratanagosoom, b&agrave; Ing-orn Jeerararuensak- đại diện ban Thư k&yacute; AUN; c&aacute;c chuy&ecirc;n gia:&nbsp; PGS.TS Damrong Thawesaengskulthai, TS. Robert Roleda, GS.TS Fauza Ab. Ghaffar, PGS.TS Chavalit Wongse-ek.</p>\n\n<p style="text-align:justify">Về ph&iacute;a ĐHQG-HCM c&oacute; PGS.TS Nguyễn Hội Nghĩa, Ph&oacute; Gi&aacute;m đốc ĐHQG-HCM, l&atilde;nh đạo Trung t&acirc;m Khảo th&iacute; v&agrave; Đ&aacute;nh gi&aacute; chất lượng đ&agrave;o tạo, c&aacute;c ban chức năng ĐHQG-HCM, c&ugrave;ng Ban Gi&aacute;m hiệu, c&aacute;c c&aacute;n bộ, giảng vi&ecirc;n v&agrave; đại diện l&atilde;nh đạo hai khoa c&oacute; chương tr&igrave;nh được đ&aacute;nh gi&aacute; của Trường ĐH B&aacute;ch khoa.</p>\n\n<p>Tại phi&ecirc;n khai mạc, Đo&agrave;n đ&atilde; nghe TS. Vũ Thế Dũng, Ph&oacute; Hiệu trưởng Trường ĐH B&aacute;ch khoa giới thiệu kh&aacute;i qu&aacute;t về quy m&ocirc;, cơ sở vật chất, t&igrave;nh h&igrave;nh hoạt động của nh&agrave; trường. Sau đ&oacute;, Đo&agrave;n đ&atilde; c&oacute; buổi l&agrave;m việc với l&atilde;nh đạo Trường ĐH B&aacute;ch khoa, l&atilde;nh đạo Khoa Điện &ndash; Điện tử v&agrave; Quản l&yacute; C&ocirc;ng nghiệp; phỏng vấn nh&acirc;n vi&ecirc;n hỗ trợ v&aacute;c ph&ograve;ng, ban, khoa; phỏng vấn cựu sinh vi&ecirc;n, c&aacute;c nh&agrave; tuyển dụng v&agrave; tham quan cơ sở vật chất của Trường ở cơ sở L&yacute; Thường Kiệt.</p>\n', 1, 10, 'post'),
(9, 1, '2014-11-15 00:00:00', 'VIỆN HÀN LÂM KH&CN VIỆT NAM VÀ ĐHQG-HCM: Ưu tiên nghiên cứu Khoa học Vũ trụ và Công nghệ Sinh học', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/Ky%20ket%20vien%20han%20lam%20KHVN.JPG', 'Nghiên cứu khoa học Vũ trụ và Công nghệ Sinh học là hai nội dung chính yếu trong hợp tác đầu tiên giữa Viện Hàn lâm KH&CN Việt Nam (VAST) và ĐHQG-HCM vừa được ký kết vào ngày 11/9/2014.\r\n', 'Theo đó, ĐHQG-HCM và VAST sẽ hợp tác về lĩnh vực khoa học công nghệ (KHCN) và công tác đào tạo.\r\n\r\n Về KHCN, hai bên sẽ phối hợp tạo ra các sản phẩm KHCN mang thương hiệu chung, thực hiện một số nghiên cứu liên ngành; tăng cường khai thác trang thiết bị tại các phòng thí nghiệm; trao đổi thông tin bằng các ấn bản khoa học và học liệu. Hai bên xem xét việc phát triển chất lượng nguồn nhân lực KHCN thông qua việc trao đổi chuyên gia dưới dạng hợp đồng giảng dạy hoặc nghiên cứu. Dựa trên Luật Sở hữu Trí tuệ, hai bên cũng thỏa thuận đồng khai thác các kết quả nghiên cứu để đưa ra thị trường những sản phẩm khoa học ứng dụng. \r\n\r\n  Về hoạt động đào tạo, hai bên liên kết đào tạo bậc đại học và sau đại học dưới hình thức nhận hướng dẫn và đồng hướng dẫn các luận văn, luận án khoa học; tiếp nhận sinh viên, học viên cao học và nghiên cứu sinh thực tập tại các phòng thí nghiệm; phối hợp xây dựng chuyên ngành đào tạo mới. Hai bên xem xét thành lập các khoa phối thuộc nhằm khai thác lợi thế của mỗi bên thông qua hình thức trưởng khoa kiêm nhiệm; công nhận chương trình đào tạo, chứng chỉ và bằng cấp của nhau theo từng trường hợp cụ thể.\r\n', 1, 10, 'post'),
(10, 1, '2014-11-15 00:00:00', 'ĐHQG-HCM: Đánh giá AUN- QA thêm 2 chương trình đào tạo', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(5).JPG', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', '<p>Ng&agrave;y 8/10, ĐHQG-HCM đ&atilde; tổ chức khai mạc hoạt động đ&aacute;nh gi&aacute; ngo&agrave;i theo ti&ecirc;u chuẩn kiểm định chất lượng của Mạng lưới c&aacute;c trường đại học Đ&ocirc;ng Nam &Aacute; (AUN) cho 2 chương tr&igrave;nh đ&agrave;o tạo: Quản l&yacute; C&ocirc;ng nghiệp (Khoa Quản l&yacute; C&ocirc;ng nghiệp), Kỹ thuật Điều khiển v&agrave; Tự động h&oacute;a (Khoa Điện &ndash; Điện tử) của Trường ĐH B&aacute;ch khoa.</p>\n\n<p><img src="http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(6).JPG" /></p>\n\n<p style="text-align:justify">Tham gia đợt đ&aacute;nh gi&aacute; n&agrave;y c&oacute; TS. Choltis Dhirathiti &ndash; Ph&oacute; Gi&aacute;m đốc điều h&agrave;nh AUN; &ocirc;ng Korn Ratanagosoom, b&agrave; Ing-orn Jeerararuensak- đại diện ban Thư k&yacute; AUN; c&aacute;c chuy&ecirc;n gia:&nbsp; PGS.TS Damrong Thawesaengskulthai, TS. Robert Roleda, GS.TS Fauza Ab. Ghaffar, PGS.TS Chavalit Wongse-ek.</p>\n\n<p style="text-align:justify">Về ph&iacute;a ĐHQG-HCM c&oacute; PGS.TS Nguyễn Hội Nghĩa, Ph&oacute; Gi&aacute;m đốc ĐHQG-HCM, l&atilde;nh đạo Trung t&acirc;m Khảo th&iacute; v&agrave; Đ&aacute;nh gi&aacute; chất lượng đ&agrave;o tạo, c&aacute;c ban chức năng ĐHQG-HCM, c&ugrave;ng Ban Gi&aacute;m hiệu, c&aacute;c c&aacute;n bộ, giảng vi&ecirc;n v&agrave; đại diện l&atilde;nh đạo hai khoa c&oacute; chương tr&igrave;nh được đ&aacute;nh gi&aacute; của Trường ĐH B&aacute;ch khoa.</p>\n\n<p>Tại phi&ecirc;n khai mạc, Đo&agrave;n đ&atilde; nghe TS. Vũ Thế Dũng, Ph&oacute; Hiệu trưởng Trường ĐH B&aacute;ch khoa giới thiệu kh&aacute;i qu&aacute;t về quy m&ocirc;, cơ sở vật chất, t&igrave;nh h&igrave;nh hoạt động của nh&agrave; trường. Sau đ&oacute;, Đo&agrave;n đ&atilde; c&oacute; buổi l&agrave;m việc với l&atilde;nh đạo Trường ĐH B&aacute;ch khoa, l&atilde;nh đạo Khoa Điện &ndash; Điện tử v&agrave; Quản l&yacute; C&ocirc;ng nghiệp; phỏng vấn nh&acirc;n vi&ecirc;n hỗ trợ v&aacute;c ph&ograve;ng, ban, khoa; phỏng vấn cựu sinh vi&ecirc;n, c&aacute;c nh&agrave; tuyển dụng v&agrave; tham quan cơ sở vật chất của Trường ở cơ sở L&yacute; Thường Kiệt.</p>\n', 1, 10, 'post');
INSERT INTO `Posts` (`id`, `account_id`, `post_date`, `post_title`, `post_img`, `post_desc`, `post_content`, `post_status`, `post_cat`, `post_type`) VALUES
(11, 1, '2014-11-19 00:00:00', 'DHQG TP. Hồ Chí Minh công bố chương trình hướng tới kỷ niệm 20 năm thành lập', 'http://hcmussh.edu.vn/Resources/Images/HomePage/Tran%20Nam/VNU%2020%20-%20color%20small.jpg', 'Ngày 26-6-2014, PGS.TS Phan Thanh Bình, Uỷ viên BCH Trung ương Đảng, Giám đốc Đại học Quốc gia thành phố Hồ Chí Minh đã công bố chuỗi sự kiện kỷ niệm 20 năm thành lập Đại học Quốc gia thành phố Hồ Chí Minh (27/01/1995 - 27/01/2015).', '<div class="ct_tin">                               <p style="padding: 5px 0px 10px 0px; font-weight: bold; ">                    <span style="">Ngày 26-6-2014, PGS.TS Phan Thanh Bình, Uỷ viên BCH Trung ương Đảng, Giám đốc Đại học Quốc gia thành phố Hồ Chí Minh đã công bố chuỗi sự kiện kỷ niệm 20 năm thành lập Đại học Quốc gia thành phố Hồ Chí Minh (27/01/1995 - 27/01/2015).</span></p>                <p>                    </p><p style="text-align: justify;"><span style=""><span style="">Ngày 27/01/1995, Chính phủ đã ký Nghị định số 16-CP thành lập Đại học Quốc gia thành phố Hồ Chí Minh (ĐHQG-HCM). ĐHQG-HCM là một trong hai ĐHQG của Việt Nam được Đảng và Nhà nước ưu tiên đầu tư xây dựng và phát triển thành trung tâm đào tạo đại học, sau đại học, nghiên cứu khoa học và công nghệ đa ngành, đa lĩnh vực chất lượng cao, đạt trình độ tiên tiến, làm nòng cốt trong hệ thống giáo dục đại học, đáp ứng nhu cầu phát triển kinh tế - xã hội. </span><br></span></p><p style="text-align: justify;"><span style="">Trải qua 20 năm xây dựng và phát triển, ĐHQG-HCM đã không ngừng phấn đấu, vươn lên để khẳng định vị trí vai trò của mình trong hệ thống Giáo dục đại học Việt Nam, từng bước đạt được những thành quả trong công tác đào tạo, nghiên cứu khoa học mở rộng quan hệ hợp tác với các địa phương, quốc tế, qua đó, vị thế của ĐHQG-HCM đã được khẳng định ở trong nước, khu vực và thế giới. </span></p><p style="text-align: justify;"><span style="">Ngày 27/01/2015, ĐHQG-HCM sẽ trang trọng tổ chức Lễ kỷ niệm 20 năm thành lập. ĐHQG-HCM cũng đã triển khai kế hoạch về việc tổ chức chuỗi sự kiện từ tháng 5/2014 đến tháng 01/2015 với các hoạt động chính như sau: </span></p><ol>    <li><span style="">Sự kiện cấp ĐHQG-HCM: Bao gồm các Hội nghị, Hội thảo Khoa học, triển lãm thành quả KHCN, đào tạo; các hoạt động thường niên như Lễ khai khóa, Lễ 20/11…gắn với chủ đề 20 năm xây dựng-phát triển-hội nhập. (các hoạt động đính kèm).</span></li>    <li><span style="">Hoàn thiện cơ sở vật chất, công trình chào mừng trong đó tập trung vào 3 mảng: Hoàn thiện Nhà công vụ cho cán bộ, giảng viên trẻ; hoàn thiện khu Ký túc xá phục vụ sinh viên; một số cảnh quan, điểm nhấn trong khu đô thị ĐHQG-HCM.</span></li>    <li><span style="">Các hoạt động, hỗ trợ chào mừng cấp ĐHQG-HCM cũng như tại các đơn vị thành viên và trực thuộc. </span></li></ol><p style="text-align: justify;"><span style="">Lễ kỷ niệm 20 năm thành lập ĐHQG-HCM được tổ chức nhằm khơi dậy niềm tự hào của cán bộ, giảng viên, sinh viên ĐHQG-HCM, qua đó nâng cao tinh thần, trách nhiệm của mỗi người trong việc góp phần vào sự phát triển ĐHQG-HCM. Hoạt động này sẽ hình thành truyền thống tốt đẹp, qua đó quảng bá hình ảnh ĐHQG-HCM đến rộng rãi xã hội, quốc tế. Đồng thời cũng là hoạt động chào mừng 70 năm thành lập nước (1945-2015) và 40 năm giải phóng đất nước.</span></p><p style="text-align: justify;"><span style="">Lễ kỷ niệm 20 năm thành lập ĐHQG-HCM cũng là một dịp để ĐHQG-HCM nói riêng và giáo dục Đại học Việt Nam nói chung nhìn nhận thành quả của quá trình kết tinh và phát triển của Giáo dục Đại học Miền Nam kể từ giữa đầu thế kỷ 20 với các tên gọi rất thân quen như Trường Đại học Văn khoa, Cao đẳng khoa học, Trường Kỹ thuật Phú Thọ…</span></p><p style="text-align: justify;"><span style="">Với chủ đề “Đại học Quốc gia TP.HCM 20 năm xây dựng-phát triển-hội nhập”,&nbsp; Lễ kỷ niệm 20 năm thành lập ĐHQG-HCM là một hoạt động có tính chất đặc biệt trong toàn hệ thống ĐHQG-HCM. Ban Giám đốc ĐHQG-HCM kêu gọi quý Thầy Cô, cán bộ, công chức, viên chức và toàn thể các bạn sinh viên, học viên cao học, nghiên cứu sinh tham gia vào chuỗi hoạt động theo tính chất chuyên môn của mình, đồng thời mỗi người có những đóng góp thiết thực để góp phần xây dựng ĐHQG-HCM ngày càng phát triển.</span></p><p style="text-align: center;"><center><img alt="" src="http://hcmussh.edu.vn/Resources/Images/HomePage/Tran%20Nam/VNU%2020%20-%20color%20small.jpg" style="width: 358px;"><center><br><span style=""><strong>Logo Kỷ niệm 20 năm thành lập ĐHQG-HCM</strong></span></p><table border="0" cellspacing="0" cellpadding="0" width="631" style="width: 472.9pt; margin-left: 0.9pt; border-collapse: collapse;">    <tbody>        <tr style="height: 32.25pt;">            <td style="width: 472.9pt; padding: 0in 5.4pt; height: 32.25pt;"><span style="font-size: 13pt; "><br clear="all" style="page-break-before: always;">            </span>            <p style="text-align: center;"><strong><span style="">NỘI DUNG HOẠT ĐỘNG CHÀO MỪNG 20 NĂM THÀNH LẬP </span></strong></p>            <p style="text-align: center;"><strong><span style="">ĐẠI HỌC QUỐC GIA TP.HỒ CHÍ MINH</span></strong></p>            </td>        </tr>        <tr style="height: 16.5pt;">            <td style="width: 472.9pt; padding: 0in 5.4pt; height: 16.5pt; white-space: nowrap;">            <p style="text-align: center;"><strong><span style="">CHỦ ĐỀ:</span></strong></p>            <p style="text-align: center;"><strong><span style="">ĐẠI HỌC QUỐC GIA TP.HỒ CHÍ MINH</span></strong></p>            <p style="text-align: center;"><strong><span style="">20 NĂM XÂY DỰNG - PHÁT TRIỂN - HỘI NHẬP</span></strong></p>            </td>        </tr>    </tbody></table><table border="0" cellspacing="0" cellpadding="0" width="636" style="width: 477pt; margin-left: 0.9pt; border-collapse: collapse;">    <tbody>        <tr style="height: 0.05in;">            <td style="width: 39.25pt; padding: 0in 5.4pt; height: 0.05in; white-space: nowrap;"></td>            <td valign="bottom" style="width: 298.25pt; padding: 0in 5.4pt; height: 0.05in;"></td>            <td style="width: 139.5pt; padding: 0in 5.4pt; height: 0.05in; white-space: nowrap;"></td>            <td style="height: 0.05in; border: none; width: 0px;"></td>        </tr>        <tr style="height: 22.4pt;">            <td rowspan="3" style="width: 39.25pt; border-style: solid; border-color: windowtext windowtext black; border-width: 1pt; padding: 0in 5.4pt; height: 22.4pt; white-space: nowrap; background: #fcd5b4;">            <p style="text-align: center;"><strong><span style="">STT</span></strong></p>            </td>            <td rowspan="3" style="width: 298.25pt; border-style: solid solid solid none; border-top-color: windowtext; border-top-width: 1pt; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.4pt; background: #fcd5b4;">            <p style="text-align: center;"><strong><span style="">NỘI DUNG</span></strong></p>            </td>            <td rowspan="3" style="width: 139.5pt; border-style: solid solid solid none; border-top-color: windowtext; border-top-width: 1pt; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.4pt; background: #fcd5b4;">            <p style="text-align: center;"><strong><span style="">THỜI GIAN DIỄN RA SỰ KIỆN</span></strong></p>            </td>            <td style="height: 22.4pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 14.95pt;">            <td style="height: 14.95pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 14.95pt;">            <td style="height: 14.95pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 22.45pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-left-color: windowtext; border-left-width: 1pt; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.45pt;">            <p style="margin-left: 12.6pt;"><strong><span style="">I</span></strong></p>            </td>            <td colspan="2" style="width: 437.75pt; border-style: none solid solid none; border-bottom-color: black; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.45pt;">            <p><strong><span style="">SỰ KIỆN CẤP ĐHQG-HCM</span></strong></p>            </td>            <td style="height: 22.45pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 30.55pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 30.55pt; white-space: nowrap; background: white;">            <p style="text-align: center;"><span style="">1</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 30.55pt; background: white;">            <p><span style="">Triển lãm giới thiệu sản phẩm sáng tạo và kết nối <br>            doanh nghiệp-ĐHQG-HCM</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 30.55pt; background: white;">            <p style="text-align: center;"><span style="">Tháng 5/2014</span></p>            </td>            <td style="height: 30.55pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 31.45pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 31.45pt; white-space: nowrap; background: white;">            <p style="text-align: center;"><span style="">2</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31.45pt; background: white;">            <p><span style="">Hội thảo Quốc gia "Hội nhập Quốc tế trong quá trình đổi mới GDĐH tại VN"</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31.45pt; background: white;">            <p style="text-align: center;"><span style="">Tháng 6/2014</span></p>            </td>            <td style="height: 31.45pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.05pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.05pt; white-space: nowrap; background: white;">            <p style="text-align: center;"><span style="">3</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.05pt; background: white;">            <p><span style="">Hội thảo khoa học (BME - Kỹ thuật Y sinh)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.05pt; background: white;">            <p style="text-align: center;"><span style="">Tháng 6/2014</span></p>            </td>            <td style="height: 17.05pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">4</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Liên hoan Sinh viên quốc tế VNU-HCM</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 9/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">5</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Hội thảo ĐHQG-HCM phục vụ cộng đồng</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">6</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Lễ Khai khóa 2014</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">7</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Hội thảo Đào tạo về CDIO (thí điểm -&gt; đại trà)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 11/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">8</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Lễ 20/11/2014</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 11/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">9</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Hội thảoXây dựng và phát triển đội ngũ ĐHQG-HCM</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 11/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">10</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Liên hoan sinh viên 5 Tốt&nbsp; ĐHQG-HCM(5 năm)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 12/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">11</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">End Year Reception </span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 12/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 22pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 22pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">12</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22pt;">            <p><span style="">Triển lãm thành quả KHCN</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22pt;">            <p style="text-align: center;"><span style="">Tháng 01/2015</span></p>            </td>            <td style="height: 22pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.95pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.95pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">13</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.95pt;">            <p><span style="">Hội thảo CB Khoa học trẻ ĐHQG-HCM</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.95pt;">            <p style="text-align: center;"><span style="">Tháng 01/2015</span></p>            </td>            <td style="height: 17.95pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 31pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 31pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">14</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31pt;">            <p><span style="">Lễ kỷ niệm 20 năm thành lập ĐHQG-HCM (27/1/2014)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31pt;">            <p style="text-align: center;"><span style="">Tháng 01/2015</span></p>            </td>            <td style="height: 31pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 26.05pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 26.05pt; white-space: nowrap;">            <p style="text-align: center;"><strong><span style="">II</span></strong></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 26.05pt;">            <p><strong><span style="">CÁC HOẠT ĐỘNG HỖ TRỢ</span></strong></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 26.05pt;"></td>            <td style="height: 26.05pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">15</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Logo + sản phẩm phụ kiện (áo, bút viết,….)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 5/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">16</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p><span style="">Danh hiệu thi đua</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt;">            <p style="text-align: center;"><span style="">Tháng 01/2015</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 25.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 25.5pt; white-space: nowrap;">            <p style="text-align: center;"><strong><span style="">III</span></strong></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 25.5pt;">            <p><strong><span style="">CÁC HOẠT ĐỘNG KHÁC</span></strong></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 25.5pt;"></td>            <td style="height: 25.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 18.85pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 18.85pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">17</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 18.85pt;">            <p><span style="">Phòng Truyền thống ĐHQG-HCM</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 18.85pt;">            <p style="text-align: center;"><span style="">Tháng 1 - tháng 12/2014</span></p>            </td>            <td style="height: 18.85pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 26.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 26.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">18</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 26.5pt;">            <p><span style="">Cuộc thi "Ý tưởng sáng tạo trẻ ĐHQG-HCM" lần III năm 2014</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 26.5pt;">            <p style="text-align: center;"><span style="">Tháng 4-tháng 9/2014</span></p>            </td>            <td style="height: 26.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 22.9pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 22.9pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">19</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.9pt;">            <p><span style="">Sách ĐHQG-HCM 20 năm xây dựng-phát triển-hội nhập</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22.9pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 22.9pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 33.25pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 33.25pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">20</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 33.25pt;">            <p><span style="">Phim ĐHQG-HCM 20 năm xây dựng-phát triển-hội nhập</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 33.25pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 33.25pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 31pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 31pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">21</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31pt;">            <p><span style="">Thi Ảnh đẹp ĐHQG-HCM 20 xây dựng-phát triển-hội nhập (triển lãm, trao giải)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 31pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 31pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 44.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 44.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">22</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 44.5pt;">            <p><span style="">Công trình xây dựng chào mừng ĐHQG-HCM 20 năm xây dựng-phát triển-hội nhập (KTX - Nhà Công vụ - Khu TT)</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 44.5pt;">            <p style="text-align: center;"><span style="">Tháng 01/2015</span></p>            </td>            <td style="height: 44.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 22pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 22pt; white-space: nowrap;">            <p style="text-align: center;"><strong><span style="">IV</span></strong></p>            </td>            <td colspan="2" style="width: 437.75pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 22pt;">            <p><span style=""><strong><span style="font-size: 11px;">CÁC ĐƠN VỊ ĐĂNG KÝ HOẠT ĐỘNG CHÀO MỪNG VNU20</span></strong> </span></p>            </td>            <td style="height: 22pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 17.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; white-space: nowrap; background: white;">            <p style="text-align: center;"><span style="">23</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; background: white;">            <p><span style="">Hội thảo ICERN 2014</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 17.5pt; background: white;">            <p style="text-align: center;"><span style="">Tháng 6/2014</span></p>            </td>            <td style="height: 17.5pt; border: none; width: 0px;"></td>        </tr>        <tr style="height: 44.5pt;">            <td style="width: 39.25pt; border-style: none solid solid; border-right-color: windowtext; border-bottom-color: windowtext; border-left-color: windowtext; border-right-width: 1pt; border-bottom-width: 1pt; border-left-width: 1pt; padding: 0in 5.4pt; height: 44.5pt; white-space: nowrap;">            <p style="text-align: center;"><span style="">24</span></p>            </td>            <td style="width: 298.25pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 44.5pt;">            <p><span style="">Hội thảo cấp quốc gia: "Quan điểm, mục tiêu, định hướng và giải pháp phát triển kinh tế - xã hội đất nước giai đoạn 2016-2020"</span></p>            </td>            <td style="width: 139.5pt; border-style: none solid solid none; border-bottom-color: windowtext; border-bottom-width: 1pt; border-right-color: windowtext; border-right-width: 1pt; padding: 0in 5.4pt; height: 44.5pt;">            <p style="text-align: center;"><span style="">Tháng 10/2014</span></p>            </td>            <td style="height: 44.5pt; border: none; width: 0px;"></td>        </tr>    </tbody></table><br><div style="text-align: right;"><strong><span style="">Phòng Hành chính - Tổng hợp</span></strong></div><p></p>            </div>', 1, 8, 'post'),
(12, 1, '2014-11-18 00:00:00', 'Thành lập Ban điều hành phụ trách hoạt động tạm thời của Viện Đào tạo Quốc tế', '', 'Đại học Quốc gia thành phố Hồ Chí Minh (ĐHGQ-HCM) trân trọng thông báo đến các đơn vị thành viên và trực thuộc việc thành lập Ban điều hành phụ trách tạm thời của Viện Đào tạo Quốc tế đến ngày 01 tháng 6 năm 2012.', 'Đại học Quốc gia thành phố Hồ Chí Minh (ĐHGQ-HCM) trân trọng thông báo đến các đơn vị thành viên và trực thuộc việc thành lập Ban điều hành phụ trách tạm thời của Viện Đào tạo Quốc tế đến ngày 01 tháng 6 năm 2012.\r\n\r\n<br /><br />\r\n\r\n<a href="http://www.vnuhcm.edu.vn/Resources/File/TCCB/To%20chuc%20bo%20may/Thanh%20lap%20Ban%20Dieu%20hanh%20hoat%20dong%20tam%20thoi%20cua%20IEI.pdf">Thanh lap Ban Dieu hanh hoat dong tam thoi cua IEI.pdf</a>', 1, 15, 'post'),
(13, 1, '2014-11-18 00:00:00', 'Gia hạn thời gian hoạt động của 03 Trung tâm', '', 'Đại học Quốc gia thành phố Hồ Chí Minh (ĐHQG-HCM) trân trọng thông báo đến các đơn vị thành viên và trực thuộc việc gia hạn thời gian giao dịch của 03 Trung tâm trực thuộc ĐHQG-HCM: Trung tâm Đào tạo Quốc tế, Trung tâm Ngoại ngữ, Trung tâm Đào tạo và Phát triển nguồn nhân lực đến ngày 01tháng 6 năm 2012.\r\nGia han thoi gian giao dich cua 03 Trung tam.pdf', '<p>Đại học Quốc gia th&agrave;nh phố Hồ Ch&iacute; Minh (ĐHQG-HCM) tr&acirc;n trọng th&ocirc;ng b&aacute;o đến c&aacute;c đơn vị th&agrave;nh vi&ecirc;n v&agrave; trực thuộc việc gia hạn thời gian giao dịch của 03 Trung t&acirc;m trực thuộc ĐHQG-HCM: Trung t&acirc;m Đ&agrave;o tạo Quốc tế, Trung t&acirc;m Ngoại ngữ, Trung t&acirc;m Đ&agrave;o tạo v&agrave; Ph&aacute;t triển nguồn nh&acirc;n lực đến ng&agrave;y 01th&aacute;ng 6 năm 2012.<br />\nGia han thoi gian giao dich cua 03 Trung tam.pdf</p>\n', 1, 15, 'post'),
(14, 1, '2014-11-18 00:00:00', 'Thành lập Viện Đào tạo Quốc tế', '', 'Ngày 04 tháng 5 năm 2012, Giám đốc Đại học Quốc gia thành phố Hồ Chí Minh (ĐHQG-HCM) đã có Quyết định số 337/QĐ-ĐHQG-TCCB về việc thành lập Viện Đào tạo Quốc tế trực thuộc ĐHQG-HCM trên cơ sở hợp nhất 03 Trung tâm: Trung tâm Đào tạo Quốc tế, Trung tâm Ngoại ngữ, Trung tâm Đào tạo và Phát triển nguồn nhân lực. ', '                Ngày 04 tháng 5 năm 2012, Giám đốc Đại học Quốc gia thành phố Hồ Chí Minh (ĐHQG-HCM) đã có Quyết định số 337/QĐ-ĐHQG-TCCB về việc thành lập Viện Đào tạo Quốc tế trực thuộc&nbsp;ĐHQG-HCM trên cơ sở hợp&nbsp;nhất 03 Trung tâm: Trung tâm&nbsp;Đào tạo Quốc tế, Trung tâm Ngoại ngữ, Trung tâm&nbsp;Đào tạo và Phát triển nguồn nhân lực.&nbsp;<a href="/Resources/File/TCCB/To chuc bo may/Thanh lap Vien Dao tao Quoc te.pdf"><br>\r\n<br>\r\nThanh lap Vien Dao tao Quoc te.pdf</a><br>\r\n<a href="/Resources/File/TCCB/To chuc bo may/Quy che To chuc va hoat dong của IEI.pdf">Quy che To chuc va hoat dong của IEI.pdf</a><br>\r\n<a href="/Resources/File/TCCB/To chuc bo may/Thanh lap To Cong tac hop nhat 03 Trung tam.pdf">Thanh lap To Cong tac hop nhat 03 Trung tam.pdf</a><br>\r\n', 1, 15, 'post'),
(15, 1, '2014-11-18 00:00:00', 'Quyết định ban hành Quy chế về tổ chức và hoạt động của Trung tâm Nghiên cứu và Đào tạo thiết kế vi mạch', '', 'Quyết định ban hành Quy chế về tổ chức và hoạt động của Trung tâm Nghiên cứu và Đào tạo thiết kế vi mạch', '\r\n                <a href="/Resources/File/TCCB/To chuc bo may/Quy che to chuc &amp; hoat dong ICDREC.doc">Quy che to chuc &amp; hoat dong ICDREC.doc</a>\r\n      ', 1, 15, 'post'),
(16, 1, '2014-11-18 00:00:00', 'Cơ sở vật chất DHQG', '', 'Cơ sở vật chất DHQG', 'Cơ quan hành chính của Đại học Quốc gia Thành phố Hồ Chí Minh hiện nay được đặt tại Thành phố Hồ Chí Minh – trung tâm văn hóa, thương mại và công nghiệp lớn và năng động nhất của khu vực phía Nam cũng như của Việt Nam. Địa chỉ của nhà làm việc chính của Đại học Quốc gia Thành phố Hồ Chí Minh: Khu phố 6, phường Linh Trung, quận Thủ Đức, Thành phố Hồ Chí Minh.\r\n\r\n<br><br>\r\n\r\nĐại học Quốc gia Thành phố Hồ Chí Minh hiện đang xúc tiến xây dựng cơ sở mới tại khu quy hoạch Thủ Đức (Thành phố Hồ Chí Minh) – Dĩ An (tỉnh Bình Dương) trên diện tích rộng 643,7 hecta theo mô hình một đô thị khoa học hiện đại.', 1, NULL, 'post');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
CREATE TABLE IF NOT EXISTS `Roles` (
`id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `key` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Các quyền' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`, `key`) VALUES
(1, 'Quản lý người dùng', 'accounts'),
(5, 'Quản lý nội dung', 'article'),
(6, 'Quản lý Danh mục', 'catalogue'),
(7, 'Quản lý phân quyền', 'permissions'),
(8, 'Bài viết Giới thiệu', 'about'),
(9, 'Bài viết Tin tức – Sự kiện', 'information'),
(10, 'Bài viết Hội nghị - Hội thảo', 'conference'),
(11, 'Bài viết Sách VNU20', 'book'),
(12, 'Bài viết Phim VNU20', 'film'),
(13, 'Bài viết Chuyên đề', 'topical'),
(14, 'Bài viết Bản tin-Tạp chí KHCN', 'magazine'),
(15, 'Quản lý Hình ảnh', 'albums'),
(16, 'Bài viết Chiến lược phát triển', 'chienluocphattrien'),
(17, 'Quản trị Slider', 'slider'),
(18, 'Quản lý hồ sơ lưu trữ', 'hosoluutru');

-- --------------------------------------------------------

--
-- Table structure for table `Slider`
--

DROP TABLE IF EXISTS `Slider`;
CREATE TABLE IF NOT EXISTS `Slider` (
`id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `img` varchar(250) CHARACTER SET utf8 NOT NULL,
  `link` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Slider`
--

INSERT INTO `Slider` (`id`, `title`, `description`, `img`, `link`, `date`) VALUES
(1, 'Triển lãm giới thiệu sản phẩm sáng tạo và kết nối doanh nghiệp - ĐHQG-HCM', '<p>S&aacute;ng 16/5/2014 ĐHQG-HCM kết hợp với c&aacute;c trường th&agrave;nh vi&ecirc;n v&agrave; c&aacute;c đơn vị hoạt động KH&amp;CN đ&atilde; tổ chức buổi triễn l&atilde;m giới thiệu sản phẩm s&aacute;ng tạo v&agrave; kết nối doanh nghiệp ĐHQG-HCM &ndash; 2014 nhằm ch&agrave;o mừng Ng&agrave;y Khoa học v&agrave; c&ocirc;ng nghệ Việt Nam 18/5</p>\n', 'statics/slider/images/trienlam.jpg', '', '2014-05-16'),
(2, 'Khai khóa 2014', '<p>S&aacute;ng ng&agrave;y 3/10, Ph&oacute; Thủ tướng Vũ Đức Đam đ&atilde; tham dự Lễ khai kh&oacute;a v&agrave; c&oacute; buổi l&agrave;m việc với c&aacute;n bộ chủ chốt ĐHQG-HCM về t&igrave;nh h&igrave;nh x&acirc;y dựng - ph&aacute;t triển ĐHQG-HCM v&agrave; c&aacute;c m&ocirc; h&igrave;nh mới được &aacute;p dụng hiệu quả tại đơn vị.</p>\n', 'statics/slider/images/lekhaikhoa.jpg', '', '2014-10-03'),
(5, 'Hội thảo “Hội nhập quốc tế trong quá trình đổi mới giáo dục đại học Việt Nam”', '<p>Thảo luận, chia sẻ &yacute; kiến, kinh nghiệm về những vấn đề l&yacute; luận v&agrave; thực tiễn của việc hội nhập quốc tế trong qu&aacute; tr&igrave;nh đổi mới gi&aacute;o dục đại học (GDĐH) Việt Nam</p>\n', 'statics/slider/images/hoinhapqt.jpg', 'statics/slider/images/hoinhapqt.jpg', '2014-06-08'),
(6, 'Hội nghị Quốc tế về sự phát triển ngành Kỹ Thuật Y Sinh ở Việt Nam lần V', '<p>Tiếp theo sự th&agrave;nh c&ocirc;ng của bốn hội nghị quốc tế đ&atilde; được tổ chức v&agrave;o c&aacute;c năm 2005, 2007, 2010 v&agrave; 2012, từ ng&agrave;y 16-18/6, &ldquo;<strong>H&ocirc;̣i nghị Qu&ocirc;́c t&ecirc;́ v&ecirc;̀ sự phát tri&ecirc;̉n ngành Kỹ Thu&acirc;̣t Y Sinh ở Vi&ecirc;̣t Nam l&acirc;̀n V, 2014</strong>&rdquo; do trường Đại học Qu&ocirc;́c T&ecirc;́ ĐHQG-HCM &nbsp;tổ chức đ&atilde; quy tụ hơn 300 nhà khoa học từ hơn 26 qu&ocirc;́c gia tr&ecirc;n thế giới.</p>\n', 'statics/slider/images/kythuatysinh.jpg', 'index.php', '2014-06-16'),
(7, 'Hội thảo về phát triển CTĐT theo chuẩn CDIO', '<p>Hội thảo về ph&aacute;t triển CTĐT theo chuẩn CDIO</p>\n', 'statics/slider/images/trienlam.jpg', 'index.php', '2014-11-01'),
(8, 'Ngày Nhà giáo Việt Nam 20-11', '<p>S&aacute;ng 19/11, ĐHQG-HCM đ&atilde; tổ chức Lễ kỷ niệm 32 năm ng&agrave;y Nh&agrave; gi&aacute;o Việt Nam 20-11 v&agrave; vinh danh 17 nh&agrave; gi&aacute;o của ĐHQG-HCM được Chủ tịch nước phong tặng danh hiệu Nh&agrave; gi&aacute;o Nh&acirc;n d&acirc;n, Nh&agrave; gi&aacute;o Ưu t&uacute; năm 2014.</p>\n', 'statics/slider/images/2011.jpg', 'index.php', '2014-11-20'),
(9, 'Hội nghị Xây dựng và phát triển đội ngũ ĐHQG-HCM', '<p>Hội nghị X&acirc;y dựng v&agrave; ph&aacute;t triển đội ngũ ĐHQG-HCM&nbsp;</p>\n', 'statics/slider/images/trienlam.jpg', 'index.php', '2014-12-01'),
(10, 'Year - End Reception', '<p>Year - End Reception</p>\n', 'statics/slider/images/trienlam.jpg', 'index.php', '2014-12-02'),
(11, 'Hội thảo ĐHQG-HCM phục vụ cộng đồng', '<p>Hội thảo ĐHQG-HCM phục vụ cộng đồng</p>\n', 'statics/slider/images/phucvucongdong.jpg', 'index.php', '2014-12-03'),
(12, 'Triển lãm thành quả KHCN', '<p>S&aacute;ng dd/mm/2015 ĐHQG-HCM kết hợp với c&aacute;c trường th&agrave;nh vi&ecirc;n v&agrave; c&aacute;c đơn vị hoạt động KH&amp;CN đ&atilde; tổ chức buổi triễn l&atilde;m giới thiệu sản phẩm s&aacute;ng tạo v&agrave; kết nối doanh nghiệp ĐHQG-HCM &ndash; 2014 nhằm ch&agrave;o mừng Ng&agrave;y Khoa học v&agrave; c&ocirc;ng nghệ Việt Nam</p>\n', 'statics/slider/images/trienlam.jpg', 'index.php', '2015-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccountGroup`
--
ALTER TABLE `AccountGroup`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Activities`
--
ALTER TABLE `Activities`
 ADD PRIMARY KEY (`id`), ADD KEY `account_id` (`account_id`), ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `Albums`
--
ALTER TABLE `Albums`
 ADD PRIMARY KEY (`id`), ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `Catalogue`
--
ALTER TABLE `Catalogue`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Meta`
--
ALTER TABLE `Meta`
 ADD PRIMARY KEY (`id`), ADD KEY `Meta_ibfk_1` (`post_id`);

--
-- Indexes for table `Permissions`
--
ALTER TABLE `Permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
 ADD PRIMARY KEY (`id`), ADD KEY `account_id` (`account_id`), ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
 ADD PRIMARY KEY (`id`), ADD KEY `account_id` (`account_id`), ADD KEY `post_cat` (`post_cat`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Slider`
--
ALTER TABLE `Slider`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccountGroup`
--
ALTER TABLE `AccountGroup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Accounts`
--
ALTER TABLE `Accounts`
MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Activities`
--
ALTER TABLE `Activities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Albums`
--
ALTER TABLE `Albums`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Catalogue`
--
ALTER TABLE `Catalogue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Meta`
--
ALTER TABLE `Meta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Permissions`
--
ALTER TABLE `Permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `Photos`
--
ALTER TABLE `Photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `Slider`
--
ALTER TABLE `Slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AccountGroup`
--
ALTER TABLE `AccountGroup`
ADD CONSTRAINT `AccountGroup_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Accounts` (`id`),
ADD CONSTRAINT `AccountGroup_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `Groups` (`id`);

--
-- Constraints for table `Activities`
--
ALTER TABLE `Activities`
ADD CONSTRAINT `Activities_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`),
ADD CONSTRAINT `Activities_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Posts` (`id`);

--
-- Constraints for table `Albums`
--
ALTER TABLE `Albums`
ADD CONSTRAINT `Albums_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`);

--
-- Constraints for table `Permissions`
--
ALTER TABLE `Permissions`
ADD CONSTRAINT `Permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `Groups` (`id`),
ADD CONSTRAINT `Permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`);

--
-- Constraints for table `Photos`
--
ALTER TABLE `Photos`
ADD CONSTRAINT `Photos_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`),
ADD CONSTRAINT `Photos_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `Albums` (`id`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`),
ADD CONSTRAINT `Posts_ibfk_2` FOREIGN KEY (`post_cat`) REFERENCES `Catalogue` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
