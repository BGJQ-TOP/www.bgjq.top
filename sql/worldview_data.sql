-- =====================================================
-- 邦国文库 - 世界观内容数据回填
-- 数据来源：https://github.com/BGJQ-TOP/Archives
-- 使用方式：mysql -u root -p bgjq_db_www < sql/worldview_data.sql
-- =====================================================

-- 序言
INSERT INTO `bgjq_worldview_preface` (`id`, `title`, `raw_content`) VALUES
(1, '序言', '# 序言\n\n> 忆往昔，残酷不再。看未来，何人叱咤？\n\n本史书系列文档是对Minecraft邦国崛起服务器发生过的大事小情的记录。本文档采用国别体编撰，按邦国势力分别记述其兴衰变迁。\n\n本文档完全为玩家自发创作，与bugjump、simpfun等主体无关。编辑人员鱼龙混杂，在此感谢他们的切实记录亦或胡编乱造。\n\n> 注：史书有云系列文档已宣布暂停主线更新，但仍保留玩家无限编辑的权力。\n\n---\n\n## 编撰说明\n\n### 史书结构\n\n本文库分为四卷：\n\n- **卷一·新世记**：记载一周目各邦国势力之兴衰\n- **卷二·旧世记**：记载零周目之历史\n- **卷三·刊物志**：记载玩家创办之各类刊物\n- **卷四·轶事志**：记载服务器中之奇闻轶事\n\n### 编撰原则\n\n编撰人员务必**公正、客观、真实**。\n\n请文档编辑人员编辑时遵循统一格式框架编撰内容。\n\n---\n\n[返回目录](./README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `updated_at` = NOW();

-- =====================================================
-- 卷一·新世记
-- =====================================================

-- 法兰维亚帝国
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('frankweiya', 'vol1', '法兰维亚帝国', '# 法兰维亚帝国\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 国势概略\n\n法兰维亚帝国为服务器早期重要势力之一，建有都城，国力强盛。然其命运多舛，历经战乱，终成历史。\n\n---\n\n## 幻影忍者之乱\n\n### 乱起\n\n八月中旬，来自其他服务器的[baitong]等PVP圈的恶俗魔怔人进入邦国崛起服务器。初时，[baitong]等人潜入法兰维亚帝国，行偷窃物品之事，复烧毁都城物资，随即脱离法兰维亚，另立「幻影忍者王国」，与法兰维亚开启战端。\n\n### 战事\n\n因物资被烧掠殆尽，加之双方人均素质差异悬殊，法兰维亚帝国在与幻影忍者王国的战事中处于不利局面。\n\n危急之际，「逆熵」势力之玩家[fanjianglong]驰援法兰维亚，取得**零死十三杀**之战绩，一时传为佳话。\n\n### 余波\n\n然幻影忍者王国不甘失败，于公屏之上对法兰维亚成员及[fanjianglong]进行言语攻击。因其时管理组内部扯皮互相制衡，未对恶俗玩家进行任何处置，遂招致大量玩家谴责，服务器玩家退游者达六成之多。\n\n### 结局\n\n此事件最终以大部分恶俗玩家被封号处理而告终。然部分反抗恶俗之人亦被误封，加剧了玩家群体对管理层之不满。\n\n管理组被迫重新进行小部分任免，新上任之管理员积极参与玩家需求征集，此事一定程度上促进了服务器之进步，增加了管理经验。\n\n---\n\n## 史评\n\n法兰维亚帝国虽遭此大难，然其存续期间为服务器早期发展做出了贡献。幻影忍者之乱虽为悲剧，却推动了服务器管理之进步，可谓因祸得福。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 幻影忍者王国
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('naruto', 'vol1', '幻影忍者王国', '# 幻影忍者王国\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 建国始末\n\n### 入侵\n\n幻影忍者王国由[baitong]等人于八月中旬建立。其人来自其他服务器PVP圈，以恶俗魔怔著称。初入服务器时，假意投效法兰维亚帝国，实则暗中谋划。\n\n### 叛乱\n\n既得机会，遂窃取法兰维亚物资，焚毁都城，脱离而去，于别处建立幻影忍者王国。此后与法兰维亚帝国交战，虽战事不利，然其人于公屏辱骂他人之行径，令服务器风气大坏。\n\n---\n\n## 与法兰维亚之战\n\n幻影忍者王国与法兰维亚帝国交战期间：\n\n- 初期因偷袭得手，占据优势\n- [fanjianglong]驰援法兰维亚后，战局逆转\n- 幻影忍者王国成员于公屏进行言语攻击\n\n---\n\n## 覆灭\n\n幻影忍者王国之恶行终招致管理组处置，大部分成员被封号处理，此势力遂告覆灭。\n\n然其造成之影响深远：\n- 服务器玩家流失严重（约六成退游）\n- 管理组因此进行改革\n- 部分反抗恶俗者被误封\n\n---\n\n## 史评\n\n幻影忍者王国虽存续时间不长，然其对服务器之影响深远。其恶行促使管理组反思改革，亦让玩家群体更加团结。此可谓反面教材，警示后人。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 逆熵
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('nishi', 'vol1', '逆熵', '# 逆熵\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 势力概况\n\n逆熵为服务器中一股势力，其玩家[fanjianglong]于幻影忍者之乱中表现突出。\n\n---\n\n## 幻影忍者之乱\n\n### 驰援法兰维亚\n\n当法兰维亚帝国遭受幻影忍者王国入侵之际，逆熵之玩家[fanjianglong]挺身而出，驰援法兰维亚。\n\n### 战绩\n\n[fanjianglong]于战中取得**零死十三杀**之战绩，为服务器玩家所称道。此战绩一时传为佳话，彰显其PVP实力。\n\n---\n\n## 史评\n\n逆熵虽非服务器最大势力，然其成员[fanjianglong]于危难之际挺身而出，匡扶正义，值得后人铭记。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 拉曼却公国
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('lamanqia', 'vol1', '拉曼却公国', '# 拉曼却公国\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 建国与政治\n\n### 方桌议事会\n\n**世界历五日（2025年8月12日）**，拉曼却公国召开第一次方桌议事会。\n\n经此会议，拉曼却公国正式确立以方桌议事会为主之政治架构，保障各骑士参与公国治理之权。\n\n### 行政区划\n\n同时划分公国内明确行政地区，各地经公投任免名单如下：\n\n| 职位 | 任职者 |\n|------|--------|\n| 京都护民官 | SpringFiled1903 |\n| 南境总督 | lingqi |\n| 西部理事 | Ls_HeiBairat |\n\n---\n\n## 疆域扩张\n\n### 并入梁山泊国\n\n拉曼却公国与梁山泊国沟通协商后，正式将该地并入拉曼却联合统治。\n\n- 当地更名为**吉·台地区**\n- 作为姊妹共和国加入拉曼却公国\n- 保留部分自治权\n\n---\n\n## 史评\n\n拉曼却公国以方桌议事会为政治核心，实行民主治理，并成功扩张疆域，可谓一周目中政治制度较为完善之邦国。\n\n---\n\n> 记录时间：2025年8月12日 23:25\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 梁山泊国
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('liangshan', 'vol1', '梁山泊国', '# 梁山泊国\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 国势概略\n\n梁山泊国原为独立势力，后与拉曼却公国协商，并入拉曼却联合统治。\n\n---\n\n## 并入拉曼却\n\n### 协商过程\n\n梁山泊国与拉曼却公国进行沟通协商，双方达成一致。\n\n### 合并结果\n\n- 当地更名为**吉·台地区**\n- 作为姊妹共和国加入拉曼却公国\nn- 保留部分自治权\n\n---\n\n## 史评\n\n梁山泊国之并入，体现了邦国间和平协商之典范。双方以谈判代替战争，实现互利共赢，值得后人学习。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 伏见稻荷狐域
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('fujian', 'vol1', '伏见稻荷狐域', '# 伏见稻荷狐域\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 势力概况\n\n伏见稻荷狐域为服务器中一势力。\n\n---\n\n## 史料待补\n\n此势力之详细历史，因史料散佚，待后人发掘补录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- Blood of Death
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('bod', 'vol1', 'Blood of Death', '# Blood of Death (BOD)\n\n> [返回卷一目录](../README.md#卷一新世记)\n\n---\n\n## 势力概况\n\nBlood of Death（简称BOD）为服务器中一势力。\n\n---\n\n## 史料待补\n\n此势力之详细历史，因史料散佚，待后人发掘补录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- =====================================================
-- 卷二·旧世记
-- =====================================================

-- 零周目概略
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('ling', 'vol2', '零周目概略', '# 零周目概略\n\n> [返回卷二目录](../README.md#卷二旧世记)\n\n---\n\n## 概述\n\n在邦国崛起的历史上，旧事也别有一番韵味。此为零周目之记载，为一周目之先声。\n\n---\n\n## 性质\n\n据传，零周目时玩家wans曾言：\n\n> 「这是不删档测试」\n\n此语虽简，却道出零周目之性质。\n\n---\n\n## 史料待补\n\n零周目之详细历史，因年代久远，史料散佚，待后人发掘补录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- =====================================================
-- 卷三·刊物志
-- =====================================================

-- 狗叫时报
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('goujiao', 'vol3', '狗叫时报', '# 狗叫时报\n\n> [返回卷三目录](../README.md#卷三刊物志)\n\n---\n\n## 刊物简介\n\n《狗叫时报》由服务器玩家**「Ayimin」**所创立。\n\n### 宗旨\n\n旨在记录一段时间内服务器发生的重大事件，并以类报纸的形式发布。\n\n---\n\n## 史料待补\n\n此刊物之详细内容，待后人补录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 巴别塔通讯社
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('babil', 'vol3', '巴别塔通讯社', '# 巴别塔通讯社\n\n> [返回卷三目录](../README.md#卷三刊物志)\n\n---\n\n## 刊物简介\n\n《巴别塔通讯社》由服务器玩家**「DoctorWen3848」**所创立。\n\n### 宗旨\n\n巴别塔通讯社在新闻撰写与发布过程中恪守客观、真实的新闻媒体基本原则，以改善服务器游玩氛围、推动和谐、进步、繁荣的服务器环境为目标。\n\n---\n\n## 作者声明\n\n> ⚠️ 巴别塔通讯社内容不得出现在任何形式的宣传片视频内\n\n---\n\n## 发行记录\n\n| 日期 | 刊物 |\n|------|------|\n| 2025年8月12日 | 创刊号 |\n| 2025年8月13日 | 快讯 |\n| 2025年8月14日 | 刊物 |\n| 2025年8月15日 | 刊物 |\n| 2025年8月17日 | 刊物 |\n| 2025年8月19日 | 停刊号 |\n\n---\n\n## 停刊\n\n《巴别塔通讯社》于2025年8月19日发布停刊号，正式停刊。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 企鹅快讯
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('qi_e', 'vol3', '企鹅快讯', '# 企鹅快讯\n\n> [返回卷三目录](../README.md#卷三刊物志)\n\n---\n\n## 刊物简介\n\n《企鹅快讯》为服务器玩家所创立之刊物，记录服务器大事。\n\n---\n\n## 发行记录\n\n| 日期 | 刊物 |\n|------|------|\n| 2025年8月20日 | 刊物 |\n\n---\n\n## 史料待补\n\n此刊物之详细内容及创始人信息，待后人补录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 真理报
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('zhenli', 'vol3', '真理报', '# 真理报\n\n> [返回卷三目录](../README.md#卷三刊物志)\n\n---\n\n## 刊物简介\n\n《真理报》由服务器玩家**「树，fff137」**所创立。\n\n---\n\n## 创刊词\n\n> 以真为灯，以理为径\n>\n> 当第一缕晨光穿透迷雾，我们捧出这张纸，以\"真理\"为名，与世界初见。\n>\n> 这不是一份追逐喧嚣的报，也不是一册堆砌辞藻的书。我们深知，\"真\"是基石——是对事实的忠实记录，对细节的锱铢必较，对谎言的坚决剥离。无论是街角巷陌的民生小事，还是时代浪潮中的宏大命题，我们承诺：不回避矛盾，不粉饰太平，让每一个字都扎根于现实的土壤。\n>\n> 而\"理\"是方向——是穿透表象的思考，是联结个体与时代的逻辑，是多元声音碰撞后的共识。我们不预设答案，更不垄断话语权。在这里，你会读到不同立场的观点交锋，看到数据与理性交织的分析，也能触摸到那些藏在数字背后的人的温度。因为真理从不是孤芳自赏的教条，而是在思辨中生长的共识。\n>\n> 或许我们的笔触尚显稚嫩，视野仍有局限，但我们怀揣一份执拗：相信真相值得被看见，理性值得被珍视。愿《真理报》能成为一盏灯，照亮模糊的边界；也能成为一条路，让每一个渴望理解世界的人，在此相遇、同行。\n>\n> 今天，我们出发了。\n>\n> 与您一同，在求真的路上，步履不停。\n\n---\n\n## 发行记录\n\n| 日期 | 刊物 |\n|------|------|\n| 2025年8月20日 | 刊物 |\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- =====================================================
-- 卷四·轶事志
-- =====================================================

-- 逆天墙
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('nixtian', 'vol4', '逆天墙', '# 逆天墙\n\n> [返回卷四目录](../README.md#卷四轶事志)\n\n---\n\n## 事件概述\n\n**八月十五日**，服务器内莫名出现许多「火箭」模型，玩家称奇。\n\n---\n\n## 详情\n\n此事件为服务器中之奇闻，具体缘由已不可考。然玩家于服务器中建造「火箭」模型之举，成为一时谈资，故记录于此。\n\n---\n\n## 史评\n\n服务器中玩家之创造力无穷，虽为游戏，亦可成趣事。此等轶事，为服务器增添几分趣味。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 罪人特辑
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('zuiren', 'vol4', '罪人特辑', '# 罪人特辑\n\n> [返回卷四目录](../README.md#卷四轶事志)\n\n---\n\n## 概述\n\n本节记录邦国崛起服务器之有罪之人，因而被记录于此，以警示后人。\n\n---\n\n## 史料待补\n\n此节之详细内容，待后人补录。\n\n---\n\n## 编者注\n\n记录罪人并非为了羞辱，而是为了：\n- 警示后人\n- 记录历史\n- 维护服务器秩序\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 神人大全
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('shenren', 'vol4', '神人大全', '# 神人大全\n\n> [返回卷四目录](../README.md#卷四轶事志)\n\n---\n\n## 概述\n\n本节记录服务器中之神人神事，以备后人品鉴。\n\n---\n\n## 史料待补\n\n此节之详细内容，待后人补录。\n\n---\n\n## 编者注\n\n所谓「神人」，乃服务器中之奇才异士，或技艺超群，或言行有趣，值得记录。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- =====================================================
-- 附录
-- =====================================================

-- 大事年表
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('dashiji', 'appendix', '大事年表', '# 大事年表\n\n> [返回附录目录](../README.md#附录)\n\n---\n\n本年表按时间顺序记录邦国崛起服务器之重大事件。\n\n---\n\n## 年表\n\n| 时间 | 大事记 |\n|------|--------|\n| **零周目** | 服务器开启不删档测试，各势力初现端倪 |\n| **世界历五日**<br>(2025.8.12) | 拉曼却公国召开第一次方桌议事会，确立政治架构<br>《巴别塔通讯社》发布创刊号 |\n| **2025.8.13** | 《巴别塔通讯社》发布8月13日快讯 |\n| **2025.8月中旬** | **幻影忍者恶俗事件爆发**<br>• [baitong]等人建立幻影忍者王国，与法兰维亚帝国交战<br>• [fanjianglong]驰援法兰维亚，取得零死十三杀战绩<br>• 大量玩家退游，管理组进行改革 |\n| **2025.8.15** | 服务器内出现大量「火箭」模型（逆天墙事件） |\n| **2025.8.17** | 《巴别塔通讯社》发布8月17日刊 |\n| **2025.8.19** | 《巴别塔通讯社》发布停刊号 |\n| **2025.8.20** | 《企鹅快讯》《真理报》发布8月20日刊 |\n| **后续** | 史书有云系列文档宣布暂停主线更新 |\n\n---\n\n## 事件详解\n\n### 幻影忍者恶俗事件\n\n八月中旬发生之重大事件，影响深远：\n\n1. **起因**：[baitong]等人来自其他服务器PVP圈，以恶俗著称\n2. **经过**：假意投效法兰维亚，后叛乱建立幻影忍者王国\n3. **高潮**：[fanjianglong]驰援法兰维亚，取得零死十三杀战绩\n4. **结果**：大部分恶俗玩家被封号，管理组进行改革\n\n### 刊物兴衰\n\n| 刊物 | 创刊 | 停刊 |\n|------|------|------|\n| 巴别塔通讯社 | 2025.8.12 | 2025.8.19 |\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();

-- 友链
INSERT INTO `bgjq_worldview_contents` (`id`, `volume_id`, `title`, `raw_content`) VALUES
('youlian', 'appendix', '友链', '# 友链\n\n> [返回附录目录](../README.md#附录)\n\n---\n\n## 服务器相关链接\n\n### 官方资源\n\n| 名称 | 链接 |\n|------|------|\n| 服务器网页地图 | http://bgjq.simpfun.cn |\n| 服务器帮助文档 | https://bgjq.yuque.com/org-wiki-bgjq-kc4g7v/pfk86c |\n| 三方wiki小站 | https://wiki.bgjq.top/ |\n\n---\n\n## 史书来源\n\n本文库内容整理自飞书知识库「邦国崛起·史书有云」：\n\n- 原始文档：https://my.feishu.cn/wiki/GMOFw8Sw4i3bZokwriYcg1lnnMf\n\n---\n\n## 参与编辑\n\n史书有云系列文档保留玩家无限编辑的权力，欢迎新的编写者参与补充。\n\n---\n\n[返回目录](../README.md)')
ON DUPLICATE KEY UPDATE `raw_content` = VALUES(`raw_content`), `title` = VALUES(`title`), `updated_at` = NOW();