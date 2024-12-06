-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2024 lúc 12:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
(6, 'Cà chua ', 'cà chua màu đỏ', 'ca_chua.jpg', '2024-12-05 19:35:47', NULL),
(7, 'Hạt hướng dương ', 'Hạt hướng dương chính là phần nhị của hoa hướng dương, mọc lên thành quả. Trung bình có thể thu được 2000 hạt hướng dương từ một bông hoa hướng dương. Loại hạt này có kết cấu chắc nhưng cũng có độ mềm, hương vị thơm ngon. Nên rang hạt trước khi ăn để tăng thêm hương vị.', 'hat_huong_duong.jpg', '2024-12-06 00:51:39', NULL),
(8, 'Dâu tây mùa hè ', 'Dâu tây (danh pháp khoa học: Fragaria × ananassa) là một chi thực vật hạt kín và là loài thực vật có hoa thuộc họ Hoa hồng (Rosaceae). Dâu tây xuất xứ từ châu Mỹ và được các nhà làm vườn châu Âu cho lai tạo vào thế kỷ 18 để tạo nên giống dâu tây được trồng rộng rãi hiện nay.', 'dau_tay.jpg', '2024-12-06 09:29:39', NULL),
(9, 'Bí đỏ ngon ', 'Bí đỏ là thực phẩm tốt cho não bộ, làm tăng cường miễn dịch, giúp tim khỏe mạnh, mắt sáng, giúp ngủ ngon hơn, hỗ trợ chăm sóc da cũng như làm đẹp, giúp giảm cân nhưng cần biết cách sử dụng cho đúng.', 'bi_do.jpg', '2024-12-06 09:30:05', NULL),
(10, 'Cam sành', 'Cam sành là một giống cây ăn quả thuộc chi Cam chanh có quả gần như quả cam (Citrus reticulata x maxima), có nguồn gốc từ Việt Nam. Quả cam sành rất dễ nhận ra nhờ lớp vỏ dày, sần sùi giống bề mặt mảnh sành và thường có màu lục nhạt (khi chín có sắc cam), các múi thịt có màu cam.', 'cam_sanh.jpg', '2024-12-06 09:30:30', NULL),
(11, 'Bắp cải ', 'bắp cải có nhiều chất xơ và chứa chất chống oxy hóa mạnh, bao gồm polyphenol và các hợp chất lưu huỳnh. Khi so sánh màu sắc của cải bắp, các chuyên gia nhận thấy rằng loại bắp cải có màu đỏ có chứa nhiều hợp chất này hơn so với bắp cải màu xanh.', 'bap_cai.jpg', '2024-12-06 17:46:46', NULL),
(12, 'Cải bó xôi', 'Cải bó xôi còn có tên là rau bina, rau chân vịt, là loại rau được trồng phổ biến ở nước ta. Đây là loại rau thường được sử dụng trong chế biến món ăn hoặc ép nước để uống và có giá trị dinh dưỡng cao. Rau bina được xem như là một \"siêu thực phẩm\" nhờ có nguồn vitamin và khoáng chất tuyệt vời đối với sức khỏe.', 'cai_bo_xoi.jpg', '2024-12-06 17:47:22', NULL),
(13, 'Dưa hấu', 'Dưa hấu là một trong những loại trái cây yêu thích của nhiều người vào mỗi dịp hè nóng bức. Loại quả này không chỉ có vị ngọt thanh mát mà còn mang lại nhiều lợi ích nhất định cho sức khỏe bởi chúng chứa nhiều thành phần dinh dưỡng thiết yếu, như vitamin, khoáng chất và các hợp chất thực vật.', 'dua_hau.jpg', '2024-12-06 17:48:01', NULL),
(14, 'Hành lá', 'Hành lá có thành phần chính là nước. Mỗi bát hành chứa khoảng 32 calo, không có cholesterol, chỉ có một ít chất béo và đường. So với nhiều loại rau khác thì hành lá rất ít carbs.', 'hanh_la.jpg', '2024-12-06 17:48:19', NULL),
(15, 'Hạt bí xanh', 'Hạt bí xanh là một loại hạt có nguồn vitamin, hàm lượng khoáng chất vô cùng dồi dào. Hạt bí này có thể sử dụng để chế biến các món ăn hoặc dùng trực tiếp. Để hiểu rõ hơn việc ăn hạt bí xanh có tác dụng gì? Cùng tìm hiểu qua bài viết dưới đây.', 'hat_bi_xanh.jpg', '2024-12-06 17:48:43', NULL),
(16, 'Hạt chia', 'Hạt chia là loại hạt tốt nhất mà bạn có thể bổ sung cho cơ thể. Chúng cung cấp nhiều chất dinh dưỡng tuyệt vời, rất tốt cho cơ thể và bộ não. Dưới đây là 11 lợi ích về sức khoẻ của hạt Chia đã được các nhà khoa học chứng minh.', 'hat_chia.jpg', '2024-12-06 17:49:00', NULL),
(17, 'Hạt dẻ cười', 'Hạt dẻ cười có chứa chất coronoid, chất này giúp làm giảm nguy cơ đục thủy tinh thể và các vấn đề về mắt khi về già. Bên cạnh đó hàm lượng vitamin E và vitamin A có trong hạt dẻ cũng làm mắt sáng ra.', 'hat_de_cuoi.jpg', '2024-12-06 17:49:21', NULL),
(18, 'Hạt điều', 'Hạt điều là hạt thuộc họ Anacardium occidentale có nguồn gốc từ Brazil được trồng nhiều ở các tỉnh phía Nam của Việt Nam. Ngoài hương vị thơm ngon thì hạt điều còn có giá trị dinh dưỡng cao cùng với những công dụng tuyệt vời đối với sức khỏe con người.', 'hat_dieu.jpg', '2024-12-06 17:49:41', NULL),
(19, 'Hạt hạnh nhân', 'Hạt hạnh nhân có chứa một lượng lớn vitamin E có khả năng làm chậm quá trình lão hóa. Ngoài ra, gamma-tocopherol (một dạng khác của vitamin E) cũng rất có ích đối với công cuộc bảo vệ các tế bào thần kinh khỏi quá trình oxy hóa. Chúng được ví như một hoạt chất chống lại sự tấn công của các gốc tự do và những chất oxy hóa có liên quan đến các tế bào ung thư. Trong đó bao gồm cả bệnh ung thư tuyến tiền liệt đối với nam giới và bệnh ung thư vú đối với nữ giới.', 'hat_hanh_nhan.jpg', '2024-12-06 17:50:05', NULL),
(20, 'Hạt cacca', 'Hạt macca là một loại hạt có chứa ít đường và carbohydrate, nhưng chứa nhiều các chất dinh dưỡng thiết yếu khác nhau như chất xơ và chất chống oxy hóa giúp giảm nguy cơ và kiểm soát bệnh tim mạch, tiểu đường và sức khỏe tiêu hóa. Ngoài ra, các chất sau cũng được tìm thấy nhiều trong hạt macca:', 'hat_mac_ca.jpg', '2024-12-06 17:50:36', NULL),
(21, 'Nho ', 'Nho xanh Mỹ là loại trái cây nhập khẩu được ưa chuộng tại Việt Nam. Nho xanh trái tròn hoặc hơi thuôn dài, trái to, ăn giòn, ngọt và không hạt.Nho ngoài ăn trực tiếp có thể dùng pha chế, trang trí.', 'nho_xanh.jpg', '2024-12-06 17:51:17', NULL),
(22, 'ổi lê', 'ổi Lê có nguồn gốc từ Đài Loan, được trồng ở Việt Nam mấy năm gần đây, với đặc điểm sinh trưởng và phát triển tốt, quả mẫu mã đẹp, chất lượng có thể ngon nhất trong các loại ổi hiện có. Hiện nay đã có nhiều nhà vườn phát triển với quy mô lớn đem lại hiệu quả kinh tế cao', 'oi_le.jpg', '2024-12-06 17:51:48', NULL),
(23, 'rau muống ', 'Rau muống (danh pháp hai phần: Ipomoea aquatica) là một loài thực vật nhiệt đới bán thủy sinh thuộc họ Bìm bìm (Convolvulaceae), là một loại rau ăn lá. Phân bố tự nhiên chính xác của loài này hiện chưa rõ do được trồng phổ biến khắp các vùng nhiệt đới và cận nhiệt đới trên thế giới', 'rau_muong.jpg', '2024-12-06 17:52:14', NULL),
(24, 'xoài ', 'Xoài là một loại trái cây vị ngọt thuộc chi Xoài, bao gồm rất nhiều quả cây nhiệt đới, được trồng chủ yếu như trái cây ăn được. Phần lớn các loài được tìm thấy trong tự nhiên là các loại xoài hoang dã. ', 'xoai_cat.jpg', '2024-12-06 17:52:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(2, 'admin', '$2y$10$ZurBNhrOgcBQDzY1fAYWVOSj9S7c/X13pqY.SycOHIs7ZUe63j3KO', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
