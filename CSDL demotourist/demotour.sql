-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 12:47 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demotour`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `booking_details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `id` int(11) NOT NULL,
  `status_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `status_description`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đã đặt cọc'),
(4, 'Chưa đặt cọc'),
(5, 'Đã thanh toán'),
(6, 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'anonymous@gmail.com',
  `phone_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `address`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Danh', 'Nguyễn', 'Tp. HCM', 'anonymous@gmail.com', '0123456789', '2019-09-26 17:47:52', '2019-09-26 17:47:52'),
(2, 'Gia', 'Nguyễn', 'Đồng Nai', 'anonymous@gmail.com', '0246813397', '2019-09-26 17:47:52', '2019-09-26 17:47:52'),
(3, 'Long', 'Ứng', 'Gia Lai', 'anonymous@gmail.com', '0135792468', '2019-09-26 17:47:52', '2019-09-26 17:47:52'),
(4, 'Quý', 'Nguyễn', 'Tp. HCM', 'anonymous@gmail.com', '0357912468', '2019-09-26 17:47:52', '2019-09-26 17:47:52'),
(5, 'Huy', 'Nguyễn', 'Khánh Hòa', 'anonymous@gmail.com', '0345678921', '2019-09-26 20:25:05', '2019-09-26 19:25:05'),
(24, 'Liêm', 'Lữ', '155 Đồng Khởi, Thị trấn Diên Khánh, Diên Khánh, Khánh Hòa', 'liemluhoang@gmail.com', '0335521461', '2019-10-17 12:43:59', '2019-10-17 12:43:59'),
(25, 'Nam', 'sd', 'aaa', 'nhatnam@gmail.com', '564645', '2019-10-17 14:21:08', '2019-10-17 14:21:08'),
(26, 'Nam', 'sd', 'aaaaa', 'nhatnam@gmail.com', '564645', '2019-10-17 14:21:53', '2019-10-17 14:21:53'),
(27, 'Nam', 'sd', 'sdasda', 'nhatnam@gmail.com', 'fsdfs', '2019-10-17 15:26:55', '2019-10-17 15:26:55'),
(28, 'Liêm', 'Lữ', '155 Đồng Khởi, Thị trấn Diên Khánh, Diên Khánh, Khánh Hòa', 'hoang.liem.33@facebook.com', '0335521461', '2019-10-17 15:39:37', '2019-10-17 15:39:37'),
(33, 'Danh', 'Hoàng', 'Tp. Hồ Chí Minh', 'hoangdanh@gmail.com', '01234234567', '2019-10-19 08:30:32', '2019-10-19 08:30:32'),
(34, 'Nam', 'Đặng', 'Đồng Nai', 'nhatnam@gmail.com', '0334431561', '2019-10-19 08:33:46', '2019-10-19 08:33:46'),
(35, 'Đức', 'Nguyễn', 'Gia Lai', 'ducgialai@gmail.com', '0234516678', '2019-10-19 10:31:19', '2019-10-19 10:31:19'),
(36, 'Đức', 'Nguyễn', 'Gia Lai', 'ducgialai@gmail.com', '0234516678', '2019-10-19 10:31:46', '2019-10-19 10:31:46'),
(37, 'Long', 'Ứng', 'Gia Lai', 'thanhlong@gmail.com', '0234123456', '2019-10-19 10:42:18', '2019-10-19 10:42:18'),
(38, 'Liêm', 'Lữ', '155 Đồng Khởi, Thị trấn Diên Khánh, Diên Khánh, Khánh Hòa', 'hoang.liem.33@facebook.com', '0335521461', '2019-10-19 10:43:58', '2019-10-19 10:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `content` text DEFAULT 'Mục này đang trống',
  `star_rating` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `highlight` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `contact`, `price`, `content`, `star_rating`, `image`, `about`, `highlight`, `created_at`, `updated_at`) VALUES
(1, 'SILA Urban Living ', 'Quận 3, Hồ Chí Minh', '034 6968', 850000, 'Tọa lạc tại Thành phố Hồ Chí Minh, cách Bảo tàng Chứng tích Chiến tranh 300 m, Sila Urban Living có phòng xông hơi khô. Phù hợp với các kỳ nghỉ ngắn ngày cũng như dài ngày, chỗ nghỉ có nội thất hiện đại đầy phong cách. Dinh Thống Nhất cách đó 700 m. Du khách có thể truy cập Wi-Fi miễn phí trong toàn bộ khuôn viên.\r\n\r\n/nTất cả chỗ ở tại đây có cửa sổ kính suốt từ trần đến sàn, tầm nhìn ra quang cảnh thành phố, TV LED màn hình phẳng cùng khu vực tiếp khách và ăn uống. Toàn bộ chỗ ở đi kèm nhà bếp được trang bị lò nướng và lò vi sóng. Máy nướng bánh mì, tủ lạnh, bếp nấu ăn và ấm đun nước cũng được cung cấp cho khách. Mỗi chỗ ở đều có phòng tắm riêng với vòi sen và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nSILA Urban Living còn có hồ bơi ngoài trời dài 20 m, CLB chăm sóc sức khỏe với phòng tập thể dục 24 giờ, phòng xông hơi ướt, hồ bơi spa và phòng tập yoga. Chỗ nghỉ này có cả cửa hàng tiện lợi.\r\n\r\n/nNhà hàng Twenty One Restaurant & Bar phục vụ tuyển chọn cả món ăn Liên Á và Phương Tây trong không gian trang nhã. Sân hiên rộng rãi ngoài trời là nơi lý tưởng để bắt đầu ngày mới với bữa sáng được phục vụ theo kiểu gọi món hoặc thư giãn vào buổi tối với đồ ăn nhẹ và 1 ly rượu vang.\r\n\r\n/nCông viên Tao Đàn cách Sila Urban Living 800 m. Cách đó 6 km là Sân bay Quốc tế Tân Sơn Nhất.\r\n\r\n/nQuận 3 là lựa chọn tuyệt vời cho du khách thích thực phẩm địa phương, nhà hàng và đi dạo trong phố.', 3, 'hotel-urban.jpg', 'Wifi miễn phí/nGiá cả phù hợp. /nMiễn phí bữa sáng tại khách sạn', 0, '2019-10-20 05:34:18', '2019-10-03 13:16:11'),
(2, 'Airport Saigon Hotel', '34 Ngô Thị Thu Minh, P. 2, Q. Tân Bình, Tp. Hồ Chí Minh', '090 954 06 50', 500000, 'Tọa lạc tại Thành phố Hồ Chí Minh, nằm trong bán kính 3,2 km từ Chùa Giác Lâm và 3,9 km từ Chợ Tân Định, Airport Saigon Hotel có nhà hàng, trung tâm thể dục, khu vườn và Wi-Fi miễn phí. Khách sạn này cũng có dịch vụ phòng và sân hiên. Khách sạn cung cấp các phòng gia đình.\r\n\r\n/nKhách sạn phục vụ bữa sáng tự chọn hàng ngày.\r\n\r\n/nCông viên Văn hóa Đầm Sen và Bảo tàng Chứng tích Chiến tranh đều nằm trong bán kính 5 km từ Airport Saigon Hotel. Sân bay gần nhất là Sân bay Quốc tế Tân Sơn Nhất, cách đó 7 km.\r\n/nQuận Tân Bình là lựa chọn tuyệt vời cho du khách thích không gian, ngắm người qua lại và thực phẩm địa phương.', 3, 'hotel-airport.jpg', 'Dich vụ giặt ủi./nMiễn phí cà phê/trà sáng, Wifi/Internet...', 0, '2019-10-16 07:16:02', '2019-10-03 13:16:11'),
(3, 'Khách sạn Cao Vũng Tàu', '179 Thùy Vân, Phường 8, Thành phố Vũng Tàu, Bà Rịa - Vũng Tàu', '034 6968', 1682000, 'Khách sạn Cao Vũng Tàu sở hữu vị trí độc đáo nằm đối diện bãi biển Thùy Vân, hứa hẹn  mang đến quý khách những  giây phút thăng hoa trong cảm xúc. So với tất cả các khách sạn Vũng Tàu nằm cạnh bãi biển, Cao Hotel nổi bật hơn hẳn với kiến trúc sang trọng, nội thất cao cấp đạt tiêu chuẩn quốc tế 4 sao./nKhách sạn CAO Vũng Tàu sở hữu vị trí độc đáo nằm đối diện bãi biển Thùy Vân, hứa hẹn  mang đến quý khách những  giây phút thăng hoa trong cảm xúc. So với tất cả các khách sạn Vũng Tàu nằm cạnh bãi biển, Cao Hotel nổi bật hơn hẳn với kiến trúc sang trọng, nội thất cao cấp đạt tiêu chuẩn quốc tế 4 sao/nĐiều đầu tiên gây ấn tượng đối với quý khách khi đến khách sạn CAO Vũng Tàu đó chính là cảnh quan bờ biển vô cùng xinh đẹp./nLưu trú tại bất kỳ một trong 200 phòng nghỉ sang trọng và phòng suite đẳng cấp của khách sạn, quý khách đều có cơ hội ngắm nhìn khung cảnh biển trời mênh mông, lắng nghe tiếng sóng xô bờ qua khung cửa sổ từ các phòng./nTại sảnh khách sạn có đặt quầy bar sang trọng và một quầy bar phong cách bên hồ bơi để bạn tận hưởng trọn vẹn hương vị đặc sắc của đồ uống bên dòng nước mát trong. Đặc biệt, khách sạn  còn sở hữu Serenity Spa, hồ bơi vô cực và thơ mộng đầu tiên tại Vũng Tàu, phòng tập thể thao với đầy đủ trang thiết bị hiện đại giúp quý khách có được những phút giây thư giãn, giải trí tuyệt vời nhất. Đối với những vị khách đến công tác, CAO hotel cung cấp phòng hội thảo cao cấp với đầy đủ trang thiết bị chuyên nghiệp.Đặt khách sạn CAO Vũng Tàu và trải nghiệm kỳ nghỉ khó quên giữa không gian biển xanh cát vàng', 4, 'hotel-cao.jpg', 'Khách sạn Cao Vũng Tàu sở hữu vị trí độc đáo nằm đối diện bãi biển Thùy Vân, hứa hẹn  mang đến quý khách những  giây phút thăng hoa trong cảm xúc...', 0, '2019-10-16 07:17:32', '2019-10-03 15:04:37'),
(4, 'Happy Forest Hotel', '10 Trần Phú Phường 1, Vũng Tàu', '0866 752 266', 500000, 'Happy Forest Hotel tọa lạc tại thành phố Vũng Tàu, trong bán kính 400 m từ Bạch Dinh. Khách sạn có vườn, quầy bar, sảnh khách chung, nhà hàng, lễ tân 24 giờ, dịch vụ phòng và Wi-Fi miễn phí. Khách sạn cấm hút thuốc và cách Tượng Chúa Ki-tô Vua 3,8 km.\r\n\r\n/nCó bãi đậu xe riêng miễn phí ở khách sạn\r\n\r\n/nTất cả phòng nghỉ tại khách sạn đều được trang bị TV màn hình phẳng.\r\n\r\n/nHappy Forest Hotel phục vụ bữa sáng gọi món.\r\n\r\n/nĐi bộ đường dài là hoạt động phổ biến trong khu vực. Du khách có thể thuê xe hơi tại đây.\r\n\r\n/nCác điểm tham quan nổi tiếng gần RedDoorz Plus near Bai Truoc bao gồm trung tâm thương mại Lam Sơn square, Sân vận động Lam Sơn và Bến tàu Cánh ngầm. Sân bay gần nhất là sân bay quốc tế Tân Sơn Nhất, cách đó 109 km. Khách sạn cung cấp dịch vụ đưa/đón sân bay với một khoản phụ phí.\r\n\r\n/nNhà hàng hải sản Hải An trong khuôn viên\r\nẨm thực: Hải sản, Món Việt Nam, Món Châu Á\r\n\r\n/nMở cửa phục vụ: Bữa sáng, Bữa xế, Bữa trưa, Bữa tối, Tiệc trà muộn, Tiệc cocktail\r\n\r\n/nThực đơn: Gọi món (à la carte)', 2, 'hotel-happyforest.jpg', 'Khách sạn có vườn, quầy bar, sảnh khách chung, nhà hàng./nLễ tân 24 giờ, dịch vụ phòng và Wi-Fi miễn phí. /nKhách sạn cấm hút thuốc...', 0, '2019-10-19 07:22:02', '2019-10-03 15:07:02'),
(6, 'Khu nghỉ dưỡng & Spa Marina Bay Vũng Tàu', '115 Trần Phú, Phường 5, Thành phố Vũng Tàu', '0254 3848 888', 2500000, 'Tọa lạc ở thành phố Vũng Tàu, Marina Bay Vung Tau Resort & Spa có nhà hàng, trung tâm thể dục, quán bar và khu vườn. Resort này còn có dịch vụ phòng, sân hiên, tầm nhìn ra khu vườn, hồ bơi ngoài trời, lễ tân 24 giờ và Wi-Fi miễn phí trong toàn bộ khuôn viên.\r\n\r\n/nPhòng nghỉ của resort được trang bị máy điều hòa, truyền hình vệ tinh màn hình phẳng, ấm đun nước, vòi sen, máy sấy tóc và bàn làm việc. Mỗi phòng đều có tủ quần áo và phòng tắm riêng.\r\n\r\n/nKhách nghỉ tại Marina Bay Vung Tau Resort & Spa có thể thưởng thức bữa sáng tự chọn.\r\n\r\n/nResort nằm cách Bạch Dinh 6 km và Tượng Chúa Ki-tô Vua 8 km. Sân bay gần nhất là Sân bay Quốc tế Tân Sơn Nhất, nằm trong bán kính 109 km từ Marina Bay Vung Tau Resort & Spa.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,0 cho kỳ nghỉ dành cho 2 người.\r\n\r\n/nChúng tôi sử dụng ngôn ngữ của bạn!', 5, 'marinebay-resort.jpg', 'Wi-Fi miễn phí.   \r\n/nBữa sáng miễn phí.  \r\n/nĐỗ xe miễn phí.    \r\n/nBể bơi ngoài trời.  \r\n', 0, '2019-10-19 09:00:37', '2019-10-05 14:44:35'),
(7, 'Bella Vita Hotel', 'ĐT44A, Phước Hải, Đất Đỏ, Bà Rịa - Vũng Tàu', '0254 3681 888', 1800000, 'Nằm trên bãi biển đầy cát Phước Hải, Bella Vita Hotel có hồ bơi ngoài trời mở cửa quanh năm và tầm nhìn ra biển. Khách sạn cung cấp Wi-Fi miễn phí trong tất cả các khu vực và chỗ đỗ xe riêng miễn phí ngay tại khuôn viên.\r\n\r\n/nMỗi phòng nghỉ tại khách sạn trên bãi biển này đều trang bị máy lạnh, TV truyền hình cáp màn hình phẳng, ấm đun nước điện và minibar. Tất cả các phòng đi kèm phòng tắm riêng với vòi sen, bồn rửa vệ sinh (bidet) và máy sấy tóc. Áo choàng tắm, dép đi trong phòng và đồ vệ sinh cá nhân miễn phí cũng được cung cấp để mang lại sự thoải mái cho khách.\r\n\r\n/nSân bay gần nhất là sân bay quốc tế Tân Sơn Nhất, cách Bella Vita Hotel 83 km. Dịch vụ đưa đón sân bay được cung cấp với một khoản phụ phí.\r\n\r\n/nNhân viên tại quầy lễ tân 24 giờ có thể giúp khách về phòng giữ hành lý và bố trí chương trình tour. Bộ phận giải trí của khách sạn cũng có thể sắp xếp một loạt các hoạt động ban ngày và buổi tối như câu cá, chương trình nấu ăn Việt Nam, các hoạt động dành cho trẻ em hoặc các bữa tiệc bên hồ bơi. Spa, ghế tắm nắng và trung tâm dịch vụ doanh nhân cũng nằm trong số các tiện nghi tại Bella Vita Hotel.\r\n\r\n/nVới sân hiên nhìn ra biển, du khách có thể thưởng thức các món ăn và đồ uống tại 2 nhà hàng, quán bar và quán cà phê ngay trong khuôn viên.', 3, 'hotel-bella.jpg', 'Có hồ bơi Giáp biển./nWi-Fi miễn phí, chỗ đỗ xe miễn phí./nQuầy bar./nPhù hợp cho cặp đôi.', 0, '2019-10-19 09:01:00', '2019-10-05 14:44:35'),
(8, 'Khách sạn Golden Sea 3 ', '242 Võ Nguyên Giáp, Phước Mỹ, Sơn Trà, Đà Nẵng', '0236 3936 936', 1000000, 'Nằm cạnh các bãi biển lớn ở Đà Nẵng, Golden Sea 3 Hotel cung cấp chỗ ở trang nhã chỉ cách Cầu Sông Hàn nổi tiếng trong thành phố resort Đà Nẵng 2 km. Du khách có thể thưởng thức các bữa ăn ngon miệng tại nhà hàng trong khuôn viên và ngâm mình thư giãn trong hồ bơi nhìn ra biển. Chỗ nghỉ này cũng cung cấp Wi-Fi miễn phí và chỗ đỗ xe riêng miễn phí ngay trong khuôn viên.\r\n\r\n/nCác phòng nghỉ tại đây được trang bị đầy đủ tiện nghi với ánh sáng ấm áp vào buổi tối và nhiều ánh sáng tự nhiên vào ban ngày. Mỗi phòng đều có TV màn hình phẳng và minibar. Một số phòng còn đi kèm khu vực tiếp khách. Phòng tắm riêng được trang bị đầy đủ tiện nghi và đi kèm vòi sen hoặc bồn tắm.\r\n\r\n/nGolden Sea 3 Hotel cung cấp nhiều dịch vụ tại quầy lễ tân 24 giờ, chẳng hạn như dịch vụ trợ giúp đặc biệt, giữ hành lý và thu đổi ngoại tệ. Dịch vụ đưa đón có thu phí được đáp ứng theo yêu cầu tại khách sạn.\r\n\r\n/nBảo tàng Chăm nằm trong bán kính 2,5 km từ Golden Sea 3 Hotel trong khi Bãi biển Mỹ An cách khách sạn 3 km. Sân bay Quốc tế Đà Nẵng cách đó 6 km.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,5 cho kỳ nghỉ dành cho 2 người.', 4, 'hotel-golden3.jpg', 'Hồ bơi, Wi-Fi miễn phí, giáp biển./nPhòng không hút thuốc./nNhà hàng, chỗ đỗ xe miễn phí./nQuầy bar', 1, '2019-10-19 09:01:22', '2019-10-05 15:00:53'),
(9, 'Khách sạn New Orient Đà Nẵng', '20 Đống Đa, Thuận Phước, Hải Châu, Đà Nẵng', '0236 3828 828', 1500000, 'Tọa lạc tại thành phố Đà Nẵng, trong bán kính 1,7 km từ Cầu Sông Hàn, New Orient Hotel Da Nang cung cấp chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, hồ bơi ngoài trời và trung tâm thể dục. Khách sạn 4 sao này có Wi-Fi miễn phí, quán bar, nhà hàng, lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ.\r\n\r\n/nPhòng nghỉ của khách sạn được trang bị máy điều hòa, truyền hình vệ tinh màn hình phẳng, ấm đun nước, vòi sen, máy sấy tóc và bàn làm việc. Các phòng cũng có tủ quần áo và phòng tắm riêng.\r\n\r\n/nKhách nghỉ tại New Orient Hotel Da Nang có thể thưởng thức bữa sáng kiểu lục địa/tự chọn.\r\n\r\n/nKhách sạn có sân chơi cho trẻ em.\r\n\r\n/nKhách sạn cũng có trung tâm dịch vụ doanh nhân và CLB trẻ em trong khuôn viên.\r\n\r\n/nNew Orient Hotel Da Nang cách trung tâm mua sắm Indochina Riverside Mall 2 km và Bảo tàng Chăm 2,7 km. Sân bay gần nhất là sân bay quốc tế Đà Nẵng, cách đó 6 km.', 4, 'hotel-neworient.jpg', 'Có 2 hồ bơi Wi-Fi miễn phí./nTrung tâm Spa & chăm sóc sức khỏe trên cả tuyệt vời./nQuầy bar', 1, '2019-10-19 09:01:42', '2019-10-05 15:00:53'),
(10, 'Khách sạn A25 - Nguyễn Cư Trinh', '22 Nguyễn Cư Trinh, Phường Phạm Ngũ Lão, Quận 1, Hồ Chí Minh', '028 3920 5388', 500000, 'A25 Hotel - Nguyễn Cư Trinh cung cấp các phòng nghỉ máy lạnh với Wi-Fi miễn phí và phòng tắm riêng. Nằm trong khu tây ba lô của Thành phố Hồ Chí Minh, nơi đây có lễ tân 24 giờ.\r\n\r\n/nChợ Bến Thành và Dinh Thống Nhất đều cách đó 1,5 km. Nhà hát Thành Phố, phố mua sắm Đồng Khởi và Nhà thờ Đức Bà đều nằm trong vòng bán kính 2,5 km từ khách sạn A25 Hotel - Nguyễn Cư Trinh. Sân bay Tân Sơn Nhất cách khách sạn khoảng 8 km.\r\n\r\n/nTất cả các phòng đều được trang bị truyền hình cáp, khu vực tiếp khách và minibar. Phòng tắm riêng được trang bị bồn tắm, vòi sen, máy sấy tóc và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nCác dịch vụ giặt, ủi và đưa đón sân bay được cung cấp với 1 khoản phí thêm. Khách sạn có bàn đặt tour của riêng mình và dịch vụ giữ hành lý.\r\n\r\n/nQuận 1 là lựa chọn tuyệt vời cho du khách thích bảo tàng, mua sắm và chợ.\r\n\r\n/nĐây là khu vực ở TP. Hồ Chí Minh mà khách yêu thích, theo các đánh giá độc lập.', 1, 'hotel-a25.jpg', 'Wi-Fi miễn phí./nXe đưa đón sân bay./nLễ tân 24 giờ./nGiặt ủi miễn phí', 0, '2019-10-19 09:02:05', '2019-10-05 15:00:53'),
(11, 'Khách sạn The Luxe', '261-265 Lê Thánh Tôn, Phường Bến Thành, Quận 1, Hồ Chí Minh', '028 3824 6633', 800000, 'Tọa lạc tại trung tâm thành phố Hồ Chí Minh, The Luxe Hotel cung cấp các phòng nghỉ hiện đại được trang bị máy lạnh kèm truy cập Wi-Fi miễn phí và chỉ cách Chợ Bến Thành 5 phút đi bộ. Ngoài ra, nơi nghỉ này còn có chỗ đỗ xe miễn phí và lễ tân làm việc 24/24.\r\n\r\n/nCác phòng nghỉ đều đi kèm giường ngủ tiện nghi với bộ khăn trải giường vải bông, chăn và gối lông vũ. Phòng cũng được trang bị TV LED màn hình phẳng lớn, minibar và phòng tắm riêng với vòi sen cùng đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nTiện nghi cung cấp cho khách bao gồm quầy lễ tân làm việc 24 giờ và nhà hàng nhỏ của khách sạn phục vụ bữa sáng. Tại đây còn cung cấp dịch vụ phòng và dịch vụ giặt là.\r\n\r\n/nNơi nghỉ này cách điểm tham quan như Nhà hát Thành phố, Dinh Thống Nhất và Nhà thờ Đức Bà 10 phút đi bộ. Sân bay Quốc Tế Tân Sơn Nhất cách đó 45 phút lái xe. Trong tầm bán kính đi bộ từ khách sạn có nhiều lựa chọn ăn uống khác nhau.\r\n\r\n/nQuận 1 là lựa chọn tuyệt vời cho du khách thích bảo tàng, mua sắm và chợ.\r\n\r\n/nĐây là khu vực ở TP. Hồ Chí Minh mà khách yêu thích, theo các đánh giá độc lập.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,1 cho kỳ nghỉ dành cho 2 người.', 3, 'hotel-luxe.jpg', 'Wi-Fi miễn phí./nXe đưa đón sân bay./nPhòng gia đình, phòng không hút thuốc./nLễ tân 24 giờ', 0, '2019-10-19 09:02:28', '2019-10-05 15:00:53'),
(12, 'Mường Thanh Saigon Centre', '8A Mạc Đĩnh Chi, Bến Nghé, Quận 1, Hồ Chí Minh', ' 028 3827 9595', 2000000, 'Với trung tâm spa và phòng xông hơi khô, Muong Thanh Saigon Centre Hotel nằm ở Thành phố Hồ Chí Minh. Nơi nghỉ có quán bar trong khuôn viên và cung cấp Wi-Fi miễn phí.\r\n\r\n/nCác phòng được trang bị TV màn hình phẳng. Một số phòng có khu vực tiếp khách, nơi quý khách có thể thư giãn. /nCác phòng có phòng tắm riêng kèm bồn tắm hoặc vòi sen. /nNơi nghỉ cũng cung cấp áo choàng tắm, dép và máy sấy tóc nhằm mang lại thuận tiện cho quý khách.\r\n\r\n/nNơi đây có quầy lễ tân 24 giờ.\r\n\r\n/nTrung tâm mua sắm Diamond Plaza cách Muong Thanh Saigon Centre Hotel 500 m, trong khi Nhà thờ Đức Bà cách đó 600 m. Sân bay Quốc tế Tân Sơn Nhất cách chỗ nghỉ này 6 km.\r\n\r\n/nQuận 1 là lựa chọn tuyệt vời cho du khách thích bảo tàng, mua sắm và chợ.\r\n\r\n/nĐây là khu vực ở TP. Hồ Chí Minh mà khách yêu thích, theo các đánh giá độc lập.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,1 cho kỳ nghỉ dành cho 2 người.', 4, 'hotel-muongthanh.jpg', 'Có 1 hồ bơi. Wi-Fi miễn phí Xe đưa đón sân bay. Trung tâm chăm sóc sức khỏe trên cả tuyệt vời. Phòng không hút thuốc. Trung tâm Spa & chăm sóc sức khoẻ. Quầy bar', 1, '2019-10-19 09:08:56', '2019-10-05 16:09:24'),
(13, 'Khách sạn Thanh Lịch Royal Boutique', '33 Hai Bà Trưng, Phường Vĩnh Ninh, Thành phố Huế, Tỉnh Thừa Thiên - Huế', '0234 3825 973', 1000000, 'Thanh Lich Hotel có hồ bơi trong nhà, trung tâm thể dục, quầy lễ tân 24 giờ và các phòng nghỉ tiện nghi, trang nhã với truy cập Wi-Fi miễn phí trong toàn bộ khuôn viên. Nằm cách Hoàng thành chỉ 400 m, khách sạn cung cấp chỗ đỗ xe miễn phí ngay trong khuôn viên.\r\n\r\n/nCác phòng nghỉ máy lạnh tại đây có sàn lát gỗ, két an toàn, tủ quần áo, khu vực tiếp khách, minibar và TV màn hình phẳng với các kênh truyền hình cáp. Các phòng nhìn ra quang cảnh thành phố và đi kèm phòng tắm riêng được trang bị bồn tắm, máy sấy tóc cùng đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nTại Thanh Lich Hotel, các dịch vụ đưa đón sân bay và cho thuê xe đạp/xe hơi cũng như tiện nghi phòng họp có thể được thu xếp theo yêu cầu của khách. Nhân viên thân thiện nói thông thạo tiếng Anh và Pháp có thể hỗ trợ khách với các dịch vụ giữ hành lý, giặt là cũng như đặt vé.\r\n\r\n/nVới nhà hàng và quán bar ngay trong khuôn viên, du khách có thể thưởng thức tuyển chọn các món ăn ngon của địa phương cùng với đủ loại đồ uống. Các bữa ăn theo chế độ đặc biệt có thể được chuẩn bị theo yêu cầu trong khi lựa chọn ăn uống tại phòng cũng được cung cấp cho khách.\r\n\r\n/nKhách sạn nằm trong bán kính khoảng 1,2 km từ Cầu Tràng Tiền và 1,3 km từ Chợ Đông Ba. Sân bay Quốc tế Đà Nẵng cách đó khoảng 80 km.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,0 cho kỳ nghỉ dành cho 2 người.', 4, 'hotel-thanhlich.jpg', 'Có 1 hồ bơi Wi-Fi miễn phí. Phòng gia đình. Trung tâm Spa & chăm sóc sức khoẻ. Phòng không hút thuốc. Trung tâm thể dục. Quầy bar', 1, '2019-10-19 09:03:24', '2019-10-05 16:09:24'),
(14, 'Khách Sạn Indochine Palace Huế', '105A Hùng Vương, Phú Nhuận, Thành phố Huế, Thừa Thiên Huế', '0234 3936 666', 1800000, 'Tọa lạc tại trung tâm thành phố Huế, Indochine Palace cung cấp chỗ ở rộng rãi và hiện đại với Wi-Fi miễn phí. Hồ bơi ngoài trời, hộp đêm và 5 lựa chọn ăn uống nằm trong số số các tiện nghi tại đây.\r\n\r\n/nNằm cách đó chưa đến 2 km là các điểm tham quan địa phương bao gồm Cầu Trường Tiền, Chợ Đông Ba và Bảo tàng Mỹ thuật Cung đình Huế. Khách sạn cách Sân bay Quốc tế Phú Bài 20 phút lái xe.\r\n\r\n/nCác phòng nghỉ tại Indochine Palace mở ra ban công với tầm nhìn ra quang cảnh thành phố, hồ nước hoặc hồ bơi và có lò sưởi. Ngoài ra còn đi kèm TV màn hình phẳng và phòng tắm riêng với bồn tắm và vòi sen riêng biệt.\r\n\r\n/nDu khách có thể rèn luyện sức khỏe ở trung tâm thể dục của khách sạn và thư giãn tại spa sau đó. Chỗ nghỉ này cũng có tiện nghi phòng xông hơi khô và phòng xông hơi ướt. Dịch vụ đưa đón sân bay 2 chiều được cung cấp theo yêu cầu với một khoản phụ phí. Du khách được bố trí chỗ đỗ xe riêng miễn phí.\r\n\r\n/nDu khách có thể chọn thưởng thức các món ăn cao cấp tại nhà hàng La Brasserie hay các món ăn thông thường ở quán Le Petit Café. Quán Au Rendezvous & Le Bar có ban nhạc sống trong khi quán Le Bar có danh sách rượu vang quốc tế. Du khách có thể thưởng thức đồ ăn nhẹ và đồ uống bên hồ bơi tại nhà hàng Les Bains. Dịch vụ ăn uống tại phòng 24 giờ cũng được cung cấp.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,5 cho kỳ nghỉ dành cho 2 người.', 5, 'hotel-indochine.jpg', 'Có 1 hồ bơi. Wi-Fi miễn phí. Trung tâm Spa & chăm sóc sức khoẻ. Phòng không hút thuốc. Trung tâm chăm sóc sức khỏe tuyệt vời. Quầy bar', 1, '2019-10-19 09:03:50', '2019-10-05 16:09:24'),
(15, 'Khách sạn Cherish Huế', '59 Bến Nghé, Phú Hội, Tp. Huế, Huế', '0234 3943 943', 800000, 'Tọa lạc ở trung tâm thành phố Huế, Cherish Hue Hotel chỉ cách Sông Hương nổi tiếng vài bước chân. Nơi đây cung cấp các liệu pháp spa thư giãn và trung tâm thể dục. Khách cũng được truy cập Wi-Fi miễn phí tại tất cả các khu vực chung của khách sạn.\r\n\r\n/nCác phòng tại đây rộng rãi, đầy đủ tiện nghi và được trang bị máy lạnh. Tất cả đều có TV màn hình plasma 26 inch, két an toàn cá nhân và khu vực tiếp khách. Phòng tắm riêng đi kèm đồ vệ sinh cá nhân và tiện nghi vòi sen.\r\n\r\n/nCherish Hue Hotel có quầy lễ tân 24 giờ với chỗ để hành lý. Quý khách cũng có thể thư giãn cơ bắp trong bồn tắm nước nóng hoặc thông qua liệu pháp mát-xa truyền thống. Dịch vụ đưa đón và vận chuyển sân bay có thể được bố trí với một khoản phí nhỏ.\r\n\r\n/nCherish Hue có nhà hàng phục vụ hàng loạt các món ăn địa phương ngon của Việt Nam cũng như các món phương Tây nổi tiếng. Dịch vụ phòng 24 giờ được cung cấp và bữa sáng có thể được phục vụ trong phòng theo yêu cầu.\r\n\r\n/nĐây là khu vực ở Huế mà khách yêu thích, theo các đánh giá độc lập.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,0 cho kỳ nghỉ dành cho 2 người.', 4, 'hotel-cherish.jpg', 'Có 1 hồ bơi. Wi-Fi miễn phí. Xe đưa đón sân bay. Phòng gia đình. Trung tâm Spa & chăm sóc sức khoẻ. Quầy bar.', 0, '2019-10-19 09:04:12', '2019-10-05 16:09:24'),
(16, 'Khách sạn Romance Huế', '16 Nguyễn Thái Học, Phú Hội, Thành phố Huế, Thừa Thiên Huế', '0234 3898 888', 1000000, 'Nằm trong tòa nhà 11 tầng, Romance Hotel có chỗ nghỉ 4 sao và hồ bơi tuyệt đẹp trên tầng mái tại thành phố Huế, khu vực di sản thế giới được UNESCO công nhận. Cách Sông Hương xinh đẹp trong vòng một quãng đi bộ, khách sạn có 3 quầy bar và 2 nhà hàng ngay trong khuôn viên.\r\n\r\n/nTất cả các phòng nghỉ rộng rãi ở đây đều có máy điều hòa và cửa sổ lớn đón nhiều ánh sáng tự nhiên. Khóa từ, TV truyền hình cáp màn hình phẳng và tủ lạnh mini cũng được trang bị trong phòng. Một số phòng chọn lọc đi kèm bồn tắm spa và/hoặc khu vực ghế ngồi. Phòng tắm riêng được trang bị tiện nghi vòi sen và máy sấy tóc. Áo choàng tắm, dép đi trong phòng và đồ vệ sinh cá nhân miễn phí cũng được cung cấp.\r\n\r\n/nChợ Đông Ba và Cầu Trường Tiền đều nằm trong bán kính 1 km từ khách sạn trong khi Chùa Diệu Đế cách đó 1,4 km. Sân bay gần nhất là sân bay Phú Bài, cách chỗ nghỉ 14 km.\r\n\r\n/nDu khách có thể tận hưởng liệu pháp mát-xa nhẹ nhàng tại Romance Spa hoặc rèn luyện sức khoẻ ở trung tâm thể dục. Khách sạn cũng có lễ tân 24 giờ và cung cấp dịch vụ đưa đón sân bay kèm phụ phí.\r\n\r\n/nNằm ở tầng 1, Lucky Plaza phục vụ một loạt món ăn Việt Nam và kiểu Á - Âu. Du khách có thể thưởng thức bữa sáng tự chọn quốc tế tại Nhà hàng Romance trên tầng 11, đồng thời thưởng ngoạn quang cảnh Sông Hương cũng như cảnh hoàng hôn. Du khách cũng có thể thư giãn tại quán Rendez-vous Bar & Cafe, nơi có tuyển chọn các loại đồ uống có cồn và thức uống giải khát.\r\n\r\n/nĐây là khu vực ở Huế mà khách yêu thích, theo các đánh giá độc lập.', 4, 'hotel-romance.jpg', 'Hồ bơi. Wi-Fi miễn phí. Xe đưa đón sân bay. Phòng gia đình. Trung tâm Spa & chăm sóc sức khoẻ. Phòng không hút thuốc. Quầy bar.\r\nPhù hợp cho cặp đôi - tiện nghi được đánh giá 8,5.', 0, '2019-10-19 09:04:33', '2019-10-05 16:09:24'),
(17, 'Khu nghỉ dưỡng Vinpearl Hạ Long Bay', 'Đảo Rều, Thành phố Hạ Long, Quảng Ninh', '0203 3556 868', 3500000, 'Khách sạn Vinpearl Ha Long Bay Resort 5 sao sang trọng có khu vực bãi biển riêng và spa thư giãn. Tọa lạc trên Đảo Rêu, resort có 3 lựa chọn ăn uống và cung cấp Wi-Fi miễn phí. Du khách có thể sử dụng hồ bơi ngoài trời, sân tennis và trung tâm thể dục.\r\n\r\n/nSân bay gần nhất là sân bay quốc tế Cát Bi, cách Vinpearl Ha Long Bay Resort 68 km.\r\n\r\n/nMỗi phòng nghỉ lắp máy điều hòa rộng rãi tại đây đều có ban công, TV truyền hình cáp màn hình phẳng, két an toàn và tủ lạnh mini. Phòng tắm riêng đi kèm bồn tắm, vòi sen, máy sấy tóc và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nTrung tâm thể dục, sân chơi cho trẻ em và tiện nghi thể thao dưới nước cũng nằm trong số các tiện ích có trong khuôn viên của chỗ nghỉ này. Du khách có thể đi lặn với ống thở và lặn biển hoặc chơi tennis. Resort còn cung cấp dịch vụ thu đổi ngoại tệ, dịch vụ trợ giúp đặc biệt, trung tâm dịch vụ doanh nhân và lễ tân 24 giờ.\r\n\r\n/nNhà hàng Bay View phục vụ nhiều món ăn quốc tế, trong khi Nhà hàng Pavilion tập trung vào các món ăn Việt Nam chính thống. Khách cũng có thể thưởng thức ẩm thực Nhật Bản tại Nhà hàng Akoya.', 5, 'vinpearlhalong-resort.jpg', '2 hồ bơi. Wi-Fi miễn phí. Phòng gia đình. Chỗ đỗ xe miễn phí.Phòng không hút thuốc. Quầy bar. Khu vực bãi tắm riêng', 1, '2019-10-19 09:04:57', '2019-10-05 16:09:24'),
(18, 'Khách Sạn Royal Hạ Long', 'Bãi Cháy, Thành phố Hạ Long, Quảng Ninh', '0203 3848 777', 1200000, 'Nằm ở trung tâm thành phố Hạ Long, Royal Halong Hotel có hồ bơi trong nhà, trung tâm dịch vụ doanh nhân và các phòng rộng rãi với tầm nhìn ra Vịnh Hạ Long. Khách sạn này cung cấp Wi-Fi lẫn chỗ đỗ xe miễn phí trong khuôn viên.\r\n\r\n/nCác phòng máy lạnh hiện đại tại đây được trang bị sàn trải thảm, tủ quần áo, TV truyền hình cáp màn hình phẳng 46 inch, minibar và khu vực tiếp khách với ghế sofa. Phòng tắm riêng đi kèm máy sấy tóc, vòi sen, dép và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nRoyal Halong Hotel có quầy lễ tân 24 giờ, có thể hỗ trợ quý khách với dịch vụ để hành lý, giặt là và fax/photocopy. Du khách có thể thuê xe đạp/xe hơi để khám phá khu vực hay đến bàn đặt tour để thu xếp việc đi lại và các chuyến tham quan.\r\n\r\n/nKhách sạn có nhà hàng cung cấp các món ăn ngon của Việt Nam và quốc tế. Quý khách cũng có thể dùng bữa trong sự riêng tư với dịch vụ ăn uống tại phòng.\r\n\r\n/nRoyal Halong Hotel chỉ cách 1 km từ bãi biển Bãi Cháy cùng công viên giải trí Sunworld, và cách 2,5 km từ Cầu Bãi Cháy. Chợ Đêm Hạ Long cách chỗ nghỉ này 1,5 km. Sân bay quốc tế Nội Bài cách đó khoảng 2,5 giờ lái xe.', 5, 'hotel-royal.jpg', '3 hồ bơi. Wi-Fi miễn phí. Xe đưa đón sân bay. Phòng gia đình. Casino. Chỗ đỗ xe miễn phí. Quầy bar', 1, '2019-10-19 09:05:14', '2019-10-05 16:09:24'),
(19, 'Khách sạn Hạ Long Plaza ', '8 Hạ Long, Bãi Cháy, Thành phố Hạ Long, Quảng Ninh', '0203 3845 810', 1000000, 'Halong Plaza Hotel nằm ở trung tâm thành phố Hạ Long, cách Ga cáp treo Nữ Hoàng 800 m. Khách sạn có hồ bơi ngoài trời, trung tâm thể dục và nhà hàng cũng như chỗ đỗ xe riêng miễn phí trong khuôn viên.\r\n\r\n/nTất cả các phòng nghỉ sang trọng tại đây được trang bị đầy đủ tiện nghi, bao gồm máy điều hòa, Wi-Fi miễn phí, đồ nội thất hiện đại, cửa sổ lớn đón nhiều ánh sáng tự nhiên và nhìn ra biển, TV truyền hình vệ tinh màn hình phẳng, tủ lạnh mini và tủ quần áo. Một số phòng được bố trí phòng khách riêng biệt với ghế sofa. Phòng tắm riêng có bồn tắm, buồng tắm đứng và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nDu khách có thể thư giãn với buổi xông hơi khô hoặc tận hưởng liệu pháp mát-xa nhẹ nhàng. Khách sạn còn có trung tâm dịch vụ doanh nhân đầy đủ trang thiết bị với dịch vụ fax và photocopy. Nhân viên tại bàn đặt tour có thể hỗ trợ khách sắp xếp chuyến đi trong ngày và du ngoạn qua đêm trên Vịnh Hạ Long.\r\n\r\n/nNhà hàng Four Seasons phục vụ một loạt món ăn ngon truyền thống của Việt Nam và đặc sản Hạ Long trong khi Nhà hàng Bay View cung cấp ẩm thực kiểu Âu, Nhật Bản, Thái Lan và Việt Nam. La Plaza Bar & Lounge cũng phục vụ rất nhiều món ăn nhẹ và đồ uống. Du khách có thể thưởng thức hơn 15 loại bánh mì và bánh ngọt Pháp tại Quầy bánh Pháp.\r\n\r\n/nHalong Plaza Hotel cách công viên giải trí Sun World Hạ Long 1,2 km và trung tâm thương mại Vincom Plaza Hạ Long 2,7 km. Sân bay gần nhất là Sân bay quốc tế Cát Bi, cách đó 38 km.', 4, 'hotel-halongplaza.jpg', 'Có 1 hồ bơi. Wi-Fi miễn phí. Chỗ đỗ xe miễn phí. Phòng không hút thuốc. Lễ tân 24 giờ. Trung tâm chăm sóc sức khỏe tốt. Quầy bar', 0, '2019-10-19 09:06:01', '2019-10-05 16:09:24'),
(20, 'Khách sạn Sheraton Nha Trang', '26-28 Trần Phú, Nha Trang', '0258 3880 000', 2000000, 'Tọa lạc ở vị trí trung tâm trên Đường Trần Phú, Sheraton Nha Trang có 6 lựa chọn ăn uống, hồ bơi vô cực ngoài trời trên tầng 6 và trường dạy nấu ăn đầu tiên của Việt Nam.\r\n\r\n/nCác phòng nghỉ trang nhã của Sheraton có tầm nhìn ra quang cảnh biển. Các phòng cũng có khu vực tiếp khách, truyền hình vệ tinh màn hình phẳng 37 inch và minibar. Phòng tắm riêng được trang bị vòi sen và bồn tắm riêng biệt.\r\n\r\n/nQuý khách có thể rèn luyện sức khỏe tại phòng tập thể dục/thư giãn với các liệu pháp mát-xa ở Shine Spa sang trọng. Sheraton Nha Trang cũng có CLB Phiêu lưu và có thể bố trí cho khách tham gia các hoạt động như lặn biển cũng như lặn với ống thở tại 1 trong những hòn đảo gần đó. Trung tâm dịch vụ doanh nhân 24 giờ cũng có tại đây.\r\n\r\n/nSân bay Quốc tế Cam Ranh cách khách sạn 45 phút lái xe. Các điểm tham quan ở địa phương như Tháp Chàm Po Nagar, Trung tâm du lịch Suối Khoáng Nóng Tháp Bà và Hòn Chồng cách khách sạn 2 - 3 km.Chỗ ở này cung cấp tiện nghi đỗ xe có mái che 24 giờ miễn phí.\r\n\r\n/nNằm ở tầng trệt, Toastina là 1 quán cà phê ngoài trời hiện đại và sang trọng phục vụ bánh mỳ, bánh ngọt và bánh bột nhào mới nướng. Quán cũng phục vụ trái cây xay, sinh tố, cà phê đá xay cùng thực đơn gọi món gồm bánh mỳ, mỳ ống, bánh pizza nướng bằng củi và ẩm thực Châu Á.\r\n\r\n/nĐây là khu vực ở Nha Trang mà khách yêu thích, theo các đánh giá độc lập.', 5, 'hotel-sheraton.jpg', 'Phòng gym. \r\nPhòng xông hơi ướt. \r\nÔ (dù) che nắng loại to. \r\nGhế/ghế dài tắm nắng. \r\nBồn tắm nóng. \r\nMassage. \r\nTrung tâm Spa & chăm sóc sức khoẻ. \r\nMáy ATM/rút tiền trong khuôn viên. \r\n', 0, '2019-10-19 09:06:23', '2019-10-05 16:09:24'),
(21, 'Mường Thanh Luxury Nha Trang', '60 Trần Phú, Lộc Thọ, Thành phố Nha Trang, Khánh Hòa', '0258 3898 888', 1800000, 'Muong Thanh Nha Trang Centre Hotel chiếm vị trí trung tâm ở thành phố Nha Trang, cách Bãi biển Nha Trang chỉ 200 m. Khách sạn có hồ bơi ngoài trời và trung tâm thể dục hiện đại. Quý khách có thể truy cập Wi-Fi miễn phí trong toàn bộ khuôn viên khách sạn.\r\n\r\n/nNơi nghỉ này cách Sân bay Quốc tế Cam Ranh khoảng 27 km. Quảng trường 2/4 và Trung tâm Thuyền buồm Việt Nam đều cách đó 300 m.\r\n\r\n/nTất cả các phòng tại đây đều được trang bị minibar, TV màn hình phẳng và két an toàn. Phòng tắm riêng hiện đại có máy sấy tóc, góc tắm vòi sen biệt lập và đồ vệ sinh cá nhân cao cấp.\r\n\r\n/nDu khách có thể thư giãn trên bãi biển bằng cách đọc một cuốn sách hay hoặc tận hưởng các liệu pháp spa xoa dịu. Quý khách cũng sẽ tìm thấy tiện nghi hát karaoke, phòng xông hơi khô và trung tâm dịch vụ doanh nhân tại đây. Các tiện nghi khác bao gồm quầy lễ tân 24 giờ và dịch vụ thu đổi ngoại tệ.\r\n\r\n/nHàng loạt món ăn địa phương và quốc tế ngon tuyệt được phục vụ tại nhà hàng trong khuôn viên. Khách có thể thưởng thức đồ ăn nhẹ, bia địa phương và cocktail giải khát tại quầy bar.\r\n\r\n/nĐây là khu vực ở Nha Trang mà khách yêu thích, theo các đánh giá độc lập.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,5 cho kỳ nghỉ dành cho 2 người.', 5, 'hotel-muongthanhnhatrang.jpg', 'Phòng gym. Massage. Trung tâm Spa & chăm sóc sức khoẻ. Phòng xông hơi. Phương tiện đi lại. Đưa đón khách tại sân bay. Giữ hành lí. Bữa ăn trẻ em. Bữa sáng tại phòng. Nhà hàng. ', 1, '2019-10-19 09:06:59', '2019-10-05 16:09:24'),
(23, 'The Island Lodge', '390 ấp Thới Bình, Thới Sơn, Mỹ Tho', '0273 6519 000', 4900000, 'Cung cấp hồ bơi ngoài trời và spa sang trọng, The Island Lodge có tầm nhìn ra Sông Mekong, các phòng sang trọng và hiện đại cùng Wi-Fi miễn phí trong các khu vực chung. Các lựa chọn ăn uống bao gồm nhà hàng gọi món và quầy bar bán đồ ăn nhanh.\r\n\r\n/nNằm ở Đồng bằng Sông Cửu Long, The Island Lodge cách sân bay quốc tế Tân Sơn Nhất 67 km.\r\n\r\n/nMỗi phòng gắn điều hòa tại đây đều có khung cảnh yên bình với tầm nhìn ra khu vườn từ sân hiên. TV truyền hình cáp màn hình phẳng, két an toàn và ấm đun nước điện cũng được cung cấp. Mỗi phòng còn có phòng tắm riêng với vòi sen, máy sấy tóc và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nCác tiện nghi khác được cung cấp bao gồm sảnh khách chung, bàn đặt tour và lễ tân 24 giờ. Khách có thể thư giãn với dịch vụ mát-xa hoặc tại phòng xông hơi khô. Chỗ đỗ xe riêng được bố trí miễn phí.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,5 cho kỳ nghỉ dành cho 2 người.', 5, 'island-lodge.jpg', 'Hồ bơi ngoài trời /nWi-Fi miễn phí  /nQuầy bar', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(24, 'Mekong Taste Bungalow', 'Thới Sơn Ấp Thới Thạnh, Xã Thới Sơn, Mỹ Tho', '0273 3889 839', 1000000, 'Nằm ở thành phố Mỹ Tho, Mekong Taste Bungalow cung cấp xe đạp và Wi-Fi miễn phí. Chỗ nghỉ này có sảnh khách chung và sân hiên phơi nắng. Bàn đặt tour có thể cung cấp thông tin về khu vực cho khách.\r\n\r\n/nMỗi phòng nghỉ tại khách sạn đều có sân trong nhìn ra vườn, phòng tắm riêng với đồ vệ sinh cá nhân miễn phí và khu vực ghế ngồi.\r\n\r\n/nNhà hàng tại đây phục vụ ẩm thực Châu Á.\r\n\r\n/nKhách nghỉ tại Mekong Taste Bungalow có thể tham gia các hoạt động trong và xung quanh thành phố Mỹ Tho như đạp xe, câu cá, chèo thuyền kayak cũng như đi bộ đường dài.\r\n\r\n/nChỗ nghỉ cách trung tâm 7,5 km. Sân bay gần nhất là sân bay quốc tế Tân Sơn Nhất, cách đó 78 km.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,6 cho kỳ nghỉ dành cho 2 người.', 3, 'mekong-taste.jpg', 'Wi-Fi miễn phí \r\n/nChỗ đậu xe miễn phí. Nhà hàng\r\n/nPhong cách nhà mới lạ\r\n', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(25, 'Khách sạn Amy Cần Thơ', '134/12 Trần Phú, P. Cái Khế, Q. Ninh Kiều, TP. Cần Thơ, Cần Thơ, Việt Nam', '091 976 71 67', 600000, 'Với WiFi miễn phí và phòng khách chung, Khách sạn Amy Cần Thơ cung cấp chỗ ở tại Cần Thơ, cách Vincom Plaza Hùng Vương chưa đến 1 km và Bến tàu Ninh Kiều 2,2 km. Khách sạn cách Lotte Mart Cần Thơ khoảng 2,9 km, Vincom Plaza Xuân Khánh 3,8 km và Chợ nổi Cái Răng 9 km. Khách sạn có phòng gia đình.\r\n/nSân vận động Cần Thơ là 200 mét từ khách sạn, trong khi Bảo tàng Cần Thơ là 2 km từ khách sạn. Sân bay gần nhất là Sân bay Quốc tế Cần Thơ, cách Khách sạn Amy Cần Thơ 11 km.', 2, 'hotel-amy.jpg', 'Phòng không hút thuốc /nWi-Fi miễn phí/nChỗ đỗ xe miễn phí', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(26, 'Khách sạn Hậu Giang 2', '08 Hải Thượng Lãn Ông, Tân An, Ninh Kiều, Cần Thơ', '0292 3824 836', 350000, 'Với quầy lễ tân làm việc 24 giờ, Hau Giang 2 Hotel cung cấp chỗ nghỉ thoải mái cách Bến Ninh Kiều và Chợ Cổ Cần Thơ 200 m. Khách sạn có truy cập Wi-Fi miễn phí cũng như chỗ đậu xe miễn phí trong khuôn viên.\r\n\r\n/nVới sàn lát gạch, các phòng nghỉ máy lạnh được trang bị tủ quần áo, khu vực tiếp khách, minibar và truyền hình cáp. Phòng còn có phòng tắm riêng đi kèm vòi sen, dép và máy sấy tóc.\r\n\r\n/nHau Giang 2 Hotel có bàn đặt tour có thể hỗ trợ khách với các dịch vụ bán vé và sắp xếp các chuyến tham quan. Dịch vụ giữ hành lý và giặt ủi cũng được cung cấp theo yêu cầu của khách.\r\n\r\n/nKhách sạn này cũng cung cấp dịch vụ đưa đón miễn phí đến khu trung tâm thành phố. Chợ đêm Tây Đô cách nơi nghỉ này 250 m và công viên Ninh Kiều cách đó 400 m. Bảo tàng Cần Thơ nằm trong bán kính 600 m từ nơi nghỉ này, trong khi Chợ Nổi Cái Răng cách khách sạn 6 km lái xe.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,0 cho kỳ nghỉ dành cho 2 người.', 2, 'hotel-haugiang.jpg', 'Xe đưa đón sân bay /nWi-Fi miễn phí /nChỗ đỗ xe miễn phí /nBữa sáng', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(27, 'Hai Van GuestHouse', '102-104 Hoang Dieu, Chau Phu B, Châu Đốc', '028 3829 1274', 400000, 'Hai Van Guesthouse cung cấp các phòng nghỉ gắn máy điều hòa ở thành phố Châu Đốc. Chỗ nghỉ có sân hiên, Wi-Fi miễn phí và chỗ đỗ xe riêng miễn phí.\r\n\r\n/nMỗi phòng nghỉ tại đây đều có ban công, bàn làm việc, TV màn hình phẳng và phòng tắm riêng.\r\n\r\n/nĐội ngũ nhân viên thành thạo tiếng Anh và tiếng Việt tại lễ tân sẵn sàng cung cấp các thông tin hữu ích về khu vực cho du khách.', 2, 'haivan.jpg', 'Wifi miễn phí\r\n/nChỗ để xe riêng miễn phí\r\n', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(28, 'MURRAY Guesthouse', '11-15 Trương Định, Châu Phú B, Châu Đốc', '090 836 13 44', 800000, 'Tọa lạc tại trung tâm thành phố, Murray Guesthouse cách bờ sông Hậu 10 phút đi bộ thuận tiện. Khách có thể truy cập Wi-Fi miễn phí trong toàn bộ nơi nghỉ này trong khi chỗ đỗ xe máy được cung cấp miễn phí.\r\n\r\n/nĐược trang bị nội thất giản dị, các phòng máy lạnh ở đây có sàn lát gạch, tủ quần áo với két an toàn, minibar, truyền hình cáp, bàn làm việc và khu vực tiếp khách. Phòng tắm riêng đi kèm với vòi sen và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nVới quầy lễ tân thường trực sau giờ làm việc, Murray Guesthouse cung cấp các dịch vụ giữ hành lý, giặt là và ủi. Du khách sẽ được chơi bi-a miễn phí. Tại đây có bán vé đi thuyền trên sông đến Campuchia, đồng thời cung cấp thông tin về các chuyến xe buýt và địa điểm tham quan ở địa phương.\r\n\r\n/nKhu vực ăn uống nằm trong sảnh khách phục vụ bữa sáng và đủ loại món ăn Việt Nam đầy hương vị.\r\n\r\n/nNhà khách nằm trong bán kính 800 m đến Công viên 30/4 và 2 km đến bến xe Châu Đốc. Thành phố Cần Thơ cách chỗ ở này khoảng 3 giờ lái xe trong khi Thành phố Hồ Chí Minh cách đó 270 km.', 3, 'murray.jpg', 'Wi-Fi miễn phí /nQuầy bar /nBữa sáng tuyệt vời', 0, '2019-10-19 14:11:55', '2019-10-19 14:11:55'),
(29, 'Khách sạn Khánh An', '18/15 Tuyên Quang, Phan Thiết, Việt Nam', '0252 6523 689', 400000, 'Hotel Khanh An tọa lạc tại thành phố Phan Thiết, cách Phố ẩm thực Phan Thiết 1,4 km. Khách sạn 2 sao này có sân hiên, chỗ đỗ xe riêng, sảnh khách chung, phòng nghỉ gắn máy điều hòa với WiFi miễn phí và phòng tắm riêng cùng lễ tân 24 giờ, bếp chung và dịch vụ thu đổi ngoại tệ cho khách.\r\n\r\n/nTất cả phòng nghỉ tại khách sạn đều được trang bị tủ quần áo, bàn và TV màn hình phẳng.\r\n\r\n/nCác địa danh nổi tiếng gần khách sạn bao gồm Bưu điện Bình Thuận, Bảo tàng Hồ Chí Minh và cảng cá Phan Thiết.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 8,8 cho kỳ nghỉ dành cho 2 người.', 2, 'khanhan.jpg', 'Xe đưa đón sân bay /nPhòng không hút thuốc /nWi-Fi miễn phí /nChỗ đỗ xe', 0, '2019-10-19 14:33:09', '2019-10-19 14:33:09'),
(30, 'Veranda Beach Place', 'Tien Phu, Tien Thanh, Phan Thiết', '091 113 87 58', 1500000, 'Nằm dọc theo bờ biển Tiến Thành, Veranda Beach Resort cung cấp chỗ nghỉ yên tĩnh và tiện nghi với kết nối Wi-Fi miễn phí trong toàn bộ khuôn viên. Nơi nghỉ này có khu vực bãi biển riêng, vườn cảnh xinh đẹp và hồ bơi ngoài trời.\r\n\r\n/nCác phòng nghỉ lắp máy điều hòa và bungalow bên sườn đồi được trang bị nội thất trang nhã với tủ quần áo, khu vực ghế ngồi, tủ lạnh mini và két an toàn trong phòng. Phòng tắm riêng đi kèm tiện nghi vòi sen, dép và máy sấy tóc.\r\n\r\n/nĐội ngũ nhân viên thân thiện tại đây sẵn sàng hỗ trợ quý khách với dịch vụ giữ hành lý, giặt là và cho thuê xe hơi. Dịch vụ đưa đón, vận chuyển sân bay và các hoạt động tham quan cũng có thể được thu xếp tại đây với một khoản phụ phí.\r\n\r\n/nNhà hàng trong khuôn viên phục vụ các món ăn địa phương và Phương Tây đặc sắc. Các bữa ăn cân bằng được thiết kế đặc biệt cũng được cung cấp cho khách.\r\n\r\n/nVeranda Beach Resort nằm trong bán kính khoảng 17 km từ Phố Ẩm thực Phan Thiết và ga Phan Thiết.', 4, 'veranda.jpg', 'Hồ bơi ngoài trời. /nXe đưa đón sân bay  /nChỗ đỗ xe miễn phí /nDịch vụ phòng', 1, '2019-10-19 14:34:43', '2019-10-19 14:33:09'),
(31, 'TTC Hotel Premium Phan Thiet ', '206 Lê Lợi, Hưng Long, Thành phố Phan Thiết', '0252 3835 666', 1200000, 'Tọa lạc trên đường Nguyễn Tất Thành, TTC Hotel Premium Phan Thiet có tầm nhìn ra biển và những ngọn núi hình thành từ núi lửa cổ tại thành phố Phan Thiết. Khách sạn có hồ bơi ngoài trời, khu vườn và nhà hàng cùng chỗ đỗ xe miễn phí trong khuôn viên.\r\n\r\n/nVới gam màu tím nhẹ nhàng của vải cùng sắc nâu của nội thất gỗ sẫm màu, các phòng rộng rãi tại đây đều được trang bị máy điều hòa, WiFi miễn phí, cửa sổ nhìn ra quang cảnh thành phố/biển, khu vực ghế ngồi và tủ lạnh mini. Phòng tắm riêng đi kèm bồn tắm, máy sấy tóc và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nỞ khu vực xung quanh có rất nhiều nhà hàng và cửa hiệu. TTC Hotel Premium Phan Thiet nằm đối diện Bãi biển Đồi Dương, cách ga tàu Phan Thiết 5 phút lái xe và phường Mũi Né 40 phút lái xe.\r\n\r\n/nDu khách có thể chơi tennis hoặc tận hưởng liệu pháp mát-xa thư giãn ở spa. Nhân viên tại quầy lễ tân 24 giờ có thể cung cấp các tiện nghi thể thao dưới nước theo yêu cầu, bao gồm lặn với ống thở/bình dưỡng khí, lướt ván buồm và câu cá biển sâu. Dịch vụ cho thuê xe hơi và để hành lý cũng có tại đây.\r\n\r\n/nNhà hàng Oriental có thực đơn gọi món, phục vụ đủ món kiểu Âu và Á. Dịch vụ phòng cũng được đáp ứng.', 4, 'ttc.jpg', 'Hồ bơi ngoài trời /nTrung tâm Spa & chăm sóc sức khoẻ /nPhòng gym /nChỗ đỗ xe miễn phí Quầy bar', 1, '2019-10-19 14:33:09', '2019-10-19 14:33:09'),
(32, 'Grand Mercure Bangkok Asoke Residence', '50-5 Sukhumvit Soi 19, Wattana, 10110 Bangkok, Thái Lan', '0 2 207 3333', 2000000, 'Grand Mercure Bangkok Asoke Residence cung cấp tiện nghi 5 sao sang trọng với truy cập Wi-Fi và chỗ đỗ xe riêng miễn phí. Chỗ nghỉ này có hồ bơi trên tầng mái, trung tâm thể dục và tiện nghi xông hơi khô. Dịch vụ đưa đón miễn phí đến Trung tâm Mua sắm Terminal 21 và Ga Tàu BTS Skytrain Asoke cũng được cung cấp tại đây.\r\n\r\n/nGrand Mercure nằm trong khoảng cách đi bộ thuận tiện từ Đường Sukhumvit nổi tiếng và Ga BTS Asoke.\r\n\r\n/nCác suite hiện đại ở đây có đồ nội thất bằng gỗ tối màu và ban công riêng. Trong suite đi kèm bếp nhỏ đầy đủ tiện nghi. Ngoài ra còn được trang bị tiện nghi ủi, TV truyền hình cáp và két an toàn.\r\n\r\n/nNgoài hồ bơi trên tầng mái với tầm nhìn tuyệt đẹp hướng ra đường chân trời, dinh thự này cũng cung cấp dịch vụ cao cấp và đội ngũ nhân viên chuyên nghiệp để đảm bảo kỳ nghỉ của du khách được hoàn hảo về mọi mặt, cho dù du khách cần nghỉ ngơi thư giãn hoặc đang trong chuyến công tác.\r\n\r\n/nWattana là lựa chọn tuyệt vời cho du khách thích hoạt động giải trí về đêm, mua sắm quần áo và người dân thân thiện.\r\n\r\n/nĐây là khu vực ở Bangkok mà khách yêu thích, theo các đánh giá độc lập.', 5, 'mercure.jpg', 'Hồ bơi ngoài trời /nTrung tâm chăm sóc sức khỏe tốt /nCho phép mang theo vật nuôi /nBữa sáng', 1, '2019-10-19 14:36:26', '2019-10-19 14:33:09'),
(33, 'Daraya Boutique Hotel', '80 Soi Kasemsan 3, Rama 1 Road, Wangmai Patthumwan, Phaya Thai, 10330 Bangkok, Thái Lan', '0 2 612 3911', 1900000, 'Đặt tại Bangkok, cách Trung tâm Văn hóa & Nghệ thuật Bangkok 500 m, Daraya Boutique Hotel cung cấp chỗ ở với nhà hàng, bãi đậu xe riêng miễn phí, quán bar và phòng khách chung. Khách sạn 4 sao này cung cấp dịch vụ phòng và trung tâm dịch vụ doanh nhân. Khách sạn có tầm nhìn ra thành phố, hồ bơi ngoài trời, quầy lễ tân 24 giờ và WiFi miễn phí.\r\n\r\n/nTất cả các phòng nghỉ đều có máy lạnh, TV màn hình phẳng với các kênh truyền hình cáp, ấm đun nước, vòi sen, máy sấy tóc và bàn làm việc. Tại khách sạn, tất cả các phòng đều được trang bị tủ quần áo và phòng tắm riêng.\r\n\r\n/nKhách tại Daraya Boutique Hotel có thể thưởng thức bữa sáng gọi món.\r\n\r\n/nCác chỗ ở cung cấp một sân thượng.\r\n\r\n/nCác điểm tham quan nổi tiếng gần Daraya Boutique Hotel bao gồm Nhà Jim Thompson, Trung tâm MBK và Trung tâm thương mại Siam Paragon. Sân bay gần nhất là Sân bay Quốc tế Don Mueang, cách khách sạn 25 km.\r\n/nPhaya Thai là lựa chọn tuyệt vời cho du khách thích mua sắm, mua sắm quần áo và ẩm thực.\r\n\r\n/nĐây là khu vực ở Bangkok mà khách yêu thích, theo các đánh giá độc lập.', 4, 'daraya.jpg', 'Hồ bơi ngoài trời /nPhòng không hút thuốc /nChỗ đỗ xe miễn phí /nBữa sáng', 0, '2019-10-19 14:47:55', '2019-10-19 14:47:55'),
(34, 'Bally Suite Silom', '10 Soi Si Lom 2, Suriya Wong, Bang Rak, Bangkok 10500, Thái Lan', '0 2 266 6465', 1000000, 'Bally Suite Silom nằm ở Silom, trong khoảng cách đi bộ từ khu giải trí, Ga tàu điện ngầm Silom và Trạm tàu ​​điện ngầm BTS Sala Daeng. Chỗ ở này có Internet miễn phí, nhà hàng và các phòng có truyền hình cáp màn hình phẳng.\r\n\r\n/nTrung tâm mua sắm MBK cách khoảng 1,5 km từ Bally Suite Silom. Khách sạn cách Ga BTS Siam 2 km và Sân bay Don Muang 22,5 km.\r\n\r\n/nCác phòng có kiểu trang trí hiện đại và sàn gỗ cứng. Các tiện nghi bao gồm đầu đĩa DVD và hộp ký gửi an toàn. Một minibar và máy pha trà / cà phê cũng được cung cấp.\r\n\r\n/nKhách sạn cung cấp dịch vụ giặt khô và giặt ủi. Dịch vụ massage có thể được sắp xếp theo yêu cầu.\r\n\r\n/nKhách có thể dùng bữa tại nhà hàng trong khuôn viên, nơi phục vụ nhiều món ăn địa phương và quốc tế.\r\n/nBang Rak là lựa chọn tuyệt vời cho du khách thích giao thông công cộng thuận tiện, không gian và người dân thân thiện.', 3, 'bally.jpg', 'Phòng không hút thuốc /nWi-Fi miễn phí /nLễ tân 24 giờ', 0, '2019-10-19 14:47:55', '2019-10-19 14:47:55'),
(35, 'The Samsen Street Hotel', 'Soi Samsen 6, 10200 Bangkok, Thái Lan', '0 2 281 5279', 1800000, 'Một trong những chỗ nghỉ bán chạy nhất ở Bangkok của chúng tôi!\r\n/nSamsen Street Hotel có nhà hàng, hồ bơi ngoài trời, quán bar và phòng khách chung ở Bangkok. Trong số các tiện nghi tại khách sạn này có quầy lễ tân và dịch vụ phòng 24 giờ, cùng với WiFi miễn phí trong toàn bộ khách sạn. Khách sạn cách Bảo tàng Quốc gia Bangkok 2,3 km và Đền Phật Ngọc 2,6 km.\r\n\r\n/nKhách sạn phục vụ bữa sáng kiểu Âu hoặc tự chọn.\r\n\r\n/nSamsen Street Hotel có sân hiên tắm nắng.\r\n\r\n/nĐường Khao San là 1,1 km từ chỗ ở, trong khi Temple of the Golden Mount là 2,2 km từ khách sạn. Sân bay gần nhất là Sân bay Quốc tế Don Mueang, cách Samsen Street Hotel 27 km.', 4, 'samsen.jpg', 'Hồ bơi ngoài trời /nPhòng không hút thuốc /nWiFi có ở mọi khu vực /nDịch vụ phòng', 0, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(36, 'Marina Bay Sands', '10 Bayfront Avenue, Marina Bay, 018956 Singapore, Singapore', '0 6688 8868', 12000000, 'Đứng sừng sững trên vịnh, khách sạn mang tính biểu tượng này có hồ bơi vô cực trên tầng mái lớn nhất thế giới, 20 lựa chọn ăn uống và sòng bạc đẳng cấp thế giới. Từ khách sạn, du khách có thể đi thẳng sang trung tâm mua sắm hàng đầu của Singapore và Bảo tàng Artscience, nơi thường xuyên tổ chức buổi triển lãm Future World. Khách sạn cung cấp WiFi miễn phí trong tất cả các phòng nghỉ.\r\n\r\n/nPhòng nghỉ tại Marina Bay Sands được trang trí bằng gỗ tối màu theo phong cách hiện đại và có sàn trải thảm, TV màn hình phẳng với các kênh truyền hình cáp, bao gồm cả kênh CCTV4. Cửa sổ vách kính cho tầm nhìn ra toàn cảnh đường chân trời thành phố Singapore. Tất cả các phòng đều được trang bị ấm đun nước điện với trà Grand Jasmine và dép đi trong phòng ngủ. Phòng tắm riêng đi kèm tiện nghi vòi sen và đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nMarina Bay Sands tọa lạc tại ga tàu điện ngầm MRT Bayfront và cách Khu thương mại trung tâm sôi động vài bước chân. Với kết nối thuận tiện qua một cầu nối, Marina Bay Sands cách công viên Gardens by the Bay 950 m và đập nước Marina Barrage 2,1 km. Các trung tâm mua sắm Marina Square và Millenia Walk đều nằm trong bán kính 1,4 km từ khách sạn trong khi sân bay Changi Singapore cách đó 20,2 km.\r\n\r\n/nQuầy lễ tân phục vụ 24 giờ/ngày có thể hỗ trợ khách với dịch vụ thu đổi ngoại tệ, đặt tour du lịch và phòng giữ hành lý. Du khách có thể ngắm nhìn quang cảnh tuyệt đẹp của thành phố từ hồ bơi vô cực trên tầng mái hoặc tại Đài quan sát Sands SkyPark trên tầng 57 hay tận hưởng liệu pháp mát-xa nhẹ nhàng tại Banyan Tree Spa nổi tiếng thế giới. Nhân viên khách sạn có thể giao tiếp bằng tiếng Anh và tiếng Quan Thoại.\r\n\r\n/nMarina Bay Sands cung cấp các lựa chọn ăn uống cao cấp do các đầu bếp nổi tiếng đảm nhiệm như CUT của Wolfgang Puck, Bread Street Kitchen của Gordon Ramsay và Long Chim của David Thompson. Du khách có thể tham gia tiệc tùng suốt đêm ở hộp đêm hay thư giãn tại bất kỳ sảnh khách nào trong số 3 sảnh khách tại đây. Ẩm thực Á cũng được phục vụ tại khách sạn.\r\n\r\n/nMarina Bay là lựa chọn tuyệt vời cho du khách thích phong cảnh đường chân trời, vườn bách thảo và tham quan thành phố.\r\n\r\n/nKhu vực này rất tuyệt để mua sắm, có những thương hiệu nổi tiếng gần đó: Cartier, Tiffany & Co, Hermès, Louis Vuitton.', 5, 'marina.jpg', 'Hồ bơi ngoài trời /nTrung tâm chăm sóc sức khỏe rất tốt /nTrung tâm Spa & chăm sóc sức khoẻ /nChỗ đậu xe trong khuôn viên', 1, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(37, 'Mandarin Orchard Singapore', '333 Orchard Road, Orchard, 238867 Singapore, Singapore', '0 6737 4411', 3500000, 'Mandarin Orchard cung cấp chỗ nghỉ ở vị trí trung tâm, dọc theo vành đai mua sắm nhộn nhịp trên Đường Orchard. Nằm trong bán kính đi bộ đến các bệnh viện Paragon Medical và Mount Elizabeth Hospital, khách sạn có hồ bơi ngoài trời với hiên tắm nắng và du khách có thể dùng bữa tại các nhà hàng trong nhà từng được trao giải thưởng hoặc thưởng thức đồ uống tại quầy bar. Wi-Fi được cung cấp miễn phí trong toàn bộ khuôn viên.\r\n\r\n/nCác ga tàu điện ngầm MRT Orchard và Somerset đều cách khách sạn 600 m. Du khách đi 220 m là cũng đến được các trung tâm mua sắm Takashimaya và Ngee Ann City. Mandarin Orchard Singapore cách Bảo tàng quốc gia Singapore 2 km, Vườn bách thảo Singapore 2,8 km và sân bay Changi Singapore 22,4 km.\r\n\r\n/nCác phòng nghỉ hiện đại của Mandarin Orchard có những chủ đề lấy cảm hứng từ Phương Đông với tông màu và kiểu trang trí nhẹ nhàng. TV truyền hình cáp gồm các kênh địa phương và quốc tế bằng các ngôn ngữ như tiếng Anh và tiếng Trung. Ấm đun nước, tủ lạnh mini, đài radio và két an toàn cũng có cho khách sử dụng. Áo choàng tắm và dép được cung cấp trong các phòng. Phòng tắm riêng đi kèm các đồ vệ sinh cá nhân miễn phí như bàn chải đánh răng và kem đánh răng.\r\n\r\n/nKhách có thể chơi tennis hoặc rèn luyện sức khỏe tại trung tâm thể dục. Khách sạn được kết nối thẳng với trung tâm mua sắm 4 tầng Mandarin Gallery. Dịch vụ phòng 24 giờ được cung cấp cho khách. Nhân viên có thể hỗ trợ du khách bằng các ngôn ngữ như tiếng Anh và tiếng Trung.\r\n\r\n/nMón Cơm Gà Mandarin đặc trưng từng đoạt giải thưởng được phục vụ tại Nhà hàng Chatterbox, nơi du khách cũng có thể thưởng thức các món ăn được yêu thích khác của địa phương. Nhà hàng Triple Three phục vụ các món ăn tự chọn quốc tế trong khi danh sách các loại đồ uống và cocktail phong phú có tại quầy Bar on 5.\r\n\r\n/nOrchard là lựa chọn tuyệt vời cho du khách thích mua sắm, ẩm thực và đường phố sạch sẽ.\r\n\r\n/nĐây là khu vực ở Singapore mà khách yêu thích, theo các đánh giá độc lập. Khu vực này rất tuyệt để mua sắm, có những thương hiệu nổi tiếng gần đó: Cartier, H&M, Prada, Burberry, Louis Vuitton.', 5, 'mandarin.jpg', 'Hồ bơi ngoài trời /nTrung tâm chăm sóc sức khỏe tốt /nQuầy bar /nBữa sáng tốt', 1, '2019-10-19 15:52:16', '2019-10-19 15:52:16');
INSERT INTO `hotels` (`id`, `name`, `address`, `contact`, `price`, `content`, `star_rating`, `image`, `about`, `highlight`, `created_at`, `updated_at`) VALUES
(38, 'PARKROYAL on Kitchener Road', '181 Kitchener Road, Lavender, 208533 Singapore, Singapore', '0 6428 3000', 2800000, 'Tự hào có hồ bơi, PARKROYAL on Kitchener Road tọa lạc tại trung tâm của Khu Tiểu Ấn, bên cạnh trung tâm mua sắm Mustafa Centre 24 giờ. Tiện nghi xông hơi ướt và dịch vụ mát-xa đang đón chờ du khách tại đây.\r\n\r\n/nPARKROYAL on Kitchener Road cách Ga tàu điện ngầm Farrer Park, nơi cung cấp chuyến tàu trực tiếp đi thẳng đến các điểm tham quan tại địa phương như Clark Quay, Khu Phố Tàu và HarbourFront, 5 phút đi bộ. Đường Orchard - vành đai mua sắm của thành phố Singapore - cách nơi này 15 phút đi tàu lửa.\r\n\r\n/nCác phòng hiện đại tại PARKROYAL on Kitchener Road đem lại cho khách sự tiện lợi với Wi-Fi miễn phí. Truyền hình cáp cũng được cung cấp. Máy pha trà/cà phê và minibar có sẵn trong mỗi phòng.\r\n\r\n/nQuý khách có thể rèn luyện sức khỏe tại phòng tập thể dục đầy đủ trang thiết bị nhìn ra quang cảnh hồ bơi. Khách sạn cũng có trung tâm dịch vụ doanh nhân và bàn đặt tour.\r\n\r\n/nCác món ăn Quốc tế và châu Á được yêu thích được phục vụ tại Spice Brasserie. Du khách có thể thưởng thức ẩm thực Quảng Đông và Tứ Xuyên chính thống phục vụ kèm trà đặc biệt được pha chế bởi bậc thầy về trà. Club 5 Lounge ở tầng trệt là nơi khách có thể thư giãn với ly cocktail.\r\n\r\n/nLavender là lựa chọn tuyệt vời cho du khách thích giao thông công cộng thuận tiện, tham quan thành phố và địa điểm du lịch.', 4, 'parkroyal.jpg', 'Hồ bơi ngoài trời /nPhòng gym /nChỗ đỗ xe miễn phí /nQuầy bar (Tạm thời ngừng hoạt động)', 0, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(39, 'Ascott Sentral Kuala Lumpur', 'No 211 Jalan Tun Sambanthan, Brickfields, 50470 Kuala Lumpur, Malaysia', '0 3 2727 9999', 2200000, 'Nằm cách Ga tàu KL Sentral 650 m, Ascott Sentral Kuala Lumpur cung cấp các căn hộ hiện đại với Wi-Fi miễn phí trong toàn bộ khuôn viên. Chỗ nghỉ này có hồ bơi ngoài trời và trung tâm thể dục. Dịch vụ đưa đón theo lịch trình được cung cấp miễn phí cho khách.\r\n\r\n/nCác căn hộ hiện đại ở đây đều có máy điều hòa, TV truyền hình vệ tinh màn hình phẳng và khu vực ghế ngồi. Bếp nhỏ cũng có trong căn hộ để tạo sự thoải mái cho khách. Các phòng tắm riêng được trang bị đồ vệ sinh cá nhân sang trọng và vòi sen. Một số căn hộ còn có bồn tắm.\r\n\r\n/nBữa sáng kiểu lục địa hàng ngày được đáp ứng theo yêu cầu. Nhiều nhà hàng phục vụ các món ăn địa phương và quốc tế nằm ở Khu Tiểu Ấn gần đó, cách chỗ nghỉ 2 phút đi bộ.\r\n\r\n/nDu khách có thể thư giãn bên hồ bơi và trẻ em có thể chơi tại bể vầy cho trẻ em. Nhân viên thân thiện tại quầy lễ tân 24 giờ có thể hỗ trợ khách với dịch vụ giặt thường và giặt khô có thu phí trong khi dịch vụ dọn phòng hàng ngày được cung cấp miễn phí.\r\n\r\n/nTrung tâm mua sắm NU Sentral nằm trong bán kính 450 m từ Ascott Sentral Kuala Lumpur trong khi Vườn Bách Thảo Perdana cách đó 4,4 km. Sân bay quốc tế Kuala Lumpur cách chỗ nghỉ 60 km.\r\n\r\n/nBrickfields là lựa chọn tuyệt vời cho du khách thích giao thông công cộng thuận tiện, kỳ nghỉ hợp túi tiền và tham quan thành phố.', 5, 'ascott.jpg', 'Hồ bơi ngoài trời /nTrung tâm chăm sóc sức khỏe tốt /nTrung tâm Spa & chăm sóc sức khoẻ /nXe đưa đón sân bay', 1, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(40, 'The St. Regis Kuala Lumpur', 'No 6, Jalan Stesen Sentral 2, Ga xe lửa Trung tâm KL, 50470 Kuala Lumpur, Malaysia', '0 3 2727 1111', 4000000, 'Cung cấp các phòng nghỉ tiêu chuẩn lớn nhất ở thành phố Kuala Lumpur, The St. Regis Kuala Lumpur đem tới cho khách chỗ nghỉ sang trọng ở vị trí thuận tiện trong ga tàu KL Sentral ở Kuala Lumpur. Khách sạn có Wi-Fi miễn phí, phòng xông hơi khô và trung tâm thể dục.\r\n\r\n/nThe St. Regis Kuala Lumpur đảm bảo đáp ứng mọi nhu cầu của du khách với các cửa sổ kính suốt từ trần tới sàn trong khi các phòng nghỉ cho tầm nhìn tuyệt đẹp ra vườn bách thảo Lake Gardens và đường chân trời KL. Tất cả phòng tự hào có khu vực tiếp khách lớn cũng như tủ quần áo không cửa ngăn đi kèm không gian để hành lý và chỗ để quần áo rộng rãi. Mỗi phòng còn có bàn trang điểm nhiều ánh sáng. Phòng cũng có bàn làm việc được trang bị trung tâm giải trí đa phương tiện HDMI và các ổ cắm tiêu chuẩn quốc tế.\r\n\r\n/nCác Suite Speciality còn có Phòng Mát-xa trong phòng, Phòng An ninh lưu trữ các thông tin an ninh cá nhân, tủ quần áo không cửa ngăn cho cặp đôi và phòng tắm. Các suite cũng có thể được chuyển đổi thành phòng gồm nhiều phòng cho nhóm khách và gia đình.\r\n\r\n/nLấy cảm hứng từ Astors, tất cả các phòng tại đây đều được bài trí bằng xuyên suốt với những chi tiết tinh tế như chốt khóa khoét hình bàn đạp may tay và tay nắm tủ bằng pha lê vát nhiều cạnh.\r\n\r\n/nTại The St. Regis Kuala Lumpur còn có quầy lễ tân 24 giờ, tiện nghi phòng họp và dịch vụ trợ giúp đặc biệt.\r\n\r\n/nGa xe lửa Trung tâm KL là lựa chọn tuyệt vời cho du khách thích văn hóa ẩm thực đa dạng, thực phẩm địa phương và giao thông công cộng thuận tiện.', 5, 'regis.jpg', 'Hồ bơi ngoài trời /nPhòng gym. Trung tâm Spa /n Xe đưa đón sân bay /nBữa sáng tốt', 1, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(41, 'Tropical Hotel @ Kota Damansara', 'Persiaran Mahogani 01-G Garden Wing Sunsuria Avenue. Kota Damansara, 47810 Petaling Jaya, Malaysia', '0 17 766 1552', 400000, 'Tọa lạc tại Petaling Jaya, cách Evolve Concept Mall 7 km, Tropical Hotel @ Kota Damansara có chỗ ở với sân thượng và bãi đậu xe riêng. Khách sạn cách The Curve khoảng 4,1 km, KidZania Kuala Lumpur 4,3 km và Trung tâm Y tế Sunway 15 km. Chỗ ở này có quầy lễ tân 24 giờ, đưa đón sân bay, dịch vụ phòng và WiFi miễn phí.\r\n\r\n/nTrung tâm mua sắm 1 Utama cách khách sạn 8 km trong khi Trung tâm Hội nghị & Kinh doanh Toàn cầu cách đó 10 km. Sân bay gần nhất là Sân bay Sultan Abdul Aziz Shah, cách Khách sạn Nhiệt đới @ Kota Damansara 12 km.', 3, 'tropica.jpg', 'Xe đưa đón sân bay /nChỗ đậu xe trong khuôn viên /nWi-Fi miễn phí', 0, '2019-10-19 15:52:16', '2019-10-19 15:52:16'),
(42, 'Hotel Colline', '10 Phan Bội Châu, Phường 2, Thành phố Đà Lạt, Lâm Đồng', '0263 3665 588', 1300000, 'Nằm ở trung tâm thành phố Đà Lạt, cách Quảng trường Lâm Viên 500 m, Hôtel Colline có quầy bar và các phòng với truy cập Wi-Fi miễn phí. Khách sạn này nằm cách Hồ Xuân Hương 200 m và cách công viên Yersin 500 m.\r\n\r\n/nCác phòng tại đây được trang bị máy điều hòa, TV truyền hình cáp màn hình phẳng, ấm đun nước, chậu rửa vệ sinh, đồ vệ sinh cá nhân miễn phí, bàn làm việc, phòng tắm riêng và tầm nhìn ra quang cảnh thành phố. Ngoài ra còn có tủ quần áo.\r\n\r\n/nKhách nghỉ tại Hôtel Colline có thể thưởng thức bữa sáng tự chọn.\r\n\r\n/nNhân viên thông thạo tiếng Anh và tiếng Việt tại lễ tân 24 giờ luôn sẵn sàng hỗ trợ quý khách.\r\n\r\n/nKhách sạn cách Vườn hoa Đà Lạt 500 m và cách Thiền Viện Trúc Lâm 4 km. Sân bay gần nhất là sân bay Liên Khương, cách đó 23 km.\r\n\r\n/nĐây là khu vực ở Đà Lạt mà khách yêu thích, theo các đánh giá độc lập.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,4 cho kỳ nghỉ dành cho 2 người.', 4, 'colline.jpg', 'Chỗ đỗ xe miễn phí /nPhòng gia đình /nXe đưa đón sân bay /nPhòng gym', 1, '2019-10-22 07:29:40', '2019-10-22 07:29:40'),
(43, 'Moonstone Hotel Dalat', '86 Đường Lý Tự Trọng, Đà Lạt', '0263 3820 531', 900000, 'Tọa lạc tại thành phố Đà Lạt, cách Quảng Trường Lâm Viên 2 km và Hồ Xuân Hương 2,2 km, Moonstone Hotel Dalat cung cấp chỗ nghỉ với sân hiên cũng như chỗ đỗ xe riêng miễn phí cho khách lái xe. Trong số các tiện nghi của khách sạn này có nhà hàng, lễ tân 24 giờ, dịch vụ phòng và WiFi miễn phí. Khách sạn cung cấp các phòng gia đình.\r\n\r\n/nKhách sạn nằm cách Công viên Yersin 2,3 km và Vườn Hoa Đà Lạt 2,6 km. Sân bay gần nhất là sân bay Liên Khương, cách đó 46 km, và khách sạn cung cấp dịch vụ đưa/đón sân bay với một khoản phụ phí.', 2, 'moonstone.jpg', 'Xe đưa đón sân bay /nChỗ đỗ xe miễn phí /nDịch vụ phòng /nBữa sáng tốt', 0, '2019-10-22 07:29:40', '2019-10-22 07:29:40'),
(44, 'Ana Mandara Villas Dalat Resort & Spa', 'Đường Lê Lai, Phường 5, Thành phố Đà Lạt, Lâm Đồng', '0263 3555 888', 2000000, 'Ana Mandara Villas Dalat Resort & Spa có các biệt thự kiểu thuộc địa Pháp nguyên bản tọa lạc tại vị trí lý tưởng trên những sườn dốc cao nguyên thôn quê của thành phố Đà Lạt. Resort có hồ bơi ngoài trời, nhà hàng và trung tâm spa trong khuôn viên. Wi-Fi và chỗ đỗ xe riêng trong khuôn viên đều được bố trí miễn phí.\r\n\r\n/nCác biệt thự tại đây được trang trí trang nhã và có màn chống muỗi, TV màn hình LCD cũng như tầm nhìn toàn cảnh núi non. Hầu hết các biệt thự còn có lò sưởi và sân hiên được trang bị bàn ghế.\r\n\r\n/nLa Cochinchine Spa của resort có 5 phòng trị liệu với đủ loại liệu pháp bao gồm khu vực mát-xa chân, các phòng xông hơi khô/ướt khác nhau. Resort có quầy lễ tân 24 giờ và bàn đặt tour, đồng thời cung cấp nhiều dịch vụ, bao gồm dịch vụ thu đổi ngoại tệ, cho thuê xe hơi và đưa đón sân bay.\r\n\r\n/nKhách có thể thưởng thức các bữa tiệc thịt nướng ngoài trời, dùng bữa trong sự riêng tư tại phòng mình hoặc tại nhà hàng Le Petit Đà Lạt của resort, nơi phục vụ ẩm thực kết hợp cùng các món ăn Việt Nam.\r\n\r\n/nDu khách có thể khám phá khu vực cảnh quan xung quanh và văn hóa địa phương, cũng như vùng nông thôn làm nông nghiệp. Khách cũng có thể tham quan nhiều điểm đến nổi tiếng của Đà Lạt chỉ cách chỗ nghỉ 3 km bao gồm Quảng trường Lâm Viên, Hồ Xuân Hương và Vườn hoa Đà Lạt. Sân bay gần nhất là sân bay Liên Khương, cách đó 22 km.', 5, 'anamandara.jpg', 'Hồ bơi /nXe đưa đón sân bay /nTrung tâm chăm sóc sức khỏe rất tốt', 0, '2019-10-22 07:29:40', '2019-10-22 07:29:40'),
(46, 'test', '155 Đồng Khởi, Thị trấn Diên Khánh, Diên Khánh, Khánh Hòa', '12333333', 200000, '<p>aaaaaaaaaaa</p>', 2, '763_Screenshot (23).png', '<p>aaaaaaaaaaa</p>', 0, '2019-10-22 06:51:49', '2019-10-22 06:51:49'),
(47, 'Mia Mia Hostel', '215 Bùi Thị Xuân, Phường 2, Thành phố Đà Lạt, Lâm Đồng', '096 496 69 90', 300000, 'Nằm ở thành phố Đà Lạt, cách 1,9 km từ Vườn hoa Đà Lạt và 2,8 km từ Quảng trường Lâm Viên, Mia Mia Hostel cung cấp phòng nghỉ với máy điều hòa cùng phòng tắm riêng. Chỗ nghỉ cách Hồ Xuân Hương cùng Công viên Yersin 3,3 km và cách Thiền viện Trúc Lâm 7 km. lễ tân 24 giờ, dịch vụ đưa/đón sân bay, dịch vụ phòng và Wi-Fi miễn phí.\r\n\r\n/nTrong phòng còn được trang bị tủ để quần áo và ấm đun nước.\r\n\r\n/nKhách lưu trú tại khách sạn có thể thưởng thức bữa sáng tự chọn.\r\n\r\n/nMia Mia Hostel có sân hiên.\r\n\r\n/nChỗ nghỉ nằm cách Hồ Tuyền Lâm 8 km và Núi Lang Bian 10 km. Sân bay gần nhất là Sân bay Liên Khương, cách đó 31 km.', 2, 'miamia.jpg', 'Xe đưa đón sân bay /nCho phép mang theo vật nuôi /nDịch vụ phòng /nBữa sáng', 0, '2019-10-22 08:49:21', '2019-10-22 08:49:21'),
(48, 'Mỹ Hy Hotel', '27 Đường Lý Tự Trọng, Phường 2, Thành phố Đà Lạt', '091 111 06 06', 200000, 'Mỹ Hy Hotel nằm tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 1,8 km và Hồ Xuân Hương 2 km. Khách sạn 1 sao này có sảnh khách chung, WiFi miễn phí trong toàn bộ khuôn viên, chỗ đỗ xe riêng miễn phí cho những khách lái xe, dịch vụ phòng, dịch vụ đỗ xe cho khách, lễ tân 24 giờ, bếp chung và dịch vụ thu đổi ngoại tệ cho khách.\r\n\r\n/nTất cả phòng nghỉ tại đây đều được trang bị truyền hình cáp màn hình phẳng, ấm đun nước, vòi sen, máy sấy tóc, tủ để quần áo cũng như phòng tắm riêng với đồ vệ sinh cá nhân miễn phí.\r\n\r\n/nMỹ Hy Hotel cách Công viên Yersin 2,2 km, Vườn hoa Đà Lạt 2,5 km và sân bay gần nhất là sân bay Liên Khương 30 km. Chỗ nghỉ cung cấp dịch vụ đưa đón sân bay với một khoản phụ phí.\r\n\r\n/nĐây là khu vực ở Đà Lạt mà khách yêu thích, theo các đánh giá độc lập.', 1, 'myhy.jpg', 'Wi-Fi miễn phí /nChỗ đỗ xe miễn phí /nXe đưa đón sân bay /nLễ tân 24 giờ', 0, '2019-10-22 08:49:21', '2019-10-22 08:49:21'),
(49, 'Minh Quang homestay', 'Vườn Quốc gia Ba Bể, Nam Mẫu, Ba Bể, Bắc Kạn', '0395 420 267', 200000, 'Minh Quang homestay nằm ở huyện Ba Bể và cung cấp Wi-Fi miễn phí.\r\n\r\n/nChỗ nghỉ nhà dân này phục vụ bữa sáng kiểu Á hàng ngày.\r\n\r\n/nQuý khách có thể thuê xe đạp tại chỗ nghỉ và đi xe đạp ở khu vực gần đó.\r\n\r\n/nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,5 cho kỳ nghỉ dành cho 2 người.', 1, 'minhquang.jpg', 'Minh Quang homestay nằm ở huyện Ba Bể và cung cấp Wi-Fi miễn phí....', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(50, 'Ba Be Legend Villa', 'ĐT254, Khang Ninh, Ba Bể, Bắc Kạn', '097 730 29 10', 450000, 'Tọa lạc tại khu hồ Ba Bể, Ba Be Legend Villa có quầy bar, khu vườn và sân hiên. Trong số các tiện nghi của khách sạn này còn có nhà hàng, lễ tân 24 giờ, dịch vụ phòng và WiFi miễn phí. Khách sạn cung cấp chỗ đỗ xe riêng miễn phí và dịch vụ đưa đón sân bay với một khoản phụ phí.\r\n\r\n/nTất cả phòng nghỉ của Ba Be Legend Villa đều có khu vực ghế ngồi, máy điều hòa và phòng tắm riêng.\r\n\r\n/nChỗ nghỉ phục vụ bữa sáng kiểu Á.', 2, 'legendvilla.jpg', 'Quầy bar /nBữa sáng tuyệt hảo', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(51, 'Huyen Hao Homestay', 'Nam Mẫu, Ba Bể, Bắc Kạn', '0355 913 600', 250000, 'Huyen Hao Homestay cung cấp chỗ nghỉ với Wi-Fi miễn phí và khu vườn tại huyện Ba Bể.\r\n\r\n/nKhách lưu trú tại nhà nghỉ B&B này có thể thưởng thức bữa sáng tự chọn.\r\n\r\n/nHuyen Hao Homestay có sân hiên tắm nắng.\r\n\r\n/nDu khách có thể đạp xe gần đó.', 1, 'huyenhao.jpg', 'Huyen Hao Homestay có sân hiên tắm nắng....', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(52, 'Hùng Vương Hotel', '44 Hùng Vương, Tự An, Thành phố Buôn Ma Thuột, Đắk Lắk', '0262 3677 877', 400000, 'Tọa lạc tại thành phố Buôn Ma Thuột, cách trung tâm thương mại Vincom Plaza Buôn Ma Thuột 700 m, Hung Vuong Hotel cung cấp chỗ nghỉ với sân hiên và chỗ đỗ xe riêng miễn phí. Trong số các tiện nghi của khách sạn này còn có lễ tân 24 giờ, dịch vụ phòng cũng như Wi-Fi miễn phí trong toàn bộ khuôn viên. Khách sạn có các phòng gia đình.\r\n\r\n/nTất cả phòng nghỉ của khách sạn được trang bị máy điều hòa, truyền hình cáp màn hình phẳng, tủ lạnh, ấm đun nước, vòi sen, máy sấy tóc và tủ quần áo.\r\n\r\n/nSân bay gần nhất là Sân bay Buôn Ma Thuột, nằm cách khách sạn 10 km.', 3, 'hungvuonghotel.jpg', 'Chỗ đỗ xe miễn phí /nWi-Fi miễn phí', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(53, 'MỸ NGỌC HOTEL', '20 Ngô Gia Tự, Tân An, Thành phố Buôn Ma Thuột, Đắk Lắk', '094 596 03 96', 350000, 'KHÁCH SẠN MỸ NGỌC nằm ở Buôn Kô Sir. Khách sạn 3 sao này có sảnh khách chung, dịch vụ đỗ xe cho khách và WiFi miễn phí. Chỗ nghỉ cung cấp dịch vụ lễ tân 24 giờ, dịch vụ phòng và dịch vụ thu đổi ngoại tệ cho khách.\r\n\r\n/nTất cả phòng nghỉ tại khách sạn đều được trang bị máy điều hòa, truyền hình vệ tinh màn hình phẳng, tủ lạnh, ấm đun nước, chậu rửa vệ sinh (bidet), máy sấy tóc và bàn làm việc. Các phòng còn có tầm nhìn ra quang cảnh thành phố và phòng tắm riêng với vòi sen cùng đồ vệ sinh cá nhân miễn phí. Ngoài ra cũng có tủ để quần áo.\r\n\r\n/nSân bay gần nhất là Sân bay Buôn Ma Thuột, nằm trong bán kính 7 km từ KHÁCH SẠN MỸ NGỌC, và khách sạn cung cấp dịch vụ đưa/đón sân bay với một khoản phụ phí.', 3, 'myngochotel.jpg', 'Xe đưa đón sân bay /nChỗ đỗ xe miễn phí /nWi-Fi miễn phí', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(54, 'Ngọc Sê Hotel', 'Nguyễn Tất Thành, Phù Đổng, Thành phố Pleiku, Gia Lai', '0269 6266 888', 400000, 'Nằm ở thành phố Pleiku, cách Sân vận động Pleiku 2 km, Ngọc Se Hotel cung cấp chỗ nghỉ với quầy bar, bãi đậu xe riêng miễn phí, sảnh khách chung, sân chơi cho trẻ em, quầy lễ tân 24 giờ và WiFi miễn phí.\r\n\r\n/nTất cả phòng nghỉ tại NEW DAY HOTEL đều được trang bị bàn làm việc, TV màn hình phẳng, phòng tắm riêng, máy điều hòa và tủ quần áo.\r\n\r\n/nSân bay gần nhất là Sân bay Pleiku, cách khách sạn 6 km.', 2, 'ngocsehotel.jpg', 'Xe đưa đón sân bay /nWi-Fi miễn phí /nQuầy bar', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(55, 'Thiên Đường Xanh Hotel', 'khuôn viên công viên Diên Hồng, 163 đường Thống Nhất, P.Ia Kring, TP.Pl, Pleiku, Gia Lai', '0269 3716 450', 350000, 'Nằm tại thành phố Pleiku, cách Sân vận động Pleiku 2 km, 7S Hotel Thien Duong Xanh & Ressot cung cấp chỗ nghỉ với nhà hàng, chỗ đỗ xe riêng miễn phí, khu vườn cùng sân hiên. Khách sạn 2 sao này có lễ tân 24 giờ, dịch vụ phòng và WiFi miễn phí.\r\n\r\n/nTất cả phòng tại khách sạn đều có máy điều hòa và phòng tắm riêng.\r\n\r\n/nSân bay gần nhất là Sân bay Pleiku, 7S Hotel Thien Duong Xanh & Ressot 7 km.', 2, 'thienduongxanh.jpg', 'Xe đưa đón sân bay /nWi-Fi miễn phí /nQuầy bar', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45'),
(56, 'Pleiku & Em Hotel', '86 Nguyễn Văn Trỗi, P. Hội Thương, Thành phố Pleiku, Gia Lai', '0269 3760 777', 1200000, '7S Hotel Pleiku & Em cung cấp phòng nghỉ gắn máy điều hòa tại thành phố Pleiku, cách Sân vận động Pleiku 300 m. Trong số các tiện nghi của khách sạn này còn có nhà hàng, lễ tân 24 giờ, dịch vụ phòng và Wi-Fi miễn phí. Chỗ đỗ xe riêng có thể được bố trí cho khách với một khoản phụ phí.\r\n\r\n/nTất cả phòng nghỉ tại khách sạn đều được trang bị tủ quần áo, TV màn hình phẳng và phòng tắm riêng.\r\n\r\n/nKhách nghỉ tại 7S Hotel Pleiku & Em có thể thưởng thức bữa sáng tự chọn.\r\n\r\n/nSân bay gần nhất là sân bay Pleiku, cách chỗ nghỉ 6 km.', 3, 'pleiku&e.jpg', '', 0, '2019-10-22 09:14:45', '2019-10-22 09:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `booking_start_date` date NOT NULL DEFAULT '2019-09-08',
  `time` int(11) NOT NULL DEFAULT 1,
  `number_of_room` int(11) NOT NULL DEFAULT 1,
  `total_price` float NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel_bookings`
--

INSERT INTO `hotel_bookings` (`id`, `hotel_id`, `booking_start_date`, `time`, `number_of_room`, `total_price`, `details`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 6, '2019-10-24', 5, 2, 25000000, 'testedit', '2019-10-19 11:50:11', '2019-10-19 10:50:11', 33),
(2, 3, '2019-11-06', 3, 1, 5046000, NULL, '2019-10-19 10:42:15', '2019-10-19 09:42:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_comments`
--

CREATE TABLE `hotel_comments` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL DEFAULT 'Chưa có ý kiến',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discout` int(11) NOT NULL,
  `payment_date` int(11) NOT NULL,
  `details` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 'tour', 'tour-slide.jpg', 'Trải nghiệm những tour du lịch thú vị mà chúng tôi mang đến cho bạn', '2019-10-01 05:36:04', '2019-09-30 15:05:26'),
(2, 'hotel', 'hotel-slide.jpg', 'Tùy chọn khách sạn, phù hợp nhu cầu của bạn', '2019-10-01 05:35:10', '2019-09-30 15:05:26'),
(3, 'transport', 'transport-slide.jpg', 'Nhiều gói thuê xe tùy theo lựa chọn của bạn', '2019-10-01 05:37:26', '2019-09-30 15:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `social_provider`
--

CREATE TABLE `social_provider` (
  `id` int(11) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_provider`
--

INSERT INTO `social_provider` (`id`, `provider_id`, `email`, `provider`) VALUES
(4, '102029305005705841144', '1651012093liem@ou.edu.vn', 'google'),
(5, '521993365246773', 'liemhoangdk98@gmail.com', 'facebook'),
(6, '113589612086914479622', 'liemluhoang@gmail.com', 'google');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(3000) NOT NULL,
  `go_from` varchar(100) NOT NULL,
  `go_to` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `highlight` int(11) NOT NULL DEFAULT 0,
  `tourcate_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `go_from`, `go_to`, `about`, `image`, `highlight`, `tourcate_id`, `price`, `discount`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 'DU LỊCH MỸ THO - CẦN THƠ - CÀ MAU - BẠC LIÊU - SÓC TRĂNG', 'Tp. Hồ Chí Minh', 'Miền Tây', 'Thời gian : 4 ngày 3 đêm. /nPhương tiện : Đi về bằng xe - Đến Mỹ Tho. /nThưởng thức trái cây theo mùa, nghe nhạc tài tử Nam...', 'tour-1.jpg', 1, 1, 3800000, 20, '0000-00-00', '0000-00-00', '2019-10-16 05:32:59', '0000-00-00 00:00:00'),
(2, 'DU LỊCH CHÂU ĐỐC - LÀNG CÁ BÈ - RỪNG TRÀM TRÀ SƯ - CẦU CAO LÃNH (MÙA NƯỚC NỔI)', 'TP. HỒ CHÍ MINH', 'MIỀN TÂY', 'Thời gian : 2 ngày 1 đêm. \r\n/nPhương tiện : Đi về bằng xe. \r\n/nViếng Miếu Bà Chúa Xứ nổi tiếng hiển linh. - Tham quan Rừng Tràm...', 'tour-2.jpg', 1, 1, 2000000, 0, '0000-00-00', '0000-00-00', '2019-10-16 05:33:32', '0000-00-00 00:00:00'),
(3, 'DU LỊCH PHAN THIẾT - MŨI NÉ IKO', 'TP. HỒ CHÍ MINH', 'PHAN THIẾT', 'Thời gian : 3 ngày 2 đêm. \r\n/nPhương tiện : Đi về bằng xe\r\n/nTham quan không gian trưng bày nghệ thuật “Làng chài xưa” với diện tích...', 'tour-3.jpg', 1, 1, 2300000, 0, '0000-00-00', '0000-00-00', '2019-10-16 05:33:51', '0000-00-00 00:00:00'),
(4, 'DU LỊCH THÁI LAN - BANGKOK - PATTAYA [LÀNG VĂN HÓA NOONG NOOCH & SỞ THÚ THIÊN NHIÊN SAFARI WORLD]', 'ĐÀ NẴNG', 'THÁI LAN', 'Thời gian : 5 ngày 4 đêm. /nPhương tiện : Bay thẳng với hàng không Air Asia /nDu khách thỏa mắt ngắm đủ loài hoa khoe sắc và cây cảnh nghệ...', 'tour-4.jpg', 1, 2, 6700000, 0, '0000-00-00', '0000-00-00', '2019-10-19 14:37:36', '0000-00-00 00:00:00'),
(5, 'DU LICH MALAYSIA - SINGAPORE - [NHẠC NƯỚC WINGS OF TIME - FLOWER DOME - CAO NGUYÊN GENTING]', 'ĐÀ NẴNG', 'SINGAPORE', 'Thời gian : 6 ngày 5 đêm. /nPhương tiện : Bay với Vietnam Airlines /nĐặt chân đến Singapore, du khách sẽ được chiêm ngưỡng vẻ đẹp của khu...', 'tour-5.jpg', 1, 2, 13500000, 0, '0000-00-00', '0000-00-00', '2019-10-19 15:53:21', '0000-00-00 00:00:00'),
(6, 'DU LỊCH ĐÀ LẠT - HỒ TUYỀN LÂM - ĐƯỜNG HẦM ĐIÊU KHẮC', 'Tp. HCM', 'Đà Lạt', 'Thời gian : 3 ngày 2 đêm\r\n/nPhương tiện : Xe. /nTham quan Đường hầm điêu khắc đất đỏ (Đà Lạt Star) - tái hiện...', 'tourdalat-1.jpg', 0, 1, 2500000, 0, '0000-00-00', '0000-00-00', '2019-10-16 05:40:12', '2019-09-27 09:18:08'),
(7, 'DU LỊCH BUÔN MA THUỘT - PLEIKU - BUÔN ĐÔN - THỦY ĐIỆN IALY', 'Tp. HCM', 'Buôn Ma Thuột', 'Thời gian : 4 ngày 3 đêm. /nPhương tiện : Đi về bằng xe. /nTham quan thác D\'ray Nur - ngọn thác hùng vỹ của Tây Nguyên đại...', 'tourbuonmathuot-1.jpg', 1, 1, 4200000, 0, '0000-00-00', '0000-00-00', '2019-10-22 08:51:47', '2019-09-25 16:00:00'),
(9, 'DU LỊCH NHA TRANG - HÒN TẰM - VIỆN HẢI DƯƠNG - THÁP BÀ - DỐC LẾT', 'Tp. HCM', 'Nha Trang', '<p>Thời gian : 4 ngày 3 đêm. /nPhương tiện : Đi về bằng xe. /nChiêm ngưỡng Bãi biển cát trắng Cà Ná - một trong những bãi biển...\"</p>\r\n\r\n<p>\"</p>\r\n\r\n<p>\"</p>', 'tournhatrang-1.jpg', 1, 1, 4000000, 0, '0000-00-00', '0000-00-00', '2019-10-22 07:16:23', '2019-10-22 06:16:23'),
(15, 'DU LỊCH BẮC KẠN - BA BỂ - THÁC BẢN GIỐC', 'Hà Nội', 'Đông Bắc', 'Thời gian : 3 ngày 2 đêm. /nPhương tiện : Ô tô. /nTham quan Vườn Quốc Gia Ba Bể, Động Ngườm Ngao, Thác Bản Giốc....', 'tourbabe-1.jpg', 0, 1, 2500000, 0, '2019-10-01', '2019-10-04', '2019-10-22 10:42:32', '2019-10-22 10:42:32'),
(17, 'DU LỊCH HUẾ - ĐÀ NẴNG - HỘI AN - BÀ NÀ ', 'Cần Thơ', 'Huế - Đà Nẵng', 'Thời gian : 3 ngày 2 đêm. /nPhương tiện : Hàng không Vietnam Airlines. /nTham quan Kinh Thành Huế - Hoàng Cung của 13 vị Vua triều Nguyễn', 'tourhuedanang-1.jpg', 0, 1, 4300000, 2, '0000-00-00', '0000-00-00', '2019-10-16 05:40:39', '2019-10-03 13:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `tour_bookings`
--

CREATE TABLE `tour_bookings` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `number_of_people` int(11) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `date_booking` date NOT NULL DEFAULT '2019-09-08',
  `total_price` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_bookings`
--

INSERT INTO `tour_bookings` (`id`, `tour_id`, `number_of_people`, `details`, `customer_id`, `date_booking`, `total_price`, `created_at`, `updated_at`) VALUES
(9, 9, 2, 'I LOVE YOU 3000', 24, '2019-10-17', 12000000, '2019-10-17 12:43:59', '2019-10-17 12:43:59'),
(10, 4, 3, NULL, 26, '2019-10-17', 26100000, '2019-10-19 10:38:09', '2019-10-19 09:38:09'),
(12, 9, 2, 'I love you 3000', 28, '2019-10-14', 8000000, '2019-10-18 07:56:08', '2019-10-18 06:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE `tour_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT 'tour-wallpaper-default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tour trong nước', 'tour-wallpaper-inside.jpg', '2019-10-02 16:00:12', '2019-09-26 16:59:21'),
(2, 'Tour nước ngoài', 'tour-wallpaper-outside.jpg', '2019-10-02 16:00:21', '2019-09-26 16:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `tour_comments`
--

CREATE TABLE `tour_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tourdetail_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tour_details`
--

CREATE TABLE `tour_details` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `about` text NOT NULL DEFAULT '\'Mục này đang trống\'',
  `image` varchar(100) NOT NULL DEFAULT 'tour-detail-default.jpg',
  `content` text NOT NULL DEFAULT 'Mục này đang trống',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour_details`
--

INSERT INTO `tour_details` (`id`, `tour_id`, `about`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đến Mỹ Tho thưởng thức trái cây theo mùa, nghe nhạc tài tử Nam Bộ. Tham quan chợ nổi Cái Răng - một chợ nổi lớn của Đồng Bằng sông Cửu Long. Tham quan Khu dinh thự Công tử Bạc Liêu, tìm hiểu cuộc đời của Hắc công tử nổi tiếng giàu có, ăn chơi', 'tourdetail-1.jpg', 'NGÀY 01: TP. HỒ CHÍ MINH - MỸ THO - BẾN TRE-  CẦN THƠ (Ăn sáng, trưa, chiều)\r\nĐón khách tại văn phòng Lữ Hành Saigontourist (lúc 06h00 sáng tại 01 Nguyễn Chí Thanh, F9, Q5 hoặc 06h30 sáng tại 102 Nguyễn Huệ, Q1). Đến Mỹ Tho, tham quan chùa Vĩnh Tràng. Đi du thuyền trên sông Mekong ngắm cảnh bốn cù lao Long, Lân Qui, Phụng…Tham quan cảng cá Mỹ Tho, làng nuôi cá bè dọc cù lao Tân Long. Đến cù lao Thới Sơn tham quan nhà dân, trại nuôi ong, thưởng thức trà mật ong, chụp hình với Trăn Gấm. Đi bộ trên đường làng Thới Sơn, tham quan lò kẹo dừa, thưởng thức trái cây theo mùa. Nghe nhạc tài tử Nam Bộ. Sang thăm cồn Phụng với di tích Đạo Dừa, trại nuôi cá sấu, vườn thú mini. Khởi hành đi Cần Thơ. Tối tự do dạo bến Ninh Kiều. Nghỉ đêm tại Cần Thơ./nNGÀY 02: CẦN THƠ - CẢ MAU  (Ăn sáng, trưa, chiều)\r\nTham quan chợ nổi Cái Răng. Viếng Thiền viện Trúc Lâm Phương Nam. Khởi hành đi Cà Mau. Nghỉ đêm tại Cà Mau/nNGÀY 03: CÀ MAU - BẠC LIÊU (Ăn sáng, trưa, chiều)\r\nKhởi hành đi Cà Mau, tham quan và chụp ảnh lưu niệm tại Khu Văn Hóa Du Lịch Mũi Cà Mau, Điểm Cực Nam Tổ Quốc, tham quan mốc toạ độ quốc gia - Panô biểu tượng Mũi Cà Mau. Chiều khởi hành đi Bạc Liêu. Viếng nhà thờ Tắc Sậy và thăm nơi an nghỉ của Linh mục Trương Bửu Diệp. Nghỉ đêm tại Bạc Liêu./nNGÀY 04: BẠC LIÊU - SÓC TRĂNG - TP.HỒ CHÍ MINH (Ăn sáng, trưa)\r\nBuổi sáng, tham quan Khu dinh thự Công tử Bạc Liêu, Khu lưu niệm nghệ thuật Đờn Ca Tài Tử Nam Bộ và nhạc sĩ Cao Văn Lầu, người sáng tác ra bài Dạ Cổ Hoài Lang. Khởi hành về TP.Hồ Chí Minh, ghé Sóc trăng viếng chùa Mã Tộc (chùa Dơi). Khởi hành về thành phố Hồ Chí Minh. Kết thúc chương trình.', '2019-10-16 04:18:42', '2019-09-26 20:52:19'),
(2, 9, 'Chiêm ngưỡng Bãi biển cát trắng Cà Ná - một trong những bãi biển đẹp nổi tiếng của miền Trung. Tham quan Viện hải dương Nha Trang ,viếng tháp Bà Ponagar, một trong những quần thể kiến trúc, nghệ thuật Chăm tuyệt đẹp. Tắm biển Dốc Lết - Một trong những bãi biển êm, đẹp, nổi tiếng của tỉnh Khánh Hòa', 'tournhatrangdetail.jpg', 'NGÀY 01: TP. HỒ CHÍ MINH - CHÙA ỐC - NHA TRANG (Ăn sáng, trưa, chiều)\r\nĐón du khách tại văn phòng Lữ hành Saigontourist (lúc 06h00 sáng tại số 1 Nguyễn Chí Thanh, Q5 hoặc lúc 06h30 sáng tại 102 Nguyễn Huệ, Q1), khởi hành đi Nha Trang. Trên đường đi du khách sẽ được chiêm ngưỡng vẻ đẹp của Bãi biển cát trắng Cà Ná - một trong những bãi biển đẹp nổi tiếng của khu vực miền Trung. Trên đường dừng chân tham quan Chùa Từ Vân (Chùa Ốc) ngôi chùa làm từ vỏ ốc “độc nhất vô nhị ở Việt Nam”. Đến Cam Ranh, xe đưa du khách vào Nha Trang theo cung đường Sông Lô Hòn Rớ - cung đường được xây dựng chạy dọc theo bờ biển Cam Ranh - Nha Trang thơ mộng. Đến Nha Trang, du khách nhận phòng. Nghỉ đêm tại Nha Trang./nNGÀY 02: NHA TRANG - HÒN TẰM - VIỆN HẢI DƯƠNG - THÁP BÀ (Ăn sáng, trưa, chiều)\r\nBuổi sáng, xe đón khách đi tham quan Viện hải dương Nha Trang với hơn 23.000 mẫu vật của hơn 5000 loài sinh vật biển và động thực vật, đây là kho tàng sinh vật biển quý hiếm nhất của Việt Nam. Đoàn lên cano khám phá vịnh Nha Trang và Khu Du Lịch Hòn Tằm Resort, một trong những resort có bãi biển đẹp nhất vịnh Nha Trang. Đến Hòn Tằm, thưởng thức nước uống chào đón - MerPerle Sparkling Waves, tham quan làng nghề truyền thống được tái hiện trên đảo, đắm mình giữa biển xanh với làn nước trong vắt và bãi cát trắng mịn dài 1km, hồ bơi xanh ngát rộng 2.400m2 hướng ra vịnh Nha Trang, thư giãn với các tiện ích cao cấp bên bờ biển, tham gia những vũ điệu âm nhạc sôi động. Khám phá các môn thể thao bãi biển (chi phí tự túc). Buổi trưa quý khách dùng Buffet và hải sản nướng tại Nhà hàng Ocean View (11g30-13g30), thưởng thức buffet trái cây đặc sản của miền nhiệt đới với các loại trái cây theo mùa (14g-15g). Chiều về lại đất liền, xe đưa đoàn đi viếng tháp Bà Ponagar, một trong những quần thể kiến trúc, nghệ thuật Chăm tuyệt đẹp trong ánh chiều tà. Tối quý khách có thể ghé quán cà phê Thưởng Trầm độc đáo ở Nha Trang để vừa uống cà phê vừa thưởng trầm (chi phí tự túc). Nghỉ đêm tại Nha Trang./nNGÀY 03: NHA TRANG - DỐC LẾT - CHỢ ĐẦM (Ăn sáng, trưa)\r\nKhởi hành đi Dốc Lết - một trong những bãi biển êm, đẹp, nổi tiếng của tỉnh Khánh Hòa và khu vực miền Trung. Quý khách tự do tham quan và tắm biển thỏa thích trong làn nước xanh trong. Trở về lại Nha Trang xe đưa du khách đi tham quan Làng Yến Mai Sinh để tận mắt chiêm ngưỡng hang Yến, tìm hiểu quá trình chim Yến làm tổ, quy trình thu hái, tinh chế, cho đến các sản phẩm làm từ tổ Yến. Ghé chợ Đầm mua sắm đặc sản Nha Trang. Quý khách tự do khám phá ẩm thực địa phương với các món Nem nướng Ninh Hòa, Bún sứa, Hải sản Nha Trang. Nghỉ đêm tại Nha Trang.\r\n- Lựa chọn (tự túc chi phí di chuyển và tham quan): Quý khách có thể tham quan Khu vui chơi giải trí Vinpearl Land với hệ thống cáp treo vượt biển dài nhất thế giới; Thủy cung lớn và hiện đại nhất Việt Nam; Khu trò chơi trong nhà hoặc chinh phục thử thách cao độ từ hàng chục trò chơi cảm giác mạnh tại Khu trò chơi ngoài trời và Công viên nước ngọt trên bãi biển đầu tiên & duy nhất tại Việt Nam; phòng chiếu phim 4D, chương trình biểu diễn nhạc nước,../nNGÀY 04: NHA TRANG - TP. HỒ CHÍ  MINH (Ăn sáng, trưa)\r\nDu khách trả phòng, khởi hành về thành phố. Đoàn đến Phan Rang nghỉ giải lao và mua đặc sản Ninh Thuận. Đến Tp. Hồ Chí Minh, kết thúc chuyến tham quan.', '2019-10-16 04:24:29', '2019-10-03 14:49:24'),
(3, 5, '<p>Đặt chân đến Singapore, du khách sẽ được chiêm ngưỡng vẻ đẹp của khu nhà kính Flower Dome. Nằm trong khu phức hợp Garden By the Bay – khu nhà kính có hình dạng như chiếc vỏ ốc và được bao phủ bởi loại kính đặc biệt tạo ra một môi trường nhân tạo khô ráo, mát mẻ đặc trưng của vùng Địa Trung Hải, phía Tây Nam Phi và Bắc Australia. Khám phá đảo Sentosa với Resort World Casino, thưởng thức tiết mục độc đáo “Wings of time” - du khách có dịp xem các tia nước nhảy múa trên nền nhạc cổ điển kết hợp hiện đại và tiết mục biểu diễn tia laser tuyệt đẹp. Còn tại Malaysia, du khách như được thấy một hình ảnh của Bồ Đào Nha, Hà Lan, Trung Quốc hoặc nét quen thuộc của nước Anh hiện diện qua kiến trúc và các danh lam, thắng cảnh nổi tiếng tại phố cổ Malacca. Cao nguyên Genting tại Kuala Lumpur là một nơi không thể bỏ qua. Nằm ở độ cao trên 1700m, cao nguyên Genting là một khu giải trí bậc nhất châu Á với hàng ngàn phòng khách sạn, sân golf, casino, công viên giải trí</p>', 'tourmalay-genting.jpg', '<p>Ngày 1: ĐÀ NẴNG – TP. HỒ CHÍ MINH – KUALA LUMPUA (Ăn tối) Hướng dẫn Lữ hành Saigontourist đón khách tại sân bay Đà Nẵng đi Tp Hồ Chí Minh (VN123, 12:15 -13:45). Quý khách sang ga quốc tế đi Kuala Lumpua (VN675, 15:30-18:30). Ăn trưa nhẹ trên máy bay. Đến Kuala Lumpur (Malaysia), xe và hướng dẫn Malaysia đón đoàn tại sân bay Sepang đưa khách đi ăn tối, sau đó về nhận phòng khách sạn. Nghỉ đêm tại Kuala Lumpua./nNgày 2: KUALA LUMPUA - GENTING - KUALA LUMPUA (Ăn sáng, trưa, tối) Hôm nay du khách tham quan một vòng thủ đô Kuala Lumpur: Toà nhà quốc hội, Đài kỷ niệm quốc gia, Chùa Bà Thiên Hậu - được xem là một trong những công trình chùa chiền xây dựng theo phong cách Trung Hoa, có quy mô lớn ở Đông Nam Á. Chiều du khách viếng và chụp ảnh với tượng thần Subramaniam (Chúa tể Murugan) tại động Batu - cao 42.7m được sơn nhũ vàng &amp; là vị thần quyền lực nhất của Đạo Hindu, tham quan Cửa hàng bán đồng hồ và Cửa hàng Vàng Bạc Đá quý. Khởi hành đi cao nguyên Genting, đến đây du khách trải nghiệm tuyến cáp treo hiện đại bậc nhất Đông Nam Á để đến với thành phố “trên mây” ở độ cao 1.700m so với mực nước biển, tự do tham quan khu Theme Park (vé tham quan các trò chơi khách tự túc). Ăn trưa và tối theo chương trình. Tối xe đứa quí khách về lại Kuala Lumpua. Nghỉ đêm tại Kuala Lumpua./nNgày 3: KUALA LUMPUA – MALACCA (Ăn sáng, trưa, tối) Xe đưa đoàn: Chụp hình lưu niệm với Tháp đôi Petronas, khu hành chính mới Putra Jaya, Quảng Trường Độc Lập, Thánh đường Hồi giáo quốc gia - mang kiến trúc đặc trưng của Hồi giáo và thể hiện nét tiêu biểu cho đất nước Malaysia. Ghé mua sắm đặc sản Sô Cô La nổi tiếng tại Malaysia. Chiều khởi hành đi thành phố cổ Malacca ở phía nam Malaysia. Tham quan thành phố gồm: nhà thờ Tin Lành trong khu phố cổ nổi tiếng, đồi Famosa, đền thờ Cheng Ho. Ăn tối. Nghỉ đêm tại Malacca./nNgày 4: MALACCA – SINGAPORE – GARDEN BY THE BAY (Ăn sáng, trưa, tối) Xe đưa khách đi Johor Bahru (Thành phố ở cực nam Malaysia tiếp giáp với Singapore), nhập cảnh vào Singapore. Chiều, tham quan hồ Lọc Nước (Marrina Barrage) nằm trong trung tâm thành phố Singapore, tham quan chùa Phật Nha. Tham quan và chụp hình Khu vườn năng lượng (Garden by the Bay) - khu vườn sinh thái đặc biệt với các “siêu cây“ năng lượng mặt trời. Đặc biệt, du khách được chiêm ngưỡng khu nhà kính Flower Dome có một không hai trên thế giới, với muôn ngàn loài hoa với những mùi thơm và hình dạng khác nhau, khu nhà kính mang theo Mùa Xuân Vĩnh Viễn (Everspring). Ăn tối. Nghỉ đêm tại Singapore./nNgày 5: SINGAPORE - ĐẢO SENTOSA (Ăn sáng, trưa, tối) Tham quan một vòng thành phố Singapore (ngắm toàn cảnh hải cảng, đảo Sentosa và khu vực phía Nam Singapore từ trên cao), công viên Sư Tử Biển - Merlion Park (nơi bắt đầu đường cao tốc mới hoàn thành, nối cửa khẩu thứ hai sang Malaysia), tượng Sư Tử Biển (biểu tượng của Singapore), tòa nhà MBS - Marina Bay Sands (được xem là biểu tượng mới của nước Singapore hiện đại). Tham quan Đỉnh Faber (Mount Faber), đỉnh cao nhất của đảo quốc Singapore và là nơi khởi đầu đường xe cáp sang đảo Sentosa. Ăn trưa món nướng Hàn Quốc (Korean BBQ). Chiều xe đưa đoàn đến Đảo Sentosa, tham quan khu Resort World Casino, con đường Festive Walk; tham quan và chụp hình bên ngoài tháp sư tử biển – Merlion Tower. Ăn tối tại đảo Sentosa. Thưởng thức tiết mục độc đáo “Wings of Time” - du khách có dịp xem các tia nước nhảy múa trên nền nhạc cổ điển kết hợp hiện đại và tiết mục biểu diễn tia laser tuyệt đẹp. Về lại trung tâm thành phố, khách tự do khám phá Singapore về đêm. Nghỉ đêm tại Singapore. /nNgày 6: SINGAPORE – TP. HỒ CHÍ MINH – ĐÀ NẴNG (Ăn sáng) Du khách sẽ đi tham quan và mua sắm tại trung tâm chế tác Kim Cương (Diamond Factory) và Cửa hàng sản xuất dầu gió xanh. Xe đưa đoàn ra sân bay Changi và đáp chuyến bay trở về TP.HCM (VN650, 13:15-14:25). Khách tiếp tục chuyển máy bay về Đà Nẵng (VN132, 16:30-17:50). Kết thúc chương trình</p>', '2019-10-22 08:31:58', '2019-10-22 07:31:58'),
(4, 7, 'Tham quan thác D\'ray Nur - ngọn thác hùng vỹ của Tây Nguyên đại ngàn. Thăm buôn làng Ê đê Ako Dhong - tìm hiểu cuộc sống cộng đồng dân tộc Ê đê. Nghe giới thiệu và tìm hiểu qui trình sản xuất cà phê Chồn tại Cơ sở nuôi chồn và sản xuất sản phẩm cà phê Chồn', 'tourbuonmethuotdetail.jpg', 'NGÀY 01: TP. HỒ CHÍ MINH -  BUÔN MA THUỘT (Ăn sáng, trưa, chiều)\r\nĐón du khách tại văn phòng của Lữ hành Saigontourist (lúc 06h00 sáng tại 01 Nguyễn Chí Thanh, F9, Q5 hoặc 06h30 sáng tại 102 Nguyễn Huệ, Q1), khởi hành theo quốc lộ 13 đến thị xã Đồng Xoài, theo quốc lộ 14 qua các địa danh nổi tiếng như Sóc Bom Bo, Bù Đăn, ngắm nhìn quang cảnh núi rừng hùng vĩ hai bên đường. Tham quan thác D’ray Nur. Buổi tối, đoàn tự do tham quan Làng Cà Phê Trung Nguyên, thưởng thức cà phê Ban Mê trứ danh (chi phí tự túc). Nghỉ đêm tại Buôn Ma Thuột. \r\n/nNGÀY 02: BUÔN MA THUỘT - PLEIKU (Ăn sáng, trưa, chiều)\r\nTham quan Cơ sở nuôi chồn và sản xuất sản phẩm cà phê Chồn, nghe giới thiệu và tìm hiểu qui trình sản xuất. Đến Buôn Đôn, tham quan cầu treo và ngắm cảnh sông Sêrêpôk, nhà Lào cổ hơn 120 năm, tham quan mộ và nghe kể chuyện về Vua săn voi. Khởi hành đi Pleiku. Đoàn tự do khám phá phố núi về đêm. Nghỉ đêm tại Pleiku. \r\n\r\n/nNGÀY 03: PLEIKU - BUÔN MA THUỘT (Ăn sáng, trưa, chiều)\r\nĐến tham quan nhà máy thủy điện Yaly - công trình thủy điện đồ sộ nằm giữa khung cảnh núi non hùng vĩ. Ngắm cảnh Biển Hồ T’Nưng, viếng chùa Minh Thành. Trở về Buôn Ma Thuột. Buổi tối, đoàn đến thăm buôn làng Ê đê Ako Dhong - tìm hiểu cuộc sống cộng đồng dân tộc Ê đê, chụp hình lưu niệm tại nhà dài.Nghỉ đêm tại Buôn Ma Thuột. \r\n\r\n/nNGÀY 04: BUÔN MA THUỘT - TP. HỒ CHÍ  MINH (Ăn sáng, trưa)\r\nĐoàn đến tham quan Bảo tàng thế giới cà phê. Khởi hành trở về Tp. Hồ Chí Minh. Kết thúc chương trình. Kết thúc chương trình.', '2019-10-16 04:29:14', '2019-09-27 13:50:07'),
(5, 15, 'Tham quan Vườn Quốc Gia Ba Bể, Động Ngườm Ngao, Thác Bản Giốc....', 'tourbabedetail.jpg', 'Ngày 01 : HÀ NỘI – VƯỜN QUỐC GIA BA BỂ  (Ăn trưa, chiều)\r\n09:00: Xe + HDV Lữ hành Saigontourist đón khách tại điểm hẹn khởi hành đi Ba Bể.Trên đường đi, Quý khách có thể chiêm ngưỡng phong cảnh núi rừng Đông Bắc, “kinh đô chè (trà) của miền Bắc - tỉnh Thái Nguyên,... Ăn trưa dọc đường. Đến Ba Bể, đoàn nhận phòng, nghỉ ngơi và sử dụng các tiện ích tại khu nghỉ dưỡng. Nghỉ đêm tại Ba Bể. /nNgày 02 : BA BỂ  -  BẢN GIỐC  (Ăn sáng, trưa, chiều)\r\nSau bữa sáng, đoàn trả phòng, khởi hành đến Vườn quốc gia Ba Bể. Xe đưa đoàn ra bến thuyền Buốc Lốm, du ngoạn trên thuyền dọc theo dòng sông Năng, ngắm nhìn cảnh quan và đời sống của của người dân tộc Tày, Nùng ở đôi bờ. Từ trên thuyền, ngắm cảnh thác Đầu Đẳng. Đến hồ Ba Bể - viên ngọc trong xanh giữa núi rừng Đông Bắc, thưởng ngoạn phong cảnh của 1 trong 100 hồ nước ngọt đẹp nhất toàn cầu, tựa một bức tranh thủy mặc đầy thi vị, hữu tình. Tham quan đảo An Mã, ao Tiên. Đoàn dùng bữa trưa tại nhà người dân. Sau bữa trưa đoàn lên thuyền trở về. Thuyền cập bến, đoàn lên xe vượt đèo Mã Phục & Khau Liêu để đến với thác Bản Giốc. Nhận phòng khách sạn, nghỉ ngơi. Ăn tối và nghỉ đêm tại Bản Giốc. \r\n\r\n/nNgày 03 : ĐỘNG NGƯỜM NGAO - THÁC BẢN GIỐC - HÀ NỘI  (Ăn sáng, trưa)\r\n07:00: Sau bữa sáng, trả phòng. Đoàn thăm động Ngườm Ngao, khám phá vẻ đẹp kỳ ảo của một hang động đá vôi còn nguyên sơ với muôn trạng thạch nhũ lung linh và huyền bí. Di chuyển đến thác Bản Giốc - một trong bốn thác nước là đường biên giới tự nhiên giữa các quốc gia lớn nhất thế giới. Chiêm ngưỡng cảnh sắc đầy hùng vĩ và thơ mộng với những cột nước khổng lồ từ trên cao đổ xuống tung bọt trắng xóa, tỏa mờ như sương, bao phủ cả một vùng trời giữa bốn bề núi non trùng điệp, xanh ngắt. Đi bè tre ngắm cận cảnh thác và sông Quây Sơn. Thăm chợ biên giới (trong phạm vi được phép). Khởi hành về Hà Nội. Ăn trưa dọc đường. Dừng chân thăm làng nghề làm bánh chưng Bờ Đậu danh tiếng ở tỉnh Thái Nguyên. Về đến Hà Nội. Kết thúc chương trình.\r\n\r\n', '2019-10-16 04:29:43', '2019-10-09 15:42:09'),
(6, 2, 'Viếng Miếu Bà Chúa Xứ nổi tiếng hiển linh. Tham quan Rừng Tràm Trà Sư. Du ngoạn trên sông Hậu, thăm làng cá bè, hòa mình vào cuộc sống “đời nước nổi” của ngư dân nuôi cá trên sông. Len lỏi theo những con rạch xuyên qua Lung Sen và khu Rừng Giống ngắm nhìn các loài chim.', 'tourrungtramdetail.jpg', 'NGÀY 1: TP. HCM - CẦU CAO LÃNH - CHÂU ĐỐC (Ăn sáng, trưa, chiều)\r\nXe & HDV đón quý khách tại văn phòng Saigontourist, khởi hành đi Đồng Tháp bằng đường cao tốc Sài Gòn - Trung Lương. Xe tiếp tục đưa đoàn vượt cầu Cao Lãnh - vừa được khánh thành vào tháng 5.2018, cây cầu dây văng lớn thứ ba bắc qua sông Tiền. Đoàn đến Châu Đốc. Buổi chiều, đến viếng Miếu Bà Chúa Xứ nổi tiếng hiển linh, Tây An cổ tự, Lăng Thoại Ngọc Hầu - người có công khai mở đất An Giang. Di chuyển xuống thuyền nhỏ, du ngoạn trên sông Hậu, thăm làng cá bè, hòa mình vào cuộc sống “đời nước nổi” của ngư dân nuôi cá trên sông, làng Chăm - nơi quý khách có thể có thể tìm hiểu nghề dệt thổ cẩm, viếng Thánh đường Hồi Giáo. Buổi tối quý khách tự do khám phá Châu Đốc về đêm. Nghỉ đêm tại Châu Đốc. \r\n\r\n/nNGÀY 2: CHÂU ĐỐC - TRÀ SƯ - TP. HCM (Ăn sáng, trưa)\r\nSau bữa sáng, quý khách trả phòng. di chuyển vào Rừng Tràm Trà Sư. Đến Trà Sư đoàn tập trung tại Trạm Kiểm Lâm nghe thuyết minh và xem tư liệu về Rừng Tràm. Đoàn đi Tắc Ráng len lỏi theo những con rạch xuyên qua Lung Sen và khu Rừng Giống ngắm nhìn các loài chim như: Le Le Vịt Trời, Cò Ma (Cò Bợ), Trích Cồ, …… Đoàn lên tháp quan sát ngắm nhìn toàn cảnh Rừng Tràm và tượng phật Di Lặc, chùa Vạn Linh trên Núi Cấm bằng kính viễn vọng. Buổi chiều khởi hành trở về TP. Hồ Chí Minh, đưa quý khách về điểm đón ban đầu. Kết thúc chương trình.', '2019-10-16 04:30:06', '2019-10-09 15:42:09'),
(7, 17, 'Tham quan Kinh Thành Huế - Hoàng Cung của 13 vị Vua triều Nguyễn. Viếng chùa Thiên Mụ - ngôi chùa nổi tiếng và cổ nhất tại Huế. Tham quan bán đảo Sơn Trà và cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt – một trong những ngôi chùa lớn nhất ở thành phố Đà Nẵng, chiêm bái tượng Phật Quan Thế Âm cao nhất Việt Nam. Tham quan Phố Cổ Hội An', 'tourdanangdetail.jpg', 'Ngày 01: CẦN THƠ – ĐÀ NẴNG – HUẾ  (Ăn trưa, tối)  \r\nSáng: Hướng dẫn viên Lữ hành Saigontourist đón khách tại sân bay Trà Nóc VÀO LÚC 05h00 làm thủ tục cho đoàn bay đi Đà Nẵng. Chuyến bay Vietnamairlines 07h15. Hướng dẫn viên Lữ hành Saigontourist đón đoàn tại sân bay Đà Nẵng khởi hành đi Huế.\r\nChiều: Đến Huế . Nhận phòng nghỉ ngơi. Sau đó tham quan Kinh Thành Huế - Hoàng Cung của 13 vị Vua triều Nguyễn với Ngọ Môn, điện Thái Hoà, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đỉnh- Đây cũng là một trong những di sản của Việt Nam được UNESCO công nhận là Di sản văn hóa thế giới. Tham quan Lăng vua Khải Định - chiêm ngưỡng một công trình được xây dựng, trang trí cực kỳ công phu và tinh xảo, mang vẻ đẹp của sự phá cách, kết hợp hài hòa giữa kiến trúc truyền thống Huế và hiện đại của Tây phương. Viếng chùa Thiên Mụ - ngôi chùa nổi tiếng và cổ nhất tại Huế.\r\nBuổi tối quý khách có thể đi bộ dọc bờ Sông Hương vừa ngắm cầu Tràng Tiền vừa tham quan chợ Đêm ở Huế. Nghỉ đêm tại Huế. \r\n\r\n/nNgày 02:  HUẾ - ĐÀ NẴNG – HỘI AN (Ăn ba bữa)   \r\nSáng: Khởi hành về  Đà Nẵng tham quan bán đảo Sơn Trà và cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt – một trong những ngôi chùa lớn nhất ở thành phố Đà Nẵng, chiêm bái tượng Phật Quan Thế Âm cao nhất Việt Nam\r\nChiều: đoàn tham quan Ngũ Hành Sơn - một tuyệt tác về cảnh quan thiên nhiên “sơn kỳ thủy tú”, thắng cảnh nổi tiếng với những hang động huyền bí và các ngôi cổ tự linh thiêng. Thăm Làng nghề điêu khắc đá Hòa Hải. Tiếp tục hành trình đến tham quan Phố Cổ Hội An.                    \r\nSau đó đoàn dạo bộ tham quan Phố cổ với các công trình tiêu biểu: Chùa Cầu Nhật Bản, chùa Ông, hội quán Phúc Kiến.\r\nTối: Đoàn khởi hành về Đà Nẵng. Nghỉ đêm tại Đà Nẵng. /nNgày 03: ĐÀ NẴNG – BÀ NÀ HILLS (Ăn sáng)\r\nSáng: Khởi hành đến khu du lịch Bà Nà - Núi Chúa theo tuyến đường du lịch Nguyễn Tất Thành - tuyến đường ven biển đẹp nhất Miền Trung, ngắm cầu treo Thuận Phước - cây cầu dây võng dài nhất Việt Nam. Lên đỉnh Bà Nà bằng hệ thống cáp treo đạt 2 kỷ lục Guinness, ngắm toàn cảnh núi non hùng vỹ và tận hưởng khí hậu trong lành, tươi mát. Đến Bà Nà quý khách tham quan chùa Linh Ứng, tự túc khám phá khu vui chơi - giải trí trong nhà mang đẳng cấp quốc tế Fantasy Park - nơi có rất nhiều trò chơi từ vui nhộn đến cảm giác mạnh, phù hợp mọi lứa tuổi.\r\nĐoàn dùng buffet trưa tại Bà Nà (Áp dụng cho nhóm khách đăng ký tham quan Bà Nà Hills). Sau đó tiếp tục khám phá KDL Bà Nà. Quý khách lên cáp treo xuống lại chân núi Bà Nà.\r\nChiều: Hướng dẫn viên Lữ hành Saigontourist đưa khách ra sân bay Đà Nẵng, làm thủ tục bay về Cần Thơ chuyến bay Vietnamairlines chuyến 18h30        \r\n/nTối: Đến sân bay Cần Thơ . Kết thúc chương trình.', '2019-10-16 04:33:02', '2019-10-09 15:42:09'),
(8, 3, 'Tham quan không gian trưng bày nghệ thuật “Làng chài xưa” với diện tích lên đến 1.600 m2. Chụp hình lưu niệm tại đồi cát vàng ở Hòn Rơm', 'tourmuine.jpg', 'NGÀY 01: TP. HCM - PHAN THIẾT (Ăn sáng, trưa, chiều)\r\nĐón quý khách tại văn phòng của Lữ hành Saigontourist (lúc 06h00 sáng tại 01 Nguyễn Chí Thanh, F9, Q5 hoặc 06h30 sáng tại 102 Nguyễn Huệ, Q1), khởi hành đi Bình Thuận. Đến Phan Thiết, vào khu resort Hàm Tiến - Mũi Né nhận phòng. Buổi chiều, quý khách đi vào Hòn Rơm tham quan đồi cát vàng dưới tác động của gió biển đã tạo nên những hình dạng rất tuyệt vời. Nghỉ đêm tại Mũi Né. \r\n\r\n/nNGÀY 02: THAM QUAN PHAN THIẾT (Ăn sáng, chiều / Ăn trưa tự túc)\r\nBuổi sáng, quý khách tự do nghỉ dưỡng tại resort. Tự túc ăn trưa. Buổi chiều, xe đưa quý khách đến tham quan không gian trưng bày nghệ thuật “Làng chài xưa”. Toàn bộ khu trưng bày có diện tích 1.600m². Đây là không gian trưng bày nghệ thuật và là bảo tàng thu nhỏ, tái hiện lại một phần làng chài xưa của Phan Thiết - Mũi Né cách đây hơn 300 năm. Du khách đến đây sẽ được tham quan làng chài dưới rặng dừa; phố cổ ven sông Cà Ty; nhà ở và nơi sản xuất nước mắm của hàm hộ Phan Thiết; con đường Phan Thiết - Mũi Né xưa; đắm mình vào biển Mũi Né 3D và mua sắm trong không gian chợ quê làng xưa… tận mắt được chứng kiến một làng chài xưa của xứ biển Phan Thiết được tái hiện một cách công phu.\r\nNghỉ đêm tại Mũi Né. \r\n\r\n/nNGÀY 03: PHAN THIẾT- TP. HCM (Ăn sáng, trưa)\r\nBuổi sáng, quý khách tư do nghỉ dưỡng, tắm biển đến giờ trả phòng. Khởi hành về Tp. HCM. Trên đường về ghé mua sắm đặc sản Phan Thiết. Kết thúc chương trình.', '2019-10-16 04:33:16', '2019-10-09 15:42:09'),
(9, 4, 'Du khách thỏa mắt ngắm đủ loài hoa khoe sắc và cây cảnh nghệ thuật tại Làng văn hóa Noong nooch, thích thú với chương trình văn hóa nghệ thuật truyền thống đặc sắc của người Thái, là một trong những điểm tham quan chính không thể bỏ qua của các tour du lịch Thái Lan hiện nay. Safari World là điểm tham quan hấp dẫn mà du khách không thể bỏ qua trong các chuyến du lịch đến xứ sở chùa Vàng.  Đây là vườn thú mở tự nhiên lớn nhất Châu Á bao gồm: Vườn thú hoang dã ngoài trời và Khu vui chơi giải trí.', 'watarunthailan.jpg', 'Ngày 1: ĐÀ NẴNG – BANGKOK- PATTAYA\r\nHướng dẫn viên Lữ hành Saigontourist đón khách tại Tầng 2, Ga T2 - Sân bay Quốc Tế Đà Nẵng, làm thủ tục khởi hành đi Bangkok (FD637, 12:00-13:35). Quý khách ăn nhẹ trên máy bay. Xe và hướng dẫn viên đón khách tại sân bay Suvarnabhumi. Khởi hành đi Pattaya. Đến Pattaya, Ăn tối. Nhận phòng khách sạn & nghỉ đêm tại Pattaya. \r\n\r\n/nNgày 2: PATTAYA - LÀNG NOONG NOOCH (Ăn sáng, trưa, tối)\r\nTham quan Làng văn hóa dân tộc Noong Nooch, tại đây du khách chiêm ngưỡng hàng trăm loài hoa lan tuyệt đẹp và thưởng thức biểu diễn nghệ thuật truyền thống Thái – xem xiếc voi. Đoàn đi viếng núi Ấn Phật nổi tiếng với bức hình Đức Phật với các đường nét được chạm khắc và dát vàng vào vách núi Tham quan vườn Nho Silver Lake, du khách chiêm ngưỡng trang trại nho và những đồng cỏ rộng đến 1200 hecta, ngoài ra quí khách còn nhìn thấy những ngôi biệt thự có kiến trúc cổ điển lâu đời. Tham quan Trung tâm chế tác vàng bạc đá quý và Cửa hàng sản xuất đồ da của Hoàng gia Thái Lan. Thưởng thức chương trình văn nghệ Colosseum hoành tráng hấp dẫn do các nghệ sĩ chuyển đổi giới tính biểu diễn. Nghỉ đêm tại Pattaya. \r\n\r\n/nNgày 3: PATTAYA – BANGKOK       (Ăn sáng, trưa, tối\r\nViếng Wat Nong Ket Yai - một trong những ngôi chùa nổi tiếng và linh thiêng ở Pattaya. Tiếp tục tham quan bảo tàng tranh 3D - bảo tàng 3D đầu tiên và lớn nhất ở Thái Lan với diện tích hơn 5.800 m2 cùng hơn 200 hình họa, với nhiều chủ đề, nội dung.  Đoàn khởi hành về Bangkok. Ăn trưa, Tham quan du thuyền trên sông Chaophraya, ngắm cảnh thành phố hai bên bờ sông. Tham quan ngôi chùa Wat Arun -  một trong những ngôi chùa linh thiêng nhất ở Bangkok của du lịch Thái Lan, không chỉ bởi vị trí nằm cạnh bờ sông mà còn bởi vì thiết kế rất khác so với các ngôi chùa khác mà bạn có thể đến thăm ở Bangkok. Tham quan & mua sắm tại Trại Rắn, Cửa hàng sản xuất đồ da lớn nhất Bangkok. Về khách sạn, nhận phòng.  Nghỉ đêm tại Bangkok. \r\n\r\n/nNgày 4: BANGKOK (Ăn sáng, trưa, tối)\r\nSáng tham quan & mua sắm tại Trại Rắn. Du khách tham quan trên đường đi ghé Sở Thú Thiên Nhiên Safari World - xem các pha diễn hành động tái hiện thời kỳ khai hoang vùng đất miền tây nước Mỹ (Cowboy show), hoặc mô phỏng thể loại phim trinh thám ly kỳ (Điệp viên 007), vào khu vực hoang dã, xe đưa du khách qua các cánh rừng thưa, thấy cuộc sống hàng ngày các loài trăn, báo, sư tử, gấu…... Du khách có thể thỉnh các tượng Phật nhỏ dát vàng để khẩn cầu sự may mắn cho gia đình. Ngày cuối tại Bangkok, du khách tự do mua sắm tại siêu thị big C Thái Lan với nhiều mặt hàng giá tốt. Ngoài ra, quí khách có thể mua sắm tại những khu trung tâm mua sắm lớn như Baiyoke, Central World, MBK….  Nghỉ đêm tại Bangkok. \r\n\r\n/nNgày 5: BANGKOK – ĐÀ NẴNG     (Ăn sáng, trưa)\r\nĂn sáng tại khách sạn. Xe tiễn quí khách ra sân bay về lại Đà Nẵng (FD636, 09:30 – 11:30). Kết thúc chương trình', '2019-10-16 04:33:42', '2019-10-09 15:42:09'),
(10, 6, 'Tham quan Đường hầm điêu khắc đất đỏ (Đà Lạt Star) - tái hiện lịch sử Đà Lạt qua hơn 120 năm. Khám phá Swiss-Belresort Tuyền Lâm - Đà Lạt, khu nghĩ dưỡng cao cấp  toạ lạc trên những đồi thông với khung cảnh lãng mạn. Thưởng thức trà và cà phê tại Bảo Lộc', 'tourdalatdetail.jpg', 'NGÀY 01: TP.HCM - ĐÀ LẠT (Ăn sáng, trưa, chiều)\r\nĐón quý khách tại văn phòng của Lữ Hành Saigontourist ( Lúc 06h00 sáng tại số 1 Nguyễn Chí Thanh, Q5 hoặc lúc 06h30 sáng tại 102 Nguyễn Huệ, Q1) khởi hành đi Đà Lạt. Đến Đà Lạt, nhận phòng và nghỉ đêm tại Swiss-Belresort (Hồ Tuyền Lâm, TP. Đà Lạt). \r\n\r\n/nNGÀY 02: THAM QUAN ĐÀ LẠT (Ăn sáng, trưa / Ăn chiều tự túc)\r\nBuổi sáng, xe đưa quý khách tham quan Đường hầm điêu khắc đất đỏ (Đà Lạt Star) với hồ Vô Cực - Nơi Tình Yêu Bắt Đầu và các công trình bằng đất sét tái hiện lịch sử trăm năm cùa thành phố hoa.\r\nBuổi chiều, quý khách tự do lựa chọn 1 trong 2 chương trình sau:\r\n - Quý khách tự do nghỉ dưỡng & tận hưởng các dịch vụ tại Swiss-Belresort nơi được bao quanh bởi những đồi thông và nằm giữa một sân golf 18 lỗ.\r\n- Xe đưa quý khách đi tham quan Ga Đà Lạt – nhà ga cổ kính, độc đáo tại Đà Lạt. Tiếp tục tham quan Quảng trường Lâm Viên với không gian rộng lớn hướng ra hồ Xuân Hương và khối nụ hoa Atiso khổng lồ được thiết kế bằng kính màu đẹp mắt. Mua sắm đặc sản tại chợ Đà Lạt.\r\nĐoàn tự túc ăn chiều, khám phá ẩm thực phố núi. Nghỉ đêm tại resort. \r\n/nNGÀY 03: ĐÀ LẠT - TP.HCM (Ăn sáng, trưa)\r\nSau bữa sáng, quý khách nghỉ ngơi, thư giãn, đến giờ hẹn trả phòng. Dừng chân viếng Thiền Viện Trúc Lâm. Khởi hành về TP.HCM. Đến TP. HCM, xe đưa quý khách về điểm đón ban đầu. Kết thúc chương trình.', '2019-10-16 04:34:00', '2019-10-09 15:42:09'),
(12, 1, '<p>aaaaaaaaaaaaa</p>', '268_Screenshot (14).png', '<p>aaaaaaaaaaaa</p>', '2019-10-22 08:39:53', '2019-10-22 07:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `highlight` text NOT NULL DEFAULT 'Mục này còn đang trống',
  `content` text NOT NULL DEFAULT 'Mục này còn đang trống',
  `image` varchar(100) NOT NULL DEFAULT 'transport.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`id`, `name`, `price`, `highlight`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Xe đưa đón sân bay', 800000, 'Lộ trình 1 chiều cho dịch vụ Đón / Tiễn sân bay khi khách mua tour Xe Toyota Innova – 7 chỗ hoặc Toyota Camry – 4 chỗ.\"', 'Áp dụng cho các điểm đón/trả tại thành phố Hồ Chí Minh. Phạm vi phục vụ: tối đa trong 2h với khoảng cách 50 km. Giá bao gồm: Nhiên liệu, phí cầu đường, bảo hiểm, thuế 10% VAT. Giá không áp dụng cho ngày Lễ Tết.\"', 'transport.jpg', '2019-10-09 15:12:59', '2019-10-03 15:24:03'),
(2, 'Xe đưa đón trọn gói', 5000000, 'Xe Toyota Innova – 7 chỗ hoặc Toyota Camry – 4 chỗ.\"', 'Đồng hành cùng bạn xuyên suốt chuyến du lịch, xe đưa đón bạn đến mỗi đại điểm du lịch. Giá bao gồm: Nhiên liệu, phí cầu đường, bảo hiểm, thuế 10% VAT. Giá không áp dụng cho ngày Lễ Tết.', 'transport.jpg', '2019-10-09 15:13:09', '2019-10-03 15:24:53'),
(3, 'Xe tự lái theo ngày', 1500000, 'Xe Toyota Innova – 7 chỗ hoặc Toyota Camry – 4 chỗ.', 'Phí xe tính theo ngày. Giá bao gồm: Nhiên liệu, phí cầu đường, bảo hiểm, thuế 10% VAT. Giá không áp dụng cho ngày Lễ Tết.', 'transport.jpg', '2019-10-03 11:44:30', '2019-10-03 11:44:30'),
(4, 'Xe tự lái theo giờ', 200000, 'Xe Toyota Innova – 7 chỗ hoặc Toyota Camry – 4 chỗ.', 'Phí xe tính theo giờ. Giá bao gồm: Nhiên liệu, phí cầu đường, bảo hiểm, thuế 10% VAT. Giá không áp dụng cho ngày Lễ Tết.', 'transport.jpg', '2019-10-03 11:44:30', '2019-10-03 11:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `transport_bookings`
--

CREATE TABLE `transport_bookings` (
  `id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `booking_start_date` date NOT NULL DEFAULT '2019-09-08',
  `time` int(11) DEFAULT 1,
  `details` text DEFAULT NULL,
  `total_price` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transport_bookings`
--

INSERT INTO `transport_bookings` (`id`, `transport_id`, `booking_start_date`, `time`, `details`, `total_price`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 4, '2019-11-06', 3, 'Test', 600000, '2019-10-19 10:31:46', '2019-10-19 10:31:46', 36),
(2, 3, '2019-11-05', 4, 'testedit', 4500000, '2019-10-19 11:52:29', '2019-10-19 10:52:29', 37),
(3, 1, '2019-11-20', NULL, 'testedit', 800000, '2019-10-19 11:49:53', '2019-10-19 10:49:53', 38);

-- --------------------------------------------------------

--
-- Table structure for table `transport_comments`
--

CREATE TABLE `transport_comments` (
  `id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL DEFAULT 'Chưa có ý kiến',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `score`, `created_at`, `updated_at`) VALUES
(3, 'Đức', 'taolagiakaka@gmail.com', '$2y$10$W4sagESVD4mw/9MV4IB.4uL9SHLa6eOh.85vkoeCr5atG4az0QlFy', 0, 0, '2019-09-29 14:43:53', '2019-10-19 09:06:47'),
(4, 'Hoàng Liêm', 'luhoangliem@gmail.com', '$2y$10$qE0kNKq/6oiH5CFN040mhOLPR44KT0kN8zzUyXsOfRy.DVyfvcOXm', 1, 0, '2019-10-10 08:04:16', '2019-10-10 07:04:16'),
(5, 'Nam', 'nhatnam@gmail.com', '$2y$10$osJCIv1y0ayiY3HQZGbqyuLyczCNFqikN9nNzvh2unoCz3DhVYOYW', 1, 0, '2019-10-09 15:48:21', '2019-10-09 14:48:21'),
(6, 'Danh', 'hoangdanh@gmail.com', '$2y$10$sQEDst0K0lr7tuMu5Orpau/Ie06ZQbB9BqfaUt4gfmkIK9NoiHGCm', 0, 10, '2019-10-10 07:20:51', '2019-10-19 10:43:58'),
(15, 'Liem Lu Hoang', '1651012093liem@ou.edu.vn', NULL, 0, 0, '2019-10-12 17:02:47', '2019-10-19 08:59:18'),
(16, 'Hoàng Liêm', 'liemhoangdk98@gmail.com', NULL, 0, 15, '2019-10-17 13:43:59', '2019-10-17 15:39:37'),
(17, 'Liêm Lữ', 'liemluhoang@gmail.com', NULL, 0, 0, '2019-10-12 17:05:28', '2019-10-12 17:05:28'),
(18, 'ou', 'ou@ou.edu.vn', '$2y$10$5ybeWa80hT.NwSnXIGHLNewhu2rCwm1mkbqriIu1UkziRd8wwf94K', 1, 0, '2019-10-20 08:08:44', '2019-10-20 08:08:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`id`,`hotel_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_provider`
--
ALTER TABLE `social_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourcate_id` (`tourcate_id`);

--
-- Indexes for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  ADD PRIMARY KEY (`id`,`tour_id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tour_category`
--
ALTER TABLE `tour_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_comments`
--
ALTER TABLE `tour_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tourdetail_id` (`tourdetail_id`);

--
-- Indexes for table `tour_details`
--
ALTER TABLE `tour_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_bookings`
--
ALTER TABLE `transport_bookings`
  ADD PRIMARY KEY (`id`,`transport_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `transport_comments`
--
ALTER TABLE `transport_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_provider`
--
ALTER TABLE `social_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tour_category`
--
ALTER TABLE `tour_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour_comments`
--
ALTER TABLE `tour_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_details`
--
ALTER TABLE `tour_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transport_bookings`
--
ALTER TABLE `transport_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transport_comments`
--
ALTER TABLE `transport_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `booking_status` (`id`);

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `hotel_bookings_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `hotel_bookings_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `hotel_comments`
--
ALTER TABLE `hotel_comments`
  ADD CONSTRAINT `hotel_comments_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `hotel_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`tourcate_id`) REFERENCES `tour_category` (`id`);

--
-- Constraints for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  ADD CONSTRAINT `tour_bookings_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`),
  ADD CONSTRAINT `tour_bookings_ibfk_5` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `tour_comments`
--
ALTER TABLE `tour_comments`
  ADD CONSTRAINT `tour_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tour_comments_ibfk_2` FOREIGN KEY (`tourdetail_id`) REFERENCES `tour_details` (`id`);

--
-- Constraints for table `tour_details`
--
ALTER TABLE `tour_details`
  ADD CONSTRAINT `tour_details_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);

--
-- Constraints for table `transport_bookings`
--
ALTER TABLE `transport_bookings`
  ADD CONSTRAINT `transport_bookings_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transports` (`id`),
  ADD CONSTRAINT `transport_bookings_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `transport_comments`
--
ALTER TABLE `transport_comments`
  ADD CONSTRAINT `transport_comments_ibfk_1` FOREIGN KEY (`transport_id`) REFERENCES `transports` (`id`),
  ADD CONSTRAINT `transport_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
