/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `nonprofit_organization` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `nonprofit_organization`;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_blogs_users` (`author_id`),
  KEY `FK_articles_categories` (`category_id`),
  CONSTRAINT `FK_articles_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_blogs_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4;

INSERT INTO `articles` (`id`, `title`, `description`, `content`, `slug`, `thumbnail`, `status`, `category_id`, `author_id`) VALUES
	(121, 'Trung Quốc bắn 21 phát đại bác chào mừng Tổng Bí thư, Chủ tịch nước Tô Lâm', 'Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình chủ trì lễ đón Tổng Bí thư, Chủ tịch nước Tô Lâm tại Bắc Kinh, với 21 phát đại bác chào mừng.', '<p style="margin-left:0px;">Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình chủ trì lễ đón Tổng Bí thư, Chủ tịch nước Tô Lâm tại Bắc Kinh, với 21 phát đại bác chào mừng.</p><p style="margin-left:0px;">Trong lễ đón cấp nhà nước tại Đại lễ đường Nhân dân ở thủ đô Bắc Kinh sáng 19/8, Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình mời Tổng Bí thư, Chủ tịch nước Tô Lâm bước lên bục danh dự.</p><p style="margin-left:0px;">Quân nhạc cử quốc thiều hai nước, trong khi 21 phát đại bác vang lên chào mừng. Lễ đón được tổ chức theo nghi thức cao nhất dành cho nguyên thủ quốc gia.</p><p style="margin-left:0px;">Đoàn đại biểu Trung Quốc tham dự lễ đón có Chánh Văn phòng Trung ương Đảng Thái Kỳ, Ngoại trưởng Vương Nghị, Bộ trưởng Công an Vương Tiểu Hồng, Chủ nhiệm Ủy ban Cải cách và Phát triển quốc gia Trịnh San Khiết và các quan chức khác.</p><p style="margin-left:0px;">Hai lãnh đạo sau đó duyệt đội danh dự, chụp ảnh chung và tiến hành hội đàm.</p><p style="margin-left:0px;">Ngoài cuộc hội đàm, Tổng Bí thư, Chủ tịch nước Tô Lâm sẽ hội kiến Thủ tướng Trung Quốc Lý Cường, Ủy viên trưởng Nhân đại Toàn quốc Trung Quốc Triệu Lạc Tế, Chủ tịch Chính hiệp Trung Quốc Vương Hộ Ninh.</p><p style="margin-left:0px;">Tổng Bí thư, Chủ tịch nước Tô Lâm và phu nhân đang có chuyến thăm cấp nhà nước tại Trung Quốc ngày 18-20/8, theo lời mời của Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình và phu nhân. Đây là chuyến thăm Trung Quốc đầu tiên của Tổng Bí thư, Chủ tịch nước Tô Lâm ngay sau khi đảm nhiệm cương vị mới.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/408;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/19/vna-potal-le-don-tong-bi-thu-c-8943-2174-1724045342.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=nE2K6Sci3ejIYnXCe4yL5w" alt="Tổng Bí thư, Chủ tịch nước Tô Lâm và Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình vẫy chào thiếu nhi tại lễ đón ở Bắc Kinh ngày 19/8. Ảnh:TTXVN" width="680" height="408"></p><p style="margin-left:0px;">Tổng Bí thư, Chủ tịch nước Tô Lâm và Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình vẫy chào thiếu nhi tại lễ đón ở Bắc Kinh ngày 19/8. Ảnh: <i>TTXVN</i></p><p style="margin-left:0px;">Bộ trưởng Ngoại giao Bùi Thanh Sơn cho biết chuyến thăm là hoạt động đối ngoại đặc biệt quan trọng giữa Việt Nam và Trung Quốc năm nay. Chuyến thăm cũng sẽ có tác động to lớn đối với xu thế phát triển của quan hệ hai Đảng, hai nước trong thời gian dài tiếp theo.</p><p style="margin-left:0px;">Theo Bộ trưởng, chuyến thăm còn thể hiện sự coi trọng, ưu tiên hàng đầu của hai bên trong củng cố và phát triển quan hệ Đối tác hợp tác Chiến lược Toàn diện, xây dựng Cộng đồng chia sẻ tương lai Việt Nam - Trung Quốc có ý nghĩa chiến lược.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/511;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/19/vna-potal-tong-bi-thu-chu-tich-1517-7059-1724044884.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=oZWXb6l6l1CPkHrNyMUh1w" alt="Tổng Bí thư, Chủ tịch nước Tô Lâm cùng phu nhân và Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình cùng phu nhân tại Bắc Kinh ngày 19/8. Ảnh: TTXVN" width="680" height="511"></p><p style="margin-left:0px;">Tổng Bí thư, Chủ tịch nước Tô Lâm cùng phu nhân và Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình cùng phu nhân tại Bắc Kinh ngày 19/8. Ảnh: <i>TTXVN</i></p><p style="margin-left:0px;">Trung Quốc liên tục là đối tác thương mại lớn nhất của Việt Nam và thị trường xuất khẩu lớn thứ hai của Việt Nam. Việt Nam là đối tác thương mại lớn nhất của Trung Quốc trong ASEAN và đối tác thương mại lớn thứ 5 của Trung Quốc trên thế giới, sau Mỹ, Nhật Bản, Hàn Quốc và Nga. Năm 2023, tổng kim ngạch thương mại hai nước đạt 171,9 tỷ USD.</p><p style="margin-left:0px;">Thương mại 6 tháng đầu năm tăng 24,1%. Lượng khách Trung Quốc sang Việt Nam tới nay là 2,1 triệu lượt, đứng thứ hai và đã vượt tổng số năm 2023. Việt Nam có 23.000 du học sinh đang học tập tại Trung Quốc.</p><p style="margin-left:0px;">&nbsp;</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/408;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/19/to-ng-bi-thu-tha-m-tq-4-jpeg-1-3546-3241-1724043691.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=ee34-A47xt0bUs6rVZTwrw" alt="Tổng Bí thư, Chủ tịch nước Tô Lâm hội đàm với Tổng Bí thư, Chủ tịch nước Trung Quốc Tập Cận Bình ngày 19/8 tại Đại lễ đường Nhân dân ở Bắc Kinh. Ảnh: TTXVN" width="680" height="408"></p><p style="margin-left:0px;">Tổng Bí thư, Chủ tịch nước Tô Lâm hội đàm với Tổng Bí thư, Chủ tịch Trung Quốc Tập Cận Bình ngày 19/8 tại Đại lễ đường Nhân dân ở Bắc Kinh. Ảnh: <i>TTXVN</i></p>', 'trung-quoc-ban-21-phat-ai-bac-chao-mung-tong-bi-thu-chu-tich-nuoc-to-lam', '1724055372_news2.jpg', 1, 2, 1),
	(146, 'Ukraine kêu gọi Belarus rút quân khỏi biên giới chung', 'Ukraine cáo buộc Belarus tập trung quân đội ở biên giới chung hai nước, yêu cầu Minsk chấm dứt "hành động không thân thiện".', '<p style="margin-left:0px;">Ukraine cáo buộc Belarus tập trung quân đội ở biên giới chung hai nước, yêu cầu Minsk chấm dứt "hành động không thân thiện".</p><p style="margin-left:0px;">Bộ Ngoại giao Ukraine ngày 25/8 cho biết tình báo nước này ghi nhận Belarus tập trung số lượng lớn binh sĩ ở khu vực Gomel gần biên giới phía bắc Ukraine "dưới vỏ bọc các cuộc diễn tập". Kiev thêm rằng họ cũng thấy xe tăng, pháo, hệ thống phòng không và nhiều thiết bị khác của Belarus được bố trí ở khu vực.</p><p style="margin-left:0px;">"Chúng tôi đề nghị Belarus không mắc sai lầm bi thảm cho đất nước dưới áp lực của Moskva. Chúng tôi kêu gọi lực lượng vũ trang của họ chấm dứt các hành động không thân thiện và rút quân khỏi biên giới Ukraine đến khu vực có khoảng cách xa hơn tầm bắn của các hệ thống mà Belarus sở hữu", tuyên bố cho hay.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/453;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/26/AFP-20240730-367D8EN-v2-HighRe-6853-9667-1724629365.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=iFdmaenFIym5eN_0-fyMCQ" alt="Tổng thống Volodymyr Zelensky kiểm tra việc xây dựng các công sự ở vùng Volyn, tây bắc Ukraine, gần biên giới Belarus hôm 30/7. Ảnh: AFP" width="680" height="453"></p><p style="margin-left:0px;">&nbsp;</p><p style="margin-left:0px;">Tổng thống Volodymyr Zelensky kiểm tra việc xây dựng các công sự ở vùng Volyn, tây bắc Ukraine, gần biên giới Belarus hôm 30/7. Ảnh: <i>AFP</i></p><p style="margin-left:0px;">Kiev cũng cho biết đã ghi nhận hiện diện của các thành viên Wagner, tập đoàn quân sự tư nhân Nga. Belarus từng tiếp nhận một số tay súng Wagner sau cuộc nổi loạn bất thành ở Nga năm ngoái.</p><p style="margin-left:0px;">Ukraine cảnh báo các cuộc diễn tập quân sự ở khu vực biên giới gây ra mối đe dọa "an ninh toàn cầu" do gần nhà máy điện hạt nhân Chernobyl, nơi từng xảy ra thảm họa hạt nhân nghiêm trọng.</p><p style="margin-left:0px;">"Chúng tôi nhấn mạnh rằng Ukraine chưa bao giờ và sẽ không bao giờ có bất kỳ hành động thù địch nào chống lại người dân Belarus", Bộ Ngoại giao Ukraine nói.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/383;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/26/ban-do-Ukraine-belarus-jpeg-4371-1724629366.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=RsGOo_-FSfxdKSxcA1Pgow" alt="Vị trí Belarus. Đồ họa: Euronews" width="680" height="383"></p><p style="margin-left:0px;">Vị trí Belarus. Đồ họa: <i>Euronews</i></p><p style="margin-left:0px;">Tổng thống Belarus Alexander Lukashenko ngày 18/8 tuyên bố nước này dàn quân, rải mìn ở biên giới chung với Ukraine, sau khi cáo buộc Ukraine đã triển khai 120.000 quân ở khu vực. Ông cũng nói rằng máy bay không người lái (UAV) của Ukraine cũng liên tục xâm phạm vùng trời phía đông nam Belarus.</p><p style="margin-left:0px;">Minsk ngày 19/8 cho biết đã điều động máy bay, lực lượng phòng không và thiết giáp đến khu vực biên giới với Ukraine.</p><p style="margin-left:0px;">Belarus từng cho phép quân đội Nga sử dụng lãnh thổ để phát động cuộc chiến ở Ukraine hồi tháng 2/2022. Ukraine đang tiến hành chiến dịch tại tỉnh Kursk của Nga trong khi Moskva tiếp tục đà tiến ở chiến trường Donbass.</p>', 'ukraine-keu-goi-belarus-rut-quan-khoi-bien-gioi-chung', '1724742932_news6.jpg', 1, 2, 1),
	(147, 'Bộ Công an: Shark Thủy dùng cổ phần không có thật để huy động vốn', 'Ông Nguyễn Ngọc Thủy - tức Shark Thủy, Chủ tịch Egroup, bị cáo buộc gian dối trong việc sử dụng cổ phần Tập đoàn Egroup không có thật để huy động vốn của nhà đầu tư.', '<p style="margin-left:0px;">Ông Nguyễn Ngọc Thủy - tức Shark Thủy, Chủ tịch Egroup, bị cáo buộc gian dối trong việc sử dụng cổ phần Tập đoàn Egroup không có thật để huy động vốn của nhà đầu tư.</p><p style="margin-left:0px;">Ngày 27/8, Cục Cảnh sát điều tra tội phạm về tham nhũng, kinh tế, buôn lậu (C03, Bộ Công an) lần thứ hai thông báo tìm bị hại liên quan đến shark Thủy (42 tuổi, Chủ tịch HĐQT kiêm Tổng Giám đốc Công ty CP tập đoàn giáo dục Egroup, Công ty CP đầu tư và phân phối Egame).</p><p style="margin-left:0px;">Động thái này được đưa ra sau 5 tháng ông Thủy và Đặng Văn Hiển (Trưởng Ban quan hệ cổ đông Công ty CP đầu tư và phân phối Egame) bị bắt tạm giam về hành vi <i>Lừa đảo chiếm đoạt tài sản</i>.</p><p style="margin-left:0px;">Kết quả điều tra đến nay xác định, từ năm 2015 đến 2023, ông Thủy và đồng phạm đã sử dụng pháp nhân Công ty Egame thực hiện hành vi gian dối trong việc sử dụng cổ phần Tập đoàn Egroup không có thật để huy động vốn. Các hình thức giao dịch ông Thủy dùng để huy động vốn là: bán cổ phần nhận thanh toán tiền mặt, chuyển khoản; bán cổ phần thanh toán bằng bất động sản; vay mượn tiền nhà đầu tư đảm bảo bằng sở hữu cổ phần.</p><p style="margin-left:0px;">C03 xác định những nhà đầu tư này là bị hại trong vụ án. Vì vậy, để đảm bảo quyền lợi của họ, cơ quan điều tra đề nghị những ai chưa đến làm việc, trình báo; cung cấp thông tin, hồ sơ, chứng từ trong việc mua, cho vay, đảm bảo bằng sở hữu cổ phần Tập đoàn Egroup thì liên hệ với C03 - trụ sở tại 47 Phạm Văn Đồng, quận Cầu Giấy, Hà Nội, để được hướng dẫn.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/453;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/27/thuy-Hien-2710-1711424824-1546-1724742286.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=ARj-HQ8wuy0bWU2H0J9cGA" alt="Ông Nguyễn Ngọc Thủy (trái) và Đặng Văn Hiển tại cơ quan điều tra. Ảnh: Bộ Công an" width="680" height="453"></p><p style="margin-left:0px;">Ông Nguyễn Ngọc Thủy (trái) và Đặng Văn Hiển tại cơ quan điều tra. Ảnh: <i>Bộ Công an</i></p><p style="margin-left:0px;">Trước đó, C03 nhận được đơn của nhiều nhà đầu tư, tố giác ông Thủy lừa đảo chiếm đoạt tài sản thông qua hình thức chuyển nhượng cổ phần Công ty CP tập đoàn giáo dục Egroup.</p><p style="margin-left:0px;">Ngoài hành vi lần này, hồi năm 2023, Công an TP HCM cũng vào cuộc xác minh hàng trăm đơn tố cáo của phụ huynh, cho rằng bị Công ty CP Anh ngữ Apax Leaders "chiếm đoạt tiền học phí" khoảng 6 tỷ đồng.</p><p style="margin-left:0px;"><img class="image_resized" style="aspect-ratio:680/488;width:680px;" src="https://i1-vnexpress.vnecdn.net/2024/08/27/ed4d5c9a-9333-44b6-88b1-e73419-7742-5245-1724739870.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=NuTn8jToahrAryXv2g52Mw" alt="Trung tâm anh ngữ Apax Leaders của Shark Thủy trên đường Phan Xích Long, quận Phú Nhuận, sáng 26/3. Ảnh: Đình Văn" width="680" height="488"></p><p style="margin-left:0px;">Trung tâm anh ngữ Apax Leaders của "Shark" Thủy trên đường Phan Xích Long, quận Phú Nhuận, sáng 26/3. Ảnh: <i>Đình Văn</i></p><p style="margin-left:0px;">Apax Leaders là chuỗi trung tâm Anh ngữ cho trẻ em, được cấp phép từ 2016. Trên trang web, chuỗi cho biết có 120 trung tâm trên cả nước, với khoảng 120.000 học viên. Tại TP HCM, Apax Leaders từng có hơn 15.000 học viên. Từ cuối năm 2022 đến nay Apax Leaders bị nhiều phụ huynh tại TP HCM, Hà Nội, Đăk Lăk, Đà Nẵng khiếu nại vì chất lượng giảng dạy không như cam kết, "ôm tiền bỏ rơi khách hàng" và yêu cầu hoàn trả học phí.</p>', 'bo-cong-an-shark-thuy-dung-co-phan-khong-co-that-e-huy-ong-von', '1724744140_news7.jpg', 1, 1, 1);

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `FK_articles_tags_articles` (`article_id`),
  KEY `FK_articles_tags_tags` (`tag_id`),
  CONSTRAINT `FK_articles_tags_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_articles_tags_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `articles_tags` (`article_id`, `tag_id`) VALUES
	(146, 16),
	(146, 17),
	(121, 13),
	(121, 22),
	(147, 23);

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Community Education'),
	(2, 'Children\'s Rights'),
	(3, 'Sustainable Development'),
	(4, 'Mental Health'),
	(5, 'Reducing Inequality'),
	(6, 'Environmental Protection'),
	(7, 'Disability Support'),
	(8, 'Promoting Volunteerism'),
	(9, 'Combating Human Trafficking'),
	(10, 'Skill Development for Youth');

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tags` (`id`, `name`) VALUES
	(1, 'html'),
	(2, 'css'),
	(7, 'php'),
	(8, 'scss'),
	(9, 'crypto'),
	(10, 'binance'),
	(11, 'Politics'),
	(12, 'world'),
	(13, 'vietnam'),
	(14, 'china'),
	(15, 'military'),
	(16, 'rusia'),
	(17, 'ukraine'),
	(18, 'tranh'),
	(19, 'tranh-cu'),
	(20, 'tuyen-sinh-dai-hoc'),
	(21, 'chinh-tri'),
	(22, 'trung-quoc'),
	(23, 'phap-luat');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`) VALUES
	(1, 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
