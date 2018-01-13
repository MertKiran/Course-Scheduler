
create database Schedularv3;



CREATE TABLE `bolumler` (
  `birim` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birim_adi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`birim`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dersler` (
  `birim` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dkodu` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ders_adi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uyg` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sube` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SINIF` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DersGrubu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `egitmen` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`birim`,`adn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dprog` (
  `birim` varchar(20) DEFAULT NULL,
  `adn` varchar(20) DEFAULT NULL,
  `dilim` varchar(20) DEFAULT NULL,
  `sure` varchar(20) DEFAULT NULL,
  `teo_uyg` varchar(20) DEFAULT NULL,
  KEY `birim` (`birim`,`adn`),
  KEY `fk_adn` (`adn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='foreign key(birim, adn) references dersler(birim,adn)';




USE `schedularv3`;
DROP procedure IF EXISTS `getbirimler`;
DELIMITER $$
USE `schedularv3`$$
CREATE PROCEDURE `getbirimler` ()
BEGIN
SELECT birim_adi,birim FROM bolumler;
END$$
DELIMITER ;




USE `schedularv3`;
DROP procedure IF EXISTS `getdersler`;
DELIMITER $$
USE `schedularv3`$$
CREATE PROCEDURE `getdersler` (birim_val varchar(20),sinif_val varchar(20))
BEGIN
SELECT adn,birim,egitmen,dkodu,ders_adi,teo,uyg,sube,DersGrubu,sinif FROM dersler where birim=birim_val AND sinif=sinif_val ORDER BY ders_adi desc;
END$$
DELIMITER ;



USE `schedularv3`;
DROP procedure IF EXISTS `getgrupdersleri`;
DELIMITER $$
USE `schedularv3`$$
CREATE PROCEDURE `getgrupdersleri` (dersgrubu_val varchar(10))
BEGIN
SELECT adn,birim,dkodu,ders_adi,teo,uyg,sube,dersgrubu,sinif FROM dersler where dersgrubu=dersgrubu_val;
END$$
DELIMITER ;

-- bu procedur kısım calışmıyor belki sonra düzeltilir diye ekliyorum array pass olmuyor

USE `schedularv3`;
DROP procedure IF EXISTS `getdilimler`;
DELIMITER $$
USE `schedularv3`$$
CREATE PROCEDURE `getdilimler` ( array varchar(200) )
BEGIN
SELECT adn ,dilim,sure,teo_uyg FROM dprog WHERE adn IN ('+array+');
--  calısmamaktadır direkt php uzerinde sorgudan çalışmaktadır. array pass calışmamamktadır.
END$$
DELIMITER ;
-- bu procedure çalışmamaktadır array pass olmuyor
