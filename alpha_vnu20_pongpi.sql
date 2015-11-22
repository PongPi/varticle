ALTER TABLE  `AccountGroup` ADD  `status` INT NOT NULL AFTER  `group_id` ;
ALTER TABLE  `Catalogue` ADD  `cat_key` CHAR( 250 ) NULL DEFAULT NULL AFTER  `cat_description` ;
ALTER TABLE  `Catalogue` ADD  `cat_img` TEXT NULL DEFAULT NULL AFTER  `cat_key` ;
ALTER TABLE  `Accounts` ADD  `status` INT NOT NULL AFTER  `password` ;

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(25) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `desc` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Albums`
--
ALTER TABLE `Albums`
  ADD CONSTRAINT `Albums_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`);

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(25) DEFAULT NULL,
  `album_id` int(25) DEFAULT NULL,
  'image' text COLLATE utf8_bin NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Albums`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `Photos_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`),
  ADD CONSTRAINT `Photos_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `Albums` (`id`);

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
(16, 'Quản trị Bài viết', 'posts');

--
-- Dumping data for table `Catalogue`
--

INSERT INTO `Catalogue` (`id`, `cat_name`, `cat_description`, `cat_key`, `cat_img`, `cat_status`) VALUES
(1, 'Giới thiệu', 'Giới thiệu', 'about', NULL, 1),
(2, 'Tin tức – Sự kiện', 'Tin tức – Sự kiện', 'information', NULL, 1),
(3, 'Hội nghị - Hội thảo', 'Hội nghị - Hội thảo', 'conference', NULL, 1),
(4, 'Sách VNU20', 'Sách VNU20', 'book', NULL, 1),
(5, 'Phim VNU20', 'Phim VNU20', 'film', NULL, 1),
(6, 'Chuyên đề', 'Chuyên đề', 'topical', NULL, 1),
(7, 'Bản tin-Tạp chí KHCN', 'Bản tin-Tạp chí KHCN', 'magazine', NULL, 1),
(8, 'Yêu cùng bạn', 'Khi nghe nhạc! 3', NULL, NULL, 2);

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(25) DEFAULT NULL,
  `meta_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `meta_text` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `meta_link` text COLLATE utf8_bin NOT NULL,
  `meta_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Albums`
--
ALTER TABLE `Meta`
ADD CONSTRAINT `post_meta` FOREIGN KEY (`id`) REFERENCES `Posts` (`id`);