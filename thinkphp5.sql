/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : thinkphp5

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 09/07/2020 13:33:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for qw_article
-- ----------------------------
DROP TABLE IF EXISTS `qw_article`;
CREATE TABLE `qw_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章标签关键词',
  `art_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章描述',
  `art_thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章缩略图',
  `art_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '文章内容',
  `art_time` int(11) DEFAULT NULL COMMENT '文章发布时间',
  `art_editor` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章作者',
  `art_view` int(11) DEFAULT 0 COMMENT '文章浏览次数',
  `cate_id` int(11) DEFAULT NULL COMMENT '文章分类ID',
  `art_status` int(11) DEFAULT 2 COMMENT '文章是否加入推荐位 1是2否',
  `art_love` int(11) DEFAULT 0 COMMENT '文章点赞数',
  `art_collect` int(11) DEFAULT 0 COMMENT '文章收藏量',
  `art_pinglun` int(11) DEFAULT 0 COMMENT '文章评论数',
  `thumball` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of qw_article
-- ----------------------------
INSERT INTO `qw_article` VALUES (14, '文章一', '文章一', '文章一', 'uploads/2020-05-07/wIz1lA8MIsVdKgdh1CEVQVKw5AEeHaP14trqqEYw.jpeg', '<p>文章一文章一文章一</p>', NULL, '文章一', 6, 8, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (15, '文章二', '文章二', '文章二', '20200622\\a5dc0efb4e173ca4451e7c7c904dc2eb.jpg', '<p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">当金正恩上台的时候，外面的世界对这个不到30岁的年轻人还有些期待，希望有西方留学经历的他能为这个破败不堪的国家带去一些朝气，然而他除了把自己吃得越来越胖并娶了个貌美如花的乐团主唱之外，还大肆清洗对自己不敬的前朝元老，甚至传出了当众“炮决”“犬决”“机关枪扫射”等骇人听闻的杀人手段。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">更让外界感到忧虑的是，他带领下的朝鲜在“宇宙第一强国”的道路上越走越远，金正恩上任5年来射出去的导弹超过了此前几十年的总和，从今年年初到现在已经进行了两次核爆。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">如今的金正恩已经脱去了上台之初的一脸稚气，他指挥发射导弹核试验、视察军队、工地、渔场甚至养猪厂时开心大笑的照片频频登上国际媒体的版面，这是他在对外展现人民拥戴和政权稳固的自信。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \"><a href=\"http://www.boke.com/detail/images/jinzhengen.jpg\" class=\"prettyPhoto_gall\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: inherit; font-style: inherit; vertical-align: baseline; background: transparent; list-style: none; color: rgb(66, 139, 202); transition: all 0.2s ease 0s; cursor: pointer;\"><img class=\"aligncenter size-full wp-image-5137\" src=\"http://www.boke.com/Home1/images/jinzhengen.jpg\" alt=\"金正恩\" title=\"这么多大国，为什么治不了一个朝鲜？\" width=\"547\" height=\"381\"/></a></p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">如果说前几次朝鲜核试验外界还是怀疑他的核技术，那么第五次核爆清楚地告诉世人，如果继续这样下去，朝鲜拿出可以打到美国本土的战略核导弹只是个时间问题，打到中日韩就更不用说了。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜在研制核武器的道路上，只用了一个策略：明修栈道，暗度陈仓，嘴上反复说放弃，甚至还炸过冷却塔、允许国际组织进去核查，但实际上从来也没有住手；在六方会谈中也出尔反尔，签了停核协议，没几年就撕毁，宣布自己已是拥核国家，还要求大家都承认。在国际社会上，基本没有什么信誉可言。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">连肚子都填不饱，为什么还要一意孤行搞这些“大杀器”？朝鲜的行为常常令外界感到困惑。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">要知道朝鲜人脑子里装的什么，就要了解朝鲜这台国家机器的灵魂——主体思想，它控制了从国家领袖、党国精英直至大头百姓的一切行动。朝鲜的说法是，领袖是大脑，党和军队、政府是手足，人民是躯干，领袖指哪儿就打哪儿。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">“主体思想”是朝鲜开国领袖金日成创立的，地位相当于中国的“毛泽东思想”（水平高低另当别论），后被写入朝鲜宪法，成为国家和人民唯一的活动指导理论，至高无上。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">主体思想被确立为朝鲜的立国之本，核心可以概括为四个字：独立、自主。“主体”的意思就是以朝鲜自己为主体，政治上自主、经济上自足、国防上自卫。简单说，就是谁都不能信，只能靠自己。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">在外界看来是不守承诺，但在朝鲜看来，这就是主体思想的体现，谁的面子也不给，我自己决定自己的命运，爱怎么来怎么来，谁也管不着。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜从战后直到80年代末取得的经济建设成就，为主体思想提供了合法性，然而到了90年代，因为苏联解体和东欧剧变，外来援助断绝，朝鲜国内经济急剧恶化，发生持续数年的饥荒，为了稳定政权，朝鲜领导人金正日在主体思想的基础上提出“先军政治”：一切工作都围绕军队展开，有限的资源要优先保障军队。只要控制好军队，对外保持武力威慑，对内确保政权根基稳固，因此即便发生大饥荒，朝鲜国内也没有发生动乱。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜军队目前保持在110万人左右，数量仅次于中美印排第四位，军民比例世界第一。军队在朝鲜政治生活当中地位很高，生活待遇、政治待遇、社会声誉比工人、知识分子都好，年轻人一般都喜欢当兵，年轻的姑娘想找对象，也喜欢找军人。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">先军政治的逻辑就是，要先实现的独立自主地生存下去，然后再讨论生活的问题，小孩从小就被教育“没有糖果可以活下去，没有子弹就不能生存”。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜最高领导人也多次公开表示“先军政治就是万能宝剑”，强化先军政治也是金氏政权维持合法性的唯一手段，一旦搞出核武器，对内可以证明先军思想和领袖的伟大英明，振奋民心，给人灌输“我日子过得没你好，但我比你厉害”的精神鸦片。对外，则可以此作为筹码，向国际社会要粮食要原油，反正光脚的不怕穿鞋的，大不了同归于尽。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">在朝鲜，主体思想和先军政治无处不在，比如朝鲜不使用公元纪年，而是使用主体纪年，以金日成诞生的1912年为主体元年，今年是主体105年；平壤地标叫“主体思想塔”，在日常生活中，主体思想标语随处可见。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">由于没有签订终战和平条约，理论上，朝鲜半岛是世界上不多的仍然处于战争状态的地方，官方宣传中，将美国、韩国、日本树立成无时不在的敌人，现在偶尔也指桑骂槐地捎上中国。这种几十年如一日洗脑式的宣传是成功的，普通民众对领袖的爱戴与宗教信仰几乎没有分别：</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">与主体思想相对的是，朝鲜从金日成至今，都坚决抵制“事大主义”，“事大”就小国侍奉大国以保存自身的策略。古代的朝鲜王朝从中国明初到清末，一直奉行“事大交邻”的政策，“事大”就是侍奉中原王朝，“交邻”则是指与日本等邻国的往来。因此“北不失礼，南不失信”成为朝鲜王朝的祖训，而“事大”则成为朝鲜对华政策的代名词。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">“事大”显然与主体思想是矛盾的，不论是朝鲜上世纪50年代对曾在中国延安、太行山从事抗日斗争的朝鲜共产党人进行清洗，还是官方宣传和教科书中向来极少提及朝鲜战争时的中国志愿军，都是在“树立主体，反对事大”，消除民间的中国崇拜，不断强调朝鲜民族的主体性，宣扬民族主义，这对于封闭的、强敌环饲的朝鲜来说，很容易培养起强大的群众基础。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">中朝关系历来也不是由双边关系来界定的。古代两国关系受制于日本，明朝万历年间的壬辰倭乱、清末的甲午战争，都因日本入侵朝鲜，中国出于保护藩属国的道义，出兵抗日，结果直接加速了两个王朝的灭亡；朝鲜战争中国出兵，是为对抗美国。冷战时期，中朝因为意识形态纽带，形成一种同志加兄弟的友谊，但当这种关系赖以为继的外部环境发生变化之后，就会变质。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">从70年代中美、中日关系正常化以及中国的改革开放开始，中国就从革命外交的思维中走出来，开始了以国家利益为核心的外交时代，融入到美国主导的国际经济体系之中去，这也是中国在40年来取得非凡成就的根本所在。而朝鲜则仍然致力于构建“主体思想”，反对“事大主义”，基于意识形态为纽带的亲密关系逐渐松弛了，现实利益让两国处于两个平行线上。1992年中韩建交，更引发了朝鲜对中国不满。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜深知自己对中国的战略意义，也只有在需要帮助的时候才会想起中国。钱其琛在他的《外交十记》当中，回忆了他亲自去向金日成报告中韩建交的事情，当时钱其琛一行的专机到达平壤之后，机场没有按照惯例举行欢迎仪式，钱其琛一行改乘朝鲜准备的直升机，飞到金日成夏季常住的湖滨别墅。钱其琛向金日成转达了江泽民的口信。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">金日成当时说，中国的事情，中国定了就可以了，你们就按你们定的做，我们自己走自己的路。需要的时候，我们再请你们帮助吧，就这样吧。在钱其琛的记忆当中，这次会见是金日成历次会见中国代表团时间最短的一次。会见之后，没有举行任何例行的招待宴会，钱其琛一行当天就返回了北京。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">如今，包括美日韩在内，很多人将朝鲜日益壮大的核力量归罪于中国，认为中国没有对其施加影响力，这其实是没有认清中朝之间真实的关系。中方已经多次声明，中国和朝鲜是正常的国家关系，正常关系就是说，我跟他不存在军事同盟，也不会干涉他的内政。而且，历次核试后联合国对朝鲜的制裁决议，中国都是了投赞成票的，难道这还不够明显吗？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; outline: 0px; font-weight: 700; font-style: inherit; vertical-align: baseline; background: transparent; list-style: none;\">还有一些人说，当年中国试验原子弹，美国苏联也坚决反对，如今朝鲜是一个主权国家，为啥你能有原子弹，人家就不能有？这个逻辑忽视了一个国际道义的问题，核武器是一种终极武器，跟炮弹不一样，需要极强的控制能力，还得有大国担当，否则对全人类都是毁灭性的。曾有外国专家去朝鲜考察核设施，对他们的防护设施感到很担忧，虽然他坚决反对朝鲜搞核武器，但还是从人道主义出发，为他们提供了改进设备的技术手段。</span></p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">这就朝鲜核设施的现实情况，这些核设施距离中国边境不过百十公里，一旦发生泄漏，大片东北国土势必遭殃，全世界没有哪个国家在人口这么稠密的地方进行核试验。加上朝鲜的体制和领导人的行事风格，谁能保障他不乱来？万一玩火自焚，大量朝鲜人变成难民涌入中国怎么办？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">如今中国的地位很尴尬，打，不可能，一言不合就动手的时代已经过去了，中国也绝不会允许有人在自己家门口放火，朝鲜又把2000多万人民和核武器一起绑在战车上，到时候跟你来个鱼死网破，大家就都吃不了兜着了；和，也很难，六方会谈基本破产，重新启动遥遥无期，美国要求朝鲜首先放弃核武器再谈判，朝鲜则要求美国先承认它的核地位再说，互相极度不信任，根本坐不下来。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">有人提出由中国提供核保护伞来换取朝鲜弃核，且不说这与中国一贯的不结盟政策相违背，朝鲜压根就没打算靠别人的保护伞，否则金氏的合法性在哪里？靠着核保护伞能统一国家吗？</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">因为主体思想，朝鲜不会允许任何大国插手本国事务，对自己施加影响，大国也很难像对叙利亚、伊拉克、利比亚那样，在内部扶植自己的力量。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">朝鲜领袖就是在这样的地缘格局中生存了下来，比萨达姆、卡扎菲甚至巴沙尔活得都好。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">如果把国际社会比作丛林，朝鲜就是眼镜蛇，它全身柔软，但有两颗令人胆颤毒牙，从民族国家进化的角度来看，朝鲜是成功的，不管是试射导弹还是核试验，他都是在把这两颗毒牙磨得更加锋利而已，这比上面那些穆斯林国家坐以待毙要高明。</p><p style=\"box-sizing: border-box; margin-top: 10px; margin-bottom: 10px; padding: 0px; border: none; outline: 0px; vertical-align: baseline; background: rgb(255, 255, 255); font-family: \">（来源：微信公众号“财经也疯狂”）</p><p><br/></p>', NULL, '文章二', 3, 6, 1, 1, 1, 0, NULL);
INSERT INTO `qw_article` VALUES (16, '文章三', '文章三', '文章三', '20200622\\2141ae30434f28852aa25e06798f4490.jpg', '<p>文章三文章三</p>', NULL, '文章三', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (17, '文章一', '文章一', '文章一', '20200622\\8e0bbdca71d5ac6359e034d627d3601e.jpg', '<p>文章一</p>', NULL, '文章一', 2, 10, 1, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (18, '文章二', '文章二', '文章二', 'uploads/2020-05-07/oovGAe1PoyCJFenR6CL7RZfjMiufpYfeQV3MV6AC.jpeg', '<p>文章二</p>', NULL, '文章二', 2, 8, 1, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (19, '文章四', '文章四', '文章四', 'uploads/2020-05-07/wFz3BK7Hvo2YlMhvW5rok971rHjY5A5NUlCpADG3.jpeg', '<p>文章四</p>', NULL, '文章四', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (20, '文章三', '文章三', '文章三', 'uploads/2020-05-07/DmFetiFAhcy7P4jqul74Lz3RAL30en1aoMkMlNMK.jpeg', '<p>文章三</p>', NULL, '文章三', 0, 8, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (21, '文章五', '文章五', '文章五', 'uploads/2020-05-07/XrQcgHH0AaB7oEJ5GOfVhaQ3bfkLMNj4WMTrjp25.jpeg', '<p>文章五</p>', NULL, '文章五', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (22, '文章六', '文章六', '文章六', 'uploads/2020-05-07/BCDlVY8xkJ0iOG96YK44eimciJBbLcKMoj1CYxJJ.jpeg', '<p>文章六</p>', NULL, '文章六', 0, 6, 2, 1, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (23, '文章一', '文章一', '文章一', 'uploads/2020-05-07/b0Rpb102xiK5SXLOGkTaNApnAa5rO8fINMo5JImF.jpeg', '<p>文章一</p>', NULL, '文章一', 1, 9, 1, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (24, '文章一', '文章一', '文章一', 'uploads/2020-05-07/2kn8OgXBlxqJj0SYeQueHZ2fkEO8l6VDj2VnwrHj.jpeg', '<p>文章一</p>', NULL, '文章一', 1, 15, 1, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (25, '测试1', '测试1', '测试1测试1测试1测试1测试1测试1测试1测试1测试1测试1', 'uploads/2020-05-19/qArYC5K8IgHGuqjEaPmrEJtExkYUan5IMaHSSA7T.jpeg', '<p>测试1测试1测试1测试1</p>', NULL, '测试1', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (26, '测试2', '测试2', '测试2测试2测试2测试2', 'uploads/2020-05-19/Qx1OpfyDelldjlavDAkPr6kKaC2fkbXZUrb7XSGW.jpeg', '<p>测试2测试2测试2测试2测试2</p>', NULL, '测试2', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (27, '测试3', '测试3', '测试3', 'uploads/2020-05-19/Olz564veWu3ASFJgCZIYBY67oU0cC1VqFXu5edlg.jpeg', '<p>测试3测试3测试3测试3</p>', NULL, '测试3', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (28, '测试4', '测试4', '测试4测试4', 'uploads/2020-05-19/jGGBZXRniZCygWJk9lomu98nnofLnfKVVfTnzFgh.jpeg', '<p>测试4测试4测试4</p>', NULL, '测试4', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (29, '测试5', '测试5', '测试5', 'uploads/2020-05-19/8LortPXbJXGU7XFeSEEiimLeA1F9JCAbdedKKLpe.jpeg', '<p>测试5</p>', NULL, '测试5', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (30, '测试6', '测试6', '测试6', 'uploads/2020-05-19/vVh33lVcRJypha0GEsx0mhAtgcGJKlqX6MRrk9Ai.jpeg', '<p>测试6</p>', NULL, '测试6', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (31, '测试7', '测试7', '测试7', '20200622\\14aefb79af3910f4cac63198d4a5c423.jpg', '<p>测试7</p>', NULL, '测试7', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (32, '测试8', '测试8', '测试8', '20200622\\30425b936808f8462124da1d8c87deb8.jpg', '<p>测试8</p>', NULL, '测试8', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (33, '测试9', '测试9', '测试9', '20200622\\53189137121c9482b06b7aa6dabe2ffc.jpg', '<p>测试9测试9</p>', NULL, '测试9', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (34, '测试10', '测试10', '测试10测试10', '20200622\\9c1d1edae63516c351b4b284641b891e.jpg', '<p>测试10测试10</p>', NULL, '测试10', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (35, '测试11', '测试11', '测试11', '20200622\\deaf8f4fc41f952f26f6690b46b4be8c.jpg', '<p>测试11</p>', NULL, '测试11', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (36, '测试12', '测试12', '测试12', 'uploads/2020-05-19/YMdxUGRYChaIIBAa2gRtmOaUW56zKL8gZ3HoQfwO.jpeg', '<p>测试12</p>', NULL, '测试12', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (37, '测试13', '测试13', '测试13', '20200622\\012ab05f24e6d7ba22cd800ac8166708.jpg', '<p>测试13测试13</p>', NULL, '测试13', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (38, '测试14', '测试14', '测试14', '20200622\\c62703672c310f26aece8d6b1ba2e36f.jpg', '<p>测试14</p>', NULL, '测试14', 0, 6, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (55, 'dda', 'dda', 'dda', '20200608\\daeb3dc30c185056c7991c566f153a40.jpg', '<p>dda</p>', NULL, 'dda', 1, 11, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (56, '啥啥啥的啥啥啥的啥啥啥的啥啥啥的啥啥啥的', '啥啥啥的', '啥啥啥的', '20200608\\b8ef259ec9da751810649b1c3085c180.jpg', '<p>啥啥啥的</p>', 1591604999, '啥啥啥的', 0, 9, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (57, '对对对', '对对对', '对对对', '20200624\\85d920ee192f2bacf088b83c45223816.jpg', '<p>对对对对对对对对对</p>', 1592967590, '对对对', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (58, '豆豆说', '豆豆说', '豆豆说', '20200624\\a22d05af09ca0fd8eab568fccca4486b.jpg', '<p>豆豆说</p>', 1592967608, '豆豆说', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (59, '分分分', '分分分', '分分分', '20200624\\83f03a0aff61df20efbd5873440b40af.jpg', '<p>分分分</p>', 1592967779, '分分分', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (60, '颠倒是非', '颠倒是非', '颠倒是非', '20200624\\171ba79f2e1af7654543a39de0027836.jpg', '<p>颠倒是非</p>', 1592967795, '颠倒是非', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (61, '电饭锅', '电饭锅', '电饭锅', '20200624\\c229a6749d7eb49c9b3c0bd7c729aa09.jpg', '<p>电饭锅</p>', 1592967819, '电饭锅', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (62, '水电费', '水电费', '水电费', '20200624\\1ccf6e05150d0a47fc24e9f8b733439f.jpg', '<p>水电费</p>', 1592967843, '水电费', 0, 17, 2, 0, 0, 0, NULL);
INSERT INTO `qw_article` VALUES (63, '安安生生', '安安生生', '安安生生', '20200624\\394bc51374f7edc31f612d179cc17306.jpg', '<p>安安生生</p>', 1592977850, '安安生生', 2, 19, 2, 0, 0, 0, NULL);

-- ----------------------------
-- Table structure for qw_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `qw_auth_group`;
CREATE TABLE `qw_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.启用0.未启用',
  `rules` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '权限的ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '角色' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_auth_group
-- ----------------------------
INSERT INTO `qw_auth_group` VALUES (1, '超级管理员', 1, '2,7,9,13,14,17,20');
INSERT INTO `qw_auth_group` VALUES (6, '测试员', 1, '2,7');
INSERT INTO `qw_auth_group` VALUES (9, '数据录入', 1, '13,14');
INSERT INTO `qw_auth_group` VALUES (8, '经理', 1, '2,7,13,14');

-- ----------------------------
-- Table structure for qw_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `qw_auth_group_access`;
CREATE TABLE `qw_auth_group_access`  (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '管理员ID',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '角色ID'
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '用户组 和规则关联表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_auth_group_access
-- ----------------------------
INSERT INTO `qw_auth_group_access` VALUES (1, 1);
INSERT INTO `qw_auth_group_access` VALUES (2, 9);
INSERT INTO `qw_auth_group_access` VALUES (2, 6);

-- ----------------------------
-- Table structure for qw_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `qw_auth_rule`;
CREATE TABLE `qw_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '控制器 /方法名',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '权限名称',
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '权限描述',
  `pid` int(11) DEFAULT 0 COMMENT '上级ID',
  `level` tinyint(2) DEFAULT 0,
  `sort` int(11) DEFAULT 100 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '规则表，' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of qw_auth_rule
-- ----------------------------
INSERT INTO `qw_auth_rule` VALUES (9, '1', '分类管理', 1, 1, '', 0, 0, 1);
INSERT INTO `qw_auth_rule` VALUES (2, '2', '文章管理', 1, 1, '', 0, 0, 2);
INSERT INTO `qw_auth_rule` VALUES (14, 'User/index', '用户列表', 1, 1, '', 13, 1, 1);
INSERT INTO `qw_auth_rule` VALUES (13, '3', '用户管理', 1, 1, '', 0, 0, 3);
INSERT INTO `qw_auth_rule` VALUES (7, 'Article/index', '文章列表', 1, 1, '', 2, 1, 1);
INSERT INTO `qw_auth_rule` VALUES (17, 'Category/destroy', '删除分类POST', 1, 1, '', 9, 1, 4);
INSERT INTO `qw_auth_rule` VALUES (20, 'Category/edit', '编辑分类', 1, 1, '', 9, 1, 5);

-- ----------------------------
-- Table structure for qw_category
-- ----------------------------
DROP TABLE IF EXISTS `qw_category`;
CREATE TABLE `qw_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '分类名称',
  `cate_title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '分类别名',
  `cate_order` int(11) DEFAULT NULL COMMENT '排序',
  `cate_pid` int(11) DEFAULT NULL COMMENT '父ID',
  `cate_type` int(11) DEFAULT NULL COMMENT '类型1.文章列表2.单页3.图片列表',
  `cate_content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '内容',
  `cate_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '关键字',
  `cate_des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章分类表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of qw_category
-- ----------------------------
INSERT INTO `qw_category` VALUES (3, '单车分类', '单车分类', 1, 0, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (4, '骑行装备', '骑行装备', 2, 0, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (6, '死飞车', '死飞车', 1, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (8, '复古骑行', '复古骑行', 2, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (9, '山地车', '山地车', 4, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (10, '公路车', '公路车', 3, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (11, '车身装备', '车身装备', 1, 4, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (13, '人身装备', '人身装备', 2, 4, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (15, '折叠/小径车', '折叠/小径车', 5, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (17, '单车生活', '单车生活', 3, 0, 3, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (18, 'BMX', 'BMX', 6, 3, 1, NULL, NULL, NULL);
INSERT INTO `qw_category` VALUES (19, '行业资讯', '行业资讯', 4, 0, 2, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for qw_config
-- ----------------------------
DROP TABLE IF EXISTS `qw_config`;
CREATE TABLE `qw_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '标题',
  `conf_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '变量名',
  `conf_content` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '变量值',
  `conf_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '描述',
  `fiele_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '字段类型',
  `fiele_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '类型值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '网站配置表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of qw_config
-- ----------------------------
INSERT INTO `qw_config` VALUES (1, '网站标题', 'web_title', 'thinkphp5.0前台', NULL, 'input', '');
INSERT INTO `qw_config` VALUES (2, '网站网址', 'web_url', 'http://www.boke.com/admin', NULL, 'input', NULL);
INSERT INTO `qw_config` VALUES (3, '备案', 'ICP', '备案备案备案备案备案备案备案', NULL, 'textarea', NULL);
INSERT INTO `qw_config` VALUES (4, '网站状态', 'web_status', '开启', NULL, 'radio', '开启,关闭');
INSERT INTO `qw_config` VALUES (9, '下拉菜单', 'xiala', '菜单一', NULL, 'select', '菜单一,菜单二,菜单三,菜单四,菜单五');

-- ----------------------------
-- Table structure for qw_user
-- ----------------------------
DROP TABLE IF EXISTS `qw_user`;
CREATE TABLE `qw_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '管理员表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of qw_user
-- ----------------------------
INSERT INTO `qw_user` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `qw_user` VALUES (2, 'qiuwei', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `qw_user` VALUES (3, 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79');
INSERT INTO `qw_user` VALUES (9, 'cccccc', 'c1f68ec06b490b3ecb4066b1b13a9ee9');
INSERT INTO `qw_user` VALUES (8, 'bbbbbb', '875f26fdb1cecf20ceb4ca028263dec6');
INSERT INTO `qw_user` VALUES (6, 'dddddd', '980ac217c6b51e7dc41040bec1edfec8');

SET FOREIGN_KEY_CHECKS = 1;
