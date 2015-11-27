/*
Navicat MySQL Data Transfer

Source Server         : Z_DEDICATO
Source Server Version : 50173
Source Host           : 85.234.146.73:3306
Source Database       : stream-project

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2015-11-27 13:18:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for crons
-- ----------------------------
DROP TABLE IF EXISTS `crons`;
CREATE TABLE `crons` (
  `idcron` int(11) NOT NULL AUTO_INCREMENT,
  `minuto` varchar(4) DEFAULT NULL,
  `ora` varchar(4) DEFAULT NULL,
  `giorno_del_mese` varchar(4) DEFAULT NULL,
  `mese` varchar(4) DEFAULT NULL,
  `giorno_della_settimana` varchar(4) DEFAULT NULL,
  `comando` varchar(500) DEFAULT NULL,
  `videos_has_destinazioni_idvideos_has_destinazioni` int(11) unsigned NOT NULL,
  `next_date` date DEFAULT NULL,
  `next_time` time DEFAULT NULL,
  `inviato` varchar(2) DEFAULT 'n',
  PRIMARY KEY (`idcron`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for destinazioni
-- ----------------------------
DROP TABLE IF EXISTS `destinazioni`;
CREATE TABLE `destinazioni` (
  `iddestinazione` int(11) NOT NULL AUTO_INCREMENT,
  `stream_server` varchar(255) DEFAULT NULL,
  `key_server` varchar(255) DEFAULT NULL,
  `parametri` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iddestinazione`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `idvideo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_video` varchar(255) DEFAULT NULL,
  `size_video` int(11) DEFAULT NULL,
  `uploaded_video` tinyint(1) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `idyoutube` varchar(255) DEFAULT NULL,
  `video_md5` varchar(255) DEFAULT NULL,
  `convertito` varchar(2) DEFAULT 'n',
  PRIMARY KEY (`idvideo`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for videos_has_destinazioni
-- ----------------------------
DROP TABLE IF EXISTS `videos_has_destinazioni`;
CREATE TABLE `videos_has_destinazioni` (
  `idvideos_has_destinazioni` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `videos_idvideo` int(11) unsigned NOT NULL,
  `destinazioni_iddestinazione` int(11) NOT NULL,
  PRIMARY KEY (`idvideos_has_destinazioni`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
