-- =====================================================
-- 邦国崛起IP全球化主站 - 投稿功能数据表
-- =====================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- 音乐投稿表
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='音乐投稿表';

-- ----------------------------
-- 视频投稿表
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='视频投稿表';

-- ----------------------------
-- 投稿审核权限表
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='投稿审核权限表';

SET FOREIGN_KEY_CHECKS = 1;

SELECT 'Submission tables created successfully!' AS result;
