-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2023 lúc 09:52 PM
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
-- Cơ sở dữ liệu: `login_register`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(4, 'NGUYENTHANHBAC', 'nguyenthanhbac2003@gmail.com', '$2y$10$r.2bcq7RMcyNeJd73lLu/e2b1RB2gafabp1VkGCfoF5OVhvUSf9yW'),
(5, 'nguyen bac', 'nguyenthanhbac20092003@gmail.com', '$2y$10$9vwh4l9tKjKdYMTClmkclOSez4aJbPPHIqsvq.uRXBVvFAb21qBkG'),
(6, 'bacdeptrai', 'nguyenthanh2003@gmail.com', '$2y$10$npUbwpHrU8BxbVijoFuJhuyyV8FJDLsVFu8CPbBZPwNuomyqffXYm'),
(7, 'nguyenbac95', 'nguyenthanh1999@gmail.com', '$2y$10$lCwNWqmSJ6a3Ezj9.FZxh.gJdNTchcRM9Fz5kcP1wPfJq6EQ2EA6C'),
(8, 'nguye bac', 'nguyenthanh1699@gmail.com', '$2y$10$.F9uBUGgBPtDJ6o6jWt6LeP71zQJGQT52ggbiwmEqTfyhoSJqGjw.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
