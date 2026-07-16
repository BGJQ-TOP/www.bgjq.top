-- ============================================================
-- 邦国崛起 IP 全球化主站 - 数据库初始化脚本
-- 数据库: bgjq_db_www
-- 版本: 2.0.0 (合并版)
-- 生成日期: 2026-07-15
-- 
-- 合并来源:
--   sql/database.sql          - 10 个核心双语表
--   sql/submissions.sql       - 3 个投稿功能表
--   database/worldview_init.sql - 4 个文库表 + 种子数据
-- ============================================================

-- ------------------------------------------------------------
-- 第一部分：建库、建用户、授权
-- ------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `bgjq_db_www`
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;

-- 创建数据库用户（密码请与 .env 中 DB_PASSWORD 保持一致）
CREATE USER IF NOT EXISTS 'bgjqwww'@'localhost' IDENTIFIED BY 'BGJQ1314www!';

-- 授权
GRANT ALL PRIVILEGES ON `bgjq_db_www`.* TO 'bgjqwww'@'localhost';
FLUSH PRIVILEGES;

USE `bgjq_db_www`;

-- ------------------------------------------------------------
-- 第二部分：核心双语表（10 个）
-- ------------------------------------------------------------

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1. 音乐作品双语表
DROP TABLE IF EXISTS `bgjq_music`;
CREATE TABLE `bgjq_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_creator_id` (`creator_id`),
  KEY `idx_album_id` (`album_id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='音乐作品双语表';

-- 2. 视频作品双语表
DROP TABLE IF EXISTS `bgjq_video`;
CREATE TABLE `bgjq_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_creator_id` (`creator_id`),
  KEY `idx_collection_id` (`collection_id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='视频作品双语表';

-- 3. IP世界观双语内容表
DROP TABLE IF EXISTS `bgjq_worldview`;
CREATE TABLE `bgjq_worldview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_content_type` (`content_type`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='IP世界观双语内容表';

-- 4. 邦国/势力设定表
DROP TABLE IF EXISTS `bgjq_nations`;
CREATE TABLE `bgjq_nations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国势力设定表';

-- 5. 公告双语表
DROP TABLE IF EXISTS `bgjq_announcements`;
CREATE TABLE `bgjq_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_announcement_type` (`announcement_type`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='公告双语表';

-- 6. 创作者信息双语表
DROP TABLE IF EXISTS `bgjq_creators`;
CREATE TABLE `bgjq_creators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='创作者信息双语表';

-- 7. 音乐专辑双语表
DROP TABLE IF EXISTS `bgjq_music_album`;
CREATE TABLE `bgjq_music_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_creator_id` (`creator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='音乐专辑双语表';

-- 8. 视频合集双语表
DROP TABLE IF EXISTS `bgjq_video_collection`;
CREATE TABLE `bgjq_video_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_creator_id` (`creator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='视频合集双语表';

-- 9. 同人作品双语表
DROP TABLE IF EXISTS `bgjq_fan_works`;
CREATE TABLE `bgjq_fan_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_creator_id` (`creator_id`),
  KEY `idx_work_type` (`work_type`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='同人作品双语表';

-- 10. IndexNow提交记录表
DROP TABLE IF EXISTS `bgjq_indexnow_log`;
CREATE TABLE `bgjq_indexnow_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL COMMENT '提交URL',
  `url_md5` varchar(32) NOT NULL COMMENT 'URL MD5',
  `language` varchar(10) NOT NULL COMMENT '语言: zh/en',
  `content_type` varchar(50) DEFAULT NULL COMMENT '内容类型',
  `content_id` int(11) DEFAULT NULL COMMENT '内容ID',
  `response_status` int(11) DEFAULT NULL COMMENT '响应状态码',
  `response_message` varchar(500) DEFAULT NULL COMMENT '响应消息',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待提交 1成功 2失败',
  `submit_time` datetime DEFAULT NULL COMMENT '提交时间',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_url_md5` (`url_md5`),
  KEY `idx_language` (`language`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='IndexNow提交记录表';

-- ------------------------------------------------------------
-- 第三部分：投稿功能表（3 个）
-- ------------------------------------------------------------

-- 11. 音乐投稿表
DROP TABLE IF EXISTS `bgjq_music_submission`;
CREATE TABLE `bgjq_music_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL COMMENT '作者名称',
  `author_email` varchar(100) NOT NULL COMMENT '作者邮箱',
  `author_phone` varchar(20) DEFAULT NULL COMMENT '作者电话',
  `music_file` varchar(500) NOT NULL COMMENT '音乐文件路径',
  `music_title` varchar(200) DEFAULT NULL COMMENT '音乐标题',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待审核 1已通过 2已拒绝',
  `reviewer_id` int(11) DEFAULT NULL COMMENT '审核员ID',
  `review_note` text DEFAULT NULL COMMENT '审核备注',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '投稿时间',
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='音乐投稿表';

-- 12. 视频投稿表
DROP TABLE IF EXISTS `bgjq_video_submission`;
CREATE TABLE `bgjq_video_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL COMMENT '作者名称',
  `author_email` varchar(100) NOT NULL COMMENT '作者邮箱',
  `author_phone` varchar(20) DEFAULT NULL COMMENT '作者电话',
  `video_file` varchar(500) NOT NULL COMMENT '视频文件路径',
  `video_title` varchar(200) DEFAULT NULL COMMENT '视频标题',
  `status` tinyint(1) DEFAULT 0 COMMENT '状态: 0待审核 1已通过 2已拒绝',
  `reviewer_id` int(11) DEFAULT NULL COMMENT '审核员ID',
  `review_note` text DEFAULT NULL COMMENT '审核备注',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '投稿时间',
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='视频投稿表';

-- 13. 投稿审核权限表
DROP TABLE IF EXISTS `bgjq_submission_reviewers`;
CREATE TABLE `bgjq_submission_reviewers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgjq_user_id` int(11) NOT NULL COMMENT 'bgjq数据库用户ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `can_review_music` tinyint(1) DEFAULT 1 COMMENT '是否可以审核音乐',
  `can_review_video` tinyint(1) DEFAULT 1 COMMENT '是否可以审核视频',
  `status` tinyint(1) DEFAULT 1 COMMENT '状态: 0禁用 1启用',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_bgjq_user_id` (`bgjq_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='投稿审核权限表';

-- ------------------------------------------------------------
-- 第四部分：邦国文库表（4 个）+ 种子数据
-- ------------------------------------------------------------

-- 14. 卷目表
DROP TABLE IF EXISTS `bgjq_worldview_volumes`;
CREATE TABLE `bgjq_worldview_volumes` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '卷ID',
    `title` VARCHAR(100) NOT NULL COMMENT '卷标题',
    `description` VARCHAR(255) DEFAULT '' COMMENT '卷描述',
    `path` VARCHAR(100) NOT NULL COMMENT '卷目录路径',
    `sort_order` INT DEFAULT 0 COMMENT '排序',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国文库卷目';

-- 15. 文档表
DROP TABLE IF EXISTS `bgjq_worldview_documents`;
CREATE TABLE `bgjq_worldview_documents` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '文档ID',
    `volume_id` VARCHAR(50) NOT NULL COMMENT '所属卷ID',
    `title` VARCHAR(100) NOT NULL COMMENT '文档标题',
    `file` VARCHAR(100) NOT NULL COMMENT '文件名',
    `sort_order` INT DEFAULT 0 COMMENT '排序',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`volume_id`) REFERENCES `bgjq_worldview_volumes`(`id`) ON DELETE CASCADE,
    INDEX `idx_volume_id` (`volume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国文库文档';

-- 16. 内容缓存表
DROP TABLE IF EXISTS `bgjq_worldview_contents`;
CREATE TABLE `bgjq_worldview_contents` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '文档ID',
    `volume_id` VARCHAR(50) NOT NULL COMMENT '所属卷ID',
    `raw_content` LONGTEXT COMMENT '原始Markdown内容',
    `html_content` LONGTEXT COMMENT '解析后的HTML内容',
    `title` VARCHAR(100) DEFAULT '' COMMENT '提取的标题',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`id`) REFERENCES `bgjq_worldview_documents`(`id`) ON DELETE CASCADE,
    INDEX `idx_volume_id` (`volume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国文库内容缓存';

-- 17. 序言表
DROP TABLE IF EXISTS `bgjq_worldview_preface`;
CREATE TABLE `bgjq_worldview_preface` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) DEFAULT '序言' COMMENT '标题',
    `raw_content` LONGTEXT COMMENT '原始Markdown内容',
    `html_content` LONGTEXT COMMENT '解析后的HTML内容',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='邦国文库序言';

-- ------------------------------------------------------------
-- 种子数据：邦国文库卷目与文档
-- ------------------------------------------------------------

INSERT INTO `bgjq_worldview_volumes` (`id`, `title`, `description`, `path`, `sort_order`) VALUES
('vol1', '卷一·新世记', '一周目历史，各邦国势力竞相崛起。', '卷一-新世记', 1),
('vol2', '卷二·旧世记', '零周目历史，一周目之先声。', '卷二-旧世记', 2),
('vol3', '卷三·刊物志', '玩家创办之刊物记录。', '卷三-刊物志', 3),
('vol4', '卷四·轶事志', '服务器奇闻轶事。', '卷四-轶事志', 4),
('appendix', '附录', '大事年表与友链。', '附录', 5);

INSERT INTO `bgjq_worldview_documents` (`id`, `volume_id`, `title`, `file`, `sort_order`) VALUES
-- 卷一
('frankweiya', 'vol1', '法兰维亚帝国', '法兰维亚帝国.md', 1),
('naruto', 'vol1', '幻影忍者王国', '幻影忍者王国.md', 2),
('nishi', 'vol1', '逆熵', '逆熵.md', 3),
('lamanqia', 'vol1', '拉曼却公国', '拉曼却公国.md', 4),
('liangshan', 'vol1', '梁山泊国', '梁山泊国.md', 5),
('fujian', 'vol1', '伏见稻荷狐域', '伏见稻荷狐域.md', 6),
('bod', 'vol1', 'Blood of Death', 'Blood of Death.md', 7),
-- 卷二
('ling', 'vol2', '零周目概略', '零周目概略.md', 1),
-- 卷三
('goujiao', 'vol3', '狗叫时报', '狗叫时报.md', 1),
('babil', 'vol3', '巴别塔通讯社', '巴别塔通讯社.md', 2),
('qi_e', 'vol3', '企鹅快讯', '企鹅快讯.md', 3),
('zhenli', 'vol3', '真理报', '真理报.md', 4),
-- 卷四
('nixtian', 'vol4', '逆天墙', '逆天墙.md', 1),
('zuiren', 'vol4', '罪人特辑', '罪人特辑.md', 2),
('shenren', 'vol4', '神人大全', '神人大全.md', 3),
-- 附录
('dashiji', 'appendix', '大事年表', '大事年表.md', 1),
('youlian', 'appendix', '友链', '友链.md', 2);

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- 初始化完成
-- ============================================================
SELECT 'Database bgjq_db_www initialized successfully!' AS result;