
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 10/06/2016 às 22:07:43
-- Versão do Servidor: 10.0.20-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u478312941_krono`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_imoveis`
--

CREATE TABLE IF NOT EXISTS `imagens_imoveis` (
  `id_imagem` int(10) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(10) NOT NULL,
  `caminho_imagem` varchar(150) DEFAULT NULL,
  `ativo` char(2) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id_imagem`),
  KEY `id_imovel` (`id_imovel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `imagens_imoveis`
--

INSERT INTO `imagens_imoveis` (`id_imagem`, `id_imovel`, `caminho_imagem`, `ativo`) VALUES
(37, 50, '2016:06:01-11.46.27kronosimob-151.jpg', '-1'),
(36, 50, '2016:06:01-11.46.27kronosimob-150.jpg', '-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `IdImovel` int(10) NOT NULL AUTO_INCREMENT,
  `IdPessoa` int(10) NOT NULL,
  `IdTipoDeImovel` int(10) NOT NULL,
  `IdTipoDeAcao` int(10) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `n_Quartos` int(3) DEFAULT NULL,
  `n_Banheiros` int(3) DEFAULT NULL,
  `n_Salas` int(3) DEFAULT NULL,
  `n_Vagas` int(3) DEFAULT NULL,
  `tamanho_M` float DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `rua` varchar(20) DEFAULT NULL,
  `numero` varchar(7) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `ativo` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`IdImovel`),
  KEY `IdPessoa` (`IdPessoa`),
  KEY `IdTipoDeAcao` (`IdTipoDeAcao`),
  KEY `IdTipoDeImovel` (`IdTipoDeImovel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`IdImovel`, `IdPessoa`, `IdTipoDeImovel`, `IdTipoDeAcao`, `titulo`, `n_Quartos`, `n_Banheiros`, `n_Salas`, `n_Vagas`, `tamanho_M`, `preco`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `descricao`, `ativo`) VALUES
(50, 15, 1, 1, 'Vendo casa imobiliada', 4, 2, 1, 2, 120, 150, 'Av São João', '120', 'Vila 123', 'São Paulo', 'SP', '01010100', 'Casa em local tranquilo, situada em rua com segurança 24 horas e com facilidade de acesso às principais vias e estabelecimentos da região, tais como: Av. Giovanni Gronchi, Av. Jorge João Saad, ', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `IdPerfil` int(10) NOT NULL AUTO_INCREMENT,
  `Perfil` varchar(60) DEFAULT NULL,
  `Ativo` char(2) DEFAULT '-1',
  PRIMARY KEY (`IdPerfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `idpessoa` int(10) NOT NULL AUTO_INCREMENT,
  `idperfil` int(10) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `ddd_res` varchar(2) DEFAULT NULL,
  `telefone_res` varchar(9) DEFAULT NULL,
  `ddd_cel` varchar(2) DEFAULT NULL,
  `telefone_cel` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`idpessoa`),
  KEY `idperfil` (`idperfil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`idpessoa`, `idperfil`, `nome`, `CPF`, `ddd_res`, `telefone_res`, `ddd_cel`, `telefone_cel`) VALUES
(15, NULL, 'Jonathan Argentão', NULL, NULL, NULL, NULL, NULL),
(26, NULL, 'Teste', NULL, NULL, NULL, NULL, NULL),
(27, NULL, 'jonathan', NULL, NULL, NULL, NULL, NULL),
(28, NULL, 'Danillo Augusto de Brito Silva', NULL, NULL, NULL, NULL, NULL),
(29, NULL, 'jonathan', NULL, NULL, NULL, NULL, NULL),
(30, NULL, 'Vinicius', NULL, NULL, NULL, NULL, NULL),
(31, NULL, 'Prof. Marcos Olimpio', NULL, NULL, NULL, NULL, NULL),
(32, NULL, 'Josemi José dos Santos', NULL, NULL, NULL, NULL, NULL),
(33, NULL, 'Lucas Andrade', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_acao`
--

CREATE TABLE IF NOT EXISTS `tipo_acao` (
  `id_tipo_acao` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_acao` varchar(50) NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id_tipo_acao`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tipo_acao`
--

INSERT INTO `tipo_acao` (`id_tipo_acao`, `tipo_acao`, `ativo`) VALUES
(1, 'acao teste', '-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imoveis`
--

CREATE TABLE IF NOT EXISTS `tipo_imoveis` (
  `id_tipo_imovel` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_imovel` varchar(60) NOT NULL,
  `Ativo` char(2) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id_tipo_imovel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tipo_imoveis`
--

INSERT INTO `tipo_imoveis` (`id_tipo_imovel`, `tipo_imovel`, `Ativo`) VALUES
(1, 'tipo teste', '-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(10) NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` char(2) NOT NULL DEFAULT '-1',
  `idsession` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idpessoa` (`idpessoa`),
  KEY `ativo` (`ativo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idpessoa`, `email`, `senha`, `ativo`, `idsession`) VALUES
(6, 15, 'jonathan_2405@hotmail.com', 'senha', '-1', '9f7e81297ba3a0839e581240bd59ae62'),
(18, 27, 'jonathan.argentao@hotmail.com', 'senha', '-1', '815ab647a278175e62c3ae2608128fce'),
(19, 28, 'danilloaugustobsilva@hotmail.com', 'adminda19101993', '-1', '4921e9f7872a7243a725a2a492a966fb'),
(20, 29, 'j@j.com', 'ss', '-1', 'ad7279576a053a3d5acf3186a8ee3366'),
(21, 30, 'vi_oliveira007@hotmail.com', '061297', '-1', '38031e773bedc31b6d6e1243cffada53'),
(17, 26, 'test@test.com', 'as', '-1', NULL),
(22, 31, 'uninove.projeto3semestre.2016@gmail.com', 'uninove', '-1', '5ebd309e29ae89d98714cc797d16d693'),
(23, 32, 'josemichee@gmail.com', 'anapaula1', '-1', 'af891d8d253252a59fb7dd484afa8dac'),
(24, 33, 'lucas.olivera.andrade@gmail.com', 'lucasandrade', '-1', '1758998051fb3f80ae01224842a36ed6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
