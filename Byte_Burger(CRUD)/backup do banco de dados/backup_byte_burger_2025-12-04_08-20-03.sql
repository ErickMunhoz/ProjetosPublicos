-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: thegame
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`idLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (3,'admin','admin'),(6,'123','$2y$10$tdY9PSVo8odktlkuYm1f3O1M.INUcpq9keuTg/OzK5gIfehrEcutu');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(50) NOT NULL,
  `imagemProduto` varchar(100) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL,
  `precoPromocional` decimal(10,2) DEFAULT NULL,
  `fichaTecnica` text NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (7,'cookies','6930e3c459896.gif',15.90,NULL,'Os \"cookies\" no filme Matrix são biscoitos feitos pelo Oráculo que têm um papel simbólico e, possivelmente, uma função no enredo, representando a ideia de que o amor e a fé em si mesmo são essenciais para o desenvolvimento de Neo como o Escolhido.'),(8,'bife','6930e4da340be.gif',39.90,NULL,'A cena de Cypher comendo um bife em The Matrix (1999) é uma das mais icônicas do filme, pois simboliza sua traição e seu desejo de voltar para a Matrix, onde \"a ignorância é uma benção\". Cypher sabe que a comida é uma ilusão criada pelo programa, mas a aprecia mesmo assim, querendo trocar a dura realidade por um conforto simulado e \"esquecer de tudo\".'),(9,'mingau','6930e52c6d59e.gif',29.90,NULL,'O mingau nos filmes Matrix é a comida sintética servida no mundo real para os humanos no aerodeslizador Nabucodonosor. Ele é descrito como um \"colóide unicelular de proteína, vitamina, mineral e aminoácido\" e é comparado a uma \"tigela de ranho\" ou \"catarro\", pois sua textura é bastante desagradável para a tripulação. Essa refeição é um exemplo da realidade brutal e sem prazeres do mundo pós-apocalíptico fora da simulação. '),(10,'vinho','6930eb8b13392.gif',59.90,NULL,'O Château Haut-Brion, 1959, é um vinho de prestígio da região de Bordeaux, famoso por sua elegância, estrutura e potencial de envelhecimento. Em filmes como Matrix Reloaded, ele aparece como um ícone de excelência, sendo o vinho escolhido pelo personagem Merovingian. É um vinho tinto encorpado, com aromas de frutas pretas maduras, especiarias e notas de tabaco e cedro, e paladar com taninos refinados e final persistente.'),(11,'balas','6930ece6df532.gif',9.90,NULL,'As pílulas de Matrix referem-se à icônica cena do filme em que Neo é confrontado com uma escolha: a pílula vermelha, que o libertaria para a dura realidade, ou a pílula azul, que o manteria na ilusão confortável da Matrix. Essa escolha tornou-se uma metáfora amplamente usada para simbolizar a decisão entre a verdade desconfortável e a ignorância feliz, a verdade e a ilusão, ou o despertar e a aceitação do status quo.'),(12,'bolo de código','6930ee34de3af.gif',19.90,NULL,'Durante o segundo filme, no restaurante Le Vrai, O Merovíngio envia para uma mulher loira uma sobremesa programada por ele mesmo. Visualmente, parece ser apenas uma inocente fatia de bolo gourmet de chocolate. Porém, após o consumo, linhas ocultas no código de programação do bolo desencadeiam um poderoso orgasmo na mulher.');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-04  4:20:07
