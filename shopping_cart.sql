-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-08-11 16:07:00
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shopping_cart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member_account`
--

CREATE TABLE `member_account` (
  `member_id` char(15) NOT NULL DEFAULT '' COMMENT '帳號',
  `password` char(15) NOT NULL DEFAULT '' COMMENT '密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member_account`
--

INSERT INTO `member_account` (`member_id`, `password`) VALUES
('LLK', '888'),
('qq', '456'),
('test', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `selling_product`
--

CREATE TABLE `selling_product` (
  `p_id` int(11) UNSIGNED NOT NULL COMMENT '商品編號',
  `p_name` varchar(20) NOT NULL DEFAULT '' COMMENT '商品名稱',
  `p_price` int(11) NOT NULL DEFAULT '0' COMMENT '商品價格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `selling_product`
--

INSERT INTO `selling_product` (`p_id`, `p_name`, `p_price`) VALUES
(1, 'anello--熱賣商品', 390),
(2, '時尚百搭多功能防盜背包', 590),
(3, '多口袋手提後背兩用包', 490);

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(10) UNSIGNED NOT NULL COMMENT '交易編號',
  `member_id` char(15) NOT NULL DEFAULT '' COMMENT '會員帳號',
  `p_id` int(10) UNSIGNED NOT NULL COMMENT '商品編號',
  `howmany` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '購買數量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `transaction`
--

INSERT INTO `transaction` (`t_id`, `member_id`, `p_id`, `howmany`) VALUES
(1, 'test', 1, 100),
(2, 'test', 1, 89),
(3, 'test', 1, 55),
(4, 'test', 1, 55),
(5, 'test', 1, 55),
(7, 'qq', 1, 39),
(8, 'qq', 1, 66),
(9, 'qq', 1, 7),
(14, 'test', 1, 25),
(15, 'test', 1, 25),
(16, 'test', 1, 400),
(17, 'test', 1, 32),
(18, 'test', 1, 98),
(19, 'test', 1, 10),
(20, 'test', 2, 20),
(21, 'test', 1, 86),
(22, 'test', 2, 85),
(23, 'test', 3, 84),
(24, 'qq', 1, 11),
(25, 'qq', 2, 12),
(26, 'qq', 3, 13),
(27, 'qq', 1, 0),
(28, 'qq', 2, 90),
(29, 'qq', 3, 100),
(30, 'LLK', 1, 1),
(31, 'LLK', 2, 2),
(32, 'LLK', 3, 2);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `member_account`
--
ALTER TABLE `member_account`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `selling_product`
--
ALTER TABLE `selling_product`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `FK_mid` (`member_id`),
  ADD KEY `FK_pid` (`p_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `selling_product`
--
ALTER TABLE `selling_product`
  MODIFY `p_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品編號', AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '交易編號', AUTO_INCREMENT=33;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_mid` FOREIGN KEY (`member_id`) REFERENCES `member_account` (`member_id`),
  ADD CONSTRAINT `FK_pid` FOREIGN KEY (`p_id`) REFERENCES `selling_product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
