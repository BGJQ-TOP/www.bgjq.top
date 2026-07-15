-- =====================================================
-- 邦国文库数据库初始化脚本
-- 表前缀: bgjq_
-- 数据库: bgjq_db_www
-- =====================================================

-- 清空旧数据（如果已存在）
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE bgjq_worldview_contents;
TRUNCATE TABLE bgjq_worldview_documents;
TRUNCATE TABLE bgjq_worldview_volumes;
TRUNCATE TABLE bgjq_worldview_preface;
SET FOREIGN_KEY_CHECKS = 1;

-- 卷表
CREATE TABLE IF NOT EXISTS `bgjq_worldview_volumes` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '卷ID',
    `title` VARCHAR(100) NOT NULL COMMENT '卷标题',
    `description` VARCHAR(255) DEFAULT '' COMMENT '卷描述',
    `path` VARCHAR(100) NOT NULL COMMENT '卷目录路径',
    `sort_order` INT DEFAULT 0 COMMENT '排序',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='邦国文库卷目';

-- 文档表
CREATE TABLE IF NOT EXISTS `bgjq_worldview_documents` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '文档ID',
    `volume_id` VARCHAR(50) NOT NULL COMMENT '所属卷ID',
    `title` VARCHAR(100) NOT NULL COMMENT '文档标题',
    `file` VARCHAR(100) NOT NULL COMMENT '文件名',
    `sort_order` INT DEFAULT 0 COMMENT '排序',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`volume_id`) REFERENCES `bgjq_worldview_volumes`(`id`) ON DELETE CASCADE,
    INDEX `idx_volume_id` (`volume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='邦国文库文档';

-- 内容缓存表
CREATE TABLE IF NOT EXISTS `bgjq_worldview_contents` (
    `id` VARCHAR(50) NOT NULL PRIMARY KEY COMMENT '文档ID',
    `volume_id` VARCHAR(50) NOT NULL COMMENT '所属卷ID',
    `raw_content` LONGTEXT COMMENT '原始Markdown内容',
    `html_content` LONGTEXT COMMENT '解析后的HTML内容',
    `title` VARCHAR(100) DEFAULT '' COMMENT '提取的标题',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`id`) REFERENCES `bgjq_worldview_documents`(`id`) ON DELETE CASCADE,
    INDEX `idx_volume_id` (`volume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='邦国文库内容缓存';

-- 序言表
CREATE TABLE IF NOT EXISTS `bgjq_worldview_preface` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) DEFAULT '序言' COMMENT '标题',
    `raw_content` LONGTEXT COMMENT '原始Markdown内容',
    `html_content` LONGTEXT COMMENT '解析后的HTML内容',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='邦国文库序言';

-- =====================================================
-- 初始化数据
-- =====================================================

-- 插入卷数据
INSERT INTO `bgjq_worldview_volumes` (`id`, `title`, `description`, `path`, `sort_order`) VALUES
('vol1', '卷一·新世记', '一周目历史，各邦国势力竞相崛起。', '卷一-新世记', 1),
('vol2', '卷二·旧世记', '零周目历史，一周目之先声。', '卷二-旧世记', 2),
('vol3', '卷三·刊物志', '玩家创办之刊物记录。', '卷三-刊物志', 3),
('vol4', '卷四·轶事志', '服务器奇闻轶事。', '卷四-轶事志', 4),
('appendix', '附录', '大事年表与友链。', '附录', 5);

-- 插入文档数据
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
