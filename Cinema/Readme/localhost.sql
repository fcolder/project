-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-09-26 16:15:50
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cinema`
--
CREATE DATABASE IF NOT EXISTS `cinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cinema`;

-- --------------------------------------------------------

--
-- 表的结构 `ad`
--

CREATE TABLE `ad` (
  `id` tinyint(4) NOT NULL COMMENT 'ID',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `show` tinyint(4) NOT NULL COMMENT '是否显示（1,0）',
  `url` varchar(255) NOT NULL COMMENT '链接地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告图';

--
-- 转存表中的数据 `ad`
--

INSERT INTO `ad` (`id`, `img`, `show`, `url`) VALUES
(1, 'ddfdffdfdf', 1, 'dsdsds');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `pwd` varchar(32) NOT NULL COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `email`, `pwd`) VALUES
(1, '1874341264@qq.com', '202cb962ac59075b964b07152d234b70'),
(2, '123@qq.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL COMMENT 'ID（主键、序号）',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `number` tinyint(4) NOT NULL COMMENT '人数',
  `phone` varchar(11) NOT NULL COMMENT '电话号码',
  `date` date NOT NULL COMMENT '日期',
  `email` varchar(50) NOT NULL COMMENT '电子邮箱',
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '留言内容',
  `time` time NOT NULL COMMENT '时间',
  `state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态（0未确定1确定）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线预订';

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`id`, `name`, `number`, `phone`, `date`, `email`, `message`, `time`, `state`) VALUES
(17, '自行车', 23, '12345678910', '2019-09-15', '123@qq.com', '123425', '17:06:08', 0),
(20, '蔡徐坤', 1, '12345687910', '2019-09-26', '123@qq.com', '1', '14:16:51', 0),
(5, '自行车', 2, '12345678910', '2019-09-20', '123@qq.com', '2', '17:06:08', 1),
(8, '自行车', 23, '12345678910', '2019-09-17', '123@qq.com', '123425', '17:06:08', 1),
(21, '蔡徐坤', 1, '12345687910', '2019-09-27', '123@qq.com', '1', '14:17:03', 0),
(22, '蔡徐坤', 1, '12345687910', '2019-09-28', '123@qq.com', '1', '14:17:03', 1),
(23, '自行车', 1, '12345678901', '2019-09-24', '123@qq.com', '123', '15:40:12', 0);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL COMMENT 'ID（主键、序号）',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `time` date NOT NULL COMMENT '发布时间',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `type` set('动漫资讯','电影资讯','电影站') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '类型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='美食资讯';

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `time`, `img`, `type`) VALUES
(14, '哪吒之魔童降世', '震惊，哪吒居不去闹海了，居然去。。。', '2019-09-24', '/upload/201909242238306163.jpg', '动漫资讯'),
(15, '千与千寻', '人与鬼不得不说的故事', '2019-09-24', '/upload/201909242238537105.jpg', '动漫资讯'),
(16, '这是标题', '这是内容', '2019-09-24', '/upload/201909242239189371.jpg', '动漫资讯'),
(17, '速度与基情', '一集砸好几部豪车的电影，你确定不看？', '2019-09-24', '/upload/201909242239566004.jpg', '电影资讯'),
(18, '这是标题2', '想不出内容', '2019-09-24', '/upload/201909242240203935.jpg', '电影资讯'),
(19, '这是标题3', '这是内容', '2019-09-24', '/upload/201909242256579150.jpg', '电影资讯'),
(20, '虽然这是电影站', '但是这里没电影', '2019-09-24', '/upload/201909242241331848.jpg', '电影站'),
(21, '你往下拉也没有', '好吧！', '2019-09-24', '/upload/201909242242003169.jpg', '电影站'),
(22, '死心吧，真的没了', '这是内容', '2019-09-24', '/upload/201909242242216303.jpg', '电影站');

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL COMMENT 'ID（主键、序号）',
  `type` set('动漫','电影','综艺','电视剧') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '种类',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `cn_name` varchar(50) NOT NULL COMMENT '中文名称',
  `price` decimal(7,1) NOT NULL COMMENT '价格'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='菜式表';

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`id`, `type`, `img`, `cn_name`, `price`) VALUES
(17, '动漫', '/upload/1.jpg', '哪吒', '199.0'),
(18, '电影', '/upload/5.jpg', '那些女人', '199.0'),
(19, '动漫', '/upload/12.jpg', '千与千寻', '99.0'),
(21, '电影', '/upload/10.jpg', '速度与激情', '299.0'),
(22, '电影', '/upload/8.jpg', '使徒行者', '198.0'),
(23, '综艺', '/upload/6.jpg', 'CXK', '299.0'),
(24, '综艺', '/upload/9.jpg', 'WYF', '199.0'),
(25, '综艺', '/upload/14.jpg', '盗梦空间', '123.0'),
(26, '电视剧', '/upload/13.jpg', '我不是药神', '666.0'),
(27, '电视剧', '/upload/4.jpg', '我不知道什么影片', '233.0'),
(28, '电视剧', '/upload/3.jpg', '不起名了', '199.0'),
(31, '动漫', '/upload/15.jpg', '你的名字', '199.0');

--
-- 转储表的索引
--

--
-- 表的索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ad`
--
ALTER TABLE `ad`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID（主键、序号）', AUTO_INCREMENT=24;

--
-- 使用表AUTO_INCREMENT `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID（主键、序号）', AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID（主键、序号）', AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
