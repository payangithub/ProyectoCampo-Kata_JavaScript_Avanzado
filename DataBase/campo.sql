-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: campo
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cat_productos`
--

DROP TABLE IF EXISTS `cat_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT '',
  `imgicon` varchar(4) DEFAULT NULL,
  `imgbackgraound` varchar(4) DEFAULT NULL,
  `caracteristicas` varchar(1000) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_productos`
--

LOCK TABLES `cat_productos` WRITE;
/*!40000 ALTER TABLE `cat_productos` DISABLE KEYS */;
INSERT INTO `cat_productos` VALUES (1,'TOMATE','0101','0102','El tomate​ o jitomate ​ es el fruto de la planta Solanum lycopersicum, el cual tiene importancia culinaria y es utilizado como verdura. Siendo el tomate una fruta botánicamente clasificado como una baya, es comúnmente usado en arte culinario como un ingrediente vegetal o guarnición','01'),(2,'LIMON','0201','0202','Citrus × limon, el limonero, es un pequeño árbol frutal perenne. Su fruto es el limón ​ o citrón, ​ una fruta comestible de sabor ácido y extremadamente fragante que se usa principalmente en la alimentación. La mayoría de las variedades producen frutos durante todo el año','01'),(3,'CHILE','0301','0302','Se llama chile en México y Centroamérica, ají en Sudamérica y las Antillas o guindilla en España, a varios pimientos picantes. Son los frutos (bayas) de diversas especies de plantas. En algunos países, se le conoce también como chile picante para distinguirlo de su contraparte no picante, llamada chile dulce, pimiento dulce o, en algunos lugares de Hispanoamérica, pimentón o pimiento morrón. Después del intercambio colombino, muchos cultivares se extendieron por el mundo, y se usaron tanto en la gastronomía como en la medicina tradicional.','01'),(4,'ZANAHORIA','0401','0402','Daucus carota sativus, llamada popularmente zanahoria, es la forma domesticada de la zanahoria silvestre, y considerada la más importante y de mayor consumo dentro de esta familia. Actualmente existe un gran número de variedades de zanahoria, presentando una gran diversidad de formas, colores y fecha de cultivo. Todas estas variedades se agrupan en tipos, entre los que se encuentran Danvers, Imperator, Nantes, Touchon, Flakee, Amsterdam, París y Chantenay','01'),(5,'PEPINO','0501','0502','El pepino es una planta anual, monoica, o sea, que hay flores femeninas y masculinas en el mismo individuo. El tallo es postrado/rastrero, ramificado, anguloso, hirsuto y con zarcillos. Las hojas son delgadas, con pecíolo de 8 cm, con limbo de 12-18 por 11-12 cm, viloso-hispídulo en los nervios y piloso en ambas caras; su contorno es cordado-ovado, tri/penta palmatilobado, con lóbulos triangulares, dentados, acuminados o agudos en el ápice, el mediano de mayor longitud y muy agudo. ','01'),(6,'CEBOLLA','0601','0602','Allium cepa, comúnmente conocida como cebolla, es una planta herbácea bienal perteneciente a la familia de las amarilidáceas. Es la especie más cultivada del género Allium, el cual contiene varias especies que se denominan «cebollas» y que se cultivan como alimento','01'),(7,'BERENJENA','0701','0702','Las berenjenas se pueden agrupar bajo criterios muy diferentes. Cuentan con distintas características y se puede hacer referencia a su forma, color o precocidad. También se puede hacer una clasificación de acuerdo al cultivo de berenjena local o más conocido como el geográfico.','01'),(8,'AJO','0801','0802','Allium sativum, el ajo, es una especie tradicionalmente clasificada dentro de la familia de las liliáceas pero que actualmente se ubica en la de las amarilidáceas,1​ aunque este extremo es muy discutido. Al igual que la cebolla (Allium cepa), el puerro (Allium ampeloprasum var. porrum) y la cebolla de invierno o cebollino (Allium fistulosum), es una especie de importancia económica ampliamente cultivada y desconocida en estado silvestr','01'),(9,'APIO','0901','0902','El apio o Apium graveolens es una hortaliza perteneciente a la familia de las Umbelíferas. Se trata de una planta silvestre que, debido a sus propiedades beneficiosas para el organismo, fue cultivada para su producción y comercio.','01'),(10,'BROCCOLI','1001','1002','Brassica oleracea var. italica, el brócoli, ​ brécol​ o bróquil​ del italiano broccoli, es una planta de la familia de las brasicáceas. Existen otras variedades de la misma especie, tales como: repollo, la coliflor, el colinabo y la col de Bruselas.','01'),(11,'CALABACÍN','1101','1102',NULL,'01'),(12,'CALABAZA','1201','1202',NULL,'01'),(13,'CEBOLLETA','1301','1302',NULL,'01'),(14,'CHAMPIÑÓN','1401','1402',NULL,'01'),(15,'COLIFLOR','1501','1502',NULL,'01'),(16,'ESPÁRRAGOS','1601','1602',NULL,'01'),(17,'ESPINACAS','1701','1702',NULL,'01'),(18,'HABA','1801','1802',NULL,'01'),(19,'LECHUGA','1901','1902',NULL,'01'),(20,'PATATA','2001','2002',NULL,'01'),(21,'AGUACATE','2101','2102',NULL,'01'),(22,'COCO','2201','2202',NULL,'01'),(23,'GUAYABA','2301','2302',NULL,'01'),(24,'KIWI','2401','2402',NULL,'01'),(25,'NARANJA','2501','2502',NULL,'01'),(26,'LITCHI','2601','2602',NULL,'01'),(27,'MANGO','2701','2702',NULL,'01'),(28,'MARACUYÁ','2801','2802',NULL,'01'),(29,'PITAHAYA','2901','2902',NULL,'01'),(30,'UVA','3001','3002',NULL,'01'),(31,'CIRUELA','3101','3102',NULL,'01'),(32,'ARÁNDANO','3201','3202',NULL,'01'),(33,'CEREZA','3301','3302',NULL,'01'),(34,'FRAMBUESA','3401','3402',NULL,'01'),(35,'FRESA','3501','3502',NULL,'01'),(36,'GRANADA','3601','3602',NULL,'01'),(37,'HIGO','3701','3702',NULL,'01'),(38,'LIMA','3801','3802',NULL,'01'),(39,'LIMÓN','3901','3902',NULL,'01'),(40,'MANZANA','4001','4002',NULL,'01');
/*!40000 ALTER TABLE `cat_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_variedades`
--

DROP TABLE IF EXISTS `cat_variedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_variedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_variedades`
--

LOCK TABLES `cat_variedades` WRITE;
/*!40000 ALTER TABLE `cat_variedades` DISABLE KEYS */;
INSERT INTO `cat_variedades` VALUES (1,1,'Tomate Bola'),(2,1,'Tomate Saladette'),(3,1,'Tomate Cherry'),(4,2,'Limón Persa'),(5,2,'Limón Real'),(6,2,'Limón Verde');
/*!40000 ALTER TABLE `cat_variedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'campo'
--

--
-- Dumping routines for database 'campo'
--
/*!50003 DROP PROCEDURE IF EXISTS `proc_getproductall` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `proc_getproductall`()
BEGIN
	
	SELECT id,nombre,imgicon,imgbackgraound,caracteristicas,tipo 
	FROM campo.cat_productos
    order by id desc;	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_getproductid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `proc_getproductid`(IN pID INT)
BEGIN
	SELECT a.id,a.nombre,a.imgicon,a.imgbackgraound,a.caracteristicas,a.tipo,group_concat(b.nombre)  
	FROM campo.cat_productos a
		inner join cat_variedades b on(a.id = b.id_producto)
	WHERE a.id = pID; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-06 15:51:20
