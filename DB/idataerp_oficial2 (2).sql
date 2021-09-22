-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 08:28 AM
-- Server version: 8.0.26
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idataerp_oficial2`
--

-- --------------------------------------------------------

--
-- Table structure for table `arm`
--

CREATE TABLE `arm` (
  `arm_id` varchar(15) NOT NULL,
  `arm_descricao` varchar(60) DEFAULT NULL,
  `arm_datacriacao` datetime DEFAULT NULL,
  `arm_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `arm`
--

INSERT INTO `arm` (`arm_id`, `arm_descricao`, `arm_datacriacao`, `arm_dataactualizacao`) VALUES
('1', 'arm1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banco`
--

CREATE TABLE `banco` (
  `banco_id` varchar(15) NOT NULL,
  `banco_sigla` varchar(15) DEFAULT NULL,
  `banco_descricao` varchar(60) DEFAULT NULL,
  `banco_datacriacao` datetime DEFAULT NULL,
  `banco_dataactualizacao` datetime DEFAULT NULL,
  `banco_utilizadorcriacao` int DEFAULT NULL,
  `banco_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `banco`
--

INSERT INTO `banco` (`banco_id`, `banco_sigla`, `banco_descricao`, `banco_datacriacao`, `banco_dataactualizacao`, `banco_utilizadorcriacao`, `banco_utilizadoractualizacao`) VALUES
('1', 'BIM', 'Millennium BIM', NULL, NULL, NULL, NULL),
('2', 'STD BANK', 'Standard Bank', NULL, NULL, NULL, NULL),
('3', 'UNICO', 'Banco Único', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caixa`
--

CREATE TABLE `caixa` (
  `caixa_id` varchar(15) NOT NULL,
  `caixa_descricao` varchar(60) DEFAULT NULL,
  `caixa_datacriacao` datetime DEFAULT NULL,
  `caixa_dataactualizacao` datetime DEFAULT NULL,
  `caixa_utilizadorcriacao` int DEFAULT NULL,
  `caixa_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `cencusto`
--

CREATE TABLE `cencusto` (
  `cencusto_id` varchar(15) NOT NULL,
  `cencusto_descricao` varchar(60) DEFAULT NULL,
  `cencusto_datacriacao` datetime DEFAULT NULL,
  `cencusto_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cencusto`
--

INSERT INTO `cencusto` (`cencusto_id`, `cencusto_descricao`, `cencusto_datacriacao`, `cencusto_dataactualizacao`) VALUES
('1', 'Sede', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cff`
--

CREATE TABLE `cff` (
  `idcff` int UNSIGNED NOT NULL,
  `ncff` int UNSIGNED DEFAULT NULL,
  `no` int DEFAULT NULL,
  `sigla` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tipo` int UNSIGNED DEFAULT NULL,
  `desctipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `movstk` bit(1) DEFAULT NULL,
  `movtes` bit(1) DEFAULT NULL,
  `princ` bit(1) DEFAULT NULL COMMENT 'documento padrao'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Configuracao de documentos de facturacao de fornecedores' PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `cli`
--

CREATE TABLE `cli` (
  `cli_id` varchar(15) NOT NULL,
  `cli_numero` decimal(16,0) DEFAULT NULL,
  `cli_nome` varchar(60) DEFAULT NULL,
  `cli_morada` varchar(255) DEFAULT NULL,
  `cli_telefone` varchar(60) DEFAULT NULL,
  `cli_celular` varchar(60) DEFAULT NULL,
  `cli_fax` varchar(60) DEFAULT NULL,
  `cli_email` varchar(255) DEFAULT NULL,
  `cli_nuit` varchar(15) DEFAULT NULL,
  `cli_tipocliid` varchar(15) DEFAULT NULL,
  `cli_vendid` varchar(15) DEFAULT NULL,
  `cli_valmin` decimal(16,2) DEFAULT NULL,
  `cli_valmax` decimal(16,2) DEFAULT NULL,
  `cli_tipodesconto` decimal(1,0) DEFAULT NULL,
  `cli_desconto` decimal(16,2) DEFAULT NULL,
  `cli_moedaid` varchar(15) DEFAULT NULL,
  `cli_estado` decimal(1,0) DEFAULT NULL,
  `cli_codtabpreco` decimal(1,0) DEFAULT NULL,
  `cli_importador` decimal(1,0) DEFAULT NULL,
  `cli_exportador` decimal(1,0) DEFAULT NULL,
  `cli_observacao` text,
  `cli_paisid` varchar(15) DEFAULT NULL,
  `cli_prontopag` decimal(1,0) DEFAULT NULL,
  `cli_cencustoid` varchar(15) DEFAULT NULL,
  `cli_armazemid` varchar(15) DEFAULT NULL,
  `cli_ivaincluido` decimal(1,0) DEFAULT NULL,
  `cli_ivaisento` decimal(1,0) DEFAULT NULL,
  `cli_nomecomercial` varchar(60) DEFAULT NULL,
  `cli_condpagid` varchar(15) DEFAULT NULL,
  `cli_tipoagencia` decimal(1,0) DEFAULT NULL,
  `cli_valoragencia` decimal(16,2) DEFAULT NULL,
  `cli_taxaagencia` decimal(6,0) DEFAULT NULL,
  `cli_contador` decimal(1,0) DEFAULT NULL,
  `cli_leiturainicial` decimal(16,2) DEFAULT NULL,
  `cli_zonaid` varchar(15) DEFAULT NULL,
  `cli_numerocontador` varchar(60) DEFAULT NULL,
  `cli_rua` varchar(60) DEFAULT NULL,
  `cli_datacriacao` datetime DEFAULT NULL,
  `cli_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cli`
--

INSERT INTO `cli` (`cli_id`, `cli_numero`, `cli_nome`, `cli_morada`, `cli_telefone`, `cli_celular`, `cli_fax`, `cli_email`, `cli_nuit`, `cli_tipocliid`, `cli_vendid`, `cli_valmin`, `cli_valmax`, `cli_tipodesconto`, `cli_desconto`, `cli_moedaid`, `cli_estado`, `cli_codtabpreco`, `cli_importador`, `cli_exportador`, `cli_observacao`, `cli_paisid`, `cli_prontopag`, `cli_cencustoid`, `cli_armazemid`, `cli_ivaincluido`, `cli_ivaisento`, `cli_nomecomercial`, `cli_condpagid`, `cli_tipoagencia`, `cli_valoragencia`, `cli_taxaagencia`, `cli_contador`, `cli_leiturainicial`, `cli_zonaid`, `cli_numerocontador`, `cli_rua`, `cli_datacriacao`, `cli_dataactualizacao`) VALUES
('2BC94524-74CB-1', '2', 'Marcelo More', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('59F37840-6784-1', '1', 'Cliente Teste', NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, '12232443434', '1', '1', NULL, NULL, NULL, NULL, '0', '1', '1', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `codconta`
--

CREATE TABLE `codconta` (
  `codconta_id` varchar(15) NOT NULL,
  `codconta_sigla` varchar(15) DEFAULT NULL,
  `codconta_descricao` varchar(60) DEFAULT NULL,
  `codconta_datacriacao` datetime DEFAULT NULL,
  `codconta_dataactualizacao` datetime DEFAULT NULL,
  `codconta_utilizadorcriacao` int DEFAULT NULL,
  `codconta_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `codmovstk`
--

CREATE TABLE `codmovstk` (
  `codmovstk_id` varchar(15) NOT NULL,
  `codmovstk_codigo` int DEFAULT NULL,
  `codmovstk_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `codmovtes`
--

CREATE TABLE `codmovtes` (
  `codmovtes_id` varchar(15) NOT NULL,
  `codmovtes_codigo` varchar(15) DEFAULT NULL,
  `codmov_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `condpag`
--

CREATE TABLE `condpag` (
  `condpag_id` varchar(15) NOT NULL,
  `condpag_descricao` varchar(60) DEFAULT NULL,
  `condpag_dias` decimal(3,0) DEFAULT NULL,
  `condpag_datacriacao` datetime DEFAULT NULL,
  `condpag_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `contatesoura`
--

CREATE TABLE `contatesoura` (
  `contatesoura_id` varchar(15) NOT NULL,
  `contatesoura_numero` decimal(16,0) DEFAULT NULL,
  `contatesoura_sigla` varchar(15) DEFAULT NULL,
  `contatesoura_descricao` varchar(60) DEFAULT NULL,
  `contatesoura_bancoid` varchar(15) DEFAULT NULL,
  `contatesoura_nib` varchar(60) DEFAULT NULL,
  `contatesoura_morada` varchar(255) DEFAULT NULL,
  `contatesoura_contacto` varchar(60) DEFAULT NULL,
  `contatesoura_pessoacontacto` varchar(60) DEFAULT NULL,
  `contatesoura_observacao` text,
  `contatesoura_datacricacao` datetime DEFAULT NULL,
  `contatesoura_dataatualizacao` datetime DEFAULT NULL,
  `contatesoura_utilizadorcriacao` int DEFAULT NULL,
  `contatesoura_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contatesoura`
--

INSERT INTO `contatesoura` (`contatesoura_id`, `contatesoura_numero`, `contatesoura_sigla`, `contatesoura_descricao`, `contatesoura_bancoid`, `contatesoura_nib`, `contatesoura_morada`, `contatesoura_contacto`, `contatesoura_pessoacontacto`, `contatesoura_observacao`, `contatesoura_datacricacao`, `contatesoura_dataatualizacao`, `contatesoura_utilizadorcriacao`, `contatesoura_utilizadoractualizacao`) VALUES
('1', '100120012', 'BIM', 'BIM POS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', '10025220', 'CAIXA', 'Caixa Central', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ecran`
--

CREATE TABLE `ecran` (
  `ecran_id` varchar(15) NOT NULL,
  `ecran_nome` varchar(60) DEFAULT NULL,
  `ecran_descricao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `emp_id` varchar(15) NOT NULL,
  `emp_sigla` varchar(10) DEFAULT NULL,
  `emp_nome` varchar(60) DEFAULT NULL,
  `emp_morada` varchar(255) DEFAULT NULL,
  `emp_telefone` varchar(255) DEFAULT NULL,
  `emp_fax` varchar(255) DEFAULT NULL,
  `emp_celular` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_actividade` varchar(255) DEFAULT NULL,
  `emp_nuit` varchar(20) DEFAULT NULL,
  `emp_moedaid` varchar(15) DEFAULT NULL,
  `emp_infobancaria` varchar(255) DEFAULT NULL,
  `emp_declarante` varchar(60) DEFAULT NULL,
  `emp_refdeclarante` varchar(20) DEFAULT NULL,
  `emp_website` varchar(60) DEFAULT NULL,
  `emp_slogan` varchar(255) DEFAULT NULL,
  `emp_logotipo` blob,
  `emp_tecconta` varchar(60) DEFAULT NULL,
  `emp_teccontaref` varchar(60) DEFAULT NULL,
  `emp_reparticaofinancas` varchar(255) DEFAULT NULL,
  `emp_coddgi` varchar(255) DEFAULT NULL,
  `emp_observacao` text,
  `emp_capitalsocial` decimal(16,2) DEFAULT NULL,
  `emp_datacriacao` datetime DEFAULT NULL,
  `emp_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ent`
--

CREATE TABLE `ent` (
  `ent_id` varchar(15) NOT NULL,
  `ent_nome` varchar(60) DEFAULT NULL,
  `ent_morada` varchar(255) DEFAULT NULL,
  `ent_telefone` varchar(60) DEFAULT NULL,
  `ent_celular` varchar(60) DEFAULT NULL,
  `ent_fax` varchar(60) DEFAULT NULL,
  `ent_email` varchar(255) DEFAULT NULL,
  `ent_nuit` varchar(15) DEFAULT NULL,
  `ent_tipo` varchar(45) DEFAULT NULL,
  `ent_vendid` varchar(15) DEFAULT NULL,
  `ent_moedaid` varchar(15) DEFAULT NULL,
  `ent_estado` decimal(1,0) DEFAULT NULL,
  `ent_observacao` text,
  `ent_paisid` varchar(15) DEFAULT NULL,
  `ent_cencustoid` varchar(15) DEFAULT NULL,
  `ent_armazemid` varchar(15) DEFAULT NULL,
  `ent_zonaid` varchar(15) DEFAULT NULL,
  `ent_datacriacao` datetime DEFAULT NULL,
  `ent_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fat`
--

CREATE TABLE `fat` (
  `fat_id` varchar(15) NOT NULL,
  `fat_tipofatid` varchar(15) DEFAULT NULL,
  `fat_numero` decimal(16,0) DEFAULT NULL,
  `fat_dataemissao` date DEFAULT NULL,
  `fat_datavencimento` date DEFAULT NULL,
  `fat_cliid` varchar(15) DEFAULT NULL,
  `fat_moedaid` varchar(15) DEFAULT NULL,
  `fat_subtotal` decimal(16,2) DEFAULT NULL,
  `fat_percentdesconto` decimal(16,2) DEFAULT NULL,
  `fat_valordesconto` decimal(16,2) DEFAULT NULL,
  `fat_totaliva` decimal(16,2) DEFAULT NULL,
  `fat_total` decimal(16,2) DEFAULT NULL,
  `fat_msubtotal` decimal(16,2) DEFAULT NULL,
  `fat_mvalordesconto` decimal(16,2) DEFAULT NULL,
  `fat_mtotaliva` decimal(16,2) DEFAULT NULL,
  `fat_mtotal` decimal(16,2) DEFAULT NULL,
  `fat_vendid` varchar(15) DEFAULT NULL,
  `fat_cambio` decimal(16,2) DEFAULT NULL,
  `fat_cambiofixo` decimal(1,0) DEFAULT NULL,
  `fat_anulado` decimal(1,0) DEFAULT NULL,
  `fat_numerointerno` varchar(60) DEFAULT NULL,
  `fat_cencustoid` varchar(15) DEFAULT NULL,
  `fat_origemid` int DEFAULT NULL,
  `fat_aprovado` decimal(1,0) DEFAULT NULL,
  `fat_adjudicado` decimal(1,0) DEFAULT NULL,
  `fat_dataadjudicacao` date DEFAULT NULL,
  `fat_mesa` varchar(60) DEFAULT NULL,
  `fat_fechada` decimal(1,0) DEFAULT NULL,
  `fat_entid` varchar(15) DEFAULT NULL,
  `fat_caixaid` varchar(15) DEFAULT NULL,
  `fat_sectorid` varchar(15) DEFAULT NULL,
  `fat_datacriacao` datetime DEFAULT NULL,
  `fat_dataactualizacao` datetime DEFAULT NULL,
  `fat_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `fat_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fat`
--

INSERT INTO `fat` (`fat_id`, `fat_tipofatid`, `fat_numero`, `fat_dataemissao`, `fat_datavencimento`, `fat_cliid`, `fat_moedaid`, `fat_subtotal`, `fat_percentdesconto`, `fat_valordesconto`, `fat_totaliva`, `fat_total`, `fat_msubtotal`, `fat_mvalordesconto`, `fat_mtotaliva`, `fat_mtotal`, `fat_vendid`, `fat_cambio`, `fat_cambiofixo`, `fat_anulado`, `fat_numerointerno`, `fat_cencustoid`, `fat_origemid`, `fat_aprovado`, `fat_adjudicado`, `fat_dataadjudicacao`, `fat_mesa`, `fat_fechada`, `fat_entid`, `fat_caixaid`, `fat_sectorid`, `fat_datacriacao`, `fat_dataactualizacao`, `fat_utilizadorcriacao`, `fat_utilizadoractualizacao`) VALUES
('59F37840-6784-1', '2', '3', '2020-04-02', '2020-05-02', '59F37840-6784-1', '12232443434', '2075.00', NULL, '0.00', '425.00', '2500.00', NULL, NULL, NULL, NULL, 'a1jhdhjhfdsfhs1', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('B6955D3A-74D8-1', '2', '2', '2020-04-02', '2020-04-02', '2BC94524-74CB-1', '12232443434', '6000.00', NULL, '0.00', '1020.00', '7020.00', NULL, NULL, NULL, NULL, 'a1jhdhjhfdsfhs1', NULL, NULL, NULL, '1001', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E4BB1308-7405-1', '1', '1', '2020-02-25', '2020-03-25', '59F37840-6784-1', 'b5f6b6f4-57d1-1', '6450.00', NULL, '0.00', '1241.00', '7691.00', NULL, NULL, NULL, NULL, 'a1jhdhjhfdsfhs1', NULL, NULL, NULL, 'RF0001', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fatitem`
--

CREATE TABLE `fatitem` (
  `fatitem_id` int NOT NULL,
  `fatitem_fatid` varchar(15) NOT NULL,
  `fatitem_stkid` varchar(15) DEFAULT NULL,
  `fatitem_descricao` varchar(60) DEFAULT NULL,
  `fatitem_quantidade` decimal(16,2) DEFAULT NULL,
  `fatitem_armid` varchar(15) DEFAULT NULL,
  `fatitem_preco` decimal(16,2) DEFAULT NULL,
  `fatitem_mpreco` decimal(16,2) DEFAULT NULL,
  `fatitem_tabivaid` varchar(15) DEFAULT NULL,
  `fatitem_valoriva` decimal(16,2) DEFAULT NULL,
  `fatitem_mvaloriva` decimal(16,2) DEFAULT NULL,
  `fatitem_ivaincluido` decimal(1,0) DEFAULT NULL,
  `fatitem_percentdesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_valordesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_mvalordesconto` decimal(16,2) DEFAULT NULL,
  `fatitem_subtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_msubtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_total` decimal(16,2) DEFAULT NULL,
  `fatitem_mtotal` decimal(16,2) DEFAULT NULL,
  `fatitem_loteid` varchar(15) DEFAULT NULL,
  `fatitem_origemid` int DEFAULT NULL,
  `fatitem_quantidade2` decimal(16,2) DEFAULT NULL,
  `fatitem_quantidade3` decimal(16,2) DEFAULT NULL,
  `fatitem_tabprecoid` varchar(15) DEFAULT NULL,
  `fatitem_quantmedida` decimal(16,2) DEFAULT NULL,
  `fatitem_totalmedida` decimal(16,2) DEFAULT NULL,
  `fatitem_quantdecimal` decimal(16,2) DEFAULT NULL,
  `fatitem_datacriacao` datetime DEFAULT NULL,
  `fatitem_dataactualizacao` datetime DEFAULT NULL,
  `fatitem_utilizadorcriacao` int DEFAULT NULL,
  `fatitem_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fatitem`
--

INSERT INTO `fatitem` (`fatitem_id`, `fatitem_fatid`, `fatitem_stkid`, `fatitem_descricao`, `fatitem_quantidade`, `fatitem_armid`, `fatitem_preco`, `fatitem_mpreco`, `fatitem_tabivaid`, `fatitem_valoriva`, `fatitem_mvaloriva`, `fatitem_ivaincluido`, `fatitem_percentdesconto`, `fatitem_valordesconto`, `fatitem_mvalordesconto`, `fatitem_subtotal`, `fatitem_msubtotal`, `fatitem_total`, `fatitem_mtotal`, `fatitem_loteid`, `fatitem_origemid`, `fatitem_quantidade2`, `fatitem_quantidade3`, `fatitem_tabprecoid`, `fatitem_quantmedida`, `fatitem_totalmedida`, `fatitem_quantdecimal`, `fatitem_datacriacao`, `fatitem_dataactualizacao`, `fatitem_utilizadorcriacao`, `fatitem_utilizadoractualizacao`) VALUES
(3, 'E4BB1308-7405-1', 'BEEC6144-6917-1', 'Produto Teste 01', '2.00', NULL, '2500.00', NULL, '2', '850.00', NULL, '1', '0.00', '0.00', NULL, '4150.00', NULL, '5000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'E4BB1308-7405-1', 'D1A82DBE-69BF-1', 'vdvdvdfvdfv', '1.00', NULL, '2000.00', NULL, '2', '340.00', NULL, '0', '0.00', '0.00', NULL, '2000.00', NULL, '2340.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'E4BB1308-7405-1', '1581499399', 'osdh', '1.00', NULL, '300.00', NULL, '2', '51.00', NULL, '0', '0.00', '0.00', NULL, '300.00', NULL, '351.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'B6955D3A-74D8-1', 'D1A82DBE-69BF-1', 'vdvdvdfvdfv', '3.00', NULL, '2000.00', NULL, '2', '1020.00', NULL, '0', '0.00', '0.00', NULL, '6000.00', NULL, '7020.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '59F37840-6784-1', 'BEEC6144-6917-1', 'Produto Teste 01', '1.00', NULL, '2500.00', NULL, '2', '425.00', NULL, '1', '0.00', '0.00', NULL, '2075.00', NULL, '2500.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ff`
--

CREATE TABLE `ff` (
  `idff` int UNSIGNED NOT NULL,
  `numero` int DEFAULT NULL,
  `datae` date DEFAULT NULL,
  `datav` date DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `pdesc` decimal(10,0) DEFAULT NULL,
  `desconto` decimal(10,0) DEFAULT NULL,
  `piva` decimal(10,0) DEFAULT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `estado` int DEFAULT NULL COMMENT 'cancelado',
  `fnc_idfnc` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `cff_idcff` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Documentos de facturacao de fornecedores' PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `ffl`
--

CREATE TABLE `ffl` (
  `idffl` int UNSIGNED NOT NULL,
  `ff_idff` int UNSIGNED NOT NULL,
  `ref` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `datae` date DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `piva` decimal(10,0) DEFAULT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `ivainc` decimal(10,0) DEFAULT NULL,
  `pdesc` decimal(10,0) DEFAULT NULL,
  `desconto` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='tabela filha de ff... deve ter uma grelha' PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `fnc`
--

CREATE TABLE `fnc` (
  `idfnc` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fnc_numero` int UNSIGNED DEFAULT NULL,
  `nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `telefone` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `celular` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nuit` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='cliente' PACK_KEYS=0;

--
-- Dumping data for table `fnc`
--

INSERT INTO `fnc` (`idfnc`, `fnc_numero`, `nome`, `morada`, `telefone`, `celular`, `email`, `nuit`) VALUES
('A69D5964-1B18-1', 3, 'Anisio Bule', 'Maputo', '867705109', '21345678', 'anisio.bule@gmail.com', 45678966);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `grupo_id` varchar(15) NOT NULL,
  `grupo_descricao` varchar(60) DEFAULT NULL,
  `grupo_datacriacao` datetime DEFAULT NULL,
  `grupo_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`grupo_id`, `grupo_descricao`, `grupo_datacriacao`, `grupo_dataactualizacao`) VALUES
('1', 'Consumíveis', NULL, NULL),
('2', 'Metais', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lote`
--

CREATE TABLE `lote` (
  `lote_id` varchar(15) NOT NULL,
  `lote_descricao` varchar(60) DEFAULT NULL,
  `lote_validade` date DEFAULT NULL,
  `lote_stkid` varchar(15) DEFAULT NULL,
  `lote_datacriacao` datetime DEFAULT NULL,
  `lote_dataactualizacao` datetime DEFAULT NULL,
  `lote_utilizadorcriacao` int DEFAULT NULL,
  `lote_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `marca_id` varchar(15) NOT NULL,
  `marca_descricao` varchar(60) DEFAULT NULL,
  `marca_datacriacao` datetime DEFAULT NULL,
  `marca_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`marca_id`, `marca_descricao`, `marca_datacriacao`, `marca_dataactualizacao`) VALUES
('1', 'marca1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mod`
--

CREATE TABLE `mod` (
  `mod_id` varchar(15) NOT NULL,
  `mod_codigo` decimal(11,0) DEFAULT NULL,
  `mod_descricao` varchar(60) DEFAULT NULL,
  `mod_datacriacao` datetime DEFAULT NULL,
  `mod_dataactualizacao` datetime DEFAULT NULL,
  `mod_utilizadorcriacao` varchar(15) DEFAULT NULL,
  `mod_utilizadoractualizacao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `moeda`
--

CREATE TABLE `moeda` (
  `moeda_id` varchar(15) NOT NULL,
  `moeda_sigla` varchar(10) DEFAULT NULL,
  `moeda_descricao` varchar(60) DEFAULT NULL,
  `moeda_datacriacao` datetime DEFAULT NULL,
  `moeda_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `moeda`
--

INSERT INTO `moeda` (`moeda_id`, `moeda_sigla`, `moeda_descricao`, `moeda_datacriacao`, `moeda_dataactualizacao`) VALUES
('12232443434', 'MZN', 'Metical', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('b5f6b6f4-57d1-1', 'EUR', 'EURO', '1900-01-01 00:00:00', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movtes`
--

CREATE TABLE `movtes` (
  `movtes_id` int NOT NULL,
  `movtes_data` datetime DEFAULT NULL,
  `movtes_tipomov` decimal(1,0) DEFAULT NULL,
  `movtes_valor` decimal(16,2) DEFAULT NULL,
  `movtes_codcontaid` varchar(15) DEFAULT NULL,
  `movtes_numtitulo` varchar(60) DEFAULT NULL,
  `movtes_moedaid` varchar(15) DEFAULT NULL,
  `movtes_mvalor` decimal(16,2) DEFAULT NULL,
  `movtes_cencustoid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `pais_id` varchar(15) NOT NULL,
  `pais_descricao` varchar(60) DEFAULT NULL,
  `pais_datacriacao` datetime DEFAULT NULL,
  `pais_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rec`
--

CREATE TABLE `rec` (
  `rec_id` int NOT NULL,
  `rec_numero` decimal(16,0) DEFAULT NULL,
  `rec_cliid` varchar(15) DEFAULT NULL,
  `rec_moedaid` varchar(15) DEFAULT NULL,
  `rec_total` decimal(16,2) DEFAULT NULL,
  `rec_mtotal` decimal(16,2) DEFAULT NULL,
  `rec_cencustoid` varchar(15) DEFAULT NULL,
  `rec_data` date DEFAULT NULL,
  `rec_anulado` decimal(1,0) DEFAULT NULL,
  `rec_observacao` text,
  `rec_datacriacao` datetime DEFAULT NULL,
  `rec_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `recitem`
--

CREATE TABLE `recitem` (
  `recitem_id` varchar(15) NOT NULL,
  `recitem_recid` varchar(15) DEFAULT NULL,
  `recitem_fatid` varchar(15) DEFAULT NULL,
  `recitem_valorpagar` decimal(16,2) DEFAULT NULL,
  `recitem_valorpago` decimal(16,2) DEFAULT NULL,
  `recitem_mvalorpagar` decimal(16,2) DEFAULT NULL,
  `recitem_datacriacao` datetime DEFAULT NULL,
  `recitem_dataactualizacao` datetime DEFAULT NULL,
  `recitem_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `recitem_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `sector_id` varchar(15) NOT NULL,
  `sector_descricao` varchar(60) DEFAULT NULL,
  `sector_datacriacao` datetime DEFAULT NULL,
  `sector_dataactualizacao` datetime DEFAULT NULL,
  `caixa_utilizadorcriacao` int DEFAULT NULL,
  `caixa_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `stk`
--

CREATE TABLE `stk` (
  `stk_id` varchar(15) NOT NULL,
  `stk_referencia` varchar(60) DEFAULT NULL,
  `stk_descricao` varchar(60) DEFAULT NULL,
  `stk_servico` decimal(1,0) DEFAULT NULL,
  `stk_tabivaid` varchar(15) DEFAULT NULL,
  `stk_grupoid` varchar(15) DEFAULT NULL,
  `stk_codbarra` varchar(60) DEFAULT NULL,
  `stk_unimedid` varchar(15) DEFAULT NULL,
  `stk_negativo` decimal(1,0) DEFAULT NULL,
  `stk_avisanegativo` decimal(1,0) DEFAULT NULL,
  `stk_pontoencomenda` decimal(16,2) DEFAULT NULL,
  `stk_usalote` decimal(1,0) DEFAULT NULL,
  `stk_observacao` text,
  `stk_estado` decimal(1,0) DEFAULT NULL,
  `stk_quantreserva` decimal(16,2) DEFAULT NULL,
  `stk_previsto` decimal(16,2) DEFAULT NULL,
  `stk_produtocomposto` decimal(1,0) DEFAULT NULL,
  `stk_armazemid` varchar(15) DEFAULT NULL,
  `stk_imagem` varchar(255) DEFAULT NULL,
  `stk_pos` decimal(1,0) DEFAULT NULL,
  `stk_descricaopos` varchar(60) DEFAULT NULL,
  `stk_marcaid` varchar(15) DEFAULT NULL,
  `stk_reffornecedor` varchar(60) DEFAULT NULL,
  `stk_usadesctecnica` decimal(1,0) DEFAULT NULL,
  `stk_desctecnica` text,
  `stk_datacriacao` datetime DEFAULT NULL,
  `stk_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stk`
--

INSERT INTO `stk` (`stk_id`, `stk_referencia`, `stk_descricao`, `stk_servico`, `stk_tabivaid`, `stk_grupoid`, `stk_codbarra`, `stk_unimedid`, `stk_negativo`, `stk_avisanegativo`, `stk_pontoencomenda`, `stk_usalote`, `stk_observacao`, `stk_estado`, `stk_quantreserva`, `stk_previsto`, `stk_produtocomposto`, `stk_armazemid`, `stk_imagem`, `stk_pos`, `stk_descricaopos`, `stk_marcaid`, `stk_reffornecedor`, `stk_usadesctecnica`, `stk_desctecnica`, `stk_datacriacao`, `stk_dataactualizacao`) VALUES
('1581499399', '123', 'osdh', '1', '1', '1', '123', '1', '1', '1', '123.00', '1', '123', NULL, '123.00', '123.00', NULL, '1', '788c498b9a9f565e348c629682b8f6eb.jpg', '1', '1234', '1', '123', '1', '123', '2020-02-20 10:58:03', '2020-02-20 10:58:03'),
('BEEC6144-6917-1', 'Ref001', 'Produto Teste 01', '0', '2', '1', '00066655625953266', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '3324', NULL, NULL, '2020-03-18 02:55:02', '2020-03-18 02:55:02'),
('D09D9335-69C0-1', '66', '66', '0', '2', '1', '00066655625953266', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '00202', NULL, NULL, '2020-03-19 11:04:59', '2020-03-19 03:04:33'),
('D1A82DBE-69BF-1', 'tdvdvdv', 'vdvdvdfvdfv', '0', '2', '1', '12344324324', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '2020-03-19 10:57:51', '2020-03-19 10:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `tabiva`
--

CREATE TABLE `tabiva` (
  `tabiva_id` varchar(15) NOT NULL,
  `tabiva_descricao` varchar(60) DEFAULT NULL,
  `tabiva_taxa` decimal(16,2) DEFAULT NULL,
  `tabiva_datacriacao` datetime DEFAULT NULL,
  `tabiva_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabiva`
--

INSERT INTO `tabiva` (`tabiva_id`, `tabiva_descricao`, `tabiva_taxa`, `tabiva_datacriacao`, `tabiva_dataactualizacao`) VALUES
('1', '0%', '0.00', NULL, NULL),
('2', '17%', '0.17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabpreco`
--

CREATE TABLE `tabpreco` (
  `tabpreco_id` varchar(15) NOT NULL,
  `tabpreco_stkid` varchar(15) DEFAULT NULL,
  `tabpreco_codigo` decimal(1,0) DEFAULT NULL,
  `tabpreco_ivainc` int DEFAULT NULL,
  `tabpreco_preco` decimal(16,2) DEFAULT NULL,
  `tabpreco_datacriacao` datetime DEFAULT NULL,
  `tabpreco_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tabpreco`
--

INSERT INTO `tabpreco` (`tabpreco_id`, `tabpreco_stkid`, `tabpreco_codigo`, `tabpreco_ivainc`, `tabpreco_preco`, `tabpreco_datacriacao`, `tabpreco_dataactualizacao`) VALUES
('4872ABCB-69E2-1', 'D09D9335-69C0-1', '1', 0, '800.00', '2020-03-19 03:04:33', '2020-03-19 03:04:33'),
('BEF5AE29-6917-1', 'BEEC6144-6917-1', '1', 1, '2500.00', '2020-03-18 02:55:02', '2020-03-18 02:55:02'),
('BF2692AE-6917-1', 'BEEC6144-6917-1', '2', 0, '2580.00', '2020-03-18 02:55:03', '2020-03-18 02:55:03'),
('D1BEFC85-69BF-1', 'D1A82DBE-69BF-1', '1', 0, '2000.00', '2020-03-19 10:57:51', '2020-03-19 10:57:51'),
('D1CF0AB2-69BF-1', 'D1A82DBE-69BF-1', '2', 0, '5000.00', '2020-03-19 10:57:51', '2020-03-19 10:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `tipocli`
--

CREATE TABLE `tipocli` (
  `tipocli_id` varchar(15) NOT NULL,
  `tipocli_descricao` varchar(60) DEFAULT NULL,
  `tipocli_datacriacao` datetime DEFAULT NULL,
  `tipocli_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tipocli`
--

INSERT INTO `tipocli` (`tipocli_id`, `tipocli_descricao`, `tipocli_datacriacao`, `tipocli_dataactualizacao`) VALUES
('1', 'dsfsd', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2', 'NORMAL', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2155', 'csdc', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2575', 'especial', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('2775', 'esdsfv', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('3', 'DFDF', '1900-01-01 00:00:00', '1900-01-01 00:00:00'),
('463a7077-5322-1', 'eweed', '1900-01-01 00:00:00', '1900-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tipofat`
--

CREATE TABLE `tipofat` (
  `tipofat_id` varchar(15) NOT NULL,
  `tipofat_sigla` varchar(10) DEFAULT NULL,
  `tipofat_descricao` varchar(60) DEFAULT NULL,
  `tipofat_alteranomeseq` decimal(1,0) DEFAULT NULL,
  `tipofat_controladata` decimal(1,0) DEFAULT NULL,
  `tipofat_armid` varchar(15) DEFAULT NULL,
  `tipofat_armpredefinidoid` varchar(15) DEFAULT NULL,
  `tipofat_movstk` decimal(1,0) DEFAULT NULL,
  `tipofat_codmovstkid` varchar(15) DEFAULT NULL,
  `tipofat_usastkcomposto` decimal(1,0) DEFAULT NULL,
  `tipofat_obrigacentrocusto` decimal(1,0) DEFAULT NULL,
  `tipofat_movtes` decimal(1,0) DEFAULT NULL,
  `tipofat_codmovtesid` varchar(15) DEFAULT NULL,
  `tipofat_predefinido` decimal(1,0) DEFAULT NULL,
  `tipofat_introduzdirectacli` decimal(1,0) DEFAULT NULL,
  `tipofat_cencustoid` varchar(15) DEFAULT NULL,
  `tipofat_movreservastk` decimal(1,0) DEFAULT NULL,
  `tipofat_movnagativostk` decimal(1,0) DEFAULT NULL,
  `tipofat_armazemdefeito` decimal(1,0) DEFAULT NULL,
  `tipofat_copiaquant` decimal(1,0) DEFAULT NULL,
  `tipofat_diasvencimento` decimal(2,0) DEFAULT NULL,
  `tipofat_datacriacao` datetime DEFAULT NULL,
  `tipofat_dataactualizacao` datetime DEFAULT NULL,
  `tipofat_utilizadorcriacao` decimal(11,0) DEFAULT NULL,
  `tipofat_utilizadoractualizacao` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tipofat`
--

INSERT INTO `tipofat` (`tipofat_id`, `tipofat_sigla`, `tipofat_descricao`, `tipofat_alteranomeseq`, `tipofat_controladata`, `tipofat_armid`, `tipofat_armpredefinidoid`, `tipofat_movstk`, `tipofat_codmovstkid`, `tipofat_usastkcomposto`, `tipofat_obrigacentrocusto`, `tipofat_movtes`, `tipofat_codmovtesid`, `tipofat_predefinido`, `tipofat_introduzdirectacli`, `tipofat_cencustoid`, `tipofat_movreservastk`, `tipofat_movnagativostk`, `tipofat_armazemdefeito`, `tipofat_copiaquant`, `tipofat_diasvencimento`, `tipofat_datacriacao`, `tipofat_dataactualizacao`, `tipofat_utilizadorcriacao`, `tipofat_utilizadoractualizacao`) VALUES
('1', 'FAT', 'Factura', '0', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'VD', 'Venda a Dinheiro', '0', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'FATP', 'Factura Proforma', '0', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipopag`
--

CREATE TABLE `tipopag` (
  `tipopag_id` varchar(15) NOT NULL,
  `tipopag_descricao` varchar(60) DEFAULT NULL,
  `tipopag_tipo` decimal(1,0) DEFAULT NULL,
  `tipopag_obriganumtitulo` decimal(1,0) DEFAULT NULL,
  `tipopag_numerario` decimal(1,0) DEFAULT NULL,
  `tipopag_datacriacao` datetime DEFAULT NULL,
  `tipopag_dataactualizacao` datetime DEFAULT NULL,
  `tipopag_utilizadorcriacao` int DEFAULT NULL,
  `tipopag_utilizadoractualizacao` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tipopag`
--

INSERT INTO `tipopag` (`tipopag_id`, `tipopag_descricao`, `tipopag_tipo`, `tipopag_obriganumtitulo`, `tipopag_numerario`, `tipopag_datacriacao`, `tipopag_dataactualizacao`, `tipopag_utilizadorcriacao`, `tipopag_utilizadoractualizacao`) VALUES
('1', 'Numerário', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'Cheque', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'Depósito', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('4', 'Transferência', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tiporec`
--

CREATE TABLE `tiporec` (
  `tiporec_id` varchar(15) NOT NULL,
  `tiporec_numero` decimal(16,2) DEFAULT NULL,
  `tiporec_sigla` varchar(10) DEFAULT NULL,
  `tiporec _descricao` varchar(60) DEFAULT NULL,
  `tiporec_tipopagid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `unimed`
--

CREATE TABLE `unimed` (
  `unimed_id` varchar(15) NOT NULL,
  `unimed_sigla` varchar(15) DEFAULT NULL,
  `unimed_descricao` varchar(60) DEFAULT NULL,
  `unimed_datacriacao` datetime DEFAULT NULL,
  `unimed_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `unimed`
--

INSERT INTO `unimed` (`unimed_id`, `unimed_sigla`, `unimed_descricao`, `unimed_datacriacao`, `unimed_dataactualizacao`) VALUES
('1', 'UN', 'Unidade', NULL, NULL),
('2', 'KG', 'Kilograma', NULL, NULL),
('3', 'M', 'Metro', NULL, NULL),
('4', 'CM', 'Centímetro', NULL, NULL),
('5', 'H', 'Hora', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `util`
--

CREATE TABLE `util` (
  `util_id` varchar(15) NOT NULL,
  `util_nome` varchar(60) DEFAULT NULL,
  `util_login` varchar(60) DEFAULT NULL,
  `util_estado` decimal(1,0) DEFAULT NULL,
  `util_apenaspos` decimal(1,0) DEFAULT NULL,
  `util_email` varchar(255) DEFAULT NULL,
  `util_senha` varchar(255) DEFAULT NULL,
  `util_datacriacao` datetime DEFAULT NULL,
  `util_dataactualizacao` datetime DEFAULT NULL,
  `util_utilizadorcriacao` varchar(15) DEFAULT NULL,
  `util_utilizadoractualizacao` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `util`
--

INSERT INTO `util` (`util_id`, `util_nome`, `util_login`, `util_estado`, `util_apenaspos`, `util_email`, `util_senha`, `util_datacriacao`, `util_dataactualizacao`, `util_utilizadorcriacao`, `util_utilizadoractualizacao`) VALUES
('1', 'admin', 'admin', '1', '0', 'demo@demo.co.mz', '$2y$10$.ZzCuM7A9a8Awmu0mbFnaOjouikU5475uJR3HaqN.rhtvhznH6V1W', '2020-02-04 00:00:00', '2020-02-04 00:00:00', '', ''),
('cc5d7e73-57e1-1', 'ede', 'de', '0', '0', NULL, '$2a$10$eZFpkWHKsAj6YIZwz1Hp4ewg/Mgr7btU7DkqmKJx2s.n6PUDze0mS', '1900-01-01 00:00:00', '1900-01-01 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilacessos`
--

CREATE TABLE `utilacessos` (
  `utilacessos_id` varchar(15) NOT NULL,
  `utilacessos_descricao` varchar(255) DEFAULT NULL,
  `utilacessos_introduzir` decimal(1,0) DEFAULT NULL,
  `utilacessos_visualizar` decimal(1,0) DEFAULT NULL,
  `utilacessos_editar` decimal(1,0) DEFAULT NULL,
  `utilacessos_anular` decimal(1,0) DEFAULT NULL,
  `utilacessos_apagar` decimal(1,0) DEFAULT NULL,
  `utilacessos_imprimir` decimal(1,0) DEFAULT NULL,
  `utilacessos_utilid` varchar(15) DEFAULT NULL,
  `utilacessos_ecranid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `vend`
--

CREATE TABLE `vend` (
  `vend_id` varchar(15) NOT NULL,
  `vend_nome` varchar(60) DEFAULT NULL,
  `vend_email` varchar(255) DEFAULT NULL,
  `vend_posto` varchar(60) DEFAULT NULL,
  `vend_telefone` varchar(15) DEFAULT NULL,
  `vend_datacriacao` datetime DEFAULT NULL,
  `vend_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `vend`
--

INSERT INTO `vend` (`vend_id`, `vend_nome`, `vend_email`, `vend_posto`, `vend_telefone`, `vend_datacriacao`, `vend_dataactualizacao`) VALUES
('a1jhdhjhfdsfhs1', 'Francisco Chambule', 'fchambule@infordata.co.mz', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `zona_id` varchar(15) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `zona_datacriacao` datetime DEFAULT NULL,
  `zona_dataactualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`zona_id`, `descricao`, `zona_datacriacao`, `zona_dataactualizacao`) VALUES
('C0B69BC3-5160-1', 'zonz1', '2020-02-17 00:00:00', '2020-02-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arm`
--
ALTER TABLE `arm`
  ADD PRIMARY KEY (`arm_id`);

--
-- Indexes for table `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`banco_id`);

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`caixa_id`);

--
-- Indexes for table `cencusto`
--
ALTER TABLE `cencusto`
  ADD PRIMARY KEY (`cencusto_id`);

--
-- Indexes for table `cff`
--
ALTER TABLE `cff`
  ADD PRIMARY KEY (`idcff`);

--
-- Indexes for table `cli`
--
ALTER TABLE `cli`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `fk_cli_tipocli1_idx` (`cli_tipocliid`),
  ADD KEY `fk_cli_vend1_idx` (`cli_vendid`),
  ADD KEY `fk_cli_moeda1_idx` (`cli_moedaid`),
  ADD KEY `fk_cli_pais1_idx` (`cli_paisid`),
  ADD KEY `fk_cli_cencusto1_idx` (`cli_cencustoid`),
  ADD KEY `fk_cli_armazem1_idx` (`cli_armazemid`),
  ADD KEY `fk_cli_condpag1_idx` (`cli_condpagid`),
  ADD KEY `fk_cli_zona1_idx` (`cli_zonaid`);

--
-- Indexes for table `codconta`
--
ALTER TABLE `codconta`
  ADD PRIMARY KEY (`codconta_id`);

--
-- Indexes for table `codmovstk`
--
ALTER TABLE `codmovstk`
  ADD PRIMARY KEY (`codmovstk_id`);

--
-- Indexes for table `codmovtes`
--
ALTER TABLE `codmovtes`
  ADD PRIMARY KEY (`codmovtes_id`);

--
-- Indexes for table `condpag`
--
ALTER TABLE `condpag`
  ADD PRIMARY KEY (`condpag_id`);

--
-- Indexes for table `contatesoura`
--
ALTER TABLE `contatesoura`
  ADD PRIMARY KEY (`contatesoura_id`),
  ADD KEY `fk_contatesoura_banco1_idx` (`contatesoura_bancoid`);

--
-- Indexes for table `ecran`
--
ALTER TABLE `ecran`
  ADD PRIMARY KEY (`ecran_id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `fk_emp_moeda1_idx` (`emp_moedaid`);

--
-- Indexes for table `ent`
--
ALTER TABLE `ent`
  ADD PRIMARY KEY (`ent_id`),
  ADD KEY `fk_cli_vend1_idx` (`ent_vendid`),
  ADD KEY `fk_cli_moeda1_idx` (`ent_moedaid`),
  ADD KEY `fk_cli_pais1_idx` (`ent_paisid`),
  ADD KEY `fk_cli_cencusto1_idx` (`ent_cencustoid`),
  ADD KEY `fk_cli_armazem1_idx` (`ent_armazemid`),
  ADD KEY `fk_cli_zona1_idx` (`ent_zonaid`);

--
-- Indexes for table `fat`
--
ALTER TABLE `fat`
  ADD PRIMARY KEY (`fat_id`),
  ADD KEY `fk_fat_tipofat1_idx` (`fat_tipofatid`),
  ADD KEY `fk_fat_cli1_idx` (`fat_cliid`),
  ADD KEY `fk_fat_moeda1_idx` (`fat_moedaid`),
  ADD KEY `fk_fat_vend1_idx` (`fat_vendid`),
  ADD KEY `fk_fat_cencusto1_idx` (`fat_cencustoid`),
  ADD KEY `fk_fat_ent1_idx` (`fat_entid`),
  ADD KEY `fk_fat_caixa1_idx` (`fat_caixaid`),
  ADD KEY `fk_fat_sector1_idx` (`fat_sectorid`);

--
-- Indexes for table `fatitem`
--
ALTER TABLE `fatitem`
  ADD PRIMARY KEY (`fatitem_id`),
  ADD KEY `fk_fatitem_tabiva1_idx` (`fatitem_tabivaid`),
  ADD KEY `fk_fatitem_stk1_idx` (`fatitem_stkid`),
  ADD KEY `fk_fatitem_lote1_idx` (`fatitem_loteid`),
  ADD KEY `fk_fatitem_tabpreco1_idx` (`fatitem_tabprecoid`),
  ADD KEY `fk_fatitem_fat1_idx` (`fatitem_fatid`);

--
-- Indexes for table `ff`
--
ALTER TABLE `ff`
  ADD PRIMARY KEY (`idff`),
  ADD KEY `fk_ff_fnc1_idx` (`fnc_idfnc`),
  ADD KEY `fk_ff_cff1_idx` (`cff_idcff`);

--
-- Indexes for table `ffl`
--
ALTER TABLE `ffl`
  ADD PRIMARY KEY (`idffl`),
  ADD KEY `ffl_FKIndex1` (`ff_idff`);

--
-- Indexes for table `fnc`
--
ALTER TABLE `fnc`
  ADD PRIMARY KEY (`idfnc`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`grupo_id`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`lote_id`),
  ADD KEY `fk_lote_stk1_idx` (`lote_stkid`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marca_id`);

--
-- Indexes for table `mod`
--
ALTER TABLE `mod`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `fk_mod_util1_idx` (`mod_utilizadorcriacao`),
  ADD KEY `fk_mod_util2_idx` (`mod_utilizadoractualizacao`);

--
-- Indexes for table `moeda`
--
ALTER TABLE `moeda`
  ADD PRIMARY KEY (`moeda_id`);

--
-- Indexes for table `movtes`
--
ALTER TABLE `movtes`
  ADD PRIMARY KEY (`movtes_id`),
  ADD KEY `fk_movtes_codconta1_idx` (`movtes_codcontaid`),
  ADD KEY `fk_movtes_moeda1_idx` (`movtes_moedaid`),
  ADD KEY `fk_movtes_cencusto1_idx` (`movtes_cencustoid`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indexes for table `rec`
--
ALTER TABLE `rec`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `fk_rec_cli1_idx` (`rec_cliid`),
  ADD KEY `fk_rec_moeda1_idx` (`rec_moedaid`),
  ADD KEY `fk_rec_cencusto1_idx` (`rec_cencustoid`);

--
-- Indexes for table `recitem`
--
ALTER TABLE `recitem`
  ADD PRIMARY KEY (`recitem_id`),
  ADD KEY `fk_recitem_rec1_idx` (`recitem_recid`),
  ADD KEY `fk_recitem_fat1_idx` (`recitem_fatid`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `stk`
--
ALTER TABLE `stk`
  ADD PRIMARY KEY (`stk_id`),
  ADD KEY `fk_stk_tabiva_idx` (`stk_tabivaid`),
  ADD KEY `fk_stk_grupo1_idx` (`stk_grupoid`),
  ADD KEY `fk_stk_unimed1_idx` (`stk_unimedid`),
  ADD KEY `fk_stk_armazem1_idx` (`stk_armazemid`),
  ADD KEY `fk_stk_marca1_idx` (`stk_marcaid`);

--
-- Indexes for table `tabiva`
--
ALTER TABLE `tabiva`
  ADD PRIMARY KEY (`tabiva_id`);

--
-- Indexes for table `tabpreco`
--
ALTER TABLE `tabpreco`
  ADD PRIMARY KEY (`tabpreco_id`),
  ADD KEY `fk_tabpreco_stk1_idx` (`tabpreco_stkid`);

--
-- Indexes for table `tipocli`
--
ALTER TABLE `tipocli`
  ADD PRIMARY KEY (`tipocli_id`);

--
-- Indexes for table `tipofat`
--
ALTER TABLE `tipofat`
  ADD PRIMARY KEY (`tipofat_id`),
  ADD KEY `fk_tipofat_arm1_idx` (`tipofat_armid`),
  ADD KEY `fk_tipofat_arm2_idx` (`tipofat_armpredefinidoid`),
  ADD KEY `fk_tipofat_codmovstk1_idx` (`tipofat_codmovstkid`),
  ADD KEY `fk_tipofat_codmovtes1_idx` (`tipofat_codmovtesid`),
  ADD KEY `fk_tipofat_cencusto1_idx` (`tipofat_cencustoid`);

--
-- Indexes for table `tipopag`
--
ALTER TABLE `tipopag`
  ADD PRIMARY KEY (`tipopag_id`);

--
-- Indexes for table `tiporec`
--
ALTER TABLE `tiporec`
  ADD PRIMARY KEY (`tiporec_id`),
  ADD KEY `fk_tiporec_tipopag1_idx` (`tiporec_tipopagid`);

--
-- Indexes for table `unimed`
--
ALTER TABLE `unimed`
  ADD PRIMARY KEY (`unimed_id`);

--
-- Indexes for table `util`
--
ALTER TABLE `util`
  ADD PRIMARY KEY (`util_id`),
  ADD KEY `fk_util_util1_idx` (`util_utilizadorcriacao`),
  ADD KEY `fk_util_util2_idx` (`util_utilizadoractualizacao`);

--
-- Indexes for table `utilacessos`
--
ALTER TABLE `utilacessos`
  ADD PRIMARY KEY (`utilacessos_id`),
  ADD KEY `fk_utilacessos_util1_idx` (`utilacessos_utilid`),
  ADD KEY `fk_utilacessos_ecran1_idx` (`utilacessos_ecranid`);

--
-- Indexes for table `vend`
--
ALTER TABLE `vend`
  ADD PRIMARY KEY (`vend_id`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zona_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fatitem`
--
ALTER TABLE `fatitem`
  MODIFY `fatitem_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `movtes`
--
ALTER TABLE `movtes`
  MODIFY `movtes_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rec`
--
ALTER TABLE `rec`
  MODIFY `rec_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cli`
--
ALTER TABLE `cli`
  ADD CONSTRAINT `cli_ibfk_10` FOREIGN KEY (`cli_condpagid`) REFERENCES `condpag` (`condpag_id`),
  ADD CONSTRAINT `cli_ibfk_11` FOREIGN KEY (`cli_vendid`) REFERENCES `vend` (`vend_id`),
  ADD CONSTRAINT `cli_ibfk_12` FOREIGN KEY (`cli_armazemid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `cli_ibfk_13` FOREIGN KEY (`cli_tipocliid`) REFERENCES `tipocli` (`tipocli_id`),
  ADD CONSTRAINT `cli_ibfk_14` FOREIGN KEY (`cli_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `cli_ibfk_15` FOREIGN KEY (`cli_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `cli_ibfk_16` FOREIGN KEY (`cli_zonaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `cli_ibfk_2` FOREIGN KEY (`cli_condpagid`) REFERENCES `condpag` (`condpag_id`),
  ADD CONSTRAINT `cli_ibfk_3` FOREIGN KEY (`cli_zonaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `cli_ibfk_4` FOREIGN KEY (`cli_vendid`) REFERENCES `vend` (`vend_id`),
  ADD CONSTRAINT `cli_ibfk_5` FOREIGN KEY (`cli_armazemid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `cli_ibfk_6` FOREIGN KEY (`cli_tipocliid`) REFERENCES `tipocli` (`tipocli_id`),
  ADD CONSTRAINT `cli_ibfk_7` FOREIGN KEY (`cli_tipocliid`) REFERENCES `tipocli` (`tipocli_id`),
  ADD CONSTRAINT `cli_ibfk_8` FOREIGN KEY (`cli_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `cli_ibfk_9` FOREIGN KEY (`cli_moedaid`) REFERENCES `moeda` (`moeda_id`);

--
-- Constraints for table `contatesoura`
--
ALTER TABLE `contatesoura`
  ADD CONSTRAINT `contatesoura_ibfk_1` FOREIGN KEY (`contatesoura_bancoid`) REFERENCES `banco` (`banco_id`),
  ADD CONSTRAINT `contatesoura_ibfk_2` FOREIGN KEY (`contatesoura_bancoid`) REFERENCES `banco` (`banco_id`);

--
-- Constraints for table `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `emp_ibfk_1` FOREIGN KEY (`emp_moedaid`) REFERENCES `pais` (`pais_id`);

--
-- Constraints for table `ent`
--
ALTER TABLE `ent`
  ADD CONSTRAINT `ent_ibfk_1` FOREIGN KEY (`ent_moedaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `ent_ibfk_10` FOREIGN KEY (`ent_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `ent_ibfk_11` FOREIGN KEY (`ent_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `ent_ibfk_2` FOREIGN KEY (`ent_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `ent_ibfk_3` FOREIGN KEY (`ent_armazemid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `ent_ibfk_4` FOREIGN KEY (`ent_paisid`) REFERENCES `pais` (`pais_id`),
  ADD CONSTRAINT `ent_ibfk_5` FOREIGN KEY (`ent_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `ent_ibfk_6` FOREIGN KEY (`ent_moedaid`) REFERENCES `zona` (`zona_id`),
  ADD CONSTRAINT `ent_ibfk_7` FOREIGN KEY (`ent_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `ent_ibfk_8` FOREIGN KEY (`ent_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `ent_ibfk_9` FOREIGN KEY (`ent_armazemid`) REFERENCES `arm` (`arm_id`);

--
-- Constraints for table `fat`
--
ALTER TABLE `fat`
  ADD CONSTRAINT `fat_ibfk_1` FOREIGN KEY (`fat_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `fat_ibfk_10` FOREIGN KEY (`fat_tipofatid`) REFERENCES `tipofat` (`tipofat_id`),
  ADD CONSTRAINT `fat_ibfk_11` FOREIGN KEY (`fat_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `fat_ibfk_12` FOREIGN KEY (`fat_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `fat_ibfk_13` FOREIGN KEY (`fat_cliid`) REFERENCES `cli` (`cli_id`),
  ADD CONSTRAINT `fat_ibfk_2` FOREIGN KEY (`fat_caixaid`) REFERENCES `caixa` (`caixa_id`),
  ADD CONSTRAINT `fat_ibfk_3` FOREIGN KEY (`fat_tipofatid`) REFERENCES `tipofat` (`tipofat_id`),
  ADD CONSTRAINT `fat_ibfk_4` FOREIGN KEY (`fat_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `fat_ibfk_5` FOREIGN KEY (`fat_cliid`) REFERENCES `cli` (`cli_id`),
  ADD CONSTRAINT `fat_ibfk_6` FOREIGN KEY (`fat_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `fat_ibfk_7` FOREIGN KEY (`fat_caixaid`) REFERENCES `caixa` (`caixa_id`),
  ADD CONSTRAINT `fat_ibfk_8` FOREIGN KEY (`fat_caixaid`) REFERENCES `caixa` (`caixa_id`),
  ADD CONSTRAINT `fat_ibfk_9` FOREIGN KEY (`fat_tipofatid`) REFERENCES `tipofat` (`tipofat_id`);

--
-- Constraints for table `fatitem`
--
ALTER TABLE `fatitem`
  ADD CONSTRAINT `fatitem_ibfk_1` FOREIGN KEY (`fatitem_tabprecoid`) REFERENCES `tabpreco` (`tabpreco_id`),
  ADD CONSTRAINT `fatitem_ibfk_2` FOREIGN KEY (`fatitem_stkid`) REFERENCES `stk` (`stk_id`),
  ADD CONSTRAINT `fatitem_ibfk_3` FOREIGN KEY (`fatitem_loteid`) REFERENCES `lote` (`lote_id`),
  ADD CONSTRAINT `fatitem_ibfk_4` FOREIGN KEY (`fatitem_tabivaid`) REFERENCES `tabiva` (`tabiva_id`),
  ADD CONSTRAINT `fk_fatitem_fat1` FOREIGN KEY (`fatitem_fatid`) REFERENCES `fat` (`fat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ff`
--
ALTER TABLE `ff`
  ADD CONSTRAINT `fk_ff_cff1` FOREIGN KEY (`cff_idcff`) REFERENCES `cff` (`idcff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ff_fnc1` FOREIGN KEY (`fnc_idfnc`) REFERENCES `fnc` (`idfnc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ffl`
--
ALTER TABLE `ffl`
  ADD CONSTRAINT `fk_{3AA9A7D6-B8CE-48E1-BBF6-604107E8465A}` FOREIGN KEY (`ff_idff`) REFERENCES `ff` (`idff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`lote_stkid`) REFERENCES `stk` (`stk_id`);

--
-- Constraints for table `mod`
--
ALTER TABLE `mod`
  ADD CONSTRAINT `mod_ibfk_1` FOREIGN KEY (`mod_utilizadoractualizacao`) REFERENCES `util` (`util_id`),
  ADD CONSTRAINT `mod_ibfk_2` FOREIGN KEY (`mod_utilizadorcriacao`) REFERENCES `util` (`util_id`);

--
-- Constraints for table `movtes`
--
ALTER TABLE `movtes`
  ADD CONSTRAINT `movtes_ibfk_1` FOREIGN KEY (`movtes_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `movtes_ibfk_2` FOREIGN KEY (`movtes_codcontaid`) REFERENCES `codconta` (`codconta_id`),
  ADD CONSTRAINT `movtes_ibfk_3` FOREIGN KEY (`movtes_cencustoid`) REFERENCES `cencusto` (`cencusto_id`);

--
-- Constraints for table `rec`
--
ALTER TABLE `rec`
  ADD CONSTRAINT `rec_ibfk_1` FOREIGN KEY (`rec_moedaid`) REFERENCES `moeda` (`moeda_id`),
  ADD CONSTRAINT `rec_ibfk_2` FOREIGN KEY (`rec_cliid`) REFERENCES `cli` (`cli_id`),
  ADD CONSTRAINT `rec_ibfk_3` FOREIGN KEY (`rec_cencustoid`) REFERENCES `cencusto` (`cencusto_id`),
  ADD CONSTRAINT `rec_ibfk_4` FOREIGN KEY (`rec_cliid`) REFERENCES `cli` (`cli_id`);

--
-- Constraints for table `recitem`
--
ALTER TABLE `recitem`
  ADD CONSTRAINT `recitem_ibfk_1` FOREIGN KEY (`recitem_fatid`) REFERENCES `fat` (`fat_id`);

--
-- Constraints for table `stk`
--
ALTER TABLE `stk`
  ADD CONSTRAINT `stk_ibfk_1` FOREIGN KEY (`stk_marcaid`) REFERENCES `marca` (`marca_id`),
  ADD CONSTRAINT `stk_ibfk_2` FOREIGN KEY (`stk_marcaid`) REFERENCES `marca` (`marca_id`),
  ADD CONSTRAINT `stk_ibfk_3` FOREIGN KEY (`stk_marcaid`) REFERENCES `marca` (`marca_id`),
  ADD CONSTRAINT `stk_ibfk_4` FOREIGN KEY (`stk_armazemid`) REFERENCES `marca` (`marca_id`),
  ADD CONSTRAINT `stk_ibfk_5` FOREIGN KEY (`stk_unimedid`) REFERENCES `unimed` (`unimed_id`);

--
-- Constraints for table `tabpreco`
--
ALTER TABLE `tabpreco`
  ADD CONSTRAINT `tabpreco_ibfk_1` FOREIGN KEY (`tabpreco_stkid`) REFERENCES `stk` (`stk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipofat`
--
ALTER TABLE `tipofat`
  ADD CONSTRAINT `tipofat_ibfk_1` FOREIGN KEY (`tipofat_armpredefinidoid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `tipofat_ibfk_2` FOREIGN KEY (`tipofat_armpredefinidoid`) REFERENCES `arm` (`arm_id`),
  ADD CONSTRAINT `tipofat_ibfk_3` FOREIGN KEY (`tipofat_codmovstkid`) REFERENCES `codmovstk` (`codmovstk_id`),
  ADD CONSTRAINT `tipofat_ibfk_4` FOREIGN KEY (`tipofat_cencustoid`) REFERENCES `cencusto` (`cencusto_id`);

--
-- Constraints for table `tiporec`
--
ALTER TABLE `tiporec`
  ADD CONSTRAINT `tiporec_ibfk_1` FOREIGN KEY (`tiporec_tipopagid`) REFERENCES `tipopag` (`tipopag_id`);

--
-- Constraints for table `utilacessos`
--
ALTER TABLE `utilacessos`
  ADD CONSTRAINT `utilacessos_ibfk_1` FOREIGN KEY (`utilacessos_utilid`) REFERENCES `util` (`util_id`),
  ADD CONSTRAINT `utilacessos_ibfk_2` FOREIGN KEY (`utilacessos_ecranid`) REFERENCES `ecran` (`ecran_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
