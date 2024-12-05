-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2024 lúc 11:41 AM
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
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
(1, 'Quả dâu tây mùa hè', 'Dâu tây lần đầu tiên được trồng ở Brittany, Pháp vào năm 1750 thông qua một cây giống Fragaria virginiana từ Đông Bắc Mỹ và một cây Fragaria chiloensis thuộc giống được mang đến từ Chile bởi Amédée-François Frézier vào năm 1714. Giống cây lai Fragaria × ananassa thay thế giống dâu rừng (Fragaria vesca) trong sản xuất thương mại, là loài dâu đầu tiên được trồng vào đầu thế kỷ 17.', 'dau_tay.jpg', NULL, NULL),
(4, 'Bí đỏ ngon ', 'Bí đỏ chứa nhiều beta carotene là dưỡng chất quan trọng giúp chuyển hóa vitamin A có lợi cho sức khỏe thị lực, là chất chống oxy hóa giúp ngăn ngừa ung thư, giàu vitamin C, E và sắt, Folate là những dưỡng chất giúp cơ thể tăng cường hệ miễn dịch.', 'bi_do.jpg', NULL, NULL),
(5, 'Khoai lang ', 'Củ khoai lang là nguồn cung cấp rất nhiều vitamin, khoáng chất, riboflavin, thiamine, niacin và carotenoid. Chính nhờ những thành phần dinh dưỡng này mà củ khoai lang có thể hỗ trợ bạn phòng và chữa nhiều bệnh mãn tính, tăng cường giảm cân, cải thiện làn da và mái tóc.\r\nTác dụng của khoai lang phụ thuộc nhiều vào giá trị dinh dưỡng của nó. Trong 100g củ khoai lang có hàm lượng đáng kể các chất dinh dưỡng, khoáng chất cùng nhiều vitamin sau:\r\n\r\nCanxi: 38mg\r\nChất xơ: 3,3g\r\nNăng lượng: 90kcal\r\nChất béo: 0,15g\r\nFolate (Vitamin B9): 6 μg\r\nSắt: 0,69mg\r\nMagie: 27mg\r\nMangan: 0,5mg\r\nNiancin (Vitamin B3): 1,5mg\r\nPhốt pho: 54mg\r\nKali: 475mg\r\nĐạm: 2g\r\nRiboflavin (Vitamin B2): 0,11mg\r\nNatri: 36mg\r\nKẽm: 0,32mg\r\nTinh bột: 7,05g\r\nĐường: 6,5g\r\nThiamine (Vitamin B1): 0,11mg\r\nVitamin A: 961 μg\r\nVitamin B6: 0,29mg\r\nVitamin C: 19,6mg\r\nVitamin E: 0,71mg', 'khoai_lang.jpg', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
