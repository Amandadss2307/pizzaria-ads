-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Out-2023 às 21:06
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(21) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'USER',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `senha`, `telefone`, `tipo_usuario`) VALUES
(1, 'Usuario Teste', 'teste@gmail.com', 'dfbe9b84722f27c60aade2595f9f66da', '+5511998765432', 'ADMIN'),
(4, 'Arianne', 'arianne@gmail.com', 'dfbe9b84722f27c60aade2595f9f66da', '1236456', 'USER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidora`
--

DROP TABLE IF EXISTS `distribuidora`;
CREATE TABLE IF NOT EXISTS `distribuidora` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cnpj` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(21) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `distribuidora`
--

INSERT INTO `distribuidora` (`id`, `titulo`, `cnpj`, `endereco`, `telefone`, `id_cliente`) VALUES
(15, 'Queijo', '454514', 'Rua Cesário Galeno, 448.', '+55 (11) 45515-4556', 1),
(17, 'Tomate', '54878522215', 'Rua Cesário Galeno, 448.', '+55 (11) 78845-6215', 1),
(18, 'Bacon', '885121244', 'Rua Cesário Galeno, 448.', '+55 (11) 85426-5456', 1),
(19, 'Palmito', '4851545', 'Rua Cesário Galeno, 448.', '+55 (11) 87454-7845', 1),
(20, 'Queijo cheddar', '478478515', 'Rua Cesário Galeno, 448.', '+55 (11) 74525-1456', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao` date NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cliente` int NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `data_criacao`, `img`, `id_cliente`, `descricao`) VALUES
(5, 'Em breve novidades', '2023-10-27', '27b6da7ca2646e2c591342df2549a38e.png', 1, 'Em manutenção'),
(6, 'Promoção de Pizza!', '2022-12-31', '1dcc468d74759e261ccaee320b8df656.jpg', 1, 'O patrão ficou maluco!!!! na compra de 2 pizzas a terceira sai totalmente de graça!!\r\nPromoção válida até as 23:59 de hoje.'),
(7, '>Venha descobrir como nossas deliciosas pizzas são feitas.', '2021-05-31', 'c62a0d597a175d2b04a1becb5a4991db.jpeg', 1, 'O chef está te esperando para te mostrar como é a nossa cozinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `endereco_entrega` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `forma_pagamento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_entrega` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `endereco_entrega`, `forma_pagamento`, `tipo_entrega`, `estado`, `id_cliente`) VALUES
(26, 'Rua Cesário Galeno, 448.', 'dinheiro', 'retirada', 'Preparando', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preco` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `titulo`, `descricao`, `preco`, `img`) VALUES
(20, 'Esfiha de carne', 'Carne com cebola', 3, '456b3327a4cfabd3fab929c81f97c375.jpeg'),
(27, 'Pizza cinco queijos', 'Cinco queijos', 46, '8dbd69bbb5fba6fad251ae3183eccb3f.jpeg'),
(15, 'Esfiha de queijo', 'Queijo', 3, 'ddef27a377821c7aff9bace2ad38f0d0.jpg'),
(16, 'Pizza de calabresa', 'Calabresa com cebola', 35, 'd8e88bba603c2ddb3ad72a818e616ed3.jpeg'),
(17, 'Água sem gás ', 'Água sem gás 500 ml', 3, '6759f54adccf6ffe1a1c5f2c21765025.jpeg'),
(18, 'Coca-cola ', 'Coca-cola 2l', 13, 'ad62e706a6be5134325bd24bc9079257.jpeg'),
(19, 'Guaraná Antárctica', 'Guaraná Antárctica  1,5 L', 10, 'c6d690626937f5456f1fec7179a8a81f.jpeg'),
(21, 'Esfiha de queijo', 'Queijo', 3, 'fd7f1d18d7bd88a36a9b89b6629a07d2.jpeg'),
(22, 'Esfiha de chocolate', 'Chocolate', 5, 'f140f5576881c8e10b2d7ecba497cab9.jpeg'),
(28, 'Pizza carne seca c/banana', 'Carne seca temperada coberta c/catupiry e bananas cortadas ', 34, '81f9c79e4eb43cb2b44f615017b9a079.jpeg'),
(24, 'Pizza frango c/ catupiry', 'Frango com catupiry', 40, '25d3b5b0f9241ddc0726439dadf83bcc.jpeg'),
(25, 'Esfiha de aliche', 'Mussarela, aliche, parmesão e tomate', 6, '07c0e09a87d1cc46f049635749fa2f67.jpeg'),
(26, 'Pizza quatro queijos', 'Quatro queijos', 29, 'cb4963e99961789f9dd3a233025b2e81.jpeg'),
(29, 'Esfiha frango c/ catupiry', 'Frango c/ catupiry', 5, 'cc8d2ff0878c095ed5a13dc7f8bc23f3.jpeg'),
(30, 'Pizza brigadeiro', 'Chocolate ao leite c/ granulado', 31, '88354b2f87e8544b603d236b56859d41.jpeg'),
(31, 'Fanta laranja 1,5', 'Fanta laranja 1,5', 10, '70a4b68464e3025affca95b5681c0696.jpeg'),
(32, 'Coca-cola 350 ml', 'Coca-cola 350 ml', 6, 'af9de5171984ab1e1c35f5a613b45aa5.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido`
--

DROP TABLE IF EXISTS `produto_pedido`;
CREATE TABLE IF NOT EXISTS `produto_pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produto` int NOT NULL,
  `id_pedido` int NOT NULL,
  `qntd` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto_pedido`
--

INSERT INTO `produto_pedido` (`id`, `id_produto`, `id_pedido`, `qntd`) VALUES
(13, 13, 26, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
