-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 04:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(50) NOT NULL,
  `customername` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `jobs` varchar(200) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='id cua khach hang';

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customername`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `update_at`) VALUES
(1, 'truongdu0212@gmail.com', '9e141c60b24bd8ccd16d8a0eaddb04f5', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayGioTao` varchar(50) NOT NULL,
  `NhanVien` varchar(50) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayGioTao`, `NhanVien`, `TenKhachHang`, `MaSP`, `SoLuongMua`) VALUES
(1, '13/8/2021 - 9:21', 'Tiến Bịp', 'Nguyễn Ngọc Quân', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(1000) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `content` varchar(10000) DEFAULT NULL,
  `avatar` varchar(1000) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `status` int(11) NOT NULL,
  `seo_title` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho title',
  `seo_description` varchar(100) DEFAULT NULL COMMENT 'Từ khóa seo cho phần mô tả',
  `seo_keywords` varchar(100) DEFAULT NULL COMMENT 'Các từ khóa seo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `content`, `avatar`, `status`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Các loại tivi phổ biến hiện nay - Đặc điểm chi tiết của từng loại!', 'Trên thị trường hiện này có nhiều loại tivi từ dòng tivi thông minh cao cấp đến những tivi cơ bản. Mời bạn xem qua bài viết dưới đây để cùng điểm qua một số loại tivi phổ biến hiện nay nhé.', 'Tivi LED là loại tivi màn hình phẳng sử dụng đèn chiếu sáng là đèn LED thay cho đèn huỳnh quang như trước đây. Tivi LED có ưu điểm là tiết kiệm điện, tuổi thọ cao và hiển thị hình ảnh đẹp hơn so với tivi dùng đèn huỳnh quang.Tivi LED thường sẽ chỉ có các tính năng cơ bản như xem truyền hình (bao gồm các kênh thường thu được bằng ăng-ten và các kênh thu được bởi đầu thu kỹ thuật số DVB-T2).\r\n\r\nThêm nữa trên tivi sẽ có những cổng kết nối cơ bản như cổng USB, cổng HDMI để kết nối với máy tính, đầu thu kỹ thuật số, cổng AV để kết nối tivi với dàn âm thanh, đầu đĩa, cổng Audio Out, Digital Audio Out (Optical) để kết nối tivi với dàn âm thanh,…\r\n<img src=\"../backend/assets/images/mot-so-loai-tivi-pho-bien-hien-nay-001-1.jpg\" alt=\"\" style=\"margin-top: 10px; margin-bottom: 10px\">\r\n                    <p>Tivi LED chấm lượng tử Tivi LED chấm lượng tử là một loại tivi vẫn sử dụng đèn nền LED thường nhưng trang bị thêm một lớp chấm lượng tử hay còn gọi là <b>Quantum Dot</b>.</p>\r\n                 ', 'mot-so-loai-tivi-pho-bien-hien-nay-001.jpg', 1, NULL, NULL, NULL, '2021-04-21 10:16:44', NULL),
(2, 'TCL Việt Nam ra mắt TV Mini-LED mới nhất 2021 và các sản phẩm AixIoT', 'Ngày 26/3 vừa qua, TCL Việt Nam, một trong những công ty điện tử tiêu dùng hàng đầuNgày 26/3 vừa qua, TCL Việt Nam, một trong những công ty điện tử tiêu dùng hàng đầu phối hợp cùng Mạng xã hội Tinh tế, giới thiệu đến người dùng thế hệ TV Mini-LED, AI QLED và TV Android 4K HDR mới nhất 2021, cùng điều hòa thông minh và thiết bị gia dụng khác theo chiến lược AIxIoT hướng tới tương lai.', '<b class=\"margin-top-bottom-10\">TV Mini-LED, QLED và 4K HDR cao cấp mới nhất 2021</b>\r\n                    <p>4 mẫu TV mới nổi bật nhất năm 2021 gồm TV C825 Mini-LED thế hệ tiếp theo, QLED AI TV C728, C725 và TV Android 4K HDR P725. Sự kiện ra mắt được thực hiện trên nền tảng trực tuyến với trải nghiệm và chia sẻ thực tế từ anh Trần Mạnh Hiệp.</p>\r\n                    <p>Ngoài ra, TCL cũng lên dự định cập nhật Google TV vào nửa cuối năm 2021. TCL Google TV tập hợp các bộ phim, chương trình, truyền hình trực tiếp,… từ tất cả các ứng dụng và thuê bao, và sắp xếp chúng cho từng người dùng.</p>\r\n                    <b class=\"margin-top-bottom-10\">TCL 4K Mini-LED C825 TV</b>\r\n                    <p>Tivi TCL Mini-LED 4K luôn đảm bảo người dùng tận hưởng trải nghiệm xem vượt trội, cho dù họ đang xem thể thao, phim hoặc chương trình truyền hình, chơi game hay kết nối với bạn bè và gia đình. C825 sử dụng chế độ đèn nền chiếu thẳng giúp giảm đáng kể kích thước hạt của đèn LED truyền thống.</p>\r\n\r\nC825 cũng có công nghệ hình ảnh Dolby Vision HDR, cho ra hình ảnh cực kỳ sống động, cùng với Dolby Vision IQ. Dolby Vision IQ tận dụng toàn bộ trí thông minh của C825 để mang đến hình ảnh đáng kinh ngạc cho căn phòng của bạn bằng cách tự động điều chỉnh theo sự thay đổi ánh sáng phòng và các loại nội dung được phát lại để tối đa hóa khả năng của TV.\r\n\r\nĐể có hình ảnh chuyển động và chơi game video chất lượng tốt nhất, C825 sử dụng MEMC 120Hz và màn hình phản chiếu thấp. C825 được trang bị hệ thống âm thanh hàng đầu trong ngành, có phần cứng từ soundbar Onkyo được chứng nhận IMAX Enhanced, với sự hỗ trợ từ Dolby Atmos® cho trải nghiệm âm thanh rạp chiếu. C825 giúp việc tương tác với những người chơi game, bạn bè và gia đình trở nên dễ dàng, với Magic camera từ tính mang đến những tương tác âm thanh và hình ảnh tuyệt vời cho trải nghiệm cuộc gọi video vượt trội, chẳng hạn như Google Duo.', 'photo-1-1616814274997510820367.jpg', 1, NULL, NULL, NULL, '2021-04-21 10:35:09', NULL),
(3, 'Mẹo làm sạch màn hình TV đơn giản và an toàn, mà vẫn giữ cho hình ảnh luôn rõ nét', 'Làm sạch TV không khó - tất cả những gì bạn cần là loại vải lau phù hợp.\r\n\r\n', 'Làm sạch TV không khó - tất cả những gì bạn cần là loại vải lau phù hợp.\r\nCác dòng TV khác nhau có thể nhạy cảm ở các khu vực khác nhau, do đó, phương pháp tốt nhất để làm sạch màn hình TV cũng có thể khác nhau tùy thuộc vào loại TV trong gia đình bạn.\r\n\r\nCác TV độ nét cao như OLED và LCD có xu hướng màn hình cực kỳ nhạy cảm và có thể dễ trầy xước, vì vậy cần phải hết sức cẩn thận khi làm sạch chúng.\r\n\r\nNhưng nhìn chung, có một phương pháp chung đơn giản để làm sạch bất kỳ màn hình TV nào.\r\n\r\nCách làm sạch màn hình TV\r\n\r\nTrước hết, hãy nhớ luôn nhẹ nhàng. Màn hình TV rất nhạy cảm và nếu không cẩn thận, bạn có thể làm hỏng hoặc thậm chí làm đổ TV. Không ai muốn mang lại những rắc rối lớn chỉ vì muốn lau chùi một chút bụi bặm.\r\n\r\nNhớ tắt TV trước khi làm sạch nó. Tắt TV giúp giảm nguy cơ hư hỏng điện và màn hình tối của TV giúp bạn dễ dàng nhìn thấy bụi, bẩn, tóc và cặn bẩn.\r\n\r\nHãy sử dụng một miếng vải mềm và khô. Vải sợi nhỏ là một sự lựa chọn tuyệt vời. Các loại vải sợi nhỏ có thể dễ ', 'photo1615453624797-16154536249401290089398.jpg', 1, NULL, NULL, NULL, '2021-04-21 10:35:09', NULL),
(4, 'Lý do TV Sony BRAVIA chinh phục được những nhà làm phim chuyên nghiệp', 'Tái tạo được những sắc thái tinh tế của màu sắc, ánh sáng và hiệu ứng chuyển tông màu theo đúng ý đồ', 'Có thể nói, Sony là một trong những thương hiệu góp mặt trọn vẹn ở mọi quy trình sản xuất phim điện ảnh. Những thước phim được bấm máy với máy ghi hình Sony, xử lý hậu kỳ với ứng dụng Sony Vega Pro sử dụng màn hình tham chiếu Sony OLED monitor, thực hiện bởi Sony Picture và phân phối đến người dùng trên những chiếc BRAVIA.\r\n\r\nLý do TV Sony BRAVIA chinh phục được những nhà làm phim chuyên nghiệp - Ảnh 1.\r\nCông nghệ tối tân giúp TV BRAVIA đảm bảo sáng tạo nguyên bản của các nhà làm phim được tái hiện một cách chuẩn xác từ hình ảnh đến âm thanh (Sony X9500H & Loa HT-G700).\r\n\r\n\r\nKhông chỉ là sự đồng nhất giữa các khâu, Sony còn am hiểu cách để tạo ra những khung hình gần với nguyên bản bậc nhất, truyền tải hình ảnh, âm thanh theo đúng ý đồ của đạo diễn đến với khán giả. Cũng bởi vậy mà dòng TV BRAVIA đã chinh phục được những nhà làm phim chuyên nghiệp, vốn luôn được đánh giá có những đôi tai, đôi mắt khó tính.\r\n\r\nTôn trọng sự trung thực\r\n\r\nKhi tạo ra TV BRAVIA, mục tiêu của các kỹ sư tại S', 'photo-1-16124169820151481479067.jpg', 1, NULL, NULL, NULL, '2021-04-21 11:04:35', NULL),
(5, 'CES 2021: TCL trình làng hàng loạt các sản phẩm đa dạng hóa mới nhất: TV, Audio, thiết bị di động và', 'TCL tiếp tục đổi mới và mang đến cho người tiêu dùng các thiết bị gia dụng thông minh được kết nối v', 'TCL Electronics - một trong những thương hiệu nổi tiếng trong ngành công nghiệp TV toàn cầu và là công ty điện tử tiêu dùng hàng đầu với sứ mệnh làm cho cuộc sống thông minh hơn thông qua công nghệ tiên tiến, đã giới thiệu đến CES 2021 năm nay TCL Mini-LED, QLED và 4K HDR TV, âm thanh và thiết bị gia dụng mới nhất của mình, được cung cấp dựa trên chiến lược AIxIoT hướng tới tương lai.\r\n\r\nCES 2021: TCL trình làng hàng loạt các sản phẩm đa dạng hóa mới nhất: TV, Audio, thiết bị di động và gia dụng thông minh - Ảnh 1.\r\n\r\nTruy cập https://www.tcl.com/ces2021.html để tìm hiểu thêm về TCL tại CES2021.\r\n\r\nPremium Mini-LED, QLED và TV 4K HDR\r\n\r\nNăm nay, TCL sẽ giới thiệu ba chiếc TV nổi bật là Mini-LED, QLED và 4K HDR, vượt xa hiệu suất hình ảnh thông thường và cung cấp một loạt các tính năng với phong cách sống toàn diện cho các thế hệ mới. Những người tham dự CES thông qua giải pháp số năm nay đã được giới thiệu dòng TV mới: TCL 4K Mini-LED C825, TCL 4K QLED TV C725, TV TCL 4K HDR P725 – nhữ', '1610593132868-38-0-931-1430-crop-1610593137968-63746223608659.jpg', 1, NULL, NULL, NULL, '2021-04-21 11:04:35', NULL),
(6, 'LG công bố TV sử dụng công nghệ QNED, sở hữu dàn đèn LED tiên tiến lên tới 30.000 chiếc', 'Công nghệ mới của LG yêu cầu người mua cẩn thận hơn khi đi mua TV, tránh trường hợp nhầm lẫn sang QL', 'Nhắc tới tên LG khi nói chuyện về TV, ta dễ dàng tưởng tới OLED, nhưng ngay trước khi năm 2020, LG đã làm chúng ta ngạc nhiên với một công nghệ màn hình mới. Giống với những gì các nhà sản xuất khác (như TCL đã đang và Samsung sắp thực hiện), LG chuẩn bị ứng dụng công nghệ Mini LED cho dòng TV chất lượng cao của mình, là các thiết bị màn 4K và LCD 8K sẽ ra mắt trong năm tới.\r\n\r\nLG nói rằng công nghệ Mini LED cho phép họ “có bước nhảy vọt về chất lượng hình ảnh trên các màn LCD”. TV sử dụng màn LCD tiên tiến nhất thị trường sử dụng “công nghệ làm tối cục bộ toàn chuỗi”, với một dãy các đèn nền LED cung cấp ánh sáng tạo thành hình ảnh. \r\n\r\nLG công bố TV sử dụng công nghệ QNED, sở hữu dàn đèn LED tiên tiến lên tới 30.000 chiếc - Ảnh 1.\r\n\r\nĐúng với cái tên của nó, đèn Mini LED lại là những đèn LED nhỏ hơn (nhưng sẽ nhiều đèn trên mỗi đơn vị diện tích hơn,) tạo nên độ tương phản tốt cho màn hình khi việc kiểm soát ánh sáng cục bộ chi tiết hơn trước.\r\n\r\nLG nói hệ thống đèn nền mới của họ “có', 'lg-ra-mat-dong-tivi-qned-7.jpg', 1, NULL, NULL, NULL, '2021-04-21 11:04:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'du', 'thanh hóa', 985673110, NULL, 'baby', 0, 0, '2020-09-19 12:31:57', NULL),
(2, NULL, 'du', 'thanh hóa', 985673110, NULL, 'baby', 0, 0, '2020-09-19 12:32:30', NULL),
(3, NULL, 'du', 'thanh hóa', 985673110, NULL, 'baby', 0, 0, '2020-09-19 12:54:16', NULL),
(4, NULL, 'du', 'thanh hóa', 985673110, NULL, 'baby', 0, 0, '2020-09-19 12:54:31', NULL),
(5, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 12:55:54', NULL),
(6, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:12:02', NULL),
(7, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:16:51', NULL),
(8, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:17:57', NULL),
(9, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:18:24', NULL),
(10, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:21:00', NULL),
(11, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:25:27', NULL),
(12, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:26:30', NULL),
(13, NULL, 'du', 'thanh hóa', 985673110, NULL, 'pijpjip', 12, 0, '2020-09-19 13:38:12', NULL),
(14, NULL, 'du', 'thanh hóa', 985673110, NULL, 'fewfw', 12, 0, '2020-09-19 13:42:35', NULL),
(15, NULL, 'du', 'thanh hóa', 985673110, NULL, 'qfef', 12, 0, '2020-09-19 13:43:37', NULL),
(16, NULL, 'du', 'thanh hóa', 985673110, NULL, 'dưef', 12, 0, '2020-09-19 13:47:00', NULL),
(17, NULL, 'du', 'thanh hóa', 985673110, NULL, 'cds', 12, 0, '2020-09-19 13:55:46', NULL),
(18, NULL, 'du', 'thanh hóa', 985673110, NULL, 'rferhtyjtyjyj', 38290000, 0, '2021-04-03 03:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quantity` int(11) DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`) VALUES
(4, 22, 2),
(5, 22, 3),
(5, 23, 1),
(6, 22, 3),
(6, 23, 1),
(7, 22, 3),
(7, 23, 1),
(8, 22, 3),
(8, 23, 1),
(9, 22, 3),
(9, 23, 1),
(10, 22, 3),
(10, 23, 1),
(11, 22, 3),
(11, 23, 1),
(12, 22, 3),
(12, 23, 1),
(13, 22, 3),
(13, 23, 1),
(14, 22, 3),
(14, 23, 1),
(15, 22, 3),
(15, 23, 1),
(16, 22, 3),
(16, 23, 1),
(17, 22, 3),
(17, 23, 1),
(18, 28, 2),
(18, 27, 2),
(18, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Hang` varchar(30) NOT NULL,
  `MauHienCo` varchar(50) NOT NULL,
  `SoGhe` int(11) NOT NULL,
  `GiaTien` bigint(50) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Hang`, `MauHienCo`, `SoGhe`, `GiaTien`, `SoLuong`) VALUES
(1, 'MAZDA6', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 4, 899000000, 65),
(2, 'MAZDA CX-8', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 4, 999000000, 5),
(3, 'ALL-NEW MAZDA3 SPORT', 'Mazda', 'Soul Red, Deep Blue, White, Machine Grey', 2, 699000000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(100) DEFAULT NULL COMMENT 'Mật khẩu đăng nhập',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'Fist name',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Last name',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(100) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `jobs` varchar(100) DEFAULT NULL COMMENT 'Nghề nghiệp',
  `last_login` datetime DEFAULT NULL COMMENT 'Lần đăng nhập gần đây nhất',
  `facebook` varchar(100) DEFAULT NULL COMMENT 'Link facebook',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `jobs`, `last_login`, `facebook`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-08-29 09:20:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
