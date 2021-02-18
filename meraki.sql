-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Fev-2021 às 20:31
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meraki`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_page_carroussel`
--

DROP TABLE IF EXISTS `product_page_carroussel`;
CREATE TABLE IF NOT EXISTS `product_page_carroussel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_produto` int(100) NOT NULL,
  `imgs` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product_page_carroussel`
--

INSERT INTO `product_page_carroussel` (`id`, `id_produto`, `imgs`) VALUES
(1, 12, 'accom-1.jpg'),
(2, 12, 'accom-2.jpg'),
(3, 12, 'accom-3.jpg'),
(8, 12, 'construction-2.jpg'),
(7, 12, 'accom-4.jpg'),
(9, 12, 'cowork-2.jpg'),
(13, 11, 'accom-2.jpg'),
(12, 11, 'accom-1.jpg'),
(14, 11, 'accom-3.jpg'),
(15, 11, 'accom-4.jpg'),
(16, 11, 'architecture-1.jpg'),
(17, 10, 'accom-1.jpg'),
(18, 10, 'accom-2.jpg'),
(19, 10, 'accom-3.jpg'),
(20, 10, 'accom-4.jpg'),
(21, 10, 'architecture-1.jpg'),
(22, 9, 'accom-1.jpg'),
(23, 9, 'accom-2.jpg'),
(24, 9, 'accom-3.jpg'),
(25, 9, 'accom-4.jpg'),
(26, 9, 'architecture-1.jpg'),
(27, 9, 'construction-2.jpg'),
(37, 5, 'architecture-1.jpg'),
(36, 5, 'accom-4.jpg'),
(35, 5, 'accom-3.jpg'),
(34, 5, 'accom-2.jpg'),
(33, 5, 'accom-1.jpg'),
(38, 1, 'accom-1.jpg'),
(39, 1, 'accom-2.jpg'),
(40, 1, 'accom-3.jpg'),
(41, 1, 'accom-4.jpg'),
(42, 2, 'accom-1.jpg'),
(43, 2, 'accom-2.jpg'),
(44, 2, 'accom-3.jpg'),
(45, 2, 'accom-4.jpg'),
(46, 3, 'accom-1.jpg'),
(47, 3, 'accom-2.jpg'),
(48, 3, 'accom-3.jpg'),
(49, 3, 'accom-4.jpg'),
(50, 6, 'accom-1.jpg'),
(51, 6, 'accom-2.jpg'),
(52, 6, 'accom-3.jpg'),
(53, 6, 'accom-4.jpg'),
(54, 4, 'accom-1.jpg'),
(55, 4, 'accom-2.jpg'),
(56, 4, 'accom-3.jpg'),
(57, 4, 'accom-4.jpg'),
(58, 7, 'accom-1.jpg'),
(59, 7, 'accom-2.jpg'),
(60, 7, 'accom-3.jpg'),
(61, 7, 'accom-4.jpg'),
(62, 8, 'accom-1.jpg'),
(63, 8, 'accom-2.jpg'),
(64, 8, 'accom-3.jpg'),
(65, 8, 'accom-4.jpg'),
(66, 14, 'accom-1.jpg'),
(67, 14, 'accom-2.jpg'),
(68, 14, 'accom-3.jpg'),
(69, 14, 'accom-4.jpg'),
(70, 13, 'accom-2.jpg'),
(71, 13, 'accom-3.jpg'),
(72, 13, 'accom-4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_page_details`
--

DROP TABLE IF EXISTS `product_page_details`;
CREATE TABLE IF NOT EXISTS `product_page_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_produto` int(100) NOT NULL,
  `specify` varchar(100) NOT NULL,
  `dimensions` varchar(100) NOT NULL,
  `buy_info` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product_page_details`
--

INSERT INTO `product_page_details` (`id`, `id_produto`, `specify`, `dimensions`, `buy_info`) VALUES
(1, 12, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(3, 11, 'Testando testando id 11', 'Testando testando id 11', 'Testando testando id 11'),
(4, 10, 'testando testando id 10', 'testando testando id 10', 'testando testando id 10'),
(5, 9, 'testando produto id 9', 'testando produto id 9', 'testando produto id 9'),
(6, 5, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(7, 1, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(8, 2, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(9, 3, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(10, 6, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(11, 4, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(12, 7, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(13, 8, 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã', 'teste-1, teste-2, teste-3 ááèèçãçã'),
(14, 14, 'teste no produto', '10 x 10', 'Novo Produto Classificado'),
(15, 13, 'Teste de cadastro', '20 x 20', 'Produto de classe A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(100) DEFAULT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `telefone_cliente` varchar(100) DEFAULT NULL,
  `cep_cliente` varchar(100) DEFAULT NULL,
  `rua_cliente` varchar(100) DEFAULT NULL,
  `bairro_cliente` varchar(100) DEFAULT NULL,
  `numero_endereco` varchar(100) DEFAULT NULL,
  `complemento_endereco` varchar(100) DEFAULT NULL,
  `cidade_cliente` varchar(100) DEFAULT NULL,
  `estado_cliente` varchar(2) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `parcela_cartao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `purchase_cart`
--

DROP TABLE IF EXISTS `purchase_cart`;
CREATE TABLE IF NOT EXISTS `purchase_cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(100) DEFAULT NULL,
  `id_compra` int(100) DEFAULT NULL,
  `quantidade_compra` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `register_product`
--

DROP TABLE IF EXISTS `register_product`;
CREATE TABLE IF NOT EXISTS `register_product` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `titulo_produto` varchar(200) NOT NULL,
  `descricao_produto` varchar(2000) NOT NULL,
  `preco_produto` varchar(200) NOT NULL,
  `img_produto` varchar(100) NOT NULL,
  `novo_produto` varchar(4) DEFAULT NULL,
  `status_produto` tinyint(1) NOT NULL,
  `qtd` int(200) DEFAULT NULL,
  `largura` float NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `comprimento` float NOT NULL,
  `diametro` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `register_product`
--

INSERT INTO `register_product` (`id`, `titulo_produto`, `descricao_produto`, `preco_produto`, `img_produto`, `novo_produto`, `status_produto`, `qtd`, `largura`, `peso`, `altura`, `comprimento`, `diametro`) VALUES
(1, 'Alteração Percy Dorado', 'Descrição teste Percy', 'R$ 155,00', 'architecture-3.jpg', '', 1, 20, 20, 20, 15, 20, 15),
(2, 'Calça Masculina ', 'Descrição teste 2', 'R$ 150,00', 'agency-3.jpg', '', 1, 8585, 20, 20, 15, 20, 15),
(3, 'Calça Masculina 3', 'Descrição teste 3', 'R$ 45,00', 'accom-5.jpg', 'Novo', 1, 1350, 20, 20, 15, 20, 15),
(4, 'Novo título produto novo', 'Descrição test 4', 'R$ 150,55', 'accom-5.jpg', 'Novo', 1, 1800, 20, 20, 15, 20, 15),
(5, 'Camiseta manga longa', 'Descrição teste', 'R$ 75,45', 'architecture-3.jpg', 'Novo', 1, 1700, 20, 20, 15, 20, 15),
(6, 'Título teste 2', 'Descrição teste', 'R$ 1.450,00', 'accom-5.jpg', 'Novo', 1, 1300, 20, 20, 15, 20, 15),
(7, 'Título teste', 'Descrição teste', 'R$ 150,00', 'accom-6.jpg', 'Novo', 1, 1500, 20, 20, 15, 20, 15),
(8, 'Maquiagem Feminina', 'Muita maquiagem para vocês', 'R$ 135,00', 'agency-1.jpg', 'Novo', 1, 125, 20, 20, 15, 20, 15),
(9, 'Calça Masculina importada', 'Calça masculina importada muito interessante', 'R$ 1.355,00', 'agency-5.jpg', '', 1, 1250, 20, 20, 15, 20, 15),
(10, 'Camisa Social nova', 'Nova camisa social com um novo preço', 'R$ 145,50', 'blog-1.jpg', '', 1, 5, 20, 20, 15, 20, 15),
(11, 'Perfume feminino ferrari', 'Novo perfume extensão de linha', 'R$ 125,50', 'agency-2.jpg', 'Novo', 1, 10, 20, 20, 15, 20, 15),
(12, 'Celular motorola ', 'Novo celular motorola de qualidade', 'R$ 125,50', 'conference-1.jpg', '', 1, 5, 20, 20, 15, 20, 15),
(13, 'Teste dimensões do produto', 'Teste dimensões do produto', 'R$ 100,00', 'accom-7.jpg', 'Novo', 1, 5, 20, 20, 20, 20, 20),
(14, 'Teste dimensões do produto 2', 'Teste dimensões do produto 2', 'R$ 150,00', 'accom-6.jpg', 'Novo', 1, 9, 15, 15, 15, 22, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `img_user` varchar(100) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_admin`
--

INSERT INTO `user_admin` (`id`, `nome`, `email`, `senha`, `img_user`, `ip`) VALUES
(1, 'Percy Dorado', 'percy@gmail.com', '89794b621a313bb59eed0d9f0f4e8205', 'percy.jpg', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_client`
--

DROP TABLE IF EXISTS `user_client`;
CREATE TABLE IF NOT EXISTS `user_client` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_client`
--

INSERT INTO `user_client` (`id`, `nome`, `email`, `senha`, `ip`) VALUES
(1, 'Roberto Felipe', 'robertodorado7@gmail.com', '89794b621a313bb59eed0d9f0f4e8205', '::1'),
(3, 'Percy Dorado', 'percy@gmail.com', '89794b621a313bb59eed0d9f0f4e8205', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
