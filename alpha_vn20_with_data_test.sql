-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2014 at 08:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alpha_vn20`
--

-- --------------------------------------------------------

--
-- Table structure for table `AccountGroup`
--

DROP TABLE IF EXISTS `AccountGroup`;
CREATE TABLE IF NOT EXISTS `AccountGroup` (
`id` int(11) NOT NULL,
  `user_id` int(25) DEFAULT NULL,
  `group_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
  `password` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'lvduit', 'lvduit', 'lvduit08@gmail.com', 'lvduit');

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
-- Table structure for table `Catalogue`
--

DROP TABLE IF EXISTS `Catalogue`;
CREATE TABLE IF NOT EXISTS `Catalogue` (
`id` int(11) NOT NULL,
  `cat_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `cat_description` mediumtext CHARACTER SET utf8,
  `cat_status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Catalogue`
--

INSERT INTO `Catalogue` (`id`, `cat_name`, `cat_description`, `cat_status`) VALUES
(1, 'Giới thiệu', '', 1),
(2, 'Tin tức - Sự kiện', NULL, 1),
(3, 'Hội nghị hội thảo', NULL, 1),
(4, 'Sách VNU20', NULL, 1),
(5, 'Phim VNU20', NULL, 1),
(6, 'Chuyên đề', NULL, 1),
(7, 'Bản tin - Tạp chí KHCN', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

DROP TABLE IF EXISTS `Groups`;
CREATE TABLE IF NOT EXISTS `Groups` (
`id` int(11) NOT NULL,
  `group_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `group_permistion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`id`, `account_id`, `post_date`, `post_title`, `post_img`, `post_desc`, `post_content`, `post_status`, `post_cat`, `post_type`) VALUES
(1, 1, '2014-11-14 00:00:00', 'Giới thiệu chung về ĐHQG-HCM 20 năm xây dựng - Phát triển - Hội Nhập', 'http://www.vnuhcm.edu.vn/Resources/image/images/TinTuc/dhqg.jpg', 'Đại học Quốc gia Thành phố Hồ Chí Minh (ĐHQG-HCM) được thành lập ngày 27 tháng 01 năm 1995 theo Nghị định 16/CP của Chính phủ trên cơ sở sắp xếp 9 trường đại học lại thành 8 trường đại học thành viên và chính thức ra mắt vào ngày 6 tháng 02 năm 1996.', 'Đại học Quốc gia Thành phố Hồ Chí Minh (ĐHQG-HCM) được thành lập ngày 27 tháng 01 năm 1995 theo Nghị định 16/CP của Chính phủ trên cơ sở sắp xếp 9 trường đại học lại thành 8 trường đại học thành viên và chính thức ra mắt vào ngày 6 tháng 02 năm 1996.\r\n<br>\r\nNăm 2001, ĐHQG-HCM được tổ chức lại theo Quyết định số 15/2001/QĐ-TTg ngày 12 tháng 02 năm 2001 của Thủ tướng Chính phủ. ĐHQG-HCM cũng như ĐHQG Hà Nội có Quy chế tổ chức và hoạt động riêng. Theo đó, ĐHQG-HCM là một trung tâm đào tạo đại học, sau đại học và nghiên cứu khoa học - công nghệ đa ngành, đa lĩnh vực, chất lượng cao, đạt trình độ tiên tiến, làm nòng cốt cho hệ thống giáo dục đại học, đáp ứng nhu cầu phát triển kinh tế - xã hội.', 0, 1, 'post'),
(2, 1, '2014-11-14 00:00:00', 'Triển lãm giới thiệu sản phầm sáng tạo và kết nối doanh nghiệp - DHQG HCM', 'http://www.vnuhcm.edu.vn/Resources/image/images/TinTuc/dhqg.jpg', '', 'http://www.vnuhcm.edu.vn/?ArticleId=1b64c3e0-75c7-4372-a8ca-d504f1059e7a', 1, 2, 'link'),
(3, 1, '2014-11-14 00:00:00', 'Phó Thủ tướng Vũ Đức Đam tham dự Lễ khai khóa - 2014', 'http://www.webpagescreenshot.info/i3/546604a2bd3ec7-13559232', 'Sáng ngày 3/10, Phó Thủ tướng Vũ Đức Đam đã tham dự Lễ khai khóa và có buổi làm việc với cán bộ chủ chốt ĐHQG-HCM về tình hình xây dựng - phát triển ĐHQG-HCM và các mô hình mới được áp dụng hiệu quả tại đơn vị.', 'http://www.vnuhcm.edu.vn/?ArticleId=ce86f7ca-f88f-4f99-920e-5c263e3db145', 1, 2, 'link'),
(4, 1, '2014-11-14 00:00:00', 'Lễ kỉ niệm ngày Nhà giáo Việt Nam 20-11', 'http://www.vnuhcm.edu.vn/Resources/ImagesInPortlet/ImageSlide/01.jpg', 'Sáng ngày 3/10, Phó Thủ tướng Vũ Đức Đam đã tham dự Lễ khai khóa và có buổi làm việc với cán bộ chủ chốt ĐHQG-HCM về tình hình xây dựng - phát triển ĐHQG-HCM và các mô hình mới được áp dụng hiệu quả tại đơn vị.', 'http://www.vnuhcm.edu.vn/?ArticleId=ce86f7ca-f88f-4f99-920e-5c263e3db145', 1, 2, 'link'),
(5, 1, '2014-11-15 00:00:00', 'Đèn đường tự bật khi phương tiện đến gần', 'http://khoahocvacongnghevietnam.com.vn/images/stories/thang-11-2014/1411-den%20duong%20thong%20minh.jpg', 'Các nhà khoa học Đan Mạch vừa tìm ra công nghệ đèn đường thông minh nhằm góp phần biến Thủ đô Copenhagen trở thành thành phố đầu tiên trên thế giới có lượng khí carbon trung hòa vào năm 2025 và tiết kiệm điện', 'Các nhà khoa học Đan Mạch vừa tìm ra công nghệ đèn đường thông minh nhằm góp phần biến Thủ đô Copenhagen trở thành thành phố đầu tiên trên thế giới có lượng khí carbon trung hòa vào năm 2025 và tiết kiệm điện.\r\nalt\r\nĐèn đường đang được nghiên cứu tự điều chỉnh độ sáng\r\nCác cột đèn được lắp đặt cảm ứng để chúng chỉ hoạt động khi phát hiện có người đi bộ hay điều khiển phương tiện giao thông đến gần. Công nghệ này cho phép giảm ánh sáng các đèn đường khi không có xe cộ và người qua lại. Tuy nhiên, tầm nhìn của người điều khiển phương tiện vẫn luôn được đảm bảo để họ cảm thấy an toàn. Các cảm biến theo dõi mật độ giao thông, chất lượng không khí, tiếng ồn, thời tiết sẽ điều chỉnh độ sáng hợp lý nhất để giảm chi phí và khí thải mà vẫn đảm bảo nguồn sáng cần thiết.\r\nKỹ sư trưởng Kim Brostrom thuộc Phòng Thí nghiệm chiếu sáng ngoài trời Đan Mạch cho biết: “Nhóm nghiên cứu đã lắp đặt trên 280 cây cột tín hiệu với 50 giải pháp và 10 hệ thống quản lý điện khác nhau. Chúng tôi cũng có rất nhiều cảm biến bật/ tắt ở khu vực này".\r\nBên cạnh đó, một số cột đèn tín hiệu còn được lắp thêm máy phát điện sử dụng sức gió hoặc năng lượng mặt trời. Các nhà khoa học ước tính, nhờ việc lắp đặt đèn giao thông thông minh khắp thành phố mà Copenhagen đã tiết kiệm được đến 85% chi phí chiếu sáng trong đô thị.\r\nĐặc biệt, hệ thống này có thể được điều khiển dễ dàng qua việc kết nối với máy tính bảng hoặc điện thoại thông minh.', 1, 7, 'post'),
(6, 1, '2014-11-15 00:00:00', 'Trung Quốc trình làng xe tự hành sao Hỏa', 'http://khoahocvacongnghevietnam.com.vn/images/stories/thang-11-2014/1411-xe%20tu%20hanh%20sao%20hoa.jpg', 'Trung Quốc hôm qua công bố phiên bản mẫu chiếc xe tự hành trên bề mặt sao Hỏa, một phần trong kế hoạch chinh phục hành tinh Đỏ trong tương lai.\r\n', 'Phiên bản nguyên mẫu xe tự hành sao Hỏa của Trung Quốc. Ảnh: Reuters\r\nPhiên bản nguyên mẫu được trưng bày tại một triển lãm hàng không ở thành phố Chu Hải, tỉnh Quảng Đông. Xe tự hành sao Hỏa có 6 bánh, về cơ bản gần giống xe tự hành Mặt Trăng mang tên Thỏ Ngọc. Nó được trang bị các tấm pin mặt trời cánh rộng, với camera gắn ở phía trên và cánh tay robot cố định ở đằng trước.\r\nMột số thay đổi sẽ được áp dụng để phù hợp với điều kiện môi trường khác biệt và địa hình trên hành tinh đỏ. Bản thiết kế và các chức năng hoạt động chính thức sẽ được quyết định sau quá trình nghiên cứu thử nghiệm.\r\nTheo Xinhua, Trung Quốc hiện chưa công bố kế hoạch chính thức liên quan đến tàu thăm dò sao Hỏa. Tuy nhiên, Ouyang Ziyuan - một nhà khoa học hàng đầu trong sứ mệnh thăm dò Mặt Trăng của nước này cho biết, Trung Quốc dự định sẽ đưa thiết bị tự hành lên sao Hỏa năm 2020. Hoạt động thu thập dữ liệu và đưa xe tự hành trở về sẽ được thực hiện trong khoảng 10 năm sau đó.\r\nKể từ năm 1960, các quốc gia trên thế giới đã thực hiện 43 sứ mệnh sao Hỏa, trong đó có 19 chương trình thành công.', 1, 7, 'post'),
(7, 1, '2014-11-15 00:00:00', 'VIỆN HÀN LÂM KH&CN VIỆT NAM VÀ ĐHQG-HCM: Ưu tiên nghiên cứu Khoa học Vũ trụ và Công nghệ Sinh học', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/Ky%20ket%20vien%20han%20lam%20KHVN.JPG', 'Nghiên cứu khoa học Vũ trụ và Công nghệ Sinh học là hai nội dung chính yếu trong hợp tác đầu tiên giữa Viện Hàn lâm KH&CN Việt Nam (VAST) và ĐHQG-HCM vừa được ký kết vào ngày 11/9/2014.\r\n', 'Theo đó, ĐHQG-HCM và VAST sẽ hợp tác về lĩnh vực khoa học công nghệ (KHCN) và công tác đào tạo.\r\n\r\n	Về KHCN, hai bên sẽ phối hợp tạo ra các sản phẩm KHCN mang thương hiệu chung, thực hiện một số nghiên cứu liên ngành; tăng cường khai thác trang thiết bị tại các phòng thí nghiệm; trao đổi thông tin bằng các ấn bản khoa học và học liệu. Hai bên xem xét việc phát triển chất lượng nguồn nhân lực KHCN thông qua việc trao đổi chuyên gia dưới dạng hợp đồng giảng dạy hoặc nghiên cứu. Dựa trên Luật Sở hữu Trí tuệ, hai bên cũng thỏa thuận đồng khai thác các kết quả nghiên cứu để đưa ra thị trường những sản phẩm khoa học ứng dụng. \r\n\r\n	Về hoạt động đào tạo, hai bên liên kết đào tạo bậc đại học và sau đại học dưới hình thức nhận hướng dẫn và đồng hướng dẫn các luận văn, luận án khoa học; tiếp nhận sinh viên, học viên cao học và nghiên cứu sinh thực tập tại các phòng thí nghiệm; phối hợp xây dựng chuyên ngành đào tạo mới. Hai bên xem xét thành lập các khoa phối thuộc nhằm khai thác lợi thế của mỗi bên thông qua hình thức trưởng khoa kiêm nhiệm; công nhận chương trình đào tạo, chứng chỉ và bằng cấp của nhau theo từng trường hợp cụ thể.\r\n', 1, 3, 'post'),
(8, 1, '2014-11-15 00:00:00', 'ĐHQG-HCM: Đánh giá AUN- QA thêm 2 chương trình đào tạo', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(5).JPG', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', 1, 3, 'post'),
(9, 1, '2014-11-15 00:00:00', 'VIỆN HÀN LÂM KH&CN VIỆT NAM VÀ ĐHQG-HCM: Ưu tiên nghiên cứu Khoa học Vũ trụ và Công nghệ Sinh học', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/Ky%20ket%20vien%20han%20lam%20KHVN.JPG', 'Nghiên cứu khoa học Vũ trụ và Công nghệ Sinh học là hai nội dung chính yếu trong hợp tác đầu tiên giữa Viện Hàn lâm KH&CN Việt Nam (VAST) và ĐHQG-HCM vừa được ký kết vào ngày 11/9/2014.\r\n', 'Theo đó, ĐHQG-HCM và VAST sẽ hợp tác về lĩnh vực khoa học công nghệ (KHCN) và công tác đào tạo.\r\n\r\n	Về KHCN, hai bên sẽ phối hợp tạo ra các sản phẩm KHCN mang thương hiệu chung, thực hiện một số nghiên cứu liên ngành; tăng cường khai thác trang thiết bị tại các phòng thí nghiệm; trao đổi thông tin bằng các ấn bản khoa học và học liệu. Hai bên xem xét việc phát triển chất lượng nguồn nhân lực KHCN thông qua việc trao đổi chuyên gia dưới dạng hợp đồng giảng dạy hoặc nghiên cứu. Dựa trên Luật Sở hữu Trí tuệ, hai bên cũng thỏa thuận đồng khai thác các kết quả nghiên cứu để đưa ra thị trường những sản phẩm khoa học ứng dụng. \r\n\r\n	Về hoạt động đào tạo, hai bên liên kết đào tạo bậc đại học và sau đại học dưới hình thức nhận hướng dẫn và đồng hướng dẫn các luận văn, luận án khoa học; tiếp nhận sinh viên, học viên cao học và nghiên cứu sinh thực tập tại các phòng thí nghiệm; phối hợp xây dựng chuyên ngành đào tạo mới. Hai bên xem xét thành lập các khoa phối thuộc nhằm khai thác lợi thế của mỗi bên thông qua hình thức trưởng khoa kiêm nhiệm; công nhận chương trình đào tạo, chứng chỉ và bằng cấp của nhau theo từng trường hợp cụ thể.\r\n', 1, 3, 'post'),
(10, 1, '2014-11-15 00:00:00', 'ĐHQG-HCM: Đánh giá AUN- QA thêm 2 chương trình đào tạo', 'http://www.vnuhcm.edu.vn/Resources/Image/0%20Tin%20cua%20Nghia/5%20Danh%20gia%20AUN%20(5).JPG', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', 'Ngày 8/10, ĐHQG-HCM đã tổ chức khai mạc hoạt động đánh giá ngoài theo tiêu chuẩn kiểm định chất lượng của Mạng lưới các trường đại học Đông Nam Á (AUN) cho 2 chương trình đào tạo: Quản lý Công nghiệp (Khoa Quản lý Công nghiệp), Kỹ thuật Điều khiển và Tự động hóa (Khoa Điện – Điện tử) của Trường ĐH Bách khoa.', 1, 3, 'post');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
CREATE TABLE IF NOT EXISTS `Roles` (
`id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `key` varchar(250) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Các quyền' AUTO_INCREMENT=1 ;

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
-- Indexes for table `Permissions`
--
ALTER TABLE `Permissions`
 ADD PRIMARY KEY (`id`), ADD KEY `group_id` (`group_id`), ADD KEY `role_id` (`role_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccountGroup`
--
ALTER TABLE `AccountGroup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `Catalogue`
--
ALTER TABLE `Catalogue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Permissions`
--
ALTER TABLE `Permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `Permissions`
--
ALTER TABLE `Permissions`
ADD CONSTRAINT `Permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `Groups` (`id`),
ADD CONSTRAINT `Permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`);

--
-- Constraints for table `Posts`
--
ALTER TABLE `Posts`
ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`),
ADD CONSTRAINT `Posts_ibfk_2` FOREIGN KEY (`post_cat`) REFERENCES `Catalogue` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
