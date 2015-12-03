-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2015 às 21:00
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pisotaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `analise`
--

CREATE TABLE IF NOT EXISTS `analise` (
`id` int(11) NOT NULL,
  `nomepiso` varchar(50) DEFAULT NULL,
  `qtdpiso` int(11) NOT NULL DEFAULT '0',
  `custopiso` float NOT NULL DEFAULT '0',
  `qtddesperdicio` int(11) NOT NULL DEFAULT '0',
  `custorejunte` float NOT NULL DEFAULT '0',
  `custototal` float NOT NULL DEFAULT '0',
  `idRelatorio` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `analise`
--

INSERT INTO `analise` (`id`, `nomepiso`, `qtdpiso`, `custopiso`, `qtddesperdicio`, `custorejunte`, `custototal`, `idRelatorio`) VALUES
(1, 'NomePiso', 100, 120, 3, 130, 250, 1),
(2, 'Nero Preto Triunfo', 116, 1564.84, 5, 0, 1890.84, 1),
(3, 'Versailles Gelo Ceral', 47, 704.53, 1, 0, 1030.53, 1),
(4, 'Capri HD Casagrês', 238, 734.36, 2, 531.7, 2578.51, 21),
(5, 'Kera Lef', 260, 780, 0, 531.7, 2624.15, 21),
(6, 'Capri HD Casagrês', 238, 734.36, 2, 531.7, 2578.51, 22),
(7, 'Kera Lef', 260, 780, 0, 531.7, 2624.15, 22),
(8, 'Capri HD Casagrês', 238, 734.36, 2, 531.7, 2578.51, 23),
(9, 'Kera Lef', 260, 780, 0, 531.7, 2624.15, 23),
(10, 'Capri HD Casagrês', 238, 734.36, 2, 531.7, 2578.51, 24),
(11, 'Kera Lef', 260, 780, 0, 531.7, 2624.15, 24),
(12, 'Santa Fé Cedro HD Pamesa', 56, 1034.64, 0, 227.7, 1658.24, 25),
(13, 'Kera Lef', 97, 312, 8, 227.7, 935.6, 25),
(14, 'Versailles Gelo Ceral', 72, 316, 0, 227.7, 939.6, 25),
(15, 'Piso Customizado', 76, 315, 1, 37.95, 748.85, 26),
(16, 'Kera Lef', 97, 312, 8, 227.7, 935.6, 26),
(17, 'Versailles Gelo Ceral', 72, 316, 0, 227.7, 939.6, 26),
(18, ' Rustique Rouge Itagres', 86, 1378.26, 3, 368.1, 2126.05, 27),
(19, 'Canyon Al Cecrisa', 42, 557.55, 3, 163.6, 1100.84, 27),
(20, 'Santa Fé Cedro HD Pamesa', 42, 775.98, 3, 163.6, 1319.27, 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(6) unsigned NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `argamassa`
--

CREATE TABLE IF NOT EXISTS `argamassa` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `preco` double NOT NULL,
  `peso` float NOT NULL,
  `rendimento` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `argamassa`
--

INSERT INTO `argamassa` (`id`, `nome`, `descricao`, `tipo`, `preco`, `peso`, `rendimento`) VALUES
(1, 'Argamassa Cinza Precon', 'Argamassa show de bola', 'acii', 16.9, 20, 4),
(2, 'Argamassa Porcelanato Cinza Votoran', 'Argamassa show de bola', 'acii', 20.9, 20, 4),
(3, 'Argamassa Cinza Weber Qua', 'Argamassa show de bola', 'aci', 9.59, 20, 4),
(4, 'Argamassa Interno Cinza Fortaleza', 'Argamassa show de bola', 'aci', 8.29, 20, 5),
(5, 'Argamassa Cinza Fortaleza', 'Argamassa show de bola', 'aci', 4.69, 5, 5),
(6, 'Argamassa Cinza Premium Portokoll', 'Argamassa show de bola', 'acii', 36.9, 20, 4),
(9, 'Argamassa Grandes Formatos Cinza Fo', 'Argamassa show de bola', 'aciii', 30.9, 20, 5),
(10, 'Argamassa Pastilha Cerâmica Fortale', 'Argamassa show de bola', 'aciii', 3.19, 1, 4.5),
(11, 'Argamassa Pastilha Cerâmica Azul Fo', 'Argamassa show de bola', 'aciii', 40.9, 20, 4.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `piso`
--

CREATE TABLE IF NOT EXISTS `piso` (
  `id` int(6) unsigned NOT NULL,
  `nome` varchar(50) NOT NULL,
  `comprimento` double NOT NULL,
  `largura` double NOT NULL,
  `altura` double NOT NULL,
  `preco` double NOT NULL,
  `resistencia` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `piso`
--

INSERT INTO `piso` (`id`, `nome`, `comprimento`, `largura`, `altura`, `preco`, `resistencia`, `quantidade`, `tipo`, `url`) VALUES
(1, ' Rustique Rouge Itagres', 17, 103, 10, 106.02, 3, 7, 'Porcelanato', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/porcelanato_borda_reta_rustique_rouge_17x103cm_itagres_89044816_0001_600x600.jpg'),
(2, 'Versailles Gelo Ceral', 52, 52, 7.2, 39.5, 4, 10, 'Cerâmico', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/piso_brilhante_bold_versailles_gelo_52x52_ceral__88376876_0001_600x600.jpg'),
(3, 'Canyon Al Cecrisa', 60, 60, 9.5, 61.95, 4, 5, 'Porcelanato', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/porcelanato_bold_canyon_al_creme_60x60cm__cecrisa_88398863_0001_600x600.jpg'),
(4, 'Santa Fé Cedro HD Pamesa', 60, 60, 9.6, 86.22, 4, 5, 'Cerâmico', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/piso_ceramico_brilhante_santa_fe_cedro_hd_60x60cm_pamesa_89043255_0001_600x600.jpg'),
(5, 'Capri HD Casagrês', 46, 46, 7, 33.38, 5, 11, 'Cerâmico', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/piso_ceramico_semi_brilho_capri_hd_46x46cm_casagres_89037690_0001_600x600.jpg'),
(6, 'Kera Lef', 44, 44, 7, 39, 4, 13, 'Cerâmico', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/piso_brilhante_bold_kera_44524_bege_44x44_lef_87725190_0001_600x600.jpg'),
(7, 'Oviedo Beige Itagres', 45, 45, 7.9, 43.26, 4, 9, 'Porcelanato', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/porcelanato_bold_oviedo_beige_0_45x0_45cm_itagres_87670772_0001_600x600.jpg'),
(8, 'Arabesco Branco Via Rosa', 54, 54, 8.2, 75.08, 4, 6, 'Porcelanato', 'https://s3-sa-east-1.amazonaws.com/leroy-production//uploads/img/products/porcelanato_retificado_branco_arabesco_54x54cm_via_rosa_88347252_0001_600x600.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(6) unsigned NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `peso` int(11) NOT NULL,
  `preco` float NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `peso`, `preco`, `tipo`) VALUES
(1, 'Raspador de Rejunte Cortag', 'Substitua o rejunte velho da sua casa!', 0, 37.9, 'ferramenta'),
(2, 'Espaçador Nivelador 1,5mm Cortag', 'Tenha um piso perfeitamente alinhado em sua casa.', 0, 22.9, 'espacador'),
(3, 'Espaçador 2mm Cortag', 'Tenha os pisos de sua casa perfeitamente alinhados', 0, 2.15, 'espacador'),
(4, 'Tinta para Rejunte Branco 200ml Fortaleza', 'Pinte o rejunte velho da sua casa!', 200, 36.9, 'outros'),
(5, 'Espaçador 8mm Cortag', 'Separe corretamente os pisos da sua casa.', 0, 2.15, 'espacador'),
(6, 'Cortador de Piso Duplex 75cm Irwin', 'Corte os pisos com precisão', 0, 375.99, 'ferramentas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rejunte`
--

CREATE TABLE IF NOT EXISTS `rejunte` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `preco` double NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rejunte`
--

INSERT INTO `rejunte` (`id`, `nome`, `descricao`, `tipo`, `preco`, `peso`) VALUES
(1, 'Rejunte Preto Eliane', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 40.9, 1),
(2, 'Rejunte Cinza Argatex', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 47.9, 0.75),
(3, 'Rejunte Super Branco Elia', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 80.9, 2),
(4, 'Rejunte Bege Portokoll', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 37.95, 1),
(5, 'Rejunte Cinza Portokoll', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 37.95, 1),
(6, 'Rejunte Branco Argatex', 'Texto descritivo para este Rejunte show de bola', 'epoxi', 38.9, 1.5),
(11, 'Rejunte Verde Fortaleza', 'Rejunte top do mercado', 'acrilico', 28.9, 1),
(12, 'Rejunte Marfim Portokoll', 'Rejunte top do mercado', 'acrilico', 25.9, 1),
(13, 'Rejunte Preto Fortaleza', 'Rejunte top do mercado', 'acrilico', 27.9, 1),
(14, 'Rejunte Branco Argatex', 'Rejunte top do mercado', 'acrilico', 22.9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE IF NOT EXISTS `relatorio` (
`id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `custototalargamassa` float NOT NULL DEFAULT '0',
  `customaodeobra` float NOT NULL DEFAULT '0',
  `custototalprodutos` float NOT NULL DEFAULT '0',
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio`
--

INSERT INTO `relatorio` (`id`, `nome`, `descricao`, `custototalargamassa`, `customaodeobra`, `custototalprodutos`, `idusuario`) VALUES
(1, '', '', 10, 10, 10, 1),
(17, '', '', 16.9, 1256.5, 39.05, NULL),
(18, '', '', 16.9, 1256.5, 39.05, NULL),
(19, '', '', 16.9, 1256.5, 39.05, NULL),
(20, '', '', 16.9, 1256.5, 39.05, NULL),
(21, '', '', 16.9, 1256.5, 39.05, NULL),
(22, '', '', 16.9, 1256.5, 39.05, NULL),
(23, '', '', 16.9, 1256.5, 39.05, NULL),
(24, '', '', 16.9, 1256.5, 39.05, 2),
(25, 'Relatorio sala', 'descrição teste bla bla bla', 20.9, 375, 0, 2),
(26, 'Relatório Teste', 'Relatório feito para teste de persistência no banco de dados', 20.9, 375, 0, 2),
(27, 'teste relatorio 324', 'texto de descrição', 4.69, 375, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_carrinho`
--

CREATE TABLE IF NOT EXISTS `tbl_carrinho` (
  `id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `preco` double(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `sessao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_carrinho`
--

INSERT INTO `tbl_carrinho` (`id`, `cod`, `nome`, `preco`, `qtd`, `sessao`) VALUES
(1, 0, 'Pa', 12.00, 1, 'k7oq84ckdu3noj1hrqqhc3mcn0'),
(2, 0, 'Rejunte', 15.00, 1, 'k7oq84ckdu3noj1hrqqhc3mcn0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopiso`
--

CREATE TABLE IF NOT EXISTS `tipopiso` (
  `id` int(6) unsigned NOT NULL,
  `componente` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idpiso` int(6) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipopiso`
--

INSERT INTO `tipopiso` (`id`, `componente`, `nome`, `idpiso`) VALUES
(1, NULL, 'ceramica', NULL),
(2, NULL, 'porcelanato', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` char(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `CPF`, `email`, `senha`, `username`) VALUES
(1, 'Usuario1', '123', '@', '123', NULL),
(2, 'adan', '123', 'adan@pisotaria.tk', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analise`
--
ALTER TABLE `analise`
 ADD PRIMARY KEY (`id`), ADD KEY `idRelatorio` (`idRelatorio`), ADD KEY `idRelatorio_2` (`idRelatorio`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `argamassa`
--
ALTER TABLE `argamassa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piso`
--
ALTER TABLE `piso`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejunte`
--
ALTER TABLE `rejunte`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analise`
--
ALTER TABLE `analise`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `analise`
--
ALTER TABLE `analise`
ADD CONSTRAINT `idrelatorio` FOREIGN KEY (`idRelatorio`) REFERENCES `relatorio` (`id`);

--
-- Limitadores para a tabela `relatorio`
--
ALTER TABLE `relatorio`
ADD CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
