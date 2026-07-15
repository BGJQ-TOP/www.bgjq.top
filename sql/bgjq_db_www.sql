-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2026-04-11 07:40:42
-- 服务器版本： 10.5.29-MariaDB-0+deb11u1
-- PHP 版本： 8.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `bgjq_db_www`
--

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_announcements`
--

CREATE TABLE `bgjq_announcements` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文标题',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文标题',
  `seo_keywords_zh` varchar(300) DEFAULT NULL COMMENT '中文SEO关键词',
  `seo_keywords_en` varchar(300) DEFAULT NULL COMMENT '英文SEO关键词',
  `seo_description_zh` text DEFAULT NULL COMMENT '中文SEO描述',
  `seo_description_en` text DEFAULT NULL COMMENT '英文SEO描述',
  `content_zh` longtext DEFAULT NULL COMMENT '中文正文',
  `content_en` longtext DEFAULT NULL COMMENT '英文正文',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `announcement_type` varchar(20) DEFAULT 'news' COMMENT '类型: news/activity/update',
  `is_top` tinyint(1) DEFAULT 0 COMMENT '是否置顶',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='公告双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_creators`
--

CREATE TABLE `bgjq_creators` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `username` varchar(100) NOT NULL COMMENT '用户名',
  `display_name_zh` varchar(100) DEFAULT NULL COMMENT '中文显示名',
  `display_name_en` varchar(100) DEFAULT NULL COMMENT '英文显示名',
  `bio_zh` text DEFAULT NULL COMMENT '中文简介',
  `bio_en` text DEFAULT NULL COMMENT '英文简介',
  `avatar` varchar(500) DEFAULT NULL COMMENT '头像',
  `social_links` text DEFAULT NULL COMMENT '社交链接(JSON)',
  `level` tinyint(1) DEFAULT 1 COMMENT '创作者等级',
  `total_views` int(11) DEFAULT 0 COMMENT '总浏览量',
  `total_likes` int(11) DEFAULT 0 COMMENT '总点赞量',
  `total_works` int(11) DEFAULT 0 COMMENT '作品数量',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `verify_status` tinyint(1) DEFAULT 0 COMMENT '认证状态: 0未认证 1已认证',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '注册时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='创作者信息双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_fan_works`
--

CREATE TABLE `bgjq_fan_works` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文标题',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文标题',
  `work_type` varchar(20) DEFAULT NULL COMMENT '作品类型: art/writing/comic',
  `content_zh` longtext DEFAULT NULL COMMENT '中文正文/描述',
  `content_en` longtext DEFAULT NULL COMMENT '英文正文/描述',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `images` text DEFAULT NULL COMMENT '图片列表(JSON)',
  `creator_id` int(11) DEFAULT NULL COMMENT '创作者ID',
  `tags_zh` varchar(500) DEFAULT NULL COMMENT '中文标签',
  `tags_en` varchar(500) DEFAULT NULL COMMENT '英文标签',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待审核 1已发布 2已驳回 3已下架',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `like_count` int(11) DEFAULT 0 COMMENT '点赞量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='同人作品双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_indexnow_log`
--

CREATE TABLE `bgjq_indexnow_log` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL COMMENT '提交URL',
  `url_md5` varchar(32) NOT NULL COMMENT 'URL MD5',
  `language` varchar(10) NOT NULL COMMENT '语言: zh/en',
  `content_type` varchar(50) DEFAULT NULL COMMENT '内容类型',
  `content_id` int(11) DEFAULT NULL COMMENT '内容ID',
  `response_status` int(11) DEFAULT NULL COMMENT '响应状态码',
  `response_message` varchar(500) DEFAULT NULL COMMENT '响应消息',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待提交 1成功 2失败',
  `submit_time` datetime DEFAULT NULL COMMENT '提交时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='IndexNow提交记录表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_music`
--

CREATE TABLE `bgjq_music` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文作品名',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文作品名',
  `seo_keywords_zh` varchar(300) DEFAULT NULL COMMENT '中文SEO关键词',
  `seo_keywords_en` varchar(300) DEFAULT NULL COMMENT '英文SEO关键词',
  `seo_description_zh` text DEFAULT NULL COMMENT '中文SEO描述',
  `seo_description_en` text DEFAULT NULL COMMENT '英文SEO描述',
  `creator_id` int(11) DEFAULT NULL COMMENT '创作者ID',
  `creator_name` varchar(100) DEFAULT NULL COMMENT '创作者名称',
  `music_url` varchar(500) DEFAULT NULL COMMENT '音频文件地址',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '作品封面',
  `duration` int(11) DEFAULT 0 COMMENT '时长(秒)',
  `lyrics_zh` text DEFAULT NULL COMMENT '中文歌词',
  `lyrics_en` text DEFAULT NULL COMMENT '英文歌词',
  `introduction_zh` text DEFAULT NULL COMMENT '中文创作背景',
  `introduction_en` text DEFAULT NULL COMMENT '英文创作背景',
  `album_id` int(11) DEFAULT NULL COMMENT '专辑ID',
  `tags_zh` varchar(500) DEFAULT NULL COMMENT '中文标签',
  `tags_en` varchar(500) DEFAULT NULL COMMENT '英文标签',
  `category` varchar(50) DEFAULT 'original' COMMENT '分类: original/official/fan',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待审核 1已发布 2已驳回 3已下架',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `play_count` int(11) DEFAULT 0 COMMENT '播放量',
  `like_count` int(11) DEFAULT 0 COMMENT '点赞量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='音乐作品双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_music_album`
--

CREATE TABLE `bgjq_music_album` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文专辑名',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文专辑名',
  `description_zh` text DEFAULT NULL COMMENT '中文简介',
  `description_en` text DEFAULT NULL COMMENT '英文简介',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `creator_id` int(11) DEFAULT NULL COMMENT '创作者ID',
  `tags_zh` varchar(500) DEFAULT NULL COMMENT '中文标签',
  `tags_en` varchar(500) DEFAULT NULL COMMENT '英文标签',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='音乐专辑双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_nations`
--

CREATE TABLE `bgjq_nations` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL COMMENT '邦国slug',
  `name_zh` varchar(100) DEFAULT NULL COMMENT '中文名',
  `name_en` varchar(100) DEFAULT NULL COMMENT '英文名',
  `flag_image` varchar(500) DEFAULT NULL COMMENT '旗帜图片',
  `emblem_image` varchar(500) DEFAULT NULL COMMENT '徽章图片',
  `seo_description_zh` text DEFAULT NULL COMMENT '中文SEO描述',
  `seo_description_en` text DEFAULT NULL COMMENT '英文SEO描述',
  `history_zh` longtext DEFAULT NULL COMMENT '中文历史',
  `history_en` longtext DEFAULT NULL COMMENT '英文历史',
  `culture_zh` text DEFAULT NULL COMMENT '中文文化',
  `culture_en` text DEFAULT NULL COMMENT '英文文化',
  `diplomacy_zh` text DEFAULT NULL COMMENT '中文外交立场',
  `diplomacy_en` text DEFAULT NULL COMMENT '英文外交立场',
  `leader` varchar(100) DEFAULT NULL COMMENT '领导者',
  `founded_date` varchar(50) DEFAULT NULL COMMENT '建国日期',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `is_featured` tinyint(1) DEFAULT 0 COMMENT '是否精选',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国势力设定表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_video`
--

CREATE TABLE `bgjq_video` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文标题',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文标题',
  `seo_keywords_zh` varchar(300) DEFAULT NULL COMMENT '中文SEO关键词',
  `seo_keywords_en` varchar(300) DEFAULT NULL COMMENT '英文SEO关键词',
  `seo_description_zh` text DEFAULT NULL COMMENT '中文SEO描述',
  `seo_description_en` text DEFAULT NULL COMMENT '英文SEO描述',
  `creator_id` int(11) DEFAULT NULL COMMENT '创作者ID',
  `creator_name` varchar(100) DEFAULT NULL COMMENT '创作者名称',
  `video_platform` varchar(20) DEFAULT NULL COMMENT '视频平台: youtube/bilibili',
  `video_id` varchar(100) DEFAULT NULL COMMENT '视频ID',
  `video_url` varchar(500) DEFAULT NULL COMMENT '视频地址',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `duration` int(11) DEFAULT 0 COMMENT '时长(秒)',
  `introduction_zh` text DEFAULT NULL COMMENT '中文简介',
  `introduction_en` text DEFAULT NULL COMMENT '英文简介',
  `tags_zh` varchar(500) DEFAULT NULL COMMENT '中文标签',
  `tags_en` varchar(500) DEFAULT NULL COMMENT '英文标签',
  `category` varchar(50) DEFAULT 'fan' COMMENT '分类: official/tutorial/gameplay/fan',
  `collection_id` int(11) DEFAULT NULL COMMENT '合集ID',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待审核 1已发布 2已驳回 3已下架',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `view_count` int(11) DEFAULT 0 COMMENT '播放量',
  `like_count` int(11) DEFAULT 0 COMMENT '点赞量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='视频作品双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_video_collection`
--

CREATE TABLE `bgjq_video_collection` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文合集名',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文合集名',
  `description_zh` text DEFAULT NULL COMMENT '中文简介',
  `description_en` text DEFAULT NULL COMMENT '英文简介',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `creator_id` int(11) DEFAULT NULL COMMENT '创作者ID',
  `tags_zh` varchar(500) DEFAULT NULL COMMENT '中文标签',
  `tags_en` varchar(500) DEFAULT NULL COMMENT '英文标签',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='视频合集双语表';

-- --------------------------------------------------------

--
-- 表的结构 `bgjq_worldview`
--

CREATE TABLE `bgjq_worldview` (
  `id` int(11) NOT NULL,
  `title_zh` varchar(200) DEFAULT NULL COMMENT '中文标题',
  `title_en` varchar(200) DEFAULT NULL COMMENT '英文标题',
  `seo_keywords_zh` varchar(300) DEFAULT NULL COMMENT '中文SEO关键词',
  `seo_keywords_en` varchar(300) DEFAULT NULL COMMENT '英文SEO关键词',
  `seo_description_zh` text DEFAULT NULL COMMENT '中文SEO描述',
  `seo_description_en` text DEFAULT NULL COMMENT '英文SEO描述',
  `content_type` varchar(50) DEFAULT NULL COMMENT '内容类型: chronicle/nation/term/story',
  `content_zh` longtext DEFAULT NULL COMMENT '中文正文',
  `content_en` longtext DEFAULT NULL COMMENT '英文正文',
  `cover_image` varchar(500) DEFAULT NULL COMMENT '封面图',
  `author` varchar(100) DEFAULT NULL COMMENT '作者',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0草稿 1已发布 2已下架',
  `is_top` tinyint(1) DEFAULT 0 COMMENT '是否置顶',
  `indexnow_status_zh` tinyint(1) DEFAULT 0 COMMENT '中文IndexNow状态',
  `indexnow_status_en` tinyint(1) DEFAULT 0 COMMENT '英文IndexNow状态',
  `view_count` int(11) DEFAULT 0 COMMENT '浏览量',
  `publish_time` datetime DEFAULT NULL COMMENT '发布时间',
  `update_time` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `create_time` datetime DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='IP世界观双语内容表';

--
-- 转储表的索引
--

--
-- 表的索引 `bgjq_announcements`
--
ALTER TABLE `bgjq_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_announcement_type` (`announcement_type`),
  ADD KEY `idx_status` (`status`);

--
-- 表的索引 `bgjq_creators`
--
ALTER TABLE `bgjq_creators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_username` (`username`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- 表的索引 `bgjq_fan_works`
--
ALTER TABLE `bgjq_fan_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_creator_id` (`creator_id`),
  ADD KEY `idx_work_type` (`work_type`),
  ADD KEY `idx_status` (`status`);

--
-- 表的索引 `bgjq_indexnow_log`
--
ALTER TABLE `bgjq_indexnow_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_url_md5` (`url_md5`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_status` (`status`);

--
-- 表的索引 `bgjq_music`
--
ALTER TABLE `bgjq_music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_creator_id` (`creator_id`),
  ADD KEY `idx_album_id` (`album_id`),
  ADD KEY `idx_status` (`status`);

--
-- 表的索引 `bgjq_music_album`
--
ALTER TABLE `bgjq_music_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_creator_id` (`creator_id`);

--
-- 表的索引 `bgjq_nations`
--
ALTER TABLE `bgjq_nations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_slug` (`slug`);

--
-- 表的索引 `bgjq_video`
--
ALTER TABLE `bgjq_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_creator_id` (`creator_id`),
  ADD KEY `idx_collection_id` (`collection_id`),
  ADD KEY `idx_status` (`status`);

--
-- 表的索引 `bgjq_video_collection`
--
ALTER TABLE `bgjq_video_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_creator_id` (`creator_id`);

--
-- 表的索引 `bgjq_worldview`
--
ALTER TABLE `bgjq_worldview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_content_type` (`content_type`),
  ADD KEY `idx_status` (`status`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bgjq_announcements`
--
ALTER TABLE `bgjq_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_creators`
--
ALTER TABLE `bgjq_creators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_fan_works`
--
ALTER TABLE `bgjq_fan_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_indexnow_log`
--
ALTER TABLE `bgjq_indexnow_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_music`
--
ALTER TABLE `bgjq_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_music_album`
--
ALTER TABLE `bgjq_music_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_nations`
--
ALTER TABLE `bgjq_nations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_video`
--
ALTER TABLE `bgjq_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_video_collection`
--
ALTER TABLE `bgjq_video_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bgjq_worldview`
--
ALTER TABLE `bgjq_worldview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
