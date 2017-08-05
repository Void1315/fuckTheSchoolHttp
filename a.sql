/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.7.17-log : Database - db_fuckschool
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_fuckschool` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_fuckschool`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `content` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '内容',
  `agree` int(11) DEFAULT '0' COMMENT '赞同',
  `contra` int(11) DEFAULT '0' COMMENT '反对',
  `reply` int(11) NOT NULL COMMENT '回复',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages` */

insert  into `messages`(`id`,`u_id`,`title`,`content`,`agree`,`contra`,`reply`,`created_at`,`updated_at`,`deleted_at`) values (1,9,'Panel Headline','一二三四五六七八九十',0,0,0,'2017-08-05 16:09:24','2017-08-05 16:09:26',NULL),(2,9,'Panel Headline','一二三四五六七八九十',0,0,0,'2017-08-05 16:09:24','2017-08-05 16:09:26',NULL),(3,9,'Panel Headline','一二三四五六七八九十',0,0,0,'2017-08-05 16:09:24','2017-08-05 16:09:26',NULL),(4,9,'Panel Headline','一二三四五六七八九十',0,0,0,'2017-08-05 16:27:16','2017-08-05 16:27:22',NULL),(5,9,'一二三四五六七八九十','一二三四五六七八九十',0,0,0,'2017-08-05 16:27:18','2017-08-05 16:27:25',NULL),(6,9,'Panel Headline','一二三四五六七八九十',0,0,0,'2017-08-05 16:27:19','2017-08-05 16:27:23',NULL),(7,9,'一二三四五六七八九十','一二三四五六七八九十',0,0,0,'2017-08-05 16:27:20','2017-08-05 16:27:26',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_28_091019_creat_results_table',2),(4,'2017_08_04_081604_creat_message_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `results` */

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` int(11) NOT NULL COMMENT '0第一 1第二',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `results` */

insert  into `results`(`id`,`u_id`,`result`,`year`,`term`,`created_at`,`updated_at`) values (3,2016010322,'{\"0\": {\"0\": \"2016-2017\\u5b66\\u5e74\\u7b2c\\u4e8c\\u5b66\\u671f\", \"1\": \"[15010020]\\u5f62\\u52bf\\u4e0e\\u653f\\u7b561\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u67e5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"84.00\", \"7\": \"2.0\", \"8\": \"3.4\", \"9\": \"6.80\", \"10\": \"\"}, \"1\": {\"0\": \"\", \"1\": \"[15002015]\\u4e2d\\u56fd\\u8fd1\\u73b0\\u4ee3\\u53f2\\u7eb2\\u8981\", \"2\": \"1.5\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"44.00\", \"7\": \"0\", \"8\": \"0\", \"9\": \"0\", \"10\": \"\"}, \"2\": {\"0\": \"\", \"1\": \"[11002040]\\u5927\\u5b66\\u82f1\\u8bedAII\", \"2\": \"4.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"54.00\", \"7\": \"0\", \"8\": \"0\", \"9\": \"0\", \"10\": \"\"}, \"3\": {\"0\": \"\", \"1\": \"[16002010]\\u5927\\u5b66\\u4f53\\u80b2II\", \"2\": \"1.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"90.00\", \"7\": \"1.0\", \"8\": \"4.0\", \"9\": \"4.00\", \"10\": \"\"}, \"4\": {\"0\": \"\", \"1\": \"[03009050]\\u9ad8\\u7b49\\u6570\\u5b66AII\", \"2\": \"5.0\", \"3\": \"\\u4e13\\u4e1a\\u57fa\\u7840\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"70.00\", \"7\": \"5.0\", \"8\": \"2.0\", \"9\": \"10.00\", \"10\": \"\"}, \"5\": {\"0\": \"\", \"1\": \"[03023050]\\u7535\\u5b50\\u6280\\u672f\\u57fa\\u7840\", \"2\": \"5.0\", \"3\": \"\\u4e13\\u4e1a\\u57fa\\u7840\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"63.00\", \"7\": \"5.0\", \"8\": \"1.3\", \"9\": \"6.50\", \"10\": \"\"}, \"6\": {\"0\": \"\", \"1\": \"[03022030]\\u9ad8\\u7ea7\\u8bed\\u8a00II\", \"2\": \"3.0\", \"3\": \"\\u4e13\\u4e1a\\u57fa\\u7840\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"91.00\", \"7\": \"3.0\", \"8\": \"4.1\", \"9\": \"12.30\", \"10\": \"\"}, \"7\": {\"0\": \"\", \"1\": \"[00004340]Photoshop\\u56fe\\u50cf\\u5904\\u7406\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u4efb\\u9009\\u8bfe\", \"4\": \"\\u8003\\u67e5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"85.00\", \"7\": \"2.0\", \"8\": \"3.5\", \"9\": \"7.00\", \"10\": \"\"}}','2016',1,'2017-07-31 21:41:21','2017-07-31 21:41:21'),(4,2016010322,'{\"0\": {\"0\": \"2016-2017\\u5b66\\u5e74\\u7b2c\\u4e00\\u5b66\\u671f\", \"1\": \"[15001020]\\u601d\\u60f3\\u9053\\u5fb7\\u4fee\\u517b\\u4e0e\\u6cd5\\u5f8b\\u57fa\\u7840\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"64.00\", \"7\": \"2.0\", \"8\": \"1.4\", \"9\": \"2.80\", \"10\": \"\"}, \"1\": {\"0\": \"\", \"1\": \"[11001040]\\u5927\\u5b66\\u82f1\\u8bedAI\", \"2\": \"4.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"70.00\", \"7\": \"4.0\", \"8\": \"2.0\", \"9\": \"8.00\", \"10\": \"\"}, \"2\": {\"0\": \"\", \"1\": \"[03008050]\\u9ad8\\u7b49\\u6570\\u5b66AI\", \"2\": \"5.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"71.00\", \"7\": \"5.0\", \"8\": \"2.1\", \"9\": \"10.50\", \"10\": \"\"}, \"3\": {\"0\": \"\", \"1\": \"[15008010]\\u5927\\u5b66\\u751f\\u519b\\u4e8b\\u7406\\u8bba\", \"2\": \"1.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"80.00\", \"7\": \"1.0\", \"8\": \"3.0\", \"9\": \"3.00\", \"10\": \"\"}, \"4\": {\"0\": \"\", \"1\": \"[15006020]\\u5927\\u5b66\\u751f\\u804c\\u4e1a\\u751f\\u6daf\\u89c4\\u5212\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u67e5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"75.00\", \"7\": \"2.0\", \"8\": \"2.5\", \"9\": \"5.00\", \"10\": \"\"}, \"5\": {\"0\": \"\", \"1\": \"[16001010]\\u5927\\u5b66\\u4f53\\u80b2I\", \"2\": \"1.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"75.00\", \"7\": \"1.0\", \"8\": \"2.5\", \"9\": \"2.50\", \"10\": \"\"}, \"6\": {\"0\": \"\", \"1\": \"[0001004]\\u5927\\u5b66\\u751f\\u793e\\u4f1a\\u5b9e\\u8df51\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"85.00\", \"7\": \"2.0\", \"8\": \"3.5\", \"9\": \"7.00\", \"10\": \"\"}, \"7\": {\"0\": \"\", \"1\": \"[04011020]\\u5927\\u5b66\\u751f\\u5fc3\\u7406\\u5065\\u5eb7\\u6559\\u80b2\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"83.00\", \"7\": \"2.0\", \"8\": \"3.3\", \"9\": \"6.60\", \"10\": \"\"}, \"8\": {\"0\": \"\", \"1\": \"[03020020]\\u8ba1\\u7b97\\u673a\\u5bfc\\u8bba\", \"2\": \"2.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u67e5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"88.00\", \"7\": \"2.0\", \"8\": \"3.8\", \"9\": \"7.60\", \"10\": \"\"}, \"9\": {\"0\": \"\", \"1\": \"[03001010]\\u8ba1\\u7b97\\u673a\\u6587\\u5316\\u57fa\\u7840\", \"2\": \"1.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"94.00\", \"7\": \"1.0\", \"8\": \"4.4\", \"9\": \"4.40\", \"10\": \"\"}, \"10\": {\"0\": \"\", \"1\": \"[03031030]\\u9ad8\\u7ea7\\u8bed\\u8a00I\", \"2\": \"3.0\", \"3\": \"\\u516c\\u5171\\u8bfe/\\u5fc5\\u4fee\\u8bfe\", \"4\": \"\\u8003\\u8bd5\", \"5\": \"\\u521d\\u4fee\", \"6\": \"81.00\", \"7\": \"3.0\", \"8\": \"3.1\", \"9\": \"9.30\", \"10\": \"\"}}','2016',0,'2017-07-31 21:41:22','2017-07-31 21:41:22');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_num` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学号',
  `stu_passwd` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '校园网密码',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`stu_num`,`stu_passwd`,`name`,`image`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (9,'2016010322','2016010320','yhy1315',NULL,'381848900@qq.com','$2y$10$ARzL63/tL2NKiorJHeWC4ujt6DLanKflcgcSNBOtIZQ2kvHvzpz/C','iSZ6dO1AhzL88KrEBvlDG8MwyqjwSi2EjxfRnBGnT4XVrx7uS2mmbn0PXn47','2017-08-02 07:17:57','2017-08-04 03:31:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
