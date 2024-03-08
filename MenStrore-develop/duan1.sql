-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 07:16 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) DEFAULT 0,
  `ngaydathang` varchar(50) DEFAULT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán trực tiếp ',
  `total` int(10) NOT NULL,
  `bill_satus` int(11) NOT NULL DEFAULT 0 COMMENT '0. Đang chuẩn bị đơn hàng 1. Đang vận chuyển 2. Đang giao hàng 3. Đã giao hàng',
  `bill_thanhtoan` int(10) NOT NULL COMMENT '0. Chưa thanh toán 1. Đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `ngaydathang`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `total`, `bill_satus`, `bill_thanhtoan`) VALUES
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(199) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(1, 'hhihi', 3, 1, '28/11/2022'),
(2, 'aaa', 6, 1, '01:03:23pm 29/11/2022'),
(3, 'sachs hay qua', 2, 1, '05:19:49pm 12/11/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(20) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(33, 'Phụ kiện'),
(34, 'Quần Nam'),
(40, 'Áo Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) DEFAULT 0.00,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(51, 'Áo Sơ Mi Unisex Tay Dài Kẻ Sọc Caro Form Loose - 10F23SHLU001', 540.00, 'ao-so-mi-14-10f23shlu001-green-_1__2_jpg.webp', 'Chất liệu: Bạn sẽ yêu ngay từ lần chạm đầu tiên với chất liệu 100% cotton cao cấp, mềm mại và thoáng khí.Màu sắc: Màu xanh navy tinh tế và dễ phối hợp với nhiều trang phục khác nhau, từ quần jeans đến quần kaki.', 0, 40),
(52, 'Áo Thun Nam Tay Ngắn Polyester Thêu Hình Form Fitted - 10F23TSS001L', 589.00, 'ao-thun-nam-10f23tss001l-black-beauty-_1__2_1_jpg.webp', 'Kiểu dáng: Áo polo này có kiểu dáng Classic Fit, tạo cảm giác thoải mái và phong cách lịch lãm. Thiết kế với cổ áo polo truyền thống và đường may tỉ mỉ, làm nổi bật vẻ sang trọng.Chất liệu: Bạn sẽ yêu ngay từ lần chạm đầu tiên với chất liệu 100% cotton cao cấp, mềm mại và thoáng khí.', 0, 40),
(53, 'Áo Thun Nam Tay Dài Cotton Cổ Tròn Thêu Chữ Form Regular - 10F23TSL003', 373.00, 'ao-len-nam-3-10f23tsl003-black-_1__1_jpg.webp', 'Kiểu dáng: Áo polo này có kiểu dáng Classic Fit, tạo cảm giác thoải mái và phong cách lịch lãm. Thiết kế với cổ áo polo truyền thống và đường may tỉ mỉ, làm nổi bật vẻ sang trọng.Logo: Huy hiệu nhãn hiệu diskre và thời trang được đặt tinh tế trên ngực trái, thể hiện sự tinh tế và đẳng cấp', 0, 40),
(54, 'Áo Khoác Nam Flannel Tay Dài Khóa Kéo Kẻ Caro Form Regular - 10F23JAC002', 981.00, 'ao-khoac-nam-10f23jac002-black_2__1.jpg', 'Chất liệu: Áo khoác được làm từ vật liệu chống nước chất lượng cao, giúp bạn thoải mái đối mặt với mọi điều kiện thời tiết.Chi tiết độc đáo: Được trang trí bằng các đường may đối xứng và các chi tiết kim loại chất lượng, tạo điểm nhấn và sự cá tính cho chiếc áo khoác.\r\n\r\n', 0, 40),
(55, 'Áo Len Polo Nam Dệt Kim Tay Ngắn Cotton Phối Túi Form Boxy - 10F23KNI001', 569.00, 'ao-len-nam-10f23kni001-dark-sapphire-_1__2_jpg.webp', 'Chất liệu: Được làm từ vải cotton cao cấp, áo sơ mi này mang lại cảm giác mềm mại và thoải mái suốt cả ngày.Kiểu dáng: Với kiểu dáng Classic Fit, áo sơ mi này ôm vừa vặn nhưng không quá chật, tạo sự thoải mái và phong cách lịch lãm. Cổ áo button-down tạo điểm nhấn truyền thống và dễ phối hợp với nhiều phụ kiện khác nhau.', 0, 40),
(56, 'Quần Jean Nam Trơn Ống Ôm Form Slim Crop - 10S23DPA005', 589.00, 'quan-jean-nam-1010-10s23dpa005_tree_house_1__1_jpg.webp', 'Chất liệu: Được làm từ vải chino cao cấp, chiếc quần này mang lại cảm giác thoải mái và bền bỉ trong suốt cả ngày dài.Kiểu dáng: Với kiểu dáng Slim Fit, chiếc quần này ôm vừa vặn, tôn lên đường chân và tạo nên sự gọn gàng. Chất liệu co giãn nhẹ giúp tối ưu hóa sự thoải mái và sự linh hoạt.', 0, 34),
(57, 'Quần Jean Nam Trơn Form Slim - 10S23DPA012', 569.00, '10s23dpa012_l_indigo-quan-jean-nam_1__2_jpg.webp', 'Chất liệu: Được làm từ denim chất lượng cao, chiếc quần jeans này không chỉ bền bỉ mà còn mang lại cảm giác thoải mái và co giãn nhẹ.Kiểu dáng: Với kiểu dáng Slim Fit, chiếc quần này ôm vừa vặn, tôn lên đường chân và tạo nên sự gọn gàng. Form dáng hiện đại phù hợp với nhiều phong cách thời trang.', 0, 34),
(58, 'Black Friday 2023  ', 540.00, '10s23pca001_black-quan-kaki-nam_1__1_1_jpg.webp', 'Chất liệu: Được làm từ vải chino cao cấp, chiếc quần này mang lại cảm giác thoải mái và bền bỉ trong suốt cả ngày dài.Kiểu dáng: Với kiểu dáng Slim Fit, chiếc quần này ôm vừa vặn, tôn lên đường chân và tạo nên sự gọn gàng. Chất liệu co giãn nhẹ giúp tối ưu hóa sự thoải mái và sự linh hoạt.Màu sắc: Màu be đậm trung tính, dễ dàng phối hợp với nhiều loại áo và giày, phù hợp cho cả các dịp trang trí và lịch sự.', 0, 34),
(59, 'Quần Jean Nam Premium Trơn Co Giãn Form Slim - 10F22DPA025', 442.00, '10f22dpa025_-_m.indigo_2__2_jpg.webp', 'Chất liệu: Được làm từ vải chino cao cấp, chiếc quần này mang lại cảm giác thoải mái và bền bỉ trong suốt cả ngày dài.Chi tiết thiết kế: Được trang trí bằng các đường may tỉ mỉ và nút kim loại chất lượng, tạo nên sự sang trọng và sành điệu.', 0, 34),
(60, 'Quần Jean Nam Ống Rộng Trơn Form Straight Crop', 540.00, 'quan-jean-nam-1010-10f23dpa022_black_1__2.jpg', 'Với sự kết hợp giữa kiểu dáng thời trang và tính ứng dụng, chiếc quần jeans này là sự lựa chọn hoàn hảo cho phong cách cá nhân của bạn.Chất liệu: Được làm từ denim chất lượng cao, chiếc quần jeans này không chỉ bền bỉ mà còn mang lại cảm giác thoải mái và co giãn nhẹ.', 0, 34),
(61, 'GAPNón Nam - Logo', 550.00, '542693-04-1_xh21kgew1tdupvhl.webp', 'Chất liệu: Được làm từ vải chất lượng cao, chiếc mũ snapback này mang lại cảm giác thoải mái và bền bỉ. Viền mũ làm từ chất liệu cứng cáp giữ cho hình dáng snapback luôn ổn định.Kiểu dáng: Với kiểu dáng snapback, chiếc mũ này phổ biến trong giới trẻ và thể hiện sự phong cách đường phố urban. Nó có thể điều chỉnh phù hợp với nhiều kích thước đầu.', 0, 33),
(62, 'POLO RALPH LAURENDây Nịt Nam Reversible Dress Belt', 3.90, 'lifestyle_405727371005_p0ekxqmpk9bawwse.webp', 'Chất liệu: Được làm từ da bò tự nhiên chất lượng cao, chiếc thắt lưng này không chỉ mang lại vẻ ngoại hình sang trọng mà còn đảm bảo độ bền và sự linh hoạt.Màu sắc: Màu nâu vintage tạo nên vẻ cổ điển và dễ dàng phối hợp với nhiều loại trang phục khác nhau.', 0, 33),
(63, 'KARL LAGERFELDNón Nam', 2.21, '230m3404998_5_1.webp', 'Chất liệu: Được làm từ vải chất lượng cao, chiếc mũ snapback này mang lại cảm giác thoải mái và bền bỉ. Viền mũ làm từ chất liệu cứng cáp giữ cho hình dáng snapback luôn ổn định.', 0, 33),
(64, 'SUNNIES STUDIOSKính Mát Gọng Vuông Henrick Mantis F', 559.00, '60281-3-3-one_size.webp', 'Chất liệu: Gọng kính bằng kim loại chất lượng cao, nhẹ nhàng và bền bỉ. Tròng kính polarized bảo vệ tối ưu khỏi tác động của tia UV và ánh sáng chói.Kiểu dáng: Thiết kế aviator mang đến vẻ ngoại hình hiện đại và lịch lãm. Kích thước vừa vặn nhiều khuôn mặt, là sự kết hợp hoàn hảo giữa thoải mái và phong cách.', 0, 33),
(66, 'Áo Khoác Nam Cộc Tay Trơn Phối Túi Hộp Form Regular', 342.00, 'ao-khoac-nam-10s23jac001-black-_5__2_jpg.webp', 'Áo khoác cộc tay thường có kiểu dáng thoải mái, không rườm rà, tạo cảm giác nhẹ nhàng và linh hoạt cho người mặc.\r\nDáng áo có thể là dáng suông hoặc ôm nhẹ tùy thuộc vào thiết kế cụ thể.Chất liệu của áo khoác cộc tay thường là những loại vải thoáng khí như cotton, linen, hoặc các loại vải kỹ thuật cao giúp thoát mồ hôi và giữ cảm giác thoải mái.Áo khoác cộc tay thường được sử dụng trong những bối cảnh không quá trang trí, phù hợp cho các hoạt động ngoại ô, đi chơi, hoặc những dịp thoải mái.', 0, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `role` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dmsp_fk` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `dmsp_fk` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
