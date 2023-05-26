DROP TABLE IF EXISTS `lan_config`;
create table `lan_config` (
`k` varchar(32) NOT NULL,
`v` text NULL,
PRIMARY KEY  (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `lan_config` VALUES ('cache', '');
INSERT INTO `lan_config` VALUES ('version', '999999');
INSERT INTO `lan_config` VALUES ('admin_user', 'admin');
INSERT INTO `lan_config` VALUES ('admin_pwd', '123456');
INSERT INTO `lan_config` VALUES ('authcode', '1');
INSERT INTO `lan_config` VALUES ('sitename', 'CC测压');
INSERT INTO `lan_config` VALUES ('keywords', 'CC测压');
INSERT INTO `lan_config` VALUES ('description', 'CC测压');
INSERT INTO `lan_config` VALUES ('kfqq', '368001509');
INSERT INTO `lan_config` VALUES ('anounce', '卡密购买地址：联系方式');
INSERT INTO `lan_config` VALUES ('tkjg', '5');
INSERT INTO `lan_config` VALUES ('zkjg', '20');
INSERT INTO `lan_config` VALUES ('nkjg', '50');
INSERT INTO `lan_config` VALUES ('template', 'default');
 
DROP TABLE IF EXISTS `lan_log`;
CREATE TABLE `lan_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(32) NOT NULL,
  `km` varchar(255) NOT NULL,
 `endtime` varchar(255) NOT NULL,
 `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `lan_kms`;
CREATE TABLE `lan_kms` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `km` varchar(255) NOT NULL,
  `addtime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `vip` varchar(255) NOT NULL, 
  `cs` varchar(255) NOT NULL,
  `xc` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL, 
  `cy` varchar(255) DEFAULT NULL, PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

